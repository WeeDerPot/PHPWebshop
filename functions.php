<?php

require "./database/DBController.php";

require "./database/Product.php";

require "./database/Cart.php";

// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_list = $product->getData();

// print_r($product->getData());

// Cart Object
$Cart = new Cart($db);

// Cart testing
/*  $arr = array(
        "user_id" => 2,
        "termek_id" => 8
    );
    $Cart->insertIntoCart($arr); 
*/



