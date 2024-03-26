@extends('adminHome2')

@section('content')
<div class="container margin-top 20">
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
            @foreach(App\Models\Returnback::totalCarts() as $cart)
                <tr>
                <td>
                   {{ $loop->index + 1 }}
                </td>
                <td>
                    <a href="#">{{ $cart->product->title }}</a>
                </td>
                <td>
                    <img src="#" alt=""></img>
                </td>
                <td>
                <form class="form-inline" action="{{ route('returncarts.update', $cart->id) }}" method="post">
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
                <form class="form-inline" action="{{ route('returncarts.delete', $cart->id) }}" method="post">
                  @csrf
                  <input type="hidden" name="cart_id" />
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
            <tr>
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
    <div class="float-right">
        <a href="{{ route('returncart') }}" class="btn btn-info btn-lg">Continue Shopping...</a>
         <a href="{{ route('returncheckouts') }}" class="btn btn-warning btn-lg">Checkout</a>
    </div>
</div>
@endsection