<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_can_create_an_address()
    {
        $this->actingAs(factory(User::class)->create())->post('/address', [
            'street' => "new",
            'city' => "rneogr",
            'pincode' => 1233221,
            'state' => 'penns',
            'phone_number' => 8909456721
        ])->assertSuccessful();

    }
}
