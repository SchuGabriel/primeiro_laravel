<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table("teams")->insert([
            "name" => "Gremio",
            "country" => "Brasil",
        ]);

        DB::table("teams")->insert([
            "name" => "Inter",
            "country" => "Brasil",
        ]);

    }
}
