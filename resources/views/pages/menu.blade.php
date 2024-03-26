@extends('layout.layout')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


    <section>
        <div class="up1" style="background-image: url('assets/img/bg.jpg'); background-repeat: no-repeat;">
            <div class="container">
                <div class="row text-center py-3 mb-2" style="color: white;">
                    <h1>TASTY MENU TODAY</h1>
                    <h5>-----CHEF SELECTION-----</h5>
                </div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="border-bottom: 5px solid #E7272D;">
                    <li style="background-color: #202020;padding: 2rem 3.7rem;" class="nav-item hover1" role="presentation"><button class="nav-link active" id="pills-one-tab" data-bs-toggle="pill" data-bs-target="#pills-one" type="button" role="tab" aria-controls="pills-one" aria-selected="true">
                        <img class="img-fluid" src="assets/img/b (1).png" alt="">
                        <h6 style="color: white;">Party</h6>
                    </button></li>

                    <li style="background-color: #202020;padding: 2rem 3.7rem;" class="nav-item hover1" role="presentation"><button class="nav-link" id="pills-two-tab" data-bs-toggle="pill" data-bs-target="#pills-two" type="button" role="tab" aria-controls="pills-two" aria-selected="false">
                        <img class="img-fluid" src="assets/img/l1.png" alt="">
                        <h6 style="color: white;">Launch</h6>
                        </button></li>

                    <li style="background-color: #202020;padding: 2rem 3.7rem;" class="nav-item hover1" role="presentation"><button class="nav-link" id="pills-three-tab" data-bs-toggle="pill" data-bs-target="#pills-three" type="button" role="tab" aria-controls="pills-three" aria-selected="false">
                        <img class="img-fluid" src="assets/img/d.png" alt="">
                        <h6 style="color: white;">Dinner</h6>
                        </button></li>

                    <li style="background-color: #202020;padding: 2rem 3.7rem;" class="nav-item hover1" role="presentation"><button class="nav-link" id="pills-four-tab" data-bs-toggle="pill" data-bs-target="#pills-four" type="button" role="tab" aria-controls="pills-four" aria-selected="false">
                        <img class="img-fluid" src="assets/img/c.png" alt="">
                        <h6 style="color: white;">Beverage <br> and <br> Dessert</h6>
                        </button></li>

                    <li style="background-color: #202020;padding: 2rem 3.7rem;" class="nav-item hover1" role="presentation"><button class="nav-link" id="pills-five-tab" data-bs-toggle="pill" data-bs-target="#pills-five" type="button" role="tab" aria-controls="pills-five" aria-selected="false">
                        <img class="img-fluid" src="assets/img/b (1).png" alt="">
                        <h6 style="color: white;">Breakfast</h6>
                        </button></li>
    
                </ul>
            </div>
        </div>
        <div class="bottom1 container">
            <div class="tab-content" id="pills-tabContent" style="background-color: white;">

                <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab" tabindex="0">
                    <div class="row my-2">
                            @foreach ($product as $product)
                            <div class="col-lg-6">
                                <div class="row my-2">
                                    <div class="col-3">
                                        <img class="img-fluid" src="{{ $product->image }}" alt="" style="border: 1px solid #E7272D;padding: 5px; width: 100%; height: 100px;">
                                    </div>
                                    <div class="col-6">
                                        <h4 style="color: black;">{{ $product->name }}</h4>
                                        <p>@include('cart.cart-button')</p>
                                    </div>
                                    <div class="col-3 text-center align-self-center">
                                        <h5 style="color: black;">TK. {{ $product->sellingprice }}</h5>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <p style="color: black;">{{ $product->description }}</p>
                                    </div>
                                </div>
                            <hr>
                            </div>
                            @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-two" role="tabpanel" aria-labelledby="pills-two-tab" tabindex="0">
                    <div class="row my-2">
                            @foreach ($productL as $product)
                            <div class="col-lg-6">
                                <div class="row my-2">
                                    <div class="col-3">
                                        <img class="img-fluid" src="{{ $product->image }}" alt="" style="border: 1px solid #E7272D;padding: 5px; width: 100%; height: 100px;">
                                    </div>
                                    <div class="col-6">
                                        <h4 style="color: black;">{{ $product->name }}</h4>
                                            <p>
                                              @include('cart.cart-button')
                                            </p>
                                    </div>
                                    <div class="col-3 text-center align-self-center">
                                        <h5 style="color: black;">TK. {{ $product->sellingprice }}</h5>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <p style="color: black;">{{ $product->description }}</p>
                                        
                                    </div>
                                </div>
                                <hr>
                                </div>
                            @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-three" role="tabpanel" aria-labelledby="pills-three-tab" tabindex="0">
                    <div class="row my-2">
                        @foreach ($productD as $product)
                        <div class="col-lg-6">
                                <div class="row my-2">
                                    <div class="col-3">
                                        <img class="img-fluid" src="{{ $product->image }}" alt="" style="border: 1px solid #E7272D;padding: 5px; width: 100%; height: 100px;">
                                    </div>
                                    <div class="col-6">
                                        <h4 style="color: black;">{{ $product->name }}</h4>
                                            <p>
                                              @include('cart.cart-button')
                                            </p>
                                    </div>
                                    <div class="col-3 text-center align-self-center">
                                        <h5 style="color: black;">TK. {{ $product->sellingprice }}</h5>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <p style="color: black;">{{ $product->description }}</p>
                                        
                                    </div>
                                </div>
                                <hr>
                                </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-four" role="tabpanel" aria-labelledby="pills-four-tab" tabindex="0">
                    <div class="row my-2">
                        @foreach ($productBandD as $product)
                        <div class="col-lg-6">
                                <div class="row my-2">
                                    <div class="col-3">
                                        <img class="img-fluid" src="{{ $product->image }}" alt="" style="border: 1px solid #E7272D;padding: 5px; width: 100%; height: 100px;">
                                    </div>
                                    <div class="col-6">
                                        <h4 style="color: black;">{{ $product->name }}</h4>
                                            <p>
                                              @include('cart.cart-button')
                                            </p>
                                    </div>
                                    <div class="col-3 text-center align-self-center">
                                        <h5 style="color: black;">TK. {{ $product->sellingprice }}</h5>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <p style="color: black;">{{ $product->description }}</p>
                                        
                                    </div>
                                </div>
                                <hr>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-five" role="tabpanel" aria-labelledby="pills-five-tab" tabindex="0">
                    <div class="row my-2">
                         @foreach ($productBr as $product)
                            <div class="col-lg-6">
                                <div class="row my-2">
                                    <div class="col-3">
                                        <img class="img-fluid" src="{{ $product->image }}" alt="" style="border: 1px solid #E7272D;padding: 5px; width: 100%; height: 100px;">
                                    </div>
                                    <div class="col-6">
                                        <h4 style="color: black;">{{ $product->name }}</h4>
                                            <p>
                                              @include('cart.cart-button')
                                            </p>
                                    </div>
                                    <div class="col-3 text-center align-self-center">
                                        <h5 style="color: black;">TK. {{ $product->sellingprice }}</h5>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <i class="fa-regular fa-star" style="color: #4AD06A;"></i>
                                        <p style="color: black;">{{ $product->description }}</p>
                                        
                                    </div>
                                </div>
                                <hr>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection