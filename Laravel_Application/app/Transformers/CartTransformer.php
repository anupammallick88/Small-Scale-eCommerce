<?php

namespace App\Transformers;

class CartTransformer{

    public function transform($products){

        // change the interface in angular then use this transform


        // $products = $products->map(function($product){
        //     return [
        //         'title' => $product->title,
        //         'description' => $product->description,
        //         'cost' => $product->cost,
        //         'quantity' => $product->pivot->quantity,
        //     ];
        // });


        return $products;
    }
}
