@extends('layout.dashboard_layout')

@section('content')

 <center><h1>Edit This Waiter Info.</h1><br></center>
            <hr>
            <form action="{{ url('/waitereditprocess',$data->id) }}" method="post" class="form-control">
                @csrf
                <label>Waiter Name: </label>
                <input type="text" name="name" placeholder="Name" value="{{ $data->name }}" class="form-control"><br>
                
                <label>Waiter Phone Number: </label>
                <input type="text" name="phone" placeholder="Phone" value="{{ $data->phone }}" class="form-control"><br>
                
                <label>Waiter Address: </label>
                <input type="text" name="address" placeholder="Address" value="{{ $data->address }}" class="form-control">
                <br>
                
                <input type="submit" value="Update" class="btn btn-info" name="submit">
            </form>

@endsection