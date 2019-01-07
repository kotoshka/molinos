<?php

namespace App\Http\Controllers;

use App\Question;
use App\File;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('getFiles')->get();
        $data['questions'] = $questions;
        return View('admin.questions', $data);
    }

    public function create()
    {
        return View('form');
    }

    public function store(Request $request)
    {
        $message = '';
        $this->validate($request, [
            'author' => 'required',
            'question' => 'required',
            'email' => 'required|email',
            'file.*' => 'mimes:png,gif,jpeg,txt,pdf,doc',
            // 'g-recaptcha-response' => 'required|captcha'
        ]);
        $newID = Question::storeQuestion($request->author, $request->email, $request->question);
        if ($newID) {
            $message = 'Message had been send correctly!!!';
            if ($request->hasFile('file')) {
                $files = $request->file('file');
                File::storeFiles($files, $newID, 'App\Question');
            }
        }
        return redirect()
            ->route('questions.create')
            ->with('message', $message);
    }

    public function delete(string $question_id)
    {
        Question::destroy($question_id);
        File::deleteFiles($question_id, 'App\Question');
        return redirect()->route('questions.list');
    }

    public function answer(string $question_id)
    {
        return View('admin.answer', ['question_id' => $question_id]);
    }

    public function reply(Request $request)
    {
        $this->validate($request, [
            'answer' => 'required'
        ]);
        $question = Question::find($request->question_id);
        $question->answer = $request->answer;
        $question->save();
        Question::mail('Answer for your question', $question->email, $request->answer);
        return redirect()->route('questions.list');
    }
}
