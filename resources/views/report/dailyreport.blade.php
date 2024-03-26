<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@extends('adminHome')

@section('content')

<ul class="list-group">
  <h2 style="text-align: center">Daily Report</h2><hr>

  <li class="list-group-item list-group-item-primary">Total Product: 50</li>
  <li class="list-group-item list-group-item-secondary">Total Company Cart: 20</li>
  <li class="list-group-item list-group-item-success">Total return Cart: 10</li>
  <li class="list-group-item list-group-item-danger">Total Delivery: 5</li>
  <li class="list-group-item list-group-item-warning">Total Product Left: 45</li>
  <li class="list-group-item list-group-item-info">Total payment: 1030 Taka</li>
  <li class="list-group-item list-group-item-light">Total Payment Left: 1000 Taka</li>
  <li class="list-group-item list-group-item-dark">Profit: 500 Taka</li>
  <li class="list-group-item list-group-item-warning">Total Cost: 5000 Taka</li>
</ul>

@endsection