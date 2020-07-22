<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        factory(\App\Model\Projects::class, 40)->create();
        factory(\App\Model\Tasks::class, 150)->create();

    }
}
