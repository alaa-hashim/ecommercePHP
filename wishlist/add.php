<?php
include "../connect.php";
$userid = filterRequest("user_id");
$itemid = filterRequest("product_id");


$data = array("user_id" => $userid,
 "product_id" => $itemid);
 insertData("wishlist", $data);

?>