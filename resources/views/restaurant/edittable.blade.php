@extends('adminHome')

@section('content')

 <center><h1>Edit This Table Info.</h1><br></center>
            <hr>
            <form action="{{ url('/tableeditprocess',$data->id) }}" method="post" class="form-control">
                @csrf
                <label>Table Name: </label>
                <input type="text" name="tname" placeholder="Name" value="{{ $data->tname }}" class="form-control"><br>
                
                <label>Table Description: </label>
                <input type="text" name="description" placeholder="Description" value="{{ $data->description }}" class="form-control"><br>
                
                <input type="submit" value="Update" class="btn btn-info" name="submit">
            </form>

@endsection