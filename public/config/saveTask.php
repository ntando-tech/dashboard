<?php
//include 'dbcon.php';
include 'function.php';


//try and catch block

$data = json_decode(file_get_contents('php://input'), true);
$selectedPeople = $data['selectedPeople'];
$newarray = $data['myarray'];


 $task_name = $newarray[0];
 $createdby = $newarray[1];
 $userid = $newarray[2];
 $client = $newarray[3];
 $task_description = $newarray[4];
 $due_date = $newarray[5];


 $notification_name = $_POST['notification_name'];
 $notification_description = $_POST['notification_description'];
 $reciptient_email = $_POST['reciptient_email'];

 // Get the current date and time
$currentDateTime = new DateTime();
// Store the date in the $date variable
$date = $currentDateTime->format('Y-m-d');
// Store the time in the $time variable
$time = $currentDateTime->format('H:i:s');




 if(empty($selectedPeople))
 {
    redirect("../task_create.php", "No Team Members Were Selected");
 }
 else
 {
foreach ($selectedPeople as $personId) {

$sql22 = "SELECT email FROM employees WHERE id='$personId' LIMIT 1";

// Execute the query
$result = $conn->query($sql22);

// Check if the result contains any row
if ($result->num_rows > 0) {
    // Fetch the data from the result set
    $row = $result->fetch_assoc();
    $myemail22 = $row['email'];
} else {
    // If no result found, h andle accordingly
    $myemail = null;
}

// // Close the connection
// $conn->close();

// // Output the email (for testing purposes, you can remove this line in production)
// echo $myemail;
    

    if($personId == $userid)
    {
        $sql = "INSERT INTO tasksss (task_name, created_by, users_assigned, task_description, due_date)
        VALUES ('$task_name', 'Me', '$personId', '$myemail22', '$due_date') ";
        $conn->query($sql);
    
         $sql2 = "INSERT INTO notifications (notification_name,notification_description,reciptient_email,created_date,created_time)
         VALUES ('$notification_name','$notification_description','$reciptient_email','$date','$time')";
        $conn->query($sql2);
    }
    else
    {
    // Assuming there's a notifications table with columns: id, user_id, message, read_status, created_at
    $sql3 = "INSERT INTO tasksss (task_name,created_by, users_assigned,task_description, due_date)
    VALUES ('$task_name', '$createdby', '$personId', '$task_description','$due_date') ";
    $conn->query($sql3);

    $sql4 = "INSERT INTO notifications (notification_name,notification_description,reciptient_email,created_date,created_time)
    VALUES ('$notification_name','$notification_description','$reciptient_email','$date','$time')";
    $conn->query($sql4);
    }
    
}

 $response = ["message" => "Notifications sent to selected people"];
 echo json_encode($response);
//  redirect('../tasks.php','User/Admin Updated Successfully');
}


$conn->close();
?>
