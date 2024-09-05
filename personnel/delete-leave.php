<?php
require_once "../user.php";
require_once "../classes/leave.php";

$action = new User();
$doc = new Leave();
$action->connect();
$action->deleteLeave($_GET['leaveid']);
echo "<script>alert('Data deleted successfuly!');document.location='manage-doctors.php?id=" . $_GET['id'] . "'</script>";
?>