<!DOCTYPE html>
 <html>
<head>
 <title></title>
</head>
<body>
<?php

require "vendor/autoload.php";

 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 $developmentMode = true;
 $mailer = new PHPMailer($developmentMode);

  try {
     $mailer->SMTPDebug = 2;
    $mailer->isSMTP();            //edited here


 if ($developmentMode) {

   $mailer->SMTPOptions = [
    'ssl'=> [
         'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      ]
   ];

 }

 $mailer->Host = 'smtp.gmail.com';
$mailer->SMTPAuth = true;
 $mailer->Username = "mygmail@gmail.com";
 $mailer->Password = "password";
 $mailer->SMTPSecure = 'tls';
$mailer->Port = 587;

$mailer-> setFrom("mygmail@gmail.com", "Izaya");
$mailer->addAddress("anothergmail@gmail.com","orihara");

  $mailer->isHTML(true);
   $mailer->Subject = "Hey There";
  $mailer->Body = "NICE TO MEET YOU IZAYA ";


   $mailer->send();
$mailer->ClearAllRecipients();
  echo "Mail has been Sent";



   }catch (Exception $e) {
echo "Email Error.INFO:" . $mailer->ErrorInfo;

  }


  ?>
 </body>
