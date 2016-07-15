<?php

use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name']     = 'Jhon Doe';
        $data['email']    = 'admin@example.com';
        $data['password'] = bcrypt('admin');

        \App\User::create($data);
    }
}
