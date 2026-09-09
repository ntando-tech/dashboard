<?php

include("config/function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>View Application</title>
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


        <!-- Sign Up Start -->
        <div class="container-fluid">
                       <!-- Content Start -->
        <div class="content"> <!-- should include ms-0-->
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>

                <h4>Welcome <?=$_SESSION['loggedInUser']['firstname'].' '.$_SESSION['loggedInUser']['lastname']?></h4>
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
                        <?php if(isset($_SESSION['loggedInUser'])){?>    
                        <img class="rounded-circle me-lg-2" src="myassets/uploads/services/<?= $_SESSION['loggedInUser']['profile_image']; ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?= $_SESSION['loggedInUser']['username'];?></span>
                            <span class="d-none d-lg-inline-flex"><?= $_SESSION['loggedInUser']['role'];?></span>
                           <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="user_profile.php" class="dropdown-item">My Profile</a>
                            <a href="user_change_password.php" class="dropdown-item">Change Password</a>
                            <a href="user_delete_account.php" class="dropdown-item">Delete Account</a> 
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <div class="row h-100  align-items-center justify-content-center" style="min-height: 40vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div> <?php alertMessage(); ?> </div><br>
                    <!-- <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3"> -->
                        <?php 
                        
                        $userApplication = findUserApplication($_SESSION['loggedInUser']['id']);
                        if($userApplication['status'] == 200) {?>

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>Application Form</h4>
                        </div> 
                   <form action="admin/code.php" enctype="multipart/form-data" method="POST" >

                        <div class="form-group mb-3">
                        <input type="text"  name="userId" hidden readonly id="inputId" required>
                        </div>
                        <div class="form-group mb-3">
                             <label for="inputFullName"><b>Full Name</b> <span class="text-danger">*</span>  </label>
                            <input type="text" class="form-control" name="inputFullName" readonly  value="<?= $userApplication['data']['firstname'].' '.$userApplication['data']['lastname']?>" id="inputFullName"   required>
                        </div>
                        <div class="form-group mb-3">
                             <label for="inputEmail"><b>Email <span class="text-danger">*</span> </label>
                             <input type="email"  class="form-control" name="inputEmail" readonly value="<?= $userApplication['data']['email']?>"  id="inputEmail" required>
                        </div>

                        <div class="form-group mb-3">
                         <label>Select Grade <span class="text-danger">*</span> </label>
                                <select name="inputGrade" required class="form-select">
                                <option value="<?= $userApplication['data']['grade']; ?>" selected>
                                    <?= $userApplication['data']['grade']; ?>
                                </option>
                            </select>
                                <br>
                        <div class="form-group mb-3">
                        <label for="fileApplicationForm"><b>Application Form</b> <span class="text-danger">*</span>  </label><br>
                        <a id="fileApplicationForm" href="<?= $userApplication['data']['application_form']?>" name="fileApplicationForm" class="form-control bg-light" required  accept=".pdf,application/pdf">Application File </a>
                         </div>
                        <div class="form-group mb-4">
                        <label for="fileIdCopy"><b>Id Copy</b> <span class="text-danger">*</span>  </label>   
                         <a  id="fileIdCopy" name="fileIdCopy" href="<?= $userApplication['data']['id_copy']?>" class="form-control bg-light"  required accept=".pdf,application/pdf"> Id Copy </a>
                        </div>
                        <div class="form-group mb-4">
                            <label for="fileSchoolReport"><b>School Report</b> <span class="text-danger">*</span> </label>
                            <a  id="fileSchoolReport" name="fileSchoolReport" href="<?= $userApplication['data']['school_report']?>" class="form-control bg-light"  required accept=".pdf,application/pdf"> School Report </a>
                        </div>

                        <button type="submit" name="submitApplication" class="btn btn-primary py-3 w-100 mb-4" disabled>Submit</button>

                    </div>
                    <?php }else{?>
            <div class="container-fluid  ">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex  justify-content-between mb-2">   
                                <h4 >You haven't Applied:</h4>  
                             <a href="application_form.php">Apply Now </a>
                        </div>
                        </div>
                        </div>
                       <?php }?>
 
                </form>
                <!-- </div> -->
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>