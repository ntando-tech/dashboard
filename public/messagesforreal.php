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

    <link  href="css/forchatmessages.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
             
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                   
<!--Chatroom Start-->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- <script src="http://91.234.35.26/iwiki-admin/v1.0.0/admin/js/jquery.nicescroll.min.js"></script> -->


<div class="container">
<div class="row">
        <div class="col-sm-12">
            <div class="panel panel-white border-top-green">
                <div class="panel-body chat"> 
                    <div class="row chat-wrapper">  
                        <div class="col-md-4">
                            <div class="compose-area"> 
                                <a href="javascript:void(0);" class="btn btn-default"><i class="fa fa-edit"></i> New Chat</a>
                            </div>
                            
                            <div>
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 550px;">
                                <div class="chat-list-wrapper" style="overflow-y: auto; width: auto; height: 550px;">
                                    <ul class="chat-list">
                                        <li class="new">
                                            <span class="avatar available">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body2">
                                                <div class="header">
                                                    <span class="username">Gavin Free</span>
                                                    <small class="timestamp text-muted">
                                                        <i class="fa fa-clock-o"></i>1 secs ago
                                                    </small>
                                                </div>
                                                <p>
                                                   Hey, have you finished up with the Ladybug project?
                                                </p>
                                            </div>
                                        </li>  
                                        <li class="active">
                                            <span class="avatar available">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body2">
                                                <div class="header">
                                                    <span class="username">Yanique Robinson</span>
                                                    <small class="timestamp text-muted">
                                                        <i class="fa fa-clock-o"></i>3 secs ago
                                                    </small>
                                                </div>
                                                <p>
                                                    Cool. I'll see you guys then.
                                                </p>
                                            </div>
                                        </li>  
                                        <li>
                                            <span class="avatar">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body2">
                                                <div class="header">
                                                    <span class="username">Ryan Haywood</span>
                                                    <small class="timestamp text-muted">
                                                        <i class="fa fa-clock-o"></i>12 mins ago
                                                    </small>
                                                </div>
                                                <p>
                                                    Kevin, tomorrow is GoT night at my house. Bring your HDMI extension. Thanks.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="avatar busy">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body2">
                                                <div class="header">
                                                    <span class="username">Geoff Ramsey</span>
                                                    <small class="timestamp text-muted">
                                                        <i class="fa fa-clock-o"></i>1 hour ago
                                                    </small>
                                                </div>
                                                <p>
                                                    Sales want to see you. Something about the new product.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="avatar">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body2">
                                                <div class="header">
                                                    <span class="username">Kara Mendly</span>
                                                    <small class="timestamp text-muted">
                                                        <i class="fa fa-clock-o"></i>5 hours ago
                                                    </small>
                                                </div>
                                                <p>
                                                    Meeting next week Tuesday. Nothing serious, just bring teams work progress with you.
                                                </p>
                                            </div>
                                        </li> 
                                        <li>
                                            <span class="avatar busy">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body2">
                                                <div class="header">
                                                    <span class="username">Jack Patillo</span>
                                                    <small class="timestamp text-muted">
                                                        <i class="fa fa-clock-o"></i>12 mins ago
                                                    </small>
                                                </div>
                                                <p>
                                                    hey, what does this error mean?
                                                </p>
                                            </div>
                                        </li>  
                                    </ul>
                                </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 478.639px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-8">

                            <div class="recipient-box"> 
                                <select data-placeholder=" " class="form-control chzn-select chzn-done" multiple="" style="display: none;"> 
                                    <option value="k.mckoy@ztapps.com">Kevin Mckoy</option>
                                    <option value="y.robinson@ztapps.com" selected="">Yanique Robinson</option>
                                    <option value="gavino@ztapps.com">Gavino Free</option> 
                                    <option value="ggeoff@ztapps.com">Geoff Ramsey</option>
                                    <option value="kkara@ztapps.com">Kara Kingsley</option>
                                    <option value="barbs@ztapps.com">Barbara Dundkleman</option> 
                                </select>
                            </div>
                            
                            <div>

                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 452px;">
                                <div class="message-list-wrapper" style="overflow: hidden; width: auto; height: 452px;">
                                    <ul class="message-list">
                                        <li class="text-center">
                                            <a  class="btn btn-default">Load More Messages</a>
                                        </li>
                                        <li class="left">
                                            <span class="username">Yanique Robinson</span>
                                            <small class="timestamp">
                                                <i class="fa fa-clock-o"></i>9 mins ago
                                            </small> 
                                            <span class="avatar available tooltips" data-toggle="tooltip " data-placement="right" data-original-title="Yanique Robinson">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body2">   
                                                <div class="message well well-sm">
                                                    Hey, are you busy at the moment?
                                                </div>
                                            </div>
                                        </li>  
                                        <li class="right">
                                            <span class="username">Kevin Mckoy</span>
                                            <small class="timestamp">
                                                <i class="fa fa-clock-o"></i>5 mins ago
                                            </small> 
                                            <span class="avatar tooltips" data-toggle="tooltip " data-placement="left" data-original-title="Kevin Mckoy">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body2">   
                                                <div class="message well well-sm">
                                                    Um, no actually. I've just wrapped up my last project for the day.
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="message well well-sm">
                                                    Whats up?
                                                </div>
                                            </div>
                                        </li>  
                                        <li class="left">
                                            <span class="username">Yanique Robinson</span>
                                            <small class="timestamp">
                                                <i class="fa fa-clock-o"></i>3 mins ago
                                            </small> 
                                            <span class="avatar available tooltips" data-toggle="tooltip " data-placement="right" data-original-title="Yanique Robinson">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body2">   
                                                <div class="message well well-sm">
                                                    Well, I wanted to find out if you have any plans for tonight.
                                                </div>   
                                                <div class="clearfix"></div>
                                                <div class="message well well-sm">
                                                    <p><a href="#" class="white">Barbara</a> and I are going to this restaurant out of town.</p>
                                                </div>
                                            </div>
                                        </li>  
                                        <li class="right">
                                            <span class="username">Kevin Mckoy</span>
                                            <small class="timestamp">
                                                <i class="fa fa-clock-o"></i>2 mins ago
                                            </small> 
                                            <span class="avatar tooltips" data-toggle="tooltip " data-placement="left" data-original-title="Kevin Mckoy">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body2">   
                                                <div class="message well well-sm">
                                                    Wow that sounds great.
                                                </div>
                                            </div>
                                            </li> 
                                        <li class="left">
                                            <span class="username">Yanique Robinson</span>
                                                <small class="timestamp">
                                                    <i class="fa fa-clock-o"></i>56 secs ago
                                                </small> 
                                            <span class="avatar available tooltips" data-toggle="tooltip " data-placement="right" data-original-title="Yanique Robinson">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="img-circle">
                                                </span>
                                                <div class="body2">   
                                                    <div class="message well well-sm">
                                                        Ok! We'll swing by your office at 5.
                                                    </div>
                                                </div>
                                            </li>  
                                        <li class="right">
                                            <span class="username">Kevin Mckoy</span>
                                                <small class="timestamp">
                                                    <i class="fa fa-clock-o"></i>3 secs ago
                                                </small> 
                                                <span class="avatar tooltips" data-toggle="tooltip " data-placement="left" data-original-title="Kevin Mckoy">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar" class="img-circle">
                                                </span>
                                                <div class="body2">   
                                                    <div class="message well well-sm">
                                                        Cool. I'l see you guys then.
                                                    </div>
                                                </div>
                                            </li>   
                                    </ul>
                                </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 265px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 187.092px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>

                                <div class="compose-box">
                                    <div class="row">
                                       <div class="col-xs-12 mg-btm-10">
                                           <textarea id="btn-input" class="form-control input-sm" placeholder="Type your message here..."></textarea>
                                        </div>
                                        <div class="col-xs-8">
                                            <button  class="btn btn-green btn-sm">
                                                <i class="fa fa-camera"></i>
                                            </button>
                                            <button class="btn btn-green btn-sm">
                                                <i class="fa fa-video-camera"></i>
                                            </button>
                                            <button class="btn btn-green btn-sm">
                                                <i class="fa fa-file"></i>
                                            </button>
                                        </div>
                                        <div class="col-xs-4"> 
                                            <button class="btn btn-green btn-sm pull-right">
                                                <i class="fa fa-location-arrow"></i> Send
                                            </button>
                                        </div> 
                                    </div> 
                                </div>
                                
                            </div>
                            
                        </div>                                    
                    </div> 
                    
                </div> 
            </div>
        </div>

    </div>
</div>

<!--Chatroom End-->

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