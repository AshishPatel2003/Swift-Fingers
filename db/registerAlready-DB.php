<?php

require("dbconnect.php");

$email = $_POST['email'];
$vol_name = $_POST['vol_name'];

if ($_POST) {
    $select = mysqli_query($conn, "SELECT * FROM participants");
    // $volunteer_check = mysqli_query($conn, "SELECT * FROM volunteers WHERE Vname='$vol_name'");
    $email_check = mysqli_query($conn, "SELECT * FROM participants WHERE Email='$email'");

    // if (!password_verify($_POST['vol_password'], mysqli_fetch_assoc($volunteer_check)['Vpassword'])) {
    //     echo "Password Wrong";
    // } else {
        if (mysqli_num_rows($email_check) > 0) {
            $row = mysqli_fetch_assoc($email_check);
            if ($row['Status'] == 'Done') {
                $amount = $row['Amount'] + (int)$_POST['amount'];
                $count = $row['Count'] + 1;
                $update = mysqli_query($conn, "UPDATE participants SET Status='Remain', Amount=$amount, Count=$count WHERE Email='$email'");
                if ($update) {
                    $selectid = mysqli_query($conn, "SELECT max(Id) FROM result");
                    if ($selectid){
                        $id = mysqli_fetch_assoc($selectid)['max(Id)']+1;
                        $resultinsert = mysqli_query($conn, "INSERT INTO result VALUES ($id, '$email', 'Pending','Pending','Pending', '', '', '', '', '', '', '', '', 0)");
                        if ($resultinsert){
                        echo "Participant";
                        echo $count;
                        }
                        else{
                            echo "result failed";
                        }
                    }else{
                        echo "Failed to fetch id.";
                    }
                    
                } else {
                    echo "Failed";
                }
            } else {
                echo "Already Registered";
            }
        } else {
            echo "Not Registered";
        }
    // }
}
