<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@extends('layout.userLayout')
@section('title','8')

@section('content')

    <section>
      <div class="">
        <div class="row">

          <div class="col-lg-7 col-md-12 col-12 kotSection py-3">
            @if(session()->has('messageWarning'))
                <div class="alert bg-warning text-white fs-4 fw-bold mb-0 mt-2">
                    {{ session()->get('messageWarning') }}
                </div>
            @endif
            @if(session()->has('messageSuccess'))
                <div class="alert bg-success text-white fs-4 fw-bold mb-0 mt-2">
                    {{ session()->get('messageSuccess') }}
                </div>
            @endif
            <div class="row pt-3">
              <div class="col-lg-12">
                <div class="input-group mb-3">
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                  <form action="/searchT8" method="post" style="width: 100%;">
                      @csrf  
                    <div class="input-group">
                      <input type="submit" name="submit" class="btn btn-dark fw-bold" value="ADD">
                      <input type="number" name="foodNumber" class="form-control" placeholder="Add Food Number" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                  </form> 
                </div>
              </div>
            </div>
            <div class="row m-1" style="border: 2px solid black;border-radius: .5rem;">
              <div class="table-responsive" style="border-bottom:1px solid gray;">
                <table class="table table-light table-striped table-hover text-center">
                  <thead>
                    <tr class="text-danger" style=" font-size: 1.2rem;">
                      <th scope="col">Food <br> Number</th>
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
                      <td class="fw-bold">{{ $tableCartsPrintShow->food_number  }}</td>
                      <td class="fw-bold text-primary text-start">{{ $tableCartsPrintShow->fname  }}</td>
                      <td>
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
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                        <form class="form-inline" action="{{ url('/quantityDeleteFront8',$tableCartsPrintShow->id) }} }}" method="get">
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
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
              <form method="post" class="text-center" action="/kotPrintT8">
                  @csrf
                 <input type="submit" name="submit" value="GO FOR KOT PRINT" class="btn btn-dark fw-bold" style="width: 96%;">
              </form>
            </div> 
          </div>

          <div class="col-lg-5 col-md-12 col-12 customerSection bg-dark py-3" style="min-height:85vh;">

            <div class="row mx-1 justify-content-end" style="border: 2px solid white; border-radius: .5rem;min-height:200px;">
              <div> 
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
            <form action="/customerPrint8" method="post">
                  @csrf
              <div class="row pt-1">
                <div class="col-7">
                  <input type="hidden" class="form-control bg-dark text-light fw-bold" name="order_id" value="{{ $orderIdShow->order_id }}" style="text-align: end;border:none;">
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light fw-bold">Total Amount (tk) : </label>
                <div class="col-7">
                  <input type="number" class="form-control bg-dark text-light fw-bold" name="tamount" value="{{ $total_price }}" style="text-align: end;border:none;">
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light fw-bold">Waiter Name : </label>
                <div class="col-7">
                  <select class="form-select" aria-label="Default select example" name="name" required>
                      <option value="" selected hidden>Choose Waiter</option>
                         @foreach ($waiterName as $waiterName)
                            <option value="{{ $waiterName->name }}">{{ $waiterName->name }}</option>
                         @endforeach
                    </select>
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light fw-bold">Vat (%): </label>
                <div class="col-7">
                  <input type="number" class="form-control" step="any" name="vat" placeholder="0" style="text-align: end;">
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light fw-bold">S / C (%): </label>
                <div class="col-7">
                  <input type="number" class="form-control" step="any" name="s_charge" placeholder="0" style="text-align: end;">
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light fw-bold">Discount (%): </label>
                <div class="col-7">
                  <input type="number" class="form-control" step="any" name="discount_percentage" placeholder="0" style="text-align: end;">
                </div>
              </div>
              <div class="row pt-1" style="display:none;">
                <label for="inputPassword" class="col-5 col-form-label text-light fw-bold">Discount Amount: </label>
                <div class="col-7">
                  <input type="number" class="form-control" step="any" name="discount_amount" placeholder="0" disabled style="text-align: end;">
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light fw-bold">Discount (Extra) : </label>
                <div class="col-7">
                  <input type="number" class="form-control" step="any" name="discount_amount_number" placeholder="0" style="text-align: end;">
                </div>
              </div>
              <div class="row mt-3 p-2">
                  <input type="submit" name="submit" value="GO FOR CUSTOMER PRINT" class="btn btn-light fw-bold">
              </div>
              </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

@endsection