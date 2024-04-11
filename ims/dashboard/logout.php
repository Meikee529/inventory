<?php
session_start(); 
include('includes/config.php');
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
$sql1 = "DELETE FROM temp";
$query1 = $dbh -> prepare($sql1);
$query1->execute();

$sql8 = "UPDATE stockin SET sin_check=0";
$query8 = $dbh -> prepare($sql8);
$query8->execute();
unset($_SESSION['alogin']);
session_destroy(); // destroy session
header("location:../index.php"); 
?>

