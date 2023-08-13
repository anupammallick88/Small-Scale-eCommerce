@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">{{$product->title}}</div>

        <div class="card-body">
            <p>{{$product->description}}</p>
            <p><b>Price: </b>{{$product->cost}}</p>
        </div>    
    </div>
    <br>
    <div class="row justify-content-center">
        <form method="post" action="/carts/{{$product->id}}">
            @csrf
            <button class="btn btn-secondary">Add To Cart</button>
        </form>
    </div>
</div>
@endsection
