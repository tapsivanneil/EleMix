<link rel="stylesheet" href="home.css">   
<div class="button-container px-3">
<?php
    require_once "config/config.php";

$name_search = isset($_POST['name_search']) ? $_POST['name_search'] : '';

$stmt = $link->prepare("SELECT * FROM elements WHERE element_name LIKE ? OR symbol LIKE ?");
$likeParam = "%{$name_search}%";
$stmt->bind_param("ss", $likeParam, $likeParam);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($element = $result->fetch_assoc()) {
        $element_symbol = $element['symbol'];
        $element_name = $element['element_name'];
        echo '<button onclick="setElementName(element_focus, \'' . $element_symbol . '\')" class="offcanvas-btn d-flex flex-column justify-content-center align-items-center mx-auto">
                    <span class="symbol">' . $element_symbol . '</span>
                    <span class="element-name">' . $element_name . '</span>
                </button>';
    }
} else {
    echo '</div>';
    echo "No element found";
}
?>

