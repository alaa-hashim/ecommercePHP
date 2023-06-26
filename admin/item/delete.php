<?php
include "../../connect.php";
$id = filterRequest("id");
$imagename = filterRequest("oldimage");

deleteFile("../../images/product" , $imagename);
 deleteData("product" ,"product_id = $id");

?> 