<?php
include "../connect.php";
$userid = filterRequest("user_id");
$itemid = filterRequest("product_id");



 deleteData("wishlist", "user_id = $userid AND product_id = $itemid");

?>