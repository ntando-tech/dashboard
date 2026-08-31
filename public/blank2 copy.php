<?php include("config/function.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
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
        <div class="sidebar bg-light pe-4 pb-3">
         <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3 bg-light">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <a href="profile.php" class="profilesetting">
                <div class="d-flex bg-light align-items-center ms-4 mb-4">
                   
                        <!-- <h6 class="mb-0">John Dorris</h6> -->
                        <?php if(isset($_SESSION['loggedInUser'])) : ?> 
                            <?php  
                                $usersemail = $_SESSION['loggedInUser']['email'];
                                $user = getProfileImage($usersemail);
                                ?>
                            <div class="position-relative">
                            <?php
    if (mysqli_num_rows($user) > 0) {
        foreach ($user as $userItem) {?>
                                <?php if($userItem['profile_image']=='global.png'){?>
                    <img class="rounded-circle" src="img/default_pic.jpg" alt="profile image" style="width: 40px; height: 40px;">
                    <?php } else {?>
                        <img class="rounded-circle" src="img/users_profile_pic/<?=$userItem['profile_image'];?>" alt="profile image" style="width: 40px; height: 40px;">
                    <?php } ?>
                   <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>

                    <div  class="ms-3" class="profilesetting">
                        <h6 class="mb-0"> <?= $_SESSION["loggedInUser"]["firstname"]; ?>  </h6>
                        <span><?=$_SESSION['loggedInUser']["role"]; ?></span>
                        </div>
                        <?php } } 
                        else {?> 
                        <h4>No profile found </h4> 
                        <?php } ?>
                        <?php else : ?>
                            <div  class="ms-3" class="profilesetting">
                            <h6 class="mb-0">No User </h6>
                            </div>
                        <?php endif; ?>
                 
                </div>
               </a>
               <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="users.php" class="nav-item nav-link"><i class="fa fa-cog me-2"></i>Clients</a>
                    <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="users.php" class="nav-item nav-link"><i class="fas fa-user-friends"></i>Employees</a>
                    <a href="tasks.php" class="nav-item nav-link"><i class="fa fa-tasks me-2"></i>Tasks</a>
                    <a href="profile.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Try profile</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Accounts</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="banned_accounts.php" class="dropdown-item">Banned Account</a>
                            <a href="delete_account_request.php" class="dropdown-item active">Deletion Request</a>
                            <a href="deleted_accounts.php" class="dropdown-item">Deleted Accounts</a>
                        </div>
                    </div>
                    <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Leads</a>
                    <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Events</a>
                    <a href="settings.php" class="nav-item nav-link "><i class="fa fa-cog me-2"></i>Settings</a>
                    <a href="social_media.php" class="nav-item nav-link"><i class="fa fa-globe me-2"></i>Social Media</a>
                    <a href="signin.php" class="nav-item nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    <a href="users_create.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Create User</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->  
        
        <!-- Content Start -->
        <div class="content">
           
            <!-- Navbar Start -->
            <!-- <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0"> -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search">
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

        
      <div class="nav-item dropdown" >
        <?php if(isset($_SESSION['loggedInUser'])) : {?> 
            <?php
                $userEmail = $_SESSION['loggedInUser']['email'];
                $unreadCount = countUnreadMessages($userEmail);
                ?>
            <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2" ></i>
                <?php if($unreadCount > 0) 
                {?>
                <sup class="badge bg-danger" style="margin-left:-13px;"><?php echo $unreadCount; ?></sup>
                <?php } ?>
                <span class="d-none d-lg-inline-flex" style="display:none">Message</span>
            </a>

            <?php } else: {?>
                <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2" ></i>
                <span class="d-none d-lg-inline-flex  badge bg-danger" style="display:none">Message</span>
            </a>
            <?php } ?>
            <?php endif; ?>

            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
            
            

            <?php if (isset($_SESSION['loggedInUser'])) : ?>
    <?php
    $userEmail = $_SESSION["loggedInUser"]["email"];
    $users = getAllMessages('messages', $userEmail);
    ?>
    
    <?php
    if (mysqli_num_rows($users) > 0) {
        foreach ($users as $userItem) {
            $messageTime = $userItem['date'] . ' ' . $userItem['time'];
            ?>
            <hr class="mt-0 mb-0"></hr>
            <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                    <?php if ($userItem['fromm_profile'] == 'global.png') : ?>
                        <img class="rounded-circle" src="img/default_pic.jpg" alt="" style="width: 40px; height: 40px;">
                    <?php else : ?>
                        <img class="rounded-circle" src="img/users_profile_pic/<?= $userItem['fromm_profile']; ?>" alt="" style="width: 40px; height: 40px;">
                    <?php endif; ?>
                    <div class="ms-2">
                        <h6 class="fw-normal mb-0"><b><?= $userItem['fromm']; ?></b> sent you a message</h6>
                        <small><?= timeAgo($messageTime); ?></small>
                    </div>
                </div>
            </a>
            <hr class="mt-0 mb-0"></hr>
            <?php
        }?>
        <a href="#" class="dropdown-item text-center">See all messages</a>
        <?php
    } else {
        ?>
        <label class="dropdown-item text-center" ><b>No New Messages</b></label>
        <a href="#" class="dropdown-item text-center">See all messages</a>
        <?php
    }
    ?>
   
<?php else : ?>
    <h6 class="mb-0"><?= $_SESSION["loggedInUser"]["firstname"]; ?></h6>
<?php endif; ?>
            </div>
        </div>
        <div class="nav-item dropdown">
        <?php if(isset($_SESSION['loggedInUser'])) :  ?> 
            <?php
                $userEmail = $_SESSION['loggedInUser']['email'];
                $unreadCount = countUnreadNotifications($userEmail);
                ?>
            <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2" ></i>
                <?php if($unreadCount > 0 )
                {?>
                <sup class="badge bg-danger" style="margin-left:-13px;"><?php echo $unreadCount; ?></sup>
                <?php } ?>
                <span class="d-none d-lg-inline-flex" style="display:none">Notifications</span>
            </a>

            <?php  else: {?>
                <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2" ></i>
                <span class="d-none d-lg-inline-flex  badge bg-danger" style="display:none">Notifications</span>
            </a>
            <?php } ?>
            <?php endif; ?>

            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
            
            
            <?php if (isset($_SESSION['loggedInUser'])) : ?>
    <?php
    $userEmail = $_SESSION["loggedInUser"]["email"];
    $users = getAllNotifications('noti', $userEmail);
    ?>

    <?php
    if (mysqli_num_rows($users) > 0) {
        foreach ($users as $userItem) {
            $notificationTime = $userItem['date'] . ' ' . $userItem['time'];
            if($userItem['reciptient_email'] == $userEmail)
            {
            ?>
            <hr class="mt-0 mb-0"></hr>
            <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                    <div class="ms-2">
                        <h6 class="fw-normal mb-0"><b>You </b>created new Task</h6>
                        <small><?= timeAgo($notificationTime); ?></small>
                    </div>
                </div>
            </a>
            <!-- <label>__________________________ </label> -->
             <hr class="mt-0 mb-0"></hr>
            <?php
            }
            else 
            {
                ?>
                 <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">

                    <div class="ms-2">
                        <h6 class="fw-normal mb-0"><b><?= $userItem['createdby']; ?></b> added you on ...</h6>
                        <small><?= timeAgo($notificationTime); ?></small>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
            </a>
            <?php

            }
        }
    } else {
        ?>
        <label class="dropdown-item text-center"><b>No New Notifications</b></label>
        <?php
    }
    ?>
    <a href="#" class="dropdown-item text-center">See all notifications</a>
<?php else : ?>
    <h6 class="mb-0"><?= $_SESSION["loggedInUser"]["firstname"]; ?></h6>
<?php endif; ?>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">John Doe</span>
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
                            Employees List
                            <a href="users-create.php" class="btn btn-primary float-end">Add Users</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <form action="admin/code.php" method="POST">

                    <!-- <?= alertMessage();?>--> 
                    <div class="col-md-3">
                    <div class="mb-3">
                    <label>Select Team Members</label>
                        <select class="form-select">
                        
                            <?php
                            $users = getAll('employees');
                            if(mysqli_num_rows($users) > 0)
                            {
                            foreach($users as $userItem)
                            {
                                ?>
                                
                                <option value="<?=$userItem['id'] ?>"><?=$userItem['id'];?></option>
                            <?php

                        }
                        }
                        else
                        {
                        ?>
                            <label colspan="7">No Record Found</label>

                        <?php
                        }
                        ?>

                        </Select>
                        
                    <div>
                        <div>
                        </form>
              
                    </div>
                </div>
            </div>

            </div>
                
            <script>
document.addEventListener('DOMContentLoaded', function() {
    const teamMembersSelect = document.getElementById('teamMembersSelect');
    const selectedMembersList = document.getElementById('selectedMembersList');

    teamMembersSelect.addEventListener('change', function() {
        const selectedOptions = Array.from(teamMembersSelect.selectedOptions);
        selectedMembersList.innerHTML = ''; // Clear the list

        selectedOptions.forEach(option => {
            const listItem = document.createElement('li');
            listItem.textContent = option.textContent;
            selectedMembersList.appendChild(listItem);
        });
    });
});
</script>


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
<script src="js/datatablecode.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>


    <!-- theme switch js (light and dark)-->
    <script src="js/changetheme.js"></script>
    <!-- //theme switch js (light and dark)-->

</body>

</html>

?>