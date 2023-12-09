<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // add data with tinker on console
        // php artisan migrate:freash : drop all data on table

        // php artisan db:seed : running library seeder
        // php artisan migrate:fresh --seed : drop all data on table, with add data seeder
        // \App\Models\User::factory(10)->create(); // generate fake data 10

        // manual inject
        User::create([
            'name' => 'bogi',
            'email' => 'bogi@test.com',
            'password' => bcrypt('123'),
            'role' => '1'
        ]);
    }
}
