<?php

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>animator corner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/includes_style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
  </head>
  <body>

  <ul>
    <li>
        <div class="logo">
            <img src="../img/gator_logo2.png" alt="Animator's Corner Logo">
        </div>
    </li>
    <li class="title">
        <a href="default.asp">Animator's <br /> Corner</a>
    </li>
    <li class="logout"><a href="logout.php">
    <i class="fa fa-power-off fa-2x"></i>
        
    </a></li>
</ul>

<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="#about">Arts</a>
  <a href="#news">Profile</a>
  <a href="#about">Library</a>
  <a href="#contact" class="noti">Notifications</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<div class="container">  
    <div class="col">
        <div class="row">
            <div class="col">
            <img src="../img/gator_logo2.png" alt="" style="width:100%;">
            </div>
            <div class="col">
            <h2>Upcoming Events</h2>
            Event details
        </div>
        </div>

       <div class="row">
            <div class="col" style="max-width: 100vw;">
                <div class="slideshow-container">

                    <div class="mySlides">
                        <img src="../img/gator_logo.png" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <img src="../img/gator_logo3.png" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <img src="../img/gator_logo2.png" style="width:100%">
                    </div>

                    <a class="prev1" onclick="plusSlides(-1)">❮</a>
                    <a class="next1" onclick="plusSlides(1)">❯</a>

                </div>
            </div>
            <div class="col-sm-6">
            <h2>Update version</h2>
            <p style="word-wrap: break-word;">details details details details details details details details details details details details details details details details details details details details details details</p>
        </div>
<br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
       
</div>
        <div class="row">
            <div class="col">
            <div class="slideshow-container">

                <div class="mySlides2">
                    <img src="../img/gator_logo.png" style="width:100%">
                </div>

                <div class="mySlides2">
                    <img src="../img/gator_logo3.png" style="width:100%">
                </div>

                <div class="mySlides2">
                    <img src="../img/gator_logo2.png" style="width:100%">
                </div>

                    <a class="prev1" onclick="plusSlides2(-1)">❮</a>
                    <a class="next1" onclick="plusSlides2(1)">❯</a>

            </div>
            </div>
            <div class="col">
                <h2>Trending animations and details</h2>
            </div>
        </div>
    </div>           
        

        
</div>
  </body>
  <script>
let slideIndex = 1;
showSlides(slideIndex);
showSlides2(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

//second slides
function plusSlides2(n) {
  showSlides2(slideIndex += n);
}

function currentSlide2(n) {
  showSlides2(slideIndex = n);
}

function showSlides2(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides2");
  let dots = document.getElementsByClassName("dot2");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
  </html>