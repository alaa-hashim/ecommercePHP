<?php
include "connect.php";
$name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : null;
$user_address = isset($_REQUEST["user_address"]) ? $_REQUEST["user_address"] : null;
$city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
$street = isset($_REQUEST["street"]) ? $_REQUEST["street"] : null;
$building = isset($_REQUEST["building"]) ? $_REQUEST["building"] : null;
$apartment = isset($_REQUEST["apartment"]) ? $_REQUEST["apartment"] : null;
$address_phone = isset($_REQUEST["address_phone"]) ? $_REQUEST["address_phone"] : null;
$address_lag = isset($_REQUEST["address_lag"]) ? $_REQUEST["address_lag"] : null;
$address_lat = isset($_REQUEST["address_lat"]) ? $_REQUEST["address_lat"] : null;

// Assuming $address is the name of the table where you want to insert the data
$sql = "INSERT INTO $address (name, user_address, city, street, building, apartment, address_phone, address_lag, address_lat) VALUES 
    (:name, :user_address, :city, :street, :building, :apartment, :address_phone, :address_lag, :address_lat)";

// Assuming $con is your database connection object
$stmt = $con->prepare($sql);

// Bind parameters
$stmt->bindParam(":name", $name);
$stmt->bindParam(":user_address", $user_address);
$stmt->bindParam(":city", $city);
$stmt->bindParam(":street", $street);
$stmt->bindParam(":building", $building);
$stmt->bindParam(":apartment", $apartment);
$stmt->bindParam(":address_phone", $address_phone);
$stmt->bindParam(":address_lag", $address_lag);
$stmt->bindParam(":address_lat", $address_lat);

// Execute the statement
$stmt->execute();
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}
?>
