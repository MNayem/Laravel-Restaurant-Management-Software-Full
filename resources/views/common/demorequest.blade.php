@extends('common.layout')

@section('content')

<style type="text/css">
	
		body {
		    color: #000;
		    overflow-x: hidden;
		    height: 100%;
		    background-image: url("https://i.imgur.com/GMmCQHC.png");
		    background-repeat: no-repeat;
		    background-size: 100% 100%
		}

		.card {
		    padding: 30px 40px;
		    margin-top: 60px;
		    margin-bottom: 60px;
		    border: none !important;
		    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
		}

		.blue-text {
		    color: #00BCD4
		}

		.form-control-label {
		    margin-bottom: 0
		}

		input,
		textarea,
		button {
		    padding: 8px 15px;
		    border-radius: 5px !important;
		    margin: 5px 0px;
		    box-sizing: border-box;
		    border: 1px solid #ccc;
		    font-size: 18px !important;
		    font-weight: 300
		}

		input:focus,
		textarea:focus {
		    -moz-box-shadow: none !important;
		    -webkit-box-shadow: none !important;
		    box-shadow: none !important;
		    border: 1px solid #00BCD4;
		    outline-width: 0;
		    font-weight: 400
		}

		.btn-block {
		    text-transform: uppercase;
		    font-size: 15px !important;
		    font-weight: 400;
		    height: 43px;
		    cursor: pointer
		}

		.btn-block:hover {
		    color: #fff !important
		}

		button:focus {
		    -moz-box-shadow: none !important;
		    -webkit-box-shadow: none !important;
		    box-shadow: none !important;
		    outline-width: 0
		}
   </style>
   <!--Demo Request Form -->
    <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Request a Demo</h3>
            <p class="blue-text">Just answer a few questions<br> so that we can personalize the right experience for you.</p>
            <div class="card">
                <h5 class="text-center mb-4" style="border-bottom: 3px solid #ddd;">DEMO REQUEST FORM</h5>
                <form class="form-card" method="post" action="/requestfordemo">
                @csrf
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">First name<span class="text-danger"> *</span></label> <input type="text"  name="fname" placeholder="Enter your first name"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label> <input type="text"  name="lname" placeholder="Enter your last name" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Business email<span class="text-danger"> *</span></label> <input type="email"  name="email" placeholder="Enter Your Email Address" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phone number<span class="text-danger"> *</span></label> <input type="text"  name="mobile" placeholder="Enter Your Phone Number" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Organization Adress<span class="text-danger"> *</span></label> <input type="text" name="address" placeholder="Enter Your Company Address"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Message<span class="text-danger"> *</span></label> <input type="text"  name="message" placeholder="Enter Your Message"> </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" name="submit" class="btn-block btn-primary">Request a demo</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection