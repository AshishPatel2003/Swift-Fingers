<?php

require("dbconnect.php");


$email = $_POST['email'];
$vol_name = $_POST['vol_name'];

if ($_POST) {
    $select = mysqli_query($conn, "SELECT max(Id) as id FROM participants");
    $email_check = mysqli_query($conn, "SELECT * FROM participants WHERE Email='$email'");

    if (mysqli_num_rows($email_check) > 0) {
        echo "".$email."";
    } else {
        $idpart = mysqli_fetch_assoc($select)['id'] + 1;
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $university = $_POST['university'];
        $city = $_POST['city'];
        $paymenttype = $_POST['paymenttype'];
        $insert = mysqli_query($conn, "INSERT INTO participants (`Id`,`Name`, `Email`, `Phone_no`, `Gender`, `University`, `City`, `Paymenttype`, `Volunteer_name`, `Count`, `Status`, `Amount` ) VALUES ($idpart, '$name', '$email', $phone, '$gender', '$university', '$city', '$paymenttype', '$vol_name', 1, 'Remain', 30)");
        if ($insert) {
            $resultid = mysqli_query($conn, "SELECT max(Id) FROM result");
            if ($resultid){
                $id = mysqli_fetch_assoc($resultid)['max(Id)']+1;
                $resultinsert = mysqli_query($conn, "INSERT INTO result values ($id, '$email', 'Pending','Pending','Pending', '', '', '', '', '', '', '', '', 0)");
                if ($resultinsert){
                    echo "Data Inserted";
                }
                else{
                    "result Pending.";
                }
                
            }
            else{
                echo "ID Failed";
            }
            
        } else {
            echo "Failed";
        }
    }
}

?>