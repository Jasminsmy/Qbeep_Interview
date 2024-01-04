<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company_id' => 1,
            'email' => 'john.doe@email.com',
            'phone' => '1234567890',
        ]);
    }
}
