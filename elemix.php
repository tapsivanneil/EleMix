<?php 
    require_once "config/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
   <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.js"></script>
   <script src="js/script.js"> </script>

    <title>Document</title>
</head>
<body>
    
    <form method="post">


    <div id="combination_holder">
        <a class="btn btn-primary" onclick="setElementFocus(1)" name="element_1" id="element_1" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Element 1
        </a>
        <input type="number" oninput="getResult()" name="subscript_1" id="subscript_1">
        <div>+</div>
        <a class="btn btn-primary"  onclick="setElementFocus(2)" name="element_2" id="element_2" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Element 2
        </a>
        <input type="number" oninput="getResult()" name="subscript_2" id="subscript_2">
        <input type="hidden" name="element_result" id="element_result">
        <input type="submit" name="submit_combine" value="Submit">
    </form>
</div>
    <div id="animation">image</div>

    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        
        <form method="post">
            <input type="text"  name="element">
            <input type="submit" name="element_submit"value="Submit">
        </form>
 

    <?php 
        if(isset($_POST['element_submit'])){
            $element_search = isset($_POST['element']) ? $_POST['element'] : '';

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
                <div class="card">
                    <div class="card-body">
                        <button onclick="setElementName(element_focus, \'' . $element_symbol . '\'); getResult();">
                            ' . $element_symbol . ' - ' . $element_name . '
                        </button>
                    </div>
                </div>
            ';
            }
        }

    ?>
   </div>

   <?php
        $search_combination = isset($_POST['element_result']) ? $_POST['element_result'] : "";
        $el_1 = isset($_POST['element_1']) ? $_POST['element_1'] : "";
        $el_2 = isset($_POST['element_2']) ? $_POST['element_2'] : "";
        $sub_1 = isset($_POST['subscript_1']) ? $_POST['subscript_1'] : "";
        $sub_2 = isset($_POST['subscript_2']) ? $_POST['subscript_2'] : "";

        

        // need to change column name to source :> if animation is completed
        $stmt = $link->prepare("SELECT combination FROM combinations WHERE combination = ?");
        $stmt->bind_param('s', $search_combination);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $element_res = $result->fetch_assoc();
            $element_source = $element_res['combination'];

            echo '<script>
                var combination_holder = document.getElementById("combination_holder");
                var animation_holder = document.getElementById("animation");
                animation_holder.innerHTML = \''.$element_source.'\';

                combination_holder.style.display = "none";
            
                </script>';


        }
        else{
            echo '<script>
                var animation_holder = document.getElementById("animation");
                animation_holder.innerHTML = "NO SIMULATION";

                

            </script>';
        }
   ?>


</body>
</html>