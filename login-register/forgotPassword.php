<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<link rel="stylesheet" type="text/css" href="style.css">

<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>

<div class="container">
    <div class="regisFrm">
        <form action="userAccount.php" method="post">
            <p>Enter the Email of Your Account to Reset New Password</p>
            <input type="email" name="email" placeholder="EMAIL" required="">
            <div class="send-button">
                <input type="submit" name="forgotSubmit" value="CONTINUE">
            </div>
        </form>
    </div>
</div>