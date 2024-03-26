@extends('layout.layout')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        <section class="py-5 bg-light">
          <div class="container">
              <div class="row justify-content-center">
                      <h1 class="fw-bold text-center">Contact Us</h1>
                  <div class="col-lg-4 align-self-center">
                      <div class="row">
                          <h2>Location:</h2>
                          <p>41 (3rd floor), Ibrahim Mia Road, Shibbari Mor, Khulna, Bangladesh</p>
                      </div>
                      <div class="row">
                          <h2>Email:</h2>
                          <p>info@plan2career.com</p>
                      </div>
                      <div class="row">
                          <h2>Call:</h2>
                          <p>+8801819769000, +8801701655233</p>
                      </div>
                  </div>
                  <div class="col-lg-8 align-self-center">
                      <div class="row">
                          <form class="row g-3 p-3" method="post" action="/contactWithUs" style="box-shadow: 0px 0px 5px gray;border-radius:.5rem;">
                            @csrf
                              <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4">
                              </div>
                              <div class="col-md-6">
                                <label for="inputphone" class="form-label">Phone No.</label>
                                <input type="text" name="phone" class="form-control" id="inputphone">
                              </div>
                              <div class="col-12">
                                <label for="inputSubject" class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" id="inputSubject" placeholder="Subject">
                              </div>
                              <label for="inputAddress2" class="form-label">Comments</label>
                              <div class="form-floating">
                                  
                                  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="message" style="height: 100px"></textarea>
                                  <label for="floatingTextarea2">Write Your Message</label>
                                </div>

                              <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success" name="submit">Send Message</button>
                              </div>
                            </form>
                      </div>
                  </div>
              </div>
          </div>
            
        </section>
@endsection