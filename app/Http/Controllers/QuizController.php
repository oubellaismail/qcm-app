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
        if (auth()->user()->role->id != 2) {
            abort(404);
        }
        return view('quizzes.index',[
            'quizzes' => Quiz::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function show(Quiz $quiz){
        if (auth()->user()->role->id != 2) {
            abort(404);
        }
        return view('quizzes.show', [
            'quiz' => $quiz,
        ]);
    }

    public function toggle(Quiz $quiz)
    {

        if($quiz->questions->isEmpty() ){
            return back() -> withErrors ([
                'empty' => 'You cannot assign an empty Quiz ! ',
            ]);
        }

        $quiz->update([
            'isVisible' => !$quiz->isVisible,
        ]);

        return redirect()->route('quiz.index');
    }


    public function pass(Quiz $quiz)
    {
        if (auth()->user()->role->id != 3) {
            abort(404);
        }

        $id = auth()->user()->student->id;
        $grade = Grade::where('student_id', $id)->where('quiz_id', $quiz->id)->first();

        if ($grade) {
            return back() -> withErrors([
                'error' => 'You have already passed this quiz !'
            ]);
        }

        return view('students.quiz', [
            'questions' => $quiz->questions()->with('options')->get(),
        ]);
    }

    public function create()
    {
        if (auth()->user()->role->id != 2) {
            abort(404);
        }
        return view('quizzes.create');
    }

    public function store()
    {
        $validator = request()->validate([
            'title' => ['required', 'max:20'],
            'description' => 'required'
        ]);

        $validator['user_id'] = auth()->user()->id;
        $validator['professor_id'] = auth()->user()->professor->id;

        Quiz::create($validator);

        return redirect(route('quiz.index'));
    }

    public function submit(){

        Grade::create([
            'grade' => request()->input('grade'),
            'quiz_id' => request()->input('quiz_id'),
            'student_id' => auth()->user()->student->id,
            'is_passed' => true
        ]);

        return redirect(route('student.index'));
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quiz.index')->with('success', 'Task created successfully!');
    }
}


