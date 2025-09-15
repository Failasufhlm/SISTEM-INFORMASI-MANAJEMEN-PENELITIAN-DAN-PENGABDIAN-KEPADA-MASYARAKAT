<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinalReportSeeder extends Seeder
{
    public function run(): void
    {
        if (!DB::table('proposals')->exists()) {
            return;
        }

        DB::table('final_reports')->insert([
            [
                'proposal_id' => 1,
                'user_id' => 2,
                'file_path' => 'final_reports/sample.pdf',
                'notes' => 'Laporan akhir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


