<?php

    header('Access-Control-Allow-Origin; *');
    header('Access-Control-Methods; GET, POST, PUT, OPTIONS');
    header('Access-Control-Allow-Header; Content-Type');

  include 'config.php';
    //$id=$_GET['user'];
    $id = $_GET['id'];
    $query_user = mysqli_query($conn, "SELECT * FROM homestay where id_homestay = $id");

    $query_user2 = mysqli_query($conn, "SELECT COUNT(rating) as sum FROM rating where id_homestay = $id");

    $result_set2 = array();
    while($result2 =mysqli_fetch_assoc($query_user2)){
        $result_set2[]=$result2;
    }

    $result_set = array();
    while($result =mysqli_fetch_assoc($query_user)){
        $result_set[]=$result;
    }
$data =array(
    'message' => "Get Data User Succses",
    'data' => $result_set,
    'data2' => $result_set2,
    'status' => "200"
);

echo json_encode($data);
?>
