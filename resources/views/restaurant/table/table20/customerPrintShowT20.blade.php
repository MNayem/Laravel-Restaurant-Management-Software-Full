<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@extends('layout.userLayout')
@section('title','20')

@section('content')
      
    <section>
      <div class="">
        <div class="row">
          <div class="col-lg-7 col-md-12 col-12 kotSection py-3">
            @if(session()->has('messageInfo'))
                <div class="alert bg-info text-white fs-4 fw-bold mb-0 mt-2">
                    {{ session()->get('messageInfo') }}
                </div>
            @endif
            @if(session()->has('messageDanger'))
                <div class="alert bg-danger text-white fs-4 fw-bold mb-0 mt-2">
                    {{ session()->get('messageDanger') }}
                </div>
            @endif
            <div class="row text-center pt-3"><h4 class="fw-bold">Order Details</h4></div>
            <div class="row m-1" style="border: 2px solid black;border-radius: .5rem;">
              <div class="table-responsive" style="border-bottom:1px solid gray;">
                <table class="table table-light table-striped table-hover text-center">
                  <thead>
                    <tr class="text-danger" style=" font-size: 1.2rem;">
                      <th scope="col">Order <br> Id</th>
                      <th scope="col">Table <br> Number</th>
                      <th scope="col">Food <br> Name</th>
                      <th scope="col">Quantity <br> <br></th>
                      <th scope="col">Amount <br> <br></th>
                      <th scope="col">Total  <br> Amount</th>
                    </tr>
                  </thead>
                      <tbody>
                          @php
                            $total_price = 0;
                          @endphp
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                          @foreach ($customerPrintShowT20 as $customerPrintShowT20)
                          <tr align="center" style="font-size: 15px; font-weight: bold; font-family: thoma;">
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                              <td>{{ $customerPrintShowT20->order_id }}</td>
                              <td>{{ $customerPrintShowT20->tablenumber  }}</td>
                              <td>{{ $customerPrintShowT20->fname  }}</td>
                              <td>{{ $customerPrintShowT20->product_quantity  }}</td>
                              <td>{{ $customerPrintShowT20->amount  }}</td>
                              <td>
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                                 @php
                                    $total_price += $customerPrintShowT20->amount * $customerPrintShowT20->product_quantity;
                                 @endphp
                                  {{ $customerPrintShowT20->amount * $customerPrintShowT20->product_quantity }}
                              </td>
                          </tr>
                          @endforeach

                      </tbody>
                </table>
              </div>
              
                <div class="row">
                    <div class="col-8"> <h5 class="fw-bold text-end">Total :</h5> </div>
                    <div class="col-4"><h5 class="fw-bold">{{ $total_price }} /=</h5></div>
                </div>
                <div class="row pt-4">
                    <div class="col-8"><h5 class="fw-bold text-end">Vat(%) :</h5></div>
                    <div class="col-4">
                         <form style="margin-bottom:0px;" method="post" action="{{ url('/vatEdit',$waiterName->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="vat" class="form-control" value="{{ $waiterName->vat }}">
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success fw-bold">Update</button>
                                </div>
                            </div>
                        </form>
                        <!--<h5 class="fw-bold">{{ $waiterName->vat }} /=</h5>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-8"><h5 class="fw-bold text-end">Vat In Amount :</h5></div>
                    <div class="col-4"><h5 class="fw-bold">{{ $waiterName->vat_amount }} /=</h5></div>
                </div>
                <div class="row pt-4">
                    <div class="col-8"><h5 class="fw-bold text-end">Service Charge(%) :</h5></div>
                    <div class="col-4">
                        <form style="margin-bottom:0px;" method="post" action="{{ url('/serviceChargeEdit',$waiterName->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-6"><input type="number" name="s_charge" class="form-control" value="{{ $waiterName->s_charge }}"></div>
                                <div class="col-6"><button type="submit" class="btn btn-success fw-bold">Update</button></div>
                            </div>
                        </form>
                        <!--<h5 class="fw-bold">{{ $waiterName->s_charge }} /=</h5>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-8"><h5 class="fw-bold text-end">Service Charge In Amount :</h5></div>
                    <div class="col-4"><h5 class="fw-bold">{{ $waiterName->s_charge_amount }} /=</h5></div>
                </div>
                <div class="row pt-4">
                    <div class="col-8"><h5 class="fw-bold text-end">Discount Percentage :</h5></div>
                    <div class="col-4">
                        <form style="margin-bottom:0px;" method="post" action="{{ url('/discountEdit',$waiterName->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-6"><input type="number" name="discount_percentage" class="form-control" value="{{ $waiterName->discount_percentage }}"></div>
                                <div class="col-6"><button type="submit" class="btn btn-success fw-bold">Update</button></div>
                            </div>
                        </form>
                        <!--<h5 class="fw-bold">{{ $waiterName->discount_percentage }} %</h5>-->
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-8"><h5 class="fw-bold text-end">Discount Amount :</h5></div>
                    <div class="col-4"><h5 class="fw-bold">{{ $waiterName->discount_amount }} /=</h5></div>
                </div>
                <div class="row pt-4">
                    <div class="col-8"><h5 class="fw-bold text-end">Discount (Extra) :</h5></div>
                    <div class="col-4">
                        <form style="margin-bottom:0px;" method="post" action="{{ url('/discountAmountExtraEdit',$waiterName->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-6"><input type="number" name="discount_amount_number" class="form-control" value="{{ $waiterName->discount_amount_number }}"></div>
                                <div class="col-6"><button type="submit" class="btn btn-success fw-bold">Update</button></div>
                            </div> 
                        </form>
                        <!--<h5 class="fw-bold">{{ $waiterName->discount_amount_number }} /=</h5>-->
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-8"><h5 class="fw-bold text-end">Grand Total :</h5></div>
                    <div class="col-4"><h5 class="fw-bold">{{ ($total_price + $waiterName->vat_amount + $waiterName->s_charge_amount) - ($waiterName->discount_amount + $waiterName->discount_amount_number) }} /=</h5></div>
                </div>
              
            </div>
            <div class="row d-flex justify-content-center pt-3">
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
              <form method="get" class="text-center" action="/customerPrintState3T20">
                  @csrf
                 <input type="submit" name="submit" value="GO FOR CUSTOMER PRINT" class="btn btn-dark fw-bold" style="width: 96%;">
              </form>
            </div> 
          </div>

          <div class="col-lg-5 col-md-12 col-12 customerSection bg-dark py-3" style="min-height:85vh;">

            <div class="row mx-1 justify-content-end" style="border: 2px solid white; border-radius: .5rem;min-height:20px;">
              <div> 
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
            <form action="{{ url('/customerPrintOrderUpdate20',$orderId->id) }}" method="post">
                  @csrf
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light fw-bold">Paymet type : </label>
                <div class="col-7">
                  <select class="form-select" aria-label="Default select example" name="payment_type">
                      <option selected hidden value="{{ $orderId->payment_type }}">{{ $orderId->payment_type }}</option>
                      <option value="Cash">Cash</option>
                      <option value="Others">Others</option>
                  </select>
                </div>
              </div>
              <div class="row pt-1">
                <label for="inputPassword" class="col-5 col-form-label text-light fw-bold">Given Amount : </label>
                <div class="col-7">
                  <input type="number" class="form-control fw-bold" step="any" name="given_amount" placeholder="/=" style="text-align: end;">
                </div>
              </div>
              <div class="row mt-3 p-2">
                  <input type="submit" name="submit" value="CUSTOMER PRINT FINAL" class="btn btn-light fw-bold">
              </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection