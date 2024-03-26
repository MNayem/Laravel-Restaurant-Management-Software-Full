<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>T @yield('title')</title>
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


    <section class="sticky-top bg-dark" style="height:15vh;">
        <div class="">
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
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container-fluid">

                  <a class="navbar-brand" href="/"><img src="../assets/img/logo/Jafran.png" alt="" style="width:100px; height:100px;"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
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

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                      <li class="nav-item"><a class="nav-link 
                      {{'dine_in'==request()->path()?'active':''}}
                      {{'printCart'==request()->path()?'active':''}}
                      {{'table2'==request()->path()?'active':''}}
                      {{'table3'==request()->path()?'active':''}}
                      {{'table4'==request()->path()?'active':''}}
                      {{'table5'==request()->path()?'active':''}}
                      {{'table6'==request()->path()?'active':''}}
                      {{'table7'==request()->path()?'active':''}}
                      {{'table8'==request()->path()?'active':''}}
                      {{'table9'==request()->path()?'active':''}}
                      {{'table10'==request()->path()?'active':''}}
                      " aria-current="page" href="/dine_in">DINE IN</a></li>                        
                      <li class="nav-item"><a class="nav-link {{'take_away'==request()->path()?'active':''}}" aria-current="page" href="/take_away">TAKE AWAY</a></li>

                    </ul>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <!--<li class="nav-item"><a class="nav-link {{'/'==request()->path()?'active':''}}" aria-current="page" href="/">Home</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'reservation'==request()->path()?'active':''}}" href="/reservation">Reservation</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'menu'==request()->path()?'active':''}}" href="/menu">Menu</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'aboutUs'==request()->path()?'active':''}}" href="/aboutUs">About Us</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'contactUs'==request()->path()?'active':''}}" href="/contactUs">Contact Us</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'login'==request()->path()?'active':''}}" href="/login">Login</a></li>-->
                      <li class="nav-item"><a class="nav-link {{'admin/home'==request()->path()?'active':''}}" href="/admin/home">Admin</a></li>
                      <li class="nav-item"><a class="nav-link" href="/home">DASHBOARD</a></li>
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
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
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
                      
                      <!--<button onclick="window.print()" style="border-radius:100%;width:40px;height:40px;"><i class="fa-solid fa-print" style=""></i></button>-->
                      
                    </ul>
                  </div>
                </div>
            </nav>
        </div>
    </section>
    


    <!-- body -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 col-lg-2 col-xl-1 col-md-2 bg-dark pt-5" style="min-height:85vh;">
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart'==request()->path()?'active':''}}   
                {{'search'==request()->path()?'active':''}} 
                {{'customerPrintShowT1'==request()->path()?'active':''}}
                " href="/printCart" style="font-size: 1.3rem;" target="_blank"><span>Table 01</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart2'==request()->path()?'active':''}}   
                {{'searchT2'==request()->path()?'active':''}} 
                {{'customerPrintShowT2'==request()->path()?'active':''}}
                " href="/printCart2" style="font-size: 1.3rem;" target="_blank"><span>Table 02</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart3'==request()->path()?'active':''}}  
                {{'searchT3'==request()->path()?'active':''}} 
                {{'customerPrintShowT3'==request()->path()?'active':''}}
                " href="/printCart3" style="font-size: 1.3rem;" target="_blank"><span>Table 03</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart4'==request()->path()?'active':''}}   
                {{'searchT4'==request()->path()?'active':''}} 
                {{'customerPrintShowT4'==request()->path()?'active':''}}
                " href="/printCart4" style="font-size: 1.3rem;" target="_blank"><span>Table 04</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart5'==request()->path()?'active':''}}   
                {{'searchT5'==request()->path()?'active':''}} 
                {{'customerPrintShowT5'==request()->path()?'active':''}}
                " href="/printCart5" style="font-size: 1.3rem;" target="_blank"><span>Table 05</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart6'==request()->path()?'active':''}}   
                {{'searchT6'==request()->path()?'active':''}} 
                {{'customerPrintShowT6'==request()->path()?'active':''}}
                " href="/printCart6" style="font-size: 1.3rem;" target="_blank"><span>Table 06</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart7'==request()->path()?'active':''}}   
                {{'searchT7'==request()->path()?'active':''}} 
                {{'customerPrintShowT7'==request()->path()?'active':''}}
                " href="/printCart7" style="font-size: 1.3rem;" target="_blank"><span>Table 07</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart8'==request()->path()?'active':''}}   
                {{'searchT8'==request()->path()?'active':''}} 
                {{'customerPrintShowT8'==request()->path()?'active':''}}
                " href="/printCart8" style="font-size: 1.3rem;" target="_blank"><span>Table 08</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart9'==request()->path()?'active':''}}   
                {{'searchT9'==request()->path()?'active':''}} 
                {{'customerPrintShowT9'==request()->path()?'active':''}}
                " href="/printCart9" style="font-size: 1.3rem;" target="_blank"><span>Table 09</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart10'==request()->path()?'active':''}}   
                {{'searchT10'==request()->path()?'active':''}} 
                {{'customerPrintShowT10'==request()->path()?'active':''}}
                " href="/printCart10" style="font-size: 1.3rem;" target="_blank"><span>Table 10</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart11'==request()->path()?'active':''}}   
                {{'searchT11'==request()->path()?'active':''}} 
                {{'customerPrintShowT11'==request()->path()?'active':''}}
                " href="/printCart11" style="font-size: 1.3rem;" target="_blank"><span>Table 11</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart12'==request()->path()?'active':''}}   
                {{'searchT12'==request()->path()?'active':''}} 
                {{'customerPrintShowT12'==request()->path()?'active':''}}
                " href="/printCart12" style="font-size: 1.3rem;" target="_blank"><span>Table 12</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart13'==request()->path()?'active':''}}  
                {{'searchT13'==request()->path()?'active':''}} 
                {{'customerPrintShowT13'==request()->path()?'active':''}}
                " href="/printCart13" style="font-size: 1.3rem;" target="_blank"><span>Table 13</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart14'==request()->path()?'active':''}}   
                {{'searchT14'==request()->path()?'active':''}} 
                {{'customerPrintShowT14'==request()->path()?'active':''}}
                " href="/printCart14" style="font-size: 1.3rem;" target="_blank"><span>Table 14</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart15'==request()->path()?'active':''}}   
                {{'searchT15'==request()->path()?'active':''}} 
                {{'customerPrintShowT15'==request()->path()?'active':''}}
                " href="/printCart15" style="font-size: 1.3rem;" target="_blank"><span>Table 15</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart16'==request()->path()?'active':''}}   
                {{'searchT16'==request()->path()?'active':''}} 
                {{'customerPrintShowT16'==request()->path()?'active':''}}
                " href="/printCart16" style="font-size: 1.3rem;" target="_blank"><span>Table 16</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart17'==request()->path()?'active':''}}  
                {{'searchT17'==request()->path()?'active':''}}  
                {{'customerPrintShowT17'==request()->path()?'active':''}}
                " href="/printCart17" style="font-size: 1.3rem;" target="_blank"><span>Table 17</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart18'==request()->path()?'active':''}}  
                {{'searchT18'==request()->path()?'active':''}}  
                {{'customerPrintShowT18'==request()->path()?'active':''}}
                " href="/printCart18" style="font-size: 1.3rem;" target="_blank"><span>Table 18</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCart19'==request()->path()?'active':''}}   
                {{'searchT19'==request()->path()?'active':''}} 
                {{'customerPrintShowT19'==request()->path()?'active':''}}
                " href="/printCart19" style="font-size: 1.3rem;" target="_blank"><span>Table 19</span></a></div>
                <div class="row pb-5"><a class="nav-link px-3 sidebar-link 
                {{'printCart20'==request()->path()?'active':''}}   
                {{'searchT20'==request()->path()?'active':''}} 
                {{'customerPrintShowT20'==request()->path()?'active':''}}
                " href="/printCart20" style="font-size: 1.3rem;" target="_blank"><span>Table 20</span></a></div>
                <!--<div class="row"><a class="nav-link px-3 sidebar-link {{'waiteradd'==request()->path()?'active':''}}" href="/waiteradd" style="font-size: 1.3rem;"><span>Add Waiter</span></a></div>-->
                <!--<div class="row"><a class="nav-link px-3 sidebar-link {{'allwaiter'==request()->path()?'active':''}}" href="/allwaiter" style="font-size: 1.3rem;"><span>All Waiter</span></a></div>-->
            </div>
            <div class="col-8 col-lg-10 col-xl-11 col-md-10 bg-light" style="min-height:85vh;">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- body -->


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>