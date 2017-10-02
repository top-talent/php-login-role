<?php
require 'db_config.php';

  $post = $_POST;

  
  $sql = "INSERT INTO sails (date_1,book_name,channel,precentage_commission,commission_amount,user_id,running_total) 
  VALUES (
          '".$post['date_1']."',
          '".$post['book_name']."',
          '".$post['Channel']."',
          '".$post['precentage_commission']."',
          '".$post['commission_amount']."',
          '".$post['user_id']."',
          '".$post['running_total']."')";
 


  $result = $mysqli->query($sql);


  $sql = "SELECT * FROM sails Order by id desc LIMIT 1"; 

  $result = $mysqli->query($sql);

  $data = $result->fetch_assoc();

    $to = $post['user_email'];
    $subject = "Payment Calculation"; 
    $message = $data;
    var_dump($message);
    exit;
    mail($to, $subject, $message);
    //echo json_encode($data);
    header('Location: ../index.php');
?>