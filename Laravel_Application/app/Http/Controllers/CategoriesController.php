<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\repositories\CategoryRepository;

class CategoriesController extends Controller
{
    private $repository;

    public function __construct(CategoryRepository $repository){

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array of categories
     */
    public function index()
    {
        $categories = $this->repository->categories();

        return $categories;

    }



    /**
     * Display all products by category id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = $this->repository->productsByCategoryId($id);

        return $products;

    }

}
