<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class ProfileTest
 */
class ProfileTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: /profile
     *
     * @group all
     * @group auth
     */
    public function testProfileChangeView()
    {
        $this->withoutMiddleware();
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->visit('/profile')
            ->seeStatusCode(200);
    }

    /**
     * POST: /profile
     *
     * @group all
     * @group auth
     */
    public function testProfileInsert()
    {
        $this->withoutMiddleware();
        $user = factory(App\User::class)->create();

        $old['name']     = $user->name;
        $old['email']    = $user->email;
        $old['password'] = $user->password;

        $new['name']     = 'Jhon Doe';
        $new['email']    = 'jhondoe@example.com';

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->seeInDatabase('users', $old)
            ->post('/profile', $new)
            ->seeStatusCode(302);
    }

    /**
     * POST: /profile
     *
     * @group all
     * @group auth
     */
    public function testProfileInsertValidation()
    {
        $this->withoutMiddleware();
        $user = factory(App\User::class)->create();

        $old['name']     = $user->name;
        $old['email']    = $user->email;
        $old['password'] = $user->password;

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->seeInDatabase('users', $old)
            ->post('profile', [])
            ->seeInDatabase('users', $old)
            ->seeStatusCode(302)
            ->assertHasOldInput();
    }
}
