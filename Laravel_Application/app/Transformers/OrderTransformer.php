<?php

namespace App\Transformers;

use ArrayObject;

class OrderTransformer{

    public function transformOrderList($orders)
    {

        // change order interface in angular before using this transform

        // $orders = $orders->map(function($order){
        //     return [
        //         'id' => $order->id,
        //         'total' => $order->total,
        //         'address_id' => $order->address_id,
        //     ];
        // });
        return $orders;
    }

    public function transformOrderDetailsById($address, $products)
    {
        // $address = [
        //     'street' => $address->street,
        //     'city' => $address->city,
        //     'pincode' => $address->pincode,
        //     'state' => $address->state,
        //     'phone_number' => $address->phone_number,
        // ];

        // $products = $products->map(function($product){
        //     return [
        //         'title' => $product->title,
        //         'description' => $product->description,
        //         'cost' => $product->cost,
        //         'quantity' => $product->pivot->quantity,
        //     ];
        // });


        return ['address' => $address, 'products' => $products];


    }
}
