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
            if (mysqli_fetch_assoc($result)['Status_timescape'] == 'Completed') {
              echo "<script> window.location.href = 'blindTyping.php'; </script>";
            }
          }
        }
      }
    }
  }
}


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timescape | Swift Fingers | Ananta</title>
  <?php include('links.php') ?>
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
        transform: translateX(50%, 0);
        font-size: 200%;
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
        border-radius: 5vh;
        color: #755700;
        background-color: #9f7804;
        background: radial-gradient(#ffee35, #9f7804);
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
</style>
</head>


<body data-spy="scroll" data-target="#navbar1" data-offset="60" style="background-image: linear-gradient(to bottom, #0a0a0a, #000000);">
  <div class="title" style="height: 100vh; width: 100vw;">
    <h1 class="col-12 text-primary text-center"><span class="ion ion-md-stopwatch"></span></h1>
    <h1 class="col-12 text-center">Round 2</h1>
    <h1 class="col-12 text-center">Timescape</h1>
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
                      <span><b>60</b>s</span>
                    </li>
                    <li class="mistake">
                      <p>Mistakes:</p>
                      <span>0</span>
                    </li>
                    <li class="wpm">
                      <p>WPM:</p>
                      <span>0</span>
                    </li>
                    <li class="accuracy">
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
  <script src="js/paragraphs.js"></script>
  <script>
    const typingText = document.querySelector(".typing-text p"),
      inpField = document.querySelector(".wrapper .input-field"),
      timeTag = document.querySelector(".time span b"),
      mistakeTag = document.querySelector(".mistake span"),
      wpmTag = document.querySelector(".wpm span"),
      accuracyTag = document.querySelector(".accuracy span");

    let totalWords = 0

    let timer,
      maxTime = 60,
      timeLeft = maxTime,
      charIndex = wrongWords = isTyping = 0;

    function loadParagraph() {
      // const ranIndex = Math.floor(Math.random() * paragraphs.length);
      typingText.innerHTML = "";
      // "have all without govern or turn plan tell interest such".split(" ").forEach(word => {
      paragraphs[1].split(" ").forEach(word => {
        let div = ''
        word.split("").forEach(char => {
          div += `<span class="char">${char}</span>`;
        })
        typingText.innerHTML += `<div class="word">${div}</div>`
        typingText.innerHTML += `<span class="char"> </span>`
      });
      typingText.getElementsByClassName("word")[0].getElementsByClassName("char")[0].classList.add("active");
      document.addEventListener("keydown", () => inpField.focus());
      typingText.addEventListener("click", () => inpField.focus());
    }

    function initTyping() {
      let characters = typingText.querySelectorAll("span");
      let typedChar = inpField.value.split("")[charIndex];
      if (charIndex < characters.length - 1 && timeLeft > 0) {
        if (!isTyping) {
          timer = setInterval(initTimer, 1000);
          $.ajax({
                url: "db/save-Timescape.php",
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
        if (typedChar == null) {
          if (charIndex > 0) {
            charIndex--;
            if (characters[charIndex].classList.contains("incorrect")) {}
            characters[charIndex].classList.remove("correct", "incorrect");
          }
        } else {
          if (characters[charIndex].innerText == typedChar) {
            characters[charIndex].classList.add("correct");
          } else {
            wrongWords++
            characters[charIndex].classList.add("incorrect");
          }
          charIndex++;
          totalWords++
        }
        characters.forEach(span => span.classList.remove("active"));
        characters[charIndex].classList.add("active");

        // let wpm = Math.round(((charIndex - wrongWords) / 5) / (maxTime - timeLeft) * 60);
        // wpm = wpm < 0 || !wpm || wpm === Infinity ? 0 : wpm;

        // wpmTag.innerText = wpm;
        // mistakeTag.innerText = wrongWords;
        // let accuracy = ((1 - (wrongWords / totalWords)) * 100)
        // accuracyTag.innerText = accuracy.toFixed(0) + "%"
        if (charIndex >= characters.length - 1) {
          clearInterval(timer);
          // document.querySelector("li.mistake").style.display = "inline-block"
          // document.querySelector("li.accuracy").style.display = "inline-block"
          // document.querySelector("li.wpm").style.display = "inline-block"

          inpField.disabled = true;
          scrollTo(0, 0)
          document.querySelector('body').style.overflowY = 'hidden'
          document.querySelector('main').style.visibility = 'hidden'
          document.querySelector('main').style.opacity = '0'
          document.querySelector('main').style.top = '100vh'
          document.querySelector('main').style.paddingTop = '100vh'
          setTimeout(function() {
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
                                                    <label style="text-align: center; display: block; height: 20px;">${Math.round(((charIndex - wrongWords) / 5) / (maxTime - timeLeft) * 60)}</label>
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
                                    <a class="btn btn-primary" href="blindTyping.php">Next Round</a>
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
            setTimeout(function() {
              document.querySelector('.nxt').style.visibility = 'visible'
              document.querySelector('.nxt').style.opacity = '1'
            }, 500)
          }, 1500)
          $.ajax({
          url: "db/save-Timescape.php",
          type: "POST",
          data: {
            wpm: String(Math.round(((charIndex - wrongWords) / 5) / (maxTime - timeLeft) * 60)),
            acc: String(((1 - (wrongWords / totalWords)) * 100).toFixed(0))
          },
          success: function(result) {
            console.log(result);
          }
        });
        }
      } else {
        clearInterval(timer);
        inpField.value = "";
        inpField.disabled = true;
        scrollTo(0, 0)
        document.querySelector('body').style.overflowY = 'hidden'
        document.querySelector('main').style.visibility = 'hidden'
        document.querySelector('main').style.opacity = '0'
        document.querySelector('main').style.top = '100vh'
        document.querySelector('main').style.paddingTop = '100vh'
        setTimeout(function() {
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
                                                <label style="text-align: center; display: block; height: 20px;">${Math.round(((charIndex - wrongWords) / 5) / (maxTime - timeLeft) * 60)}</label>
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
                                <a class="btn btn-primary" href="blindTyping.php">Next Round</a>
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
          setTimeout(function() {
            document.querySelector('.nxt').style.visibility = 'visible'
            document.querySelector('.nxt').style.opacity = '1'
          }, 500)
        }, 1500)
        $.ajax({
          url: "db/save-Timescape.php",
          type: "POST",
          data: {
            wpm: String((((charIndex - wrongWords) / 5) / (maxTime - timeLeft) * 60).toFixed(4)),
            acc: String(((1 - (wrongWords / totalWords)) * 100).toFixed(4))
          },
          success: function(result) {
            console.log(result);
          }
        });
        
      }
    }

    function initTimer() {
      if (timeLeft > 0) {
        timeLeft--;
        timeTag.innerText = timeLeft;
        let wpm = Math.round(((charIndex - wrongWords) / 5) / (maxTime - timeLeft) * 60);
        wpmTag.innerText = wpm;
      } else {
        clearInterval(timer);
        // document.querySelector("li.mistake").style.display = "inline-block"
        // document.querySelector("li.accuracy").style.display = "inline-block"
        // document.querySelector("li.wpm").style.display = "inline-block"
      }
    }


    loadParagraph();
    inpField.addEventListener("input", initTyping);
  </script>
  <script>
    document.onload = setTimeout(function() {
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