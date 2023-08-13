<?php

namespace Tests\Unit;

use App\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;
use App\Address;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    // use DatabaseTransactions;

    protected $user_id;



    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $user->cart()->create();
        $this->user_id = $user->id;
        $this->actingAs($user, 'api');
    }



    public function test_a_user_can_log_in()
    {
        $this->post("api/login", [
            'email' => "shivam@gmail.com",
            'password' => "qqqqqqqq"
        ])
        ->assertJson([
            'access_token' => true
            ]);

    }

    public function test_a_user_can_register()
    {
        $this->post("api/register", [
            'name' => 'test',
            'email' => 'shivam1sdfnjk@gmail.com',
            'password' => 'qqqqqqqq',
            'password_confirmation' => 'qqqqqqqq',
        ])
        ->assertJson([
            'access_token' => true
        ]);
    }

    public function test_a_user_can_get_cart()
    {
        return $this->get('api/carts')
            ->assertOk();
    }

    public function test_a_user_can_add_product_to_cart()
    {
        $product = factory(Product::class)->create();

        $this->post('api/carts/'.(string)$product->id, [])
                    ->assertStatus(200);

        $this->test_a_user_can_get_cart()
            ->assertJsonCount(1);
    }

    public function test_a_user_can_buy_product()
    {

        $address = factory(Address::class, ['user_id' => $this->user_id])->create();

        $this->test_a_user_can_add_product_to_cart();

        $this->post('api/orders/', ['address_id' => $address[0]->id])
            ->assertJson([
                'message' => 'Order Successfully Placed',
                'order_id' => true
            ]);

    }
}
