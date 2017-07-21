<?php namespace App\MyLibs;

class MailManager {

    public function send($options, $data){
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");

        $to      = $options['to'];
        $subject = $options['subject'];
        $message = view($options['template'], $data);
        $headers = 'From: '. $options['from'] . "\r\n";

        mb_send_mail($to, $subject, $message, $headers);
    }

}
