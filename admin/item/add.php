<?php
include "../../connect.php";
$table = "product";
$name =filterRequest("name");
$namear =filterRequest("namear");
$detail =filterRequest("detail");
$detailar =filterRequest("detailar");
$price =filterRequest("price");
$imagename = imageUpload("../../images/product" , "files");
$data =array(
    "product_name" => $name ,
        "proudct_namear" => $namear ,
        "detail" => $ndetail ,
        "details_ar" => $detailar ,
        "price" => $price ,
        "proudct_img" => $imagename,
);
insertData($table,$data);
?>