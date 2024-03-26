<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


@extends('adminHome')

@section('content')

<center><h1>Edit This Shop Info.</h1><br></center>
            <hr>
        <div class="wrapper rounded bg-white">
            <form action="{{ url('/shopeditprocess',$data->id) }}" method="post">
                @csrf
                <label>Shop Name</label>
                <input type="text" name="shopname" placeholder="Shop Name" value="{{ $data->shopname }}"><br><br>
                <label>Email </label>
                <input type="email" name="email" placeholder="Email" value="{{ $data->email }}"><br><br>
                
                <label>Mobile: </label>
                <input type="text" name="mobile" placeholder="Mobile" value="{{ $data->mobile }}"><br><br>
                
                <label>Account Number: </label>
                <input type="text" name="accountno" placeholder="Account Number" value="{{ $data->accountno }}"><br><br>
                
                <label>Bkash: </label>
                <input type="text" name="bkash" placeholder="Bkash Number" value="{{ $data->bkash}}"<br><br>
                
                <label>Deliveryman-SR Name: </label>
                <input type="text" name="deliverymanname" placeholder="Deliveryman-SR Name" value="{{ $data->deliverymanname }}"><br><br>
                 <label>Description: </label>
                <input type="text" name="description" placeholder="Description" value="{{ $data->description }}"<br><br>
                
                <input type="submit" value="Update" name="submit">
            </form>
        </div>

@endsection