<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jafran Rooftop Restaurant</title>
    <link rel="icon"  href="../assets/img/logo/Jafran.png">


    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <style>
        .tableHead{
            font-size: 14px;
            font-weight: bold;
        }
        .tableBody{
            font-size: 16px;
        }
    </style>

  </head>
  <body>

    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div style="width: 260px; min-height: 260px; border: 1px solid black;">
                    <div class="row">
                        <div class="col-4">
                            <img src="../assets/img/logo/JafranPrint.png" alt="" style="width:100px; height:auto;">
                        </div>
                        <div class="col-8 pt-2" style="text-align:right;">
                            <div class="datetime">
                                <span class="time"></span>
                                <br>
                                <span class="date"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2 justify-content-center" style="background: rgb(192, 192, 192);">
                        <div class="col-12 text-center">
                            <span style="font-size: 18px; font-weight: bold;">Monthly Sales Report</span>
                        <form action="/monthlySalesReport" method="get">
                        @csrf
                            <input id="printJS" type="submit" name="submit" value="Print" class="btn btn-danger fw-bold rounded-circle p-3">
                        </form>
                            <script>
                                let x = document.getElementById('printJS');
                                x.addEventListener('click',printJSF);
                                function printJSF(){
                                    x.style.display = 'none';
                                    print();
                                }
                            </script>
                        </div>
                        
                        
                    </div>
                    <div class="row text-center" style="border-bottom: 2px solid gray;background: rgb(255, 235, 235);">
                        <div class="col-3"> <span class="tableHead">Bill ID</span> </div>
                        <div class="col-4"> <span class="tableHead">Amount</span> </div>
                        <div class="col-5"> <span class="tableHead">Date</span> </div>
                        <!-- <div class="col-2"> <span class="tableHead"></span> </div> -->
                    </div>
                    @foreach ($monthlySalesReportPrint as $monthlySalesReportPrint)
                    <div class="row text-center" style="border-bottom: 1px solid gray;">
                        <div class="col-3" style="border-right: 1px solid gray;"> <span class="tableBody">{{ $monthlySalesReportPrint->id }}</span> </div>
                        <div class="col-4" style="border-right: 1px solid gray;"> <span class="tableBody">{{ ($monthlySalesReportPrint->tamount + $monthlySalesReportPrint->vat_amount + $monthlySalesReportPrint->s_charge_amount) - 
                            ($monthlySalesReportPrint->discount_amount + $monthlySalesReportPrint->discount_amount_number) }}</span> </div>
                        <div class="col-5" style="border-right: 1px solid gray;"> <span class="tableBody">{{ $monthlySalesReportPrint->date }}</span> </div>
                        <!-- <div class="col-2"> <span class="tableBody"></span> </div> -->
                    </div>            
                    @endforeach
                    <div class="row text-center">
                        <div class="col-12">
                            <span style="font-size: 14px; font-weight: bold;">Total Amount :</span>
                            <span style="font-size: 16px;">{{ $totalAmount }} </span>
                            <span style="font-size: 12px;">(TAKA ONLY)</span>
                        </div>
                    </div>
                </div>
                
                
                
                <!--<div style="width: 750px; min-height: 1056px; border: 1px solid black;">-->
                <!--    <div class="row">-->
                <!--        <div class="col-4">-->
                <!--            <img src="../assets/img/logo/JafranPrint.png" alt="" style="width:100px; height:auto;">-->
                <!--        </div>-->
                <!--        <div class="col-8 pt-2" style="text-align:right;">-->
                <!--            <div class="datetime">-->
                <!--                <span class="time"></span>-->
                <!--                <br>-->
                <!--                <span class="date"></span>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="row pb-2 justify-content-center" style="background: rgb(192, 192, 192);">-->
                <!--        <div class="col-12 text-center">-->
                <!--            <span style="font-size: 18px; font-weight: bold;">Daily Sales Report</span>-->
                <!--        <form action="/dailySalesReport" method="get">-->
                <!--        @csrf-->
                <!--            <input id="printJS" type="submit" name="submit" value="Print" class="btn btn-danger fw-bold rounded-circle p-3">-->
                <!--        </form>-->
                <!--            <script>-->
                <!--                let x = document.getElementById('printJS');-->
                <!--                x.addEventListener('click',printJSF);-->
                <!--                function printJSF(){-->
                <!--                    x.style.display = 'none';-->
                <!--                    print();-->
                <!--                }-->
                <!--            </script>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="row text-center" style="border-bottom: 2px solid gray;background: rgb(255, 235, 235);">-->
                <!--        <div class="col-2"> <span class="tableHead">SI No.</span> </div>-->
                <!--        <div class="col-2"> <span class="tableHead">Ortder ID</span> </div>-->
                <!--        <div class="col-2"> <span class="tableHead">Total Amount</span> </div>-->
                <!--        <div class="col-4"> <span class="tableHead">Date</span> </div>-->
                <!--        <div class="col-2"> <span class="tableHead">Payment Type</span> </div>-->
                <!--         <div class="col-2"> <span class="tableHead"></span> </div> -->
                <!--    </div>-->
                    
                <!--    <div class="row text-center" style="border-bottom: 1px solid gray;">-->
                <!--        <div class="col-2" style="border-right: 1px solid gray;"> <span class="tableBody">121</span> </div>-->
                <!--        <div class="col-2" style="border-right: 1px solid gray;"> <span class="tableBody">122221</span> </div>-->
                <!--        <div class="col-2" style="border-right: 1px solid gray;"> <span class="tableBody">455</span> </div>-->
                <!--        <div class="col-4" style="border-right: 1px solid gray;"> <span class="tableBody">1-1-2022</span> </div>-->
                <!--        <div class="col-2"> <span class="tableBody">Cash</span> </div>-->
                <!--         <div class="col-2"> <span class="tableBody"></span> </div> -->
                <!--    </div>  -->
                    
                <!--    <div class="row text-end">-->
                <!--        <div class="col-12">-->
                <!--            <span style="font-size: 14px; font-weight: bold;">Total Amount :</span>-->
                <!--            <span style="font-size: 14px; font-weight: bold;">455</span>-->
                <!--            <span style="font-size: 14px;"> ( TAKA ONLY )</span>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                
                
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  </body>
</html>
