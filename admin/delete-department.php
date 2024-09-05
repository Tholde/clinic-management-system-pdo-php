<?php
require_once "../user.php";
require_once "../classes/department.php";

$action = new User();
$spec = new Department();
$action->connect();
$action->deleteDepartment($_GET['id']);
echo "<script>alert('Data deleted successfuly!');document.location='department.php'</script>";
?>