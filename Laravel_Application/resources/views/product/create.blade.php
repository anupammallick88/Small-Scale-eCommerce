@extends('layouts.app')


@section('content')
	<div class="container">
		<div class="row justify-content-center">
	        <div class="col-md-8">
	            <h3>Add Product</h3>
	            <form method="post" action="/products">
	                @csrf
	                <div class="form-group">
	                    <label for="title">Title</label>
	                    <input type="title" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ old('title') }}">
	                </div>
	                <div class="form-group">
	                    <label for="description">Description</label>
	                    <input type="description" class="form-control" name="description" id="description" placeholder="Enter Description" value="{{ old('description') }}">
	                </div>
	                <div class="form-group">
	                    <label for="cost">Cost</label>
	                    <input type="cost" class="form-control" name="cost" id="cost" placeholder="Enter Cost" value="{{ old('cost') }}">
	                </div>
	                <div class="form-group">
	                    <label for="category">Select Category</label>
	                    <select class="custom-select mr-sm-2" id="category" name="category_id">
								        <!-- <option selected value="878">Select a cate</option> -->
								        @foreach($categories as $category)
								        <option value="{{$category->id}}">{{$category->name}}</option>
								        @endforeach
								      </select>
	                </div>
	                <button type="submit" class="btn btn-secondary">Submit</button>
	            </form>
	        </div>
	    </div>
	    @if ($errors->any())
	    <br>
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

	</div>

@endsection('content')