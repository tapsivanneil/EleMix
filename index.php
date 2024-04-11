<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/js/bootstrap.min.js">
    <link rel="icon" sizes="180x180" href="assets/favicon/favicon.ico">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <script src="node_modules/@popperjs/core/dist/umd/popper.js"></script>    
    <link rel="stylesheet" href="index.css">
    <title>EleMix</title>
</head>

    <style>
        body {
            background-image: url("assets/image/background.png");
            background-size: 100% auto; /* Adjust as needed */
            background-position: center; 
            background-repeat: repeat; 
        }
    </style> 

<body class="container-fluid" >
    <img src="assets/image/elemix logo-crp.png" alt="">
    <div class="buttons">
        <button onclick="window.location.href='elemix.php'">START</button>
        <button onclick="window.location.href='guide.php'">GUIDE</button>        
        <button onclick="window.location.href='about.php'">ABOUT</button>
    </div>    
    <footer></footer>
</body>

<audio id="bgm" autoplay loop>
  <source src="assets/mp3/elemix_bgm.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<script> 
    var audio = document.getElementById("bgm");
    audio.volume = 0.01;
</script>
</html>