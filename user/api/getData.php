<?php
error_reporting(E_ALL);
session_start();
$data = $_SESSION['sessData'];
$id = $data['userID'];

require 'db_config.php';

$num_rec_per_page = 5;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };


$start_from = ($page-1) * $num_rec_per_page;

$sqlTotal = "SELECT * FROM sails WHERE user_id= $id";

$sql = "SELECT sails.*, users.username AS username,(SELECT SUM(commission_amount) AS running_total FROM sails WHERE user_id=users.id GROUP BY user_id) AS running_totals FROM sails LEFT JOIN users ON sails.user_id = users.id WHERE user_id = $id";

  $result = $mysqli->query($sql);

  while(($row = $result->fetch_assoc()) !== null){

     $json[] = $row;

  };

$user_sql = "SELECT id,username,email FROM users WHERE id = $id";
$user_data=$mysqli->query($user_sql);

while($row = $user_data->fetch_assoc()){

     $user_data_json[] = $row;

  }
$data['data'] = $json;
$data['user_data']=$user_data_json;

$result =  mysqli_query($mysqli,$sqlTotal);

$data['total'] = mysqli_num_rows($result);

echo json_encode($data);

?>