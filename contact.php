<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="Contact page"> <!--Aiuda-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Icon Library-->
    <title>Contact</title>
</head>
<body class="body-contact">
    <header>
        <nav class="main-nav">            
            <div class="burger">
                <input type="checkbox" class="burger__button">
                <span class="burger__span"></span>
                <span class="burger__span"></span>
                <span class="burger__span"></span>
                <ul class="burger-menu">
                    <a href="index.php" class="burger-menu__link"><li class="burger-menu__li">Home</li></a>
                    <a href="contact.html" class="burger-menu__link"><li class="burger-menu__li">Contact</li></a>
                    <a href="login.php" class="burger-menu__link"><li class="burger-menu__li">Login</li></a>
                    <a href="profile.php" class="burger-menu__link"><li class="burger-menu__li">Profile</li></a>
                    <a href="submit.php" class="burger-menu__link"><li class="burger-menu__li">New recipe</li></a>
                    <a href="#" class="burger-menu__link"><li class="burger-menu__li">Logout</li></a>
                </ul>
            </div>

            <a href="index.php"><img class="logo" src="img/logo.png" alt="Secret du Chef's logo"></a>
            <div class="main-nav__search-container">
                <input class="search-text" type="text" placeholder="Search.." name="search">
                <a class="main-nav__button" href="#"><i class="fa fa-search"></i></a>
            </div>
            <ul class="main-nav__list">
                    <li class="main-nav__item"><a class="main-nav__link" href="index.php">Home</a></li>
                    <li class="main-nav__item"><a class="main-nav__link" href="contact.html">Contact</a></li>
                    <li class="main-nav__item"><a class="main-nav__link"href="login.php">Login</a></li>
                    <div id="logedin" class="main-nav__item  dropdown">
                        <button class="dropbtn">Hiram</button>
                        <div class="dropdown-content">
                            <a href="profile.php" class="dropdown-content__a">Profile</a>
                            <a href="submit.php" class="dropdown-content__a">New recipe</a>
                            <a id="logout" href="#" class="dropdown-content__a">Log out</a>
                        </div>
                    </div>
            </ul>
        </nav>
    </header>
    <section class="contact-box">
        <p class="p-have">Have <span class="p-have--span">Questions?</span></p>
        <form class="form-contact">
            <label class="form-text">Name:</label><br>
            <input class="form-login_imput" id="contact_imput" type="text" name="firstname" placeholder="Your name.."> <br>
            <label class="form-text">Email:</label><br>
            <input class="form-login_imput" id="contact_imput" type="email" name="email" placeholder="Your email.."> <br>
            <label class="form-text">Comments:</label><br>
            <input class="form-login_imput comments" id="contact_imput" type="text" name="lastname" placeholder="Give us your feedback.."> <br>
            <a class="main-btn send-btn">Send</a>
        </form>
    </section>
    <footer class="main-footer">
        <nav class="footer-nav">
            <a href="index.php"><img class="footer-logo" src="img/logo.png" alt="Secret du Chef's logo"></a>
            <ul class="footer-imgs">
                <li class="footer-li_item"><a class="footer-li_link"><img class="footer-li_img" src="img/fb.png" alt="facebook"></a></li>
                <li class="footer-li_item"><a class="footer-li_link"><img class="footer-li_img" src="img/instagram.png" alt="instagram"></a></li>
                <li class="footer-li_item"><a class="footer-li_link"><img class="footer-li_img" src="img/pinterest.png" alt="pinterest"></a></li>
                <li class="footer-li_item"><a class="footer-li_link"><img class="footer-li_img" src="img/youtube.png" alt="youtube"></a></li>
            </ul>   
            <p class="footer-p"> A proyect by <br> Priscilla Rivera <br> Hiram González</p> 
        </nav>       
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/app.js"></script>
  </body>
  </html>