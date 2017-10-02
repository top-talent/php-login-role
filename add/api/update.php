<?php
require 'db_config.php';

	$id  = $_POST['id'];	
	$post = $_POST;
print_r($id) ;
  $sql = "UPDATE sails SET 
			  date_1 = '".$post['date_1']."',
			  book_name = '".$post['book_name']."',
			  channel = '".$post['Channel']."',
			  precentage_commission = '".$post['precentage_commission']."',
			  commission_amount = '".$post['commission_amount']."',
			  running_total = '".$post['running_total']."' 
			  WHERE id = '".$id."'";


  $result = $mysqli->query($sql);


  $sql = "SELECT * FROM sails WHERE id = '".$id."'"; 

  $result = $mysqli->query($sql);

  $data = $result->fetch_assoc();

// echo json_encode($data);

header('Location: ../index.php');


  ?>