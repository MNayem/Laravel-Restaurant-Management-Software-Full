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
    
    <section class="sticky-top bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6"><a class="navbar-brand text-center" href="/"><img src="../assets/img/logo/JafranPrint.png" alt="" style="width:100px; height:auto;"></a></div>
                <div class="col-6 text-end align-self-center">
                    <span class="datetime">
                          <span class="time"></span> 
                          <br>
                          <span class="date"></span>
                        </span>
                </div>
            </div>
            <div class="row py-2 justify-content-center text-center">
                <h5>Jafran Rooftop Restaurant</h5>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <span class="fw-bold" style="margin-left:-10px;">Order Details C0</span>  
                <!--<span class="fw-bold" style="margin-left:-10px;">Table Number: {{ $customerPrintShowtableNumber2->tablenumber }}</span>-->
                <br><hr>
                
                <table class="table table-borderless">
                     <thead>
                        <tr align="center" style="font-size: 16px; font-family: thoma;">
                          <th scope="col">Order ID</th>
                          <th scope="col">Food Name</th>
                          <th scope="col">Table Number</th>
                          <th scope="col">Product Quantity</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Total Amount</th>
                        </tr>
                      </thead>
                     <tbody>
                         @php
                            $total_price = 0;
                          @endphp
                          @foreach ($customerPrintShowT2 as $customerPrintShowT2)
                          <tr align="center" style="font-size: 15px; font-weight: bold; font-family: thoma;">
                              <td>{{ $customerPrintShowT2->order_id }}</td>
                              <td>{{ $customerPrintShowT2->fname  }}</td>
                              <td>{{ $customerPrintShowT2->tablenumber  }}</td>
                              <td>{{ $customerPrintShowT2->product_quantity  }}</td>
                              <td>{{ $customerPrintShowT2->amount  }}</td>
                              
                              <td>
                                 @php
                                    $total_price += $customerPrintShowT2->amount * $customerPrintShowT2->product_quantity;
                                 @endphp
                                  {{ $customerPrintShowT2->amount * $customerPrintShowT2->product_quantity  }}
                                  <!--{{ $customerPrintShowT2->tamount  }}-->
                              </td>
                          </tr>
                          @endforeach
                          <tr>
                               <td colspan="4"></td>
                                <td>
                                  Total:
                                </td>
                                <td>
                                  <strong> {{ $total_price }} Taka</strong>
                                </td>
                          </tr>
                          <tr>
                               <td colspan="4"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Vat:
                                </td>
                                <td>
                                  <strong>{{ $waiterName->vat }} Taka</strong>
                                </td>
                          </tr>
                          <tr>
                               <td colspan="4"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   S/C:
                                </td>
                                <td>
                                  <strong>{{ $waiterName->s_charge }} Taka</strong>
                                </td>
                          </tr>
                          <tr>
                               <td colspan="4"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Discount:
                                </td>
                                <td>
                                  <strong>{{ $waiterName->discount_percentage }} %</strong>
                                </td>
                          </tr>
                        <tr>
                               <td colspan="4"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Discount Amount:
                                </td>
                                <td>
                                  <strong>{{ $waiterName->discount_amount }} Taka</strong>
                                </td>
                          </tr>
                          <tr>
                               <td colspan="4"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Discount Amount (In Number):
                                </td>
                                <td>
                                  <strong>{{ $waiterName->discount_amount_number }} Taka</strong>
                                </td>
                          </tr>
                          <tr>
                               <td colspan="4"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Grand Total:
                                </td>
                                <td>
                                  <strong> {{ ($total_price + $waiterName->vat) - ($waiterName->discount_amount + $waiterName->discount_amount_number) }} Taka</strong>
                                </td>
                          </tr>
                      </tbody>
                </table>
            </div>
            <center><form class="form-control" method="get" action="/customerPrintState3T02">
                  @csrf
                 <input type="submit" name="submit" value="CUSTOMER PRINT" class="btn btn-info">
              </form></center>
        </div>
    </section><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
              <form class="form-control" action="{{ url('/customerPrintOrderUpdate02',$orderId2->id) }}" method="post">
                  @csrf
                  <label>Cutomer Name: &nbsp;</label><input type="cname" name="cname" value="{{ $orderId2->cname }}"><br><br>
                  <label>Cutomer Phone: &nbsp;</label><input type="text" name="phone_no" placeholder="Enter Customer Phone Number"><br><br>
                  <label>Paymet type: &nbsp;</label><select class="form-select" aria-label="Default select example" name="payment_type">
                      <option selected hidden value="{{ $orderId2->payment_type }}">{{ $orderId2->payment_type }}</option>
                      <option value="Cash">Cash</option>
                      <option value="Others">Others</option>
                    </select><br><br>
                  <!--<label>Discount Percentage: &nbsp;</label><input type="number" step="any" name="discount_percentage" placeholder="0"><br><br>-->
                  <!--<label>Discount Amount: &nbsp;</label><input type="number" step="any" name="discount_amount" placeholder="0" disabled><br><br>-->
                  <label>Given Amount: &nbsp;</label><input type="number" step="any" name="given_amount" placeholder="Given Amount"><br><br>
                  
                  <input type="submit" name="submit" value="CUSTOMER PRINT FINAL" class="btn btn-info">
              </form>
              
            </div>
            <div class="col">
            </div>
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>





      

    