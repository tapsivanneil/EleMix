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
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="home.css">    
    <title>EleMix</title>
</head>
<body>
    <section class="mb-5">        
        <img src="elemix logo.png" alt="">
    </section>  
    <div class="container-fluid px-0">
        <form method="post" class="d-flex flex-column justify-content-center position-relative">              
            <div class="d-flex justify-content-around align-items-center">  
                <div class="element-container position-relative justify-content-center">
                    <button class="element_btn " onclick="setElementFocus(1)" id="element_1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" type="button" aria-controls="offcanvasExample">
                        Na
                    </button>
                    <input id="numberInput" type="number" class="position-absolute top-100 end-0 translate-middle rounded ps-2">
                </div>                

                <div class="plus pb-3">+</div>

                <div class="element-container position-relative">
                    <button class="element_btn " onclick="setElementFocus(2)" id="element_2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" type="button" aria-controls="offcanvasExample">
                        Cl
                    </button>
                    <input id="numberInput" type="number" class="position-absolute top-100 end-0 translate-middle rounded ps-2">
                </div>  
            </div>           
                     
            <input type="submit" value="MIX" class="mix-btn mt-5 mx-auto">           
        </form>
    
        <div>image</div>

<!-- offcanvas  -->
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header d-flex">
                <form method="post" class="px-3" style="width: 100%;">
                    <input type="text" name="element" placeholder="Search element" class="rounded border-0 bg-secondary-subtle p-3" id="name_search" style="width: 100%;">                    
                </form>                   
            </div>

            <div class="offcanvas-body position-relative pt-3 mb-3" id="liveSearchResults">                 

                <div class="button-container px-3 ">
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
                                <button onclick="setElementName(element_focus, \'' . $element_symbol . '\')" class="offcanvas-btn d-flex flex-column justify-content-center align-items-center mx-auto">
                                    <span class="symbol">' . $element_symbol . '</span>
                                    <span class="element-name">' . $element_name . '</span>
                                </button>';
                        }
                    }                        
                    ?>
                </div>

            </div>
        </div>
    </div>
   <script src="js/script.js"> </script>
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

<!-- <button class="element_btn position-relative" onclick="setElementFocus(1)" id="element_1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" type="button" aria-controls="offcanvasExample">
    Na
    <input id="numberInput" type="number" class="position-absolute top-100 start-100 translate-middle w-50 rounded h-50" onclick="stopPropagation(event);">
</button>                 -->
<!-- <button class="element_btn position-relative" onclick="setElementFocus(2)" id="element_2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" type="button" aria-controls="offcanvasExample">
    Cl
    <input type="number" class="position-absolute top-100 start-100 translate-middle w-50 rounded h-50" onclick="stopPropagation(event);">
</button> -->