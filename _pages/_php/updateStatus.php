<?php
    if(!isset($_SESSION)) { session_start(); } 
    include 'conn.php';
    
    $username = $_SESSION['username'];
    $status   = $_POST['status'];
    $id       = $_POST['id'];
    
    $query = "UPDATE fc_approval SET status=?,updatedBy=(SELECT id FROM fc_registration WHERE username=?),dateUpdated=? WHERE id=?";
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt,"ssss",$status,$username,$global_date,$id);
        mysqli_stmt_execute($stmt);
        
        if ($status == "Approved") {
            $query = "UPDATE fc_registration SET isVerified = 1 WHERE walletID = (SELECT walletID from fc_approval WHERE id = ?)";
            if ($stmt = mysqli_prepare($con, $query)) {
                mysqli_stmt_bind_param($stmt,"s",$id);
                mysqli_stmt_execute($stmt);
                
                $query = "UPDATE fc_registration SET firstName = (SELECT fName from fc_approval WHERE id = ?),
                lastName = (SELECT lName from fc_approval WHERE id = ?) WHERE walletID = (SELECT walletID from fc_approval WHERE id = ?)";
                if ($stmt = mysqli_prepare($con, $query)) {
                    mysqli_stmt_bind_param($stmt,"sss",$id,$id,$id);
                    mysqli_stmt_execute($stmt);
                    
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } else {
            echo 1;
        }
    } else {
        echo 0;
    }
    mysqli_close($con);
?>