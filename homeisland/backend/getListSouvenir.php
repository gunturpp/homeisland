<?php

    header('Access-Control-Allow-Origin; *');
    header('Access-Control-Methods; GET, POST, PUT, OPTIONS');
    header('Access-Control-Allow-Header; Content-Type');

  include 'config.php';
    $user_latitude=$_GET['user_latitude'];
    $user_longitude=$_GET['user_longitude'];


    $query_user = mysqli_query($conn, "SELECT id_souvenir, nama_toko, foto, alamat, 
    (6371 * acos(cos(radians($user_latitude)) 
    * cos(radians(latitude)) * cos(radians(longitude) 
    - radians($user_longitude)) + sin(radians($user_latitude)) 
    * sin(radians(latitude)))) AS jarak 
    FROM souvenir    
    HAVING jarak < 25 ORDER BY jarak;");


    $result_set = array();
    while($result =mysqli_fetch_assoc($query_user)){
        $result_set[]=$result;
    }
$data =array(
    'message' => "Get Data User Succses",
    'data' => $result_set,
    'status' => "200",
);

echo json_encode($data);



?>
