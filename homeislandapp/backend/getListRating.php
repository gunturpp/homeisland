<?php

    header('Access-Control-Allow-Origin; *');
    header('Access-Control-Methods; GET, POST, PUT, OPTIONS');
    header('Access-Control-Allow-Header; Content-Type');

  include 'config.php';
    $id=$_GET['id'];
    $query_user = mysqli_query($conn, "SELECT * FROM rating INNER JOIN user WHERE rating.id_user = user.id AND rating.id_homestay = $id ORDER BY rating.id_rating DESC" );

    $result_set = array();
    while($result =mysqli_fetch_assoc($query_user)){
        $result_set[]=$result;
    }
$data =array(
    'message' => "Get Data User Succses",
    'data' => $result_set,
    'status' => "200"
);

echo json_encode($data);
?>
