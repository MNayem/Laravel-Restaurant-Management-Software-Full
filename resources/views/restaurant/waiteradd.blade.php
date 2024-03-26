
@extends('layout.dashboard_layout')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


<div class="row p-3 justify-content-center">
    <div class="col-lg-8 p-2" style="box-shadow: 0px 0px 5px gray; border-radius:.5rem;">
        
        <h2>Add Waiter</h2>

        <form method="post" action="/addwaiter" enctype="multipart/form-data" class="form-control">
            @csrf
            <div class="row">
                <div class="col-lg-3 align-self-center"><label class="fw-bold">Name*</label></div>
                <div class="col-lg-9"><input type="text" name="name" class="form-control" required></div>
            </div>
            <div class="row py-3">
                <div class="col-lg-3 align-self-center"><label class="fw-bold">Phone Number</label></div>
                <div class="col-lg-9"><input type="text" name="phone" class="form-control"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 align-self-center"><label class="fw-bold">Address</label></div>
                <div class="col-lg-9"><input type="text" name="address" class="form-control"></div>
            </div>
            
            <div class="row text-center">
                <div class="col-12">
                    <button class="btn btn-dark px-5 mt-3" type="submit" name="submit">Confirm Waiter</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection
