<?php

    header('Access-Control-Allow-Origin; *');
    header('Access-Control-Methods; GET, POST, PUT, OPTIONS');
    header('Access-Control-Allow-Header; Content-Type');

  include 'config.php';
    //$id=$_GET['user'];
    $name_homestay = $_GET['namahome'];
    $kuota = $_GET['kuota'];
 //   $query_user = mysqli_query($conn, "SELECT * FROM homestay where kuota >= $kuota AND alamat LIKE '%$name_homestay%'");
    $query_user = mysqli_query($conn, "select a.harga,a.foto1,a.Nama_homestay,a.id_homestay, round(AVG(b.rating),0) as rate, COUNT(b.rating) as sumrate from homestay a LEFT JOIN rating b ON b.id_homestay = a.id_homestay WHERE kuota >= $kuota AND alamat like '%$name_homestay%' GROUP by b.id_homestay,a.Nama_homestay");
//    $query_user2 = mysqli_query($conn, "SELECT * FROM homestay where kuota >= $kuota AND alamat LIKE '%$name_homestay%'");
    
  //  $duitduit =  mysqli_fetch_assoc($query_user2);

    //$duit = number_format($duitduit['harga'], 0, '', '.');

    $result_set = array();
    while($result =mysqli_fetch_assoc($query_user)){
        $result_set[]=$result;
    }
$data =array(
    'message' => "Get Data User Succses",
    'data' => $result_set,
   // 'duit' => $duit,
    'status' => "200"
);

echo json_encode($data);
?>
