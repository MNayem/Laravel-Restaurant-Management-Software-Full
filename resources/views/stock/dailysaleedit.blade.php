<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


@extends('adminHome')

@section('content')

<center><h1>Edit This Daily Sale Info.</h1><br></center>
            <hr>
        <div class="wrapper rounded bg-white">
            <form action="{{ url('/dailysaleeditprocess',$data->id) }}" method="post" class="form-control">
                @csrf
                <label style="font-weight: bold;">Date: </label>
                <input type="date" name="date" placeholder="Date" value="{{ $data->date }}"><br><br>
                <label style="font-weight: bold;">Deliveryman Name: </label>
                <input type="text" name="deliverymanname" placeholder="Deliveryman" value="{{ $data->deliverymanname }}"><br><br>
                
                <label style="font-weight: bold;">Product Name: </label>
                <input type="text" name="pname" placeholder="Product Name" value="{{ $data->pname }}"><br><br>
                
                <label style="font-weight: bold;">Packs: </label>
                <input type="number" name="packs" placeholder="Pack" value="{{ $data->packs }}"><br><br>
                
                <label style="font-weight: bold;">Price LP: </label>
                <input type="number" step="any" name="pricelp" placeholder="Price LP" value="{{ $data->pricelp }}"><br><br>
                
                 <label style="font-weight: bold;">Price TP: </label>
                <input type="number" step="any" name="pricetp" placeholder="Price LP" value="{{ $data->pricetp }}"><br><br>
                
                <label style="font-weight: bold;">Selling Price: </label>
                <input type="number" step="any" name="sellingprice" placeholder="Selling Price" value="{{ $data->sellingprice }}"><br><br>
                
                 <label style="font-weight: bold;">Unit Price: </label>
                <input type="number" step="any" name="unitprice" placeholder="Unit Price" value="{{ $data->unitprice }}" disabled><br><br>
                
                <label style="font-weight: bold;">Orders: </label>
                <input type="number" step="any" name="orders" placeholder="Orders" value="{{ $data->orders }}"><br><br>
                
                <label style="font-weight: bold;">Unit: </label>
                <input type="number" step="any" name="unit" placeholder="Unit" value="{{ $data->unit }}"><br><br>
                
                <label style="font-weight: bold;">Cases: </label>
                <input type="number" name="cases" placeholder="Cases" value="{{ $data->cases }}"><br><br>
                
                <label style="font-weight: bold;">Pieces: </label>
                <input type="number" name="pieces" placeholder="Pieces" value="{{ $data->pieces }}"><br><br>
                
                <label style="font-weight: bold;">Total Pieces: </label>
                <input type="number" name="totalpcs" placeholder="Total Pieces" value="{{ $data->totalpcs }}" disabled><br><br>
                
                <label style="font-weight: bold;">Sales V: </label>
                <input type="number" name="salesv" placeholder="Sales V" value="{{ $data->salesv }}" disabled><br><br>
                
                <label style="font-weight: bold;">Return Pieces: </label>
                <input type="number" name="returnp" placeholder="Return Pieces" value="{{ $data->returnp }}"><br><br>
                
                <label style="font-weight: bold;">Return Cases: </label>
                <input type="number" name="returnc" placeholder="Return Cases" value="{{ $data->returnc }}"><br><br>
                
                <label style="font-weight: bold;">Sold Cases: </label>
                <input type="number" name="soldc" placeholder="Sold Cases" value="{{ $data->soldc }}" disabled><br><br>
                
                <label style="font-weight: bold;">Sold Pieces: </label>
                <input type="number" name="soldp" placeholder="Sold Pieces" value="{{ $data->soldc }}" disabled><br><br>
                
                <label style="font-weight: bold;">Total Pieces Remain: </label>
                <input type="number" name="tpieces" placeholder="Total Pieces" value="{{ $data->tpieces}}" disabled><br><br>
                
                <label style="font-weight: bold;">Total Selling Price: </label>
                <input type="number" step="any" name="valuelp" placeholder="Value LP" value="{{ $data->valuelp }}" disabled><br><br>
                
                <label style="font-weight: bold;">Total Price: </label>
                <input type="number" step="any" name="valuetp" placeholder="Value TP" value="{{ $data->valuetp }}" disabled><br><br>
                
                <label style="font-weight: bold;">Total Damage Pcs: </label>
                <input type="number" name="damagepcs" placeholder="Damage Pcs" value="{{ $data->damagepcs }}"><br><br>
                
                <label style="font-weight: bold;">Total Damage Amount: </label>
                <input type="number" step="any" name="damageamount" placeholder="Damage Amount" value="{{ $data->damageamount }}" disabled><br><br>
                
                <label style="font-weight: bold;">Due: </label>
                <input type="number" step="any" name="due" placeholder="Due" value="{{ $data->due }}" disabled><br><br>
                
                <input type="submit" class="btn btn-info" value="Update" name="submit">
            </form>
        </div>

@endsection