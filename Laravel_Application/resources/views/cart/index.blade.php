@extends('layouts.app')


@section('content')
    <?php $totalCost = 0; ?>
    <div class="container">
	<table class="table">
        <thead>
            <th scope="col" >#</th>
            <th scope="col">product</th>
            <th scope="col">Description</th>
            <th scope="col">quantity</th>
            <th scope="col">cost</th>
        </thead>
        <tbody>
        	<?php $count = 1?>
            @foreach ($products as $product)
            <tr>
                <th>{{ $count++ }}</th>
                <td><a href="/products/{{$product->id}}">{{ $product->title }}</a></td>
                <td>{{ $product->description }}</td>
                <td>
                    <form method="post" action="/carts/update/product/{{$product->id}}">
                        @csrf
                        <input type="number" name="quantity" value="{{ $product->pivot->quantity }}" style="width: 3em;">
                        <button class="btn-sm" type="submit">update</button>
                    </form>
                </td>
                <td>{{ $product->cost * $product->pivot->quantity }}</td>
                <td>
                    <form method="post" action="carts/{{$product->id}}">
                        @csrf
                        @method('delete')
                    </form>
                </td>
                <?php $totalCost += $product->cost * $product->pivot->quantity ?>
            </tr>
            @endforeach
        	
        </tbody>

    </table>
    <br><hr>
        

    <br>

    <div class="row">
        <div class="col-md-8">
            <h3>Total Cart Value: {{$totalCost}}</h3>
        </div>
        @if($totalCost != 0)
        <div class="col-md-4">
            <a href="/address" class="btn btn-secondary">Buy Now</a>
        </div>
        @endif
    </div>
    </div>

@endsection('content')