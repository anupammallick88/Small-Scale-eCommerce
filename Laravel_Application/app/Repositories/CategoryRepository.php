<?php

namespace App\Repositories;
use App\Categories;


class CategoryRepository
{
	public function categories()
	{
		return Categories::all();
	}

	public function find($id)
	{
		return Categories::findOrFail($id);
	}

	public function productsByCategoryId($id)
	{
		return $this->find($id)->products;
	}
}
