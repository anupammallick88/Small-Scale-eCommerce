<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CartRepository;
use App\Http\Requests\CartUpdateRequest;
use App\Transformers\CartTransformer;

class CartController extends Controller
{

    private $repository;
    private $transformer;

    public function __construct(CartRepository $repository, CartTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * Display a list of products in cart.
     *
     * @return array of products
     */
    public function index()
    {
        $products = $this->repository->allProducts();

        return $this->transformer->transform($products);

    }


    /**
     * Add prouct to cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product_id
     * @return success message
     */
    public function addToCart(Request $request, $product_id)
    {
        $this->repository->addToCart($product_id);

        return ['message' => 'product added successfully.'];

    }

    /**
     * Update product quantity in cart.
     *
     * @param App\Http\Requests\CartUpdateRequest $request
     * @param int $product_id
     * @return success message
     */
    public function updateProductQuantity(CartUpdateRequest $request, $product_id)
    {
        $quantity = $request->all();

        $this->repository->updateProductQuantity($quantity, $product_id);

        return redirect('/carts');
    }

    /**
     * remove prouct to cart.
     *
     * @param  int  $product_id
     * @return success message
     */
    public function removeFromCart($product_id)
    {

        $this->repository->removeProductFromCart($product_id);

        return ['message' => 'product successfully removed'];

    }

    /**
     * Remove all products from the cart.
     *
     * @return success message
     */
    public function destroy()
    {
        $this->repository->destroy();

        return ['message' => 'all product successfully removed'];

    }


}
