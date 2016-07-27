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
        $user = factory(App\User::class)->create();

        // Authenticate user
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // Test the route
        $this->visit(route('incidents.index'));
        $this->seeStatusCode(200);
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
        $user = factory(App\User::class)->create();
        
        // Authenticate user.
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);
        
        // Testing the route
        $this->visit(route('incidents.open'));
        $this->seeStatusCode(200);
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
        $user = factory(App\User::class)->create();

        // Authenticate user
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // Test route
        $this->visit(route('incidents.closed'));
        $this->seeStatusCode(200);
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
        $user = factory(App\User::class)->create();

        // Authenticate user.
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // Test the route
        $this->visit(route('incidents.create'));
        $this->seeStatusCode(200);
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
        $user = factory(App\User::class)->create();

        // Authenticate user
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // test route.
        $this->visit(route('incidents.you'));
        $this->seeStatusCode(200);
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
        $user     = factory(App\User::class)->create();
        $incident = factory(App\Incidents::class)->create();

        // Input
        $input[''] = '';

        // DB checksums.
        $oldDb = [];
        $newDb = [];

        // Authenticate user.
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // With validation errors
        $this->post(route('incidents.store'), []);
        $this->seeStatusCode(302);
        $this->assertHasOldInput();

        // Without validation errors.
    }
}
