<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class HomeTest
 */
class HomeTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: /home
     *
     * @group all
     */
    public function testHomeRoute()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->visit('/home')
            ->seeStatusCode(200);
    }
}
