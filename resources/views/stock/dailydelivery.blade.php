@extends('adminHome')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


<style>
     
</style>

<table class="table table-bordered table-dark">
  <thead>
  <th colspan="20"><h2 style="text-align: center; color: yellow;">DAILY DELIVERY TABLE</h2></th>
    <tr align="center" style="color: #BB2D3B;">
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Pack</th>
      <th scope="col">Price TP</th>
      <th scope="col">Selling Price</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Order</th>
      <th scope="col">Unit</th>
      <th scope="col">Total Pieces</th>
      <th scope="col">Sales V</th>
      <th scope="col">Return Cases</th>
      <th scope="col">Return pieces</th>
      <th scope="col">Sold Cases</th>
      <th scope="col">Sold Pieces</th>
      <th scope="col">Total Pieces</th>
      <th scope="col">Selling Price</th>
      <th scope="col">TP</th>
      <th scope="col">Damage Pieces</th>
      <th scope="col">Damage CLTN</th>
    </tr>
  </thead>
  <tbody>
    <tr align="center">
      <th scope="row">1</th>
      <td>7 up 250ml</td>
      <td>24</td>
      <td>404.00</td>
      <td>45.00</td>
      <td>18,181.00</td>
      <td>22</td>
      <td>--</td>
      <td>192</td>
      <td>3138</td>
      <td>--</td>
      <td>--</td>
      <td>8</td>
      <td>0</td>
      <td>192</td>
      <td>3138.4</td>
      <td>3440</td>
      <td>--</td>
      <td>--</td>
    
    </tr>
    <tr align="center">
      <th scope="row">2</th>
      <td>Pepsi 250ml</td>
      <td>24</td>
      <td>404.00</td>
      <td>45.00</td>
      <td>18,181.00</td>
      <td>22</td>
      <td>--</td>
      <td>192</td>
      <td>3138</td>
      <td>--</td>
      <td>--</td>
      <td>8</td>
      <td>0</td>
      <td>192</td>
      <td>3138.4</td>
      <td>3440</td>
      <td>--</td>
      <td>--</td>
      
    </tr>
  </tbody>
</table>

@endsection