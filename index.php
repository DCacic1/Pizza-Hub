<?php
    require_once("/app/src/php/products_db.php");
    require_once("/app/src/php/users_db.php");
    $products=$products_table->read();
?>


<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="src/uiCartProducts.js"></script>
    <title>Pizza Hub</title>
    <meta name="desription" content="High quality, amazing taste and affordable, at the same time easy to get.">
</head>

<body>
    <nav>
        <h1>Pizza Hub</h1>
        <button class="menu" type="button" aria-expanded="false">
            <img src="src/images/icons/ic-menu-navigation.svg" alt="Menu icon">
        </button>
        <span>Pizza Hub</span>
        <a href="src/php/admin.php" class="login" aria-label="Press to login">
            <img src="src/images/icons/person.svg" alt="Button for login" loading="lazy">
            <span>LOGIN</span>
        </a>
    </nav>

    <section class="greatings">
        <h2>Greatings</h2>
    </section>

    <section class="about">
        <h2>About us</h2>
        <div class="check-mark">
            <img src="/src/images/icons/check.svg">
            <span>Best Pizza in town</span>
        </div>
        <div class="check-mark">
            <img src="/src/images/icons/check.svg">
            <span>Fair Prices</span>
        </div>
        <div class="check-mark">
            <img src="/src/images/icons/check.svg">
            <span>Professional Service</span>
        </div>
    </section>

    <section class="prices">
        <h2>Menu</h2>
        <span>Menu</span>
        <div class="pricing">
            <?php while ($row = $products->fetch()) : ?>
            <div class="product" id=<?=htmlspecialchars($row['product_id']) ?>>
                <span>
                    <?= htmlspecialchars($row['product_name']) ?>
                </span>
                <img class="product-img" src=<?=htmlspecialchars($row['product_image_url']) ?> alt=
                <?= htmlspecialchars($row['product_name']) ?> loading="lazy">
                <span class="product-price">
                    Price: <?= htmlspecialchars($row['product_price']) ?>,00 kn
                </span>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

    <section class="map">
        <h2>Map</h2>
        <span>Where to find us?</span>
        <img class="map-img" srcset="src/images/img/map2.jpg 1200w"
            sizes="990px, 450px" alt="Map with Pizzeria location" loading="lazy">
    </section>

    <footer>
        <div>
            <a href="" aria-label="Press to go to top"><span>Pizza Hub</span></a>
            <ul class="media-icons">
                <li>
                    <a href="https://www.instagram.com/">
                        <img src="src/images/icons/insta.svg" role="button" aria-label="Press to access Instagram page."
                            alt="Instagram icon">
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/">
                        <img src="src/images/icons/twitter.svg" role="button" aria-label="Press to access Twitter page."
                            alt="Twitter icon">
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/">
                        <img src="src/images/icons/fb.svg" role="button" aria-label="Press to access Facebook page."
                            alt="Facebook icon">
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <ul class="links">
                <li>
                    <a href="" aria-label="Press for more information">About us</a>
                </li>
                <li>
                    <a href="" aria-label="Press to see pricing">Pricing</a>
                </li>
                <li>
                    <a href="" aria-label="Press to access contacts">Contact</a>
                </li>
            </ul>
        </div>
    </footer>

</body>

</html>