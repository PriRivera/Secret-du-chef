<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="Baked section"> <!--Aiuda-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Icon Library-->
    <title>search</title>
</head>
<body>
    <header class="header-background">
        <nav class="main-nav">            
            <div class="burger">
                <input type="checkbox" class="burger__button">
                <span class="burger__span"></span>
                <span class="burger__span"></span>
                <span class="burger__span"></span>
                <ul class="burger-menu">
                    <a href="index.php" class="burger-menu__link"><li class="burger-menu__li">Home</li></a>
                    <a href="contact.php" class="burger-menu__link"><li class="burger-menu__li">Contact</li></a>
                    <a href="login.php" class="burger-menu__link"><li class="burger-menu__li">Login</li></a>
                    <a href="profile.php" class="burger-menu__link"><li class="burger-menu__li">Profile</li></a>
                    <a href="submit.php" class="burger-menu__link"><li class="burger-menu__li">New recipe</li></a>
                    <a href="#" class="burger-menu__link"><li class="burger-menu__li">Logout</li></a>
                </ul>
            </div>
            <a href="index.php"><img class="logo" src="img/logo.png" alt="Secret du Chef's logo"></a>
           <!-- <div class="main-nav__search-container">
                <input class="search-text" type="text" placeholder="Search.." name="search">
                <a class="main-nav__button" href="#"><i class="fa fa-search"></i></a>
            </div>-->
            <ul class="main-nav__list">
                    <li class="main-nav__item"><a class="main-nav__link" href="index.php">Home</a></li>
                    <li class="main-nav__item"><a class="main-nav__link" href="contact.php">Contact</a></li>
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
        <div class="main-search_div">
         <h1 class="main-text">Search instead for</h1>
              <div class="container-search">
                    <form class="search-bar" action="">
                      <input class="main-nav__input-search" type="text" placeholder="Search.." name="search">
                      <button class="main-nav__button-search" type="submit"><i class="fa fa-search"></i></button>
                  </form>
             </div>
            </div>
         <div class="search-div">
             <ul class="search-menu">
                        <li class="sub-menu_item-search"><a class="sub-menu_link-search" href="#">Healthy</a></li>
                        <li class="sub-menu_item-search"><a class="sub-menu_link-search" href="#">Desserts</a></li>
                        <li class="sub-menu_item-search"><a class="sub-menu_link-search" href="#">Meats</a></li>
                        <li class="sub-menu_item-search"><a class="sub-menu_link-search" href="#">Pastas</a></li>
                        <li class="sub-menu_item-search baked"><a class="sub-menu_link-search" href="#">Baked</a></li>
            </ul> 
         </div>
    </header>
    <section>
         <ul class="search-content">
                <li class="search-content_item"><a href="recipe.php" class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt=""></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt=""></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt=""></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt=""></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt="See more"></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt=""></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt=""></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt=""></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt=""></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt=""></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt="See more"></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
                <li class="search-content_item"><a class="search-content_link"><img class="search-content_img" src="img/papa.jpg" alt=""></a><p class="recipe-menu_description search-description__margin">See more</p></a></li>
            </ul>
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
</body>
</html>