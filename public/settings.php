<?php

include("config/function.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Settings</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->



               <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                 
                <a href="profile.html" class="profilesetting">
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <?php if(isset($_SESSION['loggedInUser'])) {
                            $useremail = $_SESSION['loggedInUser']['email'];
                            $user = getProfileImage($useremail); 
                            if(mysqli_num_rows($user) > 0) {
                                foreach($user as $userItem){
                                    if($userItem['profile_image'] != 'default_pic.jpg'){?>
                        <div class="position-relative">
                        <img class="rounded-circle" src="myassets/uploads/services/default_pic.jpg"alt="profile_pic" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-3" class="profilesetting">
                            <h6 class="mb-0"><?= $_SESSION['loggedInUser']['firstname'];?></h6>
                            <span><?= $_SESSION['loggedInUser']['role']; ?></span>
                        </div>
                        <?php } else{?>
                        <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg"alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-3" class="profilesetting">
                            <h6 class="mb-0">Default</h6>
                            <span>Default</span>
                        </div>
                        <?php } } } }  else { ?>
                        <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg"alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-3" class="profilesetting">
                            <h6 class="mb-0">No User</h6>
                            <span>No Role</span>
                        </div>
                        <?php } ?>
                    </div>
                   </a>


               <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="users.php" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Users</a>
                    <a href="applications.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Applications</a>
                    <a href="employees.php" class="nav-item nav-link"><i class="fas fa-user-friends"></i>Employees</a>
                    <a href="tasks.php" class="nav-item nav-link"><i class="fa fa-tasks me-2"></i>Tasks</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Accounts</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="delete_account_request" class="dropdown-item">Deletion Request</a>
                            <a href="deleted_accounts" class="dropdown-item">Deleted Accounts</a>
                        </div>
                    </div>
                    <a href="settings.php" class="nav-item nav-link "><i class="fa fa-cog me-2"></i>Settings</a>
                    <a href="social_media.php" class="nav-item nav-link"><i class="fa fa-globe me-2"></i>Social Media</a>
                     <a href="logout.php" class="nav-item nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->   


        <!-- Content Start -->
        <div class="content">
           <!-- Navbar Start -->
 <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search"  placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">

        <!-- toggle switch for light and dark theme -->
    <div class="cont-ser-position">
          <nav class="navigation">
              <div class="theme-switch-wrapper">
                  <label class="theme-switch" for="checkbox">
                      <input type="checkbox" id="checkbox">
                      <div class="mode-container">
                          <i class="gg-sun"></i>
                          <i class="gg-moon"></i>
                      </div>
                  </label>
              </div>  
          </nav>
      </div>
      <!-- //toggle switch for light and dark theme --> 

      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                            <?php if(isset($_SESSION['loggedInUser'])){

                            $userEmail = $_SESSION['loggedInUser']['email'];
                            $users = getAllMessages('messages',$userEmail);
                            $count_message_show = 0;
                            $show_messages = 1;
                            
                            if(mysqli_num_rows($users) > 0){
                                foreach($users as $userItem){
                                    $messageTime = $userItem['created_date'] . ' '. $userItem['created_time'];
                            if($show_messages < 4) {?>
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="myassets/uploads/services/default_pic.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0"><b><?= $userItem['sender_id'];?> </b> send you a message</h6>
                                        <small><?= timeAgo($messageTime); ?></small>
                                    </div>
                                </div>
                                <?php  }} } else{ ?>
                                      <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">No new messages</h6>
                                    </div>
                                </div> <?php }}?>
                                    
                            </a>
   
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>


                        
                        <?php if(isset($_SESSION['loggedInUser'])) {

                            $userEmail = $_SESSION['loggedInUser']['email'];
                            $unreadCount = countUnreadNotifications($userEmail); 
                            $users = getAllNotifications("notifications", $userEmail);

                            if($unreadCount > 0) {?>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <sub class="badge bg-danger" style="margin-left:-13px;"><?php echo $unreadCount; ?> </sub>
                            <span class="d-none d-lg-inline-flex" style="display:none">Notifications</span>
                        </a> <?php } else {?> 
                         <div class="nav-item dropdown">
                           <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex" style="display:none">Notifications</span>
                        </a>
                            <?php } ?>
     
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <?php
                            if(mysqli_num_rows($users) > 0){ 
                                foreach($users as $userItem) {
                                    $notificationTime = $userItem['created_date'] .' '. $userItem['created_time'];
                                    if($userItem['reciptient_email'] == $userEmail) {?>
                           <hr class="mt-0 mb-0"></hr>
                           <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0"><b><?= $userItem['notification_name']; ?> </b></h6>
                                <small> <?= timeAgo($notificationTime); ?></small>
                            </a>
                            <?php }}} else{?>
                            <hr class="mt-0 mb-0"></hr>
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">No new notifications</h6>
                            </a>
                            <?php }}?>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <?php if(isset($_SESSION['loggedInUser'])){?>
                            <span class="d-none d-lg-inline-flex"><?= $_SESSION['loggedInUser']['firstname'];?></span>
                            <?php } else {?>
                            <span class="d-none d-lg-inline-flex">Noname</span>
                            <?php }?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <?= alertMessage();?>

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <h1 class="h3 mb-3">Settings</h1>
                <div class="row">
                    <div class="col-md-5 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Profile Settings</h5>
                            </div>
                            <div class="list-group list-group-flush" role="tablist">
                                <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account" role="tab">
                                    Account
                                </a>
                                <a class="list-group-item list-group-item-action " data-bs-toggle="list" href="#password" role="tab">
                                   Change Password
                                </a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#email" role="tab">
                                    Email notifications
                                </a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#web" role="tab">
                                    Web notifications
                                </a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#privacy" role="tab">
                                    Privacy
                                </a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#delete" role="tab">
                                    Delete account
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 col-xl-8">
                        <div class="tab-content">
                   <!-- Account Start -->
                            <div class="tab-pane fade show active" id="account" role="tabpanel">
                                <div class="card">

                                   
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Profile info</h5>
                                    </div>
                                    <div class="card-body">
                                    <?php if(isset($_SESSION['loggedInUser'])) : ?> 
                            
                            <?php
                            $users = getuserinfo('employees',$_SESSION["loggedInUser"]["firstname"],$_SESSION["loggedInUser"]["email"]);
                            if(mysqli_num_rows($users) > 0)
                            {
                            foreach($users as $userItem)
                            {
                                ?>                                    
                                        <form action="admin/code.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input hidden type="text" class="form-control" name="inputuserid" id="inputuserid" value="<?=$userItem['id'];?>" required>
                                                <div class="form-group mb-3">
                                                    <label for="inputFirstName"><b>First name</b></label>
                                                    <input type="text" class="form-control" name="inputFirstName" disabled id="inputFirstName" value="<?=$userItem['firstname'];?>" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="inputLastName"><b>Last name</b></label>
                                                    <input type="text" class="form-control" name="inputLastName" disabled id="inputLastName" value="<?=$userItem['lastname'];?>" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="inputLastName"><b>Id Number</b></label>
                                                    <input type="text" class="form-control" name="inputIdNumber" disabled id="inputIdNumber" maxlength="13" value="<?=$userItem['idnumber'];?>" required>
                                                </div>
                                                    <div class="form-group mb-3">
                                                    <label for="inputEmail4"><b>Email</b></label>
                                                    <input type="email" class="form-control" name="inputEmail4" disabled id="inputEmail4" value="<?=$userItem['email']?>" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                            <div class="text-center">
                                                <?php if($userItem['profile_image'] != 'default_pic.jpg')
                                                {?>
                                                <img id="profileImage"  alt="Picture of <?=$userItem['profile_image'];?>" src="<?=$userItem['profile_image'];?>" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                                <?php 
                                                }
                                                else 
                                                {
                                                    ?>
                                                       <img id="profileImage"  alt="Picture of <?=$userItem['profile_image'];?>" src="myassets/uploads/services/default_pic.jpg" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                                    <?php
                                                }
                                                ?>
                                                <div class="mt-2">
                                                    <span class="btn btn-primary" id="uploadBtn"><i class="fa fa-upload"></i></span>
                                                </div>
                                                <div class="mt-2">
                                                    <input type="file" id="fileInput" name="profileImage" class="btn btn-primary" style="display: none;" accept="image/*">
                                                </div>
                                                <small>For best results, use an image at least 128px by 128px in .jpg format</small>
                                            </div>
                                            </div>
                                            <div class="form-group col-md-6 mb-3 ">
                                                <label for="inputPhone1"><b>Phone Number</b></label>
                                                <input type="text" class="form-control" disabled name="inputPhone1" id="inputPhone1" value="<?=$userItem['phone'];?>" required>
                                            </div>
                                            </div>


                                            <br>
                                            <span class="d-flex justify-content-between">
                                            <button type="reset"  class="btn btn-warning ">Cancel</button>
                                            <button type="submit" name="saveSettingProfilePic" class="btn btn-primary ">Save</button>
                                            </span>
                                        </form>
                                        <?php
                                    }
                                    }
                                    else
                                    {
                                    ?>
                                        <label><b> No Record Found </b></label>

                                    <?php
                                    }
                                    ?>
                                    <?php else: ?> 
                                    <h6 class="mb-0"> <?= $_SESSION["loggedInUser"]["firstname"]; ?>  </h6>
                                    <?php endif; ?>

                                    </div>
                                </div>
                              
                            </div>
                   <!-- Account End -->


                   <!-- Password Start -->
                            <div class="tab-pane fade" id="password" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Change Password</h5>
                                    </div>
                                        <div class="card-body">
                                            
                                    <?php
                                    if(isset($_SESSION['loggedInUser'])) :  ?>
                                        <?php  
                                        $users = getuserinfo('employees',$_SESSION['loggedInUser']['firstname'],$_SESSION['loggedInUser']['email']);
                                        if(mysqli_num_rows($users) > 0)
                                        {
                                        foreach($users as $userItem)
                                        {
                                            ?>
                                                
                                        <form action="admin/code.php" method="POST">
                                        <input type="text" hidden name="userid" value="<?=$userItem['id'];?>" />
                                        <input type="text" hidden name="useremail" value="<?=$userItem['email'];?>" />
                                            <input type="text" hidden name="databaseuserpassword" value="<?=$userItem['password'];?>" />
                                            <div class="form-group mb-3">
                                                <label for="inputcurrentpassword"><b>Current password</b></label>
                                                <input type="password" name="inputcurrentpassword" class="form-control"  id="inputcurrentpassword">
                                               
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="inputchangepassword1"><b>New password</b></label>
                                                <input type="text" name="inputchangepassword1" class="form-control"  id="inputchangepassword1">
                                            </div>
                                            <div class="form-group ">
                                                <label for="inputchangepassword2"><b>Confirm password</b></label>
                                                <input type="text" name="inputchangepassword2" class="form-control" id="inputchangepassword2">
                                            </div>
                                            <br>
                                            <button type="submit" name="changePasswordBtn" class="btn btn-primary">Save changes</button>
                                        </form>
                                    <?php
                                    }
                                    }
                                    else
                                    {
                                    ?>
                                    <label><b>No Record Found</b></label>
                                    <?php
                                    }
                                    endif;
                                    ?>
                                    
                                    </div>
                                </div>
                            </div>
                    <!-- Password End -->
                        

           <!-- Email Notification Start -->
           <div class="tab-pane fade" id="email" role="tabpanel">
            <div class="card">
       
                    <div class="card-header">
                        <h5 class="card-title mb-0">Email Notifications</h5>
                    </div>
                    <span style="margin-left:15px;">Select notification you want to receive</span>
                    <div class="card-body ">
            <strong class="mb-0 ">Security</strong>
            <p>Control security alert you will be notified.</p>
            <div class="list-group mb-5 shadow">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Notify me about unusual activity notifications</strong>
                            <p class="text-muted mb-0">You'll be notified when there is unusual or suspicious activity detected on your account</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="emailtabcheckbox1" checked="" />
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Notify me about Unauthorized financial activity</strong>
                            <p class="text-muted mb-0">You'll be notified when there is suspicious or unauthorized use of your financial accounts</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="emailtabcheckbox2" />
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4" />
            <strong class="mb-0">System</strong>
            <p>Please enable system alert you will get.</p>
            <div class="list-group mb-5 shadow">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Notify me about new features and updates</strong>
                            <p class="text-muted mb-0">You'll be notified whenever there are improvements, or important information available</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="emailtabcheckbox3" checked="" />
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Notify me by email for latest news</strong>
                            <p class="text-muted mb-0">Indicates that you wish to receive news, announcements, or the most recent information via email</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="emailtabcheckbox4" checked="" />
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Notify me about tips on using account</strong>
                            <p class="text-muted mb-0">You will receive notifications that provide advice or helpful tips on how to manage your account.</p>
                        </div>
                        <div class="col-auto">
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="emailtabcheckbox5" checked=""/>
                    <span class="custom-control-label"></span>
                    </div>    
                    </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
                    <!--Email Notification End -->
         
                    <!--Web notificaton start-->
                    <div class="tab-pane fade" id="web" role="tabpanel">
            <div class="card">
       
                    <div class="card-header">
                        <h5 class="card-title mb-0">Web Notifications</h5>
                    </div>
                    <span style="margin-left:15px;">Select notification you want to receive</span>
                    <div class="card-body">
            <strong class="mb-0">Security</strong>
            <p>Control security alert you will be notified.</p>
            <div class="list-group mb-5 shadow">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Notify me about unusual activity notifications</strong>
                            <p class="text-muted mb-0">You'll be notified when there is unusual or suspicious activity detected on your account</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="notificationtabcheckbox1" checked="" />
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Notify me about Unauthorized financial activity</strong>
                            <p class="text-muted mb-0">You'll be notified when there is suspicious or unauthorized use of your financial accounts</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="notificationtabcheckbox2" />
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4" />
            <strong class="mb-0">System</strong>
            <p>Please enable system alert you will get.</p>
            <div class="list-group mb-5 shadow">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Notify me about new features and updates</strong>
                            <p class="text-muted mb-0">You'll be notified whenever there are improvements, or important information available</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="notificationtabcheckbox3" checked="" />
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Notify me by email for latest news</strong>
                            <p class="text-muted mb-0">Indicates that you wish to receive news, announcements, or the most recent information via email</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="notificationtabcheckbox4" checked="" />
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Notify me about tips on using account</strong>
                            <p class="text-muted mb-0">You will receive notifications that provide advice or helpful tips on how to manage your account.</p>
                        </div>
                        <div class="col-auto">
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="notificationtabcheckbox5" checked=""/>
                    <span class="custom-control-label"></span>
                    </div>    
                    </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
                    <!-- Web Notification End-->
                          
                    <!-- Privacy Start-->
                    <div class="tab-pane fade" id="privacy" role="tabpanel">
            <div class="card">
       
                    <div class="card-header">
                        <h5 class="card-title mb-0">Privacy</h5>
                    </div>
                    <span style="margin-left:15px;">Select notification you want to receive</span>
                    <div class="card-body">
            <strong class="mb-0">Security</strong>
            <p>Control security alert you will be notified.</p>
            <div class="list-group mb-5 shadow">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Who Can See You Profile Picture</strong>
                            <p class="text-muted mb-0">Who do you want to see you profile picture</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                            <select type="checkbox" class="custom-control-input" id="privacytabcheckbox1">
                                        <option>None</option>
                                        </option>Admin</option>
                                        <option>All Employees</option>
                                        <option>Bosses</option>
                                        <option>Managers</option>
                                <!-- <span class="custom-control-label"></span> -->
                                 </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Who Can See Your Last Seen</strong>
                            <p class="text-muted mb-0">Who do you want to see you last seen status</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                            <select type="checkbox" class="custom-control-input" id="privacytabcheckbox2">
                                        <option>None</option>
                                        </option>Admin</option>
                                        <option>All Employees</option>
                                        <option>Bosses</option>
                                        <option>Managers</option>
                                <!-- <span class="custom-control-label"></span> -->
                                 </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Who Can See Your Contact Number</strong>
                            <p class="text-muted mb-0">Who do you want to see you contact number</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                            <select type="checkbox" class="custom-control-input" id="privacytabcheckbox3">
                                        <option>None</option>
                                        </option>Admin</option>
                                        <option>All Employees</option>
                                        <option>Bosses</option>
                                        <option>Managers</option>
                                <!-- <span class="custom-control-label"></span> -->
                                 </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Who Can See Your Email Address</strong>
                            <p class="text-muted mb-0">Who do you want to see you email address</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                            <select type="checkbox" class="custom-control-input" id="privacytabcheckbox4">
                                        <option>None</option>
                                        </option>Admin</option>
                                        <option>All Employees</option>
                                        <option>Bosses</option>
                                        <option>Managers</option>
                                <!-- <span class="custom-control-label"></span> -->
                                 </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Who can search for you</strong>
                            <p class="text-muted mb-0">Who will be able to search for you</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                            <select type="checkbox" class="custom-control-input" id="privacytabcheckbox5">
                            <option>None</option>
                                        </option>Admin</option>
                                        <option>All Employees</option>
                                        <option>Bosses</option>
                                        <option>Managers</option>
                                <!-- <span class="custom-control-label"></span> -->
                                 </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-0">Who Can See Tasks Your Working ON</strong>
                            <p class="text-muted mb-0">Who can see tasks you are doing</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <select type="checkbox" class="custom-control-input" id="privacytabcheckbox6">
                                    <option>None</option>
                                        </option>Admin</option>
                                        <option>All Employees</option>
                                        <option>Bosses</option>
                                        <option>Managers</option>
                                <!-- <span class="custom-control-label"></span> -->
                                 </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
                    <!-- Privacy End-->
              
            

 
            <!-- Delete Start -->
            <div class="tab-pane fade" id="delete" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Delete Account</h5>
                    </div>
                    <div class="card-body">
                <?php
                if(isset($_SESSION['loggedInUser'])):?>
                <?php
                $users = getuserinfo('employees',$_SESSION['loggedInUser']['firstname'],$_SESSION['loggedInUser']['email']);
                if(mysqli_num_rows($users) > 0)
                {
                foreach($users as $userItem)
                {
                ?>
                        <form action="admin/code.php" method="POST">
                            <input type="text" name="userid" hidden value="<?=$userItem['id'];?>"/>
                            <div class="form-group mb-3">
                                <label for="inputemailaccountdelete"><b>Email Address</b></label>
                                <input type="text" class="form-control" name="inputemailaccountdelete" id="inputemailaccountdelete">
                            </div>
                            <div class="form-group ">
                                <label for="inputpasswordaccountdelete"><b>Current Password</b></label>
                                <input type="password" class="form-control" id="password" name="inputpasswordaccountdelete" id="inputpasswordaccountdelete">
                            </div>
                            <!-- <button  onclick="switchVisibility()"> hide</button>
                            <br> -->
                            <br>
                            <button type="submit" name="userDeleteAccountBtn" class="btn btn-danger">Delete</button>
                            <!-- <button type="submit" href="delete_user_account.php?id=userItem['id'];?>" 
                                    class="btn btn-danger btn-sm mx-2"
                                    onclick="return confirm('Are you sure you want to DELETE YOUR ACCOUNT')"
                             >Delete</button> -->
                        </form>
                <?php
                }
                }
                else
                {
                ?>
                <label><b>No User Found</b></label>
                <?php
                }
                endif;
                ?>
                    </div>
                </div>
            </div>
             <!-- Delete End -->

                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">iNtando Visionary</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

<!--profile settings-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- theme switch js (light and dark)-->
    <script src="js/changetheme.js"></script>
    <!-- //theme switch js (light and dark)-->

    <!--Change Profile Pic-->
    <script>
    document.getElementById('uploadBtn').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });

    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

    <!--End Change Profile Pic-->



    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
</script>

<!--Start showing and hiding the password-->

<script src="js/showorhidepassword"></script>
<!--End showing and hiding the password-->

  <!-- //MENU-JS -->

  <!-- disable body scroll which navbar is in active -->
  <script>
      $(function () {
          $('.navbar-toggler').click(function () {
              $('body').toggleClass('noscroll');
          })
      });
  </script>
  <!-- //disable body scroll which navbar is in active -->
    
</body>

</html>