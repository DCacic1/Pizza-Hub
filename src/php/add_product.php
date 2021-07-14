<?php
    if(!isset($_COOKIE['Admin'])){
        header("Location: admin.php");
    }
?>

<!DOCTYPE html>
<html land="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width= device-width, initial-scale = 1.0">
    <link rel="stylesheet" Href="../styles/index.css">
    <title>Add product</title>
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
            <h1>Add product</h1>
            <span>Add product</span>
        </div>
        
        <form class="addprod" action="handle_add_product.php" method="post">
            <p>
                <label for="text">Name: </label>
                <input class="textinput" type="text" name="product_name" id="product_name" 
                    placeholder="Name">
            </p>
            <p>
                <label for="text">Image URL: </label>
                <input class="textinput" type="url" name="product_image_url" id="product_image_url"
                    placeholder="Image URL">
            </p>
            <p>
                <label for="number">Price: </label>
                <input class="textinput" type="number" name="product_price" id="product_price"
                    placeholder="Price">
            </p>
    
            <input class="add-btn" type="submit">
    
        </form>
    </section>
    
</body>

</html>