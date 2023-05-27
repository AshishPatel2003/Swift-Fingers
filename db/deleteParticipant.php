<?php
require("dbconnect.php");
$id = $_GET['id'];

$deleteQuery = 'DELETE FROM participants where ID='.$id;
$deleteresult = mysqli_query($conn, $deleteQuery);

// Message ...
if ($deleteresult){
   
    echo '<script type = "text/Javascript">';
    // echo 'document.getElementById("alert").backgroundColor= "#55fa55b6"';
    // echo 'document.getElementById("alert").innerText= "Participant Deleted Successfully"';
    echo 'window.location.href="../dashboard.php"';
    // echo 'loadparticipant()';
    echo '</script>';
}
else{
    echo '<script>window.alert("Record Update Failed...");</script>';
}

exit();

?>