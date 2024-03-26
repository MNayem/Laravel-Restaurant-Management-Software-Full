@extends('layout.layout')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        <style>.alert {margin-bottom: 0 !important;}</style>
        {{ session()->get('message') }}
    </div>
@endif
    <section>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="assets/img/2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="assets/img/3.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="assets/img/2.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #E7272D;border-radius: 100%;padding: 1.5rem;"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"style="background-color: #E7272D;border-radius: 100%;padding: 1.5rem;"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    <section style="background-image: url('assets/img/shape4.png');background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-6 align-self-center">
                    <p class="p1" style="font-size: 3rem;letter-spacing: -.2rem;">OUR AWESOME STREET</p>
                    <h1 style="font-weight: bold;">FOOD HISTORY</h1>
                    <p class="py-3">Thing lesser replenish evening called void a sea blessed meat fourth called moveth place behold night own night third in they’re abundant and don’t you’re the upon fruit. Divided open divided appear also saw may fill. whales seed creepeth. Open lessegether he also morning land i saw Man</p>
                    <button class="btn-custom">Our Story</button>
                </div>
                <div class="col-lg-6 py-3">
                    <img class="img-fluid rotImage" src="assets/img/1.png" alt="">
                </div>
            </div>
        </div>
    </section>

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

    <section style="background-image: url('assets/img/reservation-bg.jpg');background-repeat: no-repeat;background-position: center;background-size: cover; padding: 2rem 0;">
        <div class="container" style="background-color: white;">
            <div class="row py-3">
                <div class="col-lg-4 align-self-center">
                    <img class="img-fluid" src="assets/img/r.jpg" alt="">
                </div>
                <div class="col-lg-8 text-center">
                    <form method="post" action="/abc" class="form-control">
                    @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h3 style="font-weight: 900;">Reservation</h3>
                                <h1 style="font-weight: 900;">BOOK YOUR TABLE</h1>
                                <input class="my-3" type="text" name="totalperson" style="width: 100%; padding: .5rem 1rem;" placeholder="Total Person" required>
                                <input class="my-3" type="date" name="date" style="width: 100%; padding: .5rem 1rem;" placeholder="Expected Date" >
                                <input class="my-3" type="text" name="time" style="width: 100%; padding: .5rem 1rem;" placeholder="Expected Time">
                                <input class="my-3" type="text" name="phone" style="width: 100%; padding: .5rem 1rem;" placeholder="Contact No.">
                                <button class="btn-custom" style="width: 100%;" type="submit" name="submit">BOOK TABLE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-image: url('assets/img/bg.png');background-repeat: no-repeat;background-position: center;background-size: cover;">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4">
                    <h3 style="font-weight: bold;">Contact Us</h3>
                    <h4 class="mt-5" style="font-weight: bold;">0123456789</h4>
                    <p style="font-weight: bold;">Email Address: support@bdtask.com</p>
                </div>
                <div class="col-lg-4">
                    <h3 style="font-weight: bold;">Opening time</h3>
                    <div class="row">
                        <div class="col-6 text-end">
                            <p style="font-weight: bold;">Friday</p>
                            <p style="font-weight: bold;">Saturday</p>
                            <p style="font-weight: bold;">Sunday</p>
                            <p style="font-weight: bold;">Monday</p>
                            <p style="font-weight: bold;">Tuesday</p>
                            <p style="font-weight: bold;">Wednesday</p>
                            <p style="font-weight: bold;">Thursday</p>
                        </div>
                        <div class="col-6 text-start">
                            <p>08:00 - 20:00</p>
                            <p>08:00 - 20:00</p>
                            <p>08:00 - 20:00</p>
                            <p>08:00 - 20:00</p>
                            <p>08:00 - 20:00</p>
                            <p>08:00 - 20:00</p>
                            <p>08:00 - 20:00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 style="font-weight: bold;">Our Store</h3>
                    <p class="mt-5">98 Green Road, Farmgate, Dhaka-1215.</p>
                </div>
            </div>
        </div>
    </section>
@endsection



