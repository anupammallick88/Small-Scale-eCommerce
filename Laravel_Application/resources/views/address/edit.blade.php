@extends('layouts.app')


@section('content')
	<div class="container">
		<div class="row justify-content-center">
	        <div class="col-md-8">
	            <h3>Edit Address</h3>
	            <form method="post" action="/address/{{$address->id}}">
	                @csrf
	                @method('patch')
	                <div class="form-group">
	                    <label for="street">street</label>
	                    <input type="text" class="form-control" name="street" id="street" placeholder="Enter street" value="{{$address->street}}">
	                </div>
	                <div class="form-group">
	                    <label for="city">City</label>
	                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" value="{{$address->city}}">
	                </div>
	                <div class="form-group">
	                    <label for="pincode">PinCode</label>
	                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter pincode" value="{{$address->pincode}}">
	                </div>
	                <div class="form-group">
	                    <label for="state">state</label>
	                    <input type="text" class="form-control" name="state" id="state" placeholder="Enter state" value="{{$address->state}}">
	                </div>
	                <div class="form-group">
	                    <label for="phone_number">phone</label>
	                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter phone number" value="{{$address->phone_number}}">
	                </div>
	                <button type="submit" class="btn btn-secondary">Submit</button>
	            </form>
	        </div>
	    </div>
	</div>

@endsection('content')