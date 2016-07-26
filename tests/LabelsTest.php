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

        $this->seeInDatabase('labels', ['id' => $label->id]);
        $this->visit(route('label.destroy', ['id' => $label->id]));
        $this->dontSeeInDatabase('labels', ['id' => $label->id]);
        $this->seeStatusCode(200);
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
        $this->withoutMiddleware();
        $user  = factory(App\User::class)->create();
        $label = factory(App\Label::class)->create();

        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // Input
        $input['name']        = 'Label name';
        $input['color']       = '#ff0000';
        $input['description'] = 'This is a description';

        // DB checksums.
        $oldDb = [
            'name'        => $label->name,
            'color'       => $label->color,
            'description' => $label->description
        ];

        $newDb = [
            'id'          => $label->id,
            'name'        => $input['name'],
            'color'       => $input['color'],
            'description' => $input['description']
        ];

        // Authenticate user.
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // with validation errors.
        $this->seeInDatabase('labels', $oldDb);
        $this->post(route('label.update', ['id' => $label->id], []));
        $this->seeStatusCode(302);
        $this->assertHasOldInput();

        // Without validation errors.
        $this->seeInDatabase('labels', $oldDb);
        $this->post(route('label.update', ['id' => $label->id], $input));
        // $this->dontSeeInDatabase('labels', $oldDb);
        // $this->seeInDatabase('labels', $newDb);
        $this->seeStatusCode(302);

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

        // Authenticate user.
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // with validation errors.

        // Without validation errors.
    }
}
