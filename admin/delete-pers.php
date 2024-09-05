<?php
require_once "../user.php";
require_once "../classes/personal.php";

$action = new User();
$doc = new Personal();
$action->connect();
$action->deletePersonnal($_GET['id']);
echo "<script>alert('Data deleted successfuly!');document.location='manage-pers.php'</script>";
?>