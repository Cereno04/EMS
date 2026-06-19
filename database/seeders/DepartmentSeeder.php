<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'Human Resources',
            'Information Technology',
            'Finance',
            'Accounting',
            'Sales',
            'Marketing',
            'Operations',
            'Customer Service',
            'Administration',
            'Production',
        ];

        foreach ($departments as $name) {
            Department::create(['name' => $name]);
        }
    }
}