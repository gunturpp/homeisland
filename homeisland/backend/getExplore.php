<?php

    header('Access-Control-Allow-Origin; *');
    header('Access-Control-Methods; GET, POST, PUT, OPTIONS');
    header('Access-Control-Allow-Header; Content-Type');

  include 'config.php';
    $nama_kabupaten=$_GET['nama_kabupaten'];


    $query_user = mysqli_query($conn, "SELECT * FROM explore Where nama_kabupaten = '$nama_kabupaten'");


    $result_set = array();
    while($result =mysqli_fetch_assoc($query_user)){
        $result_set[]=$result;
    }
$data =array(
    'message' => "Get Data User Succses",
    'data' => $result_set,
    'status' => "200",
    'nama_kabupaten' => $nama_kabupaten
);

echo json_encode($data);
?>
