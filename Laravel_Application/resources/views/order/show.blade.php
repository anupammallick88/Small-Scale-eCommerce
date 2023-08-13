@extends('layouts.app')


@section('content')
    <?php $totalCost = 0; ?>
    <div class="container">
	<table class="table">
        <thead>
            <th scope="col" >#</th>
            <th scope="col">product</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">cost</th>
        </thead>
        <tbody>
        	<?php $count = 1?>
            @foreach ($products as $product)
            <tr>
                <th>{{ $count++ }}</th>
                <td><a href="/products/{{$product->id}}">{{ $product->title }}</a></td>
                <td>{{ $product->description }}</a></td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->cost * $product->pivot->quantity }}</a></td>
                <?php $totalCost += $product->cost * $product->pivot->quantity ?>
            </tr>
            @endforeach
        </tbody>

    </table>
    <br><hr>
        

    <br>

    <div class="row">
        <div class="col-md-8">
            <h3>Delivered to:</h3>
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{$address->state}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$address->city}}</h6>
                <p class="card-text">{{$address->street}}</p>
                <p class="card-text">{{$address->pincode}}</p>
                <p class="card-text">{{$address->phone}}</p>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3>Total Cart Value: {{$totalCost}}</h3>
        </div>
    </div>
    </div>

@endsection('content')