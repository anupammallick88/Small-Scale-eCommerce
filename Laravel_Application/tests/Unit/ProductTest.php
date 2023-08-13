<?php

namespace Tests\Unit;
use App\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Factory;

class ProductTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_a_product()
    {
        $product = factory(Product::class)->create();

        $getLatestProduct = DB::table('products')->orderBy('id', 'desc')->first();

        $this->assertEquals($product->id, $getLatestProduct->id);
    }
}
