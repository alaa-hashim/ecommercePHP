<?php

include "connect.php";
 
$table = "images";
$id =$_POST['id'] ;

$imagename = imageUpload("images/product" , "files");
$data =array(
    "image_productid" => $id ,
    
    "image_name" => $imagename,
);
insertData($table,$data);
?>