

<?php
// Establish a connection to the MySQL database
$mysqli = new mysqli('localhost' , 'root', '', 'ecommerce');

// Check for any connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Check if a category parameter is provided in the API request


    // Prepare a SQL statement to select items from the specified category
    if(isset($_POST['firstDate']) || isset($_POST['lastDate'])){
        $firstDate = $_POST['firstDate'];
        $listDate = $_POST['lastDate'];

   
        $stmt = $mysqli->prepare("SELECT *, (SELECT SUM(payment) FROM orderview WHERE oder_date BETWEEN '2023-05-01' AND '2023-07-01') AS total
        FROM orderview
        WHERE oder_date BETWEEN 'firstDate' AND 'lastDate'
        GROUP BY order_id;
        ");
        

    $stmt->execute();
    

    // Fetch the result set
    $result = $stmt->get_result();

    // Create an array to store the items
    $data = array();

    // Loop through the result set and add each item to the array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
   if($result->num_rows > 0){
    echo json_encode(array("status" => "success", "data" => $data));
   }else{
    echo json_encode(array("status" => "error"));
   }
    // Return the items as JSON
    

// Close the database connection
$stmt->close();
$mysqli->close();
    }
?>


   