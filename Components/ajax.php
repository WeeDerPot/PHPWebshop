<?php 

require "../database/DBController.php";

require "../database/Product.php";

// DBController object
$db = new DBController();

// Product object
$product = new Product($db);

if (isset($_POST['itemid'])) {
    $ajaxresult = $product->getProduct($_POST['itemid']);
    echo json_encode($ajaxresult);
    
}