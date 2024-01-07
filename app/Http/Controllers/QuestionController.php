<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Quiz $quiz)
    {
        return view('questions.create', [
            'quiz' => $quiz,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Quiz $quiz)
    {
        $validator = request()->validate([
            'description' => 'required',
        ]);

        $validator['quiz_id'] = $quiz->id;

        $question = Question::create($validator);

        // Attach options to the question
        foreach (request()->input('options') as $key => $optionText) {
            $correct = $key == request()->input('correct_option');
            $question->options()->create([
                'option_text' => $optionText,
                'is_correct' => $correct,
            ]);
        }


        return back()->with('success', 'Question added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
