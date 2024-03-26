@extends('layout.dashboard_layout')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message1') }}
    </div>
@endif
<style>
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
 <center><h1>Edit This Product Info.</h1><br></center>
            <hr>
            <form action="{{ url('/foodeditprocess',$data->id) }}" method="post" class="form-control" enctype="multipart/form-data">
                @csrf
                <label>Food Item Name: </label>
                <input type="text" name="name" placeholder="Name" value="{{ $data->name }}"><br><br>
                
                <label>Food Item Number: </label>
                <input type="number" name="fnumber" placeholder="Food Number" value="{{ $data->fnumber }}"><br><br>
                
                <label>Description: </label>
                <input type="text" name="description" placeholder="Description" value="{{ $data->description }}"><br><br>
                
                <div class="row">
                    <label>Category: </label>
                    <select id="sub" name="category">
                        <option value="{{ $data->category }}" selected hidden>{{ $data->category }}</option>
                        <option value="Party">Party</option>
                        <option value="Launch">Launch</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Beverage and Dessert">Beverage and Dessert</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Chinese Cuisine">Chinese Cuisine</option>
                        <option value="Thai Cuisine">Thai Cuisine</option>
                    </select><br><br>
                </div>
                
                <label>Making Cost: </label>
                <input type="number" step="any" name="makingcost" placeholder="Buying Price" value="{{ $data->makingcost }}">
                <br><br>
                
                <label>Selling Price: </label>
                <input type="number" step="any" name="sellingprice" placeholder="Selling Price" value="{{ $data->sellingprice }}"> <br><br>

                <label>Estimated Price: </label>
                <input type="number" name="estimatedprofit" placeholder="Estimated Profit" value="{{ $data->estimatedprofit	 }}"><br><br>
                
                 <div class="row">
                     <div class="col-md-6 mt-md-0 mt-3"> <label>Availability:</label> <select id="sub" name="availability" required>
                        <option value="{{ $data->availability }}" selected hidden>{{ $data->availability }}</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select> </div>
                </div><br><br>
                
                 <label>Image: </label>
                <input type="file" name="image" value="1">
                <img src="{{ asset($data->image) }}"  style="width:100px;height:100px;" ><br><br>
                
                <input type="submit" value="Update" class="btn btn-info" name="submit">
            </form>

@endsection