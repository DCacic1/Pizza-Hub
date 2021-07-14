<?php
if (file_exists("./products_db.php")) {
    include_once("./products_db.php");
}



if(!isset($_COOKIE['Admin'])){
    header("Location: admin.php");
}

$products = $products_table->read();
?>

<!DOCTYPE html>
<html land="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <link rel="stylesheet" href="../styles/index.css">
    <title>Products</title>
</head>

<body class="dashboard">
    <div class="sidenav">
        <a href="../../index.php"><span>Pizza Hub</span></a>
        <a href="./dashboard.php">Dashboard</a>
        <a href="products.php" style="color:#000000"><b>Products</b></a>
        <a href="./logout.php">Logout</a>
    </div>

    <section class="details">
        <h1>Products</h1>
        <div class="title">
            <span>Products</span>
            <input class="add-btn" type="button" value="Add product"
                onClick="document.location.href = './add_product.php'" />
        </div>

        <table class="table">
            <tr>
                <th scope="col" width="35%">Image</th>
                <th scope="col" width="35%">Name</th>
                <th scope="col" width="30%">Price</th>
            </tr>
            <?php while ($row = $products->fetch()) : ?>
            <tr>
                <form action="edit_product.php" method="post">
                    <td style="display:none;"><input type="hidden" name="product_id"
                            value=<?=htmlspecialchars($row['product_id']) ?>>
                        <?= htmlspecialchars($row['product_id']) ?>
                    </td>
                    <td><img src=<?=htmlspecialchars($row['product_image_url']) ?> width="200" height="200" ></td>
                    <td><input type="hidden" name="product_name" value=<?=htmlspecialchars($row['product_name']) ?>>
                        <?= htmlspecialchars($row['product_name']) ?>
                    </td>
                    <td><input type="hidden" name="product_price" value=<?=htmlspecialchars($row['product_price']) ?>>
                        <?= htmlspecialchars($row['product_price']) ?>
                    </td>
                    <td width="50px"><button class="add-btn" type="submit" name="edit">Edit</button>
                </form>
            </tr>
            <?php endwhile; ?>
        </table>
    </section>
</body>

</html>