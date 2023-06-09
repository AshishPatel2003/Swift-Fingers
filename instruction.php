<?php

session_start();

if (!isset($_SESSION['Email'])) {
    echo "<script> window.location.href = 'compete.php'; </script>";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructions | Swift Fingers | Ananta</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/3.0.0/css/ionicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/darkster.css" rel="stylesheet">
    <link href="css/customStyles.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"
        integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        body {
            overflow-y: hidden;
        }

        main {
            visibility: hidden;
            margin-top: -100vh;
            opacity: 0;
            transition-duration: 2s;
        }

        #competition {
            margin: 5vw;
            padding: 3vw;
            border: 2px solid gray;
        }

        label {
            font-size: 2vw;
            font-weight: bold;
        }

        li div {
            border: 1px solid gray;
        }

        .rounds {
            width: 30%;
            margin: 2%;
        }

        .rd-title,
        .rd-head {
            display: block;
            text-align: center;
            background-color: rgb(10, 20, 30);
            color: white;
        }

        #inst-start-btn {
            text-align: center;
            visibility: hidden;
            opacity: 0;
            transition-duration: 2s;
            transition-delay: 2s;
            margin-top: -10vh;
        }

        footer {
            visibility: hidden;
            opacity: 0;
            margin-top: -100vh;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar1" data-offset="60"
style="background-image: linear-gradient(to bottom, #0a0a0a, #000000); padding-bottom: 0.9rem; min-height: 100vh;">
    <main>
        <section class="container mt-0 pb-3">
            <div class="row mt-0">
                <div class="col-12 my-auto mt-0">
                    <div class="row mb-0">
                        <h1 class="display-4 mb-3 pt-5 col-12 text-center" style="margin: 0 auto;">Instructions</h1>
                        <ul class="text-justify px-5 mx-5">
                            <li>Participants is going to have 3 rounds in total. Each round is mandatory in order to
                                compelete the competition.</li>
                            <li>In Each round, countdown will hold until you start typing.</li>
                        </ul>
                    </div>
                    <div>
                    </div>
                    <section class="container">
                        <div class="row">
                            <div class="col-12 pb-5">
                                <div class="row col-12 text-center mt-3 mx-0">
                                    <div class="col-lg-4 mb-4 px-3">
                                        <div class="card h-100">
                                            <div
                                                class="card-body d-flex flex-column justify-content-center">
                                                <h5 class="card-title text-primary mt-3">Round 1</h5>
                                                <h4 class="card-title text-primary">Speed Run</h4>
                                                <ul class="text-justify px-3 mt-4 mb-auto pb-3">
                                                    <li>Competitor have to type given context.</li>
                                                    <li>No Time limit.</li>
                                                    <li>Word limit: 50-70</li>
                                                    <li>Contest contains basic puncutation.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-4 px-3">
                                        <div class="card h-100">
                                            <div
                                                class="card-body d-flex flex-column justify-content-center">
                                                <h5 class="card-title text-primary mt-3">Round 2</h5>
                                                <h4 class="card-title text-primary">Timescapes</h4>
                                                <ul class="text-justify px-3 mt-4 mb-auto pb-3">
                                                    <li>Competitor have to type given context as much as possible in
                                                        given span
                                                        of time.</li>
                                                    <li>Time: 60sec.</li>
                                                    <li>Word limit: 50-70</li>
                                                    <li>Contest contains basic puncutation.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-4 px-3">
                                        <div class="card h-100">
                                            <div
                                                class="card-body d-flex flex-column justify-content-center">
                                                <h5 class="card-title text-primary mt-3">Round 3</h5>
                                                <h4 class="card-title text-primary">Blind Typing</h4>
                                                <ul class="text-justify px-3 mt-4 mb-auto pb-3">
                                                    <li>Competitor have to type given context as much as possible in
                                                        given span
                                                        of time.</li>
                                                    <li>Time limit: 40sec.</li>
                                                    <li>Word limit: 50-200</li>
                                                    <li>Contest contains basic puncutation.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="display-5 mt-3 pt-4 text-center">Rules and Regulations</h2>
                                <div class="row text-justify px-5">
                                    <ul class="text-justify px-5">
                                        <li>All participants must abide by the rules and regulations, and follow the
                                            instructions of the event coordinators and volunteers.</li>
                                        <li>The participant must not refresh/ close the browser while a round is
                                            ongoing as
                                            she/he would not be allowed to re-enter/ re-attempt the round. The
                                            participant
                                            would however be able to participate in the upcoming round(s) regardless
                                            and the
                                            result of the previous round will be considered as 0. </li>
                                    </ul>
                                    <div id="inst-start-btn" class="col-12 text-center">
                                        <a class="btn btn-primary pt-1 mt-1 pb-2 mx-auto" href="speedRun.php">Start</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
    <footer id="footer" class="bg-dark text-light">
        <div class="container pt-5">
            <p class="text-center pb-3">Designed by Team Ananta'22</p>
        </div>
    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <?php include('remove_disclaimer.php')?>
    <script>
        document.onload = setTimeout(function(){
            scrollTo(0,0)
            document.querySelector('body').style.overflowY = 'auto'
            document.querySelector('main').style.marginTop = '0'
            document.querySelector('main').style.visibility = 'visible'
            document.querySelector('main').style.opacity = '1'
            document.querySelector('footer').style.visibility = 'visible'
            document.querySelector('footer').style.opacity = '1'
            document.querySelector('footer').style.marginTop = '0'
            document.getElementById('inst-start-btn').style.visibility = 'visible'
            document.getElementById('inst-start-btn').style.opacity = '1'
            document.getElementById('inst-start-btn').style.marginTop = '0'
        }, 1500)
    </script>
</body>

</html>