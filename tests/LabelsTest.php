<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class LabelsTest
 */
class LabelsTest extends TestCase
{
    // DatabaseMigrations   = Trait for running database migrations.
    // DatabaseTransactions = Trait for the database queries.
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * URL:   GET: /labels
     * ROUTE: label.index
     *
     * @group all
     * @group labels
     */
    public function testIndex()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);
        $this->visit(route('label.index'));
        $this->seeStatusCode(200);
    }

    /**
     * URL:   GET: /labels/create
     * ROUTE: label.insert
     *
     * @group all
     * @group labels
     */
    public function testCreateView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);
        $this->visit(route('label.insert'));
        $this->seeIsAuthenticatedAs(200);
    }

    /**
     * URL:   GET: /labels/delete/{id}
     * ROUTE: label.destroy
     *
     * @group all
     * @group labels
     */
    public function testDelete()
    {
        $user  = factory(App\User::class)->create();
        $label = factory(App\Label::class)->create();

        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // Delete test cannot create.
        // Cause: Missing factory
    }

    /**
     * URL:   GET: /labels/update/{id}
     * ROUTE: label.edit
     *
     * @group all
     * @group labels
     */
    public function testUpdateView()
    {
        $user  = factory(App\User::class)->create();
        $label = factory(App\Label::class)->create();

        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // Update test cannot create.
        // Cause: Missing factory
    }


    /**
     * URL:   POST: /labels/update/{id}
     * ROUTE: label.update
     *
     * @group all
     * @group labels
     */
    public function testUpdatePost()
    {
        $user  = factory(App\User::class)->create();
        $label = factory(App\Label::class)->create();

        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // Update test cannot create.
        // Cause: Missing factory
    }

    /**
     * URL:   POST: /labels/create
     * ROUTE: label.create
     *
     * @group all
     * @group labels
     */
    public function testCreatePost()
    {
        $user = factory(App\User::class)->create();
    }
}
