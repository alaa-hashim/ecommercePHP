<?php
include "../connect.php";

$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
$itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;

if ($userid && $itemid) {
    $where = "cart_userid = $userid AND cart_itemid = $itemid";
    
    deleteData("cart", $where);
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}
?>