<?php
include_once('PHPMailer.php');
include_once('SMTP.php');
include_once('Exception.php');


$msj = 'Name  :<b>'.$_POST['name'].'</b><br><hr>
        Phone :<b>'.$_POST['phone'].'</b><br><hr>
        Mail  :<b>'.$_POST['email'].'</b><br><hr>
        Description  :<b>'.$_POST['description'].'</b><br><hr>';

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//authentication SMTP enabled
$mail->Mailer = "smtp";
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "modawanilia.com";
//indico el puerto que usa Gmail 465 or 587
$mail->Port = 465;
$mail->Username = "mail@eef1a2.org";
$mail->Password = "Parola6161";
$mail->SetFrom("mail@eef1a2.org", "Lead Gulls");

$mail->isHTML(true);
$mail->Subject = "New Lead";
$mail->Body = $msj;
$mail->AddAddress("dreamea@gmail.com");

$mail->Send();
$msj .= "\n";

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, $msj);
fclose($myfile);

Header("Location:https://censtone.ca/thks.html");exit;


//   $mail = new PHPMailer\PHPMailer\PHPMailer();
// $mail->CharSet = 'UTF-8';
//   $mail->IsSMTP(); // enable SMTP
//   $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//   //authentication SMTP enabled
//   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
//   $mail->Host = "eef1a2.org";
// $mail->SMTPAuth = false;
// $mail->SMTPAutoTLS = false;
// $mail->Port = 25;
//   //indico el puerto que usa Gmail 465 or 587
//   $mail->Username = "mail@eef1a2.org";
//   $mail->Password = "bN.ov!grdRdN";
//   $mail->SetFrom("mail@eef1a2.org","Moda Wanilia");

// $mail->isHTML(true);
//   $mail->Subject = "Zamówienie";
//   $mail->Body = $msj;
//   $mail->AddAddress("dreamea@gmail.com");
// //   $mail->AddAddress($_SESSION["c_mail"]);

// $mail->Send();