<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compete | Swift Fingers | Ananta</title>
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

        footer {
            position: relative;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar1" data-offset="60">
    <?php include('nav.php') ?>
    <main style="background: #0a0a0a; background: linear-gradient(to bottom, #0a0a0a, #000000); background: url(img/bg2.avif) no-repeat center; background-size: cover;">
        <section class="container mt-0 py-5" style="background-color: rgba(0,0,0,0.9);">
            <div class="row mt-0 py-5">
                <div class="col-12 my-auto mt-0 py-5">
                    <div class="row text-center mt-0 py-5">

                        <div class="" id="loginForm" tabindex="-1" style="margin: auto; width: 35vw; min-width: 300px; background-color: rgba(0,0,0,0);">
                            <div class="-dialog -dialog-centered -dialog-scrollable">
                                <div class="-content" style="overflow-x: hidden; box-shadow:  1px 1px 10px 1px #b7ccff; background-color: rgb(0,0,0); padding: 5vh;">
                                    <div class="-header">
                                        <h1 class="-title section-title pb-0" style="color: #f0f0f0">Competition</h1>
                                    </div>
                                    <form class="needs-validation" id="competeform" style="margin: 0 auto;" novalidate>
                                        <div class="-body mt-5">
                                            <div class="row mx-auto">
                                                <div class="col-12 form-group">
                                                    <input type="email" class="form-control" placeholder="Participant Email ID" id="par_email" required>
                                                    <label class="col-form-label" id="par_email_label">Participant Email ID</label>
                                                </div>
                                                <div class="col-12 form-group" style="display: inline-block;">
                                                    <input type="password" class="form-control" id="secret_key" placeholder="Secret Key" required>
                                                    <label class="col-form-label" id="secret_key_label">Secret Key</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="-footer row mx-3 mt-3">
                                            <button type="submit" class="btn btn-primary pt-1 mt-1 pb-2 mx-auto">Start Competition</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.php') ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script>
        function competeformvalidation() {
            $('#alert').hide().css('background-color', '#ff6e6ead');
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#par_email').val()) == false) {
                $('#alert').html("Please provide valid Email address...").slideDown().delay(2000).slideUp();
                $('#par_email_label').css('color', "#FF304F");
                $('#par_email').focus();
                return false;
            } else if ($('#secret_key').val() == "") {
                $('#alert').html("Provide Secret Key...").slideDown().delay(2000).slideUp();
                $('#secret_key_label').css('color', "#FF304F");
                $('#secret_key').focus();
                return false;
            }
            return true;
        }
        $(document).ready(function() {
            $('#compete').addClass('activeTab');
    
            $('#competeform').on('submit', function(e) {
                e.preventDefault();
                $('#competeform').addClass('was-validated');
    
                if (competeformvalidation()) {
                    $.ajax({
                        url: "db/competition-DB.php",
                        type: "POST",
                        data: {
                            par_email: $('#par_email').val(),
                            key: $('#secret_key').val()
                        },
                        success: function(result) {
                            // console.log(result)
                            if (result == 'Participant') {
                                window.location.href = "instruction.php"
                            } else if (result == "Done Already") {
                                $('#alert').html("You Already Participated. Try register again...").slideDown().delay    (2000).slideUp();
                                // $('#parti_label').css('color', "#FF304F");
                                $('#par_email').val('');
                                $('#secret_key').val('');
                                $('#par_email').focus();
                            } else if (result == "Invalid Password") {
                                $('#alert').html("Wrong Secret Key...").slideDown().delay(2000).slideUp();
                                $('#secret_key_label').css('color', "#FF304F");
                                $('#secret_key').val('');
                                $('#secret_key').focus();
                            } else if (result == "Not Exist") {
                                $('#alert').html("Participant Not exists...").slideDown().delay(2000).slideUp();
                                $('#par_email_label').css('color', "#FF304F");
                                $('#par_email').val('');
                                $('#secret_key').val('');
                                $('#par_email').focus();
                            } else {
                                console.log(result);
                            }
                        }
                    });
                }
            })
        })
    </script>
</body>

</html>