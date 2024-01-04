<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'Laravel Daily',
            'email' => 'laraveldaily@example.com',
            'logo' => 'storage/app/public/LaravelDailyLogo.png',
            'website' => 'https://www.LaravelDaily.com',
        ]);
    }
}
