<?php
require 'dbcon.php';

 $sql = "SELECT id, firstname,lastname,profile_image FROM employees";
 //$sql = "SELECT id,image FROM services";
$result = $conn->query($sql);

$people = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $people[] = $row;
    }
}

echo json_encode($people);

$conn->close();
?>
