@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

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

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    @stack('css')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style media="screen">
    body {
      font-family: "Lato", sans-serif;
      margin-left: 20px;
    }

    .sidenav {
      height: 100%;
      width: 180px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      padding-top: 20px;
    }

    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 18px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .main {
      margin-left: 160px; /* Same as the width of the sidenav */
      font-size: 20px; /* Increased text to enable scrolling */
      padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success" style="margin-left:150px;">
<div class="container-fluid ">

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{ url('/dailyreport') }}">Daily Report</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/monthlyreport') }}">Monthly report</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/datewiasereport') }}">Datewise Report</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/logout">Logout</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/register">Register</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="/cartsreturn">
                     <button class="btn btn-danger">
                      <span class="mt-1">Return Items: </span>
                      <span class="badge badge-warning" id="totalItems">
                         {{ App\Models\Returnback::totalItems() }}
                      </span>
                    </button>
         </a></li>
  </ul>
</div>
</div>
</nav>

   
  
  <div class="sidenav">
    
    <a href="/productadd">Product Add </a>
    <a href="/productshow">All Products Show </a>
    <a href="/shopadd">Shop Add </a>
    <a href="/shopshow">All Shop Show </a>
    <a href="/sradd">SR Add </a>
    <a href="/srshow">All SR Show </a>
    <a href="/deliverymanadd">Add Deliveryman</a>
    <a href="/deliverymanshow">All Deliveryman Show</a>
    <a href="/expenseadd">Add Expense</a>
    <a href="/expenseshow">All Expense Show</a>
    <a href="/expensenameadd">Add Expense Name</a>
    <a href="/expensenameshow">All Expense Name Show</a>
    <a href="/offeradd">Add Offer</a>
    <a href="/offershow">All Offer Show</a>
    <a href="/offeradd">Add Offer</a>
    <a href="/offershow">All Offer Show</a>
    
    <a href="/collectionadd">Collection Add</a>
    <a href="/showcollection">Show Collection</a>
    <a href="/collectionstatement">Collection Statement</a>
    
    <a href="/productcart">Product Cart</a>
    <a href="/returncart">Return Cart</a>
    <a href="/companycart">Company Cart</a>
    
   <a href="/dailaysaleadd">Add Daily Sale</a>
    <a href="/dailysaleshow">Daily Sales Show</a>
    
    <a href="/dailydelivery">Daily Delivery Table</a>
    <a href="/dailysalesreport">Daily Sales Report</a>
    
    <a   href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
  </div>

   <div class="main">
     <main class="py-4">
         @yield('content')
     </main>
   </div>










     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>
</html>
