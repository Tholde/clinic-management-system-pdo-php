<?php
if (isset($_POST['register'])) {
    require_once("../../user.php");
    require_once("../../classes/personal.php");

    $photo = fopen($_FILES["image"]["tmp_name"], 'rb');
    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_size = $_FILES['image']['size'];
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));

    if ($_POST['password'] !== $_POST['confirmPassword']) {
        echo "<script>alert('Password and Confirm Password no macth');document.location='../signup.php'</script>";
    } else if (!$permited) {
        echo "<script>alert('Please insert jpg or jpeg or png or gif file only!');document.location='../signup.php'</script>";
    } else {
        $action = new User();
        $doc = new Personal();
        
        $unique_image = $file_name . '.' . $file_ext;
        $upload_image = "../upload/" . $unique_image;

        move_uploaded_file($file_temp, $upload_image);

        $doc->fullname = $_POST['nom'];
        $doc->email = $_POST['mail'];
        $doc->address = $_POST['address'];
        $doc->gender =  $_POST['gender'];
        $doc->password = md5($_POST['password']);
        $doc->image = $unique_image;
        $doc->identifiant = strtolower($_POST['nom']) . '@thclinic.org';
        //var_dump($doc);



        $action->connect();
        $action->insertPersonnal($doc);
        echo "<script>alert('data saved successfully');document.location='../index.php?id=".$doc->identifiant."'</script>";
    }
}
?>
