<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Subject;

class RecordFactory extends Factory
{
    public function definition()
    {
        $subjects = Subject::pluck('id')->all();
        $users = User::pluck('id')->all();
        
        return [
            'user_id' => fake()->randomElement($users),
            'studied_date' => fake()->dateTimeBetween($startDate = '-3 month',$endDate = 'now +6 month'),
            'time' => rand(1,4000),
            'comment' => fake()->randomElement(['疲れた','また頑張ろう','難しい']),
            'subject_id' => fake()->randomElement($subjects),
        ];
    }
}
