<?php

require '../config/function.php';

require_once '../vendor/autoload.php';

$host = "smtp.gmail.com";
$port = "587";
$sslOrTls = "tls";
//ssl-465

$setUsername = "andmhlongo17@gmail.com";
$setPassword = "twom ytsm djyc sxsa";

$emailAddress = "andmhlongo17@gmail.com";
$sendEmailAddress = "andmhlongo17@gmail.com";
$subject = "You Got New Message on Contact";

if(isset($_POST['contactSubmit']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    //$subject = $_POST['subject'];
    $message = $_POST['message'];

    $bodyContent = '<div>
    <h4>Name : '.$name.'</h4>
    <h4>Email : '.$email.'</h4>
    <h4>Phone Number : '.$phone.'</h4>
    <h4>Message : '.$message.'</h4>
    </div>';


try
{

// Create the Transport
$transport = (new Swift_SmtpTransport($host,$port, $sslOrTls))
  ->setUsername($setUsername)
  ->setPassword($setPassword)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message($subject))
  ->setFrom([$email => $name])
  ->setTo([$sendEmailAddress])
  ->setBody($bodyContent, 'text/html')
  ;

// Send the message
$result = $mailer->send($message);

if($result){
    redirect("../contactus.html","Thank you for contacting us.We will get back to you ASAP");
}
else
{
    redirect("../contactus.html","Something Went Wrong!");
}

}
catch(\Exception $e)
{
redirect("../contuctus.html","Something Went Wrong:".$e->getMessage());
}
}
?>