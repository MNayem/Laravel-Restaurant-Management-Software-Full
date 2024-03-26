<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@extends('adminHome')

@section('content')

<ul class="list-group">
  <h2 style="text-align: center">Monthly Sales Report</h2><hr>

  <li class="list-group-item list-group-item-primary">
      @foreach ($dues as $dues)
        Total Dues: {{ $dues->{'sum(amount)'} }}
  </li>
      @endforeach
      
  <li class="list-group-item list-group-item-secondary">
      @foreach ($expenses as $expenses)
        Total Expenses: {{ $expenses->{'sum(amount)'} }}
  </li>
      @endforeach
      
  <li class="list-group-item list-group-item-success">
      @foreach ($collection as $collection)
       Total Collection: {{ $collection->{'sum(collectionamount)'} }}
  </li>
      @endforeach
      
  <li class="list-group-item list-group-item-danger">
      @foreach ($dailysale_totalsellingprice as $dailysale_totalsellingprice)
        Total Selling Price: {{ $dailysale_totalsellingprice->{'sum(valuelp)'} }}
  </li>
      @endforeach
      
  <li class="list-group-item list-group-item-success">
     Total Netpayable Amount: {{ $dailysale_totalsellingprice->{'sum(valuelp)'}  +  $collection->{'sum(collectionamount)'} - $dues->{'sum(amount)'} - $expenses->{'sum(amount)'} }} 
  </li>
</ul><br>
<a href="/reportemonthwise" class="btn btn-info">Back To The Previous Page</a>
@endsection