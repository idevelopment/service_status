<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VariousTest extends TestCase
{
    // DatabaseMigrations   = Trait for running database migrations.
    // DatabaseTransactions = Trait for the database queries.
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * URL:   /
     * ROUTE: app
     *
     * @group all
     * @group various
     */
    public function testUrlRoot()
    {
        //
    }

    /**
     * URL:   /home
     * ROUTE: app.home
     *
     * @group all
     * @group various
     */
    public function testHome()
    {
        //
    }
}
