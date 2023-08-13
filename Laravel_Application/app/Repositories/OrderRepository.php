<?php

namespace App\Repositories;

use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
	public function all()
	{
        $user = Auth::user();

		return $user->orders;
	}

	public function find($id)
	{
		return Order::findOrFail($id);
	}

	public function orderAddress($order)
	{
		// use relation

		return $order->address;

	}

	public function orderProducts($order)
	{
		return $order->products;
	}

	public function getTotal($products)
	{
        $total = 0;

		foreach ($products as $product) {
        	$total += $product->cost * $product->pivot->quantity;
        }

        return $total;
	}

	public function cartEmpty($user){
		return $user->cart->clear();
	}

	public function placeOrder($address_id)
	{
		$user = Auth::user();

        $products = $user->cart->products;

        $total = $this->getTotal($products);

        $order = $user->orders()->create([
            'total' => $total,
            'address_id' => $address_id,
        ]);

        foreach ($products as $product) {
        	$order->products()->attach($product->id, ['quantity'=>$product->pivot->quantity]);
        }

        $this->cartEmpty($user);

        return ["message" => 'Order Successfully Placed', 'order_id' => $order->id];
    }

    public function buyNow($product_id, $address_id){
        $user = Auth::user();

        $product = Product::findOrFail($product_id);

        $order = $user->orders()->create([
            'total' => $product->cost,
            'address_id' => $address_id,
        ]);

        $order->products()->attach($product->id, ['quantity'=>1]);

        return $order->id;
    }

}
