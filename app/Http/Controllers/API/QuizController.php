<?php

namespace App\Http\Controllers\API;


use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Traits\Validator;
use JetBrains\PhpStorm\NoReturn;
use Src\Auth;

class QuizController
{

    use Validator;
    public function index(): void
    {
        $quizzes = (new Quiz())->getByUserId(Auth::user()->id);
        apiResponse([
            'quizzes' => $quizzes,
        ]);
    }
    public function show(int $quizId): void
    {
        $quiz = (new Quiz())->find($quizId);
      $questions=(new Question())->getWithOptions($quizId);
      $quiz->questions=$questions;

        apiResponse($quiz);

    }
     #[NoReturn] public function showByUniqueValue(string $uniqueValue): void
     {
         $quiz = (new Quiz())->findByUniqueValue($uniqueValue);
            if ($quiz) {
                $questions=(new Question())->getWithOptions($quiz['id']);
                $quiz['questions']=$questions;
                apiResponse($quiz);
            }


        }
    public function store(): void

    {
        $quizItems = $this->validate([
            'title' => 'string',
            'description' => 'string',
            'timeLimit' => 'int',
            'questions' => 'array',
        ]);


        $quiz = new Quiz();
        $question = new Question();
        $option = new Option();

       $quiz_id = $quiz->create(   Auth::user()->id,
            $quizItems['title'],
           $quizItems['description'],
            $quizItems['timeLimit'],
       );
       $questions=$quizItems['questions'];
       foreach ($questions as $questionItem) {
            $question_id = $question->create($quiz_id, $questionItem['quiz']);
            $correct = $questionItem['correct'];
            foreach ($questionItem['options'] as $key => $optionItem) {
                $option->create($question_id, $optionItem, $correct == $key);
            }
        }
       apiResponse([
           'massage' => 'successfully created'
       ]);


    }
    public function update(int $quizId): void
    {
        $quizItems = $this->validate([
            'title' => 'string',
            'description' => 'string',
            'timeLimit' => 'int',
            'questions' => 'array',
        ]);
        $quiz = new Quiz();
        $question = new Question();
        $option = new Option();

        $quiz->update($quizId,
            $quizItems['title'],
            $quizItems['description'],
            $quizItems['timeLimit']
        );
        $question->deleteByQuizId($quizId);
        $questions=$quizItems['questions'];

        foreach ($questions as $questionItem) {
            $question_id = $question->create($quizId, $questionItem['quiz']);
            $correct = $questionItem['correct'];
            foreach ($questionItem['options'] as $key => $optionItem) {
                $option->create($question_id, $optionItem, $correct == $key);
            }
        }
        apiResponse([
            'massage' => 'successfully updated'
        ]);

    }
    public function destroy(int $quizId): void
    {
        $quiz = new Quiz();
        $quiz->delete($quizId);
        apiResponse([
            'massage' => 'successfully deleted'
        ]);
    }


}
