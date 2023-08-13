@extends('layouts.app')


@section('content')
	<div class="container">
		<div class="row justify-content-center">
	        <div class="col-md-8">
	            <h3>Create Category</h3>
	            <form method="post" action="">
	                @csrf
	                <div class="form-group">
	                    <label for="name">name</label>
	                    <input type="name" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$categories->name}}">
	                </div>
	                <div class="form-group">
	                    <label for="description">Description</label>
	                    <input type="description" class="form-control" name="description" id="description" placeholder="Enter Description" value="{{$categories->description}}">
	                </div>
	                <button type="submit" class="btn btn-secondary">Submit</button>
	            </form>
	        </div>
	    </div>
	</div>

@endsection('content')