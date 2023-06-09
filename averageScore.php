<?php 

session_start();
require "db/dbconnect.php";

if (!isset($_SESSION['Email'])) {
  echo "<script> window.location.href = 'compete.php'; </script>";
} else {
  $email = $_SESSION['Email'];

  $participantCheck = mysqli_query($conn, "SELECT * FROM participants WHERE Email='$email'");

  if (mysqli_num_rows($participantCheck) > 0) {
    if (mysqli_fetch_assoc($participantCheck)['Status'] == 'Done') {
    //   echo "<script> window.location.href = 'compete.php'; </script>";
    // } else {
      $maxid = mysqli_query($conn, "SELECT max(id) as id FROM result WHERE Email='$email'");

      if (mysqli_num_rows($maxid) > 0) {
        $id = mysqli_fetch_assoc($maxid)['id'];
        $result = mysqli_query($conn, "SELECT * FROM result WHERE Id=$id");
        if ($result) {
          if (mysqli_num_rows($result) > 0) {
              $checkstatus = mysqli_fetch_assoc($result);
            if ($checkstatus['Status_speedrun'] == 'Completed') {
                if ($checkstatus['Status_timescape'] == 'Completed') {
                    if ($checkstatus['Status_speedrun'] == 'Completed') {
                        ?>
                        <script>
                            console.log("Show Result");
                        </script>
                        <?php
                        $speedrun_wpm = $checkstatus['Wpm_speedrun'];
                        $speedrun_acc = $checkstatus['Acc_speedrun'];
                        
                        $timescape_wpm = $checkstatus['Wpm_timescape'];
                        $timescape_acc = $checkstatus['Acc_timescape'];
                        
                        $blindtyping_wpm = $checkstatus['Wpm_blindtyping'];
                        $blindtyping_acc = $checkstatus['Acc_blindtyping'];
                        
                        $avg_wpm = $checkstatus['Avg_wpm'];
                        $avg_acc = $checkstatus['Avg_acc'];
                        
                    } else {
                        echo "<script> window.location.href = 'speedRun.php'; </script>";
                    }
                } else {
                    echo "<script> window.location.href = 'speedRun.php'; </script>";
                }
            } else {
                echo "<script> window.location.href = 'speedRun.php'; </script>";
            }
          }
        }
      }
    }
  }
}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result | Swift Fingers | Ananta</title>
    <?php include('links.php'); ?>
    <style>
        body {
            overflow-y: hidden;
        }

        header {
            background-image: url('img/bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center top;
            width: 100vw;
        }

        .title {
            padding-top: 25vh;
            transform: translateX(50%,0);
            font-size: 200%;
            transition-duration: 2s;
            padding-left: 25vw;
            padding-right: 25vw;
            display: flex;
            height: auto;
            align-items: center;
            z-index: 999;
            position: absolute;
            top: 0;
            left: 0;
            padding: 1rem;
            animation: fadeIn 2s linear;
            position: fixed;
            top: 0;
            background-color: #111111;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }
        }

        .title>div {
            transition-duration: 2s;
        }

        .title>div>h1>span {
            font-size: 200%;
        }

        .title>div>h1:last-child {
            font-size: 120%;
            font-weight: 900;
            transition-duration: 2s;
        }


        main {
            visibility: hidden;
            opacity: 0;
            padding-top: 100vh;
            transition-duration: 2s;
            width: 100vw;
            scroll-behavior: smooth;
        }

        .content span {
            visibility: hidden;
            opacity: 0;
        }

        .nxt {
            visibility: hidden;
            opacity: 0;
            transition-delay: 7s;
            transition-duration: 2s;
        }

        @keyframes blink {
            50% {
                border-bottom: none;
            }
        }

        .round3,
        .round2,
        .round1,
        .average {
            padding: 5vh;
            width: 30%;
            /* border: 1px solid #b5f4df; */
            border-radius: 5vh;
            /* box-shadow: 0px 0px 10px 2px #b5f4df; */
            font-weight: 900;
            color: #755700;
            background-color: #9f7804;
            background: radial-gradient(#ffee35, #9f7804);
            visibility: hidden;
            opacity: 0;
            transition-duration: 2s;
        }


        .average {
            color: #004680;
            background-color: #0985eb8d;
            background: radial-gradient(#00e5ff, #0985eb8d);
            font-size: 150%;
            transition-delay: 5s;
        }

        .round3 label,
        .round2 label,
        .round1 label {
            font-size: 150%;
        }

        .round3 label span,
        .round2 label span,
        .round1 label span,
        .average label span {
            color: #584200;
            font-weight: 900;
            visibility: visible;
            opacity: 1;
        }

        .average label span {
            color: #004680;
        }

        .result_icon {
            font-size: 30vh;
        }

        .symbol {
            transition-duration: 2s;
            transition-delay: 3s;
            visibility: hidden;
            opacity: 0;
        }

        footer {
            position: relative;
        }

        @media screen and (max-width: 950px) {
            .content {
                flex-direction: column;
            }

            .content div {
                width: 75%;
                padding: 0;
                margin-bottom: 5vh;
            }
        }

        @media screen and (max-width: 400px) {
            .content {
                flex-direction: column;
            }

            .content div {
                width: 100%;
            }
        }
    </style>
    <style>
        .round1 h1,
        .round2 h1,
        .round3 h1,
        .average h1 {
            margin: 2rem auto;
        }

        .round1 h1 span,
        .round2 h1 span,
        .round3 h1 span {
            color: #584200;
            visibility: visible;
            opacity: 1;
        }

        .average h1 span {
            color: #004680;
            visibility: visible;
            opacity: 1;
            transform: scale(0);
            transition-duration: 1s;
        }

        .average h1 span:first-child {
            transform: rotate(-60deg);
        }

        .average h1 span:last-child {
            transform: rotate(60deg);
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar1" data-offset="60"
    style="background-image: linear-gradient(to bottom, #101010, #000000);">
    <div class="title col-12 justify-content-center align-items-center">
        <img src="img/logo.png" alt="Swift Fingers Logo" style="width: 3.5rem" />
        <div class="d-flex" style="align-items: center">
            <h1 class="px-2 mb-0">Swift Fingers</h1>
        </div>
    </div>
    <main
        style="background-image: linear-gradient(to bottom, #101010, #000000); padding-bottom: 0.9rem; min-height: 100vh;">
        <section class="container mt-0 py-5">
            <div class="row mt-0 py-5">
                <div class="col-12 my-auto mt-0 pt-5">
                    <div class="row text-center mt-0">
                        <div class="wrapper">
                            <div class="content-box">
                                <div class="content mx-auto" style="width: 80%; border-bottom: none;">

                                    <div class="round1 d-flex align-items-center flex-column">
                                        <h2 style="font-weight: 900; font-size: 100%;">Round 1</h2>
                                        <h2 class="mb-3" style="font-weight: 900; font-size: 200%;">Speed Run</h2>
                                        <h1 class="display-2"><span style="font-size: 10rem"
                                                class="ion ion-md-speedometer"></span>
                                        </h1>
                                        <label class="mb-0 text-center col-12"><span><?php echo round($speedrun_wpm);?></span> wpm</label>
                                        <label class="mb-0 text-center col-12"><span><?php echo round($speedrun_acc);?>%</span> accuracy</label>
                                    </div>
                                    <span style="font-size: 200%" class="symbol">+</span>

                                    <div class="round2 d-flex align-items-center flex-column">
                                        <h2 style="font-weight: 900; font-size: 100%;">Round 2</h2>
                                        <h2 class="mb-3" style="font-weight: 900; font-size: 200%;">Timescape</h2>
                                        <h1 class="display-2"><span style="font-size: 10rem"
                                                class="ion ion-md-stopwatch"></span>
                                        </h1>
                                        <label class="mb-0 text-center col-12"><span><?php echo round($timescape_wpm);?></span> wpm</label>
                                        <label class="mb-0 text-center col-12"><span><?php echo round($timescape_acc);?>%</span> accuracy</label>
                                    </div>
                                    <span style="font-size: 200%" class="symbol">+</span>

                                    <div class="round3 d-flex align-items-center flex-column">
                                        <h2 style="font-weight: 900; font-size: 100%;">Round 3</h2>
                                        <h2 class="mb-3" style="font-weight: 900; font-size: 200%;">Blind Typing</h2>
                                        <h1 class="display-2"><span style="font-size: 10rem"
                                                class="ion ion-md-eye-off"></span>
                                        </h1>
                                        <label class="mb-0 text-center col-12"><span><?php echo round($blindtyping_wpm);?></span> wpm</label>
                                        <label class="mb-0 text-center col-12"><span><?php echo round($blindtyping_acc);?>%</span> accuracy</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span style="font-size: 200%" class="symbol col-12 text-center">||</span>
                        <div class="wrapper">
                            <div class="content-box">
                                <div class="content col-12 justify-content-center" style="border-bottom: none;">
                                    <div class="average d-flex align-items-center flex-column">
                                        <h2 style="font-weight: 900; font-size: 120%;">Average</h2>
                                        <h1 class="display-2 d-flex col-12 mt-0" style="justify-content: space-evenly;">
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                        </h1>
                                        <label class="mb-0 text-center col-12"><span><?php echo round($avg_wpm);?></span> wpm</label>
                                        <label class="mb-0 text-center col-12"><span><?php echo round($avg_acc);?>%</span> accuracy</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center nxt">
                        <a class="btn btn-primary" onclick="logout()">Finish</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer id="footer" class="bg-dark text-light">
        <div class="container">
            <p class="text-center pb-3">Designed by Team Ananta'22</p>
        </div>
    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function logout(){
        window.location.href = 'logout.php';
        
    }
        document.onload = setTimeout(function () {
            scrollTo(0, 0)
            document.querySelector('body').style.overflowY = 'auto'
            document.querySelector('main').style.visibility = 'visible'
            document.querySelector('main').style.opacity = '1'
            document.querySelector('main').style.top = '0'
            document.querySelector('main').style.paddingTop = '2.5rem'
            document.querySelector('footer').style.visibility = 'visible'
            document.querySelector('footer').style.opacity = '1'
            document.querySelector('.nxt').style.visibility = 'visible'
            document.querySelector('.nxt').style.opacity = '1'
            document.querySelector('.round1').style.visibility = 'visible'
            document.querySelector('.round1').style.opacity = '1'
            document.querySelector('.round2').style.visibility = 'visible'
            document.querySelector('.round2').style.opacity = '1'
            document.querySelector('.round3').style.visibility = 'visible'
            document.querySelector('.round3').style.opacity = '1'
            document.querySelectorAll('.symbol').forEach(element => {
                element.style.visibility = 'visible'
                element.style.opacity = '1'
            });
            setTimeout(function () {
                scrollTo(0, document.body.scrollHeight);
            }, 5000)
            document.querySelector('.average').style.visibility = 'visible'

            document.querySelector('.average').style.opacity = '1'
            document.querySelectorAll('.average h1 span').forEach(element => {
                setTimeout(function () {
                    element.style.transform = 'scale(200%)'
                }, 5000)
                setTimeout(function () {
                    element.style.transform = 'scale(100%)'
                }, 5000)
            })
        }, 1500)
    </script>
    <?php include('remove_disclaimer.php')?>
</body>

</html>