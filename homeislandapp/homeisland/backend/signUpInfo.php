<?php
    include 'config.php';
      $postdata = file_get_contents("php://input");
      $nama = "";
      $username="";
      $password="";
      $status="";
      $email="";
      $hp="";
      $kelamin = "";
      
      //$name="";
      //$phone_number="";
      //$email="";
      if (isset($postdata)) {
          $request  = json_decode($postdata);
          $nama= $request->nama;
          $username = $request->username;
          $password = $request->password;
          $status     = $request->status;
          $email = $request->email;
          $kelamin = $request->kelamin;
          $hp = $request->hp;

        //  $name= $request->name;
         // $phone_number=$request->phone_number;
          //$email=$request->email;
      }
      $encrypt_password = md5($password);
      $sql = mysqli_query($conn,"INSERT INTO user (nama, username, kelamin, email, hp, password, status)
      VALUES ('$nama', '$username', '$kelamin', '$email', '$hp','$encrypt_password', '$status')");
  if($sql){
      $getUserSql=mysqli_query($conn, "SELECT * from user WHERE username='$username' AND password = '$encrypt_password'");
      if (mysqli_num_rows($getUserSql)) {
        $row = mysqli_fetch_assoc($getUserSql);
        $data =array(
            'message' => "Data have been recorded",
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
