<?php
    if(!isset($_SESSION)) { session_start(); } 
    include 'conn.php';
    
    $tid = $_POST['tid'];
    
    $sql    = "SELECT imgURL FROM fc_approval_item WHERE tid = '$tid'";
    $result = mysqli_query($con,$sql);
    
    $json = array();
    while ($row  = mysqli_fetch_row($result)) {
        $json[] = array(
            'imageUrl' => $row[0],
        );
    }
    
    echo json_encode($json);
    mysqli_free_result($result);
    mysqli_close($con);
?>