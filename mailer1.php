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
$mail->Host = "silverbutik.com";
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
$mail->smtpClose();

$msj .= "\n";

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, $msj);
fclose($myfile);

// Header("Location:https://censtone.ca/thks.html");exit;
