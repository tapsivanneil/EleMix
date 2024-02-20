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
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.js"></script>    
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/script.js"> </script>
    <title>EleMix</title>
</head>
<body class="p-0">
    <section class="mb-5 position-relative">  
        <!-- <span class="position-absolute translate-middle-x">&#8592;</span>       -->
        <button class="position-absolute translate-middle-x" onclick="window.location.href='index.php'">🡠</button>      
        <img src="elemix logo.png" alt="">
    </section>  
    <div class="container-fluid px-0">
        <div class="row p-0 m-0">
            <div class="col-lg-6 p-0">
                <form method="post" class="d-flex flex-column justify-content-center position-relative">              
                    <div class="d-flex justify-content-around align-items-center" id="combination_holder">  
                        <div class="element-container position-relative justify-content-center">
                            <button class="element_btn " onclick="setElementFocus(1)" name="element_1" id="element_1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" type="button" aria-controls="offcanvasExample">
                                Na
                            </button>
                            <input oninput="getResult()" name="subscript_1" id="subscript_1" type="number" class="position-absolute top-100 end-0 translate-middle text-center" value="1">
                        </div>                

                        <div class="plus pb-3">+</div>

                        <div class="element-container position-relative">
                            <button class="element_btn " onclick="setElementFocus(2)" name="element_2" id="element_2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" type="button" aria-controls="offcanvasExample">
                                Cl
                            </button>
                            <input oninput="getResult()" name="subscript_2" id="subscript_2" type="number" class="position-absolute top-100 end-0 translate-middle" value="1">
                        </div>  
                        <input type="hidden" name="element_result" id="element_result">
                        <input type="hidden" name="element_1_search" id="element_1_search">
                        <input type="hidden" name="element_2_search" id="element_2_search">

                    </div>           
                            
                    <input type="submit"  name="submit_combine" value="MIX" class="mix-btn mt-5 mx-auto">           
                </form>
            </div>
            <div class="col-lg-6 p-0"> 
                <div id="animation">image</div>
            </div>
        </div>
    </div>           

<!-- offcanvas  -->
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header d-flex">
                <form method="post" class="px-3" style="width: 100%;">
                    <input type="text" name="element" placeholder="Search element" class="rounded border-0 bg-secondary-subtle p-3" id="name_search" style="width: 100%;">                    
                </form>                   
            </div>

            <div class="offcanvas-body position-relative pt-3 mb-2" id="liveSearchResults">                 

                <div class="button-container px-3 ">
                    <?php 
                    if(isset($_POST['element_submit'])){
                        $element_1_search = isset($_POST['element_1_search']) ? $_POST['element_1_search'] : '';
                        $element_2_search = isset($_POST['element_2_search']) ? $_POST['element_2_search'] : '';
                        $subscript_1_search = isset($_POST['subscript_1']) ? $_POST['subscript_1'] : '';
                        $subscript_2_search = isset($_POST['subscript_2']) ? $_POST['subscript_2'] : '';

                        $stmt = $link->prepare("SELECT * FROM elements WHERE element_name LIKE ? OR symbol LIKE ? ");
                        $likeParam = "%{$element_search}%";
                        $stmt->bind_param("ss", $likeParam, $likeParam );
                        $stmt->execute();
                        $result = $stmt->get_result();

                    }
                    else{
                        $stmt = $link->prepare("SELECT * FROM elements");
                        $stmt->execute();
                        $result = $stmt->get_result(); 
                    }

                    if($result->num_rows > 0){
                        while($element = $result->fetch_assoc()){
                            $element_symbol = $element['symbol'];
                            $element_name = $element['element_name'];
                            echo '
                                <button onclick="setElementName(element_focus, \'' . $element_symbol . '\')"  getResult(); class="offcanvas-btn d-flex flex-column justify-content-center align-items-center mx-auto">
                                    <span class="symbol">' . $element_symbol . '</span>
                                    <span class="element-name">' . $element_name . '</span>
                                </button>';
                        }
                    }                        
                    ?>
                </div>

            </div>
        </div>
   <script>
    $(document).ready(function () {
        $('#name_search').on('input', function () {
            var searchQuery = $(this).val();

            $.ajax({
                type: 'POST',
                url: 'live_search.php',
                data: { name_search: searchQuery },
                success: function (data) {
                    $('#liveSearchResults').html(data);
                }
            });
        });
    });
</script>

</body>
</html>
<?php
        $search_combination = isset($_POST['element_result']) ? $_POST['element_result'] : "";
        $el_1 = isset($_POST['element_1_search']) ? $_POST['element_1_search'] : "";
        $el_2 = isset($_POST['element_2_search']) ? $_POST['element_2_search'] : "";
        $sub_1 = isset($_POST['subscript_1']) ? $_POST['subscript_1'] : "";
        $sub_2 = isset($_POST['subscript_2']) ? $_POST['subscript_2'] : "";
        //echo '<script>alert("'.$el_1 .' '.$el_2.'");</script>';


        // need to change column name to source :> if animation is completed
        $stmt = $link->prepare("SELECT combination 
                                FROM combinations 
                                WHERE element_1 = ? 
                                AND element_2 = ? 
                                AND subscript_1 = ? 
                                AND subscript_2 = ?");
            $stmt->bind_param('ssii', $el_1, $el_2, $sub_1, $sub_2);
            $stmt->execute();
            $result = $stmt->get_result();

        if($result->num_rows > 0){
            $element_res = $result->fetch_assoc();
            $element_source = $element_res['combination'];

            echo '<script>
                var el_1 = document.getElementById("element_1");
                var el_2 = document.getElementById("element_2");

                el_1.innerText = "'.$el_1.'";
                el_2.innerText = "'.$el_2.'";

                
                var combination_holder = document.getElementById("combination_holder");
                var animation_holder = document.getElementById("animation");
                animation_holder.innerHTML = \''.$element_source.'\';

                combination_holder.style.display = "none";
            
                </script>';


        }
        else{
            //catch null combinations
            //echo "el_1: $el_1, el_2: $el_2, sub_1: $sub_1, sub_2: $sub_2<br>";
            echo '<script>
                var animation_holder = document.getElementById("animation");
                animation_holder.innerHTML = "NO SIMULATION";

                

            </script>';
        }
   ?>
<!-- <button class="element_btn position-relative" onclick="setElementFocus(1)" id="element_1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" type="button" aria-controls="offcanvasExample">
    Na
    <input id="numberInput" type="number" class="position-absolute top-100 start-100 translate-middle w-50 rounded h-50" onclick="stopPropagation(event);">
</button>                 -->
<!-- <button class="element_btn position-relative" onclick="setElementFocus(2)" id="element_2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" type="button" aria-controls="offcanvasExample">
    Cl
    <input type="number" class="position-absolute top-100 start-100 translate-middle w-50 rounded h-50" onclick="stopPropagation(event);">
</button> -->