<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
	public function products()
	{
		return Product::all();
	}

	public function find($id)
	{
		return Product::findOrFail($id);
	}

	public function store($data)
	{
		return Product::create($data);
	}

	public function update($data, $id)
	{
		return $this->find($id)->update($data);
	}

	public function delete($id)
	{
        $category =  $this->find($id)->category->id;

        $product->delete();

        return $category;

        // return $this->find($id)->delete();
	}
}
