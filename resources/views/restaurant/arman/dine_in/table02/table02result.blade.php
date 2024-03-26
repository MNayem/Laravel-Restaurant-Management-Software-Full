<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jafran</title>
    <link rel="shortcut icon" href="../assets/img/logo/Jafran.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/brands.min.css" integrity="sha512-nS1/hdh2b0U8SeA8tlo7QblY6rY6C+MgkZIeRzJQQvMsFfMQFUKp+cgMN2Uuy+OtbQ4RoLMIlO2iF7bIEY3Oyg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/solid.min.css" integrity="sha512-EvFBzDO3WBynQTyPJI+wLCiV0DFXzOazn6aoy/bGjuIhGCZFh8ObhV/nVgDgL0HZYC34D89REh6DOfeJEWMwgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/regular.min.css" integrity="sha512-EbT6icebNlvxlD4ECiLvPOVBD0uQdt4pHRg8Gpkfirdu9W8l2rtRZO8rThjqeIK08ubcFeiFKHbek7y+lEbWIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  </head>
  <body>
    <section class="bg-dark sticky-top">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container-fluid">

            <a class="navbar-brand" href="/newDashboard"><img src="../assets/img/logo/JafranPrint.png" style="width: 100px;height: auto;"></a>
            <a class="active btn btn-outline-light px-5 mx-2 fw-bold" aria-current="page" href="/dine_in">DINE IN</a>
            <a class="btn btn-outline-light px-5 mx-2 fw-bold" href="/take_away">TAKE AWAY</a>

          </div>
        </nav>
      </div>
    </section>

    <section>
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-2 col-md-12 col-12 text-center customTableSection bg-dark pb-5">
            <div class="row pb-3 d-flex justify-content-center">
              <span class="btn btn-light fw-bold" style="width: 82%;">Waiter: Rahim</span>
            </div>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 01</a>
            <a href="/printCart02" class="btn btn-outline-light mt-1 fw-bold active">Table 02</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 03</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 04</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 05</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 06</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 07</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 08</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 09</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 10</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 11</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 12</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 13</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 14</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 15</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 16</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 17</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 18</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 19</a>
            <a href="" class="btn btn-outline-light mt-1 fw-bold">Table 20</a>

          </div>

          <div class="col-lg-6 col-md-12 col-12 kotSection pb-3">
            @if(session()->has('message'))
                <div class="alert alert-success mb-0 mt-2">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row pt-3">
              <div class="col-lg-12">
                <div class="input-group mb-3">
                    
                  <form action="/addtable02carts" method="post" style="width:100%;border:2px solid gray; padding: .5rem; border-radius: .5rem;">
                    @csrf
                    @foreach ($food as $food)
                    
                      <div class="row">
                        <div class="col-4">
                          <h6>Food Number :</h6>
                        </div>
                        <div class="col-8">
                          <input type="number" name="food_number" value="{{ $food->fnumber }}" style="width:100%;border:none;">
                        </div>
                      </div> 
                        <!--<label>Food Number:</label>-->
                        <!--<input type="number" name="food_number" value="{{ $food->fnumber }}"> <br>-->
                      
                      <div class="row">
                        <div class="col-4">
                          <h6>Food Name :</h6>
                        </div>
                        <div class="col-8">
                          <input type="text" name="fname" value="{{ $food->name }}" style="width:100%;border:none;">
                        </div>
                      </div> 
                        <!--<label>Food Name: &nbsp;</label>-->
                        <!--<input type="text" name="fname" value="{{ $food->name }}"> <br>-->
                      
                      <div class="row">
                        <div class="col-4">
                          <h6>Quantity :</h6>
                        </div>
                        <div class="col-8">
                          <input type="number" name="product_quantity" value="1" style="width:100%;">
                        </div>
                      </div>
                        <!--<label>Quantity: &nbsp;</label>-->
                        <!--<input type="number" name="product_quantity" value="1"> <br>-->
                      
                      <div class="row">
                        <div class="col-4">
                          <h6>Price :</h6>
                        </div>
                        <div class="col-8">
                          <input type="number" name="amount" value="{{ $food->sellingprice }}" style="width:100%;border:none;">
                        </div>
                      </div> 
                        <!--<label>Price: &nbsp;</label>-->
                        <!--<input type="number" step="any" name="amount" value="{{ $food->sellingprice }}"> <br>-->
                      
                      <div class="row">
                        <div class="col-4">
                          <h6>Table Number :</h6>
                        </div>
                        <div class="col-8">
                          <input type="number" name="tablenumber" value="2" style="width:100%;border:none;">
                        </div>
                      </div>
                        <!--<label>Table Number: &nbsp;</label>-->
                        <!--<input type="number" name="tablenumber" value="2"> <br>-->

                        <input type="submit" name="submit" value="ADD" class="btn btn-dark fw-bold mt-4" style="width:100%">
                        
                    @endforeach
                </form> 
                </div>
              </div>
            </div>
            
            <!--<div class="row m-1" style="border: 2px solid black;border-radius: .5rem;">-->
            <!--  <div class="table-responsive">-->
            <!--    <table class="table table-light table-striped table-hover text-center">-->
            <!--      <thead>-->
            <!--        <tr class="text-danger" style=" font-size: 1.2rem;">-->
            <!--          <th scope="col">SN</th>-->
            <!--          <th scope="col">Food Name</th>-->
            <!--          <th scope="col">QTY</th>-->
            <!--          <th scope="col">Price</th>-->
            <!--          <th scope="col">T.Price</th>-->
            <!--          <th scope="col">Action</th>-->
            <!--        </tr>-->
            <!--      </thead>-->
            <!--      <tbody>-->
            <!--        <tr>-->
            <!--          <th scope="row">1</th>-->
            <!--          <td class="fw-bold text-primary">BONELESS FRIED CHICKEN</td>-->
            <!--          <td><input type="number" placeholder="2" style="text-align: right; width: 40%;"></td>-->
            <!--          <td class="fw-bold">550</td>-->
            <!--          <td class="fw-bold">1100</td>-->
            <!--          <td>-->
            <!--            <a href=""><i class="fa-solid fa-circle-check bg-success p-1 rounded text-light"></i></a>-->
            <!--            <a href=""><i class="fa-solid fa-trash-can bg-danger p-1 rounded text-white"></i></a>-->
            <!--          </td>-->
            <!--        </tr>-->
            <!--        <tr>-->
            <!--          <th scope="row">2</th>-->
            <!--          <td class="fw-bold text-primary">Special Fried Prawn (6 Pcs)</td>-->
            <!--          <td><input type="number" placeholder="1" style="text-align: right; width: 40%;"></td>-->
            <!--          <td class="fw-bold">440</td>-->
            <!--          <td class="fw-bold">440</td>-->
            <!--          <td>-->
            <!--            <a href=""><i class="fa-solid fa-circle-check bg-success p-1 rounded text-light"></i></a>-->
            <!--            <a href=""><i class="fa-solid fa-trash-can bg-danger p-1 rounded text-white"></i></a>-->
            <!--          </td>-->
            <!--        </tr>-->
            <!--        <tr>-->
            <!--          <th scope="row">3</th>-->
            <!--          <td class="fw-bold text-primary">LEMON CHICKEN</td>-->
            <!--          <td><input type="number" placeholder="3" style="text-align: right; width: 40%;"></td>-->
            <!--          <td class="fw-bold">500</td>-->
            <!--          <td class="fw-bold">1500</td>-->
            <!--          <td>-->
            <!--            <a href=""><i class="fa-solid fa-circle-check bg-success p-1 rounded text-light"></i></a>-->
            <!--            <a href=""><i class="fa-solid fa-trash-can bg-danger p-1 rounded text-white"></i></a>-->
            <!--          </td>-->
            <!--        </tr>-->
            <!--      </tbody>-->
            <!--    </table>-->
            <!--  </div>-->
            <!--</div>-->
            
            <!--<div class="row d-flex justify-content-center pt-3">-->
            <!--  <a class="btn btn-dark fw-bold" style="width: 96%;" href="">KOT Print</a>-->
            <!--</div>-->
            
            
          </div>

          <div class="col-lg-4 col-md-12 col-12 customerSection bg-dark py-3 py-lg-0 ">

            <div class="row mx-1 justify-content-end" style="border: 2px solid white; border-radius: .5rem;">
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">S / C (%): </label>
                <div class="col-4">
                  <input type="text" class="form-control" id="inputPassword" placeholder="5" style="text-align: end;">
                </div>
                <div class="col-3 align-self-center" style="text-align: right;">
                  <span class="text-light fw-bold fs-5">25 tk</span>
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">VAT (%): </label>
                <div class="col-4">
                  <input type="text" class="form-control" id="inputPassword" placeholder="5" style="text-align: end;">
                </div>
                <div class="col-3 align-self-center" style="text-align: right;">
                  <span class="text-light fw-bold fs-5">25 tk</span>
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Sub Total : </label>
                <div class="col-7 align-self-center" style="text-align: right;">
                  <span class="text-light fw-bold fs-5">3300 tk</span>
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Discount (%): </label>
                <div class="col-4">
                  <input type="text" class="form-control" id="inputPassword" placeholder="5" style="text-align: end;">
                </div>
                <div class="col-3 align-self-center" style="text-align: right;">
                  <span class="text-light fw-bold fs-5">25 tk</span>
                </div>
              </div>
              <div class="row py-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Grand Total : </label>
                <div class="col-7 align-self-center" style="text-align: right;">
                  <span class="text-light fw-bold fs-5">3000 tk</span>
                </div>
              </div>
            </div>

            <div class="row d-flex justify-content-center pt-1">
              <a class="btn btn-light fw-bold" style="width: 93%;" href="">Customer Print</a>
            </div>

            <div class="row mt-4 m-1 justify-content-end" style="border: 2px solid white; border-radius: .5rem;">
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Receive (ntype): </label>
                <div class="col-7">
                  <select class="form-select bg-light" aria-label="Default select example">
                    <option selected>Payment Type</option>
                    <option value="1">Cash</option>
                    <option value="2">Card</option>
                    <option value="3">Others</option>
                  </select>
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Given Amount: </label>
                <div class="col-7">
                  <input type="text" class="form-control" id="inputPassword" placeholder="10 tk" style="text-align: end;"> 
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Exchange : </label>
                <div class="col-7 align-self-center" style="text-align: right;">
                  <span class="text-light fw-bold fs-5">250 tk</span>
                </div>
              </div>
              <div class="row py-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Grand Total : </label>
                <div class="col-7 align-self-center" style="text-align: right;">
                  <span class="text-light fw-bold fs-5">3000 tk</span>
                </div>
              </div>
            </div>
            <div class="row d-flex justify-content-center">
              <a class="btn btn-light fw-bold" style="width: 93%;" href="">Settlement Print</a>
            </div>
          </div>

        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>




    