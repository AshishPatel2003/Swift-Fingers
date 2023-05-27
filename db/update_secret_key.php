<?php

require('dbconnect.php');

if (isset($_POST['key'])){
    $key_hash = password_hash($_POST['key'], PASSWORD_DEFAULT);
    
    $update = mysqli_query($conn, "UPDATE secret SET Secret_key='$key_hash' WHERE Id=1");

    if($update){
        echo "New Key Updated";
    } else{
        echo 'Key Upation failed.';
    }

}

?>