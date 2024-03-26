@extends('adminHome')

@section('content')

 <center><h1>Edit This KOT Item Info.</h1><br></center>
            <hr>
            <form action="{{ url('/kotOrdereditprocess',$data->id) }}" method="post" class="form-control">
                @csrf
                <label>Food Number: </label>
                <input type="number" name="food_number" placeholder="Food Number" value="{{ $data->food_number }}" class="form-control"><br>
                
                <label>Food Item Name: </label>
                <input type="text" name="food_name" placeholder="Food Name" value="{{ $data->food_name }}" class="form-control"><br>
                
                <label>Quantity: </label>
                <input type="number" name="quantity" placeholder="Quantity" value="{{ $data->quantity }}" class="form-control"><br>
                
                <input type="submit" value="Update" class="btn btn-info" name="submit">
            </form>

@endsection