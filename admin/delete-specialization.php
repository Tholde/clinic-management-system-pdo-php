<?php
require_once "../user.php";
require_once "../classes/specialization.php";

$action = new User();
$spec = new Specialization();
$action->connect();
$action->deleteSpecialization($_GET['id']);
echo "<script>alert('Data deleted successfuly!');document.location='doctor-specilization.php'</script>";
?>