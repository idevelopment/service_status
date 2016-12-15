<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'WWW'],
            ['name' => 'IMAP'],
            ['name' => 'POP3'],
            ['name' => 'FTP'],
            ['name' => 'SMTP'],
        ];

        $table = DB::table('services');
        $table->delete();
        $table->insert($data);
    }
}
