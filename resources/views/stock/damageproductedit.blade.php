<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


@extends('adminHome')

@section('content')

<center><h1>Edit This Stock Info.</h1><br></center>
            <hr>
        <div class="wrapper rounded bg-white">
            <form action="{{ url('/damageproducteditprocess',$data->id) }}" method="post">
                @csrf
                <label>Date: </label>
                <input type="date" name="date" placeholder="Date" value="{{ $data->date }}"><br><br>
                <label>Product Name: </label>
                <input type="text" name="productname" placeholder="Product Name" value="{{ $data->productname }}"><br><br>
                
                <label>SR-Deliveryman: </label>
                <input type="text" name="deliverymanname" placeholder="SR-Deliveryman" value="{{ $data->deliverymanname }}"><br><br>
                
                <label>Total Product: </label>
                <input type="number" name="totalproduct" placeholder="Total Product" value="{{ $data->totalproduct }}"><br><br>
                
                <input type="submit" value="Update" name="submit">
            </form>
        </div>

@endsection