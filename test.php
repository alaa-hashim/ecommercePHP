<?php

include "/connect.php";


$categoryid = filterRequest("id");

// getAllData("itemsview", "categories_id = $categoryid");

$userid = filterRequest("usersid");



$stmt = $con->prepare("SELECT itemviews.* , 1 as wish FROM itemviews 
INNER JOIN favorite ON favorite.favorite_itemsid = itemviews.items_id AND favorite.favorite_usersid = $userid
WHERE categories_id = $categoryid
UNION ALL 
SELECT *  , 0 as wish  FROM itemviews
WHERE  categories_id = $categoryid AND items_id NOT IN  ( SELECT itemviews.items_id FROM itemviews 
INNER JOIN favorite ON favorite.favorite_itemsid = itemviews.items_id AND favorite.favorite_usersid =  $userid  )");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}