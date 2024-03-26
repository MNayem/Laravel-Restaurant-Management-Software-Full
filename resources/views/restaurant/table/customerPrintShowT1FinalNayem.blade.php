
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jafran Rooftop Restaurant</title>
    <link rel="icon"  href="../assets/img/logo/Jafran.png">
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Syne&display=swap" rel="stylesheet">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
    body{
        /*font-family: 'Syne', sans-serif;*/
    }
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
                    <div class="text-center d-flex justify-content-center align-self-center">
                        <a class="navbar-brand text-center" href="/"><img src="../assets/img/logo/Jafran.png" alt="" style="width:100px; height:100px;"></a>
                    </div>
                  
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <!--<li class="nav-item"><a class="nav-link {{'/'==request()->path()?'active':''}}" aria-current="page" href="/">Home</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'reservation'==request()->path()?'active':''}}" href="/reservation">Reservation</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'menu'==request()->path()?'active':''}}" href="/menu">Menu</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'aboutUs'==request()->path()?'active':''}}" href="/aboutUs">About Us</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'contactUs'==request()->path()?'active':''}}" href="/contactUs">Contact Us</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'login'==request()->path()?'active':''}}" href="/login">Login</a></li>-->
                      <!--<li class="nav-item"><a class="nav-link {{'admin/home'==request()->path()?'active':''}}" href="/admin/home">Dashboard</a></li>-->
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
                      
                      <form action="/customerPrintShowT1updateStatus" method="post">
                             @csrf
                            <input type="submit" name="submit" value="Print" class="btn btn-info" onclick="window.print()">
                      </form>
                      
                    </ul>
                  </div>
                </div>
            </nav>
        </div>
    </section>
    
    <section>
        <div class="container-fluid">
            <div class="row">
                <span></span>
                <span class="fw-bold" style="margin-left:-10px; font-size: 18px;">Order Details</span>  <hr>
                <span class="fw-bold" style="margin-left:-10px;">Order ID: {{ $orderID->order_id }}</span>
                <span class="fw-bold" style="margin-left:-10px;">Table Number: {{ $orderID->tablenumber }}</span>
                <span class="fw-bold" style="margin-left:-10px;">Waiter Name: {{ $waiterName->wname }}</span>
                <br><hr>
                <table class="table table-borderless">
                     <thead>
                        <tr align="center" style="font-size: 16px; font-family: thoma;">
                          <th scope="col">No.</th>
                          <th scope="col">Food Name</th>
                          <!--<th scope="col">Table Number</th>-->
                          <th scope="col">Qty</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Total Amount</th>
                        </tr>
                      </thead>
                     <tbody>
                          @php
                            $total_price = 0;
                          @endphp
                          @foreach ($customerPrintShowT1 as $customerPrintShowT1)
                          <tr align="center" style="font-size: 15px; font-weight: bold; font-family: thoma;">
                              <!--<td>{{ $customerPrintShowT1->order_id }}</td>-->
                              <td>
                                {{ $loop->index + 1 }}
                              </td>
                              <td>{{ $customerPrintShowT1->fname  }}</td>
                              <!--<td>{{ $customerPrintShowT1->tablenumber  }}</td>-->
                              <td>{{ $customerPrintShowT1->product_quantity  }}</td>
                              <td>{{ $customerPrintShowT1->amount  }}</td>
                              <td>
                                 @php
                                    $total_price += $customerPrintShowT1->amount * $customerPrintShowT1->product_quantity;
                                 @endphp
                                  {{ $customerPrintShowT1->amount * $customerPrintShowT1->product_quantity  }}
                                  <!--{{ $customerPrintShowT1->amount * $customerPrintShowT1->product_quantity }}-->
                              </td>
                              <!--<td class="text-right" colspan="5">-->
                              <!--    <span class="fw-bold">Total Payable Amount: BDT. {{ $customerPrintShowT1-> sum('tamount')}}</span>-->
                              <!--</td>-->
                          </tr>
                          @endforeach
                         <tr>
                               <td colspan="3"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Total:
                                </td>
                                <td>
                                  <strong> {{ $total_price }} Taka</strong>
                                </td>
                          </tr>
                          <tr>
                               <td colspan="3"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Vat:
                                </td>
                                <td>
                                  <strong>{{ $waiterName->vat }} Taka</strong>
                                </td>
                          </tr>
                          <tr>
                               <td colspan="3"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Discount Percentage:
                                </td>
                                <td>
                                  <strong>{{ $waiterName->	discount_percentage }} %</strong>
                                </td>
                          </tr>
                          <tr>
                               <td colspan="3"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Discount Amount:
                                </td>
                                <td>
                                  <strong>{{ $waiterName->discount_amount }} Taka</strong>
                                </td>
                          </tr>
                           <tr>
                               <td colspan="3"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Discount Amount (In Number):
                                </td>
                                <td>
                                  <strong>{{ $waiterName->discount_amount_number }} Taka</strong>
                                </td>
                          </tr>
                          <tr>
                               <td colspan="3"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Grand Total:
                                </td>
                                <td>
                                  <strong> {{ ($total_price + $waiterName->vat) - ($waiterName->discount_amount + $waiterName->discount_amount_number) }} Taka</strong>
                                </td>
                          </tr>
                          <tr>
                               <td colspan="3"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Received Amount:
                                </td>
                                <td>
                                  <strong> {{ $waiterName->given_amount }} Taka</strong>
                                </td>
                          </tr>
                          <tr style="border-top: 3px solid #ddd;">
                               <td colspan="3"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Changed Amount:
                                </td>
                                <td>
                                  <strong> {{ $waiterName->given_amount - (($total_price + $waiterName->vat) - ($waiterName->discount_amount + $waiterName->discount_amount_number)) }} Taka</strong>
                                </td>
                          </tr>
                      </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>