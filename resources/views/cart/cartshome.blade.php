@extends('layout.layout')
@section('content')  

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <section class="py-5 bg-light">
        <div class="container p-3" style="box-shadow: 0px 0px 5px gray;border-radius:.5rem;">
        <h2>My Cart Items</h2>
        <div class="table-responsive">
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
                    @foreach(App\Models\Cart::totalCarts() as $cart)
                        <tr class="fw-bold">
                        <td>
                           {{ $loop->index + 1 }}
                        </td>
                        <td>
                            <a href="#" style="text-decoration:none;">{{ $cart->product->name }}</a>
                        </td>
                        <td>
                            <img src="{{ asset($cart->product->image) }}" alt="Image" style="width:100px;height:100px;"></img>
                        </td>
                        <td>
                        <form class="form-inline" action="{{ route('carts.update', $cart->id) }}" method="post">
                          @csrf
                          <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}"/>
                          <button type="submit" class="btn btn-success mt-1 fw-bold">Update</button>
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
                            <form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
                              @csrf
                              <input type="hidden" name="cart_id" />
                              <button type="submit" class="btn btn-danger fw-bold">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="fw-bold">
                    <td colspan="4"></td>
                    <td>
                      Total Amount:
                    </td>
                    <td colspan="2">
                      <strong>  {{ $total_price }} Taka</strong>
                    </td>
                  </tr>
                </tbody>
            </table>
        </div>
        
        
    
            <div class="d-flex justify-content-center my-3">
                <a href="{{ route('productcartfront') }}" class="btn btn-warning mx-2 text-white fw-bold">Continue Shopping...</a>
                <a href="{{ route('checkouts') }}" class="btn btn-success mx-2 fw-bold">Checkout</a>
            </div>
        </div>
    </section>

@endsection