<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users first
        $users = User::factory(10)->create();

        foreach ($users as $user) {
            Patient::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
