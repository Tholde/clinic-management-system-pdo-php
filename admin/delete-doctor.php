<?php
require_once "../user.php";
require_once "../classes/docteur.php";
$action = new User();
$doc = new Docteur();
$action->connect();
$action->deleteDr($_GET['del']);
echo "<script>alert('Data deleted successfuly!');document.location='manage-doctors.php'</script>";
?>