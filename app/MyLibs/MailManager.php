<?php namespace App\MyLibs;

class MailManager {

    public function send(){
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");

        $to      = 'sekaino.piyopiyo@gmail.com';
        $subject = 'タイトル';
        $message = '本文';
        $headers = 'From: from@hoge.co.jp' . "\r\n";

        mb_send_mail($to, $subject, $message, $headers);
    }

}
