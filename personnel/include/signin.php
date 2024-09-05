<?php
require_once("../../user.php");
require_once("../../classes/personal.php");
if (isset($_POST['login'])) {
    
    if (empty($_POST['identifiant']) || empty($_POST['password'])) {

    }
    else {
        $doct = new Personal();
        $identifiant = $_POST['identifiant'];
        $password = md5($_POST['password']);
        $action = new User();
        $action->connect();

        $nbr = $action->loginDr($password,$identifiant);
        //var_dump($nbr);
        foreach ($nbr as $row) {
            $nombre = $row['count(*)'];
            if ($nombre > 0) {
                $_SESSION['identifiant'] = $_POST['identifiant'];
                $all = $action->fetchOnePesIdent($_POST['identifiant']);
                foreach ($all as $key => $val) {
                    echo "<script>alert('Login successfuly!');document.location='../home.php?id=".$val['id']."'</script>";
                }
                //header('Location: ');
               
            }
            else {
                echo "<script>alert('Login no mutch');document.location='../index.php'</script>";
            }
        }
    }
}
?>