
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
                <div class="col-12 align-self-center"><h5 style="">Order Details</h5></div>
                <div class="col-12 align-self-center" style="text-align:right;">
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                    <form action="/customerPrintState3BackTA10" method="post">
                        @csrf    
                            <input id="printJS" type="submit" name="submit" value="Print" class="btn btn-dark fw-bold">
                            <script>
                                let x = document.getElementById('printJS');
                                x.addEventListener('click',printJSF);
                                function printJSF(){
                                    x.style.display = 'none';
                                    print();
                                }
                            </script>
                    </form>
                </div>
            </div>      
        </div>
    </section>
    
    <section>
        <div class="container-fluid">
            <div class="row">
                <span class="fw-bold" style="margin-left:-10px;">Order ID: {{ $orderID->order_id }}</span>
                <span class="fw-bold" style="margin-left:-10px;">Take Away Number: {{ $orderID->tablenumber }}</span>
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
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                          @foreach ($customerPrintShowT10 as $customerPrintShowT10)
                          <tr align="center" style="font-size: 15px; font-weight: bold; font-family: thoma;">
                              <td>
                                {{ $loop->index + 1 }}
                              </td>
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                              <td>{{ $customerPrintShowT10->fname  }}</td>
                              <td>{{ $customerPrintShowT10->product_quantity  }}</td>
                              <td>{{ $customerPrintShowT10->amount  }}</td>
                              <td>
                                 @php
                                    $total_price += $customerPrintShowT10->amount * $customerPrintShowT10->product_quantity;
                                 @endphp
                                  {{ $customerPrintShowT10->amount * $customerPrintShowT10->product_quantity  }}
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                </table>
            </div>
            <div class="row" style="text-align:left;font-weight:bold;font-family: thoma;font-size: 1.2rem;border-top:1px solid gray;">

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
                <div class="col-4">{{ $waiterName->discount_amount_number }}  /=</div>
                <div class="col-8">Grand Total :</div>
                <div class="col-4"> {{ ($total_price + $waiterName->vat_amount + $waiterName->s_charge_amount) - ($waiterName->discount_amount + $waiterName->discount_amount_number) }}  /=</div>
                
            </div>
        </div>
    </section>
    
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>