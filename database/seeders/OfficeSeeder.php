<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['office' => 'Tokyo'],
            ['office' => 'Seattle'],
            ['office' => 'Jakarta'],
            ['office' => 'Redmond'],
            ['office' => 'San Fransisco'],
            ['office' => 'Mountain View'],
        ])
        ->each(fn ($office) => Office::create($office));
    }
}
