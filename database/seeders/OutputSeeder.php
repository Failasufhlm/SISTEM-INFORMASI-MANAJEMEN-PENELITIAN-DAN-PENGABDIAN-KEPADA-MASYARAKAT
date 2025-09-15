<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutputSeeder extends Seeder
{
    public function run(): void
    {
        if (!DB::table('proposals')->exists()) {
            return;
        }

        DB::table('outputs')->insert([
            [
                'proposal_id' => 1,
                'type' => 'jurnal',
                'title' => 'Publikasi A',
                'file_path' => 'outputs/jurnal.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


