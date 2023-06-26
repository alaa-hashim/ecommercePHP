<?php
include "../../connect.php";
$table = "product";
$id = filterRequest("id");
$name = filterRequest("name");
$namear = filterRequest("namear");
$detail = filterRequest("detail");
$detailar = filterRequest("detailar");
$price = filterRequest("price");

$oldimage = filterRequest("oldimage");
 $res =  imageUpload("../../images/product" , "files");
 if($res == "empty"){
    $data =array(
        "product_name" => $name ,
        "proudct_namear" => $namear ,
        "detail" => $detail ,
        "details_ar" => $detailar ,
        "price" => $price ,
        
        
    );

 } else{
$oldimage = filterRequest("oldimage");
    deleteFile("../../images/product" , $oldimage);
    $data =array(
        "product_name" => $name ,
        "proudct_namear" => $namear ,
        "detail" => $detail ,
        "details_ar" => $detailar ,
        "price" => $price ,
        "proudct_img" => $res,
    );
 }

updateData($table,$data , "product_id = $id");
?>