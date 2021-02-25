<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Todo::factory(5)->create();

    }
}

