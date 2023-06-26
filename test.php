<?php
include "connect.php" ;
$st=$_REQUEST['st'];

$response = array();
if($st==1){
$response['success'] = true ; 
 $categories = getAllData("categories" , " hide = 0 " , null ,false);
 $response['data'] = $categories;    
}else if($st==2){

//subcategory data
    $response['success'] = true ; 
 $subcategory = getAllData("subcategory" , " hide_ = 0 " , null ,false);
 $response['data'] = $subcategory;

}
else if($st==3){

//subcategory data
    $response['success'] = true ; 
 $products = getAllData("itemview" , " hide = 0 " , null ,false ,     );
 $response['data'] = $products;

}

 echo json_encode($response);






?>    