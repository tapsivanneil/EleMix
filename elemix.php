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


    <title>Document</title>
</head>
<body>
    
    <form method="post">


    </div>
        <a class="btn btn-primary" onclick="setElementFocus(1)" id="element_1" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Element 1
        </a>
        <input type="number">
        <div>+</div>
        <a class="btn btn-primary"  onclick="setElementFocus(2)" id="element_2" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Element 2
        </a>
        <input type="number">
        <input type="submit" value="Submit">
    </form>

    <div>image</div>

    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        
        <form method="post">
            <input type="text" name="element">
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
                        <button onclick="setElementName(element_focus, \'' . $element_symbol . '\')">
                            ' . $element_symbol . ' - ' . $element_name . '
                        </button>
                    </div>
                </div>
            ';


            }
        }


    ?>
   </div>
   <script src="js/script.js"> </script>
</body>
</html>