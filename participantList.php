<?php

session_start();

if (!isset($_SESSION['Username'])) {
?>
    <script>
        window.location.href = "login.php";
    </script> <?php
            }
            require("db/dbconnect.php");
            $sqlQuery = 'SELECT * FROM participants';
            $dataresult = mysqli_query($conn, $sqlQuery);
                ?>

<script>

    function loadEdit(participantId) {
        $.ajax({
            url: `editParticipant.php?id=${participantId}`,
            type: "POST",
            data: {},
            success: function(registerform) {
                $('#flexcont').html(registerform);
            }
        });
    }
    

    

</script>

<div style="padding-bottom: 0.9rem;">
    <section class="container mt-0">
        <div class="row mt-0">
            <div class="col-12 my-auto mt-0">
                <div class="row text-center mt-0" id="registrationform-container">
                    <div tabindex="-1" style="margin: auto; width: 75%; min-width: 300px; background-color: rgba(0,0,0.8);" class="mt-5">
                        <table id='participantTable' class='table table-bordered table-striped text-white pb-0 mb-0'>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if ($dataresult->num_rows > 0) {

                                    while ($row = $dataresult->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['ID']; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td><?php echo $row['Phone_no']; ?></td>
                                            <td>
                                                
                                                <a onclick="loadEdit(<?php echo $row['ID']; ?>)">
                                                    <i style=" padding:5px; font-size:40px;" class="fas fa-edit"></i>
                                                </a>
                                                <a href="db/deleteParticipant.php?id=<?php echo $row["ID"]; ?>" onclick="return confirm('Are you sure want to delete this record?')">
                                                    <i id="deleteicon" style="color:red;padding:5px; font-size:40px;" class="fa fa-trash"></i>
                                                </a>
                                            </td>


                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td justify 0kl;9io= 'center' colspan = '6'> No Record Found</td></td>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    // $(document).ready(function(){
        $('#participantTable').DataTable();
    // });
</script>