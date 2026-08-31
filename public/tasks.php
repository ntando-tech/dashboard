<?php include("config/function.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tasks</title>
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

    <!--Datatable stylesheet-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"/>

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
<br>


            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Tasks List
                            <a href="task_create.php" class="btn btn-primary float-end">Add Task</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <!-- <?= alertMessage();?>--> 
                         <?= alertMessage(); ?> 

                        <table  class="table table-bordered table-striped"> <!--id="taskstable" -->
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Task_Name</th>
                                    <th>Team_Member</th>
                                    <th>Hours_Logged</th>
                                    <th>Status</th>
                                    <th>Due_Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $task = getAll('tasksss');
                            if(mysqli_num_rows($task) > 0)
                            {
                            foreach($task as $taskItem)
                            {
                                ?>
                                <tr>
                                <td><?=$taskItem['id'];?></td>
                                <td><?=$taskItem['taskname'];?></td>
                                <td><?=$taskItem['users_assigned'];?></td>
                                <td><?=$taskItem['hours_logged'];?></td>
                                <td><?=$taskItem['progress_status'] == 1 ? 'Complete' : 'Incomplete'; ?></td>
                                <td><?=$taskItem['due_date'];?></td>

                                <td>
                                    <a href="task_edit.php?id=<?=$taskItem['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="task_delete.php?id=<?=$taskItem['id'];?>" 
                                    class="btn btn-danger btn-sm mx-2"
                                    onclick="return confirm('Are you sure you want to delete this task?')"
                                    >Delete</a>
                                </td>
                            </tr>

                            <?php
                        }
                        }
                        else
                        {
                        ?>
                        <tr>
                            <td colspan="7">No Record Found</td>
                        </tr>
                        <?php
                        }
                        ?>
                            </tbody>
                        </table>
              
                    </div>
                </div>
            </div>

            </div>
                


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

<!-- Datatable Javascript -->
      <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap.min.js"></script>
<script src="js/datatablecodecopy.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

?>