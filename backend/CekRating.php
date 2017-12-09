<?php

    header('Access-Control-Allow-Origin; *');
    header('Access-Control-Methods; GET, POST, PUT, OPTIONS');
    header('Access-Control-Allow-Header; Content-Type');

  include 'config.php';
    //$id=$_GET['user'];
    $id = $_GET['id'];
    $query_user = mysqli_query($conn, "SELECT * FROM rating where id_user = $id");

    if (mysqli_num_rows($query_user)){

    $result_set = array();
    while($result =mysqli_fetch_assoc($query_user)){
        $result_set[]=$result;
    }
    $data =array(
        'message' => "Get Data User Succses",
        'data' => $result_set,
        'status' => "200"
    );

    }
    else {
        $result_set = array(
        'message' => "hehe"
        );
        $data = array(
        'message' => "Ga ada rating",
        'data' => $result_set,
        'status' => "404"
        );
    }
echo json_encode($data);
?>
