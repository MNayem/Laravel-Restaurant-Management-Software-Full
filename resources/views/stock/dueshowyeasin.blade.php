<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">



@extends('adminHome')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


<style>
    .header{
        position:sticky;
        top: 0 ;
    }
</style>
  <h2>Search Due Details by Date</h2><hr>
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
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
       </div>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>

<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form action="https://formden.com/post/MlKtmY4x/" class="form-horizontal" method="post">
     <div class="form-group " style="margin-left: 160px;">
      <label class="control-label col-sm-2 requiredField" for="date">
       To
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
       </div>
      </div>
     </div><br>
     <div class="form-group" style="margin-left: 160px;">
      <div class="col-sm-10 col-sm-offset-2">
       <input name="_honey" style="display:none" type="text"/>
       <button class="btn btn-primary " name="submit" type="submit">
        Search
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div><br>

<div class="container" style="margin-left: 150px;">
   <a href="/dueshowjahangir" class="btn btn-info">Jahangir Due</a>
    <a href="/dueshowyeasin" class="btn btn-info">Yeasin Due</a>
    <a href="/dueshowhridoy" class="btn btn-info">Hridoy Due</a>
    <a href="/dueshowsajid" class="btn btn-info">Sajid Due</a>
    <a href="/dueshowothers" class="btn btn-info">Others Due</a>
    <a href="/dueshow" class="btn btn-info">All Due</a>
</div>
<!--<ul class="list-group" style="margin-left: 160px;">
  <h2 style="text-align: center">Due Report</h2><hr>

  <li class="list-group-item list-group-item-secondary">Total Payment: 2000</li>
  <li class="list-group-item list-group-item-success">Total Paid: 1000</li>
  <li class="list-group-item list-group-item-danger">Total Due: 1000</li>
</ul>-->

<br><br>
<table class="table table-bordered table-dark" style="margin-left: 160px;">
  <thead class="header">
  <th colspan="8"><h2 style="text-align: center; color: yellow;">Yeasin DUE LIST</h2></th>
    <tr align="center" style="color: #BB2D3B;">
      <th scope="col">No.</th>
      <th scope="col">Date</th>
      <th scope="col">Deliveryman Name</th>
      <th scope="col">Shop Name</th>
      <th scope="col">Amount</th>
      <th colspan="3">Actions</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($dueshowyeasin as $dueshowyeasin)
    <tr align="center">
      <th scope="row">{{ $dueshowyeasin->id }}</th>
      <td>{{ $dueshowyeasin->date}}</td>
       <td>{{ $dueshowyeasin->deliverymanname}}</td>
        <td>{{ $dueshowyeasin->shopname }}</td>
        <td>{{ $dueshowyeasin->amount}}</td>
        <td colspan = "3">
            <a href="{{ url('/dueedit',$dueshowyeasin->id) }}" class="btn btn-primary">Edit </a>
            <a href="{{ url('/deletedue',$dueshowyeasin->id) }}" class="btn btn-danger ml-2">Delete</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection