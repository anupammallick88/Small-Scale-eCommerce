@extends('layouts.app')


@section('content')
<div class="container">
    <table class="table">
        <thead>
            <th scope="col" >#</th>
            <th scope="col">Date-Time</th>
            <th scope="col">Total</th>
        </thead>
        <tbody>
            <?php $count = 1?>
            @foreach ($orders as $order)
            <tr>
                <th>{{ $count++ }}</th>
                <td><a href="/orders/{{$order->id}}">{{ $order->created_at }}</a></td>
                <td>{{ $order->total }}</a></td>
            </tr>
            @endforeach
            
        </tbody>

    </table>
</div>
@endsection('content')