<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class AccountTest
 */
class AccountTest extends TestCase
{
    // DatabaseMigrations   = Trait for running database migrations.
    // DatabaseTransactions = Trait for the database queries.
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: /profile
     *
     * @group all
     * @group profile
     */
    public function testProfileUpdateView()
    {
        $user = factory(App\User::class)->create();

        // Authenticate the user.
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // Test the route
        $this->visit(route('profile.view'));
        $this->seeStatusCode(200);
    }

    /**
     * POST: /profile/update/security
     *
     * @group all
     * @group profile
     */
    public function testUpdatePassword()
    {
        $this->withoutMiddleware();
        $user = factory(App\User::class)->create();

        // Input
        $input['password']              = 'password';
        $input['password_confirmation'] = 'password';

        // Authenticate the user.
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // Without validation errors.
        $this->seeInDatabase('users', ['password' => $user->password]);
        $this->post(route('profile.update.security'), $input);
        $this->seeStatusCode(302);

        // With validation errors
        $this->post(route('profile.update.security'), []);
        $this->seeStatusCode(302);
        $this->assertHasOldInput();
    }

    /**
     * POST: /profile/update/information
     *
     * @group all
     * @group profile
     */
    public function testUpdateInformation()
    {
        $this->withoutMiddleware();
        $user = factory(App\User::class)->create();

        // Input
        $input['name']  = 'John Doe';
        $input['email'] = 'example@domain.tld';

        // Authenticate the user.
        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        // With validation errors.
        $this->seeInDatabase('users', ['name' => $user->name, 'email' => $user->email]);
        $this->post(route('profile.update.information', []));
        $this->seeInDatabase('users', ['name' => $user->name, 'email' => $user->email]);
        $this->seeStatusCode(302);
        $this->assertHasOldInput();

        // Without validation errors
        $this->seeInDatabase('users', ['name' => $user->name, 'email' => $user->email]);
        $this->post(route('profile.update.information', $input));
        $this->dontSeeInDatabase('users', ['name' => $user->name, 'email' => $user->email]);
        $this->seeInDatabase('users', ['name' => $input['name'], 'email' => $input['email']]);
        $this->seeStatusCode(302);
    }
}
