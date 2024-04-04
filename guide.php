
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">    
    <link rel="icon" sizes="180x180" href="assets/favicon/favicon.ico">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.js"></script>    
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/script.js"> </script>
    <title>EleMix</title>
</head>
<body class="p-0 m-0 position-relative d-flex flex-column ">
    <section class="fixed-top position-relative">  
        <!-- <span class="position-absolute translate-middle-x">&#8592;</span>       -->
        <a class="position-absolute translate-middle-x" id="back_button" href="index.php" style="text-decoration:none;">🡠</a>      
        <img src="assets/image/elemix logo.png" alt="">
    </section>  
    <div class="container">

    <style>
    .image-container {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        height: 100%;
        overflow-x: scroll;
        margin: 0; /* Remove default margins */
        padding: 0; /* Remove default padding */
    }

    .image-container img {
        flex: 0 0 100%;
        height: auto;
    }
</style>

<div class="image-container">
    <img src="assets/image/1.png" alt="">
    <img src="assets/image/2.png" alt="">
    <img src="assets/image/3.png" alt="">
    <img src="assets/image/4.png" alt="">
    <img src="assets/image/5.png" alt="">

</div>


</body>
</html>