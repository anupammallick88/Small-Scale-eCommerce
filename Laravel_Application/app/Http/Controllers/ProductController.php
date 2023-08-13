<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Repositories\ProductRepository;



class ProductController extends Controller
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->products();

        return $products;
    }



    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return product
     */
    public function show($id)
    {
        $product = $this->repository->find($id);

        return $product;
    }
}
