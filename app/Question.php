<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public static function storeQuestion($author, $email, $text)
    {
        $question = new Question();
        $question->author = $author;
        $question->email = $email;
        $question->question = $text;
        $question->save();

        $settings = Settings::find(1);

        $message = 'There is a new question from ' . $author . ', email - ' . $email . ', question - ' . $text;
        Question::mail('New message',$settings->admin_email, $message);

        return $question->id;
    }

    public function getFiles()
    {
        return $this->morphMany('App\File', 'owner');
    }

    public static function mail($theme, $email, $message)
    {
        $question = new Question();
        $question->swiftMail($theme, $email, $message);
    }

    private function swiftMail(string $theme, $to, string $mess)
    {
        $transport = (new \Swift_SmtpTransport('ssl://smtp.yandex.ru', 465))
            ->setUsername('kopose@yandex.ru')
            ->setPassword('89516775954');
        $mailer = new \Swift_Mailer($transport);
        $message = (new \Swift_Message($theme))
            ->setFrom(['kopose@yandex.ru'])
            ->setTo($to)
            ->setBody($mess, 'text/html');
        $result = $mailer->send($message);
        return $result;
    }
}
