<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$cat = $_GET['cat'];


require_once 'config.php';

$sql = "SELECT * FROM products WHERE category = '$cat' ORDER BY CAST(price as float) ASC";

$result = mysqli_query($link, $sql);

$arr = [];
$count = 0;

if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        array_push($arr, $row); 
        $count += 1;
        
    }
}
#echo $count;

$jsondata = json_encode($arr);
echo $jsondata;