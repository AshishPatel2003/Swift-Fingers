<?php

require('dbconnect.php');
session_start();

if (isset($_SESSION)) {
    $email = $_SESSION['Email'];

    $participantCheck = mysqli_query($conn, "SELECT Status FROM participants WHERE Email='$email'");

    if (mysqli_num_rows($participantCheck) > 0) {
        if (mysqli_fetch_assoc($participantCheck)['Status'] == 'Done') {
            echo "Needs Registration Again";
        } else {
            $wpm = $_POST['wpm'];
            $acc = $_POST['acc'];
            $maxid = mysqli_query($conn, "SELECT max(id) as id FROM result WHERE Email='$email'");

            if (mysqli_num_rows($maxid) > 0) {
                $id = mysqli_fetch_assoc($maxid)['id'];
                $result = mysqli_query($conn, "UPDATE result SET Status_timescape = 'Completed', Wpm_timescape = '$wpm', Acc_timescape = '$acc' WHERE Id=$id");
                if ($result) {
                    echo "Inserted";
                } else {
                    echo "Failed";
                }
            }
        }
    } else {
        echo "Not registered";
    }
}
