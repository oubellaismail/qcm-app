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

    public function show(Quiz $quiz){
        return view('quizzes.quiz', [
            'questions' => $quiz->questions()->with('options')->get(),
        ]);
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

    public function submit(){

        Grade::create([
            'grade' => request()->input('grade'),
            'quiz_id' => request()->input('quiz_id'),
            'student_id' => auth()->user()->student->id,
        ]);

        return redirect(route('quizzes.index'));
    }
}


