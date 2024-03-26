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

    <title>Plan2Career</title>
    <link rel="icon" href="images/dv.png" type="image/gif" sizes="16x16"/>

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
    
    <!-- Print View -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.printPage.js"></script>
    <!-- Print View -->
    <style media="screen">
    body {
      font-family: "Lato", sans-serif;
      margin-left: 130px;
    }

    .sidenav {
      height: 100%;
      width: 280px;
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
      margin-left: 150px; /* Same as the width of the sidenav */
      font-size: 20px; /* Increased text to enable scrolling */
      padding: 0;
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
            <a class="nav-link active" aria-current="page" href="{{ url('/admin/home') }}">Home</a>
            </li>
        <!--<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/dailyreport') }}">Home</a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link"  href="{{ url('/reportemonthwise') }}">Monthly report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/reportdatewise') }}">Datewise Report</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>-->
        <li class="nav-item"><a class="nav-link" href="/carts">
                         <button class="btn btn-danger">
                          <span class="mt-1">Sell Items: </span>
                          <span class="badge badge-warning" id="totalItems">
                             {{ App\Models\Cart::totalItems() }}
                          </span>
                        </button>
             </a></li>
      </ul>
    </div>
    </div>
</nav>

<div class="sidenav py-5 px-2">
    
    <a href="/admin/home" class="btn btn-outline-success mb-2 {{'admin/home'==request()->path()?'active':''}}">Dashboard</a>
    <a href="/productadd" class="btn btn-outline-success mb-2 {{'productadd'==request()->path()?'active':''}}">Product Add </a>
    <a href="/productshow" class="btn btn-outline-success mb-2 {{'productshow'==request()->path()?'active':''}}">All Products Show </a>
    <a href="/foodadd" class="btn btn-outline-success mb-2 {{'foodadd'==request()->path()?'active':''}}">Food Add </a>
    <a href="/foodshow" class="btn btn-outline-success mb-2 {{'foodshow'==request()->path()?'active':''}}">All Food Items Show </a>
    <a href="/stockadd" class="btn btn-outline-success mb-2 {{'stockadd'==request()->path()?'active':''}}">Stock Add</a>
    <a href="/stockshow" class="btn btn-outline-success mb-2 {{'stockshow'==request()->path()?'active':''}}">Stock Show </a>
    <a href="/ingredientsadd" class="btn btn-outline-success mb-2 {{'ingredientsadd'==request()->path()?'active':''}}">Ingredients Add </a>
    <a href="/ingredientsShow" class="btn btn-outline-success mb-2 {{'ingredientsShow'==request()->path()?'active':''}}">Ingredients Details </a>
    <a href="/dailysaleRestaurantadd" class="btn btn-outline-success mb-2 {{'dailysaleRestaurantadd'==request()->path()?'active':''}}">Add Order</a>
    <a href="/dailysaleshowRestaurant" class="btn btn-outline-success mb-2 {{'dailysaleshowRestaurant'==request()->path()?'active':''}}">Show Order</a>
    <a href="/allOnlineOrder" class="btn btn-outline-success mb-2 {{'allOnlineOrder'==request()->path()?'active':''}}">Show Online Order </a>
    <a href="/productcart" class="btn btn-outline-success mb-2 {{'productcart'==request()->path()?'active':''}}">Product Cart</a>
    
    <a href="/students" class="btn btn-outline-success mb-2">Print Test</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-danger"> {{ __('Logout') }} </a>
    
    <!--<a href="/dailaysaleadd" class="btn btn-info">Add Jahangir Daily Sale</a>-->
    <!--<a href="/dailaysaleaddyeasin" class="btn btn-warning">Add Yeasin Daily Sale</a>-->
    <!--<a href="/dailaysaleaddhridoy" class="btn btn-info">Add Hridoy Daily Sale</a>-->
    <!--<a href="/dailaysaleaddsajid" class="btn btn-warning">Add Sajid Daily Sale</a>-->
    
    <!--<a href="/dailysaleshow" class="btn btn-dark">Daily Sales Show</a>-->
    
    <!--<a href="/dueadd" class="btn btn-warning">Deliveryman Due Add</a>-->
    <!--<a href="/dueaddothers" class="btn btn-info">Others Due Add</a>-->
    
    <!--<a href="/dueshow" class="btn btn-dark">Due Show </a>-->
    
    <!--<a href="/expenseadd" class="btn btn-warning">Add Expense</a>-->
    <!--<a href="/expenseaddothers" class="btn btn-info">Add Expense Others</a>-->
    
    <!--<a href="/expenseshow" class="btn btn-dark">All Expense Show</a>-->
    
    
    <!--<a href="/collectionadd" class="btn btn-warning">Deliveryman Collection Add</a>-->
    <!--<a href="/collectionaddothers" class="btn btn-info">Others Collection Add</a>-->
    
    <!--<a href="/showcollection" class="btn btn-dark">Show Collection</a>-->
    
    
    <!--<a href="/stocklist">Stock List</a>
    <!--<a href="/damageproductlist">Damage Product List</a>-->
    <!--<a href="/duetable">Due Table</a>-->
    
    <!--<a href="/deliverymanadd">Add Deliveryman</a>-->
    <!--<a href="/deliverymanshow" class="btn btn-dark">All Deliveryman Show</a>-->
    
    
    <!--<a href="/collectionstatement">Collection Statement</a>-->
    
    
    
    <!--<a href="/returncart">Return Cart</a>-->
    <!--<a href="/companycart">Company Cart</a>-->
    
    <!--<a href="/shopadd">Shop Add </a>-->
    <!--<a href="/shopshow">All Shop Show </a>-->
    
    <!--<a href="/sradd">SR Add </a>-->
    <!--<a href="/srshow">All SR Show </a>-->
    
    <!-- <a href="/expensenameadd">Add Expense Name</a>-->
    <!--<a href="/expensenameshow">All Expense Name Show</a>-->
    
    <!--<a href="/offeradd">Add Offer</a>-->
    <!--<a href="/offershow">All Offer Show</a>-->
    
    <!--<a href="/damageproductadd">Damage Product Add</a>-->
    <!--<a href="/damageproductkshow">Damage Product Show </a>-->
    <hr>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

<div class="main">
    <main class="py-0">
        @yield('content')
    </main>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>
</html>
