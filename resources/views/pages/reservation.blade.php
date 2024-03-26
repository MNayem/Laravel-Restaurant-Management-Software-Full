@extends('layout.layout')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
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
    
@endsection