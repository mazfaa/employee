<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [   
                'name' => 'Nikola Tesla',
                'position_id' => '993feb44-4ab9-49ad-b27f-45481e081bed',
                'office_id' => '993feb44-25e3-4497-b96f-d5cf619c7cc3',
                'start_date' => date('Y-m-d'),
                'salary' => 500,
            ],

            [   
                'name' => 'Sir Isaac Newton',
                'position_id' => '993feb44-60c8-452a-8949-ed5514ccdddf',
                'office_id' => '993feb44-391c-4679-ba37-ba20d927898f',
                'start_date' => date('Y-m-d'),
                'salary' => 500,
            ],
        ])
        ->each(fn ($office) => Employee::create($office));
    }
}
