<?php
include "connect.php";
$couponName = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;

$now = date("Y-m-d H:i:s");

getData("coupon"  , "coupon_name = '$couponName' AND coupon_exprid > '$now' AND coupon_use > 0  ")  ;
?>
