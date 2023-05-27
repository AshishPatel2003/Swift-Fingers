<?php

if(isset($_POST)){
    require_once('dbconnect.php');

    $username = $_POST['username'];

    $admin = mysqli_query($conn, "SELECT * FROM admin WHERE Username = '$username'");

    if (mysqli_num_rows($admin) > 0) {
        $row = mysqli_fetch_assoc($admin);
        if (password_verify($_POST['password'], $row['Password'])) {
            session_start();
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Username'] = $row['Username'];
            echo "Admin";
        } else {
            echo "Invalid Password";
        }
    } else {
        echo "Invalid User";
        // echo password_hash($_POST['password'], PASSWORD_DEFAULT);
        // $participant = mysqli_query($conn, "SELECT * FROM participants WHERE Email='$username'");
        // if (mysqli_num_rows($participant)!= false) {
        //     $row = mysqli_fetch_assoc($participant);
        //     if ($_POST['password']=="eic,dk38") {
        //         session_start();
        //         $_SESSION['Name'] = $row['Name'];
        //         $_SESSION['Username'] = $row['Email'];
        //         echo "Participant";
        //     } else {
        //         echo "Invalid Password";
        //     }
        // } else {
        //     echo "Invalid user";
        // }
    }
}
else{
    "4004 Error";
}
?>
