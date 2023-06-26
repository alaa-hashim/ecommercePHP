<?php
include"../../connect.php";
$table = "categories";
$id = filterRequest("id");
$name = filterRequest("name");
$namear = filterRequest("namear");
$oldimage = filterRequest("oldimage");
 $res =  imageUpload("../../images/category" , "files");
 if($res == "empty"){
    $data =array(
        "category_name" => $name ,
        "category_namear" => $namear ,
        
    );

 } else{
$oldimage = filterRequest("oldimage");
    deleteFile("../../images/category" , $oldimage);
    $data =array(
        "category_name" => $name ,
        "category_namear" => $namear ,
        "img" => $res,
    );
 }

updateData($table,$data , "category_id = $id");
?>