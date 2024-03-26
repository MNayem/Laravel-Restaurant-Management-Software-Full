<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 


@extends('adminHome')

@section('content')

@if(session()->has('message1'))
    <div class="alert alert-success">
        {{ session()->get('message1') }}
    </div>
@endif

@if(session()->has('message2'))
    <div class="alert alert-success">
        {{ session()->get('message2') }}
    </div>
@endif

<style>
    .header{
        position:sticky;
        top: 0 ;
    }
</style>
  <h2>Search Expense Details by Date</h2><hr>
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
    <a href="/expenseshowjahangir" class="btn btn-info">Jahangir Expense</a>
    <a href="/expenseshowyeasin" class="btn btn-info">Yeasin Expense</a>
    <a href="/expenseshowhridoy" class="btn btn-info">Hridoy Expense</a>
    <a href="/expenseshowsajid" class="btn btn-info">Sajid Expense</a>
    <a href="/expenseshowothers" class="btn btn-info">Other Expenses</a>
    <a href="/expenseshow" class="btn btn-info">All Expenses</a>
</div>

<br><br>
<table class="table table-bordered table-dark" style="margin-left: 160px;">

    <thead class="header">
        <th colspan="9"><h2 style="text-align: center; color: yellow;">HRIDOY EXPENSE FIELD</h2></th>
        <tr align="center" style="color: #BB2D3B;">
        <th scope="col">No</th>
        <th scope="col">Date</th>
        <th scope="col">Expense Name</th>
        <th scope="col">Amount</th>
        <th scope="col">Person Name</th>
        <th scope="col">Description</th>
        <th colspan = "3" scope="col">Actions</th>

    </tr>
    </thead>
    <tbody>
        @foreach ($expenseshowhridoy as $expenseshowhridoy)
        <tr align="center">
            <td>{{ $expenseshowhridoy->id }}</td>
            <td>{{ $expenseshowhridoy->date }}</td>
            <td>{{ $expenseshowhridoy->expname }}</td>
            <td>{{ $expenseshowhridoy->amount }}</td>
            <td>{{ $expenseshowhridoy->deliverymanname }}</td>
            <td>{{ $expenseshowhridoy->description }}</td>
            <td colspan = 3>
                <a href="{{ url('/expenseedit',$expenseshowhridoy->id) }}" class="btn btn-primary">Edit </a>
                <a href="{{ url('/deleteexpense',$expenseshowhridoy->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
