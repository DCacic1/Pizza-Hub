<!DOCTYPE html>
<html land="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/index.css">
        <title>Admin Login</title>
    </head>
    <body>

        <nav>
            <h1>Pizza Hub</h1>
            <button class="menu" type="button" aria-expanded="false">
                <img src="../images/icons/ic-menu-navigation.svg" alt="Menu icon">
            </button>
            <a href="../../index.php" aria="Press for homepage"> <span>Pizza Hub</span></a>
            <a href="admin.php" class="login" aria-label="Press to login">
                <img src="../images/icons/person.svg" alt="Button for login" loading="lazy">
                <span>LOGIN</span>
            </a>
        </nav>

        <form action="validate.php" method="post">
            <h1>Admin Login</h1>
            <span>Admin login</span>
            <div>
                <p>
                    <label for="username">E-mail: </label>
                    <input class="textinput" type="text" name="user_email" id="user_email" placeholder="E-mail">
                </p>
                <p>
                    <label for="password"> Password: </label>
                    <input class="textinput" type="password" name="user_password" id="user_password" placeholder="Password">
                </p>
                <p class="submitbtn">
                    <input class="loginsubmit" type="submit" name="login" value="Login">
                </p>
            </div>
        </form>

        <footer>
        <div>
            <a href="../../index.php" aria-label="Press for home page"><span>Pizza Hub</span></a>
            <ul class="media-icons">
                <li>
                    <a href="https://www.instagram.com/">
                        <img src="../images/icons/insta.svg" role="button" aria-label="Press to access Instagram page."
                            alt="Instagram icon">
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/">
                        <img src="../images/icons/twitter.svg" role="button" aria-label="Press to access Twitter page."
                            alt="Twitter icon">
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/">
                        <img src="../images/icons/fb.svg" role="button" aria-label="Press to access Facebook page."
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