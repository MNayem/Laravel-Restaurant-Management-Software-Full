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

<!--@if(session()->has('message'))-->
<!--    <div class="alert alert-success">-->
<!--        {{ session()->get('message') }}-->
<!--    </div>-->
<!--@endif-->
<style>
    .tbl-container{
        max-width: fit-content;
        max-height: fit-content;
    }
    .tbl-fixed{
        overflow-x: scroll;
        overflow-y: scroll;
        height:fit-content;
        max-height: 75vh;
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


    <div class="row p-3 justify-content-center">
        <div class="col-12 p-2" style="box-shadow: 0px 0px 5px gray; border-radius:.5rem;">
<div class="tbl-container p-3">
    <div class="row tbl-fixed">
        <table class="table table-hover table-striped table-condensed ">
        
            <thead class="header">
                <th colspan="13"><h2 style="text-align: left;">All Food Items</h2></th>
                <tr align="center">
                    <th scope="col">SI No.</th>
                    <th scope="col">Email</th>
                    <th scope="col">Food Item Name</th>
                    <th scope="col">Food Item Number</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Making Cost</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Estimated Profit</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foodshow as $foodshow)
                <tr align="center">
                    <td>{{ $foodshow->id }}</td>
                    <td>{{ $foodshow->email }}</td>
                    <td>{{ $foodshow->name }}</td>
                    <td>{{ $foodshow->fnumber }}</td>
                    <td>{{ $foodshow->description }}</td>
                    <td>{{ $foodshow->category }}</td>
                    <td>{{ $foodshow->makingcost }}</td>
                    <td>{{ $foodshow->sellingprice }}</td>
                    <td>{{ $foodshow->estimatedprofit }}</td>
                    <td>{{ $foodshow->availability }}</td>
                    <td> <img src="{{ $foodshow->image }}" style="width:70px;height:70px;" alt="Image"></td>
                    <td>
                        <a href="{{ url('/foodedit',$foodshow->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit </a>
                        <a href="{{ url('/deletefood',$foodshow->id) }}" class="btn btn-danger ml-2"><i class="fa-solid fa-trash-can"></i> Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
        </div>
    </div>



@endsection
