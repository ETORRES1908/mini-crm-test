<?php

namespace Database\Seeders;

use App\Models\Company;
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
        $companies = Company::pluck('id')->toArray();

        Employee::factory()->count(100)->create([
            'company_id' => function () use ($companies) {
                return $companies[array_rand($companies)];
            }
        ]);
    }
}
