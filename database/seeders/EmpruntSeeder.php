<?php

namespace Database\Seeders;

use App\Models\Emprunts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpruntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emprunts::factory()->count(20)->create();
    }
}
