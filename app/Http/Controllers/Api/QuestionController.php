<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;


class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::all();
        return $question;
    //    try {
    //         $question = Question::get();
    //         $result = [
    //             'step'     => $question->step,
    //             'msg'     => $question->msg,
    //             'beforemsg'     => $question->beforemsg,
    //             'aftermsg'     => $question->aftermsg,
    //             'sender'     => $question->sender,
    //             'options' => $question->options
    //         ];
    //     } catch(\Exception $e){
    //         $result = [
    //             'result' => false,
    //             'error' => [
    //                 'messages' => [$e->getMessage()]
    //             ],
    //         ];
    //         return $this->resConversionJson($result, $e->getCode());
    //     }
    //     return $this->resConversionJson($question);
    }

    // private function resConversionJson($result, $statusCode=200)
    // {
    //     if(empty($statusCode) || $statusCode < 100 || $statusCode >= 600){
    //         $statusCode = 500;
    //     }
    //     return response()->json($result, $statusCode, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    // }

}
