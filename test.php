<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=980, initial-scale=1.0">
    <title>Test | Swift Fingers | Ananta</title>
    <?php include('links.php'); ?>
    <style>
        @media screen and (max-width: 992px) {
            .result-details {
                display: contents;
            }
        }
    </style>
    <style>
        img.reload {
            width: 50%;
            transition-duration: 1s;
            opacity: 0.5;
        }
        img.reload:hover {
            transform: scale(120%);
            opacity: 1;
        }
        @media screen and (max-width: 992px) {
            .result-details {
                display: contents;
            }
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar1" data-offset="60">
<header class="bg-primary">
        <div style="background-color: rgba(0,0,0,1);">
            <div class="container" style="margin-left: 0; margin-right: 0;">
                <div class="row mt-5">
                    <div class="col-12 mt-5">
                        <div class="text-center m-0 mt-5 d-flex flex-column justify-content-center text-light">
                            <h1 class="display-4">
                                Test your speed
                            </h1>
                            <!-- <div class="row w-50" style="margin: 2.5vh auto;">
                                <div class="col-md-3 mx-auto">
                                    <div class="input-group mb-3" style="justify-content: center;">
                                        <button class="btn btn-outline-light btn-lg rounded-right" type="button">
                                            Content Bound</button>
                                    </div>
                                </div>
                                <div class="col-md-3 mx-auto">
                                    <div class="input-group mb-3" style="justify-content: center;">
                                        <button class="btn btn-outline-light btn-lg rounded-right" type="button">
                                            Time Bound</button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <section class="container mt-0 pb-5">
                        <div class="row mt-0 pb-5">
                            <div class="col-12 my-auto mt-0 py-5">
                                <div class="row text-center mt-0 py-4">

                                    <div class="wrapper row">
                                        <div class="content-box col-lg-3">
                                            <div class="content mt-0" style="border-bottom: none;">
                                                <div class="col-12">
                                                    <label for="timerVal" class="mt-2 mx-2">Select Time: </label>
                                                    <select id="timerVal" class="custom-select col-6" onchange="setTimerVal()">
                                                        <option value="15">15s</option>
                                                        <option value="30" selected>30s</option>
                                                        <option value="60">60s</option>
                                                        <option value="90">90s</option>
                                                        <option value="120">120s</option>
                                                    </select>
                                                </div>
                                                <ul class="result-details col-12">
                                                    <li class="time d-inline mt-4 mb-5 col-12 col-sm-6 col-md-3 col-lg-12">
                                                        <p>Time Left:</p>
                                                        <span><b>30</b>s</span>
                                                    </li>
                                                    <li class="mistake d-inline mt-4 mb-5 col-12 col-sm-6 col-md-3 col-lg-12">
                                                        <p>Mistakes:</p>
                                                        <span>0</span>
                                                    </li>
                                                    <li class="wpm d-inline mt-4 mb-5 col-12 col-sm-6 col-md-3 col-lg-12">
                                                        <p>WPM:</p>
                                                        <span>0</span>
                                                    </li>
                                                    <li class="accuracy d-inline mt-4 mb-5 col-12 col-sm-6 col-md-3 col-lg-12">
                                                        <p>Accuracy:</p>
                                                        <span>0</span>
                                                    </li>
                                                </ul>
                                                <div class="col-12"><button class="mt-3" style="background-color: rgba(0,0,0,0); border: none;"><img src="img/reload.png" alt="reload" class="reload"/></button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" class="input-field">
                                        <div class="typing-text col-lg-9">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </header>
    <?php include('nav.php');
include('footer.php');?>
<script>
        $(document).ready(function(){
            $('#test').addClass('activeTab');
        })
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <script src="js/typing.js"></script> -->
    <script src="js/testpara.js"></script>
    <!-- <script>
        function setTimerVal() {
            timerVal = parseInt(document.getElementById('timerVal').value)
            console.log(timerVal, typeof(timerVal))
        }
    </script> -->
    <script src="js/test.js"></script>
</body>

</html>