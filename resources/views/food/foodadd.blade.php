<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

@extends('layout.dashboard_layout')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="row p-3 justify-content-center">
    <div class="col-lg-12 p-2" style="box-shadow: 0px 0px 5px gray; border-radius:.5rem;">
    <div class="h3">Add Food Item</div>
            <form method="post" action="/addfooditem" enctype="multipart/form-data" class="form-control">
            @csrf
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Food Item Name</label><input type="text" class="form-control" name="name" required></div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Food Number</label> <input type="number" name="fnumber" class="form-control" > </div> 
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Image</label> <input type="file" name="image" class="form-control" > </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Food Category</label> 
                 <select id="sub" class="form-control" name="category" required>
                    <option value="" selected hidden>Choose</option>
                    <option value="Party">Party</option>
                    <option value="Launch">Launch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Fast Food">Fast Food</option>
                    <option value="Beverage and Dessert">Beverage and Dessert</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Chinese Cuisine">Chinese Cuisine</option>
                    <option value="Thai Cuisine">Thai Cuisine</option>
                    <option value="Barista">Barista</option>
                    <option value="Indian">Indian</option>
                </select> 
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-md-0 mt-3"> <label>Description</label> <input type="text" name="description" class="form-control" > </div> 
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Making Cost</label> <input type="number" step="any" name="makingcost" class="form-control" required> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Selling Price</label> <input type="number" step="any" name="sellingprice" class="form-control" required> </div>
        </div>
        <div class="row">
            <div class="my-md-2 my-3"> <label>Estimated Profit</label> <input type="number" step="any" name="estimatedprofit" class="form-control" disabled> </div>
        </div>
        <div class="text-right">
            <button class="btn btn-dark mt-3 px-5 fw-bold" type="submit" name="submit">Confirm Food</button>
        </div>
        </form>
    </div>
</div>



@endsection
