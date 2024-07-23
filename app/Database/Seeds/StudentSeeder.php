<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $builder = $this->db->table('students');

        for ($i = 0; $i < 20; $i++) {
            $builder->insert($this->generateStudents());
        }
    }

    public function generateStudents()
    {
        $faker = Factory::create();

        return  [
            'name' => $faker->name,
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
        ];
    }
}
