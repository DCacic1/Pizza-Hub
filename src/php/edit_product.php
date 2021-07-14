<?php

if(!isset($_COOKIE['Admin'])){
    header("Location: admin.php");
}

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
    $product_price = test_input($_POST["product_price"]);
}

?>

<!DOCTYPE html>
<html land="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width= device-width, initial-scale = 1.0">
    <link rel="stylesheet" Href="../styles/index.css">
    <title>Edit product</title>
</head>

<body class="dashboard">
    <div class="sidenav">
        <a href="../../index.php"><span>Pizza Hub</span></a>
        <a href="./dashboard.php">Dashboard</a>
        <a href="products.php" style="color:#000000"><b>Products</b></a>
        <a href="./logout.php">Logout</a>
    </div>

    <section class="details">
        <div>
            <h1>Edit product</h1>
            <span>Edit product</span>
        </div>

        <form class="addprod" action="handle_edit_product.php" method="post">
            <p style="display:none;">
                <label for="text">ID: </label>
                <input type="text" name="product_id" id="product_id" value=<?php echo $product_id?>>
            </p>
            <p>
                <label for="text">Name: </label>
                <input class="textinput" id="edit-input" type="text" name="product_name" id="product_name" value=<?php echo
                    $product_name?>>
            </p>
            <p>
                <label for="text">Image URL: </label>
                <input class="textinput" id="edit-input" type="text" name="product_image_url" id="product_image_url"
                    value=<?php echo $product_url?>>
            </p>
            <p>
                <label for="number">Price: </label>
                <input class="textinput" id="edit-input" type="number" name="product_price" id="product_quantity"
                    value=<?php echo $product_qnt?>>
            </p>
            <input class="add-btn"sssssss name='update' value="Edit" type="submit">
            <input class="add-btn" name='delete' value="Delete" type="submit">
        </form>
    </section>
</body>

</html>