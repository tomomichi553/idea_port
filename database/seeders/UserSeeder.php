<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => '駿台太郎',
            'email' => 'sundaitaro@gmail.com',
            'password' =>Hash::make('sundaitaro'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }    
    
}
