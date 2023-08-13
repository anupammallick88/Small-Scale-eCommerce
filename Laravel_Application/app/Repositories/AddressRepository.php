<?php

namespace App\Repositories;
use App\Address;
use Illuminate\Support\Facades\Auth;

class AddressRepository
{
	public function find($id)
	{
		return Address::findOrFail($id);
	}

	public function addresses()
	{
        $user = Auth::user();

		return $user->addresses;
	}

	public function store($data)
	{
        // $user = $request->user();

        $user = Auth::user();

		return $user->addresses()->create($data);
	}

	public function update($data, $id)
	{
		return $this->find($id)->update($data);
	}

	public function delete($id)
	{
		return $this->find($id)->delete();
	}
}
