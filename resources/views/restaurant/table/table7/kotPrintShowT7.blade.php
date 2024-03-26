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
                <div class="col-6 align-self-center"><h5 style="">Order Details</h5></div>
                <div class="col-6 align-self-center" style="text-align:right;">
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                    <form action="/kotOrderAddT7" method="post">
                            @csrf
                            @foreach($kotPrintShowAdd as $kotPrintShowAdd)
                                <input type="hidden" name="food_number" value="{{ $kotPrintShowAdd->food_number }}">
                                <input type="hidden" name="fname" value="{{ $kotPrintShowAdd->fname }}">
                                <input type="hidden" name="product_quantity" value="{{ $kotPrintShowAdd->product_quantity }}">
                            @endforeach
                            <input type="submit" name="submit" value="Print" class="btn btn-light" onclick="window.print()">
                    </form>
                </div>
            </div>
                      

        </div>
    </section>
    
    <section>
        <div class="container-fluid">
            <div class="row">
                <span></span>
                <span class="fw-bold" style="margin-left:-10px;">Order Details (KOT)</span>  
                <span class="fw-bold" style="margin-left:-10px;">Table Number: {{ $kotTableNumber->tablenumber }}</span>
                <br><hr>
                <table class="table table-borderless">
                     <thead>
                        <tr align="center" style="font-size: 15px; font-family: thoma;">
                          <!--<th scope="col">Table Number</th> -->
                          <th scope="col">Food Number</th>
                          <th scope="col">Food Name</th>
                          <th scope="col">Product Quantity</th>
                        </tr>
                      </thead>
                     <tbody>
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
                          @foreach ($kotPrintShowT7 as $kotPrintShowT7)
                          <tr align="center" style="font-size: 14px; font-weight: bold; font-family: thoma;">
                              <td>{{ $kotPrintShowT7->food_number }}</td>
                              <td>{{ $kotPrintShowT7->fname  }}</td>
                              <td>{{ $kotPrintShowT7->product_quantity  }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                </table>
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

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>