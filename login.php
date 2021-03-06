<?php
    namespace Medoo;
    require 'Medoo.php';

    $onError = false;

    $database = new Medoo([

        'database_type' => 'mysql',
        'database_name' => 'secret_du_chef',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);    
    session_start();
    if(isset($_SESSION["isLoggedIn"])){
        header("location:profile.php");
    }
    if($_POST){
      $user = $database->select("tb_users", "*",[
            "username"=> $_POST["username"]     
        ]);
        if(password_verify( $_POST["password"], $user[0]["password"])){
            session_start();
            $_SESSION["isLoggedIn"] = true;
            $_SESSION["usr"] = $user[0]["username"];
            $_SESSION["usrid"] = $user[0]["id_user"];
            $_SESSION["usrtype"] = $user[0]["type"];
            header("location:profile.php");
        }else{
            $onError=true; 
        }
        
               
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="Login page">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Create account</title>
</head>

<body class="body-Login">
    <header>
        <nav class="main-nav">            
            <div class="burger">
                <input type="checkbox" class="burger__button">
                <span class="burger__span"></span>
                <span class="burger__span"></span>
                <span class="burger__span"></span>
                <ul class="burger-menu">
                    <a href="index.php" class="burger-menu__link"><li class="burger-menu__li">Home</li></a>
                    <a href="contact.php" class="burger-menu__link"><li class="burger-menu__li">Contact</li></a>
                    <?php
                        if (isset($_SESSION["isLoggedIn"])) {
                            echo"
                                <a href='profile.php' class='burger-menu__link'><li class='burger-menu__li'>Profile</li></a>
                                <a href='submit.php' class='burger-menu__link'><li class='burger-menu__li'>New recipe</li></a>
                                <form action='profile.php' method='POST'>
                                    <input type='submit' id='sublogout' name='logout' value='true' style='display:none;'>
                                    <label for='sublogout' id='logout' class='burger-menu__link'>Log out
                                </form>
                            ";
                        } else {
                            echo"
                                <a href='login.php' class='burger-menu__link'><li class='burger-menu__li'>Login</li></a>
                            ";
                        }                    
                    ?>
                </ul>
            </div>
            <a href="index.php"><img class="logo" src="img/logo.png" alt="Secret du Chef's logo"></a>
            <form action="search.php" class="main-nav__search-container">
                <input class="search-text" type="text" placeholder="Search.." name="keyWord">
                <button class="main-nav__button" href="#"><i class="fa fa-search"></i></button>
            </form>
            <ul class="main-nav__list">
                <li class="main-nav__item"><a class="main-nav__link" href="index.php">Home</a></li>
                <li class="main-nav__item"><a class="main-nav__link" href="contact.php">Contact</a></li>
                <?php 
                    if (isset($_SESSION["isLoggedIn"])) {
                        echo "<div id='logedin' class='main-nav__item  dropdown'>
                                <button class='dropbtn'>".$_SESSION["usr"]."</button>
                                <div class='dropdown-content'>
                                    <a href='profile.php' class='dropdown-content__a'>Profile</a>
                                    <a href='submit.php' class='dropdown-content__a'>New recipe</a>
                                    <form action='profile.php' method='POST'>
                                        <input type='submit' id='sublogout' name='logout' value='true' style='display:none;'>
                                        <label for='sublogout' id='logout' class='dropdown-content__a'>Log out
                                    </form>
                                </div>
                            </div>";
                    }else{
                        echo "<li class='main-nav__item'><a class='main-nav__link'href='login.php'>Login</a></li>";
                    }
                ?>                   
            </ul>
        </nav>
    </header>
    <section class="login-box">
        <br><br>
        <img class="login-icon" src="img/Recurso 10.svg" alt="">
        <br>
        <h3><span>Login</span> to your account</h3>
        <form method="post" action="login.php" class="form-login" id="main_form-login">
        <?php
            if($onError){
                echo "<p class='error_login' style='display: block; color: red;'> Invalid username or password </p>";
            }
         ?>
            <label class="form-text" id="username">Username:</label><br>
            <input class="form-login_imput" type="text" name="username" placeholder="Your username.."> <br>
            <label class="form-text" id="password">Password:</label><br>
            <input class="form-login_imput" type="password" name="password" placeholder="Your password.."> <br>
            <p class="dont-account">Don't have an account?</p>
            <a href="create.php" class="" id="form-login__p">Create account</a>
            <input class="main-btn btn-login" type="submit" value="Login" id="login">

        </form>
    </section>
    <footer class="main-footer">
        <nav class="footer-nav">
            <a href="index.php"><img class="footer-logo" src="img/logo.png" alt="Secret du Chef's logo"></a>
            <ul class="footer-imgs">
                <li class="footer-li_item">
                    <a class="footer-li_link"><img class="footer-li_img" src="img/fb.png" alt="facebook"></a>
                </li>
                <li class="footer-li_item">
                    <a class="footer-li_link"><img class="footer-li_img" src="img/instagram.png" alt="instagram"></a>
                </li>
                <li class="footer-li_item">
                    <a class="footer-li_link"><img class="footer-li_img" src="img/pinterest.png" alt="pinterest"></a>
                </li>
                <li class="footer-li_item">
                    <a class="footer-li_link"><img class="footer-li_img" src="img/youtube.png" alt="youtube"></a>
                </li>
            </ul>
            <p class="footer-p"> A proyect by <br> Priscilla Rivera <br> Hiram González</p>
        </nav>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/login.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.18.0/jquery.validate.min.js"></script>
</body>

</html>