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

<style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

 * {
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     font-family: 'Poppins', sans-serif
 }

 body::-webkit-scrollbar {
     display: none
 }

 .wrapper {
     max-width: 700px;
     margin: 80px auto;
     padding: 30px 45px;
     box-shadow: 0px 0px 10px black;
 }

 .wrapper label {
     display: block;
     padding-bottom: 0.2rem
 }

 .wrapper .form .row {
     padding: 0.6rem 0
 }

 .wrapper .form .row .form-control {
     box-shadow: none
 }

 .wrapper .form .option {
     position: relative;
     padding-left: 20px;
     cursor: pointer
 }

 .wrapper .form .option input {
     opacity: 0
 }

 .wrapper .form .checkmark {
     position: absolute;
     top: 1px;
     left: 0;
     height: 20px;
     width: 20px;
     border: 1px solid #bbb;
     border-radius: 50%
 }

 .wrapper .form .option input:checked~.checkmark:after {
     display: block
 }

 .wrapper .form .option:hover .checkmark {
     background: #f3f3f3
 }

 .wrapper .form .option .checkmark:after {
     content: "";
     width: 10px;
     height: 10px;
     display: block;
     background: linear-gradient(45deg, #ce1e53, #8f00c7);
     position: absolute;
     top: 50%;
     left: 50%;
     border-radius: 50%;
     transform: translate(-50%, -50%) scale(0);
     transition: 300ms ease-in-out 0s
 }

 .wrapper .form .option input[type="radio"]:checked~.checkmark {
     background: #fff;
     transition: 300ms ease-in-out 0s
 }

 .wrapper .form .option input[type="radio"]:checked~.checkmark:after {
     transform: translate(-50%, -50%) scale(1)
 }

 #sub {
     display: block;
     width: 100%;
     border: 1px solid #ddd;
     padding: 10px;
     border-radius: 5px;
     color: #333
 }

 #sub:focus {
     outline: none
 }

 @media(max-width: 768.5px) {
     .wrapper {
         margin: 30px
     }

     .wrapper .form .row {
         padding: 0
     }
 }

 @media(max-width: 400px) {
     .wrapper {
         padding: 25px;
         margin: 20px
     }
 }
 .h3{
     text-align: center;
 }
</style>
<div class="wrapper rounded">
    <div class="h3">Add Product</div><hr>
	<center><img src="images/addproduct.png" alt="Image" class="img-fluid" width="200" height="150"/></center>
        <div class="form">
            <form method="post" action="/addproduct" enctype="multipart/form-data" class="form-control">
            @csrf
        <div class="row">
            <div class="my-md-2 my-3"> <label>Product Name</label> 
                <input type="text" placeholder="Product Name" name="title" class="form-control" required>
            </div>
            <div class="my-md-2 my-3"> <label>Description</label> <input type="text" placeholder="Description" name="description" class="form-control" > </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Buying Cost</label> <input type="number" step="any" name="buyingprice" placeholder="Buying Price" class="form-control" required> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Selling Price</label> <input type="number" step="any" name="sellingprice" placeholder="Selling Price" class="form-control" required> </div>
        </div>
        <div class="row">
            <div class="my-md-2 my-3"> <label>Estimated Profit</label> <input type="number" step="any" name="updated_price" placeholder="Estimated Profit" class="form-control" disabled> </div>
        </div>
        <div class="row">
            <div class="my-md-2 my-3"> <label>Image</label> <input type="file" name="image" class="form-control" > </div>
        </div>
        <div class="text-right">
            <button class="btn btn-primary mt-3" type="submit" name="submit">Confirm Product</button>
        </div>
        </form>
    </div>
</div>



@endsection
