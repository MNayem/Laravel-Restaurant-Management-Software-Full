@extends('common.layout')

@section('content')

<!-- Case Studies -->
    <div class="case_studies">
    	<center><h2 class="servicescolor">Software Services</h2></center><hr><br>
    	<p><a href="{{ url('/lms') }}" class="btn btn-primary">Learning Management System</a></p><br>
    	<p><a href="{{ url('/ecommerce') }}" class="btn btn-primary">eCommerce Software</a></p><br>
    	<p><a href="#" class="btn btn-primary">Pharmecy Management Software</a></p><br>
    	<p><a href="#" class="btn btn-primary">Hospital Management Software</a></p><br>
    	<p><a href="#" class="btn btn-primary">Doctor's Management Software</a></p><br>
    	<p><a href="#" class="btn btn-primary">POS Software</a></p><br><br>

    	<center><h2 class="servicescolor">Digital Marketing Services</h2></center><hr><br>
    	<p><a href="#" class="btn btn-primary">Social Media Marketing</a></p><br>
    	<p><a href="#" class="btn btn-primary">SEO Services</a></p><br><br>

    	<center><h2 class="servicescolor">Training Programs</h2></center><hr><br>
    	<p><a href="#" class="btn btn-primary">Kid's Programming</a></p><br>
    	<p><a href="#" class="btn btn-primary">Digital Marketing</a></p><br>
    	<p><a href="#" class="btn btn-primary">Full Stuck Web Development</a></p>
    </div>

@endsection