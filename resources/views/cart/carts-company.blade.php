@extends('layout.adminLayout')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="container-fluid margin-top 20">
    <h2>My Cart Items</h2>
    <table class="table table-bordered table-stripe">
        <thead>
          <tr>
            <th>No.</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Quantity</th>
            <th>Unit Price</th>
            <th>Sub total Price</th>
            <th>
              Delete
            </th>
          </tr>
        </thead>
        <tbody>
            @php
             $total_price = 0;
            @endphp
            @foreach(App\Models\Company::totalCarts() as $cart)
                <tr>
                <td>
                   {{ $loop->index + 1 }}
                </td>
                <td>
                    <a href="#">{{ $cart->product->name }}</a>
                </td>
                <td>
                    <img src="{{ asset($cart->product->image) }}" alt="Image" style="width:100px;height:100px;"></img>
                </td>
                <td>
                <form class="form-inline" action="{{ route('companycarts.update', $cart->id) }}" method="post">
                  @csrf
                  <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}"/>
                  <button type="submit" class="btn btn-success mt-1">Update</button>
                </form>
                </td>
                <td>
                    {{ $cart->product->sellingprice }} Taka
                </td>
                <td>
                @php
                    $total_price += $cart->product->sellingprice * $cart->product_quantity;
                @endphp

                {{ $cart->product->sellingprice * $cart->product_quantity }} Taka
                </td>
                <td>
                <form class="form-inline" action="{{ route('companycarts.delete', $cart->id) }}" method="post">
                  @csrf
                  <input type="hidden" name="cart_id" />
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
            <tr>
            <td colspan="4">
                 <a href="/printView1" class="btn btn-primary"><i class="fa-solid fa-eye"></i>&nbsp;Print 1 </a>
                 <a href="/printView2" class="btn btn-primary"><i class="fa-solid fa-eye"></i>&nbsp;Print 2 </a>
            </td>
            <td>
              Total Amount:
            </td>
            <td colspan="2">
              <strong>  {{ $total_price }} Taka</strong>
            </td>
          </tr>
        </tbody>
    </table>
    <div class="float-right">
        <!--<a href="{{ route('companycart') }}" class="btn btn-info btn-lg">Continue Shopping...</a>-->
         <a href="{{ route('companycheckouts') }}" class="btn btn-warning btn-lg">Checkout</a>
    </div><br><br>
    <div class="row row-cols-2 row-cols-lg-3">
        @foreach ($product as $product)
            <div class="col-4 col-lg-2">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">BDT. {{ $product->sellingprice }}</p>
                        <p>@include('cart.cart-button-company')</p>
                    </div>
                </div> 
            </div>
        @endforeach
    </div>
</div>
@endsection