@extends('layout.adminLayout')

@section('content')
<div class="container-fluid margin-top 20">
    <h2>Order Details</h2>
    <table class="table table-borderless table-stripe">
        <thead>
          <tr style="font-size: 13px; font-family: thoma;">
            <th>No.</th>
            <th>Item Name</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Sub total Price</th>
          </tr>
        </thead>
        <tbody>
            @php
             $total_price = 0;
            @endphp
            @foreach(App\Models\Company::totalCarts() as $cart)
                <tr style="font-size: 12px; font-family: thoma; font-weight: bold;">
                <td>
                   {{ $loop->index + 1 }}
                </td>
                <td>
                    {{ $cart->product->name }}
                </td>
                <td>
                  {{ $cart->product_quantity }}
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
            </tr>
            @endforeach
            <tr style="font-size: 12px; font-family: thoma;">
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
 <center><button onclick="window.print()" style="border-radius:100%;width:40px;height:40px;"><i class="fa-solid fa-print" style=""></i></button></center>
@endsection