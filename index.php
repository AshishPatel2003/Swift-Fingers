<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swift Fingers | Ananta</title>
    <?php include('links.php')?>
    <style>
        header {
            background-image: url('img/bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center top;
            width: 100vw;
            background-attachment: fixed;
        }
    </style>
</head>


<body data-spy="scroll" data-target="#navbar1" data-offset="60">
    <?php include('nav.php');?>
    <script>
        function loadtest(){window.location.href = 'test.php'}
        function loadcompete(){window.location.href = 'compete.php'}
        $(document).ready(function(){
            $('#index').addClass('activeTab');
            
        })
    </script>
    <header class="bg-primary">
        <div style="background-color: rgba(0,0,0,0.8);">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12">
                        <div class="text-center m-0 vh-100 d-flex flex-column justify-content-center text-light">
                            <p class="lead">Welcome to the World of</p>
                            <h1 class="display-4 txt-rotate" data-period="2000" data-rotate='[ "Swift Fingers", "Ananta-22", "Fastest Fingers First", "Speed Typists", "Typing Tests" ]'>
                            </h1>
                            <p class="lead">Test the swiftness of your fingers and test your typing speed!</p>
                            <div class="row w-50" style="margin: 2.5vh auto;">
                                <div class="col-md-3 mx-auto">
                                    <div class="input-group mb-3" style="justify-content: center;">
                                        <button onclick="loadtest()" class="btn btn-outline-light btn-lg rounded-right" type="button">Start Typing Test</button>
                                    </div>
                                </div>
                                <div class="col-md-3 mx-auto">
                                    <div class="input-group mb-3" style="justify-content: center;">
                                        <button onclick="loadcompete()" class="btn btn-outline-light btn-lg rounded-right" type="button">Start Competition</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <main style="background-image: linear-gradient(to bottom, #0a0a0a, #000000); width: 100vw">
        <!-- <main style="-webkit-box-shadow: 0px -30px 70px 5px rgba(10,10,10,1);
        -moz-box-shadow: 0px -30px 70px 5px rgba(10,10,10,1);
        box-shadow: 0px -30px 70px 5px rgba(10,10,10,1);"> -->
        <!-- <div style="background: rgba(0,0,0,0); background-image: linear-gradient(to top, rgba(0,0,0,0), #0a0a0a); height: 30vh; margin-top: -2.5vh;"></div> -->
        <!-- About -->
        <section class="container mt-0 pb-5">
            <div class="row mt-0 py-5">
                <div class="col-12 my-auto mt-0 py-5">
                    <h1 class="my-0 text-center pb-2" style="margin: 0 auto; font-size: 180%;">About</h1>
                    <h1 class="display-4 my-0 pb-5 text-center" style="margin: 0 auto;"><span class="text-primary">Swift</span>-Fingers</h1>
                    <div class="row text-center mt-0" style="justify-content: center; padding: 2.5vw;">
                        <p class="lead mx-5 text-justify">Technology is growing way fast. Everything is being
                            digitalizing at a tremendous rate through computers. As we all know, no computerized
                            technology can be complete without typing. Also, with the large amount of data being
                            generated each day, and with the benefits of having an online presence, the requirement of
                            content writers and data entry specialists is also growing day in and day out. Also, isn'tit amazing to tell everyone how fast you can do stuff in computer with your super fast
                            fingers?</p>
                        <p class="lead mx-5 text-justify mt-3">According to the Oxford English Dictionary, "Swift" is
                            used to describe something happening quickly or promptly. "Swift Fingers" is designed to
                            test the "swiftness" of your fingers, to determine how fast you can type. "Swift Fingers" is
                            a competition being organized as a part <strong class="text-primary" style="font-weight: 900; opacity: 0.7;">Ananta'22</strong>, the
                            annual techfest of <strong class="text-primary" style="font-weight: 900; opacity: 0.7;">GSFC University, Vadodara, Gujarat</strong>. The competiton is to be conducted in three rounds, in multiple slots across two days, the details about the time and venue being
                            as follows:-</p>
                        <div class="lead text-justify row col-12"
                            style="justify-content: space-between; padding: 2.5vw;">
                            <div class="col-md-6 mt-5">
                                <h2 class="text-primary pb-3 text-center">Day 1: April 22, 2022 (Friday)</h2>
                                <ul class="lead text-left">
                                    <li>Time: 11:00am to 5:00pm IST</li>
                                    <li>Venue: Data Engineering Lab, Anviksha, GSFC University, Vadodara, Gujarat</li>
                                </ul>
                            </div>
                            <div class="col-md-6 mt-5">
                                <h2 class="text-primary pb-3 text-center">Day 2: April 23, 2022 (Saturday)</h2>
                                <ul class="lead text-left">
                                    <li>Time: 10:00am to 5:00pm IST</li>
                                    <li>Venue: Data Engineering Lab, Anviksha, GSFC University, Vadodara, Gujarat</li>
                                </ul>
                            </div>
                        </div>
                        <p class="lead mx-5 text-justify mt-5">So buckle up for an amazing ride of unique tests and
                            competition rounds - all at your finger-tips! Get ready to showcase how good your fingers
                            know the keyboard and even <strong class="text-primary" style="font-weight: 900; opacity: 0.7;">win amazing prizes worth upto
                                Rs.2000!!</strong></p>
                        <p class="lead mx-5 text-justify mt-5">PS: E-Certificates and a surprise await all participants. Contact us to <button class="btn btn-outline-primary" onclick="window.scrollTo(0, document.body.scrollHeight);">Register Now</button></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Rounds -->
        <div style="background-image: url('img/bg2.avif');
       background-repeat: no-repeat;
       background-size: cover;
       background-position: center top;
       background-attachment: fixed;">
            <div style="background-color: rgba(0,0,0,0.9);">
                <section class="container pb-5">
                    <div class="row py-5">
                        <div class="col-12 my-auto py-5">
                            <h1 class="display-4 my-0 py-5 text-center">Competition Rounds</h1>
                            <div class="row text-center">
                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <h1 class="display-2 text-primary"><span
                                                    class="ion ion-md-speedometer"></span>
                                            </h1>
                                            <h4 class="card-title text-primary">Speed Run</h4>
                                            <p class="card-text text-justify mt-3 mb-auto">This round would be content
                                                bound,
                                                meaning that
                                                the participant would have to type the entire content without any time
                                                constraints. The difficulty level of this round will be normal.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <h1 class="display-2 text-primary"><span
                                                    class="ion ion-md-stopwatch"></span></h1>
                                            <h4 class="card-title text-primary">Timescapes</h4>
                                            <p class="card-text text-justify mt-3 mb-auto">This round would be
                                                time-bound,
                                                meaning
                                                that the participant would be required to type the entire given content
                                                within
                                                the given time frame. The difficulty level of this round would be
                                                moderate.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <h1 class="display-2 text-primary"><span class="ion ion-md-eye-off"></span>
                                            </h1>
                                            <h4 class="card-title text-primary">Blind Typing</h4>
                                            <p class="card-text text-justify mt-3 mb-auto">This round would be
                                                time-bound, and
                                                the
                                                user would not be able to see the content that is being typed. The
                                                difficulty
                                                would be high.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="display-5 mt-5 py-5 text-center">Rewards</h2>
                                <div class="row text-center">
                                    <div class="col-lg-4 mb-4 mx-auto">
                                        <div class="card h-100">
                                            <div
                                                class="card-body d-flex flex-column justify-content-center align-items-center">
                                                <h1 class="display-2 text-primary"><span
                                                        class="ion ion-md-trophy"></span>
                                                </h1>
                                                <h4 class="card-title text-primary">Winners</h4>
                                                <p class="card-text text-justify mt-3 mb-auto">The top two overall
                                                    performers for each day would be awarded exciting prizes.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-4 mx-auto">
                                        <div class="card h-100">
                                            <div
                                                class="card-body d-flex flex-column justify-content-center align-items-center">
                                                <h1 class="display-2 text-primary"><span class="ion ion-md-card"></span>
                                                </h1>
                                                <h4 class="card-title text-primary">Participation</h4>
                                                <p class="card-text text-justify mt-3 mb-auto">All the participants
                                                    would be receiving e-certificates on their registered email IDs.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <?php include('footer.php')?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/typing.js"></script>
</body>

</html>