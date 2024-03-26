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
              <span class="btn btn-light fw-bold text-start" style="width: 82%;">Waiter:</span>
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
              <div class="col-lg-7">
                <div class="input-group mb-3">
                    
                  <form action="/searchT02" method="post" style="width:100%;">
                    @csrf  
                    <!--<span class="input-group-text bg-dark" id="basic-addon1" style="cursor: pointer;">-->
                    <!--<i class="fa-solid fa-circle-plus fs-4 text-light"></i>-->
                    <!--</span>-->
                    <!--<input type="submit" name="submit">-->
                    <div class="input-group">
                      <input type="submit" name="submit" class="btn btn-dark fw-bold" value="ADD">
                      <input type="number" name="foodNumber" class="form-control" placeholder="Add Food Number" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </form> 
                </div>
              </div>
              <div class="col-lg-5">
                <div class="input-group mb-3">
                    
                    
                  <!--<span class="input-group-text bg-dark" style="cursor: pointer;" id="basic-addon1">-->
                  <!--  <i class="fa-solid fa-circle-plus fs-4 text-light"></i>-->
                  <!--</span>-->
                  <!--<select class="form-select bg-light" aria-label="Default select example">-->
                  <!--  <option selected>Choose Waiter</option>-->
                  <!--  <option value="1">Waiter 1</option>-->
                  <!--  <option value="2">Waiter 2</option>-->
                  <!--  <option value="3">Waiter 3</option>-->
                  <!--</select>-->
                  
                  
                  
                  
                </div>
              </div>
            </div>
            <div class="row m-1" style="border: 2px solid black;border-radius: .5rem;">
              <div class="table-responsive" style="border-bottom:1px solid gray;">
                  
                  
                  
                <table class="table table-light table-striped table-hover text-center">
                  <thead>
                    <tr class="text-danger" style=" font-size: 1.2rem;">
                      <th scope="col">Serial <br> Number</th>
                      <th scope="col">Food <br> Name</th>
                      <th scope="col">Quantity <br> <br></th>
                      <th scope="col">Amount <br> <br></th>
                      <th scope="col">Total  <br> Amount</th>
                      <th scope="col">Action <br> <br></th>
                    </tr>
                  </thead>
                  <tbody>
                        @php
                         $total_price = 0;
                        @endphp
                          @foreach ($tableCartsPrintShow as $tableCartsPrintShow)
                    <tr>
                      <th>{{ $tableCartsPrintShow->food_number }}</th>
                      <td class="fw-bold text-primary text-start">{{ $tableCartsPrintShow->fname  }}</td>
                      <td>
                          <!--<input type="number" placeholder="2" style="text-align: right; width: 40%;">-->
                          <form class="form-inline" action="{{ url('/quantityEditFront',$tableCartsPrintShow->id) }}" method="post">
                                    @csrf
                                    <input type="number" name="product_quantity" class="form-control" style="width:100%;" value="{{ $tableCartsPrintShow->product_quantity }}"/>
                                    <button type="submit" class="btn btn-success mt-1 fw-bold">Update</button>
                                </form>
                      </td>
                      <td class="fw-bold">{{ $tableCartsPrintShow->amount  }}</td>
                      <td class="fw-bold">
                          @php
                                    $total_price += $tableCartsPrintShow->amount * $tableCartsPrintShow->product_quantity;
                                @endphp
                                  {{ $tableCartsPrintShow->amount * $tableCartsPrintShow->product_quantity  }}
                          </td>
                      <td>
                        <!--<a href=""><i class="fa-solid fa-circle-check bg-success p-1 rounded text-light"></i></a>-->
                        <!--<a href=""><i class="fa-solid fa-trash-can bg-danger p-1 rounded text-white"></i></a>-->
                        
                        <form class="form-inline" action="{{ url('/quantityDeleteFront02',$tableCartsPrintShow->id) }} }}" method="get">
                            @csrf
                            <input type="hidden" name="cart_id" />
                            <button type="submit" class="btn btn-danger fw-bold">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                

                
                
                
              </div>
              <div class="row px-2 fw-bold">
                <div class="col-6">Total Amount (tk):</div>
                <div class="col-6" style="text-align: right;">{{ $total_price }}</div>
              </div>
            </div>
            
            <div class="row d-flex justify-content-center pt-3">
              <!--<a class="btn btn-dark fw-bold" style="width: 96%;" href="">KOT Print</a>-->
              <form method="post" action="/kotPrintT02">
                  @csrf
                 <input type="submit" name="submit" value="GO FOR KOT PRINT" class="btn btn-dark fw-bold" style="width: 96%;">
              </form>
            </div>
          </div>

          <div class="col-lg-4 col-md-12 col-12 customerSection bg-dark py-3 py-lg-0 ">

            <div class="row mx-1 justify-content-end" style="border: 2px solid white; border-radius: .5rem;min-height:200px;">
              <div style=""> 
              
              
                <form class="text-light" action="/customerPrint02" method="post">
                  @csrf

                   <select class="form-select mt-2" aria-label="Default select example" name="name">
                      <option value="" selected hidden>Choose Waiter</option>
                         @foreach ($waiterName as $waiterName)
                            <option value="{{ $waiterName->name }}">{{ $waiterName->name }}</option>
                         @endforeach
                    </select>

              
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Order ID : </label>
                <div class="col-7 align-self-center" style="text-align: right;">
                    <input type="number" name="order_id" class="form-control fw-bold bg-dark text-light" value="{{ $orderIdShow->order_id }}" style="text-align: end;border:none;">
                </div>
              </div>
              
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Total Amount : </label>
                <div class="col-7 align-self-center" style="text-align: right;">
                    <input type="number" name="tamount" class="form-control fw-bold bg-dark text-light" value="{{ $total_price }}" style="text-align: end;border:none;">
                </div>
              </div>
              
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">S / C (%): </label>
                <div class="col-7">
                  <input type="number" class="form-control" step="any" name="s_charge" placeholder="0" style="text-align: end;">
                </div>
                <!--<div class="col-3 align-self-center" style="text-align: right;">-->
                <!--  <span class="text-light fw-bold fs-5">25 tk</span>-->
                <!--</div>-->
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">VAT (%): </label>
                <div class="col-7">
                  <input type="number" class="form-control" step="any" name="vat" placeholder="0" style="text-align: end;">
                </div>
              </div>
              
              <!--<div class="row pt-1">-->
              <!--  <label for="inputPassword" class="col-5 col-form-label text-light">Sub Total : </label>-->
              <!--  <div class="col-7 align-self-center" style="text-align: right;">-->
              <!--    <span class="text-light fw-bold fs-5">3300 tk</span>-->
              <!--  </div>-->
              <!--</div>-->
              
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Discount (%): </label>
                <div class="col-7">
                  <input type="number" step="any" name="discount_percentage" class="form-control" placeholder="0" style="text-align: end;">
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light">Discount (in number): </label>
                <div class="col-7">
                  <input type="number" step="any" name="discount_amount_number" class="form-control" placeholder="0" style="text-align: end;">
                </div>
              </div>

              <!--<div class="row py-1">-->
              <!--  <label for="inputPassword" class="col-5 col-form-label text-light">Grand Total : </label>-->
              <!--  <div class="col-7 align-self-center" style="text-align: right;">-->
              <!--    <span class="text-light fw-bold fs-5">00 tk</span>-->
              <!--  </div>-->
              <!--</div>-->
              
              <!--<div class="row py-1 text-center">-->
              <!--      <div class="col-12">-->
              <!--         <a href="" class="btn btn-success px-5 fw-bold">Add</a>-->
              <!--      </div>-->
              <!--</div>-->
              
              <div class="row py-1 text-center">
                    <div class="col-12">
                      <input type="submit" name="submit" value="Add" class="btn btn-success px-5 fw-bold">
                    </div>
              </div>
                  
              </form>
              
              </div>
            </div>

            <div class="row d-flex justify-content-center pt-1">
              <a class="btn btn-light fw-bold" style="width: 93%;" href="">Customer Print</a>
            </div>

            <div class="row mt-4 m-1 justify-content-end" style="border: 2px solid white; border-radius: .5rem;min-height:200px;">
              <div style="display:none;">  
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

