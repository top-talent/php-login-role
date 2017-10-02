<?php

if(isset($_POST){
	
	// mail : email,
 //            date : date_1,
 //            name : book_name,
 //            chan : channel,
 //            pc   : precentage_commission,
 //            ca   : commission_amount,
 		$date = $_POST['date'];
 		$name = $_POST['name'];
 		$chan = $_POST['chan'];
 		$pc   = $_POST['pc'];
 		$ca   = $_POST['ca'];
 		$mail = $_POST['mail'];

    $to = $mail;
    $subject = "Payment Calculation"; 
    $message = '<div class="calculation>
    							<div class="date">'.$date.'</div>
    							<div class="name">'.$name.'</div>
    							<div class="chan">'.$chan.'</div>
    							<div class="pc">'.$pc.'</div>
    							<div class="ca">'.$ca.'</div>
    						</div>';

    $headers = "Content-type: text/html; charset=iso-8859-1\r\n";
    'X-Mailer: PHP/' . phpversion();
    $headers .= "From: Arno <arnotanne@gmail.com>"; 
    mail($to, $subject, $message, $headers);
 }
?>