<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $level = [100, 200, 300, 400, 500];
        $departments = ['Computer Science', 'Mathematics', 'Physics', 'Biology', 'Chemistry', 'Statistics', 'Micro-biology'];
        $prefix = ['CSC', 'MTH', 'STAT', 'BIO', 'CHEM', 'PHY', 'GST', 'MCB'];

        for ($i = 0; $i < random_int(500, 1000); $i++) {
            User::create([
                'name' => $faker->firstName . " " . $faker->lastName,
                'reg_no' => $prefix[array_rand($prefix)] . '/'. Str::random(4) . '/00' . random_int(1, 50),
                'email' =>$faker->email,
                'phone' =>$faker->phoneNumber,
                'level' =>$level[array_rand($level)],
                'department' =>$departments[array_rand($departments)],
                'password' => Hash::make('password'),
            ])->attachRole('students');
        }
    }
}
