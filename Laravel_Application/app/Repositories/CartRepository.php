<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class CartRepository
{

	public function user()
	{
		return auth()->user();
	}

	public function allProducts()
	{
        return Auth::user()->cart->products;
	}

	public function addToCart($id)
	{
        $productInCart = Auth::user()->cart->products()->find($id);

        if( $productInCart === null)
        {
            return Auth::user()->cart->products()->attach($id, ['quantity'=>1]);
        }

        $productQuantityInCart = $productInCart->pivot->quantity;

        return $this->updateProductQuantity($productQuantityInCart+1, $id);
	}

	public function updateProductQuantity($quantity, $product_id)
	{
		return Auth::user()->cart->products()->updateExistingPivot($product_id, ['quantity' => $quantity]);
	}

	public function destroy()
	{
        return Auth::user()->cart->clear();
    }

    public function removeProductFromCart($id){

        // Log::debug('Some message.');

        return Auth::user()->cart->products()->detach($id);
    }
}
