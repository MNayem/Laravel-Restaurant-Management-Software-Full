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
        #cartDisplay1{display:none;}
        #cartDisplay2{display:block;}
        
        .nav-link{
            font-size: 1rem !important;
            font-weight: bold !important;
            text-transform: uppercase !important;
            color: black !important;
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
      
      <section class="sticky-top bg-white">
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
            <nav class="navbar navbar-expand-lg bg-white">
                <div class="container-fluid">
                  <a class="navbar-brand" href="/">
                      <img src="../assets/img/logo/Jafran.png" alt="" style="width:100px; height:100px;">
                  </a>

                    <div id="cartDisplay1">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                      <li class="nav-item"><a class="nav-link {{'carts/cartshome'==request()->path()?'active':''}}" href="{{ route('cartshome') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('cartshome') }}">
                              <div class="notification text-center">
                                  <p class="align-self-center">
                                      <span class="badge badge-warning" id="totalItems" style="font-size:1.1rem;margin-left: -6px">
                                         {{ App\Models\Cart::totalItems() }}
                                      </span>
                                  </p>
                              </div>
                        </a>
                      </li>
                      
                    </ul>
                    </div>
                    
                  
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item"><a class="nav-link {{'/'==request()->path()?'active':''}}" aria-current="page" href="/">Home</a></li>
                      <li class="nav-item"><a class="nav-link {{'reservation'==request()->path()?'active':''}}" href="/reservation">Reservation</a></li>
                      <li class="nav-item"><a class="nav-link {{'menu'==request()->path()?'active':''}}" href="/menu">Menu</a></li>
                      <li class="nav-item"><a class="nav-link {{'aboutUs'==request()->path()?'active':''}}" href="/aboutUs">About Us</a></li>
                      <li class="nav-item"><a class="nav-link {{'contactUs'==request()->path()?'active':''}}" href="/contactUs">Contact Us</a></li>
                      <li class="nav-item"><a class="nav-link {{'login'==request()->path()?'active':''}}" href="/login">Login</a></li>
                      <!--<li class="nav-item"><a class="nav-link {{'admin/home'==request()->path()?'active':''}}" href="/admin/home">Dashboard</a></li>-->
                      <li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                      
                      <li class="nav-item" id="cartDisplay2"><a class="nav-link {{'carts/cartshome'==request()->path()?'active':''}}" href="{{ route('cartshome') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
                      <li class="nav-item" id="cartDisplay2">
                          <a class="nav-link" href="{{ route('cartshome') }}">
                              <div class="notification text-center">
                                  <p class="align-self-center">
                                      <span class="badge badge-warning" id="totalItems" style="font-size:1.1rem;margin-left: -6px">
                                         {{ App\Models\Cart::totalItems() }}
                                      </span>
                                  </p>
                              </div>
                        </a>
                      </li>
                      
                    </ul>
                  </div>
                </div>
            </nav>
        </div>
    </section>
    
    <main>
        @yield('content')
    </main>


    <footer class="py-3" style="background-color: #1D1D1D;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="../assets/img/logo/Jafran.png" alt="" style="width:100px; height:100px;">
                    <p class="py-5" style="font-weight: bold; color: white;">
                        Call for Reservations: <br>
                        0123456789 <br>
                        Email Address:support@bdtask.com
                    </p>

                    <div style="color: rgb(158, 158, 158);font-size: 1.5rem;letter-spacing: .5rem;">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-google-plus-g"></i>
                        <i class="fa-brands fa-pinterest-p"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                </div>
                <div class="col-lg-8 py-3">
                    <!--<img class="img-fluid" src="../assets/img/map.JPG" alt="">-->
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.4707945896726!2d89.55071591446675!3d22.8220651295201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff90089b8b1e03%3A0xbba517c23ae5f684!2z4Ka24Ka_4KasIOCmrOCmvuCmoeCmvOCngCDgpq7gp4vgpqHgprwsIOCmluCngeCmsuCmqOCmvg!5e0!3m2!1sbn!2sbd!4v1640245306807!5m2!1sbn!2sbd"
                            width="100%" height="400" frameborder="0" style="border: 0px;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </footer>

 
    <!-- <div class="bottomToTop text-center"><i class="fa-solid fa-arrow-up" style="font-size: 3rem;"></i></div>    -->

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>