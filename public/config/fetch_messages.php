<?php

require 'dbcon.php';

$user_id = $_GET['user_id'];
$contact_id = $_GET['contact_id'];

$sql = "SELECT * FROM messages 
        WHERE (sender_id = ? AND receiver_id = ?) 
           OR (sender_id = ? AND receiver_id = ?)
        ORDER BY timestamp ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiii", $user_id, $contact_id, $contact_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);
$conn->close();
?>