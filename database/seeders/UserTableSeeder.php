<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\ModelFactory;

class UserTableSeeder extends Seeder
{
    public function run()
    {
      \App\Models\User::factory(0)->create();
    }
}
