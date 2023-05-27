<?php

require('db/dbconnect.php');
session_start();

if (!isset($_SESSION['Email'])) {
  echo "<script> window.location.href = 'compete.php'; </script>";
} else {
  $email = $_SESSION['Email'];

  $participantCheck = mysqli_query($conn, "SELECT Status FROM participants WHERE Email='$email'");

  if (mysqli_num_rows($participantCheck) > 0) {
    if (mysqli_fetch_assoc($participantCheck)['Status'] == 'Done') {
      echo "<script> window.location.href = 'compete.php'; </script>";
    } else {
      $maxid = mysqli_query($conn, "SELECT max(id) as id FROM result WHERE Email='$email'");

      if (mysqli_num_rows($maxid) > 0) {
        $id = mysqli_fetch_assoc($maxid)['id'];
        $result = mysqli_query($conn, "SELECT * FROM result WHERE Id=$id");
        if ($result) {
          if (mysqli_num_rows($result) > 0) {
            if (mysqli_fetch_assoc($result)['Status_blindtyping'] == 'Completed') {
              echo "<script> window.location.href = 'compete.php'; </script>";
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
  <title>Blind Typing | Swift Fingers | Ananta</title>
  <?php include('links.php')?>
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
      animation: fadeIn 2s linear;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
      }

      50% {
        opacity: 1;
      }
    }

    .title>h1>span {
      font-size: 500%;
      transition-duration: 2s;
    }

    .title>h1:last-child {
      font-size: 250%;
      font-weight: 900;
      transition-duration: 2s;
      min-width: 40vw;
    }

    main {
      visibility: hidden;
      opacity: 0;
      position: absolute;
      top: 100vh;
      left: 0;
      transition-duration: 2s;
    }



    li.time span,
    li.accuracy span,
    li.wpm span {
      font-weight: 900;
      margin: 0;
    }

    li.accuracy,
    li.wpm {
      display: none;
    }

    div.time,
    div.accuracy,
    div.wpm {
      padding: 5vh;
      width: 30%;
      color: #004680;
      border-radius: 5vh;
      background-color: #0985eb8d;
      background: radial-gradient(#00e5ff, #0985eb8d);
      font-weight: 900;
      visibility: hidden;
      opacity: 0;
    }

    div.wpm {
      padding: 5vh;
      /* border: 1px solid #b5f4df; */
      border-radius: 5vh;
      color: #755700;
      background-color: #9f7804;
      background: radial-gradient(#ffee35, #9f7804);
      /* box-shadow: 0px 0px 10px 2px #b5f4df; */
      z-index: 999;
    }

    div.time label,
    div.accuracy label,
    div.wpm label {
      font-size: 120%;
      font-weight: 900;
    }

    .nxt {
      visibility: hidden;
      opacity: 0;
      transition-delay: 2s;
      transition-duration: 2s;
    }

    .result_icon {
      /* margin-top: -15px; */
      font-size: 15vh;
    }




    footer {
      display: none;
      visibility: hidden;
      opacity: 0;
      transition-duration: 2s;
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
  </style>

<body data-spy="scroll" data-target="#navbar1" data-offset="60"
  style="background-image: linear-gradient(to bottom, #0a0a0a, #000000);">
  <div class="title" style="height: 100vh; width: 100vw;">
    <h1 class="col-12 text-primary text-center"><span class="ion ion-md-eye-off"></span></h1>
    <h1 class="col-12 text-center">Round 3</h1>
    <h1 class="col-12 text-center">Blind Typing</h1>
  </div>
  <main style="width: 100%; background-image: linear-gradient(to bottom, #0a0a0a, #000000); padding-bottom: 0.9rem;">
    <section class="container mt-0 pb-5">
      <div class="row mt-0 py-5">
        <div class="col-12 my-auto mt-0 py-5">
          <div class="row text-center mt-0 py-4">

            <div class="wrapper">
              <div class="content-box">
                <div class="content">
                  <ul class="result-details">
                    <li class="time">
                      <p>Time Left:</p>
                      <span><b>40</b>s</span>
                    </li>
                    <li class="mistake" class="d-flex">
                      <p>Mistakes:</p>
                      <span>0</span>
                    </li>
                    <li class="wpm">
                      <p>WPM:</p>
                      <span>0</span>
                    </li>
                    <li class="accuracy" class="d-flex">
                      <p>Accuracy:</p>
                      <span>0</span>
                    </li>
                  </ul>
                </div>
              </div>
              <input type="text" class="input-field">
              <div class="typing-text">
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer" class="bg-dark text-light pt-5">
    <div class="container pt-5">
      <p class="text-center mt-5 pb-3">Designed by Team Ananta'22</p>
    </div>
  </footer>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="js/paragraphs.js"></script>
  <script>
    const typingText = document.querySelector(".typing-text p"),
    inpField = document.querySelector(".wrapper .input-field"),
    // tryAgainBtn = document.querySelector(".content button"),
    timeTag = document.querySelector(".time span b"),
    mistakeTag = document.querySelector(".mistake span"),
    wpmTag = document.querySelector(".wpm span"),
    accuracyTag = document.querySelector(".accuracy span");

let totalWords = 0, wordIndex = 0

let timer,
    maxTime = 40,
    timeLeft = maxTime,
    wrongWords = isTyping = 0;

let scoreShown = false

function loadParagraph() {
    // const ranIndex = Math.floor(Math.random() * paragraphs.length);
    typingText.innerHTML = "";
    // "have all without govern or turn plan tell interest such".split(" ").forEach(word => {
    paragraphs[2].split(" ").forEach(word => {
        let div = ''
        word.split("").forEach(char => {
            div += `<span class="char">${char}</span>`;
        })
        typingText.innerHTML += `<div class="word">${div}</div>`
        typingText.innerHTML += `<span class="char"> </span>`
    });
    typingText.getElementsByClassName("word")[0].classList.add("active");
    document.addEventListener("keydown", () => { inpField.focus(); initTyping() });
    typingText.addEventListener("click", () => { inpField.focus(); initTyping() });
}

let word = '', wordElement = ''

function initTyping() {
    if (wordIndex <= typingText.getElementsByClassName("word").length - 1 && timeLeft > 0) {
        if (!isTyping) {
            timer = setInterval(initTimer, 1000);
            $.ajax({
                url: "db/save-BlindTyping.php",
                type: "POST",
                data: {
                    wpm: '0',
                    acc: '0'
                },
                success: function (result) {
                    console.log(result);
                }
            });
            isTyping = true;
        }
        word = ''
        wordElement = typingText.getElementsByClassName("word")[wordIndex]
        let characters = wordElement.getElementsByClassName("char");
        for (i = 0; i < characters.length; i++) {
            word += characters[i].innerText;
        }
        if (wordIndex > typingText.getElementsByClassName("word").length - 1) {
            clearInterval(timer);
        }
        // console.log()
    } else {
        clearInterval(timer);
        inpField.disabled = true
        // mistakeTag.innerText = wrongWords;
        // wpmTag.innerText = Math.round(((totalWords - wrongWords) / 5) / (maxTime - timeLeft) * 60)
        // accuracyTag.innerText = ((1 - (wrongWords / totalWords)) * 100).toFixed(0) + "%"
        // document.querySelector("li.mistake").style.display = "inline-block"
        // document.querySelector("li.accuracy").style.display = "inline-block"
        // document.querySelector("li.wpm").style.display = "inline-block"

        inpField.disabled = true;
        if (!scoreShown) {
            scrollTo(0, 0)
            document.querySelector('body').style.overflowY = 'hidden'
            document.querySelector('main').style.visibility = 'hidden'
            document.querySelector('main').style.opacity = '0'
            document.querySelector('main').style.top = '100vh'
            // document.querySelector('main').style.paddingTop = '100vh'
            // console.log(totalWords)
            // console.log(wrongWords)
            // console.log(maxTime - timeLeft)
            // console.log(((totalWords - wrongWords) / 5) / (maxTime - timeLeft) * 60)
            // console.log(((totalWords * (1 - (wrongWords / totalWords)) * 100) / 5) / (maxTime - timeLeft) * 60)
            setTimeout(function () {
                document.querySelector('body').style.overflowY = 'auto'
                document.querySelector('main').innerHTML = `<section class="container mt-0 py-5">
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
                                                <label style="text-align: center; display: block; height: 30px;">${((1 - (wrongWords / totalWords)) * 100).toFixed(0)}%</label>
                                                <label style="text-align: center; display: block;">Accuracy</label>
                                            </div>
        
                                            <div class="wpm d-flex align-items-center flex-column"
                                                style=" transform: scale(120%);">
                                                <div style="margin-top:-15px; margin-bottom: 2vh;">
                                                    <i class="bi bi-speedometer2 result_icon"></i>
                                                </div>
                                                <label style="text-align: center; display: block; height: 20px;">${Math.round(((totalWords - wrongWords) / 5) / (maxTime - timeLeft) * 60)}</label>
                                                <label style="text-align: center; display: block;">WPM</label>
                                            </div>
        
                                            <div class="time d-flex align-items-center flex-column">
                                                <div style="margin-top:-15px; margin-bottom: 2vh;">
                                                    <i class="bi bi-clock-history result_icon"></i>
                                                </div>
                                                <label style="text-align: center; display: block; height: 20px;">${(maxTime - timeLeft).toFixed(1)}</label>
                                                <label style="text-align: center; display: block;">Seconds</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center nxt">
                                <a class="btn btn-primary" href="averageScore.php">View Result</a>
                            </div>
                        </div>
                    </div>
                </section>`
                document.querySelector('.title').classList.add('col-12')
                document.querySelector('.title').style.paddingLeft = '40vw'
                document.querySelector('main').style.visibility = 'visible'
                document.querySelector('main').style.opacity = '1'
                document.querySelector('main').style.top = '0'
                document.querySelector('main').style.paddingTop = '2.5rem'
                document.querySelector('.content').style.borderBottom = 'none'
                document.querySelector('footer').style.visibility = 'visible'
                document.querySelector('footer').style.opacity = '1'
                document.querySelector(".time").style.visibility = "visible"
                document.querySelector(".time").style.opacity = "1"
                document.querySelector(".accuracy").style.visibility = "visible"
                document.querySelector(".accuracy").style.opacity = "1"
                document.querySelector(".wpm").style.visibility = "visible"
                document.querySelector(".wpm").style.opacity = "1"
                setTimeout(function () {
                    document.querySelector('.nxt').style.visibility = 'visible'
                    document.querySelector('.nxt').style.opacity = '1'
                }, 500)
            }, 1500)
            $.ajax({
                url: "db/save-BlindTyping.php",
                type: "POST",
                data: {
                    wpm: String((((totalWords - wrongWords) / 5) / (maxTime - timeLeft) * 60).toFixed(4)),
                    acc: String(((1 - (wrongWords / totalWords)) * 100).toFixed(4))
                },
                success: function (result) {
                    console.log(result);
                }
            });
            scoreShown = true;
        }
    }
}

function checkCalc() {
    let inpFieldVal = inpField.value;
    inpField.value = ''
    word = word + " "
    inpFieldVal = inpFieldVal + " "
    if (wordIndex != 0) {
        word = " " + word
    }
    // console.log(inpFieldVal)
    // console.log(word)
    let correct = true
    if (inpFieldVal.length != word.length) {
        correct = false
    }
    if (inpFieldVal.length - 1 > word.length) {
        // correct = false
        totalWords += (inpFieldVal.length - 1 - word.length)
        wrongWords += (inpFieldVal.length - 1 - word.length)
    }
    for (i = 0; i < word.length; i++) {
        if (inpFieldVal[i] != word[i]) {
            correct = false
            wrongWords++
        }
        totalWords++
    }
    if (correct) {
        wordElement.classList.add("correct")
    }
    else {
        wordElement.classList.add("incorrect")
    }
    wordIndex++
    for (i = 0; i < typingText.getElementsByClassName("word").length; i++) {
        typingText.getElementsByClassName("word")[i].classList.remove("active")
    }
    if (typingText.getElementsByClassName("word")[wordIndex] != null) {
        typingText.getElementsByClassName("word")[wordIndex].classList.add("active")
    }
}

function initTimer() {
    if (timeLeft > 0) {
        timeLeft--;
        // console.log(timeLeft)
        timeTag.innerText = timeLeft;
    } else {
        clearInterval(timer);
        inpField.disabled = true
        document.querySelector("li.mistake").style.display = "inline-block"
        document.querySelector("li.accuracy").style.display = "inline-block"
        document.querySelector("li.wpm").style.display = "inline-block"
    }
}


loadParagraph();
inpField.addEventListener("keydown", function (e) {
    e = e.key
    initTyping()
    if (e == ' ') {
        // totalWords++
        if (typingText.getElementsByClassName("word")[wordIndex] != null) {
            checkCalc()
        }
    }
});
  </script>
  <script>
    document.onload = setTimeout(function () {
      document.querySelector('body').style.overflowY = 'auto'
      document.querySelector('.title').style.display = 'flex'
      document.querySelector('.title').style.height = 'auto'
      document.querySelector('.title').style.alignItems = 'center'
      document.querySelector('.title').style.backgroundColor = 'rgba(0,0,0,0)'
      document.querySelector('.title').style.zIndex = '999'
      document.querySelector('.title').children[1].style.display = 'none'
      document.querySelector('.title').style.position = 'absolute'
      document.querySelector('.title').style.top = '0'
      document.querySelector('.title').style.left = '0'
      document.querySelector('.title').style.padding = '1rem'
      document.querySelector('.title').children[0].children[0].style.fontSize = '200%'
      document.querySelector('.title').children[0].classList.remove('col-12')
      document.querySelector('.title').children[0].classList.add('p-2')
      document.querySelector('.title').children[2].style.fontSize = '120%'
      document.querySelector('.title').children[2].classList.remove('col-12')
      document.querySelector('.title').children[2].classList.remove('text-center')
      document.querySelector('.title').children[2].classList.add('p-2')
      document.querySelector('main').style.visibility = 'visible'
      document.querySelector('main').style.opacity = '1'
      document.querySelector('main').style.top = '0'
      document.querySelector('main').style.paddingTop = '5rem'
      document.querySelector('footer').style.visibility = 'visible'
      document.querySelector('footer').style.opacity = '1'
    }, 1500)
  </script>
  <?php include('remove_disclaimer.php')?>
</body>

</html>