<?php
// Establish a connection to the MySQL database
$mysqli = new mysqli('localhost' , 'root', '', 'ecommerce');

// Check for any connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Check if a category parameter is provided in the API request
$category = isset($_['id']) ? $_POST['id'] : '';

// Prepare a SQL statement to select items from the specified category
$stmt = $mysqli->prepare("SELECT * FROM productview WHERE subcat_id = ?");
$stmt->bind_param("s", $category);
$stmt->execute();

// Fetch the result set
$result = $stmt->get_result();

// Create an array to store the items
$data = array();

// Loop through the result set and add each item to the array
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

if ($result->num_rows > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "error"));
}

// Close the database connection
$stmt->close();
$mysqli->close();
?>
