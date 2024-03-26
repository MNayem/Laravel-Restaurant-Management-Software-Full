@extends('layout.layout')
@section('content')
        <section class="my-5">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-4 align-self-center">
                      <h1 class="text-center py-3 bg-danger" style="border-radius: .5rem; color:white;">Log In</h1>
                      <form>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                      </div>
                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <a class="btn btn-primary" href="{{ url('/customerDashboard') }}" style="width:100%">Log in</a>
                    </form>
                  </div>
              </div>
          </div>
            
        </section>
@endsection