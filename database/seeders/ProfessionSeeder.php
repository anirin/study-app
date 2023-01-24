<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    public function run() {
        Profession::create([
            'profession' => 'ー',
        ]);
        Profession::create([
            'profession' => '学生',
        ]);
        Profession::create([
            'profession' => '社会人',
        ]);
        Profession::create([
            'profession' => 'その他',
        ]);
    }
}
