<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">




@extends('layout.take_away_layout')
@section('title','6')

@section('content')


    <section>
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-7 col-md-12 col-12 kotSection pb-3">
            @if(session()->has('message'))
                <div class="alert alert-success mb-0 mt-2">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row pt-3">
              <div class="col-lg-12">
                <div class="input-group mb-3">
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                  <form action="/addTA6carts" method="post" style="width:100%;border:2px solid gray; padding: .5rem; border-radius: .5rem;">
                    @csrf
                    @foreach ($food as $food)
                    
                      <div class="row">
                        <div class="col-4">
                          <h6>Food Number :</h6>
                        </div>
                        <div class="col-8">
                          <input type="number" name="food_number" value="{{ $food->fnumber }}" style="width:100%;border:none;">
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-4">
                          <h6>Food Name :</h6>
                        </div>
                        <div class="col-8">
                          <input type="text" name="fname" value="{{ $food->name }}" style="width:100%;border:none;">
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-4">
                          <h6>Quantity :</h6>
                        </div>
                        <div class="col-8">
                          <input type="number" name="product_quantity" value="1" style="width:100%;">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <h6>Price :</h6>
                        </div>
                        <div class="col-8">
                          <input type="number" name="amount" value="{{ $food->sellingprice }}" style="width:100%;border:none;">
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-4">
                          <h6>Take Away Number :</h6>
                        </div>
                        <div class="col-8">
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                          <input type="number" name="tablenumber" value="6" style="width:100%;border:none;">
                        </div>
                      </div>
                        <input type="submit" name="submit" value="ADD" class="btn btn-dark fw-bold mt-4" style="width:100%">
                    @endforeach
                </form> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-12 col-12 customerSection bg-dark py-3 py-lg-0 " style="min-height: 90vh;">
          </div>
        </div>
      </div>
    </section>

@endsection