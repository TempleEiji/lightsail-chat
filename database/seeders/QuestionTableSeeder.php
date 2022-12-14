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
          'step'=> 1,
          'msg'=> 'お住まいはどの地域ですか',
          'beforemsg'=> 'こんにちは、およそ３~5分ほどで質問がありますので、ご回答お願いします',
          'aftermsg'=> '選択肢してください',
          'sender' => 'bot',
          'options'=> collect([
            ['step'=> 1,'text'=> '北海道','img'=> '','list'=> []],
            ['step'=> 2,'text'=> '関東','img'=> '','list'=> []],
            ['step'=> 3,'text'=> '関西','img'=> '','list'=> []]
          ])
        ],
        [
          'step'=> 2,
          'msg'=> 'お住まいはどの都道府県をお選び下さい',
          'beforemsg'=> '',
          'aftermsg'=> '',
          'sender' => 'bot',
          'options'=> collect([
            ['step'=> 1,'text'=> '北海道','img'=> '','list'=> []],
            ['step'=> 2,'text'=> '関東','img'=> '','list'=> []],
            ['step'=> 3,'text'=> '関西','img'=> '','list'=> []]
          ])
        ],
        [
          'step'=> 3,
          'msg'=> 'お住まいはどの都道府県をお選び下さい',
          'beforemsg'=> '',
          'aftermsg'=> '',
          'sender' => 'bot',
          'options'=> collect([
            ['step'=> 1,'text'=> '北海道','img'=> '','list'=> []],
            ['step'=> 2,'text'=> '関東','img'=> '','list'=> []],
            ['step'=> 3,'text'=> '関西','img'=> '','list'=> []]
          ])
        ],
        ]
      );
    }

}
