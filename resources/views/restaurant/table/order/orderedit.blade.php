@extends('adminHome')

@section('content')

 <center><h1>Edit This Cart Item Info.</h1><br></center>
            <hr>
            <form action="{{ url('/tableOrdereditprocess',$data->id) }}" method="post" class="form-control">
                @csrf
                <label>Customer Name: </label>
                <input type="text" name="cname" placeholder="Customer Name" value="{{ $data->cname }}" class="form-control"><br>
                
                <label>Vat: </label>
                <input type="number" step="any" name="vat" placeholder="Vat" value="{{ $data->vat }}" class="form-control"><br>
                
                <label>Total Amount: </label>
                <input type="number" step="any" name="tamount" placeholder="Total Amount" value="{{ $data->tamount }}" class="form-control"><br>
                
                <label>Date: </label>
                <input type="date" name="date" placeholder="Date" value="{{ $data->date }}" class="form-control"><br>
                
                <label>Phone Number: </label>
                <input type="text" name="phone_no" placeholder="Phone Number" value="{{ $data->phone_no }}" class="form-control"><br>
                
                <label>Payment Type: </label>
                <input type="text" name="payment_type" placeholder="Payment Type" value="{{ $data->payment_type }}" class="form-control"><br>
                
                <input type="submit" value="Update" class="btn btn-info" name="submit">
            </form>

@endsection