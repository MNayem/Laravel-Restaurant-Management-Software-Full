<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Vai</title>
    <link rel="icon" href="images/dv.png" type="image/gif" sizes="16x16"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    
    <header class="headerSection sticky-top bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-lg ">
              <div class="container-fluid">
                <a class="navbar-brand" href="/">Digital Vai</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="{{ route('register') }}">Sign Up</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ route('cartshome') }}">
                        <button class="btn btn-danger">
                          <span>Carts: </span>
                          <span class="badge badge-warning" id="totalItems">
                             {{ App\Models\Cart::totalItems() }}
                          </span>
                        </button>
                      </a>
                    </li>
                    <!--<li class="nav-item dropdown">-->
                    <!--  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
                    <!--    Dropdown-->
                    <!--  </a>-->
                    <!--  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">-->
                    <!--    <li><a class="dropdown-item" href="#">One</a></li>-->
                    <!--    <li><a class="dropdown-item" href="#">Two</a></li>-->
                    <!--  </ul>-->
                    <!--</li>-->
                  </ul>
                  <!--<form class="d-flex" role="search">-->
                  <!--  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
                  <!--  <button class="btn btn-outline-success" type="submit">Search</button>-->
                  <!--</form>-->
                </div>
              </div>
            </nav> 
        </div>

    </header>
    
    <section class="sliderSection"> 
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/images/slider/slider3.jpg" style="height:90vh" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/images/slider/slider2.jpg" style="height:90vh" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/images/slider/slider1.jpg" style="height:90vh" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </section>
    
    <section class="productSection my-5">
       
        <div class="container">
             
            <div class="row mb-5">
                @foreach($product as $product)
                    <div class="col-lg-3 mb-5">
                        <div class="card" style="width: 18rem;">
                          <img src="{{ $product->image }}" class="card-img-top" alt="Image" style="width: 100%; height: 300px;">
                          <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ $product->sellingprice }} TK</p>
                            <span>Do you want to buy this product!</span>
                            <p>
                                @include('cart.cart-button')
                            </p>
                          </div>
                        </div>
                    </div>
                @endforeach
            </div>
          
        </div>
    </section>
    
    
    <footer class="footerSection bg-light">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">© Copyright Digital Vai. All Rights Reserved by DigitalVai</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Home</a>
          </li>
        </ul>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>