<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\ModelFactory;

class RecordSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Record::factory(40)->create();
    }
}
