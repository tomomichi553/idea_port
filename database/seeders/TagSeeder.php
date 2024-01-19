<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => '健康'],
            ['name' => '生活'],
            ['name' => '人間関係'],
            ['name' => '仕事'],
            ['name' => 'メンタル'],
            ['name' => 'テクノロジー'],
            ['name' => 'ビジネス'],
            ['name' => 'お金'],
            ['name' => 'その他'],
        ];
        
        foreach ($tags as $tag){
            Tag::create($tag);
        }
    }
}
