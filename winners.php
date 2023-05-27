<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winners | Swift Fingers | Ananta</title>
    <?php include('links.php') ?>
    <style>
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

        .-content {
            overflow-x: hidden;
            box-shadow: 1px 1px 10px 1px #b7ccff;
            background-color: rgb(0, 0, 0);
            padding: 5vh;
        }

        footer {
            position: relative;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar1" data-offset="60">
    <?php include('nav.php') ?>
    <main style="background-image: linear-gradient(to bottom, #0a0a0a, #000000); padding-bottom: 0.9rem;">
        <section class="container mt-0 py-5">
            <div class="row mt-0 py-5">
                <div class="col-lg-10 my-auto mt-0 py-5 mx-auto">
                    <div class="text-center mb-5 py-5 col-12">
                        <h1 class="text-primary mb-3">Day 1: April 22, 2022</h1>
                        <!-- <h2 class="text-lead mb-3">Coming Soon...</h2> -->
                        <div tabindex="-1" class="row mx-5 justify-content-between mb-5" style="background-color: rgba(0,0,0,0);">
                            <div class="-dialog -dialog-centered -dialog-scrollable col-lg-5 mt-5">
                                <div class="-content">
                                    <div class="winnerPic">
                                        <img class="col-12 col-sm-8 col-md-10 col-lg-12" src="img/prajwal.jpg">
                                        <p class="lead mt-3">Prajwal Huggi</p>
                                        <div class="row mt-5">
                                            <div class="col-sm-6">WPM: 67.3</div>
                                            <div class="col-sm-6">Accuracy: 98.0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="-dialog -dialog-centered -dialog-scrollable col-lg-5 mt-5">
                                <div class="-content">
                                    <div class="winnerPic">
                                        <img class="col-12 col-sm-8 col-md-10 col-lg-12" src="img/rishita.jpg">
                                        <p class="lead mt-3">Rishita Patel</p>
                                        <div class="row mt-5">
                                            <div class="col-sm-6">WPM: 50.2</div>
                                            <div class="col-sm-6">Accuracy: 94.7</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="-dialog -dialog-centered -dialog-scrollable col-12 mt-5">
                            <?php

                            include("db/dbconnect.php");

                            $sql = "SELECT Name, Avg_wpm, Avg_Acc from (participants join result using(Email)) where Result!='' order by Result desc";
                            $dataresult = mysqli_query($conn, $sql);
                            $no = 1;
                            ?>

                        <h2 class="text-lead mt-5">Scoreboard</h2>
                            <table id='mytable' class='table table-bordered table-striped text-white mt-3'>
                                <thead>
                                    <tr class="text-primary">
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Average Speed</th>
                                        <th>Average Accuracy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if ($dataresult->num_rows > 0) {

                                        while ($row = mysqli_fetch_assoc($dataresult)) {
                                            if ($no <= 10) { ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['Name'];
                                                        $no += 1; ?></td>
                                                    <td><?php echo round($row['Avg_wpm'], 2); ?></td>
                                                    <td><?php echo round($row['Avg_Acc'], 2); ?></td>
                                                </tr>
                                    <?php
                                            } else {
                                                break;
                                            }
                                        }
                                    } else {
                                        echo "<tr><td justify 0kl;9io= 'center' colspan = '6'> No Record Found</td></td>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <div>
                            </div>

                        </div>
                    </div>
                    <div class="text-center mt-5 pt-5 col-12">
                        <h1 class="text-primary mb-3 mt-5">Day 2: April 23, 2022</h1>
                        <h2 class="text-lead mb-3">Coming Soon...</h2>
                        <!--<div tabindex="-1" class="row mx-5 justify-content-between"-->
                        <!--    style="margin: auto; background-color: rgba(0,0,0,0);">-->
                        <!--    <div class="-dialog -dialog-centered -dialog-scrollable col-lg-5 mt-5">-->
                        <!--        <div class="-content">-->
                        <!--            <div class="winnerPic">-->
                        <!--                <img class="col-12 col-sm-8 col-md-10 col-lg-12" src="img/ashish.jpg">-->
                        <!--                <p class="lead mt-3">Ashish Kumar Patel</p>-->
                        <!--                <div class="row mt-5">-->
                        <!--                    <div class="col-sm-6">WPM: </div>-->
                        <!--                    <div class="col-sm-6">Accuracy: </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="-dialog -dialog-centered -dialog-scrollable col-lg-5 mt-5">-->
                        <!--        <div class="-content">-->
                        <!--            <div class="winnerPic">-->
                        <!--                <img class="col-12 col-sm-8 col-md-10 col-lg-12" src="img/ashish.jpg">-->
                        <!--                <p class="lead mt-3">Ashish Kumar Patel</p>-->
                        <!--                <div class="row mt-5">-->
                        <!--                    <div class="col-sm-6">WPM: </div>-->
                        <!--                    <div class="col-sm-6">Accuracy: </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.php') ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>