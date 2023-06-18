<?php

include "connect.php";


$categoryid = filterRequest("id");

// getAllData("itemsview", "categories_id = $categoryid");

$userid = filterRequest("usersid");



$stmt = $con->prepare("SELECT productview.* , 1 as wishlist FROM productview 
INNER JOIN wishlist ON wishlist.wishlist_productid = productview.product_id AND wishlist.wishlist_userid = $userid
WHERE subcat_id = $categoryid
UNION ALL 
SELECT *  , 0 as wishlist  FROM productview
WHERE  subcat_id = $categoryid AND product_id NOT IN  ( SELECT productview.product_id FROM productview 
INNER JOIN wishlist ON wishlist.wishlist_productid = productview.product_id AND wishlist.wishlist_userid =  $userid  )");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}