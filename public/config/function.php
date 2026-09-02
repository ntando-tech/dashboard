<?php

session_start();

require 'dbcon.php';

function validate($inputData)
{
    global $conn;

    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
}

function webSetting($columnName)
{
    $setting = getById('settings',1);
    if($setting['status'] == 200)
    {
        return $setting['data'][$columnName];
        
    }
}

function logoutSession()
{
    unset($_SESSION['auth']);
    unset($_SESSION['loggedInUserRole']);
    unset($_SESSION['loggedInUser']);
}

function redirect($url, $status)
{
    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit(0);
}

function alertMessage()
{
    if(isset($_SESSION['status']))
    {
        echo '<div class="alert alert-success"> 
        <h4>' .$_SESSION['status'] .'</h4>
        </div>';
        unset($_SESSION['status']);
    }
}


function checkParamId($paramType)
{
if(isset($_GET[$paramType]))
{
    if($_GET[$paramType] != null)
    {
        return $_GET[$paramType];
    }
    else
    {
        return 'No Id found';
    }

}
else
{
    return 'No Id given';
}
}


function getAll($tableName)
{
global $conn;

$table= validate($tableName);

$query = "SELECT * FROM $tableName";
$result = mysqli_query($conn, $query);
return $result;
}


function getById($tableName, $id)
{
global $conn;

$table = validate($tableName);
$id = validate($id);

$query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
$result = mysqli_query($conn, $query);

if($result)
{
    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $response = [
            'status' => 200,
            'message' => 'Fetched Data',
            'data' => $row
        ];
        return $response;
    }
    else
    {
        $response = [
            'status' => 404,
            'message' => 'No Data Record'
        ];
        return $response;
    }
}
else
{
    $response = [
        'status'=> 500,
        'message'=>'Something Went Wrong'
    ];
    return $response;
}
}

function deleteQuery($tableName, $id)
{
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;
}


function getuserinfo($tableName,$firstname,$email)
{
    global $conn;
    //$firstname = validate($_POST['firstname222']);
    //$email = validate($_POST['email222']);

    $table= validate($tableName);
    $userfirstname = validate($firstname);
    $useremail = validate($email);

    $query = "SELECT * FROM $table WHERE firstname='$userfirstname' AND email='$useremail' LIMIT 1";

    $result = mysqli_query($conn, $query);
    return $result;
}



function getAllMessages($tableName, $currentUserEmail) {
    global $conn;

    $currentuserelemail = validate($currentUserEmail);
    $tablename = validate($tableName);

    $query = "SELECT * FROM $tablename WHERE sendingto='$currentuserelemail' ORDER BY created_date DESC, created_time DESC";
    $result = mysqli_query($conn, $query);

    return $result;
}

function countUnreadMessages($currentuseremail) {
    global $conn;

    $currentuserelemail = validate($currentuseremail);
    $query = "SELECT COUNT(*) as unread_count FROM messages WHERE sendingto='$currentuserelemail' AND is_read=0";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['unread_count'];
}

function getAllNotifications($tableName, $currentUserEmail) {
    global $conn;

    $currentuserelemail = validate($currentUserEmail);
    $tablename = validate($tableName);
    $query = "SELECT * FROM $tablename WHERE reciptient_email='$currentuserelemail' ORDER BY created_date DESC, created_time DESC";
    $result = mysqli_query($conn, $query);

    return $result;
}

function countUnreadNotifications($currentUserEmail) {
    global $conn;

    $currentuserelemail = validate($currentUserEmail);
    $query = "SELECT COUNT(*) as unread_count FROM notifications WHERE reciptient_email='$currentuserelemail' AND is_read=0";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['unread_count'];
}

function timeAgo($datetime) {
    $time = strtotime($datetime);
    $diff = time() - $time;

    if ($diff < 60) {
        return $diff . " seconds ago";
    } elseif ($diff < 3600) {
        return round($diff / 60) . " minutes ago";
    } elseif ($diff < 86400) {
        return round($diff / 3600) . " hours ago";
    } else {
        return round($diff / 86400) . " days ago";
    }
}

function getProfileImage($email){
if (isset($_SESSION['loggedInUser'])) {
    global $conn;

    $usersemail = validate($email);
    $query = "SELECT profile_image FROM employees where email='$usersemail' LIMIT 1"; 
    $result = mysqli_query($conn, $query);

    return $result;
}
}

function getUserProfileImage($email){
if (isset($_SESSION['loggedInUser'])) {
    global $conn;

    $usersemail = validate($email);
    $query = "SELECT profile_image FROM users where email='$usersemail' LIMIT 1"; 
    $result = mysqli_query($conn, $query);

    return $result;
}
}


function allusersfortask($tableName)
{
$sql = "SELECT id, firstname, lastname, profile_image FROM $tableName";
$result = $conn->query($sql);

$people = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $people[] = $row;
    }
}
}


function getEmployeeTask($currentUserEmail){
global $conn;

$currentuseremail = validate($currentUserEmail); 
$query = "SELECT * FROM tasks where email = '$currentuserelemail'";
$result = mysqli_query($conn,$query);

//  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//         $response = [
//             'status' => 200,
//             'message' => 'Fetched Data',
//             'data' => $row
//         ];
//         return $response;
if($result)
    {
        if(mysqli_num_rows($result) > 0){
           $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $response = [
                    "status" => 200,
                    "message" => "Fetched Data",
                    "data" => $data
                ];
            return $response;

        }else{
            $response = [
                "status"=>"404",
                "message"=>"You have no tasks"
            ];
            return $response;
        }
    }
else{
    $response = [
        "status"=> "404",
        "message" => "Not Found"
    ];
    return $response;
}

}

function countNoOfRecords($tablename){
    
$tableName = validate($tablename);

global $conn;
    $query = "SELECT * FROM $tableName";

    $results = mysqli_query($conn, $query);

    if($results){
            if(mysqli_num_rows($results) >=0 ){
                return mysqli_num_rows($results);
            }

    }else{
        redirect("index.php", "Failed to retrieve number of records.");
    }
} 



function getUserApplicationById($id){

    global $conn;
    $application_id = validate($id);

    $query = "SELECT applications.id as applications_id, 
                applications.user_id, 
                applications.grade, 
                applications.application_form, 
                applications.id_copy, 
                applications.school_report, 
                applications.status as application_status, 
                applications.created_date, 
                users.firstname, 
                users.lastname, 
                users.phone, 
                users.email, 
                users.id as users_id 
              FROM applications 
              JOIN users ON applications.user_id = users.id 
              WHERE applications.id = '$application_id' 
              LIMIT 1";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result); 
            
            return [
                'status' => 200,
                'message' => 'Fetched Data',
                'data' => $row
            ];
        } else {
            return [
                'status' => 404,
                'message' => 'No Data Record'
            ];
        }
    } else {
        return [
            'status' => 500,
            'message' => 'Failed to retrieve the application: ' . mysqli_error($conn)
        ];
    }
}

function getAllBannedAccounts($tablename){

    global $conn;
    $tablename = validate($tablename);

    $query = "SELECT * FROM $tablename WHERE is_ban= '1'";

    $results = mysqli_query($conn, $query);

      return $results;

}

function getAllDeletedAccounts($tablename){

    global $conn;
    $tablename = validate($tablename);

    $query = "SELECT * FROM $tablename WHERE account_status= 'Deleted Account'";

    $results = mysqli_query($conn, $query);

      return $results;

}

if(isset($_GET['addNewToDoBtn'])){

    global $conn;
    $currentEmployee = htmlspecialchars(validate($_GET['employee_id']), ENT_QUOTES) ;
    $taskDescription = htmlspecialchars(validate($_GET['todoDescription'], ENT_QUOTES));

    $query = "INSERT INTO todo (todoDescription, employee_id) VALUES ('$taskDescription','$currentEmployee')";

    $result = mysqli_query($conn, $query);

    if($result){
        redirect("../todo.php","To do was added successfully");
    }
    else{
        redirect("../todo.php", "Failed to add to do");
    }
}

if(isset($_GET['editToDoBtn'])){

    global $conn;
    $todoId = validate($_GET['todo_id']);
    $taskDescription = validate($_GET['editTodoDescription']);

    $query = "UPDATE todo SET todoDescription = '$taskDescription' WHERE id ='$todoId'";

    $result = mysqli_query($conn, $query);

    if($result){
        redirect("../todo.php","To do was updated");
    }
    else{
        redirect("../todo.php", "Failed to add to do");
    }
}

if(isset($_GET['deleteToDoBtn'])){

    global $conn;
    $todoId = validate($_GET['todo_id']);

    $query = "DELETE FROM todo  WHERE id ='$todoId'";

    $result = mysqli_query($conn, $query);

    if($result){
        redirect("../todo.php","To do was deleted");
    }
    else{
        redirect("../todo.php", "Failed to delete to do");
    }
}


function getToDo($id){
    
    $query = "SELECT todo.id,
    todo.description,
    employees.id
    FROM todo
    JOIN employees ON todo.user_id = users.id where todo.id = '$id' LIMIT 1";

    $results = mysqli_query($conn, $query);

      if($results){
       if (mysqli_num_rows($results) == 1) {
          $rows = mysqli_fetch_assoc($results);
          
          return [
            'status' => '200',
            'message' => 'Fetched Data',
            'data' => $rows
          ];
         } else{
            return [
                'status' => '404',
                'message' => 'Not Found'
            ];
         }
      }else{
            redirect("todo.php", "Something went wrong");
        }
 
}



 


/*function getConversation()
{
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

}


function fetch_messages()
{
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

}*/

?>