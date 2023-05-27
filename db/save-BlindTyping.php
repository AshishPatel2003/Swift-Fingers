<?php

require('dbconnect.php');
session_start();

function calResult($wpm, $acc){
    return ($wpm/140)*50+$acc*0.5;
}

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
                $result = mysqli_query($conn, "UPDATE result SET Status_blindtyping = 'Completed', Wpm_blindtyping = '$wpm', Acc_blindtyping = '$acc' WHERE Id=$id");
                if ($result) {
                    // echo "Inserted";
                    if ($wpm) {
                        mysqli_query($conn, "UPDATE participants SET Status='Done' WHERE Email='$email'");

                        $info = mysqli_query($conn, "SELECT * FROM result WHERE Id=$id");

                        if ($info){
                            $data = mysqli_fetch_assoc($info);
                            $averagewpm = ((double)$data['Wpm_speedrun']+(double)$data['Wpm_timescape']+(double)$data['Wpm_blindtyping'])/3;
                            $averageacc = ((double)$data['Acc_speedrun']+(double)$data['Acc_timescape']+(double)$data['Acc_blindtyping'])/3;
                            echo $averagewpm." ".$averageacc;
                            $result = round(calResult($averagewpm, $averageacc), 6);

                            $resultinsert = mysqli_query($conn, "UPDATE result SET Avg_wpm = '$averagewpm', Avg_acc = '$averageacc', Result=$result WHERE Id = $id");

                            $_SESSION['id'] = $id;
                        }
                    }
                } else {
                    echo "Failed";
                }
            }
        }
    } else {
        echo "Not registered";
    }

}
