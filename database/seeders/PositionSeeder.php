<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['position' => 'Manager'],
            ['position' => 'Marketing'],
            ['position' => 'Accounting'],
            ['position' => 'Human Resource'],
            ['position' => 'Software Engineer'],
            ['position' => 'Chief Executive Officer'],
        ])
        ->each(fn ($position) => Position::create($position));
    }
}
