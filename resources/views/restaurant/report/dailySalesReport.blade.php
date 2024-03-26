<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">




@extends('layout.dashboard_layout')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<style>
    .tbl-container{
        max-width: fit-content;
        max-height: fit-content;
    }
    .tbl-fixed{
        overflow-x: scroll;
        overflow-y: scroll;
        height:fit-content;
        max-height: 83vh;
        /*margin-top: 0px;*/
        margin-bottom: 0;
    }
    table{
        min-width: max-content;
    }
    thead{
        position: sticky !important;
        top: 0px !important;
        background-color: white !important;
    }
</style>
<div class="container-fluid tbl-container mt-5">
    <style>
        .btn3:hover{
            color: #E7272D;
        }
        .btn3.active1{
            color: #E7272D;
        }
    </style>
    <a href="/tableOrders" class="btn btn-dark fw-bold btn3">All Sales</a>
    <a href="/dailySalesReport" class="btn btn-dark fw-bold btn3 active1">Daily Sales</a>
    <a href="/monthlySalesReport" class="btn btn-dark fw-bold btn3">Monthly Sales</a>
    
    <a href="/dailySalePrint" class="btn btn-danger fw-bold">Print</a>
    <!--<a href="/tableOrders" class="btn btn-info">Back</a>-->
    
    <form action="/dateWiseSearch" method="GET" class="mt-3" style="padding: 2rem; box-shadow: 0px 0px 5px gray; border-radius: .5rem;">
            <div class="row text-center px-2">
                <div class="col-lg-3 col-md-12"><h4 class="text-start">Search Here</h4></div>
                <div class="col-lg-1 col-md-2"><h4>From</h4></div>
                <div class="col-lg-3 col-md-4"><input type="date" name="start_date" class="form-control" placeholder="Start Date"></div>
                <div class="col-lg-1 col-md-2"><h4>To</h4></div>
                <div class="col-lg-3 col-md-4"><input type="date" name="end_date" class="form-control" placeholder="End Date"></div>
                <div class="col-lg-1 col-md-12"><input type="submit" value="Search" class="btn btn-dark fw-bold"></div>
            </div>         
    </form>
    
    <div class="row tbl-fixed">
        <table class="table table-hover table-striped table-condensed table-bordered border-dark">
        <thead>
            <th colspan="12"><h2 style="text-align: center;" class="fw-bold">Today's Sale</h2></th>
            <tr align="center">
                <th scope="col">SI No.</th>
                <th scope="col">Ortder ID</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Date</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Payment Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dailySalesReport as $dailySalesReport)
            <tr align="center" class="align-self-center">
                <td class="align-self-center">{{ $dailySalesReport->id }}</td>
                <td>{{ $dailySalesReport->order_id }}</td>
                <td>{{ ($dailySalesReport->tamount + $dailySalesReport->vat_amount + $dailySalesReport->s_charge_amount) - 
                    ($dailySalesReport->discount_amount + $dailySalesReport->discount_amount_number) }}</td>
                <td>{{ $dailySalesReport->cname }}</td>
                <td>{{ $dailySalesReport->date }}</td>
                <td>{{ $dailySalesReport->phone_no }}</td>
                <td>{{ $dailySalesReport->payment_type }}</td>
            </tr>
            @endforeach
        </tbody>
        </table> 
    </div>
</div>

    


@endsection
