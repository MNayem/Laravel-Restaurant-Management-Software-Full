
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

  </head>
  <body>
      
      <section class="sticky-top bg-white">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white">
                <div class="container-fluid">
                    <div class="text-center d-flex justify-content-center align-self-center">
                        <a class="navbar-brand text-center" href="/"><img src="../assets/img/logo/Jafran.png" alt="" style="width:100px; height:100px;"></a>
                    </div>
                  
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                      
                    <input type="submit" name="submit" value="Print" class="btn btn-info" onclick="window.print()">
                      
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
                               <td colspan="4"></td>
                                <td style="font-size: 18px; font-family: thoma; font-weight: bold;">
                                   Service Charge:
                                </td>
                                <td>
                                  <strong>{{ $waiterName->s_charge }} Taka</strong>
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
                                  <strong> {{ ($total_price + $waiterName->vat + $waiterName->s_charge) - ($waiterName->discount_amount + $waiterName->discount_amount_number) }} Taka</strong>
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