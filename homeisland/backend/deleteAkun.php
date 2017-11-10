<?php
    include 'config.php';
      $postdata = file_get_contents("php://input");
    
      $id="";
      if (isset($postdata)) {
          $request  = json_decode($postdata);
         
          $id = $request->id;
      }
     
      $sql = mysqli_query($conn,"DELETE from user where id = '$id' ");
  if($sql){
     
      
        $data =array(
            'message' => "Data Succesfully Deleted",
            //'data' => $row,
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
