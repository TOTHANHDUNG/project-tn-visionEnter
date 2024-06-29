<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rating; // Correct namespace

class RatingsTableSeeder extends Seeder
{
    public function run()
    {
        $ratingRecords = [
            ['id' => 1, 'user_id' => 1, 'course_id' => 1, 'review' => 'very good', 'rating' => 4, 'status' => 0],
            ['id' => 2, 'user_id' => 2, 'course_id' => 2, 'review' => 'very good lan 2', 'rating' => 5, 'status' => 1],
            ['id' => 3, 'user_id' => 3, 'course_id' => 3, 'review' => 'very good lan 333', 'rating' => 5, 'status' => 0],
            ['id' => 4, 'user_id' => 4, 'course_id' => 4, 'review' => 'very good lan 3333', 'rating' => 5, 'status' => 0],
        ];
        
        Rating::insert($ratingRecords);
    }
}

