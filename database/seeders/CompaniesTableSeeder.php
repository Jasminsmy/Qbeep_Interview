<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'Laravel Daily',
            'email' => 'laraveldaily@example.com',
            'logo' => 'storage/app/public/logos/LaravelDailyLogo.png',
            'website' => 'https://www.LaravelDaily.com',
        ]);
    }
}
