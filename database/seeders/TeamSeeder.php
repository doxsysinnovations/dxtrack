<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            "name" => "Novexa",
            "pattern" => "diagonal-stripes",
            "description" => "Focused on developing the Novexa automation suite for enterprise workflows.",
        ]);
        
        Team::create([
            "name" => "Zephra",
            "pattern" => "hex-grid",
            "description" => "A core team handling Zephra’s cloud-native architecture research.",
        ]);
        
        Team::create([
            "name" => "Quantix",
            "pattern" => "dotted-line",
            "description" => "Dedicated to building Quantix analytics tools for internal use cases.",
        ]);
        
        Team::create([
            "name" => "Blazetrail",
            "pattern" => "gradient-wave",
            "description" => "Product team behind the Blazetrail mobile-first productivity platform.",
        ]);
        
    }
}
