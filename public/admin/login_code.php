<?php

require '../config/function.php';

// if(isset($_GET[$paramType]))
if(isset($_POST['loginBtn']))
{
    $emailInput = validate($_POST['email']);
    $passwordInput =validate($_POST['password']);

    $tablename = "";
    // $safeString = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');   
    // $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    $email = htmlspecialchars($emailInput, ENT_QUOTES,'UTF-8');
    $password = htmlspecialchars($passwordInput, ENT_QUOTES, 'UTF-8');

    if($email != '' && $password != '')
    {
        if(str_ends_with($email,"@dashboard.co.za")){
            $tablename = "employees";
        }
        else{
            $tablename = "users";
        }

        $query = "SELECT * FROM $tablename WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $hashedPassword = $row['password'];
                if(!password_verify($password,$hashedPassword))
                {
                    redirect("../signin.php","Invalid Password");
                }

                if($row['role'] == 'admin')
                {
                    if($row['is_ban'] == 1)
                    {
                        redirect('../signin.php','Your account has been banned. Please contact the admin');
                    }
                    else if($row['account_status'] == 'Request for deletion' || $row['account_status'] == 'Not active')
                    {
                        redirect('../signin.php','Incorrect login details');
                    }


                    $_SESSION['auth']=true;
                    $_SESSION['loggedInUserRole']= $row['role'];
                    $_SESSION['loggedInUser']=[
                     'firstname' =>  $row['firstname'],
                     'lastname' => $row['lastname'],
                     'profile_image' => $row['profile_image'],
                    'idnumber' => $row['idnumber'],
                    'province' => $row['province'],
                    'city' => $row['city'],
                    'zip_code' => $row['zip_code'],
                    'phone' => $row['phone'],
                      'email' =>  $row['email'],
                     'role' => $row['role'],
                    'is_ban' => $row['is_ban'],
                    'account_status' => $row['account_status']
                    ];

                    redirect('../index.php','Logged In Successfully');
                }

                if($row['role'] == 'user')
                {
                    if($row['is_ban'] == 1)
                    {
                        redirect('../signin.php','Your account has been banned. Please contact the admin');
                    }
                    elseif($row['account_status'] == 'Not Active')
                    {
                        redirect('../signin.php','Activate Your Account');
                    }
                    elseif($row['account_status'] == 'Request for deletion')
                    {
                        redirect('../signin.php','Incorrect login details');
                    }

                    $_SESSION['auth']=true;
                    $_SESSION['loggedInUserRole']= $row['role'];
                    $_SESSION['loggedInUser']=[
                        'id' => $row['id'],
                     'username' =>  $row['username'],
                     'firstname' => $row['firstname'],
                     'lastname' => $row['lastname'],
                     'profile_image' => $row['profile_image'],
                    'phone' => $row['phone'],
                      'email' =>  $row['email'],
                     'role' => $row['role']
                    // 'is_ban' => $row['is_ban'],
                    ];

                    redirect('../user_dashboard.php','Logged In Successfully');
                }
            }
            else
            {
                redirect('../signin.php','Incorrect login details');
            }
       
        }
        else
        {
            redirect('../signin.php','Something went wrong');
        }
    }
    else
    {
        redirect('../signin.php',"All fields are mandotory");
    }
}












if(isset($_POST['userLoginBtn']))
{
    $emailInput = validate($_POST['email']);
    $passwordInput =validate($_POST['password']);

    $tablename = "";

    $email = htmlspecialchars($emailInput, ENT_QUOTES,'UTF-8');
    $password = htmlspecialchars($passwordInput, ENT_QUOTES, 'UTF-8');

    if($email != '' && $password != '')
    {
        if(str_ends_with($email,"@dashboard.co.za")){
            $tablename = "employees";
        }
        else{
            $tablename = "users";
        }

        $query = "SELECT * FROM $tablename WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $hashedPassword = $row['password'];
                if(!password_verify($password,$hashedPassword))
                {
                    redirect("../signin.php","Invalid Password");
                }
             
                if($row['role'] == 'user')
                {
                    if($row['is_ban'] == 1)
                    {
                        redirect('../signin.php','Your account has been banned. Please contact the admin');
                    }
                    elseif($row['account_status'] == 'request for deletion')
                    {
                        redirect('../signin.php','Incorrect login details');
                    }

                    $_SESSION['auth']=true;
                    $_SESSION['loggedInUserRole']= $row['role'];
                    $_SESSION['loggedInUser']=[
                        'id' => $row['id'],
                     'username' =>  $row['username'],
                     'firstname' => $row['firstname'],
                     'lastname' => $row['lastname'],
                     'profile_image' => $row['profile_image'],
                    'phone' => $row['phone'],
                      'email' =>  $row['email'],
                     'role' => $row['role']
                    // 'is_ban' => $row['is_ban'],
                    ];

                    redirect('../user_dashboard.php','Logged In Successfully');
                }

        
            }
            else
            {
                redirect('../signin.php','Incorrect credentials');
            }
       
        }
        else
        {
            redirect('../signin.php','Something went wrong');
        }
    }
    else
    {
        redirect('../signin.php',"All fields are mandory");
    }
}


?>