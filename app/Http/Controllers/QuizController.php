<?php

// QuizController.php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Grade;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('quizzes.index',[
            'quizzes' => Quiz::with('questions')->get()
        ]);
    }

    public function session_initialise($count) {
        session()->put('correct_answer', 0);
        session()->put('question_count', $count);

    }

    public function show(Quiz $quiz){

        if (!session()->has('correct_answer')) {
            $this->session_initialise($quiz->questions->count());
        }
        
        if(session()->get('question_count') == 0) {
            $this->end($quiz->id);
            return redirect(route('quiz.index'));
        }
        
        $question = $this->submit($quiz->questions);
        
        return view('quizzes.quiz', [
            'quiz' => $quiz,
            'question' => $question
        ]);
    }

    public function submit($questions){
        // dd($questions->count(),session()->get('question_count'));
        if($questions->count() != session()->get('question_count')) {
            $this->checkAnswers();
        }
        session()->decrement('question_count');
        return $questions->get(session()->get('question_count'));
    }

    public function end ($quiz_id) {
        Grade::create([
            'student_id' => auth()->user()->student->id,
            'quiz_id' => $quiz_id,
            'grade' => session()->get('correct_answer')
        ]);

        session()->forget(['question_count', 'correct_answer']);

    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store()
    {
        $validator = request()->validate([
            'title' => ['required', 'max:20'],
            'description' => 'required'
        ]);

        $validator['user_id'] = auth()->user()->id;

        Quiz::create($validator);

        return redirect(route('quizzes.index'));
    }
 
    public function checkAnswers()
    {
        $selectedOptionIds = request()->input('selected_options');

        // Validate the selected options and get the correct options from the database
        $correctOptions = $this->getCorrectOptions($selectedOptionIds);

        // Check correctness
        $isCorrect = $this->checkCorrectness($selectedOptionIds, $correctOptions);

        if($isCorrect) {
            session()->increment('correct_answer');
        }
    }

    private function getCorrectOptions($selectedOptionIds)
    {
        // Query the database to get the correct options for the selected question
        // Assuming the options table has a column named 'is_correct' and it should be 1
        return Option::whereIn('id', $selectedOptionIds)
            ->where('is_correct', 1)
            ->pluck('id')
            ->toArray();
    }

    private function checkCorrectness($selectedOptionIds, $correctOptions)
    {
        sort($selectedOptionIds);
        sort($correctOptions);

        return $selectedOptionIds == $correctOptions ? 1 : 0;
    }
}


