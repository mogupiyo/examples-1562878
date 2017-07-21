<?php namespace App\MyLibs;

class MailManager {

    public function send($options, $data){
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");

        $to      = $options['to'];
        $subject = $options['subject'];
        $message = view($options['template'], compact('data'));
        $headers = 'From: '. $options['from'] . "\r\n";
        // $headers .= "MIME-Version: 1.0\r\n";
        // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        mb_send_mail($to, $subject, $message, $headers);
    }

}
