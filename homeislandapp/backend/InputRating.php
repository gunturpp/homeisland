<?php
    include 'config.php';
      $postdata = file_get_contents("php://input");
      $id_user="";
      $id_homestay="";
      $rating="";
      $comment="";
      //$name="";
      //$phone_number="";
      //$email="";
      if (isset($postdata)) {
          $request  = json_decode($postdata);
          $id_user = $request->id_user;
          $id_homestay = $request->id_homestays;
          $rating     = $request->rating;
          $comment = $request->comment;
        //  $name= $request->name;
         // $phone_number=$request->phone_number;
          //$email=$request->email;
      }
     // $encrypt_password = md5($password);
      $sql = mysqli_query($conn,"INSERT INTO rating ( id_homestay, id_user,rating, comment)
      VALUES ('$id_homestay','$id_user', '$rating','$comment')");
  if($sql){

        //$row = mysqli_fetch_assoc($getUserSql);
        $data =array(
            'message' => "Data have been recorded",
         //   'data' => $row,
            'status' => "200"
        );
      }
      else{
        $data =array(
            'message' => "ERROR",
            'status' => "404"
        );
      }

  echo json_encode($data);
?>
