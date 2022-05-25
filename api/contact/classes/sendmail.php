<?php
/**
 * @class Sender
 * This is used to send email via react from component
 */
class Sender
{
    public $sendTo;
    public $sendFrom;
    public $subject;
    public $message;

    /**
     * Sender constructor.
     * @param $sendTo
     * @param $sendFrom
     * @param $subject
     * @param $message
     */
    public function __construct($sendTo, $sendFrom, $subject, $message)
    {
        $this->sendTo = $sendTo;
        $this->sendFrom = ($sendFrom) ? $sendFrom : 'testing@test.com';
        $this->subject = $subject;
        $this->message = $message;
    }

    public function send() {
        $to      = $this->sendFrom;
        $from = $this->sendTo;
        $subject = $this->subject;
        $message = $this->message;

        $headers =
            "MIME-Version: 1.0" . "\r\n".
            "Content-Type: text/html; charset=UTF-8\r\n".
            'From: '.$from . "\r\n" .
            'Reply-To: '.$from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

         mail($to, $subject, $message, $headers);

    }

}