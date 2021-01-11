<?php

#Initialize the session
session_start();

#CHeck if the user is logged in, if not then redirect him to the login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$reg = $_GET["v"];

unset ($_SESSION["search_term"]);

#define variables and initialize with empty values
$term = $term_err = "";

#Processing the data once the form is submitted
if(isset($_POST["term"])){
    
    $term = trim($_POST["term"]);
    $term = str_replace(' ', '', $term);

    if (strlen($term) > 7) {
        #$term_err = "Search term cant be longer than 7 characters";
        echo "<p>error()</p>";
        
    }else {
        session_start();

        $_SESSION["search_term"] = $term;
    
        header("location: searchResults.php");
        exit;
    }
    
        
}

?>

<!DOCTYPE html>
<html>
<title>Vehicle Damage</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="imgzoom.css">
<style>

img {width:165px;height:320px;}


</style>
<body>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="mySidebar">
  <h1 class="w3-xxxlarge w3-text-theme">Choice Vehicles</h1>
  <button class="w3-bar-item w3-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
  <a href="IndexAdmin.php" class="w3-bar-item w3-button">Home</a>
  <a href="resetPassword.php" class="w3-bar-item w3-button">Reset Password</a>
  <a href="searchVehicles.php" class="w3-bar-item w3-button">Vehicle Search</a>
  <a href="Logout.php" class="w3-bar-item w3-button">Logout</a>
</nav>

<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> 
  <div class="w3-center">
  <h4></h4>
  <h1 class="w3-xxxlarge w3-animate-bottom">Choice Photo Application</h1>
    <div class="w3-padding-32">
      <button type="button" onclick="window.location.href='archive.php?v=<?php echo $reg ?>'">View Archive</button>
      <button onclick="window.location.href='searchResults.php'">Go Back</button>
    </div>
  </div>
</header>

<!-- Modal -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
      <header class="w3-container w3-theme-l1"> 
        <span onclick="location.href = 'archive.php"
        class="w3-button w3-display-topright">×</span>
        <h4>Oh snap! We just showed you a modal..</h4>
        <h5>Because we can <i class="fa fa-smile-o"></i></h5>
      </header>
      <div class="w3-padding">
        <p>Cool huh? Ok, enough teasing around..</p>
        <p>Go to our <a class="w3-btn" href="/w3css/default.asp">W3.CSS Tutorial</a> to learn more!</p>
      </div>
      <footer class="w3-container w3-theme-l1">
        <p>Modal footer</p>
      </footer>
    </div>
</div>




<div class="w3-row-padding w3-center w3-margin-top" style="padding-left: 120px;padding-right: 100px;">    <section>
        
         <form action="" method="post"> 
            Search: <input type="text" name="term" />
            <span><?php echo $password_err; ?></span>
            <br/>
            <input type="submit" value="Submit" /> 
          </form>
        
    </section>
    <h2><?php echo $reg ?></h2>
        <?php   

        
        $path = "../photos/$reg/damage/*.png";

        $pics = glob($path);
        
        
        
        if(count($pics) == 0){
            echo"This vehicle has no photos of damage.";
        } else {
            echo "There are: ";
            echo count($pics);
            echo " images of this vehicle. <br>";
        }

        foreach ($pics as $pic) {
            $img_src = $pic;
            $s = getimagesize($img_src);
            $w = $s[0]/2;
            $h = $s[1]/2;
            echo "<div class='button_image'>";
            echo "<img src='$img_src' alt='photo' width='{$w}' height='{$h}'>" . PHP_EOL;            
            echo "<br/>";
            echo "<button type='button'onclick=\" archive('$img_src','$reg');\">Archive</button>";
            echo "</div>";
        }
    ?>

</div>

<!-- Footer -->
<footer class="w3-container w3-theme-dark w3-padding-16">
  <h3></h3>
  <p></p>
  <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
    <span class="w3-text w3-theme-light w3-padding">Go To Top</span>    
    <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
  <p></p>
</footer>

<!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
<script>
// Side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "100%";
  x.style.fontSize = "40px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Tabs
function openCity(evt, cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  var activebtn = document.getElementsByClassName("testbtn");
  for (i = 0; i < x.length; i++) {
    activebtn[i].className = activebtn[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-dark-grey";
}

//var mybtn = document.getElementsByClassName("testbtn")[0];
//mybtn.click();

// Accordions
function myAccFunc(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// Slideshows
var slideIndex = 1;

function plusDivs(n) {
  slideIndex = slideIndex + n;
  showDivs(slideIndex);
}

function showDivs(n) {
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

showDivs(1);

// Progress Bars
function move() {
  var elem = document.getElementById("myBar");   
  var width = 5;
  var id = setInterval(frame, 10);
  function frame() {
    if (width == 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}

function error(){
    alert("Car Registration can only be 7 characters long, please check and try again")
}

function goBack() {
  window.history.back();
}

function archive(img, reg) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "archiveVehicle.php", false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var params = "source=" + img + "&reg=" + reg;
        var con = confirm("Are you sure you want to archive this");
        if(con == false) {
            return;
        }
        xhttp.send(params);
        
        location.reload();
        
    }
    
function search(){ 
            var term = document.getElementById("sbar").term.value;
            
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "search_script.php", false);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var params = "term=" + term;

            xhttp.send(params);
        }

</script>

</body>
</html>

