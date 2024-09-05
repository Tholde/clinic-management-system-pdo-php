<?php
require_once "../user.php";
require_once "../classes/leave.php";

$action = new User();
$doc = new Leave();
$action->connect();
$listLea = $action->fetchOneLeave($_GET['leaveid']);
foreach ($listLea as $key => $value) {
    if ($value['role'] = 0) {
        $doc->id = $_GET['leaveid'];
        $doc->role = '1';
        $action->connect();
        $action->validLeave($doc);
        echo "<script>alert('invalid successfuly!');document.location='leave-history.php'</script>";
    }
    else {
        $doc->id = $_GET['leaveid'];
        $doc->role = '0';
        var_dump($doc);
        $action->connect();
        $action->validLeave($doc);
        echo "<script>alert('valid successfuly!');document.location='leave-history.php'</script>";
    }
}

?>