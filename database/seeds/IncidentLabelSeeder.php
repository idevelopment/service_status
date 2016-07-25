<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidentLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Open'],
            ['name' => 'Closed'],
            ['name' => 'In Progress']
        ];

        $table = DB::table('incident_statuses');
        $table->delete();
        $table->insert($data);
    }
}
