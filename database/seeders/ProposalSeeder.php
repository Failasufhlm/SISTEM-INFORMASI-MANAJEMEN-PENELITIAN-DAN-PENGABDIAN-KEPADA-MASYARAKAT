<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProposalSeeder extends Seeder
{
    public function run()
    {
        if (!Schema::hasTable('proposals')) {
            return;
        }

        DB::table('proposals')->insert([
            'user_id' => 1,
            'title' => 'Contoh Proposal',
            'type' => 'penelitian',
            'file_path' => 'storage/app/proposals/contoh.pdf',
            'status' => 'submitted',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
