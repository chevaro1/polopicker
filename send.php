<!DOCTYPE HTML>
<html>
	<head>
	<title>pls send</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php include('blocks/head.php') ?>
	<!--
  <script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
-->
	</head>
  <body>
    <label>
       <input type="checkbox" name="settings" value="forcefield">
       Enable forcefield
    </label>
    <label>
      <input type="checkbox" name="settings" value="invisibilitycloak">
      Enable invisibility cloak
    </label>
    <label>
      <input type="checkbox" name="settings" value="warpspeed">
      Enable warp speed
    </label>
    <br>
    <label>
       <input type="checkbox" name="brand" value="forcefield">
       Enable forcefield
    </label>
    <label>
      <input type="checkbox" name="brand" value="invisibilitycloak">
      Enable invisibility cloak
    </label>
    <label>
      <input type="checkbox" name="brand" value="warpspeed">
      Enable warp speed
    </label>

    <script>
    var canCall = true;
      var spriceLive = "";
      var fpriceLive = "";
      var sprice = "0";
      var fprice = "500";
      $( function() {
        $( "#slider-range" ).slider({
          range: true,
          min: 0,
          max: 500,
          values: [ 0, 500 ],
          slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            setTimeout(setPrice, 1000);
            spriceLive = ui.values[ 0 ];
            fpriceLive = ui.values[ 1 ];
            //alert("start price = " + sprice + " finish price = " + fprice);
          }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
          " - $" + $( "#slider-range" ).slider( "values", 1 ) );

      } );

      function setPrice() {
        if (!canCall){
          return;
        }
        sprice = spriceLive;
        fprice = fpriceLive;
        //console.log("start price = " + spriceLive + " finish price = " + fpriceLive);
        arrFormat();
        canCall = false;
        setTimeout(function(){
            canCall = true;
        }, 990);
      }
      </script>


      <p>
      <label for="amount">Price range:</label>
      <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
      </p>

      <div id="slider-range"></div>
      <p>ermm where r u</p>

  </body>


  <script>
	function getCheckboxes(){
		checkboxes = document.querySelectorAll("input[type=checkbox][name=settings]");

		checkboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				enabledSettings =
					Array.from(checkboxes) // Convert checkboxes to an array to use filter and map.
					.filter(i => i.checked) // Use Array.filter to remove unchecked checkboxes.
					.map(i => i.value) // Use Array.map to extract only the checkbox values from the array of objects.

				arrFormat();
				console.log(enabledSettings)
			})
		});
	}
	var checkboxes = "";
	let enabledSettings = []





	getCheckboxes();

    var pricebox = document.querySelectorAll("input[type=checkbox][name=brand]");
    let enabledPriceBox = []

    pricebox.forEach(function(checkbox) {
      checkbox.addEventListener('change', function() {
        enabledPriceBox =
          Array.from(pricebox) // Convert checkboxes to an array to use filter and map.
          .filter(i => i.checked) // Use Array.filter to remove unchecked checkboxes.
          .map(i => i.value) // Use Array.map to extract only the checkbox values from the array of objects.

        arrFormat();
        console.log(enabledPriceBox)
      })
    });


  </script>
  <script>

		var dataArr = [];

    function arrFormat() {
      dataArr = [];
			page = 1;
      if (enabledSettings.length > 0){
        dataArr["first"] = enabledSettings;
      }

      if (enabledPriceBox.length > 0){
        dataArr["second"] = enabledPriceBox;

      }
      if (sprice != "0" || fprice != "500"){
        dataArr["sprice"] = sprice;
        dataArr["fprice"] = fprice;
      }
      console.log(dataArr);
      //alert(dataArr);
			getRes();
    }



    var page = 1;
    var data = [{brand: "william", sprice: "22", gender: ["doormat", "dog", "tea mat"], fprice: "25", vendor: ""}];

    function getRes(){
      console.log("we are in the script data is set");
      $.ajax({
        url: 'receive.php',
        type: "POST",
        data: {data:data, page:page},
        success: function (response) {
          var arr = $.parseJSON(response);
					console.log("json returned, looks like : " + arr);
        }
      }
      )
    }
  </script>

</html>
