<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Question extends Model
{

    public static function storeQuestion(string $author, string $email, string $text)
    {
        $question = new Question();
        $question->author = $author;
        $question->email = $email;
        $question->question = $text;
        $question->save();

        $settings = Settings::find(1);

        $message = 'There is a new question from ' . $author . ', email - ' . $email . ', question - ' . $text;
        Question::mail('New message', $settings->admin_email, $message);

        return $question->id;
    }

    public function getFiles()
    {
        return $this->morphMany('App\File', 'owner');
    }

    public static function mail(string $theme, string $email, string $text)
    {
        $data = ['text' => $text, 'to' => $email, 'theme' => $theme];
        Mail::send('emails.question', $data, function ($message) use ($data){
            $message->to($data['to'], 'Dear Client')->subject
            ($data['theme']);
//          $message->from('kopose@yandex.ru', 'Kopose');
            $message->from('kopos91@yandex.ru', 'Kopose');
        });
    }
}
