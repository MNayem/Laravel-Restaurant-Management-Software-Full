@extends('layout.dashboard_layout')

@section('content')

 <center><h1>Edit This Product Info.</h1><br></center>
            <hr>
            <form action="{{ url('/producteditprocess',$data->id) }}" method="post" class="form-control" enctype="multipart/form-data">
                @csrf
                <label>Product Name: </label>
                <input type="text" name="title" placeholder="Name" value="{{ $data->title }}" class="form-control"><br>
                
                <label>Description: </label>
                <input type="text" name="description" placeholder="Description" value="{{ $data->description }}" class="form-control"><br>
                
                <label>Buying Price: </label>
                <input type="number" step="any" name="buyingprice" placeholder="Buying Price" value="{{ $data->buyingprice }}" class="form-control">
                <br>
                
                <label>Selling Price: </label>
                <input type="number" step="any" name="sellingprice" placeholder="Selling Price" value="{{ $data->sellingprice }}" class="form-control"> <br>

                <label>Estimated Profit: </label>
                <input type="number" name="updated_price" placeholder="Updated Price" value="{{ $data->updated_price }}" class="form-control"><br>
                
                <!--<label>Image: </label>-->
                <!--<input type="file" name="image">-->
                <!--<img src="{{ asset($data->image) }}"  style="width:100px;height:100px;" ><br><br>-->
                
                <input type="submit" value="Update" class="btn btn-info" name="submit">
            </form>

@endsection