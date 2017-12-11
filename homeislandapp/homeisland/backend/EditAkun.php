<?php

    header('Access-Control-Allow-Origin; *');
    header('Access-Control-Methods; GET, POST, PUT, OPTIONS');
    header('Access-Control-Allow-Header; Content-Type');
  include 'config.php';

  $postdata = file_get_contents("php://input");
  $nama = "";
  $username="";
  $hp="";
  $password = "";

  $id=$_GET['id'];
    if (isset($postdata)) {
        $request  = json_decode($postdata);
        $username = $request->username;
        $password = $request->password;
        $nama = $request->nama;
        $hp = $request->hp;
        $status   = $request->status;
    }
    $encrypt_password = base64_encode($password);
    $sql = mysqli_query($conn, "UPDATE user SET nama = '$nama', hp = '$hp', password = '$encrypt_password' WHERE id ='$id'");

    echo json_encode($data);
?>
