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


 <h2>Search Daily Sale by Date</h2><hr>
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

<div class="container-fluid" style="margin-left: 160px;">
    <form method="post" action="/dailyreport" class="form-control">
    <h3>Get Your Daily Sales Report From Here</h3><hr>
    @csrf
        <div class="mb-3">
            <label style="color: green;">Deliveryman Name:</label> <select id="sub" name="deliverymanname" required>
                        <option value="abc" selected hidden>Choose Deliveryman</option>
                        <option value="jahangir" >jahangir</option>
                        <option value="yeasin" >yeasin</option>
                        <option value="hridoy" >hridoy</option>
                        <option value="sajid" >sajid</option>
                        <option value="Myself" >Myself</option>
                        </select>
        </div>
        <button class="btn btn-info mt-3" type="submit" name="submit">Get Today's Report</button>
  
  
    </form>
</div>
<div class="container" style="margin-left: 150px;">
    <a href="/showjahangirsale" class="btn btn-info">Jahangir Sale</a>
    <a href="/showyeasinsale" class="btn btn-info">Yeasin Sale</a>
    <a href="/showhridoysale" class="btn btn-info">Hridoy Sale</a>
    <a href="/showsajidsale" class="btn btn-info">Sajid Sale</a>
    <a href="/dailysaleshow" class="btn btn-info">All Sale</a>
</div>


<div class="container-fluid">
    <a></a>
</div>
<br><br>

<table class="table table-bordered table-dark" style="margin-left: 160px;">
  <thead class="header">
  <th colspan="27" class="header"><h2 style="text-align: center; color: yellow;" class="header">HRIDOY SALES TABLE</h2></th>
    <tr align="center" style="color: #BB2D3B;">
      <th scope="col" class="header">Serial No.</th>
      <th scope="col" class="header">Product Name</th>
      <th scope="col" class="header">Date</th>
      <th scope="col" class="header">Deliveryman</th>
      <th scope="col" class="header">Pack</th>
      <th scope="col" class="header">Lifting Price (Price LP)</th>
      <th scope="col" class="header">Trade Price (Price TP)</th>
      <th scope="col" class="header">Selling Price</th>
      <th scope="col" class="header">Unit Price</th>
      <th scope="col" class="header">Orders</th>
      <th scope="col" class="header">Cases</th>
      <th scope="col" class="header">Pieces</th>
      <th scope="col" class="header">Total Pieces</th>
      <th scope="col" class="header">Sales V</th> 
      <th scope="col" class="header">Return Pieces</th>
      <th scope="col" class="header">Return Cases</th>
      <th scope="col" class="header">Sold Cases</th>
      <th scope="col" class="header">Sold Pieces</th>
      <th scope="col" class="header">Total Pieces(For next day)</th>
      <th scope="col" class="header">Total Selling Price</th>
      <th scope="col" class="header">Total price</th>
      <th scope="col" class="header">Damage Pcs</th>
      <th scope="col" class="header">Total Damage Amount</th>
      <th scope="col" class="header">Total Due</th>
      <th colspan="3" scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
       @foreach ($showhridoysale as $showhridoysale)
    <tr align="center">
      <th scope="row">{{ $showhridoysale->id }}</th>
      <td>{{ $showhridoysale->pname }}</td>
      <td>{{ $showhridoysale->date }}</td>
      <td>{{ $showhridoysale->deliverymanname }}</td>
      <td>{{ $showhridoysale->packs }}</td>
      <td>{{ $showhridoysale->pricelp }}</td>
      <td>{{ $showhridoysale->pricetp }}</td>
      <td>{{ $showhridoysale->sellingprice }}</td>
      <td>{{ $showhridoysale->unitprice }}</td>
      <td>{{ $showhridoysale->orders }}</td>
      <td>{{ $showhridoysale->cases }}</td>
      <td>{{ $showhridoysale->pieces }}</td>
      <td>{{ $showhridoysale->totalpcs }}</td>
      <td>{{ $showhridoysale->salesv }}</td>
      <td>{{ $showhridoysale->returnp }}</td>
      <td>{{ $showhridoysale->returnc }}</td>
      <td>{{ $showhridoysale->soldc }}</td>
      <td>{{ $showhridoysale->soldp }}</td>
      <td>{{ $showhridoysale->tpieces }}</td>
      <td>{{ $showhridoysale->valuelp }}</td>
      <td>{{ $showhridoysale->valuetp }}</td>
      <td>{{ $showhridoysale->damagepcs }}</td>
      <td>{{ $showhridoysale->damageamount }}</td>
      <td>{{ $showhridoysale->due }}</td>
      <td colspan="3">
            <a href="{{ url('/dailysaleedit',$showhridoysale->id) }}" class="btn btn-primary">Edit </a>
            <a href="{{ url('/deletedailysale',$showhridoysale->id) }}" class="btn btn-danger mt-2">Delete</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

