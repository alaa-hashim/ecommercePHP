<?php

include "connect.php";

$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

$data = getAllData("cartview", "cart_userid = :userid", array(':userid' => $userid), false);

$stmt = $con->prepare("SELECT SUM(itemsprice) as totalprice, COUNT(countitems) as totalcount FROM `cartview` WHERE cart_userid = :userid GROUP BY cart_userid");

$stmt->bindValue(':userid', $userid);
$stmt->execute();

$datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);

$response = array(
    "status" => "success",
    "countprice" => $datacountprice,
    "datacart" => $data
);

echo json_encode($response);
