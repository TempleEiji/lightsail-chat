<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
  {
    DB::table('question')->delete();
    DB::table("question")->insert(
      [
        [
          'qid'=> 1,
          'type'=> 2,
          'contents'=> '{
            "data":[
                {
                  "name": "関西",
                  "value": 1
                },
                {
                  "name": "関東",
                  "value": 2
                },
                {
                  "name": "東海",
                  "value": 3
                }
            ]
          }'
        ],
        [
          'qid'=> 2,
          'type'=> 2,
          'contents'=> '{
            "data":[
                {
                  "name": "東京",
                  "value": 1
                },
                {
                  "name": "神奈川",
                  "value": 2
                },
                {
                  "name": "千葉",
                  "value": 3
                }
            ]
          }'
        ],
        [
          'qid'=> 3,
          'type'=> 2,
          'contents'=> '{
            "data":[
                {
                  "name": "船橋",
                  "value": 1
                },
                {
                  "name": "松戸",
                  "value": 2
                },
                {
                  "name": "柏",
                  "value": 3
                }
            ]
          }'
        ],
        [
          'qid'=> 4,
          'type'=> 3,
          'contents'=> '{
            "data":[
                {
                  "name": "我孫子市",
                  "value": 1
                },
                {
                  "name": "船橋市",
                  "value": 2
                },
                {
                  "name": "鎌ヶ谷市",
                  "value": 3
                }
            ]
          }'
        ],
        ]
      );
    }

}
