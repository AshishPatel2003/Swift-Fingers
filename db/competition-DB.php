<?php

require "dbconnect.php";

$email = $_POST['par_email'];
$participant = mysqli_query($conn, "SELECT * FROM participants WHERE Email='$email'");
$secret = mysqli_query($conn, "SELECT Secret_key FROM secret");
if (mysqli_num_rows($participant) != false) {
    $row = mysqli_fetch_assoc($participant);
    if ($row['Status'] == "Remain") {
        $secret_key = mysqli_fetch_assoc($secret);
        $verify = password_verify($_POST['key'], $secret_key['Secret_key']);
        if ($verify) {
            session_start();
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Email'] = $row['Email'];
            echo "Participant";
        } else {
            echo "Invalid Password";
        }
    }
    else{
        echo "Done Already";
    }
} else {
    echo "Not Exist";
}
