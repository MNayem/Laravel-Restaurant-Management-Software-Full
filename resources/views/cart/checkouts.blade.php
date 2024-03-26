@extends('layout.layout')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<section class="py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-body">
                     <h2>Confirmed Items</h2>
                    <div class="row">
                        <div class="col-12">
                            @foreach (App\Models\Cart::totalCarts() as $cart)
                                <p>
                                    {{ $cart->product->name }} -
                                    <strong>{{ $cart->product->sellingprice }} taka </strong>
                                    - {{ $cart->product_quantity }} item
                                </p>
                             @endforeach
                        </div>
                        <hr>
                        <div class="col-12">
                                @php
                                    $total_price = 0;
                                @endphp
                                 @foreach (App\Models\Cart::totalCarts() as $cart)
                                @php
                                    $total_price += $cart->product->sellingprice * $cart->product_quantity;
                                @endphp
                             @endforeach
                             <p>Total Price : <strong>{{ $total_price }}</strong> Taka</p>
                             <p>Total Price with Delivery Charge: <strong>{{ $total_price + App\Models\Setting::first()->shipping_cost }}</strong> Taka</p>
                        </div>
                    </div>
                     <a href="{{ route('cartshome') }}" class="btn btn-warning fw-bold">Change Cart Items</a>
                 </div>
            </div>
            <div class="col-lg-6">
              <div class="card card-body">
                 <h2>Details</h2>
        <form method="POST" action="{{ route('checkouts.store') }}">
            @csrf
            
            
            <div class="form-group row">
            
              <!--<label for="pname" class="col-md-4 col-form-label text-md-right">Food Name (<span style="color: red;" class="fw-bold">*</span>)</label>-->
             
              <div class="col-md-6">
            @foreach (App\Models\Cart::totalCarts() as $cart)
                <input id="pname" type="hidden" class="form-control{{ $errors->has('pname') ? ' is-invalid' : '' }}" name="pname" value=" {{ $cart->product->name }}" placeholder="Food Name" >
            @endforeach
                @if ($errors->has('pname'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('pname') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            
            <!-- Product ID -->
            <div class="form-group row">
            
              <!--<label for="pid" class="col-md-4 col-form-label text-md-right">Product Id (<span style="color: red;" class="fw-bold">*</span>)</label>-->
             
              <div class="col-md-6">
            @foreach (App\Models\Cart::totalCarts() as $cart)
                <input id="pid" type="hidden" class="form-control{{ $errors->has('pid') ? ' is-invalid' : '' }}" name="pid" value=" {{ $cart->product_id }}" placeholder="Product Id" >
            @endforeach
                @if ($errors->has('pid'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('pid') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            
            <div class="form-group row">
            
            <!--<label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity (<span style="color: red;" class="fw-bold">*</span>)</label>-->
             
              <div class="col-md-6">
            @foreach (App\Models\Cart::totalCarts() as $cart)
                <input id="quantity" type="hidden" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value=" {{ $cart->product_quantity }}" placeholder="Quantity" >
            @endforeach
                @if ($errors->has('quantity'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('quantity') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Reciever Name (<span style="color: red;" class="fw-bold">*</span>)</label>
    
              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autofocus>
    
                @if ($errors->has('name'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
    
            <div class="form-group row">
              <!--<label for="date" class="col-md-4 col-form-label text-md-right">Date (<span style="color: red;" class="fw-bold">*</span>)</label>-->
    
              <div class="col-md-6">
                <input id="date" type="hidden" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ Auth::check() ? Auth::user()->date : '' }}">
    
                @if ($errors->has('date'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('date') }}</strong>
                  </span>
                @endif
              </div>
            </div>
    
            <!--<div class="form-group row">-->
            <!--  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>-->
    
            <!--  <div class="col-md-6">-->
            <!--    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>-->
    
            <!--    @if ($errors->has('email'))-->
            <!--      <span class="invalid-feedback">-->
            <!--        <strong>{{ $errors->first('email') }}</strong>-->
            <!--      </span>-->
            <!--    @endif-->
            <!--  </div>-->
            <!--</div>-->
    
            <div class="form-group row pt-2">
              <label for="phone_no" class="col-md-4 col-form-label text-md-right">Phone No (<span style="color: red;" class="fw-bold">*</span>)</label>
    
              <div class="col-md-6">
                <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required>
    
                @if ($errors->has('phone_no'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('phone_no') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            
             <div class="form-group row pt-2">
              <label for="address" class="col-md-4 col-form-label text-md-right">Address (<span style="color: red;" class="fw-bold">*</span>)</label>
    
              <div class="col-md-6">
                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ Auth::check() ? Auth::user()->address : '' }}" required>
    
                @if ($errors->has('address'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('address') }}</strong>
                  </span>
                @endif
              </div>
            </div>
    
            <div class="form-group row pt-2">
              <label for="message" class="col-md-4 col-form-label text-md-right">Additional Message (optional)</label>
    
              <div class="col-md-6">
                <textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="4" name="message"></textarea>
    
                @if ($errors->has('message'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('message') }}</strong>
                  </span>
                @endif
              </div>
            </div><br>
    
            <!--<div class="form-group row">-->
            <!--  <label for="shop" class="col-md-4 col-form-label text-md-right">Shop (*)</label>-->
    
            <!--  <div class="col-md-6">-->
                <!--<textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>-->
                
            <!--    <select id="shop" name="shop" class="form-control{{ $errors->has('shop') ? ' is-invalid' : '' }}"  required>{{ Auth::check() ? Auth::user()->shop : '' }}-->
            <!--        <option value="" selected hidden>Choose Option</option>-->
            <!--        <option value="Shop 1">Shop 1</option>-->
            <!--        <option value="Shop 2">Shop 2</option>-->
            <!--        <option value="Shop 3">Shop 3</option>-->
            <!--        <option value="Shop 4">Shop 4</option>-->
            <!--        <option value="Shop 5">Shop 5</option>-->
            <!--    </select>-->
    
            <!--    @if ($errors->has('shop'))-->
            <!--      <span class="invalid-feedback">-->
            <!--        <strong>{{ $errors->first('shop') }}</strong>-->
            <!--      </span>-->
            <!--    @endif-->
            <!--  </div>-->
            <!--  <div class="col-md-6">-->
                <!--<textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>-->
            <!--    <label for="sr" class="col-md-4 col-form-label text-md-left">SR (*)</label>-->
            <!--    <select id="sr" name="sr" class="form-control{{ $errors->has('sr') ? ' is-invalid' : '' }}"  required>{{ Auth::check() ? Auth::user()->sr : '' }}-->
            <!--        <option value="" selected hidden>Choose Option</option>-->
            <!--        <option value="SR 1">SR 1</option>-->
            <!--        <option value="SR 2">SR 2</option>-->
            <!--    </select>-->
    
            <!--    @if ($errors->has('sr'))-->
            <!--      <span class="invalid-feedback">-->
            <!--        <strong>{{ $errors->first('sr') }}</strong>-->
            <!--      </span>-->
            <!--    @endif-->
            <!--  </div>-->
            <!--  <div class="col-md-6">-->
                <!--<textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>-->
            <!--     <label for="deliveryman" class="col-md-4 col-form-label text-md-left">Delivery Man (*)</label>-->
            <!--    <select id="deliveryman" name=deliveryman class="form-control{{ $errors->has('deliveryman') ? ' is-invalid' : '' }}"  required>{{ Auth::check() ? Auth::user()->deliveryman : '' }}-->
            <!--        <option value="" selected hidden>Choose Option</option>-->
            <!--        <option value="Delivery Man 1">Delivery Man 1</option>-->
            <!--        <option value="Delivery Man 2">Delivery Man 2</option>-->
            <!--    </select>-->
    
            <!--    @if ($errors->has('deliveryman'))-->
            <!--      <span class="invalid-feedback">-->
            <!--        <strong>{{ $errors->first('deliveryman') }}</strong>-->
            <!--      </span>-->
            <!--    @endif-->
            <!--  </div>-->
            <!--</div><br>-->
    
            <div class="form-group row">
              <label for="payment_method" class="col-12 col-form-label text-md-right">Select a payment method (<span style="color: red;" class="fw-bold">*</span>)</label>
              <div class="col-12">
                <select class="form-control" name="payment_method_id" required id="payments">
                  <option value="">Choose</option>
                  @foreach ($payments as $payment)
                    <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                  @endforeach
                </select>
                <p style="color: red;">Please use the Phone number: <span class="fw-bold">01999791578</span> for your payment</p>
                
                <!--@foreach ($payments as $payment)-->
                <!--  @if ($payment->short_name == "cash_in")-->
                <!--    <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">-->
                <!--      <h3>-->
                <!--        For Cash in there is nothing necessary. Just click Finish Order.-->
                <!--        <br>-->
                <!--        <small>-->
                <!--          You will get your food within 30 minutes.-->
                <!--        </small>-->
                <!--      </h3>-->
                <!--    </div>-->
                <!--  @else-->
                <!--    <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden"-->
                <!--      <h3>{{ $payment->name }} Payment</h3>-->
                <!--      <p>-->
                <!--        <strong>{{ $payment->name }} No :  {{ $payment->no }}</strong>-->
                <!--        <br>-->
                <!--        <strong>Account Type: {{ $payment->type }}</strong>-->
                <!--      </p>-->
                <!--      <div class="alert alert-success">-->
                <!--        Please send the above money to this Bkash No and write your transaction code below there..-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  @endif-->
                <!--@endforeach-->
                
                <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Please Enter the Transaction Number">
              </div>
            </div>
            
            <div class="form-group row pt-2 text-center">
              <div class="col-12">
                        <button type="submit" class="btn btn-success mt-3 fw-bold">Order Now</button>

              </div>
            </div>
    
          </div>
    
    </div>
</section>


@section('scripts')
  <script type="text/javascript">
  $("#payments").change(function(){
    $payment_method = $("#payments").val();
    if ($payment_method == "cash_in") {
      $("#payment_cash_in").removeClass('hidden');
      $("#payment_bkash").addClass('hidden');
      $("#payment_rocket").addClass('hidden');
    }else if ($payment_method == "bkash") {
      $("#payment_bkash").removeClass('hidden');
      $("#payment_cash_in").addClass('hidden');
      $("#payment_rocket").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }else if ($payment_method == "rocket") {
      $("#payment_rocket").removeClass('hidden');
      $("#payment_bkash").addClass('hidden');
      $("#payment_cash_in").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }
  })
  </script>
@endsection

@endsection