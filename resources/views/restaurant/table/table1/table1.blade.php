<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">




@extends('layout.userLayout')
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
                  <form action="/search" method="post" style="width: 100%;"> 
                    @csrf
                    <div class="input-group">
                      <input type="submit" name="submit" class="btn btn-dark fw-bold" value="ADD">
                      <input type="number" name="foodNumber" class="form-control" placeholder="Add Food Number" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </form> 
                </div>
              </div>

            </div>
            <div class="row">
                <div class="col-12">
                  <a href="/printCart" class="btn btn-dark mt-1 fw-bold" style="width: 100%;">Dsiplay Orders</a>
                </div>
            </div>
            
          </div>

          <div class="col-lg-5 col-md-12 col-12 customerSection bg-dark py-3 py-lg-0 ">

            <div class="row mx-1 justify-content-end" style="border: 2px solid white; border-radius: .5rem;min-height:200px;">
              <div style="display:none;">  
              
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">S / C (%): </label>
                <div class="col-7">
                  <input type="text" class="form-control" id="inputPassword" placeholder="5" style="text-align: end;">
                </div>
              </div>

              </div>
            </div>

            <div class="row d-flex justify-content-center pt-1">
              <a class="btn btn-light fw-bold" style="width: 93%;" href="">Customer Print</a>
            </div>

            <div class="row mt-4 m-1 justify-content-end" style="border: 2px solid white; border-radius: .5rem;min-height:200px;">
              <div style="display:none;">
                  
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Receive (ntype): </label>
                <div class="col-7">
                  <select class="form-select bg-light" aria-label="Default select example">
                    <option selected>Payment Type</option>
                    <option value="1">Cash</option>
                    <option value="2">Card</option>
                    <option value="3">Others</option>
                  </select>
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Given Amount: </label>
                <div class="col-7">
                  <input type="text" class="form-control" id="inputPassword" placeholder="10 tk" style="text-align: end;"> 
                </div>
              </div>
              
              </div>
            </div>
            <div class="row d-flex justify-content-center">
              <a class="btn btn-light fw-bold" style="width: 93%;" href="">Settlement Print</a>
            </div>
          </div>

        </div>
      </div>
    </section>

@endsection