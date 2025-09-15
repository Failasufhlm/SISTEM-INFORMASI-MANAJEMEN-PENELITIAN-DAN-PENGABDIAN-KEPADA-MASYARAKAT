<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProposalSeeder extends Seeder
{
    public function run()
    {
        DB::table('proposals')->insert([
            'name' => 'Contoh Proposal',
            'description' => 'Deskripsi proposal contoh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
