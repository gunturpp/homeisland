<?php
    include 'config.php';
      $postdata = file_get_contents("php://input");
      $username="";
      $password="";
      $status="";
      $id="";
      if (isset($postdata)) {
          $request  = json_decode($postdata);
          $username = $request->username;
          $password = $request->password;
          $status   = $request->status;
          $id = $request->id;
      }
      $encrypt_password = md5($password);
      $sql = mysqli_query($conn,"UPDATE user set username = '$username', password = '$encrypt_password', status = '$status' where id = '$id' ");
  if($sql){
      $getUserSql=mysqli_query($conn, "SELECT * from user WHERE username='$username' AND password = '$encrypt_password'");
      if (mysqli_num_rows($getUserSql)) {
        $row = mysqli_fetch_assoc($getUserSql);
        $data =array(
            'message' => "Data Succesfully Updated",
            'data' => $row,
            'status' => "200"
        );
      }
      else{
        $data =array(
            'message' => "ERROR",
            'status' => "404"
        );
      }
  }
 else {
    $data =array(
        'message' => "ERROR",
        'status' => "404"
    );
  }
  echo json_encode($data);
?>
