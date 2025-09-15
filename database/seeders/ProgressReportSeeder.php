<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressReportSeeder extends Seeder
{
    public function run(): void
    {
        if (!DB::table('proposals')->exists()) {
            return;
        }

        DB::table('progress_reports')->insert([
            [
                'proposal_id' => 1,
                'user_id' => 2,
                'file_path' => 'progress_reports/sample.pdf',
                'notes' => 'Laporan kemajuan awal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


