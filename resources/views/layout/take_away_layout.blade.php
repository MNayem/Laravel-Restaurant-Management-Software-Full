<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TA @yield('title')</title>
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

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                      <li class="nav-item"><a class="nav-link" aria-current="page" href="/dine_in">DINE IN</a></li>                        
                      <li class="nav-item"><a class="nav-link {{'take_away'==request()->path()?'active':''}}" aria-current="page" href="/take_away">TAKE AWAY</a></li>

                    </ul>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                    </ul>
                  </div>
                </div>
            </nav>
        </div>
    </section>
    


    <!-- body -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-5 col-lg-2 col-md-3 bg-dark pt-5" style="min-height:85vh;">
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCartTA1'==request()->path()?'active':''}}   
                {{'searchTA1'==request()->path()?'active':''}} 
                {{'customerPrintShowTA1'==request()->path()?'active':''}}
                " href="/printCartTA1" style="font-size: 1.3rem;" target="_blank"><span>Take Away 01</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCartTA2'==request()->path()?'active':''}}   
                {{'searchTA2'==request()->path()?'active':''}} 
                {{'customerPrintShowTA2'==request()->path()?'active':''}}
                " href="/printCartTA2" style="font-size: 1.3rem;" target="_blank"><span>Take Away 02</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCartTA3'==request()->path()?'active':''}}   
                {{'searchTA3'==request()->path()?'active':''}} 
                {{'customerPrintShowTA3'==request()->path()?'active':''}}
                " href="/printCartTA3" style="font-size: 1.3rem;" target="_blank"><span>Take Away 03</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link 
                {{'printCartTA4'==request()->path()?'active':''}}   
                {{'searchTA4'==request()->path()?'active':''}} 
                {{'customerPrintShowTA4'==request()->path()?'active':''}}
                " href="/printCartTA4" style="font-size: 1.3rem;" target="_blank"><span>Take Away 04</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link  
                {{'printCartTA5'==request()->path()?'active':''}}   
                {{'searchTA5'==request()->path()?'active':''}} 
                {{'customerPrintShowTA5'==request()->path()?'active':''}}
                " href="/printCartTA5" style="font-size: 1.3rem;" target="_blank"><span>Take Away 05</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link  
                {{'printCartTA6'==request()->path()?'active':''}}   
                {{'searchTA6'==request()->path()?'active':''}} 
                {{'customerPrintShowTA6'==request()->path()?'active':''}}
                " href="/printCartTA6" style="font-size: 1.3rem;" target="_blank"><span>Take Away 06</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link  
                {{'printCartTA7'==request()->path()?'active':''}}   
                {{'searchTA7'==request()->path()?'active':''}} 
                {{'customerPrintShowTA7'==request()->path()?'active':''}}
                " href="/printCartTA7" style="font-size: 1.3rem;" target="_blank"><span>Take Away 07</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link  
                {{'printCartTA8'==request()->path()?'active':''}}   
                {{'searchTA8'==request()->path()?'active':''}} 
                {{'customerPrintShowTA8'==request()->path()?'active':''}}
                " href="/printCartTA8" style="font-size: 1.3rem;" target="_blank"><span>Take Away 08</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link  
                {{'printCartTA9'==request()->path()?'active':''}}   
                {{'searchTA9'==request()->path()?'active':''}} 
                {{'customerPrintShowTA9'==request()->path()?'active':''}}
                " href="/printCartTA9" style="font-size: 1.3rem;" target="_blank"><span>Take Away 09</span></a></div>
                <div class="row"><a class="nav-link px-3 sidebar-link  
                {{'printCartTA10'==request()->path()?'active':''}}   
                {{'searchTA10'==request()->path()?'active':''}} 
                {{'customerPrintShowTA10'==request()->path()?'active':''}}
                " href="/printCartTA10" style="font-size: 1.3rem;" target="_blank"><span>Take Away 10</span></a></div>
            </div>
            <div class="col-7 col-lg-10 col-md-9 bg-light" style="min-height:80vh;">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- body -->


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>