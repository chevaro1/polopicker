<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<!DOCTYPE html>
<html>
<body>
    <button onclick="getdata()">get data</button>
    <h1> hello world </h1>
    <div id="id01"></div>
    
<script>

function getdata(){
    var xmlhttp = new XMLHttpRequest();
    var url = "get_item.php";

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var myArr = JSON.parse(this.responseText);
        myFunction(myArr);
      }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function myFunction(arr) {
  var out = "";
  var i;
  for(i = 0; i < arr.length; i++) {
    out += '<a href="' + arr[i].img + '">' + 
    arr[i].name + '</a><br>';
  }
  document.getElementById("id01").innerHTML = out;
}


</script>

</body>
</html>
