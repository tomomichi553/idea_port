<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ideas')->insert([
                'user_id' => '1',
                'idea_title'=> 'これがアイデアのタイトルです',
                'idea_background'=> 'ここからがアイデアの背景です',
                'idea_goal'=>'ここからがアイデアの目標です',
                'idea_detail'=> 'ここからがアイデアの詳細です',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         /*DB::table('ideas')->insert([
                //'user_id' => '1',
                'idea_title'=> 'これがアイデアのタイトル2です',
                'idea_background'=> 'ここからがアイデアの背景2です',
                'idea_goal'=>'ここからがアイデアの目標2です',
                'idea_detail'=> 'ここからがアイデアの詳細2です',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);*/
    }
}
