@extends('layouts.app')


@section('content')
    
	<table class="table">
        <thead>
            <th scope="col" >#</th>
            <th scope="col">Categories</th>
            <th scope="col">Description</th>
        </thead>
        <tbody>
        	<?php $count = 1?>
            @foreach ($categories as $category)
            <tr>
                <th>{{ $count++ }}</th>
                <td><a href="/categories/{{$category->id}}">{{ $category->name }}</a></td>
                <td>{{ $category->description }}</a></td>
            </tr>
            @endforeach
        	
        </tbody>

    </table>

@endsection('content')