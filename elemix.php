<?php 
    require_once "config/config.php";
?>

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

<body class="p-0 m-0 position-relative d-flex flex-column">

    <section class="fixed-top position-relative">  
        <!-- <span class="position-absolute translate-middle-x">&#8592;</span>       -->
        <a class="position-absolute translate-middle-x" id="back_button" href="index.php" style="text-decoration:none;">🡠</a>      
        <img src="assets/image/elemix logo.png" alt="">

        <button class="elemix-guide" type="button" data-bs-toggle="offcanvas" data-bs-target="#guideOffcanvas" aria-controls="offcanvasExample">
        ?
        </button>


    </section>  
    <div class="position-relative preface justify-content-center align-items-center">
        <div style="display: flex; flex-direction: column;">
            <section class="position-relative d-flex justify-content-center align-items-center" id="animation_container">
                <img src="" id="animation" alt="" class="m-1 p-0 ">
                
            </section>
            <div style=" width: 100%; max-width: 500px; heigth: 100%; min-height: 300px; margin: auto; text-align: center; display: none;" id="description_container">
                <img src="" alt="" id="description" style="margin-top: 30px; width: 100%; height: 100%">
            </div>
        </div>
        <div class="container-fluid px-0 position-absolute translate-middle-y start-25 top-50 "> <!--position-absolute translate-middle-y start-25 top-50-->
            <div class="row p-0 m-0 h-100">
                <div class="col-lg-6 p-0 mb-5" id="controls">
                    <form method="post" class="d-flex flex-column justify-content-center position-relative">              
                        <div class="d-flex justify-content-around align-items-center" id="combination_holder">  
                            <div class="element-container position-relative justify-content-center">
                                <button class="element_btn "  onclick="setElementFocus(1)" name="element_1" id="element_1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" type="button" aria-controls="offcanvasExample">
                                    Hg
                                </button>
                                <div oninput="getResult()" name="subscript_1" id="subscript_1" type="number" class="superscript" >2</div>
                            </div>                
    
                            <div class="plus pb-3">+</div>
    
                            <div class="element-container position-relative">
                                <button class="element_btn " onclick="setElementFocus(1)" name="element_2" id="element_2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" type="button" aria-controls="offcanvasExample">
                                    O
                                </button>
                                <div oninput="getResult()" name="subscript_2" id="subscript_2" type="number" class="superscript" >-2</div>
                            </div>  
                            <input type="hidden" name="element_result" id="element_result">
                            <input type="hidden" name="element_1_search" id="element_1_search" value="Hg">
                            <input type="hidden" name="element_2_search" id="element_2_search" value="O">
                            <input type="hidden" name="subscript_1_search" id="subscript_1_search" value="2">
                            <input type="hidden" name="subscript_2_search" id="subscript_2_search" value="-2">

                        </div>             
                        <input type="submit"  name="submit_combine" value="MIX" class="mix-btn mt-5 mx-auto">           
                    </form>
                </div>
                <div class="col-lg-6 p-0 m-0 d-flex justify-content-center align-items-center"> 
                    <!-- <div></div> -->
                    <img src="assets/image/beaker.png" alt="" id="beaker" class="animation m-0 p-0 h-100 w-50">
                </div>
            </div>
        </div>           
    </div>

<!-- offcanvas  -->
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

            <div class="offcanvas-body position-relative pt-3 mb-2" id="liveSearchResults">                 

                <div class="button-container px-3 ">
                    <?php 
                    if(isset($_POST['element_submit'])){
                        $element_1_search = isset($_POST['element_1_search']) ? $_POST['element_1_search'] : 'Na';
                        $element_2_search = isset($_POST['element_2_search']) ? $_POST['element_2_search'] : 'Cl';
                        $subscript_1_search = isset($_POST['subscript_1_search']) ? $_POST['subscript_1_search'] : '1';
                        $subscript_2_search = isset($_POST['subscript_2_search']) ? $_POST['subscript_2_search'] : '-1';

                        $stmt = $link->prepare("SELECT * FROM combinations WHERE element_name LIKE ? OR symbol LIKE ? ");
                        $likeParam = "%{$element_search}%";
                        $stmt->bind_param("ss", $likeParam, $likeParam );
                        $stmt->execute();
                        $result = $stmt->get_result();

                    }
                    else{
                        $stmt = $link->prepare("SELECT * FROM combinations");
                        $stmt->execute();
                        $result = $stmt->get_result(); 
                    }

                    if($result->num_rows > 0){
                        while($element = $result->fetch_assoc()){
                            $element_1 = $element['element_1'];
                            $element_2 = $element['element_2'];
                            $subscript_1 = $element['subscript_1'];
                            $subscript_2 = $element['subscript_2'];
                            $element_symbol = $element['combination'];
                            $element_name = $element['combination_name'];

                            echo '
                                <button onclick="setElementName( \'' . $element_1 . '\', \'' . $element_2 . '\',\'' . $subscript_1 . '\',\'' . $subscript_2 . '\')"  getResult(); class="offcanvas-btn d-flex flex-column justify-content-center align-items-center mx-auto">
                                    <span class="symbol">' . $element_symbol . '</span>
                                    <span class="element-name">' . $element_name . '</span>
                                </button>';
                        }
                    }                        
                    ?>
                </div>

            </div>
        </div>

<div style="display: flex">
    <button class="combination-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  Combinations
</button>

</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="guideOffcanvas" aria-labelledby="offcanvasExampleLabel">
 
<div class="container">

    <style>
    
    @font-face {
    font-family: "Chewy";
    src: url("assets/font/Chewy-Regular.woff") format("woff"),
        url("assets/font/Chewy-Regular.woff2") format("woff2");
    }
    .image-container {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        height: 100vh;
        overflow-x: auto;
        margin: 0; /* Remove default margins */
        padding: 0; /* Remove default padding */
    }

    .image-container img {
        flex: 0 0 100%;
        height: auto;
    }


    </style>
  <div class="offcanvas-header" style="margin-top: 20px">
    <h5 class="offcanvas-title" id="offcanvasLabel" style="font-family: Chewy; font-size: 200%; color: #e73813;">User Guide</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
    <div class="image-container">
        <img src="assets/image/1.png" alt="">
        <img src="assets/image/2.png" alt="">
        <img src="assets/image/3.png" alt="">
        <img src="assets/image/4.png" alt="">
        <img src="assets/image/5.png" alt="">

    </div>



</div>

</body>
</html>
<?php
        $el_1 = isset($_POST['element_1_search']) ? $_POST['element_1_search'] : "";
        $el_2 = isset($_POST['element_2_search']) ? $_POST['element_2_search'] : "";
        $sub_1 = isset($_POST['subscript_1_search']) ? $_POST['subscript_1_search'] : "";
        $sub_2 = isset($_POST['subscript_2_search']) ? $_POST['subscript_2_search'] : "";
        echo '<script>console.log("'.$el_1 .' '.$el_2.''.$sub_1 .' '.$sub_2.'");</script>';

       
        $stmt = $link->prepare("SELECT source, combination 
                                FROM combinations 
                                WHERE element_1 = ? 
                                AND element_2 = ? 
                                AND subscript_1 = ? 
                                AND subscript_2 = ?");
            $stmt->bind_param('ssii', $el_1, $el_2, $sub_1, $sub_2);
            $stmt->execute();
            $result = $stmt->get_result();
        // need to change column name to source :> if animation is completed
        if($result->num_rows > 0){
            $element_res = $result->fetch_assoc();
            $element_source =  strtolower($element_res['source']) ;
            $description_source =  strtolower($element_res['combination']) ;


            echo '<script>                
                var controls = document.getElementById("controls");
                controls.style.display = "none";
                
                var beaker = document.getElementById("beaker");
                beaker.style.display = "none";
                
                document.getElementById("animation_container").style.width="100%";
                document.getElementById("animation_container").style.height="100%";

                document.getElementById("description_container").style.display="";

                var el_1 = document.getElementById("element_1");
                var el_2 = document.getElementById("element_2");

                el_1.innerText = "'.$el_1.'";
                el_2.innerText = "'.$el_2.'";

                console.log("'.$element_source.'");  

                var animation_holder = document.getElementById("animation");
                var description_holder = document.getElementById("description");


                animation_holder.style.display = "inline";
                animation_holder.src =  "'.$element_source.'";
                animation_holder.alt =  "'.$element_source.'";

                description_holder.src =  "assets/image/'.$description_source.'.png";
                description_holder.alt =  "assets/image/'.$description_source.'.png";
                
                var back_button = document.getElementById("back_button");
                back_button.href =  "elemix.php";
                
                </script>';


        }
        else{
            //catch null combinations
            if(isset($_POST['element_result'])){
            echo '<script>
                alert("Combination Unavailable")
            </script>'; 
            }

        }
   ?>
