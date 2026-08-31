<?php

if(isset($_SESSION['auth']))
{
    redirect('index.php','You are already logged In');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login To Olwandle</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, 
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->
<link  href="/kindergarten-website-template/img/madibapics/logo.webp" rel="icon"/>
</head>


<body>
    <h1>Olwandle High School</h1>
    <div class=" w3l-login-form">
        <h2 class="myheading">Login Here</h2>

        <form autocomplete="off" action="/admin_folder/bootstrap-admin-template-free/login_folder/phpfiles/login-code.php" method="POST">

            <div class=" w3l-form-group">
                <label>Email:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="email" placeholder="Email" required="required" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required" />
                </div>
            </div>
            <div class="forgot">
                <!--<?php alertMessage(); ?>-->
                <a href="/kindergarten-website-template/login_folder/web/forgotpassword.html">Forgot Password?</a>
                <p><input type="checkbox">Remember Me</p>
            </div>
            <button type="submit" name="loginBtn">Login</button>
        </form>
        <p class=" w3l-register-p">Don't have an account?<a href="/kindergarten-website-template/login_folder/web/signup333.html" class="register"> Register</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2018 Material Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
    </footer>

</body>

</html>


