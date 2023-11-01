<?php
include "connect.php" ;
ini_set('display_errors', 1);
       ini_set('display_startup_errors', 1);
       error_reporting(E_ALL);

$st=$_REQUEST['st'];
 if($st==1){
        
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
    $itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;
    $count = isset($_REQUEST["count"]) ? $_REQUEST["count"] : null;

    getData("cart", "cart_itemid = $itemid AND cart_userid = $userid  AND quantity = $count AND cart_order = 0" ,null  , false );


    $data = array(
        "cart_userid" =>  $userid,
        "cart_itemid" =>  $itemid,
        "quantity" => $count
    );
    
    insertData("cart", $data ,);
     
}
else if ($st==999){
    $table = "images";
$name =isset($_REQUEST["name"]) ? $_REQUEST["name"] : null;
$itemid =isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;


$data =array(
    "image_name" => $name ,
        "item_id" => $itemid ,
       
       
);
insertData($table,$data);

}
else if($st==5){
    $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
   $password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;
   $username = isset($_REQUEST["user"]) ? $_REQUEST["user"] : null;
   $phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;
   $token = isset($_REQUEST["token"]) ? $_REQUEST["token"] : null;
   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   
   $stmt = $con->prepare("SELECT * FROM user WHERE email = ?");
   $stmt->bindParam(1, $email, PDO::PARAM_STR);
   $stmt->execute();
   
   $count = $stmt->rowCount();
   if ($count > 0) {
       printFailure("EMAIL ALREADY EXISTS");
   } else {
       $data = array(
           "user" => $username,
           "password" => $hashedPassword, // Store the hashed password in the database
           "email" => $email,
           "phone" => $phone,
           "token" => $token,
       );
       insertData("user", $data);
   }
   
   
       
   } 

elseif($st==100){

   
    $table = "address";
    $usersid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
    $name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : null;
    $city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
    $street = isset($_REQUEST["street"]) ? $_REQUEST["street"] : null;
    $building = isset($_REQUEST["building"]) ? $_REQUEST["building"] : null;
    $apartment = isset($_REQUEST["apartment"]) ? $_REQUEST["apartment"] : null;
    $phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;
    $lag = isset($_REQUEST["lag"]) ? $_REQUEST["lag"] : null;
    $lat = isset($_REQUEST["lat"]) ? $_REQUEST["lat"] : null;
    $type = isset($_REQUEST["type"]) ? $_REQUEST["type"] : null;
    $image = isset($_REQUEST["image"]) ? $_REQUEST["image"] : null;
    
    
    
    $data = array(  
    
    "user_address" => $usersid,
    "address_name"   => $name,
    "city" => $city,
    "street" => $street,
    "building" => $building,
    "apartment" => $apartment,
    "address_phone"   => $phone,
    "address_long" => $lag,
    "address_lat" => $lat,
    "address_type" => $type,
    "address_image" => $image,
    
    );
    
    insertData($table , $data);
    
} 
//order start 
else if($st==30){
        
      getAllData("ordersview" , " 0 = 0  " , null ,true);
     
    
    }
    else if($st==31){
        $data = array(
            "order_status" => 1
        );

        $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
       $orderid = isset($_REQUEST["orderid"]) ? $_REQUEST["orderid"] : null;
        updateData("orders", $data, "order_id = $orderid AND order_status = 0");

        
        insertNotify("success", "The Order Has been Approved", $userid, "users$userid", "none",  "");
        
        }
        else if ($st == 32) {
            $data = array();
            $stmt = $con->prepare("SELECT * FROM ordersview WHERE order_status = 2 ORDER BY oder_date DESC LIMIT 1");

            $stmt->execute();
            
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $count  = $stmt->rowCount();
            
            
            if ($count> 0) {
                echo json_encode(array("status" => "success", "data" => $data));
            } else {
                echo json_encode(array("status" => "error"));
            }
            
        }

        else if($st==33){
          
    
            $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
           $orderid = isset($_REQUEST["orderid"]) ? $_REQUEST["orderid"] : null;
           $driverid = isset($_REQUEST["driverid"]) ? $_REQUEST["driverid"] : null;
            
           $data = array(
            "order_status" => 3 ,
            "order_delivery" => $driverid
        ); 
        
           updateData("orders", $data, "order_id = $orderid AND order_status = 2 ");
    
            
            insertNotify("success", "Great news!

            Your order #$orderid is now out for delivery and will arrive today. ", $userid, "users$userid", "none",  "");
            
            }
elseif ($st == 34) {
                $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
                $password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;
            
                // Assuming your function getData works properly
                $result = getData("delivery", "email = :email AND approve = 1 AND hide = 0", array(":email" => $email));
            
                if ($result) {
                    $hashedPasswordInDatabase = $result[0]['password'];
            
                    if (password_verify($password, $hashedPasswordInDatabase)) {
                        // Password is correct
                        echo json_encode(array("status" => "success", "data" => $result));
                    } else {
                        // Password is incorrect
                        echo json_encode(array("status" => "error", "message" => "Invalid password"));
                    }
                } 
            }           
           
  else if($st==35){
 $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;
$username = isset($_REQUEST["user"]) ? $_REQUEST["user"] : null;
$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;
$token = isset($_REQUEST["token"]) ? $_REQUEST["token"] : null;
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $con->prepare("SELECT * FROM delivery WHERE email = ?");
$stmt->bindParam(1, $email, PDO::PARAM_STR);
$stmt->execute();

$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("EMAIL ALREADY EXISTS");
} else {
    $data = array(
        "driver_name" => $username,
        "password" => $hashedPassword, // Store the hashed password in the database
        "email" => $email,
        "phone" => $phone,
        "token" => $token,
    );
    insertData("delivery", $data);
}


    
}   
else if($st==36){
          
    
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
   $driver = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
   
    
   $data = array(
    "approve" => 1 ,
    
); 

   updateData("delivery", $data, "id = $driver AND approve = 0");

    
    insertNotify("Great news!", " Your account #$driver is now approved and ready to use. ", $userid, "delivery$userid", "none",  "");
    
    }
    else if($st==37){
          
    
        $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
       $driver = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
       
        
       $data = array(
        "hide" => 1 ,
        
    ); 
    
       updateData("delivery", $data, "id = $driver AND hide = 0");
    
        
        insertNotify("success", "Great news!
    
        Your order #$driver is now out for delivery and will arrive today. ", $userid, "users$userid", "none",  "");
        
        }

  else if($st==38){
          
    
        $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
       $driver = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
       
        
       $data = array(
        "hide" => 0 ,
        
    ); 
    
       updateData("delivery", $data, "id = $driver AND hide = 1");
    
        
        insertNotify("success", "Great news!
    
        Your order #$driver is now out for delivery and will arrive today. ", $userid, "users$userid", "none",  "");
        
        }
        else if ($st == 39) {
            $data = array();
            $stmt = $con->prepare("SELECT * FROM ordersview WHERE order_status = 3 ");

            $stmt->execute();
            
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $count  = $stmt->rowCount();
            
            
            if ($count> 0) {
                echo json_encode(array("status" => "success", "data" => $data));
            } else {
                echo json_encode(array("status" => "error"));
            }
            
        }
        else if($st==40){
          
    
            $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
           $orderid = isset($_REQUEST["orderid"]) ? $_REQUEST["orderid"] : null;
           $driverid = isset($_REQUEST["driverid"]) ? $_REQUEST["driverid"] : null;
            
           $data = array(
            "order_status" => 4 ,
            "order_delivery" => $driverid
        ); 
        
           updateData("orders", $data, "order_id = $orderid AND order_status = 3 ");
    
            
            insertNotify("success", "Great news!

            Your order #$orderid is now out for delivery and will arrive today. ", $userid, "users$userid", "none",  "");
            
            }

    elseif ($st==50){
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"]: null ;
    //subcategory data
      getAllData("user" , " user_hide = 0 AND $id = id " , );
    
    }
     elseif ($st==51){
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"]: null ;
    $username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : null;
    $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
    $phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;
$data = array(
            "user" => $username ,
            "email" => $email ,
            "phone" => $phone,
            
        ); 
      updateData("user" , $data , " user_hide = 0 AND $id = id " , );
    
    }
    elseif ($st==52){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"]: null ;
        
    $data = array(
                "user_hide" => 1 ,
                
            ); 
            insertData("user" , $data , " user_hide = 0 AND $id = id " , );
        
        }
        elseif ($st==53){
            $id = isset($_REQUEST["id"]) ? $_REQUEST["id"]: null ;
            $itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"]: null ;
            
       $data = array(
        "user_id" => $id,
        "item_id" => $itemid
       );
       
       $checkitem = getData("viewers", "item_id = '$itemid'  ", null,  false);
       if($checkitem > 0){
        $updateQuery = "UPDATE viewers SET view_count = view_count 
        + 1 WHERE item_id = $itemid";
                $stmt = $con->prepare($updateQuery);
    
                if ($stmt->execute([$itemid, ])) {
                    echo json_encode(["status" => "success"]);
                } else {
                    echo json_encode(["status" => "failure"]);
                }
       // updateData1("viewers" , " view_count = view_count + 1 " , " item_id = $itemid " , );
       }else {
        insertData("viewers" , $data , " " , );
       }   }
       elseif($st== 54){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"]: null ;
     getAllData("views" , "user_id = $id " );
       }  
       elseif($st== 55){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"]: null ;
     getAllData("ordersview" , "order_userid = $id " );
       }  
       elseif($st== 56){
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"]: null ;
     getAllData("ordersdetailsview" , "cart_userid = $id " );
       }  
       else if ($st == 57) {
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
        $currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time in yyyy-mm-dd HH:mm:ss format
        $twoYearsAgo = date('Y-m-d H:i:s', strtotime('-4 day', strtotime($currentDateTime))); // Calculate the date two years ago
    
        $data = array();
        $stmt = $con->prepare("SELECT * FROM ordersview WHERE order_userid = ? AND oder_date BETWEEN ? AND ? GROUP BY order_id");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $twoYearsAgo, PDO::PARAM_STR);
        $stmt->bindParam(3, $currentDateTime, PDO::PARAM_STR);
    
        $stmt->execute();
    
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
    
        if ($count > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }
    else if ($st == 58) {
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
        $currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time in yyyy-mm-dd HH:mm:ss format
        $twoYearsAgo = date('Y-m-d H:i:s', strtotime('-3 month', strtotime($currentDateTime))); // Calculate the date two years ago
    
        $data = array();
        $stmt = $con->prepare("SELECT * FROM ordersview WHERE order_userid = ? AND oder_date BETWEEN ? AND ? GROUP BY order_id");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $twoYearsAgo, PDO::PARAM_STR);
        $stmt->bindParam(3, $currentDateTime, PDO::PARAM_STR);
    
        $stmt->execute();
    
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
    
        if ($count > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }
    else if ($st == 59) {
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
        $currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time in yyyy-mm-dd HH:mm:ss format
        $twoYearsAgo = date('Y-m-d H:i:s', strtotime('-6 month', strtotime($currentDateTime))); // Calculate the date two years ago
    
        $data = array();
        $stmt = $con->prepare("SELECT * FROM ordersview WHERE order_userid = ? AND oder_date BETWEEN ? AND ? GROUP BY order_id");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $twoYearsAgo, PDO::PARAM_STR);
        $stmt->bindParam(3, $currentDateTime, PDO::PARAM_STR);
    
        $stmt->execute();
    
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
    
        if ($count > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }
    else if ($st == 60) {
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
        $currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time in yyyy-mm-dd HH:mm:ss format
        $twoYearsAgo = date('Y-m-d H:i:s', strtotime('-2 years', strtotime($currentDateTime))); // Calculate the date two years ago
    
        $data = array();
        $stmt = $con->prepare("SELECT * FROM ordersview WHERE order_userid = ? AND oder_date BETWEEN ? AND ? GROUP BY order_id");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $twoYearsAgo, PDO::PARAM_STR);
        $stmt->bindParam(3, $currentDateTime, PDO::PARAM_STR);
    
        $stmt->execute();
    
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
    
        if ($count > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }
    
    
    
    
         
                   
else if($st==19){
       

    $usersid = isset($_REQUEST["usersid"]) ? $_REQUEST["usersid"] : null;
    $addressid = isset($_REQUEST["addressid"]) ? $_REQUEST["addressid"] : null;
    $pricedelivery = isset($_REQUEST["pricedelivery"]) ? $_REQUEST["pricedelivery"] : null;
    $ordersprice = isset($_REQUEST["ordersprice"]) ? $_REQUEST["ordersprice"] : null;
    $couponid = isset($_REQUEST["couponid"]) ? $_REQUEST["couponid"] : null;
    $paymentmethod = isset($_REQUEST["paymentmethod"]) ? $_REQUEST["paymentmethod"] : null;
    $coupondiscount = isset($_REQUEST["coupondiscount"]) ? $_REQUEST["coupondiscount"] : null;
   
    
    
    
    $totalprice = $ordersprice  + $pricedelivery;
    
    
    // Check Coupon 
    
    $now = date("Y-m-d H:i:s");
    
    $checkcoupon = getData("coupon", "coupon_id = '$couponid' AND coupon_exprid > '$now' AND coupon_use > 0  ", null,  false);
    
    
    if ($checkcoupon  > 0) {
        $totalprice =  $totalprice - $ordersprice * $coupondiscount / 100;
        $stmt = $con->prepare("UPDATE `coupon` SET  `coupon_use`= `coupon_use` - 1  WHERE coupon_id = '$couponid' ");
        $stmt->execute();
    }
    
    
    $data = array(
        "order_userid"  =>  $usersid,
        "order_address"  =>  $addressid,
        
        "order_delivery_price"  =>  $pricedelivery,
        "order_price"  =>  $ordersprice,
        "order_coupon"  =>  $coupondiscount,
       "order_total_price"  =>  $totalprice,
        "order_payment"  =>  $paymentmethod
    );
    
    $count = insertData("orders", $data, false);
    
    if ($count > 0) {
    
        $stmt = $con->prepare("SELECT MAX(order_id) from orders ");
        $stmt->execute();
        $maxid = $stmt->fetchColumn();
    
        $data = array("cart_order" => $maxid);
    
        updateData("cart", $data, "cart_userid = $usersid  AND cart_order = 0 ");
    }
}
else if($st==330){
    $productid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
    $subid = isset($_REQUEST["subid"]) ? $_REQUEST["subid"] : null;
    
    getAllData("itemviews" , "product_id != $productid  AND subcat_id =  $subid " , null , true);

}
else if($st== 17){

    
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

 getAllData("address" , "user_address = $userid" , null , true);
    
    
    }
else if($st== 12){

    $itemid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
   $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

$data = array("wishlist_userid" => $userid,
 "wishlist_productid" => $itemid);
  insertData("wishlist", $data , );
}

// wishlist remove
else if($st ==13){
    $itemid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

$response = deleteData("wishlist", "wishlist_userid = $userid AND wishlist_productid = $itemid");

}else if($st== 14){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
     
     getAllData("wishview" , "wishlist_userid = $userid  " );

}
else if($st==4){
    
    $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
    $password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;

    // Assuming your function getData works properly
    $result = getData("user", "email = :email AND user_hide = 0", array(":email" => $email));

    if ($result) {
        $hashedPasswordInDatabase = $result[0]['password'];

        if (password_verify($password, $hashedPasswordInDatabase)) {
            // Password is correct
            echo json_encode(array("status" => "success", "data" => $result));
        } else {
            // Password is incorrect
            echo json_encode(array("status" => "error", "message" => "Invalid password"));
        }
    } 
    
}
else if($st==90){
    
    
    $search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : null;
       
     getAllData("itemviews", "product_name LIKE '%$search%' OR proudct_namear  LIKE '%$search%'  ", null, );
    
    
    }
    elseif ($st == 700) {
        $userid = $_REQUEST["userid"] ?? null;
        $itemid = $_REQUEST["itemid"] ?? null;
    
        if ($userid !== null && $itemid !== null) {
            // Check if quantity is greater than or equal to 1
            $checkQuantityQuery = "SELECT quantity FROM cart WHERE cart_itemid = ? AND cart_userid = ?";
            $stmtCheck = $con->prepare($checkQuantityQuery);
            $stmtCheck->execute([$itemid, $userid]);
            $row = $stmtCheck->fetch(PDO::FETCH_ASSOC);
    
            if ($row && $row['quantity'] >= 1) {
                $updateQuery = "UPDATE cart SET quantity = quantity - 1 WHERE cart_itemid = ? AND cart_userid = ?";
                $stmt = $con->prepare($updateQuery);
    
                if ($stmt->execute([$itemid, $userid])) {
                    echo json_encode(["status" => "success"]);
                } else {
                    echo json_encode(["status" => "failure"]);
                }
            } else {
                echo json_encode(["status" => "failure", "message" => "Quantity is already 1 or less."]);
            }
        }
    }
 
elseif ($st==2){
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 1;
    //subcategory data
      getAllData("subcategory" , " hide_ = 0 AND $id = cat_id " , );
    
    }
  elseif ($st==222){
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 1;
    //subcategory data
      getAllData("images" , " image_hide = 0 AND $id = item_id " , );
    
    }
   
    // update quantity -- 
  

    // update quantity ++
    elseif($st==800){
        $userid = $_REQUEST["userid"] ?? null;
$itemid = $_REQUEST["itemid"] ?? null;

if ($userid !== null && $itemid !== null) {
    $updateQuery = "UPDATE cart SET quantity = quantity + 1 WHERE cart_itemid = ? AND cart_userid = ?";
    $stmt = $con->prepare($updateQuery);

    if ($stmt->execute([$itemid, $userid])) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "failure"]);
    }
}

        
    }
    else if( $st== 6){
        
            $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
        
            try {
                // Prepare the SQL statement
                $data = getAllData("cartview", "cart_userid = $userid ", null, false);
        
                $stmt = $con->prepare("SELECT SUM(itemsprice) as totalprice, count(countitems) as totalcount FROM `cartview`  
                    WHERE cartview.cart_userid =  $userid AND cartview.hides = 0
                    GROUP BY cart_userid");
        
                $stmt->execute();
                $datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);
        
                echo json_encode(array(
                    "status" => "success",
                    "data" => $data,
                    "countprice" => $datacountprice,
                ));
            } catch (PDOException $e) {
                // Handle any database errors here
                echo json_encode([
                    "status" => "error",
                    "message" => $e->getMessage(),
                ]);
            }
        }
        
     
    else if ($st== 9){
        $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
    $itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;
    
    
    if ($userid && $itemid) {
        
            $updateQuery = "UPDATE cart SET hides = 1 WHERE cart_id = ? AND cart_userid = ?";
            $stmt = $con->prepare($updateQuery);
        
            if ($stmt->execute([$itemid, $userid])) {
                echo json_encode(["status" => "success"]);
            } else {
                echo json_encode(["status" => "failure"]);
            }
           /* $where = "cart_userid = $userid AND cart_itemid = $itemid LIMIT 1 ";
            
            deleteData("cart", $where); */
           
     
    } 
    }
   
else if($st==5){
 $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;
$username = isset($_REQUEST["user"]) ? $_REQUEST["user"] : null;
$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;
$token = isset($_REQUEST["token"]) ? $_REQUEST["token"] : null;
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $con->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bindParam(1, $email, PDO::PARAM_STR);
$stmt->execute();

$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("EMAIL ALREADY EXISTS");
} else {
    $data = array(
        "user" => $username,
        "password" => $hashedPassword, // Store the hashed password in the database
        "email" => $email,
        "phone" => $phone,
        "token" => $token,
    );
    insertData("user", $data);
}


    
}
else if($st = 120){
    $categoryid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;

// Assuming $con is your PDO database connection object
$stmt = $con->prepare("
    SELECT itemviews.*, 1 as wishlist FROM itemviews
    INNER JOIN wishlist ON wishlist.wishlist_productid = itemviews.product_id AND wishlist.wishlist_userid = :userid
    WHERE subcat_id = :categoryid
    UNION ALL 
    SELECT *, 0 as wishlist FROM itemviews
    WHERE subcat_id = :categoryid AND product_id NOT IN (
        SELECT itemviews.product_id FROM itemviews
        INNER JOIN wishlist ON wishlist.wishlist_productid = itemviews.product_id AND wishlist.wishlist_userid = :userid

        )"
    
);

// Assuming $userid is the user ID you want to use in the query
$stmt->bindParam(':userid', $userid, PDO::PARAM_INT);

// Bind $categoryid parameter to the prepared statement
$stmt->bindParam(':categoryid', $categoryid, PDO::PARAM_INT);

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
} 

}
elseif($st=140){
    $categoryid = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
    
    // Assuming $con is your PDO database connection object
    $stmt = $con->prepare("
    (SELECT itemview.*, 1 as wishlist FROM itemview
    INNER JOIN wishlist ON wishlist.wishlist_productid = itemview.product_id AND wishlist.wishlist_userid = :userid
    WHERE subcat_id = :categoryid)
    UNION ALL 
    (SELECT *, 0 as wishlist FROM itemview
    WHERE subcat_id = :categoryid AND product_id NOT IN (
        SELECT itemview.product_id FROM itemview
        INNER JOIN wishlist ON wishlist.wishlist_productid = itemview.product_id AND wishlist.wishlist_userid = :userid
    ))
    ORDER BY itemview.price ASC ;
");

    
    // Assuming $userid is the user ID you want to use in the query
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    
    // Bind $categoryid parameter to the prepared statement
    $stmt->bindParam(':categoryid', $categoryid, PDO::PARAM_INT);
    
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    
    if ($count > 0) {
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure"));
    }
   
     
}

elseif ($st=150) {
    try {
        $stmt = $con->prepare("
    (SELECT itemviews.*, 1 as wishlist FROM itemviews
    INNER JOIN wishlist ON wishlist.wishlist_productid = itemviews.product_id AND wishlist.wishlist_userid = :userid
    WHERE subcat_id = :categoryid
    ORDER BY itemviews.price ASC)
    UNION ALL 
    (SELECT *, 0 as wishlist FROM itemviews
    WHERE subcat_id = :categoryid AND product_id NOT IN (
        SELECT itemviews.product_id FROM itemview
        INNER JOIN wishlist ON wishlist.wishlist_productid = itemviews.product_id AND wishlist.wishlist_userid = :userid
    )
    ORDER BY itemviews.price ASC
)
");

        // Bind parameters here
        // ...
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    
    // Bind $categoryid parameter to the prepared statement
    $stmt->bindParam(':categoryid', $categoryid, PDO::PARAM_INT);
    
        // Execute the query
        $stmt->execute();
    
        // Fetch and process results here
        // ...
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count  = $stmt->rowCount();
        
        if ($count > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    
    } catch (PDOException $e) {
        // Handle any database-related errors here
        echo "Error: " . $e->getMessage();
    }
    
    // Debugging: Print the prepared query
    echo "Prepared SQL: " . $stmt->queryString;
    
}

else if($st ==8){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
$itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;
$quantity = isset($_REQUEST["count"]) ? $_REQUEST["count"] : null;

if ($userid && $itemid) {
    $data = array(
        "cart_userid" => $userid,
        "cart_itemid" => $itemid,
        "quantity" => $quantity
    );
    
    insertData("cart", $data);
} else {
    echo "User ID and item ID are required.";
}

}

// 8 == delete from cart
else if ($st== 9){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
$itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;

if ($userid && $itemid) {
    $updateQuery = "UPDATE cart SET hides = 1 WHERE cart_id = ? AND cart_userid = ?";
    $stmt = $con->prepare($updateQuery);

    if ($stmt->execute([$itemid, $userid])) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "failure"]);
    }
   /* $where = "cart_userid = $userid AND cart_itemid = $itemid LIMIT 1 ";
    
    deleteData("cart", $where); */
   
}
}
// 9 == get count from cart 
else if($st== 10){
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
$itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;

if ($userid && $itemid) {
    $stmt = $con->prepare("SELECT COUNT(cart_id) AS countitems FROM cart WHERE cart_userid = :userid AND cart_itemid = :itemid");
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':itemid', $itemid);
    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {
        $data = $stmt->fetchColumn();
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "success", "data" => "0"));
    }
} else {
    echo json_encode(array("status" => "failure", "data" => "Missing userid or itemid"));
}
}  else if ($st==777){
        $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
    
        // Assuming filterRequest() is a function that sanitizes input
        
        
        
        $data  = getAllData("cartview", "cart_userid = $userid", null, false);

        $stmt = $con->prepare("SELECT SUM(itemsprice) as totalprice , count(countitems) as totalcount FROM `cartview`  
        WHERE  cartview.cart_userid =  $userid 
        GROUP BY cart_userid  ");
        
        $stmt->execute();
        
        
        $datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode(array(
            "status" => "success",
            "countprice" =>  $datacountprice,
            "datacart" => $data,
        ));
    }
  


elseif($st ==500){
    sendGCM("ho" , "maaa" , "users19" , " ", "" , "");
    echo"aaa";
}
else if($st =55){

    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : null;
    $itemid = isset($_REQUEST["itemid"]) ? $_REQUEST["itemid"] : null;
    $count = isset($_REQUEST["count"]) ? $_REQUEST["count"] : null;

    getData("cart", "cart_itemid = $itemid AND cart_userid = $userid  AND quantity = $count AND cart_order = 0" ,null  , false );


    $data = array(
        "cart_userid" =>  $userid,
        "cart_itemid" =>  $itemid,
        "quantity" => $count
    );
    
    insertData("cart", $data);
}
   
   

?>   