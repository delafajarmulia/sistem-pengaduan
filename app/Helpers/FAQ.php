<?php

namespace App\Helpers;

class FAQ
{
    public $question;
    public $answer;

    public function __construct($question, $answer)
    {
        $this->question = $question;
        $this->answer = $answer;
    }
}