<?php
include "connect.php" ;

$alldata = array();
$alldata['status'] = "success" ; 
//silders data
 //$slider = getAllData("silder" , " hide = 0 " , null ,false , "  LIMIT  12 " );
 //$alldata['silder'] = $slider;
 //category data
 $categories = getAllData("categories" , " hide = 0 " , null ,false);
 $alldata['categories'] = $categories;
 //subcategory data
 $subcategory = getAllData("subcategory" , " hide_ = 0 " , null ,false);
 $alldata['subcategory'] = $subcategory;
 //products data
 $product = getAllData("itemview" , " hide = 0 " , null ,false ,     );
 $alldata['product'] = $product;
 

 //$items = getAllData("itemview" , null , null ,false);
 //$alldata['product'] = $items;

 echo json_encode($alldata);






?>   