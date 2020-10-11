<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Laravel^8
        \App\Models\User::factory(5)->create();
        //Laravel^7
        // factory(\App\Models\User::class, 5)->create();
    }
}
