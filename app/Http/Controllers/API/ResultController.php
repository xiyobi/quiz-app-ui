<?php

namespace App\Http\Controllers\API;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Traits\Validator;
use Src\Auth;

class ResultController
{
    use Validator;
    public function store()
    {
        $resultItems=$this->validate([
            'quiz_id' => 'required|integer',
        ]);
        $quiz=(new Quiz())->find($resultItems['quiz_id']);
        if($quiz) {
            $result = new Result();
            $userResult = $result->getUserResults(Auth::user()->id,$quiz->id);
            if ($userResult){
                $startedAt = strtotime($userResult->started_at);
                $finishedAt =strtotime($userResult->finished_at);
                $diff=abs($finishedAt-$startedAt);
                $years=floor($diff/(365*60*60*24));
                $months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
                $days=floor(($diff-$years*365*60*60*24)-$months*30*60*60*24)/(60*60);
                $hours=floor(($diff -$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24)/(60*60));
                apiResponse([
                    'errors'=>[
                        'massage'=>'You have already taken this quiz'
                    ],
                    'data'=>[
                        'result'=>[
                            'id'=>$userResult->id,
                            'quiz'=>$quiz,
                            'started_at'=>$userResult->started_t,
                            'time_taken'=>floor(($diff-$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24)/60)
                        ]
                    ]
                ],400);
            }
            $resultData=$result->create(
                Auth::user()->id,
                $quiz->id,
                $quiz->time_limit
            );

        apiResponse([
            'massage' => 'Result Created successfully',
            'result' => $resultData

        ]);
    }

    apiResponse([
        'errors'=>[
            'massage' => 'User not found',
        ],
    ],404);
    }

}