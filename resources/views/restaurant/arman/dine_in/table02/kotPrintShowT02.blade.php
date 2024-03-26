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
        <div class="container-fluid">
            <div class="row">
                <div class="col-6"><a class="navbar-brand text-center" href="/newDashboard"><img src="../assets/img/logo/JafranPrint.png" alt="" style="width:100px; height:auto;"></a></div>
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
                <div class="col-8">
                    <h6 class="fw-bold" style="margin-left:-10px;">Order Details(KOT)</h6>  
                    <h6 class="fw-bold" style="margin-left:-10px;">Table Number: {{ $kotTableNumber2->tablenumber }}</h6>
                </div>
                <div class="col-4 text-end align-self-center">
                    <button onclick="window.print()" style="border-radius:100%;width:40px;height:40px;"><i class="fa-solid fa-print" style=""></i></button>
                </div> <br>
                
                
                <table class="table table-borderless" style="border-top:1px solid gray; border-bottom:1px solid gray;">
                     <thead>
                        <tr align="center" style="font-size: 15px; font-family: thoma;">
                          <!--<th scope="col">Table Number</th> -->
                          <th scope="col">Food <br> Number</th>
                          <th scope="col">Food <br> Name</th>
                          <th scope="col">Product <br> Quantity</th>
                        </tr>
                      </thead>
                     <tbody>
                          @foreach ($kotPrintShowT2 as $kotPrintShowT2)
                          <tr align="center" style="font-size: 14px; font-weight: bold; font-family: thoma;">
                              <!--<td>{{ $kotPrintShowT2->tablenumber }}</td>-->
                              <td>{{ $kotPrintShowT2->food_number }}</td>
                              <td>{{ $kotPrintShowT2->fname  }}</td>
                              <td>{{ $kotPrintShowT2->product_quantity  }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                </table>
                
            </div>
        </div>
    </section>
    <!--<center><button onclick="window.print()" style="border-radius:100%;width:40px;height:40px;"><i class="fa-solid fa-print" style=""></i></button></center>-->
    <!--<form action="/customerPrintShowT1updateStatus" method="post" class="form-control">-->
    <!--    @csrf-->
    <!--     <center><input type="submit" name="submit" value="Update Status" class="btn btn-info" onclick="window.print()"></center>-->
    <!--</form>-->

 
    <!-- <div class="bottomToTop text-center"><i class="fa-solid fa-arrow-up" style="font-size: 3rem;"></i></div>    -->
    
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

  return `${date.getDate()} ${MONTHS[date.getMonth()]} ${date.getFullYear()}`;

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