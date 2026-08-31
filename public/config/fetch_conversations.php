<?php

require 'dbcon.php';

$user_id = $_GET['user_id'];

// SQL query to select required columns
$sql = "
SELECT 
    m.id,
    u.username AS fromm,
    u.email AS fromm_email,
    u.profile_pic AS fromm_profile,
    DATE(m.created_at) AS date,
    TIME(m.created_at) AS time,
    u2.username AS sendingto,
    m.subject,
    m.message,
    m.is_read,
    m.created_at
FROM 
    messages m
JOIN 
    users u ON m.sender_id = u.id
JOIN 
    users u2 ON m.receiver_id = u2.id
WHERE 
    m.sender_id = ? OR m.receiver_id = ?
ORDER BY 
    m.created_at DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

$conversations = [];
while ($row = $result->fetch_assoc()) {
    $conversations[] = $row;
}

echo json_encode($conversations);

$conn->close();


?>