<?php
include"../../connect.php";
$table = "categories";
$name =$_POST['name'] ;
$namear =$_POST['namear'] ;
//$imagename = imageUpload("../../images/category" , "files");
$data =array(
    "category_name" => $name ,
    "category_namear" => $namear ,
    //"img" => $imagename,
);
insertData($table,$data);
?>