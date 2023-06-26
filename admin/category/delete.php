<?php
include "../../connect.php";
$id = filterRequest("id");
$imagename = filterRequest("oldimage");

deleteFile("../../images/category" , $imagename);
 deleteData("categories" ,"category_id = $id");

?> 