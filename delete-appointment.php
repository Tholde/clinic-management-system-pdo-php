<?php
require_once "user.php";
require_once "classes/appointment.php";

$action = new User();
$apt = new Appointment();
$action->connect();
$action->deleteAppointment($_GET['userid']);
echo "<script>alert('Data deleted successfuly!');document.location='appointment-history.php?id=" . $_GET['id'] . "'</script>";
?>