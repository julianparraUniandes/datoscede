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
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TosTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(TemaTableSeeder::class);
    }
}
