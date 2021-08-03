<?php
include '../config.php';

    $query = "INSERT INTO `users`(`user_name`, `email`, `phone`) VALUES('".$_GET['user_name']."','".$_GET['email']."',".$_GET['phone'].")" ;
    $sql      = mysqli_query($sqlConnect,$query );
    $user_id   = mysqli_insert_id($sqlConnect);
    $_SESSION['user_id'] = $user_id;
    if($sql){
        $data = array(
            'status' => 200,
            'user_id' => $user_id
        );
    }else{
        $data = array(
            'status' => 400,
        );
    }
   
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
?>