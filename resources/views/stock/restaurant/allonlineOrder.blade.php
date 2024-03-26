<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


@extends('layout.adminLayout')

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

<!-- <h2>Search Dailysale by Date</h2><hr>-->
<!--    <form action="https://formden.com/post/MlKtmY4x/" class="form-horizontal" method="post">-->
<!--     <div class="form-group ">-->
<!--      <label class="control-label col-sm-2 requiredField" for="date">-->
<!--       From-->
<!--       <span class="asteriskField">-->
<!--        *-->
<!--       </span>-->
<!--      </label>-->
<!--      <div class="col-sm-10">-->
<!--       <div class="input-group">-->
<!--        <div class="input-group-addon">-->
<!--         <i class="fa fa-calendar">-->
<!--         </i>-->
<!--        </div>-->
<!--        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>-->
<!--       </div>-->
<!--      </div>-->
<!--     </div>-->
<!--    </form>-->
<!--   </div>-->
<!--  </div>-->
<!-- </div>-->
<!--</div>-->

<!--<div class="bootstrap-iso">-->
<!-- <div class="container-fluid">-->
<!--  <div class="row">-->
<!--   <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--    <form action="https://formden.com/post/MlKtmY4x/" class="form-horizontal" method="post">-->
<!--     <div class="form-group " style="margin-left: 160px;">-->
<!--      <label class="control-label col-sm-2 requiredField" for="date">-->
<!--       To-->
<!--       <span class="asteriskField">-->
<!--        *-->
<!--       </span>-->
<!--      </label>-->
<!--      <div class="col-sm-10">-->
<!--       <div class="input-group">-->
<!--        <div class="input-group-addon">-->
<!--         <i class="fa fa-calendar">-->
<!--         </i>-->
<!--        </div>-->
<!--        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>-->
<!--       </div>-->
<!--      </div>-->
<!--     </div><br>-->
<!--     <div class="form-group" style="margin-left: 160px;">-->
<!--      <div class="col-sm-10 col-sm-offset-2">-->
<!--       <input name="_honey" style="display:none" type="text"/>-->
<!--       <button class="btn btn-primary " name="submit" type="submit">-->
<!--        Search-->
<!--       </button>-->
<!--      </div>-->
<!--     </div>-->
<!--    </form>-->
<!--   </div>-->
<!--  </div>-->
<!-- </div>-->
<!--</div><br>-->

<div class="container tbl-container">
    <div class="row tbl-fixed">
        <table class="table table-hover table-striped table-condensed table-bordered border-dark" >
  <thead class="header">
    <th colspan="17"><h2 style="text-align: center;">ONLINE ORDER LIST</h2></th>
      <tr align="center">
        <th scope="col">SI.</th>
        <th scope="col">Product Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Vat</th>
        <th scope="col">Amount</th>
        <th scope="col">Toatal Payable Amount</th>
        <th scope="col">Name</th>
        <th scope="col">Date</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
        <th scope="col">Message</th>
        <th scope="col">Payment Method/Transaction ID</th>
        <th scope="col">Status</th>
        <th colspan="3" scope="col">Actions</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($onlineOrder as $onlineOrder)
      <tr align="center">
        <td scope="row">{{ $onlineOrder->id }}</td>
        <td>{{ $onlineOrder->pname }}</td>
        <td>{{ $onlineOrder->quantity }}</td>
        <td>{{ $onlineOrder->vat }}</td>
        <td>{{ $onlineOrder->amount }}</td>
        <td>{{ $onlineOrder->tamount }}</td>
        <td>{{ $onlineOrder->name }}</td>
        <td>{{ $onlineOrder->date }}</td>
        <td>{{ $onlineOrder->phone_no}}</td>
        <td>{{ $onlineOrder->address }}</td>
        <td>{{ $onlineOrder->message }}</td>
        <td>{{ $onlineOrder->transaction_id }}</td>
        <td>{{ $onlineOrder->status }}</td>
        <td colspan = 3>
            <a href="{{ url('/onlineOrderShow',$onlineOrder->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i> Show </a>
            <a href="{{ url('/onlineOrderedit',$onlineOrder->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit </a>
            <a href="{{ url('/onlineOrderdelete',$onlineOrder->id) }}" class="btn btn-danger ml-2"><i class="fa-solid fa-trash-can"></i> Delete</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
    </div>
</div>



@endsection