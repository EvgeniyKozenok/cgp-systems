<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->count(rand(10000, 12000))->create()->each(function (Company $company) {
            $company->users()->attach(User::inRandomOrder()->limit(rand(50, 100))->pluck('id'));
        });
    }
}
