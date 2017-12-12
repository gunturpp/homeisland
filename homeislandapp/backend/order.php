<?php
    include 'config.php';
      $postdata = file_get_contents("php://input");
      $namauser="";
      $namahomestay="";
      $iduser="";
      $idhomestay="";
      $durasiNginap="";
      $sumkamar="";
      $checkin="";
      $hargakamar="";
      //$name="";
      //$phone_number="";
      //$email="";
      if (isset($postdata)) {
          $request  = json_decode($postdata);
          $namauser = $request->nama_user;
          $namahomestay = $request->nama_homestay;
          $iduser     = $request->id_user;
          $idhomestay = $request->id_homestays;
          $durasiNginap= $request -> durasi_nginap;
          $sumkamar= $request -> sumkamar;
          $checkin= $request -> checkin;
          $hargakamar= $request -> harga;
        //  $name= $request->name;
         // $phone_number=$request->phone_number;
          //$email=$request->email;
      }
     // $encrypt_password = md5($password);
      $total = $hargakamar * $sumkamar * $durasiNginap;

      $sql = mysqli_query($conn,"INSERT INTO orderhomestay ( id_homestay, id_user,nama_homestay, nama_pemesan, tgl, harimenginap, sumkamar, totalharga)
      VALUES ('$idhomestay','$iduser', '$namahomestay','$namauser','$checkin','$durasiNginap','$sumkamar','$total')");
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
