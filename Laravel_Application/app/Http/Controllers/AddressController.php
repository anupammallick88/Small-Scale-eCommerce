<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Http\Requests\AddressStoreRequest;
use App\Repositories\AddressRepository;


class AddressController extends Controller
{
    private $repository;

    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of all address of authenticated user
     *
     * @return array of address
     */
    public function index()
    {
        $addresses = $this->repository->addresses();

        return $addresses;

    }


    /**
     * Store a newly created Address in storage.
     *
     * @param  App\Http\Requests\AddressStoreRequest  $request
     * @return address object
     */
    public function store(AddressStoreRequest $request)
    {

        $data = $request->all();

        $result = $this->repository->store($data);

        return $result;

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\AddressStoreRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressStoreRequest $request, $id)
    {
        $data = $request->all();

        $this->repository->update($data, $id);

        return redirect('/address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return ['message' => 'address removed successfully'];
    }
}
