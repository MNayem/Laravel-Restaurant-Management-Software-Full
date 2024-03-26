@extends('adminHome')

@section('content')

 <center><h1>Edit This Cart Item Info.</h1><br></center>
            <hr>
            <form action="{{ url('/tableCarteditprocess',$data->id) }}" method="post" class="form-control">
                @csrf
                <label>Food Item Name: </label>
                <input type="text" name="fname" placeholder="Food Item Name" value="{{ $data->fname }}" class="form-control"><br>
                
                <label>Table Number: </label>
                <input type="number" name="tablenumber" placeholder="Table Number" value="{{ $data->tablenumber }}" class="form-control"><br>
                
                <label>Amount: </label>
                <input type="number" step="any" name="amount" placeholder="Amount" value="{{ $data->amount }}" class="form-control"><br>
                
                <label>Product Quantity: </label>
                <input type="number" name="product_quantity" placeholder="Product Quantity" value="{{ $data->product_quantity }}" class="form-control"><br>
                
                <label>Total Amount: </label>
                <input type="number" step="any" name="tamount" placeholder="Total Amount" value="{{ $data->tamount }}" class="form-control"><br>
                
                <label>Date: </label>
                <input type="date" name="date" placeholder="Date" value="{{ $data->date }}" class="form-control"><br>
                
                <input type="submit" value="Update" class="btn btn-info" name="submit">
            </form>

@endsection