<?php

include "../../connect.php";

$orderid = filterRequest("ordersid");

$userid = filterRequest("usersid");

$type = filterRequest("ordertype");
if ($type  == "0") {
    $data = array(
        "orders_status" => 2
    );
} else {
    $data = array(
        "orders_status" => 4
    );
}


updateData("orders", $data, "orders_id = $orderid AND orders_status = 1");

// sendGCM("success" , "The Order Has been Approved" , "users$userid" , "none" , "refreshorderpending"); 

insertNotify("success", "The Order Has been Approved", $userid, "users$userid", "none", "" ,  "refreshorderpending");

// insertNotify("success", "The Order Has been Approved", $userid, "users$userid", "none",  "refreshorderpending");

if ($type  == "0") {
    sendGCM("warning", "there is a orders awaiting approval", "delivery", "none", "none" , "");
}


$orderid = filterRequest("ordersid");

$userid = filterRequest("usersid");

$deliveryid = filterRequest("deliveryid");

$data = array(
    "orders_status" => 3 , 
    "orders_delivery" => $deliveryid 
);

updateData("orders", $data, "orders_id = $orderid AND orders_status = 2");

// sendGCM("success" , "The Order Has been Approved" , "users$userid" , "none" , "refreshorderpending"); 

insertNotify("success", "Your order is on the way", $userid, "users$userid", "none",  "refreshorderpending" , "");


sendGCM("warning" , "The Order Has been Approved by delivery" , "services" , "none" , "none" , ""); 


sendGCM("warning" , "The Order Has been Approved by delivery  " . $deliveryid , "delivery" , "none" , "none" , ""); 