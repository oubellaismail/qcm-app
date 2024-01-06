<?php

// QuizController.php

namespace App\Http\Controllers;

use App\Models\Quiz;
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

    public function show(Quiz $quiz){

        session()->put('correct_answer', 0);

        return view('quizzes.quiz', [
            'quiz' => $quiz::with('questions')->first()
        ]);
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        // Validate the form data

        // Create a new question
        $question = Question::create([
            'description' => $request->input('question_text'),
            'quiz_id'=> 1,
        ]);



        // Attach options to the question
        foreach ($request->input('options') as $key => $optionText) {
            $correct = $key == $request->input('correct_option');
            $question->options()->create([
                'option_text' => $optionText,
                'is_correct' => $correct,
            ]);
        }

        return redirect('quizzes.quiz')->with('success', 'Question added successfully');
    }
 
    public function checkAnswers(Request $request)
    {
        $selectedOptionIds = $request->input('selected_options');

        // Validate the selected options and get the correct options from the database
        $correctOptions = $this->getCorrectOptions($selectedOptionIds);

        // Check correctness
        $isCorrect = $this->checkCorrectness($selectedOptionIds, $correctOptions);

        if($isCorrect) {
            session()->increment('correct_answer');
        }

        return redirect('quizzes.quiz');
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


