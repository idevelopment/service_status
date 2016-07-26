<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class IncidentsTest
 */
class IncidentsTest extends TestCase
{
    // DatabaseMigrations   = Trait for running database migrations.
    // DatabaseTransactions = Trait for the database queries.
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * URL:   GET: /incidents
     * ROUTE: incidents.index
     *
     * @group all
     * @group incidents
     */
    public function testIndex()
    {
        //
    }

    /**
     * URL:   GET: /incidents/open
     * ROUTE: incidents.open
     *
     * @group all
     * @group incidents
     */
    public function testIncidentsOpen()
    {
        //
    }

    /**
     * URL:   GET /incidents/show/{id}
     * ROUTE: incidents.show
     *
     * @group all
     * @group incidents
     */
    public function testIncidentShow()
    {
        //
    }

    /**
     * URL:   /incidents/closed
     * ROUTE: incidents.closed
     *
     * @group all
     * @group incidents
     */
    public function testIncidentsClosed()
    {
        //
    }

    /**
     * URL:   /incidents/create
     * ROUTE: incidents.create
     *
     * @group all
     * @group incidents
     */
    public function testIncidentsCreateView()
    {
        //
    }

    /**
     * URL:   /incidents/assigned/you
     * ROUTE: incidents.you
     *
     * @group all
     * @group incidents
     */
    public function testIncidentsAssigned()
    {
        //
    }

    /**
     * URL:   POST: /incidents/store
     * ROUTE: incidents.store
     *
     * @group all
     * @group incidents
     */
    public function testIncidentsCreatePost()
    {
        //
    }
}
