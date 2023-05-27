<?php
if (isset($_POST)){
    require "dbconnect.php";

    // All entries values
    $id = (int)$_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = (int)$_POST['phone'];
    $gender = $_POST['gender'];
    $university = $_POST['university'];
    $city = $_POST['city'];
    $paymentType = $_POST['paymenttype'];
    $count = (int)$_POST['count'];
    $status = $_POST['status'];
    $amount = (int)$_POST['amount'];


    $sql = "UPDATE participants SET Name='$name', Email='$email', Phone_no=$phone, Gender='$gender', University='$university', City='$city', Paymenttype='$paymentType', Count='$count', Status='$status', Amount='$amount' WHERE ID=$id";
    $updateresult = mysqli_query($conn, $sql);

    if ($updateresult) {
        echo '1';
    } else {
        echo '0';
    }
}
?>