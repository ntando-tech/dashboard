<?php 
// include("messagealert.php");
include("config/function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
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
                <a href="index.php" class="navbar-brand mx-4 mb-3 ">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <a href="profile.php" class="profilesetting">
                <div class="d-flex align-items-center ms-4 mb-4">
                   
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
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="users.php" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Clients</a>
                    <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="users.php" class="nav-item nav-link"><i class="fas fa-user-friends"></i>Employees</a>
                    <a href="tasks.php" class="nav-item nav-link"><i class="fa fa-tasks me-2"></i>Tasks</a>
                    <a href="profile.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Try profile</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Accounts</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="delete_account_request" class="dropdown-item">Deletion Request</a>
                            <a href="deleted_accounts" class="dropdown-item">Deleted Accounts</a>
                        </div>
                    </div>
                    <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Leads</a>
                    <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Events</a>
                    <a href="settings.php" class="nav-item nav-link "><i class="fa fa-cog me-2"></i>Settings</a>
                    <a href="social_media.php" class="nav-item nav-link"><i class="fa fa-globe me-2"></i>Social Media</a>
                    <a href="logout.php" class="nav-item nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    <a href="users_create.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Create User</a>
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

        <div class="nav-item dropdown" >
        <?php if(isset($_SESSION['loggedInUser'])) : ?> 
            <?php
                $userEmail = $_SESSION['loggedInUser']['email'];
                $unreadCount = countUnreadMessages($userEmail);
                ?>
            <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2" ></i>
                <sup class="badge bg-danger" style="margin-left:-13px;"><?php echo $unreadCount; ?></sup>
                <span class="d-none d-lg-inline-flex" style="display:none">Message</span>
            </a>

            <?php else: {?>
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
        }
    } else {
        ?>
        <label><b>No New Messages</b></label>
        <?php
    }
    ?>
    <a href="#" class="dropdown-item text-center">See all messages</a>
<?php else : ?>
    <h6 class="mb-0"><?= $_SESSION["loggedInUser"]["firstname"]; ?></h6>
<?php endif; ?>
            </div>
        </div>
        <div class="nav-item dropdown">
        <?php if(isset($_SESSION['loggedInUser'])) : ?> 
            <?php
                $userEmail = $_SESSION['loggedInUser']['email'];
                $unreadCount = countUnreadNotifications($userEmail);
                ?>
            <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2" ></i>
                <sup class="badge bg-danger" style="margin-left:-13px;"><?php echo $unreadCount; ?></sup>
                <span class="d-none d-lg-inline-flex" style="display:none">Notifications</span>
            </a>

            <?php else: {?>
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
        <label><b>No New Notifications</b></label>
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
                <a href="profile.php" class="dropdown-item"><i class="fa fa-user me-2"></i> My Profile</a>
                <a href="settings.php" class="dropdown-item"><i class="fa fa-cog me-2"></i>Settings</a>
                <a href="signin.php" class="dropdown-item"><i class="fa fa-sign-out-alt me-2"></i>Log Out</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <a href="/users.php" class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Users</p>
                                <h6 class="mb-0">Number Of Users: 20</h6>
                            </div>
                        </div>
                    </a>
                    <a href="/application.php" class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Applications</p>
                                <h6 class="mb-0">No Of Applications: 40</h6>
                            </div>
                        </div>
                    </a>
                    <a href="/tasks" class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Tasks</p>
                                <h6 class="mb-0">Number of Task: 5</h6>
                            </div>
                        </div>
                    </a>
                    <a href="/tickets" class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Tickets</p>
                                <h6 class="mb-0">Number Of Tickets: 20</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-transparent" type="text" placeholder="Enter task">
                                <button type="button" class="btn btn-primary ms-2">Add</button>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox" checked>
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span><del>Short task goes here...</del></span>
                                        <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- theme switch js (light and dark)-->
        <script src="js/changetheme.js"></script>
    <!-- //theme switch js (light and dark)-->
</body>

</html>