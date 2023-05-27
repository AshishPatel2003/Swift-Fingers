<?php

session_start();
require "db/dbconnect.php";

if (!isset($_SESSION['Username'])) {
?><script>
        window.location.href = "login.php";
    </script><?php
            } else {
                $allparticipants = mysqli_query($conn, "SELECT COUNT(*) FROM participants");
                $participated = mysqli_query($conn, "SELECT COUNT(*) FROM participants WHERE Status='Done'");
                $resultrecord = mysqli_query($conn, "SELECT COUNT(*) FROM result");

                $fundssql = mysqli_query($conn, "SELECT Amount FROM participants");

                $total_par = mysqli_fetch_assoc($allparticipants)['COUNT(*)'];
                $par_done = mysqli_fetch_assoc($participated)['COUNT(*)'];
                $registrations = mysqli_fetch_assoc($resultrecord)['COUNT(*)'];

                $funds = 0;
                if (mysqli_num_rows($fundssql) > 0) {
                    while ($row = mysqli_fetch_assoc($fundssql)) {
                        $funds += $row['Amount'];
                    }
                }


                // Winner
                $scoresql = mysqli_query($conn, "SELECT Email, Avg_wpm, Avg_acc FROM result ORDER BY Result DESC");
                if ($scoresql) {

                    // First Winner
                    $row = mysqli_fetch_assoc($scoresql);
                    $first_email = $row['Email'];

                    $firstname_sql = mysqli_query($conn, "SELECT Name FROM participants WHERE Email='$first_email'");
                    if ($firstname_sql) {
                        $first_name = mysqli_fetch_assoc($firstname_sql)['Name'];

                        $first_wpm = round($row['Avg_wpm']);
                        $first_acc = round($row['Avg_acc'], 1);
                    }

                    // Second Winner
                    $row = mysqli_fetch_assoc($scoresql);
                    $second_email = $row['Email'];

                    $secondname_sql = mysqli_query($conn, "SELECT Name FROM participants WHERE Email='$second_email'");
                    if ($secondname_sql) {
                        $second_name = mysqli_fetch_assoc($secondname_sql)['Name'];

                        $second_wpm = round($row['Avg_wpm']);
                        $second_acc = round($row['Avg_acc'], 1);
                    }
                }
            }

                ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Statistics | Swift Fingers | Ananta'22</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('links.php') ?>
    
    <style>
        div {
            color: #111111;
        }
    </style>
</head>


<body>

    <script>
        function loadupdatepass() {
            $.ajax({
                url: "password_change.php",
                type: "POST",
                success: function(registerform) {
                    $('#flexcont').html(registerform);
                }
            });
        }

        function loadregister() {
            $.ajax({
                url: "register.php",
                type: "POST",
                data: {},
                success: function(registerform) {
                    $('#flexcont').html(registerform);
                }
            });
        }

        function loadsecret() {
            $.ajax({
                url: "secret_key.php",
                type: "POST",
                success: function(registerform) {
                    $('#flexcont').html(registerform);
                }
            });
        }

        function loadscore() {
            $.ajax({
                url: "Scoreboard.php",
                type: "POST",
                success: function(scoredata) {
                    $('#flexcont').html(registerform);
                }
            });
        }

        function loadparticipants() {
            $.ajax({
                url: "participantList.php",
                type: "POST",
                success: function(registerform) {
                    $('#flexcont').html(registerform);
                }
            });
        }

        
    </script>

    <div class="sidebar active">
        <div class="logo-details">
            <a class="logo-name" href="index.php">SF</a>
        </div>
        <ul class="nav-links">
            <li><a href="dashboard.php"><i class='bx bx-grid-alt'></i><span class="links_name">Statistics</span></a>
            </li>
            <li><a onclick="loadregister()"><i class='bx bx-user'></i><span class="links_name">Register</span></a>
            </li>
            <li><a onclick="loadsecret()"><i class='bx bxs-key'></i><span class="links_name">Secret Key</span></a>
            </li>
            <li><a onclick="loadscore()"><i class='bx bx-walk'></i><span class="links_name">Scoreboard</span></a>
            </li>
            <li><a onclick="loadupdatepass()"><i class='bx bxs-lock'></i><span class="links_name">Password</span></a>
            </li>
            <li><a onclick="loadparticipants()"><i class='bx bxs-lock'></i><span class="links_name">Participants</span></a>
            </li>

            <!--<li onmouseover="ParticipantToggle()" onmouseout="ParticipantToggle()">-->
            <!--    <button><i class='bx bx-grid-alt'></i>Participant</button>-->
            <!--    <ul class="ParticipantMenu d-none">-->
            <!--        <li><a href="ParticipantInfo.html"><i class='bx bx-user'></i><span class="links_name">Information</span></a></li>-->
            <!--        <li><a href="ParticipantResult.html"><i class='bx bx-walk'></i><span class="links_name">Result</span></a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            <li class="log_out"><a href="logout.php"><i class='bx bx-log-out'></i><span class="links_name">Log
                        out</span></a></li>
        </ul>
    </div>

    <section class="registrations" style="text-align: center;">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="profile-details">
                <img src="https://img.icons8.com/bubbles/500/000000/system-administrator-female.png" alt="" />
                <span class="name"><?php echo $_SESSION['Name']; ?></span>
            </div>
        </nav>
        <div id="alert" style="width: max-content; right:5vh; top: 5vh;
     padding: 1vh; position: fixed; z-index:999; color:black"></div>

        <div class="registrationGlance" id="flexcont">
            <div>
                <h1>Statistics</h1>
                <div class="overview-boxes">
                    <div class="box">
                        <div class="right-side d-flex flex-column">
                            <div class="box-topic">
                                <h2>Registrations</h2>
                            </div>
                            <img src="https://img.icons8.com/bubbles/250/000000/domain.png" alt="" />
                            <div class="number"><?php echo $registrations ?></div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="right-side d-flex flex-column">
                            <div class="box-topic">
                                <h2>Participation</h2>
                            </div>
                            <img src="https://img.icons8.com/bubbles/250/000000/test-account.png" alt="" />
                            <div class="number"><?php echo $par_done ?></div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="right-side d-flex flex-column">
                            <div class="box-topic">
                                <h2>Income Generated</h2>
                            </div>
                            <img src="https://img.icons8.com/bubbles/250/000000/receive-cash.png" alt="" />
                            <div class="number"><?php echo $funds ?></div>
                        </div>
                    </div>
                    <?php
                    if (isset($first_name)) {
                    ?>
                        <div class="box">
                            <div class="right-side d-flex flex-column text-center">
                                <div class="box-topic">
                                    <h2>Highest Score</h2>
                                </div>
                                <div class="display-4">First Rank</div>
                                <label><?php echo $first_name; ?></label>
                                <label><?php echo $first_wpm; ?>wpm, <?php echo $first_acc; ?>% acc</label>
                                <br>

                                <?php

                                if (isset($second_name)) {
                                ?>

                                    <div class="display-5">Second Rank</div>
                                    <label><?php echo $second_name; ?></label>
                                    <label><?php echo $second_wpm; ?>wpm, <?php echo $second_acc; ?>% acc</label>



                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>

    </section>




    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                sidebar.style.paddingTop = "5vh"
                document.querySelector(".logo-name").style.fontSize = "200%";
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                sidebar.style.paddingTop = "2.5vh"
                document.querySelector(".logo-name").style.fontSize = "300%";
            }
        }
    </script>
    <script>
        function ParticipantToggle() {
            document.getElementsByClassName('ParticipantMenu')[0].classList.toggle('d-none')
            document.getElementsByClassName('ParticipantMenu')[0].classList.toggle('d-block')
        }
    </script>
    <?php include('remove_disclaimer.php') ?>
</body>

</html>