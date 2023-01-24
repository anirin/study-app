<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run() {
        Subject::create([
            'subject' => 'ー',
        ]);
        Subject::create([
            'subject' => '受験勉強',
        ]);
        Subject::create([
            'subject' => '資格勉強',
        ]);
        Subject::create([
            'subject' => '運動',
        ]);
        Subject::create([
            'subject' => '仕事',
        ]);
        Subject::create([
            'subject' => 'その他',
        ]);
    }
}
