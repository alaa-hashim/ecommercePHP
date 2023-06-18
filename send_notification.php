<?php
require_once('function2.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function sendNotification($token, $title, $message, $data) {
        // Your Firebase Cloud Messaging server key
        $serverKey = 'YOUR_SERVER_KEY';

        // Set the notification payload
        $payload = [
            'to' => $token,
            'notification' => [
                'title' => $title,
                'body' => $message,
                'sound' => 'default',
            ],
            'data' => $data,
        ];

        // Convert the payload to JSON
        $jsonPayload = json_encode($payload);

        // Set the request headers
        $headers = [
            'Authorization: key=' . $serverKey,
            'Content-Type: application/json',
        ];

        // Create a CURL request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPayload);

        // Send the request and get the response
        $response = curl_exec($ch);

        // Close CURL
        curl_close($ch);

        // Process the response
        if ($response === false) {
            // Request failed
            echo 'Error: ' . curl_error($ch);
        } else {
            // Request succeeded
            echo 'Notification sent successfully!';
        }
    }

    // Retrieve the form data
    $token = $_POST['token'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $data = [
        $_POST['data_key1'] => $_POST['data_value1'],
        $_POST['data_key2'] => $_POST['data_value2'],
    ];

    sendNotification($token, $title, $message, $data);
}
?>
<!-- HTML Form -->
<form action="send_notification.php" method="POST">
    <input type="text" name="token" placeholder="Device Token" required><br>
    <input type="text" name="title" placeholder="Notification Title" required><br>
    <textarea name="message" placeholder="Notification Message" required></textarea><br>
    <input type="text" name="data_key1" placeholder="Data Key 1" required><br>
    <input type="text" name="data_value1" placeholder="Data Value 1" required><br>
    <input type="text" name="data_key2" placeholder="Data Key 2" required><br>
    <input type="text" name="data_value2" placeholder="Data Value 2" required><br>
    <button type="submit">Send Notification</button>
</form>
