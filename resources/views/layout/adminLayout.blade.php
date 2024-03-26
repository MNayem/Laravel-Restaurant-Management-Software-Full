<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jafran Rooftop Restaurant</title>
    <link rel="icon"  href="../assets/img/logo/Jafran.png">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
.navbar-toggler {
    color: white !important;
    background-color: white !important;
}
        #cartDisplay1{display:none;}
        #cartDisplay2{display:block;}
        
        .nav-link{
            font-size: 1rem !important;
            font-weight: bold !important;
            text-transform: uppercase !important;
            color: white !important;
        }
        .active, .nav-link:hover{
            color: #E7272D !important;
        }
        .btn-custom{
            width: 190px;
            height: 55px;
            background-color: #E7272D;
            color: white;
            border: none;
            font-weight: bold;
        }
        .btn-custom1{
            width: 110px;
            height: 35px;
            background-color: #E7272D;
            color: white;
            border: none;
            font-weight: bold;
            font-size: .8rem;
        }
        .btn-custom:hover, .btn-custom1:hover{
            background-color: #212121;
        }
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            background-color: #E7272D !important;
        }
        .hover1:hover{
            background-color: #E7272D !important;
        }
        .bottomToTop{
            width: 50px;
            height: 50px;
            background-color: #E7272D;
            color: white;
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            border-radius: 100%;
            scroll-behavior: smooth;
        }
        .notification{
            width: 20px;
            height: 20px;
            border-radius: 100%;
            background-color: #E7272D;
            color: white;
            margin-left: -15px;
        }
        .rotImage{
            /* transform: translate(-50%,-50%); */
            animation: myfirst 30s infinite linear;
            width: 85%;
        }
        @keyframes myfirst{
            0%{
                transform: rotate(0deg);
            }
            90%{
                transform: rotate(360deg);
            }
        }
        
        @media screen and (max-width: 400px) {
            .hover1{
                /* display: none; */
                padding: 0 !important;
                text-align: center !important;
            }
            .p1{
                font-size: 1.5rem !important;
                letter-spacing: -.1rem !important;
                display: inline !important;
            }
            .hover1{
                padding: 0;
                margin: 0;
            }            
            .hover1 img{
                width:50%;
                height:50%;
            }            
            .hover1 h6{
                font-size: .7rem;
            }
            .nav-link {
                 padding: .5rem .25rem; 
            }
        }
        @media screen and (max-width: 991px) {
            #cartDisplay1{
                display: block;
                margin-top: 30px;
            }
            #cartDisplay2{display: none;}
            .notification {
                    margin-left: 13px !important;
                    margin-top: -55px !important;
            }
        }
    </style>

  </head>
  <body>


<section class="sticky-top bg-dark">
          <style>
              .notification {
                    width: 30px;
                    height: 30px;
                    border-radius: 100%;
                    background-color: #E7272D;
                    color: white;
                    margin-left: -20px;
                    margin-top: -15px;
                }
                .navbar {
                     padding: 0; 
                }
                .navbar-brand {
                     padding-top: 0; 
                     padding-bottom: 0; 
                }
          </style>
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container-fluid">


                  <a class="navbar-brand" href="/"><img src="../assets/img/logo/Jafran.png" alt="" style="width:100px; height:100px;"></a>
                  
                <!-- offcanvas -->
                <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
                </button>
                <!-- offcanvas -->

                    <!--<div id="cartDisplay1">-->
                    <!--<ul class="navbar-nav ms-auto mb-2 mb-lg-0">-->

                    <!--  <li class="nav-item"><a class="nav-link {{'carts/cartshome'==request()->path()?'active':''}}" href="{{ route('cartshome') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>-->
                    <!--  <li class="nav-item">-->
                    <!--      <a class="nav-link" href="{{ route('cartshome') }}">-->
                    <!--          <div class="notification text-center">-->
                    <!--              <p class="align-self-center">-->
                    <!--                  <span class="badge badge-warning" id="totalItems" style="font-size:1.1rem;margin-left: -6px">-->
                    <!--                     {{ App\Models\Cart::totalItems() }}-->
                    <!--                  </span>-->
                    <!--              </p>-->
                    <!--          </div>-->
                    <!--    </a>-->
                    <!--  </li>-->
                      
                    <!--</ul>-->
                    <!--</div>-->
                    
                  
                  <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
                  <!--  <span class="navbar-toggler-icon"></span>-->
                  <!--</button>-->
                  
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <!--<li class="nav-item"><a class="nav-link {{'/'==request()->path()?'active':''}}" aria-current="page" href="/">Home</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'reservation'==request()->path()?'active':''}}" href="/reservation">Reservation</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'menu'==request()->path()?'active':''}}" href="/menu">Menu</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'aboutUs'==request()->path()?'active':''}}" href="/aboutUs">About Us</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'contactUs'==request()->path()?'active':''}}" href="/contactUs">Contact Us</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'login'==request()->path()?'active':''}}" href="/login">Login</a></li>-->
                      <li class="nav-item"><a class="nav-link 
                      {{'admin/home'==request()->path()?'active':''}}
                      {{'productadd'==request()->path()?'active':''}}
                      {{'productshow'==request()->path()?'active':''}}
                      {{'foodadd'==request()->path()?'active':''}}
                      {{'allOrderInfoOnline'==request()->path()?'active':''}}
                      {{'allReservation'==request()->path()?'active':''}}
                      {{'foodshow'==request()->path()?'active':''}}
                      {{'stockadd'==request()->path()?'active':''}}
                      {{'stockshow'==request()->path()?'active':''}}
                      {{'allContacts'==request()->path()?'active':''}}
                      {{'tableadd'==request()->path()?'active':''}}
                      {{'alltable'==request()->path()?'active':''}}
                      {{'tableCarts'==request()->path()?'active':''}}
                      {{'tableOrders'==request()->path()?'active':''}}
                      {{'kotOrders'==request()->path()?'active':''}}
                      {{'aaa'==request()->path()?'active':''}}
                      {{'aaa'==request()->path()?'active':''}}
                      {{'aaa'==request()->path()?'active':''}}
                      {{'aaa'==request()->path()?'active':''}}
                      {{'ingredientsadd'==request()->path()?'active':''}}
                      {{'ingredientsShow'==request()->path()?'active':''}}
                      {{'dailysaleRestaurantadd'==request()->path()?'active':''}}
                      {{'dailysaleshowRestaurant'==request()->path()?'active':''}} 
                      {{'allOnlineOrder'==request()->path()?'active':''}}" href="/admin/home">Admin</a></li>
                      <li class="nav-item"><a class="nav-link {{'home'==request()->path()?'active':''}}" aria-current="page" href="/home">Dashboard</a></li>
                      <li class="nav-item" id="cartDisplay2"><a class="nav-link {{'carts/carts'==request()->path()?'active':''}}" href="{{ route('companycarts') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
                      <li class="nav-item" id="cartDisplay2">
                          <a class="nav-link" href="{{ route('companycarts') }}">
                              <div class="notification text-center">
                                  <p class="align-self-center">
                                      <span class="badge badge-warning" id="totalItems" style="font-size:1.1rem;margin-left: -6px">
                                         {{ App\Models\Company::totalItems() }}
                                      </span>
                                  </p>
                              </div>
                        </a>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a></li>
                      
                      <!--<li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass"></i></a></li>-->
                      
                      <!--<li class="nav-item" id="cartDisplay2"><a class="nav-link {{'carts/cartshome'==request()->path()?'active':''}}" href="{{ route('cartshome') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>-->
                      <!--<li class="nav-item" id="cartDisplay2">-->
                      <!--    <a class="nav-link" href="{{ route('cartshome') }}">-->
                      <!--        <div class="notification text-center">-->
                      <!--            <p class="align-self-center">-->
                      <!--                <span class="badge badge-warning" id="totalItems" style="font-size:1.1rem;margin-left: -6px">-->
                      <!--                   {{ App\Models\Cart::totalItems() }}-->
                      <!--                </span>-->
                      <!--            </p>-->
                      <!--        </div>-->
                      <!--  </a>-->
                      <!--</li>-->
                      
                    </ul>
                  </div>
                </div>
            </nav>
        </div>
    </section>
    
    <!-- offcanvas -->
    <style>
        .sidebar-nav{
            width: 270px !important;
        }
        .sidebar-link{
            display: flex !important;
            align-items: center !important;
        }
        .sidebar-link .right-icon{
            display: inline-flex !important;
            transition: all ease 0.25s;
        }
        .sidebar-link[aria-expanded="true"] .right-icon {
            transform: rotate(180deg) !important;
        }
        .nav-link {padding: .1rem var(--bs-nav-link-padding-x);}
        main{
            margin-left: 270px !important;
        }
        @media (min-width: 992px) {
            body{
                overflow: auto !important;
            }
            .offcanvas-backdrop::before{
                display: none !important;
            }
            .sidebar-nav{
                transform: none !important;
                visibility: visible !important;
                top: 100px !important;
                height: calc(100% - 56px) !important;
            }
        }
        @media (max-width: 400px) {
            main{
                margin-left: 0 !important;
            }
        }
    </style>

    <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

        <div class="offcanvas-body p-0">
            <div class="navbar-dark">
                <ul class="navbar-nav">
                    

                    <!--<li><a class="nav-link px-3 sidebar-link {{'alluser'==request()->path()?'active':''}}" href="/alluser" style="font-size: 1.3rem;"><span>Users</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'productadd'==request()->path()?'active':''}}" href="/productadd" style="font-size: 1.3rem;"><span>Product Add</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'productshow'==request()->path()?'active':''}}" href="/productshow" style="font-size: 1.3rem;"><span>All Products Show</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'foodadd'==request()->path()?'active':''}}" href="/foodadd" style="font-size: 1.3rem;"><span>Food Add</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'foodshow'==request()->path()?'active':''}}" href="/foodshow" style="font-size: 1.3rem;"><span>All Food Items Show</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'stockadd'==request()->path()?'active':''}}" href="/stockadd" style="font-size: 1.3rem;"><span>Stock Add</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'stockshow'==request()->path()?'active':''}}" href="/stockshow" style="font-size: 1.3rem;"><span>Stock Show</span></a></li>-->
                    <li><a class="nav-link px-3 sidebar-link {{'ingredientsadd'==request()->path()?'active':''}}" href="/ingredientsadd" style="font-size: 1.3rem;"><span>Ingredients Add</span></a></li>
                    <li><a class="nav-link px-3 sidebar-link {{'ingredientsShow'==request()->path()?'active':''}}" href="/ingredientsShow" style="font-size: 1.3rem;"><span>Ingredients Details</span></a></li>
                    <li><a class="nav-link px-3 sidebar-link {{'dailysaleRestaurantadd'==request()->path()?'active':''}}" href="/dailysaleRestaurantadd" style="font-size: 1.3rem;"><span>Add Order</span></a></li>
                    <li><a class="nav-link px-3 sidebar-link {{'dailysaleshowRestaurant'==request()->path()?'active':''}}" href="/dailysaleshowRestaurant" style="font-size: 1.3rem;"><span>Show Order</span></a></li>
                    <li><a class="nav-link px-3 sidebar-link {{'allOrderInfoOnline'==request()->path()?'active':''}}" href="/allOrderInfoOnline" style="font-size: 1.3rem;"><span>All Online Order</span></a></li>
                    <li><a class="nav-link px-3 sidebar-link {{'allOnlineOrder'==request()->path()?'active':''}}" href="/allOnlineOrder" style="font-size: 1.3rem;"><span>Online Order Details</span></a></li>
                    <li><a class="nav-link px-3 sidebar-link {{'allReservation'==request()->path()?'active':''}}" href="/allReservation" style="font-size: 1.3rem;"><span>Reservations</span></a></li>
                    <li><a class="nav-link px-3 sidebar-link {{'allContacts'==request()->path()?'active':''}}" href="/allContacts" style="font-size: 1.3rem;"><span>All Contacts</span></a></li>
                    <!--<li><a class="nav-link px-3 sidebar-link {{'waiteradd'==request()->path()?'active':''}}" href="/waiteradd" style="font-size: 1.3rem;"><span>Add Waiter</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'allwaiter'==request()->path()?'active':''}}" href="/allwaiter" style="font-size: 1.3rem;"><span>All Waiter</span></a></li>-->
                    <li><a class="nav-link px-3 sidebar-link {{'tableadd'==request()->path()?'active':''}}" href="/tableadd" style="font-size: 1.3rem;"><span>Add Table</span></a></li>
                    <li><a class="nav-link px-3 sidebar-link {{'alltable'==request()->path()?'active':''}}" href="/alltable" style="font-size: 1.3rem;"><span>All Table</span></a></li>
                    
                    <li><a class="nav-link px-3 sidebar-link {{'tableCarts'==request()->path()?'active':''}}" href="/tableCarts" style="font-size: 1.3rem;"><span>Table Carts</span></a></li>
                    <!--<li><a class="nav-link px-3 sidebar-link {{'table1'==request()->path()?'active':''}}" href="/table1" style="font-size: 1.3rem;"><span>Table 1 Order</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'table2'==request()->path()?'active':''}}" href="/table2" style="font-size: 1.3rem;"><span>Table 2 Order</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'table3'==request()->path()?'active':''}}" href="/table3" style="font-size: 1.3rem;"><span>Table 3 Order</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'table4'==request()->path()?'active':''}}" href="/table4" style="font-size: 1.3rem;"><span>Table 4 Order</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'table5'==request()->path()?'active':''}}" href="/table5" style="font-size: 1.3rem;"><span>Table 5 Order</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'table6'==request()->path()?'active':''}}" href="/table6" style="font-size: 1.3rem;"><span>Table 6 Order</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'table7'==request()->path()?'active':''}}" href="/table7" style="font-size: 1.3rem;"><span>Table 7 Order</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'table8'==request()->path()?'active':''}}" href="/table8" style="font-size: 1.3rem;"><span>Table 8 Order(Waiting Table)</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'table9'==request()->path()?'active':''}}" href="/table9" style="font-size: 1.3rem;"><span>Table 9 Order</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'table10'==request()->path()?'active':''}}" href="/table10" style="font-size: 1.3rem;"><span>Table 10 Order</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{'tableOrders'==request()->path()?'active':''}}" href="/tableOrders" style="font-size: 1.3rem;"><span>Table Orders</span></a></li>-->
                    <li class="pb-5"><a class="nav-link px-3 pb-5 sidebar-link {{'kotOrders'==request()->path()?'active':''}}" href="/kotOrders" style="font-size: 1.3rem;"><span>KOT Orders</span></a></li>
        
                    
                    <!--<li><a class="nav-link px-3 sidebar-link {{'productcart'==request()->path()?'active':''}}" href="/productcart" style="font-size: 1.3rem;"><span>Product Cart</span></a></li>-->
                    <!--<li><a class="nav-link px-3 sidebar-link {{''==request()->path()?'active':''}}" href="" style="font-size: 1.3rem;"><span>Logout</span></a></li>-->

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
   @csrf
   
</form>
                </ul>
            </div>
        </div>
    </div>
    <!-- offcanvas -->

    <!-- body -->
    <main class="">
        @yield('content')
    </main>
    <!-- body -->


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>