<?php

require('dbconnect.php');

if (isset($_POST['old'])){
    // $key_hash = password_hash($_POST['new'], PASSWORD_DEFAULT);

    // echo $key_hash;

    $user = $_POST['user'];
    $checkold = mysqli_query($conn, "SELECT Password FROM admin WHERE Username='$user'");
    if ($checkold){
        if (password_verify($_POST['old'], mysqli_fetch_assoc($checkold)['Password'])){
            $new = password_hash($_POST['new'], PASSWORD_DEFAULT);
            $update = mysqli_query($conn, "UPDATE admin SET Password='$new' WHERE Username='$user'");
            if ($update){
                echo "Done";
            }
            else{
                echo "Failed";
            }
        }
        else{
            echo "wrong old";
        }
    }
    else{
        echo "sql error";
    }
    
}

?>