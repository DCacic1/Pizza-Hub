<?php
    if(!isset($_COOKIE['Admin'])){
        header("Location: admin.php");
    }

?>

<!DOCTYPE html>
<html land="en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE-edge">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <link rel = "stylesheet" href = "../styles/index.css">
        <title>Orders</title>
    </head>

    <body>
        <div class = "sidenav">
        <a href="../../index.php"><img src="../images/logos/logo.svg" alt="Logo čvaraci net" loading = "lazy"></a>
            <a href="./dashboard.php">Pocetna</a>
            <a href="./products.php" style=>Proizvodi</a>
            <a href="./orders.php" style="color:#000000"><b>Narudzbe</b></a>
            <a href="./logout.php">Odjava</a>
        </div>
    </body>