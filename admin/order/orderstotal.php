<?php
// Establish a connection to the MySQL database
$mysqli = new mysqli('localhost' , 'root', '', 'ecommerce');

// Check for any connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Check if a category parameter is provided in the API request
if(isset($_POST['firstDate']) && isset($_POST['lastDate'])){
    // Prepare a SQL statement to select items from the specified category
    $firstDate = $_POST['firstDate'];
    $lastDate = $_POST['lastDate'];

    $stmt = $mysqli->prepare("SELECT *, (SELECT SUM(payment) FROM orderview WHERE oder_date BETWEEN ? AND ?) AS total
        FROM orderview
        WHERE oder_date BETWEEN ? AND ?
        GROUP BY order_id");
    
    // Bind the date parameters to the prepared statement
    $stmt->bind_param("ssss", $firstDate, $lastDate, $firstDate, $lastDate);

    // Execute the prepared statement
    if($stmt->execute()) {
        // Fetch the result set
        $result = $stmt->get_result();

        // Create an array to store the items
        $data = array();

        // Loop through the result set and add each item to the array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        if($result->num_rows > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "error"));
        }
    } else {
        echo json_encode(array("status" => "error"));
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo json_encode(array("status" => "error", "message" => "Missing date parameters."));
}

// Close the database connection
$mysqli->close();
?>
