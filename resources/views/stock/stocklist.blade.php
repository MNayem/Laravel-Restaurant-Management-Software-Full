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
        max-width: 100%;
        max-height: fit-content;
    }
    .tbl-fixed{
        overflow-x: scroll;
        overflow-y: scroll;
        height:fit-content;
        max-height: 70vh;
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
    <div class="col-lg-12 p-2" style="box-shadow: 0px 0px 5px gray; border-radius:.5rem;">
  <div class="row">
    <h2>Search Stock by Date</h2>
  </div>
  <div class="row">
   <div class="col-lg-6">
    <form action="https://formden.com/post/MlKtmY4x/" class="form-horizontal" method="post">
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="date">
       From
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa-solid fa-calendar-days" style="font-size:3rem;margin: 0 2rem;"></i>
        </div>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
       </div>
      </div>
     </div>
    </form>
   </div>
   <div class="col-lg-6">
    <form action="https://formden.com/post/MlKtmY4x/" class="form-horizontal" method="post">
     <div class="form-group">
      <label class="control-label col-sm-2 requiredField" for="date">
       To
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa-solid fa-calendar-days" style="font-size:3rem;margin: 0 2rem;"></i>
        </div>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
       </div>
      </div>
     </div>
     
     
    </form>
   </div>
  </div>
  <row class="text-center">
      <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
       <input name="_honey" style="display:none" type="text"/>
       <button class="btn btn-dark px-5 fw-bold" name="submit" type="submit">
        Search
       </button>
      </div>
     </div>
  </row>
    </div>
</div>


<div class="row p-3 justify-content-center">
    <div class="col-lg-12 p-2" style="box-shadow: 0px 0px 5px gray; border-radius:.5rem;">
        <div class="tbl-container p-3">
            <div class="row tbl-fixed">
              <table class="table table-hover table-striped table-condensed table-bordered" >
              <thead class="header">
                <th colspan="9"><h2 style="text-align: center;">STOCK LIST</h2></th>
                  <tr align="center">
                    <th scope="col">No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Openning Stock (In Gram)</th>
                    <th scope="col">Remaining Stock (In Gram)</th>
                    <th scope="col">Stock</th>
                    <th colspan="3" scope="col">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($stockshow as $stockshow)
                  <tr align="center">
                    <td scope="row">{{ $stockshow->id }}</td>
                    <td>{{ $stockshow->date }}</td>
                    <td>{{ $stockshow->productname }}</td>
                    <td>{{ $stockshow->openningstock }}</td>
                    <td>{{ $stockshow->remainingstock }}</td>
                    <td>{{ $stockshow->stock }}</td>
                    <td colspan = 3>
                        <a href="{{ url('/stockedit',$stockshow->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit </a>
                        <a href="{{ url('/deletestock',$stockshow->id) }}" class="btn btn-danger ml-2"><i class="fa-solid fa-trash-can"></i> Delete</a>
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