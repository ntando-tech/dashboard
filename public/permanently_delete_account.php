<?php

require './config/function.php';

$paraResult = checkParamId('id');

if(is_numeric($paraResult))
{
        $userId = validate($paraResult);
        $user = getById('employees',$userId);
        $useraccount = getById('delete_account_request',$userId);
        
        $query = "SELECT * FROM employees WHERE id='$userId' AND account_status='request for deletion' LIMIT 1";
        $result = mysqli_query($conn,$query);
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
                $physicaladdress1 = $row['physical_address1'];
                $city1 = $row['city1'];
                $zipcode1 = $row['zip_code1'];
                $account_status = 'deleted';
                $created_at = $row['created_at'];
                $useremail = $row['email'];


                if($user['status'] == 200)
                {
                    $userDeleteRes = deleteQuery('employees',$userId);
                    $userAccountDeleteRes = deleteQuery('delete_account_request',$userId);
        
                    if($userDeleteRes)
                    {
                        
                        $query3 = "INSERT INTO deleted_accounts
                        (id, firstname, lastname, idnumber, phone, email, physical_address1, city1,zip_code1,account_status,created_at) VALUES
                        ('$userId','$firstname', '$lastname', '$idnumber', '$phone', '$email', '$physical_address1', '$city1', '$zip_code1', '$account_status', '$created_at')";
        
                        $result3 = mysqli_query($conn, $query3);
                        if($result3)
                        {
                            redirect("delete_account_request","Account was successfully deleted");
                        }
                        else{
                        redirect("../settings.php",'Failed To Move Account To Permanently Delete The Account');
                        }

                    }
                    else
                    {
                        redirect('delete_account_request.php', 'Failed To Delete The Account');
                    }
                }
                else
                {
                 redirect('delete_account_request.php',$user['message']);
                }

               
            }
            else
            {
                redirect("delete_account_request.php","The Account Was Not Found!!");
            }
           
        }
        else
        {
            redirect("delete_account_request.php","Something Went Wrong While Searching For UserId");
        }

        
}
else
{
    redirect('delete_account_request.php',$paraResult);
}
?>

