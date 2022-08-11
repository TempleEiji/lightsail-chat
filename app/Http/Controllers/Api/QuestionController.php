<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;


class QuestionController extends Controller
{
    public function index()
    {
        // $question = Question::all()->toJson(JSON_PRETTY_PRINT);
        // $question = Question::all()->toJson(JSON_PRETTY_PRINT);
        // return response($question, 200);
        // return $question;
        // $question = Question::get()->toJson(JSON_PRETTY_PRINT);



        // return $question;
       try {
            $question = Question::all();
            $resultArr = [];
            foreach($question as $item) {

                // $optionArr = response()->json($item->options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)->original;
                // $setOp = [];
                // foreach ($optionArr as $op) {
                //     $setOp[] = [
                //         'options' => response()->json($op, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
                //     ]
                // }

                $resultArr[] = [
                    'step'     => $item->step,
                    'msg'     => $item->msg,
                    'beforemsg'     => $item->beforemsg,
                    'aftermsg'     => $item->aftermsg,
                    'sender'     => $item->sender,
                    'options' => json_decode($item->options, JSON_UNESCAPED_UNICODE)
                ];
            }
        } catch(\Exception $e){
            $result = [
                'result' => false,
                'error' => [
                    'messages' => [$e->getMessage()]
                ],
            ];
            return $this->resConversionJson($result, $e->getCode());
        }
        // return $this->resConversionJson($question);
        return $this->resConversionJson($resultArr);
    }

    private function resConversionJson($result, $statusCode=200)
    {
        if(empty($statusCode) || $statusCode < 100 || $statusCode >= 600){
            $statusCode = 500;
        }
        return response()->json($result, $statusCode, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

}
