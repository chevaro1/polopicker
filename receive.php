<?php

$data = $_POST["data"];
$page = $_POST["page"];

$limit = 20;

#require_once 'config.php';#error_log($data);

$page = $page  - 1;
#echo '<pre>'; print_r($data); echo '</pre>';
#echo $array["0"]["name"];
$arr = $data[0];
#echo $arr["age"];

$select = "SELECT * FROM products ";
$where = "WHERE TRUE";

if (array_key_exists('brand', $arr)) {
  #echo "brand exists in this array";
  $where .= ' AND brand = "' .$arr["brand"] .'"';
  $len = count($arr["brand"]);
  #echo $len;
  for($i = 1; $i < $len; $i++) {
    $where .= ' OR brand = "' .$arr["brand"][$i] .'"';
  }
}
if (array_key_exists('vendor', $arr)) {
  #echo "vendor exists in this array";
  $where .= ' AND vendor = "' .$arr["vendor"] .'"';
  $len = count($arr["vendor"]);
  #echo $len;
  for($i = 1; $i < $len; $i++) {
    $where .= ' OR vendor = "' .$arr["vendor"][$i] .'"';
  }
}
if (array_key_exists('colour', $arr)) {
  #echo "colour exists in this array";
  $where .= ' AND colour = LIKE %"' .$arr["colour"] .'%"';
  $len = count($arr["colour"]);
  #echo $len;
  for($i = 1; $i < $len; $i++) {
    $where .= ' OR colour = LIKE %"' .$arr["colour"] .'%"';
  }
}
if (array_key_exists('range', $arr)) {
  $where .= ' AND range = "' .$arr["range"] .'"';
  $len = count($arr["range"]);
  #echo $len;
  for($i = 1; $i < $len; $i++) {
    $where .= ' OR range = "' .$arr["range"][$i] .'"';
  }
}
if (array_key_exists('gender', $arr)) {
  $where .= ' AND gender = "' .$arr["gender"][0] .'"';
  $len = count($arr["gender"]);
  #echo $len;
  for($i = 1; $i < $len; $i++) {
    $where .= ' OR gender = "' .$arr["gender"][$i] .'"';
  }
}
if (array_key_exists('sprice', $arr)) {
  #echo "sprice exists in this array";
  $where .= ' AND price BETWEEN ' .$arr["sprice"] .' AND ' .$arr["fprice"];
}

$offset = $page * $limit; //skip rows from previous pages
$limit = " LIMIT $offset,$limit";

$query = $select.$where.$limit;

#echo $select.$where.$limit;

$jsondata = json_encode($query);
echo $jsondata;
