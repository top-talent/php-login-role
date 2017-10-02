<?php

// multiple recipients
    $to  = 'arnotanne3400@gmail.com'; // note the comma 

    // subject
    $subject = 'Payment Request';

    if($_POST)
    {   
        $username = $_POST['name'];
        $email = $_POST['mail'];
    }

    $message = '
    <html>
    <head>
      <title>Payment Request</title>
    </head>
    <body>
      <div class="Payment">
        <h3>Payment Reqeust</h3>
        <p class="name">Name: '.$username.'</p>
        <p class="name">Email: '.$email.'</p>
      </div>    
    </body>
    </html>
    ';

    $from = "$email";
    // To send HTML mail, the Content-type header must be set
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Additional headers
    // $headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
    // $headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
    // $headers .= 'Cc: william@iconwebsitedesign.com' . "\r\n";
    // $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

    // $header .= 'From: Bolt Weight Calculator <info@lightningboltandsupply.com>' . "\r\n";

    // Mail it
    mail( $to, $subject, $message, $headers); 
 }
?>