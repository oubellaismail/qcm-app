<?php

// QuizController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class QuizController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('users.quiz', compact('questions'));
        }

    public function create()
    {
        return view('users.create');
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

        return redirect('/quiz')->with('success', 'Question added successfully');
    }
 
    public function checkAnswers(Request $request)
    {
        $selectedOptionIds = $request->input('selected_options');

        // Validate the selected options and get the correct options from the database
        $correctOptions = $this->getCorrectOptions($selectedOptionIds);

        // Check correctness
        $isCorrect = $this->checkCorrectness($selectedOptionIds, $correctOptions);

        // Update the correctness counter in the session
        session(['correctness_counter' => session('correctness_counter') + $isCorrect]);
         dd(session(['correctness_counter']));
        // You can handle the correctness result as needed, such as storing it in the database or displaying a message
        // For now, let's just redirect back to the quiz page
        return redirect('/quiz');
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
        // Check if the selected options match the correct options
        sort($selectedOptionIds);
        sort($correctOptions);

        return $selectedOptionIds == $correctOptions ? 1 : 0;
    }
}


