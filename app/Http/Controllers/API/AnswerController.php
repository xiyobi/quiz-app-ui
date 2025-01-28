<?php

namespace App\Http\Controllers\API;

use App\Models\Answer;
use App\Traits\Validator;

class AnswerController
{
    use Validator;
    public  function store()
    {
        $answerItems=$this->validate([
            'result_id' => 'required|integer',
            'option_id' => 'required|integer',
        ]);
        $answer=new Answer();
        $answerData=$answer->create(
            $answerItems['result_id'],
            $answerItems['option_id']
        );
        apiResponse([
            'massage' => 'Answer Created successfully',
            'answer' => $answerData
        ]);

    }
}