<?php

require 'dbcon.php';

 // Get the current date and time
$currentDateTime = new DateTime();
// Store the date in the $date variable
$date = $currentDateTime->format('Y-m-d');
// Store the time in the $time variable
$time = $currentDateTime->format('H:i:s');

$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (sender_id, receiver_id, message,created_date,created_time) VALUES (?, ?, ?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiis", $sender_id, $receiver_id, $message,$date,$time);
$stmt->execute();

echo json_encode(["status" => "success"]);
?>
