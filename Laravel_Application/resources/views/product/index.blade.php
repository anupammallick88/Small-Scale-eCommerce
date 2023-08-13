@extends('layouts.app')


@section('content')
    
    <table class="table">
        <thead>
            <th scope="col" >#</th>
            <th scope="col">Products</th>
            <th scope="col">Description</th>
        </thead>
        <tbody>
            <?php $count = 1?>
            @foreach ($products as $product)
            <tr>
                <th>{{ $count++ }}</th>
                <td><a href="/products/{{$product->id}}">{{ $product->title }}</a></td>
                <td>{{ $product->description }}</a></td>
            </tr>
            @endforeach
            
        </tbody>

    </table>

@endsection('content')