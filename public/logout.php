<?php

require 'config/function.php';

if(isset($_SESSION['auth']))
{
    logoutSession();
    redirect('signin.php', 'Logged Out Successfully');
}

?>