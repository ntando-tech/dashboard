<?php

// require       '../config/function.php'./config/function.php
require '../config/function.php';


if(isset($_POST['saveUser']))
{
    // global $conn;
    $username =validate($_POST['username']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $cpassword = validate($_POST['cpassword']);

    if($username != '' || $phone != '' || $email != '' || $password !='' || $cpassword != '')
    {

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (username,phone,email,password) 
        VALUES ('$username','$phone','$email','$hashedPassword')";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../signin.php','Account Created');
        }
        else
        {
            redirect('../signup.php','Something Went Wrong!');
        }
    }
    else
    {
        redirect('../signup.php','Please fill all the input fields!');
    }
}


if(isset($_POST['saveNewEmployee']))
{
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $idnumber = validate($_POST['idnumber']);
    $province = validate($_POST['province']);
    $city = validate($_POST['city']);
    $street_name = validate($_POST['street_name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $profile_image = validate($_POST['profile_image']);
    $password = validate($_POST['password']);
    $cpassword = validate($_POST['cpassword']);
    $role = validate($_POST['role']);
    $zip_code = validate($_POST['zip_code']);
    $account_status = validate($_POST["account_status"]);
    $created_by = validate($_POST['created_by']);
    $created_by_role = validate($_POST['created_by_role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;

    if($firstname != '' || $lastname != '' || $phone != '' || $email != '' || $password != '')
    {

        $hashedpassword =password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO employees (firstname,lastname,idnumber,phone,email,province,city,zip_code,street_name,password,role,is_ban,account_status,created_by,created_by_role)
         VALUES ('$firstname','$lastname','$idnumber','$phone','$email','$province','$city','$zip_code','$street_name','$hashedpassword','$role','$is_ban','$account_status','$created_by','$created_by_role')";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../employees.php','Employee Was Added Successfully');
        }
        else
        {
            redirect('../employee_create.php','Something went wrong!');
        }


    }
    else
    {
            redirect('../users_create.php','Please fill all the input fields!');
    }

}


if(isset($_POST['updateUser']))
{

    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $idnumber = validate($_POST['idnumber']);
   $homeaddress = validate($_POST['homeaddress']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $cpassword = validate($_POST['cpassword']);
    $role = validate($_POST['role']);
    $profile_image = validate($_POST['profile_image']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;

    $userId = validate($_POST['userId']);

    $user = getById('users',$userId);

    if($user['status'] != 200)
    {
        redirect('../users_edit.php?id='.$userId,'No Such Id Found');
    }

    if($firstname != '' || $lastname != '' || $phone != '' || $email != ''|| $profile_image != '' || $password != '')
    {

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "UPDATE users SET 
        firstname='$firstname',
        lastname='$lastname',
        idnumber='$idnumber',
        phone='$phone',
        email='$email',
        home_address='$homeaddress',
        profile_image='$profile_image',
        password='$hashedPassword',
        role='$role',
        is_ban='$is_ban'
         WHERE id='$userId'";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../users.php','User Updated Successfully');
            
        }
        else
        {
            redirect('../blank.html','Something went wrong');
        }


    }
    else
    {
            redirect('../users_create.html','Please fill all the input fields!');
    }

}

if(isset($_POST['updateEmployee']))
{

    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $idnumber = validate($_POST['idnumber']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $cpassword = validate($_POST['cpassword']);
    $role = validate($_POST['role']);
    $profile_image = validate($_POST['profile_image']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;
    $province = validate($_POST['province']);
    $city = validate($_POST['city']);
    $street_name = validate($_POST['street_name']);

    $zip_code = validate($_POST['zip_code']);
    $account_status = validate($_POST["account_status"]);
    $created_by = validate($_POST['created_by']);
    $created_by_role = validate($_POST['created_by_role']);
    
    $userId = validate($_POST['userId']);
    $user = getById('employees',$userId);

    if($user['status'] != 200)
    {
        redirect('../employees_edit.php?id='.$userId,'No Such Id Found');
    }

    if($firstname != '' || $lastname != '' || $idnumber != '' || $phone != '' || $email != '' || $password != '' || $role != '' || $profile_image != '' 
     || $is_ban != '' || $province != '' || $city != '' || $street_name != '' || $zip_code != '' || $account_status != '' || $created_by != '' || $created_by_role != '')
    {

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "UPDATE employees SET 
        firstname='$firstname',
        lastname='$lastname',
        idnumber='$idnumber',
        phone='$phone',
        email='$email',
        role='$role',
        profile_image='$profile_image',
        is_ban='$is_ban'
        province='$province',
        city='$city',
        street_name='$street_name',
        zip_code='$zip_code',
        city='$city',
        account_status='$account_status',
        created_by='$created_by',
        created_by_role='$created_by_role' 
      
         WHERE id='$userId'";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../employees.php','Employees Updated Successfully');
            
        }
        else
        {
            redirect('../blank.html','Something went wrong');
        }


    }
    else
    {
            redirect("../employee_edit.php?id=$userId","Please fill all the input fields!");
    }

}

if(isset($_POST['saveSocialMedia']))
{
    $name = validate($_POST['name']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']) == true ? 1:0;

    if($name != '' || $url != '')
    {
        $query = "INSERT INTO social_medias (name,url,status) 
        VALUES ('$name','$url','$status')";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../social_media.php','Social Media Added Successfully');
        }
        else
        {
            redirect('../social_media_create.php','Something went wrong');
        }


    }
    else
    {
            redirect('../social_media_create.php','Please fill all the input fields!');
    }

}

if(isset($_POST['updateSocialMedia']))
{
    $name = validate($_POST['name']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']) == true ? 1:0;

    $socialMediaId = validate($_POST['socialMediaId']);

    if($name != '' || $url != '')
    {
        $query = "UPDATE social_medias SET name='$name', url='$url', status='$status' WHERE id='$socialMediaId' LIMIT 1";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../social_media.php','Social Media Updated Successfully');
        }
        else
        {
            redirect('../social_media_edit.php?id='.$socialMediaId,'Something went wrong');
        }


    }
    else
    {
            redirect('../social_media_edit.php?id='.$socialMediaId,'Please fill all the input fields!');
    }
}


if(isset($_POST['enquireBtn']))
{
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $subject = validate($_POST['subject']);
    $message = validate($_POST['message']);

    $query = "INSERT INTO enquires (name,email,phone,subject,message) VALUES ('$name','$email','$phone',$subject,'$message')";
    $result = mysqli_connect($conn, $query);

    if($result)
    {
        redirect("thank_you.php","Thank you for contacting us. We will get back to you soon.");
    }
    else
    {
        redirect("thank_you.php","Something Went Wrong");
    }
}


if(isset($_POST['saveProject']))
{
    $project_name = validate($_POST['project_name']);
    $client = validate($_POST['client']);
    $project_manager = validate($_POST['project_manager']);
    $team_members = validate($_POST['team_members']);
    $project_description = validate($_POST['project_description']);
    $due_date = validate($_POST['due_date']);
    $progress_status = validate($_POST['progress_status']);
    $hours_logged = validate($_POST['hours_logged']);
    $status = validate($_POST['status']) == true ? 1:0;
    $note= validate($_POST['note']);


    if($project_name != '' || $client != '' || $project_manager != '' || $team_members != '' || $project_description != '' || $due_date != '' || $progress_status != '' || $hours_logged != '')
    {
        $query = "INSERT INTO projects (project_name,client,project_manager,team_members, project_description,due_date,progress_status,hours_logged,note)
         VALUES ('$project_name','$client','$project_manager','$team_members','$project_description','$due_date','$progress_status','$hours_logged','$note')";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../index.php','Project Added Successfully');
        }
        else
        {
            redirect('project_create.php','Something went wrong!');
        }


    }
    else
    {
            redirect('project_create.php','Please fill all the input fields!');
    }

}

if(isset($_POST['updateProject']))
{
   $project_name = validate($_POST['project_name']);
    $client = validate($_POST['client']);
    $project_manager = validate($_POST['project_manager']);
    $team_members = validate($_POST['team_members']);
    $project_description = validate($_POST['project_description']);
    $due_date = validate($_POST['due_date']);
    //$progress_status = validate($_POST['progress_status']);
    $progress_status = validate($_POST['progress_status']) == true ? 1:0;
    $hours_logged = validate($_POST['hours_logged']);
    $note= validate($_POST['note']);

    $projectId = validate($_POST['projectId']);

    if($name != '' || $url != '')
    {
        $query = "UPDATE projects SET project_name='$project_name',client='$client',team_members='$team_members',project_description='$project_description',due_date='$due_date', progress_status='$progress_status', note='$note' WHERE id='$projectId' LIMIT 1";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../projects.php','Project Updated Successfully');
        }
        else
        {
            redirect('../project_edit.php?id='.$projectId,'Something went wrong');
        }


    }
    else
    {
            redirect('../project_edit.php?id='.$projectId,'Please fill all the input fields!');
    }
}


if(isset($_POST['saveTask']))
{
    $task_name = validate($_POST['task_name']);
    $client = validate($_POST['client']);
    $team_members = validate($_POST['team_members']);
    $task_description = validate($_POST['task_description']);
    $due_date = validate($_POST['due_date']);
    $hours_logged = validate($_POST['hours_logged']);
   // $status = validate($_POST['status']) == true ? 1:0;
   $progress_status = validate($_POST['progress_status']);
    $note= validate($_POST['note']);

    $options = $team_members;

        // Sanitize each option and convert the options array to a comma-separated string
        $sanitizedOptions = array_map(function($option) use ($conn) {
            return $conn->real_escape_string($option);
        }, $options);
        $optionsString = implode(',', $sanitizedOptions);


    if($task_name != '' || $client != '' || $team_members != '' || $task_description != '' || $due_date != '' || $progress_status != '' || $hours_logged != '')
    {
        $query = "INSERT INTO tasks (task_name,client,team_members, task_description,due_date,progress_status,hours_logged,note)
         VALUES ('$task_name','$client','$teammembers','$task_description','$due_date','$progress_status','$hours_logged','$hours_logged')";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../tasks.php','Task Added Successfully');
        }
        else
        {
            redirect('../task_create.php','Something went wrong!');
        }


    }
    else
    {
            redirect('../task_create.php','Please fill all the input fields!');
    }

}

if(isset($_POST['updateTask']))
{
    $task_name = validate($_POST['task_name']);
    $client = validate($_POST['client']);
    $team_members = validate($_POST['team_members']);
    $task_description = validate($_POST['task_description']);
    $due_date = validate($_POST['due_date']);
    $progress_status = validate($_POST['progress_status']);
    $hours_logged = validate($_POST['hours_logged']);
    $status = validate($_POST['status']) == true ? 1:0;
    $note= validate($_POST['note']);

    $taskId = validate($_POST['taskId']);

    if($name != '' || $url != '')
    {
        $query = "UPDATE tasks SET task_name='$task_name',client='$client',team_members='$team_members',task_description='$task_description',due_date='$due_date', progress_status='$progress_status', note='$note' WHERE id='$projectId' LIMIT 1";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../task.php','Task Updated Successfully');
        }
        else
        {
            redirect('../task_edit.php?id='.$taskId,'Something went wrong');
        }


    }
    else
    {
            redirect('../task_edit.php?id='.$taskId,'Please fill all the input fields!');
    }
}


if (isset($_POST["saveSettingProfilePic"])) {
    // echo "<pre>";
    // echo "POST:<br>";
    // print_r($_POST);
    // echo "<br>FILES:<br>";
    // print_r($_FILES);
    // echo "</pre>";
    // exit;

    if ($_FILES['profileImage']['size'] > 0) {

        $image = $_FILES['profileImage']['name'];

        $imageFileTypes = strtolower(
            pathinfo($image, PATHINFO_EXTENSION)
        );

        if (
            $imageFileTypes != 'jpg' &&
            $imageFileTypes != 'jpeg' &&
            $imageFileTypes != 'png'
        ) {
            redirect(
                "../settings.php",
                "Sorry, only JPG, JPEG and PNG images are allowed."
            );
            exit;
        }

        // Physical directory where the image will be stored
        $path = "../myassets/uploads/services/";

        // Create a unique filename
        $filename = time() . '.' . $imageFileTypes;

        // Path that will be stored in the database
        $finalImage = "myassets/uploads/services/" . $filename;

    } else {

        $finalImage = NULL;//this line is reached because the image is not uploaded 
    }

    $query = "UPDATE employees 
              SET profile_image = '$finalImage'";

    $result = mysqli_query($conn, $query);

    if ($result) {

        if ($_FILES['profileImage']['size'] > 0) {

            $upload = move_uploaded_file(
                $_FILES['profileImage']['tmp_name'],
                $path . $filename
            );

            if (!$upload) {
                redirect(
                    "../settings.php",
                    "Database updated, but image upload failed."
                );
                exit;
            }
        }

        redirect(
            "../settings.php",
            "Profile picture added successfully "
        );

    } else {

        redirect(
            "../settings.php",
            "Something went wrong!"
        );
    }
}

if(isset($_POST['submitApplication'])){

    if($_FILES['fileApplicationForm']['size'] > 0 && $_FILES['fileIdCopy']['size'] > 0 && $_FILES['fileSchoolReport']['size'] > 0 ){

    $user_id = validate($_POST['userId']);
    $fullName = validate($_POST['inputFullName']);
    $email = validate($_POST['inputEmail']);
    $grade = validate($_POST['inputGrade']);
    $applicationFormName = validate($_FILES['fileApplicationForm']['name']);
    $idCopyName = validate($_FILES['fileIdCopy']['name']);
    $schoolReportName = validate($_FILES['fileSchoolReport']['name']);
    
    $applicationFormType = strtolower(pathinfo($applicationFormName, PATHINFO_EXTENSION));
    if($applicationFormType != 'pdf'){
        redirect("../application_form.php","Sorry, Application Form must be a PDF File.");
        exit;
    }

    $idCopyType = strtolower(pathinfo($idCopyName, PATHINFO_EXTENSION));
    if($idCopyType != 'pdf'){
        redirect("../application_form.php", "Sorry, Id Copy must be a PDF File.");
        exit;
    }

    $schoolReportType = strtolower(pathinfo($schoolReportName, PATHINFO_EXTENSION));
    if($schoolReportType != 'pdf'){
        redirect("../application_form.php", "Sorry, School Report must be a PDF File.");
        exit;
    }

$applicationYear = date("Y");
$applicationM = date("m");
$applicationMonth = array(
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
);


// Physical directory where the documents will be stored.
$path = "../myassets/uploads/applicationForms/"
      . $applicationYear . "/"
      . $applicationMonth[$applicationM - 1] . " " . $applicationYear . "/"
      . $grade . "/"
      . $fullName .' '. time(). "/";


// Create the folder if it doesn't exist
if (!is_dir($path)) {
    mkdir($path, 0777, true);
}


// Create unique filenames
$applicationFormfile = time() . '_applicationForm_' . $fullName . '.' . $applicationFormType;
$idCopyFile = time() . '_idCopy_' . $fullName . '.' . $idCopyType;
$schoolReportFile = time() . '_schoolReport_' . $fullName . '.' . $schoolReportType;


// Full path of each file
$applicationFormPath = $path . $applicationFormfile;
$idCopyPath = $path . $idCopyFile;
$schoolReportPath = $path . $schoolReportFile;


// Move uploaded files into the user's folder
$uploadApplicationForm = move_uploaded_file(
    $_FILES['fileApplicationForm']['tmp_name'],
    $applicationFormPath
);

$uploadIdCopy = move_uploaded_file(
    $_FILES['fileIdCopy']['tmp_name'],
    $idCopyPath
);

$uploadSchoolReport = move_uploaded_file(
    $_FILES['fileSchoolReport']['tmp_name'],
    $schoolReportPath
);

    if(!$uploadApplicationForm || !$uploadIdCopy || !$uploadSchoolReport){
        redirect("../application_form.php", "Database updated, Documents upload failed.");
        exit;
        }

     $query = "INSERT INTO applications (grade, application_form, id_copy, school_report, user_id) VALUES
    ('$grade', '$applicationFormPath', '$idCopyPath', '$schoolReportPath', '$user_id')";

    $result = mysqli_query($conn, $query);
    if($result){
        redirect("../user_dashboard.php", "Application was submitted");
    }

    redirect("../user_dashboard.php", "Failed to store application details in the database");

    } else{
        redirect("../application_form.php", "Something went wrong!");
    }
}


if(isset($_POST["saveService"]))
{
   // $image = validate($_POST["image"]);

    if($_FILES['image']['size'] > 0)
    {
      $image = $_FILES['image']['name'];

        $imageFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if($imageFileTypes != 'jpg' && $imageFileTypes != 'jpeg' && $imageFileTypes != 'png')
        {
            redirect("../services.php","Sorry only JPG, JPEG , PNG images only");
        }

        $path = "../myassets/uploads/services";
        $imgExt = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$imgExt;

        $finalImage = 'myassets/uploads/services'.$filename;
    }
    else
    {
        $finalImage = NULL;
    }

    $query = "INSERT INTO services (image) values ('$finalImage')";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if($_FILES['image']['size'] > 0)
        {
            move_uploaded_file($_FILES['image']['temp_name'],$path.$filename);

        }
        redirect("../services.php","Service is added successfully");
    }
    else
    {
        redirect("../services_create.php","Something went wrong!");
    }
}


if(isset($_POST['sendMessage']))
{
    // $fromm = validate($_POST['firstname'. $_POST['lastname']]);
    $fromm = validate($_POST['firstnamee']);
    $fromm_email = validate($_POST['from_email']);
    $fromm_profile = validate($_POST['from_profile']);
    $date = validate($_POST['date']);
    $time = validate($_POST['time']);
    $sendingto = validate($_POST['sendingto']);
    $subject = validate($_POST['subject']);
    $message = validate($_POST['message']);

    if($fromm != '' || $fromm_email != '' || $date != '' || $time != '' || $sendingto !='' || $subject != '' || $message != '')
    {

        $query = "INSERT INTO messages (fromm,fromm_email,fromm_profile,date,time,sendingto,subject,message) 
        VALUES ('$fromm','$fromm_email','$fromm_profile','$date','$time','$sendingto','$subject','$message')";
        
        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../messages.php','Message was sent');
        }
        else
        {
            redirect('../message_create.html','Something Went Wrong!');
        }
    }
    else
    {
        redirect('../message_create.html','Please fill all the input fields!');
    }
}

function sendNotification()
{
    // $fromm = validate($_POST['firstname'. $_POST['lastname']]);
    $fromm = validate($_POST['firstnamee']);
    $fromm_email = validate($_POST['from_email']);
    $date = validate($_POST['date']);
    $time = validate($_POST['time']);
    $reciptient = validate($_POST['reciptient']);
    $subject = validate($_POST['subject']);
    $message = validate($_POST['message']);

    if($fromm != '' || $fromm_email != '' || $date != '' || $time != '' || $sendingto !='' || $subject != '' || $message != '')
    {

        $query = "INSERT INTO notifications (fromm,fromm_email,date,time,reciptient,subject,message) 
        VALUES ('$fromm','$fromm_email','$date','$time','$reciptient','$subject','$message')";
        
        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../messages.php','Message was sent');
        }
        else
        {
            redirect('../message_create.html','Something Went Wrong!');
        }
    }
    else
    {
        redirect('../message_create.html','Please fill all the input fields!');
    }
}

if(isset($_POST['clearMessage']))
{

    $_POST['date'] = '';
    $_POST['time'] = '';
    $_POST['reciptient'] = '';
    $_POST['subject'] = '';
    $_POST['message'] = '';

  
}

// function validate($data) {
//     return htmlspecialchars(strip_tags(trim($data)));
// }

if(isset($_POST['sendDmMessage']))
{
$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (sender_id, receiver_id, message, timestamp) VALUES (?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $sender_id, $receiver_id, $message);
$stmt->execute();

echo json_encode(["status" => "success"]);
}



/*Update Profile */
if(isset($_POST['saveProfileSettings']))
{

    $firstname = validate($_POST['inputFirstName']);
    $lastname = validate($_POST['inputLastName']);
    $idnumber = validate($_POST['inputIdNumber']);
    $country = validate($_POST['inputCountry']);
    $province = validate($_POST['inputProvince']);
    $city = validate($_POST['inputCity']);
    $street_name = validate($_POST['inputStreetName']);
    $zipcode = validate($_POST['inputZipCode']);
    $phone1 = validate($_POST['inputPhone1']);
    $email = validate($_POST['inputEmail4']);
    $profile_image = validate($_POST['profileImage']);

    $employeeId = validate($_POST['inputemployeeid']);

    if($firstname != '' || $lastname != '' || $idnumber !='' || $country != '' || $province != '' || $city != '' || $street_name !='' || $zipcode != '' || $phone1 != '' || $email != ''|| $profile_image != '' )
    {

        $query = "UPDATE employees SET 
        firstname = '$firstname',
        lastname = '$lastname',
        idnumber = '$idnumber',
        phone = '$phone1',
        email = '$email',
        country = '$country',
        province = '$province',
        city = '$city',
        street_name = '$street_name',
        zip_code = '$zipcode',
        phone = '$phone1',
        email = '$email',
        profile_image = '$profile_image'
         WHERE id = '$employeeId' ";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../settings.php','Profile Updated Successfully');
            
        }
        else
        {
            redirect('../settings.php','Something went wrong Again Ha Ha Ha');
        }
    }
    else if($firstname != '' || $lastname != '' || $idnumber !='' || $country != '' || $province != '' || $city != '' || $street_name !='' || $zipcode != '' || $phone1 != '' || $email != ''|| $profile_image != '')
    {

        $query = "UPDATE employees SET 
        firstname = '$firstname',
        lastname = '$lastname',
        idnumber = '$idnumber',
        phone = '$phone1',
        email = '$email',
        country = '$country',
        province= '$province',
        city = '$city1',
        zip_code = '$zipcode1',
        profile_image = '$profile_image'
         WHERE id = '$userId' ";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            redirect('../settings.php','Profile Updated Successfully');
            
        }
        else
        {
            redirect('../settings.php','Something went wrong Again');
        }


    }
    else
    {
            redirect('../settings.php','Please fill all the input fields!');
    }

}


if(isset($_POST['changePasswordBtn']))
{
    $currentpassword = validate($_POST['inputcurrentpassword']);
    $inputchangepassword1 = validate($_POST['inputchangepassword1']);
    $inputchangepassword2 = validate($_POST['inputchangepassword2']);
    $databaseuserpassword = validate($_POST['databaseuserpassword']);
    $userId = validate($_POST['userid']);

    $emailInput = validate($_POST['useremail']);
    //$passwordInput =validate($_POST['password']);

       // $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    // $email = htmlspecialchars($emailInput, ENT_QUOTES,'UTF-8');
    // $password = htmlspecialchars($passwordInput, ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($currentpassword, ENT_QUOTES, 'UTF-8');

    if($currentpassword != '' && $inputchangepassword1 != '' && $inputchangepassword2 != '')
    {
        if($inputchangepassword1 == $inputchangepassword2)
        {
            if(password_verify($password,$databaseuserpassword))
            {
                $hashedpassword =password_hash($password, PASSWORD_BCRYPT);

                $hashedpassword = password_hash($inputchangepassword1, PASSWORD_BCRYPT);

                $query = "UPDATE employees SET
                    password = '$hashedpassword'
                    WHERE id = '$userId' AND email = '$emailInput'";
                    
                    $result = mysqli_query($conn, $query);

                    if($result)
                    {
                        redirect("../settings.php",'Password was successfully changed');
                    }
                    else
                    {
                        redirect("../settings.php",'Failed to change the password');
                    }
            }
            else
            {
                redirect("../settings.php","Invalid Current Password");
            }
        }
        else
        {
            redirect("../settings.php",'New Password And Confirm Password Must Match');
        }

  
    }
    else
    {
        redirect("../settings.php","Please Fill In All Fields");
    }
}



if(isset($_POST['userDeleteAccountBtn']))
{
    $inputemailaccountdelete = validate($_POST['inputemailaccountdelete']);
    $inputpasswordaccountdelete = validate($_POST['inputpasswordaccountdelete']);


    $userId = validate($_POST['userid']);

    $checkedemail = filter_var($inputemailaccountdelete, FILTER_SANITIZE_EMAIL);
    $checkedpassword = filter_var($inputpasswordaccountdelete, FILTER_SANITIZE_STRING);

    if($checkedemail != '' && $checkedpassword != '')  
    {

        $query = "SELECT * FROM employees WHERE id='$userId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $idnumber = $row['idnumber'];
                $phone = $row['phone'];
                $email = $row['email'];
                $province = $row['province'];
                $country = $row['country'];
                $city = $row['city'];
                $street_name = $row['street_name'];
                $zipcode = $row['zip_code'];
                $account_status = 'deleted';
                $created_at = $row['created_at'];
                $useremail = $row['email'];
                $userpassword = $row['password'];

               
                // $hashedpassword = password_hash($checkedpassword, PASSWORD_BCRYPT);
                if($country != '' && $city != '' && $zipcode != '')
                {
                    if($useremail == $checkedemail && password_verify($checkedpassword,$userpassword))
                    {

                        $query2 = "UPDATE employees SET
                        account_status = 'request for deletion'
                        WHERE id='$userId' ";
                        
                        $result2 = mysqli_query($conn, $query2);
                            if($result2)
                            {

                                $query3 = "INSERT INTO delete_account_request
                                (id, firstname, lastname, idnumber, phone, email, physical_address1, city1,zip_code1,account_status,created_at) VALUES
                                ('$userId','$firstname', '$lastname', '$idnumber', '$phone', '$email', '$country', '$city', '$zipcode', '$account_status', '$created_at')";

                                $result3 = mysqli_query($conn, $query3);
                                if($result3)
                                {
                                    redirect("../signin.php","Account was successfully deleted");
                                }
                                else{
                                redirect("../settings.php",'Failed To Insert it to deletion database');
                                }
                            
                            }
                            else
                            {
                                redirect("../settings.php", "Failed to delete the account");
                            }
                        }
                        else
                        {
                            redirect('../settings.php','Incorrect User Details!!');
                        }
                }
                else
                {
                    redirect("../settings.php","Your First Address Must Be Field To Delete Your Account");
                }
            }
            else
            {
                redirect("../settings.php",'Your Account was not found');
            }
        }
        else
            {
                redirect("../settings.php","Couldn\'t not find the user");
            }

    }  
    else
    {
        redirect("../settings.php","Please Fill In All Fields");
    }

}

