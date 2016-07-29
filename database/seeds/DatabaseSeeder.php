<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountrySeeder::class);
        $this->call(UserTableSeed::class);
        $this->call(IncidentLabelSeeder::class);
        $this->call(ServiceSeed::class);
    }
}
