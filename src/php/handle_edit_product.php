<?php

include_once('products_db.php');

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_id = test_input($_POST["product_id"]);
    $product_name = test_input($_POST["product_name"]);
    $product_url = test_input($_POST["product_image_url"]);
    $product_qnt = test_input($_POST["product_quantity"]);
    $product_price = test_input($_POST["product_price"]);

    if(isset($_POST['update'])){
        $products_table-> deleteByID($product_id);
        $products_table-> insert($product_name, $product_url, $product_qnt, $product_price);
        header('Location: products.php');
    }
    elseif(isset($_POST['delete'])){
        $products_table-> deleteByID($product_id);
        header('Location: products.php');
    }
}

?>