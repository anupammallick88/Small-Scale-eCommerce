@extends('layouts.app')


@section('content')
<div class="container">
    <div>
        <h2>please select a address</h2>
    </div>
	<table class="table">
        <thead>
            <th scope="col" >#</th>
            <th scope="col">Street</th>
            <th scope="col">City</th>
            <th scope="col">Pin Code</th>
            <th scope="col">state</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
        	<?php $count = 1?>
            @foreach ($addresses as $address)
            <tr>
                <th>{{ $count++ }}</th>
                <td><a href="/address/{{$address->id}}">{{ $address->street }}</a></td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->pincode }}</td>
                <td>{{ $address->state }}</td>
                <td>{{ $address->phone_number }}</td>
                <td>
                    <form method="get" action="address/{{$address->id}}/edit">
                        @csrf
                        <button type="submit">edit</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="address/{{$address->id}}">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form>
                </td>
                <td>
                    <form method="get" action="orders/address/{{$address->id}}">
                        @csrf
                        <button type="submit">Proceed with this address</button>
                    </form>
                </td>
            </tr>
            @endforeach
        	
        </tbody>
    </table>
    <a href="/address/create" class="btn btn-secondary">Add a new address</a>

</div>
@endsection