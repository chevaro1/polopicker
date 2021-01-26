<?php
include '../blocks/logged-in.php';
 ?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>Polo Picker Home</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php include('../blocks/head.php') ?>
   <link rel="stylesheet" href="../css/dashboard.css">
	</head>
	<body>
    <?php include('../blocks/admin_nav.php') ?>

          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <h1 class="h2">Dashboard</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                  <button class="btn btn-sm btn-outline-secondary">Share</button>
                  <button class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                  <span data-feather="calendar"></span>
                  This week
                </button>
              </div>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <div class="row">
                <div class="col-md-10">
                  <canvas class="my-4" id="myChart" width="1500" height="2000"></canvas>
                </div>
                <div class="col-md-2">
                  <h1> hi there</h1>
                </div>
              </div>
            </div>


          </main>
        </div>
      </div>

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="../../assets/js/vendor/popper.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>

      <!-- Icons -->
      <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
      <script>
        feather.replace()
      </script>

      <!-- Graphs -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
      <script>


    getData();




    function getData(){
        var xmlhttp = new XMLHttpRequest();
        var url = "../sql/admin_count_website.php";
        //var param = "?cat=" + product;

        console.log("get data script running");

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var myArr = JSON.parse(this.responseText);
            barChart(myArr);
          }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }


    function barChart(arr){

      var website = [];
      var total = [];
      var colours = []

      for(i = 0; i < arr.length; i++) {
        console.log("website = " + arr[i].website);
        console.log("total = " + arr[i].total);
        website.push(arr[i].website);
        total.push(arr[i].total);
        colours.push(dynamicColors());
      }

      var ctx = $("#myChart");

      var barGraph = new Chart(ctx,{
        type: 'horizontalBar',
        data: {
          labels: website,
          datasets: [{
            data: total,
						label: "products",
            lineTension: 0,
            backgroundColor: colours,
            //borderColor: 'green',
            borderWidth: 1,
            pointBackgroundColor: 'green'
          }]
        },
      });
    }

    var dynamicColors = function() {
      var r = Math.floor(Math.random() * 255);
      var g = Math.floor(Math.random() * 255);
      var b = Math.floor(Math.random() * 255);
      return "rgb(" + r + "," + g + "," + b + ")";
    }






      </script>
    </body>
  </html>
