<?php

include "../connect.php";

$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

// Assuming filterRequest() is a function that sanitizes input

$data = getAllData("cartview", "cart_userid = $userid", null, false);

$stmt = $con->prepare("SELECT SUM(itemsprice) as totalprice, count(countitems) as totalcount FROM `cartview`  
WHERE  cart_userid = :userid
GROUP BY cart_userid");

$stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
$stmt->execute();

$datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(array(
    "status" => "success",
    "countprice" =>  $datacountprice,
    "datacart" => $data,
));
