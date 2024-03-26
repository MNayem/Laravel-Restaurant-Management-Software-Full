@extends('layout.dashboard_layout')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="row p-3 justify-content-center">
    <div class="col-lg-12 p-2" style="box-shadow: 0px 0px 5px gray; border-radius:.5rem;">
        
        <h2>Add Stock</h2>
        <form method="post" action="/addstock" class="form-control">
            @csrf
            
        <div class="row pt-3">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Product Name</label> 
                <select id="sub" name="title"  class="form-control" required>
                    <option value="" selected hidden>Choose Product</option>
                     @foreach ($productname as $productname)
                    <option value="{{ $productname->title }}">{{ $productname->title }}</option>
                    @endforeach
                </select> 
            </div>
            <div class="col-md-6 mt-md-0 mt-3">
                <label>Date</label><input type="date" name="date" class="form-control" placeholder="Date" >
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Openning Stock (in Gram)</label> <input type="number" step="any" name="openningstock" placeholder="Openning Stock" class="form-control" required> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Remaining Stock</label> <input type="number" step="any" name="remainingstock" placeholder="Remaining Stock" class="form-control" disabled> </div>
        </div>
        <div class="row pt-1">
            <!--<div class="col-md-6 mt-md-0 mt-3"> <label>Need Per Piece (Gram)</label> <input type="number" step="any" name="needperpiece" placeholder="Need per piece" class="form-control" required> </div>-->
            <div class="my-md-2 my-3"> <label>Stock(in Gram)</label> <input type="number" step="any" name="stock" placeholder="Stock in" class="form-control" disabled> </div>
        </div>
        <div class="text-right">
            <button class="btn btn-dark px-5 fw-bold mt-3" type="submit" name="submit">Confirm Stock</button>
        </div>
        </form>
    </div>
</div>

@endsection