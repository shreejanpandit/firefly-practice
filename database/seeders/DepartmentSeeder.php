<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['name' => 'Cardiology', 'location' => 'Main Building, 2nd Floor'],
            ['name' => 'Orthopedics', 'location' => 'Wing B, 3rd Floor'],
            ['name' => 'Neurology', 'location' => 'East Wing, 1st Floor'],
            ['name' => 'Pediatrics', 'location' => 'South Wing, 4th Floor'],
            ['name' => 'Oncology', 'location' => 'West Building, 5th Floor'],
            ['name' => 'Internal Medicine', 'location' => 'North Wing, 2nd Floor'],
            ['name' => 'Emergency Medicine', 'location' => 'Emergency Building, Ground Floor'],
            ['name' => 'Radiology', 'location' => 'Radiology Center, 1st Floor'],
            ['name' => 'Anesthesiology', 'location' => 'Surgical Wing, 3rd Floor'],
            ['name' => 'Dermatology', 'location' => 'West Wing, 2nd Floor'],
            ['name' => 'Gastroenterology', 'location' => 'Main Building, 4th Floor'],
            ['name' => 'Obstetrics and Gynecology', 'location' => 'Women\'s Health Center, 1st Floor'],
            ['name' => 'Urology', 'location' => 'East Wing, 3rd Floor'],
            ['name' => 'Ophthalmology', 'location' => 'Eye Clinic, 4th Floor'],
            ['name' => 'Pulmonology', 'location' => 'Respiratory Center, 2nd Floor'],
            ['name' => 'Rheumatology', 'location' => 'North Wing, 3rd Floor'],
            ['name' => 'Nephrology', 'location' => 'Kidney Center, 1st Floor'],
            ['name' => 'Hematology', 'location' => 'Blood Disorders Unit, 2nd Floor'],
            ['name' => 'Infectious Diseases', 'location' => 'Infectious Disease Ward, 5th Floor'],
            ['name' => 'Endocrinology', 'location' => 'Hormone and Metabolism Center, 3rd Floor'],
        ]);
    }
}
