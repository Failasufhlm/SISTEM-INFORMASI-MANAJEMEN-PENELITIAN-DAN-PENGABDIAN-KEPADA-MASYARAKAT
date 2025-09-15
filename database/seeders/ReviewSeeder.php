<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        if (!DB::table('proposals')->exists()) {
            return;
        }

        DB::table('reviews')->insert([
            [
                'proposal_id' => 1,
                'user_id' => 3,
                'score' => 85,
                'comment' => 'Baik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


