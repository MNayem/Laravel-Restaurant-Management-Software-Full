@extends('layout.adminLayout')

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
     margin: 2rem auto;
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

<div class="wrapper rounded bg-white">
    <div class="h3">Add Ingredients</div><hr>
    <center><img src="images/addproduct.png" alt="Image" class="img-fluid" width="200" height="150"/></center>
    <div class="form">
        <form method="post" action="/addingredients" class="form-control">
            @csrf
        <div class="row">
            <div class="my-md-2 my-3"> <label>Product Name</label> <select id="sub" name="title" required>
                <option value="" selected hidden>Choose Product</option>
                 @foreach ($productName as $productName)
                <option value="{{ $productName->title }}">{{ $productName->title }}</option>
                @endforeach
            </select> </div>
        </div>
        <div class="row">
             <div class="my-md-2 my-3"><label>Food Item Name</label> <select id="sub" name="name" required>
                <option value="" selected hidden>Choose Food Item</option>
                 @foreach ($foodItemName as $foodItemName)
                <option value="{{ $foodItemName->name }}">{{ $foodItemName->name }}</option>
                @endforeach
            </select> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Quantity (in Gram)</label> <input type="number" step="any" name="quantity" placeholder="Quantity" class="form-control" required> </div>
        </div>
        <div class="text-right">
            <button class="btn btn-primary mt-3" type="submit" name="submit">Confirm Ingredients</button>
        </div>
        </form>
    </div>
</div>

@endsection