<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jafran Rooftop Restaurant</title>
    <link rel="icon"  href="../assets/img/logo/Jafran.png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <img src="../assets/img/logo/JafranPrint.png" alt="" style="width:100px; height:auto;">
                </div>
                <div class="col-6 pt-2" style="text-align:right;">
                    <div class="datetime">
                        <span class="time"></span>
                        <br>
                        <span class="date"></span>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <h5 style="font-weight:bold;">Jafran Rooftop Restaurant</h3>
            </div>
            <div class="row text-center align-self-center" style="border-top:1px solid gray;border-bottom:1px solid gray;">
                <div class="col-6 align-self-center"><h5 style="">Order Details</h5></div>
                <div class="col-6 align-self-center" style="text-align:right;">
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                    <form action="/customerPrintShowT18updateStatus" method="post">
                        @csrf
                        <input type="submit" name="submit" value="Print" class="btn btn-white" onclick="window.print()" style="border:1px solid gray;">
                    </form>
                </div>
            </div> 
            
            <div class="row">
                <span class="fw-bold" style="margin-left:-10px;">Order ID: {{ $orderID->order_id }}</span>
                <span class="fw-bold" style="margin-left:-10px;">Bill ID: {{ $billid->id }}</span>
                <span class="fw-bold" style="margin-left:-10px;">Table Number: {{ $orderID->tablenumber }}</span>
                <span class="fw-bold" style="margin-left:-10px;">Waiter Name: {{ $waiterName->wname }}</span>
                <br>
                <table class="table table-borderless">
                     <thead style="border-top:1px solid gray;border-bottom:1px solid gray;">
                        <tr align="center" style="font-size: 16px; font-family: thoma;">
                          <th scope="col">No. <br> <br></th>
                          <th scope="col">Food <br> Name</th>
                          <th scope="col">Qty <br> <br></th>
                          <th scope="col">Amount <br> <br></th>
                          <th scope="col">Total <br> Amount</th>
                        </tr>
                      </thead>
                     <tbody>
                          @php
                            $total_price = 0;
                          @endphp
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                          @foreach ($customerPrintShowT18 as $customerPrintShowT18)
                          <tr align="center" style="font-size: 15px; font-weight: bold; font-family: thoma;">
                              <td>
                                {{ $loop->index + 1 }}
                              </td>
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                              <td>{{ $customerPrintShowT18->fname  }}</td>
                              <td>{{ $customerPrintShowT18->product_quantity  }}</td>
                              <td>{{ $customerPrintShowT18->amount  }}</td>
                              <td>
                                 @php
                                    $total_price += $customerPrintShowT18->amount * $customerPrintShowT18->product_quantity;
                                 @endphp
                                  {{ $customerPrintShowT18->amount * $customerPrintShowT18->product_quantity  }}
                              </td>
                          </tr>
                          @endforeach 
                          <br>
                      </tbody>
                </table>
            </div>
            
            <div class="row" style="text-align:right;font-weight:bold;font-family: thoma;font-size: 1.2rem;border-top:1px solid gray;">
                <div class="col-8">Total :</div>
                <div class="col-4"> {{ $total_price }} /=</div>
                <div class="col-8">Vat :</div>
                <div class="col-4">{{ $waiterName->vat_amount }}  /=</div>
                <div class="col-8">Service Charge :</div>
                <div class="col-4">{{ $waiterName->s_charge_amount }}  /=</div>
                <div class="col-8">Discount Percentage :</div>
                <div class="col-4">{{ $waiterName->	discount_percentage }} %</div>
                <div class="col-8">Discount Amount :</div>
                <div class="col-4">{{ $waiterName->discount_amount }}  /=</div>
                <div class="col-8">Discount Amount (In Number) :</div>
                <div class="col-4">{{ $waiterName->discount_amount_number }}  /=</div><div class="col-8">Grand Total :</div>
                <div class="col-4"> {{ ($total_price + $waiterName->vat_amount + $waiterName->s_charge_amount) - ($waiterName->discount_amount + $waiterName->discount_amount_number) }}  /=</div>
                <div class="col-8">Received Amount :</div>
                <div class="col-4"> {{ $waiterName->given_amount }}  /=</div>
                <div class="col-8" style="border-top:1px solid gray;">Changed Amount :</div>
                <div class="col-4" style="border-top:1px solid gray;"> {{ $waiterName->given_amount - (($total_price + $waiterName->vat_amount + $waiterName->s_charge_amount) - ($waiterName->discount_amount + $waiterName->discount_amount_number)) }}  /=</div>
            </div>
            
        </div>
    </section>
    
    
<!--time & date-->
<script>
const timeElement = document.querySelector(".time");
const dateElement = document.querySelector(".date");

/**
 * @param {Date} date
 */
function formatTime(date) {
  const hours12 = date.getHours() % 12 || 12;
  const minutes = date.getMinutes();
  const isAm = date.getHours() < 12;

  return `${hours12.toString().padStart(2, "0")}:${minutes
    .toString()
    .padStart(2, "0")} ${isAm ? "AM" : "PM"}`;
}

/**
 * @param {Date} date
 */
function formatDate(date) {
  const DAYS = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday"
  ];
  const MONTHS = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
  ];

  return `
 
  ${date.getDate()} 
  ${MONTHS[date.getMonth()]} 
  ${date.getFullYear()}`;
}

setInterval(() => {
  const now = new Date();

  timeElement.textContent = formatTime(now);
  dateElement.textContent = formatDate(now);
}, 200);
</script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>