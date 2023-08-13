<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Http\Requests\BuyNowRequest;
use App\Http\Requests\OrderStoreRequest;
use App\Transformers\OrderTransformer;

class OrderController extends Controller
{
    private $repository;
    private $transformer;

    public function __construct(OrderRepository $repository, OrderTransformer $transformer){

        $this->repository = $repository;
        $this->transformer = $transformer;

    }
    /**
     * Display a listing of the orders.
     *
     * @return array of orders
     */
    public function index()
    {
        $orders = $this->repository->all();

        return $this->transformer->transformOrderList($orders);
    }


    /**
     * Store a newly created order in storage.
     *
     * @param  App\Http\Requests\OrderStoreRequest  $request
     * @return object of success message and order_id
     */
    public function store(OrderStoreRequest $request)
    {

        $data = $request->all();

        return $this->repository->placeOrder($data['address_id']);
    }

    /**
     * Display the specified order.
     *
     * @param  int  $id
     * @return object of address and products
     */
    public function show($id)
    {
        $order=$this->repository->find($id);

        $address = $this->repository->orderAddress($order);

        $products = $this->repository->orderProducts($order);

        return $this->transformer->transformOrderDetailsById($address, $products);
    }

    /**
     * Buy Now a single product.
     *
     * @param App\Http\Requests\BuyNowRequest $request
     * @return product_id
     */
    public function buyNow(BuyNowRequest $request){

        $data = $request->all();

        return $this->repository->buyNow($data['product_id'], $data['address_id']);
    }
}
