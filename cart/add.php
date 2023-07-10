<?php
include "../connect.php";

$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
$itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;

if ($userid && $itemid) {
    $data = array(
        "cart_userid" => $userid,
        "cart_itemid" => $itemid
    );
    
    insertData("cart", $data);
} else {
    echo "User ID and item ID are required.";
}
?>
