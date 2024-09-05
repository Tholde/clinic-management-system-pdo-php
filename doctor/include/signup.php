<?php
if (isset($_POST['register'])) {
    require_once("../../user.php");
    require_once("../../classes/docteur.php");

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
        $doc = new Docteur();
        
        $unique_image = $file_name . '.' . $file_ext;
        $upload_image = "../upload/" . $unique_image;

        move_uploaded_file($file_temp, $upload_image);

        $doc->firstname = $_POST['nom'];
        $doc->lastname = $_POST['prenom'];
        $doc->phone = $_POST['phone'];
        $doc->email = $_POST['mail'];
        $doc->user_role = $_POST['role'];
        $doc->password = md5($_POST['password']);
        $doc->image = $unique_image;
        $doc->identifiant = strtolower($_POST['nom']) . '@thclinic.org';
        //var_dump($doc);



        $action->connect();
        $action->insertDr($doc);
        echo "<script>alert('data saved successfully');document.location='../index.php?id=".$doc->identifiant."'</script>";
    }
}
?>
