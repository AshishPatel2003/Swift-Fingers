<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speed Run Score | Swift Fingers | Ananta</title>
    <link rel="icon" href="http://themes.guide/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://themes.guide/favicon.ico" type="image/x-icon" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/3.0.0/css/ionicons.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link href="css/darkster.css" rel="stylesheet">
    <link href="css/customStyles.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"
        integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
            /* position: absolute;   */
            padding-top: 25vh;
            transform: translateX(50%, 0);
            font-size: 200%;
            /* height: 100vh; */
            transition-duration: 2s;
            padding-left: 25vw;
            padding-right: 25vw;
            display: flex;
            height: auto;
            align-items: center;
            background-color: rgba(0, 0, 0, 0);
            z-index: 999;
            position: absolute;
            top: 0;
            left: 0;
            padding: 1rem;
            animation: fadeIn 2s linear;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            50% { opacity: 1; }
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
        }

        .nxt {
            visibility: hidden;
            opacity: 0;
            transition-delay: 2s;
            transition-duration: 2s;
        }

        .content-box .content {
            border-bottom: 0;
        }

        .typing-text p div {
            padding-bottom: 0;
            margin-bottom: 20px;
            height: 6vh;
        }

        .typing-text p div.correct {
            background: none;
        }

        .typing-text p div.correct span {
            color: #09eba0;
        }

        .typing-text p div.incorrect {
            border-bottom: 2px solid #ffa3a3c2;
            background: none;
            font-weight: 550;
        }

        .typing-text p div.incorrect span {
            color: #ff5151c2;
        }

        .typing-text p div.active span {
            color: #51e8ff;
        }

        .typing-text p div.active {
            border-radius: 5px;
            border-bottom: 2px solid #17A2B8;
            animation: blink 1s ease-in-out infinite;
        }

        @keyframes blink {
            50% {
                border-bottom: none;
            }
        }

        li.time span,
        li.accuracy span,
        li.wpm span {
            font-weight: 900;
            margin: 0;
        }

        li.time,
        li.accuracy,
        li.wpm {
            border: 5px solid #09eba0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .time,
        .accuracy,
        .wpm {
            padding: 5vh;
            width: 30%;
            /* border: 1px solid #b5f4df; */
            color: #004680;
            border-radius: 5vh;
            background-color: #0985eb8d;
            background: radial-gradient(#00e5ff, #0985eb8d);
            /* box-shadow: 0px 0px 10px 2px #b5f4df; */
            font-weight: 900;
        }


        .wpm {
            padding: 5vh;
            /* border: 1px solid #b5f4df; */
            border-radius: 5vh;
            color: #755700;
            background-color: #9f7804;
            background: radial-gradient(#ffee35, #9f7804);
            /* box-shadow: 0px 0px 10px 2px #b5f4df; */
            z-index: 999;
        }

        .time label,
        .accuracy label,
        .wpm label {
            font-size: 120%;
            font-weight: 900;
        }

        .result_icon {
            /* margin-top: -15px; */
            font-size: 15vh;
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

<body data-spy="scroll" data-target="#navbar1" data-offset="60"
    style="background-image: linear-gradient(to bottom, #0a0a0a, #000000);">
    <div class="title">
        <div class="d-flex" style="align-items: center">
            <h1 class="text-primary"><span class="ion ion-md-speedometer"></span></h1>
            <!-- <h1 class="col-12 text-center">Round 1</h1> -->
            <h1 class="px-2">Speed Run</h1>
        </div>
    </div>
    <main
        style="background-image: linear-gradient(to bottom, #0a0a0a, #000000); padding-bottom: 0.9rem; min-height: 100vh;">
        <section class="container mt-0 py-5">
            <div class="row mt-0 py-5">
                <div class="col-12 my-auto mt-0 py-5">
                    <div class="row text-center mt-0 py-3">
                        <h1 class="col-12 text-center">Your Scores for the Round</h1>
                        <div class="wrapper">
                            <div class="content-box">
                                <div class="content"
                                    style="min-height: 44.8vh; width: 80%; margin-left: auto; margin-right: auto;">

                                    <div class="accuracy d-flex align-items-center flex-column">
                                        <div class="my-auto">
                                            <i class="bi bi-md bi-bullseye result_icon"></i>
                                        </div>
                                        <label style="text-align: center; display: block; height: 30px;"><?php echo ''.$_POST['accuracy'].'';?></label>
                                        <label style="text-align: center; display: block;">Accuracy</label>
                                    </div>

                                    <div class="wpm d-flex align-items-center flex-column"
                                        style=" transform: scale(120%);">
                                        <div style="margin-top:-15px; margin-bottom: 2vh;">
                                            <i class="bi bi-speedometer2 result_icon"></i>
                                        </div>
                                        <label style="text-align: center; display: block; height: 20px;"><?php echo ''.$_POST['wpm'].'';?></label>
                                        <label style="text-align: center; display: block;">WPM</label>
                                    </div>

                                    <div class="time d-flex align-items-center flex-column">
                                        <div style="margin-top:-15px; margin-bottom: 2vh;">
                                            <i class="bi bi-clock-history result_icon"></i>
                                        </div>
                                        <label style="text-align: center; display: block; height: 20px;"><?php echo ''.$_POST['time'].'';?></label>
                                        <label style="text-align: center; display: block;">Seconds</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center nxt">
                        <a class="btn btn-primary" href="timescape.html">Next Round</a>
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
        document.onload = setTimeout(function () {
            // function viewScore() {
            scrollTo(0, 0)
            document.querySelector('body').style.overflowY = 'auto'
            document.querySelector('.title').classList.add('col-12')
            document.querySelector('.title').style.paddingLeft = '40vw'
            document.querySelector('main').style.visibility = 'visible'
            document.querySelector('main').style.opacity = '1'
            document.querySelector('main').style.top = '0'
            document.querySelector('main').style.paddingTop = '2.5rem'
            document.querySelector('footer').style.visibility = 'visible'
            document.querySelector('footer').style.opacity = '1'
            document.querySelector('.nxt').style.visibility = 'visible'
            document.querySelector('.nxt').style.opacity = '1'
            // }
        }, 1500)
    </script>
</body>

</html>