<?php

    header('Access-Control-Allow-Origin; *');
    header('Access-Control-Methods; GET, POST, PUT, OPTIONS');
    header('Access-Control-Allow-Header; Content-Type');

  include 'config.php';
    $nama_toko=$_GET['nama_toko'];


    $query_user = mysqli_query($conn, "SELECT * FROM souvenir Where nama_toko = '$nama_toko'");


    $result_set = array();
    while($result =mysqli_fetch_assoc($query_user)){
        $result_set[]=$result;
    }
$data =array(
    'message' => "Get Data User Succses",
    'data' => $result_set,
    'status' => "200",
    'nama_wisata' => $nama_toko
);

echo json_encode($data);

?>
