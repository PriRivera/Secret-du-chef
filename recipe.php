<?php
//'response.php?id=".$i."
    namespace Medoo;
    require 'Medoo.php';
    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'secret_du_chef',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);
    session_start();
    $recipesId = $database->select("tb_recipes", "id_recipe");
    if($_GET){
        foreach ($recipesId as $id) {
            if ($_GET["id"]==$id) {
                $recipe = $database->select("tb_recipes", "*",["id_recipe"=>$id]);
                $ingredients = $database -> select("tb_ingredients","*",["id_recipe"=>$id]);
                $user = $database -> select("tb_users","*",["id_user"=>$recipe[0]["recipe_user_id"]]);
                $like = $database->select("tb_recipe_votes", "*",["AND"=>["id_recipe"=>$id,"id_user"=>$_SESSION["usrid"]]]);
            }
        }
        if($user[0]['username']==null){
            $user[0]['username']='Anonimus user';
        }
        if($recipe[0]['recipe_status']==null  && $_SESSION['usrtype']==2){
            header("location:recipe-pending.php");
        }
        if((empty($recipe) || $recipe[0]['recipe_status']=='0') && $_SESSION['usrtype']==2){
            header("location:recipe-not-found.php");
        }
    }else{        
        header("location:index.php");
    }
    if($_POST){
        if(isset($_POST["logout"])){
            session_destroy();
            header("location:index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="¿Que se supone que va aquí"> <!--Aiuda-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Icon Library-->
    <title>Baked potato</title>
</head>
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
                            ";#<a href="" class="burger-menu__link"><li class="burger-menu__li">Logout</li></a>
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
    <section class="recipe-sector">
        <h1 class="recipe-title"><?php echo $recipe[0]["recipe_name"]?></h1>
        <div class="left-block">
            <div class="recipe-image--container">
                <img class="recipe-image" src="imgs/<?php echo $recipe[0]["recipe_image"]?>" alt="Baked potato.">
            </div>
        </div>
        <div class="right-block">
            <h3><span>Author</span></h3>
            <p>By: <?php echo $user[0]['username'] ?></p>
            <br>
            <h3><span>Description</span></h3>
            <p class="main-p"><?php echo $recipe[0]["recipe_description"]?></p>
        </div>
        <div class="central-block">
            <br><br>
            <h3><span>Ingredients</span> list</h3> <br>
            <table class="ingredient-table">
                <tr class="ingredient-title">
                    <th>Ingredient</th>
                    <th>Amount</th> 
                    <th>Measure</th>
                </tr>         
                <?php
                    foreach ($ingredients as $value) {
                        echo "<tr><th>".$value["ingredient_name"]."</th><th>".$value["ingredient_amount"]."</th><th>".$value["ingredient_measure"]."</th></tr>";
                    }
                ?>
            </table>
            <br><br>
            <h3><span>Preparation</span> instructions.</h3>
            <p class="main-p"><?php echo $recipe[0]["recipe_instructions"]?></p>
                <div class="vote_recipe">
                <h4>Vote for this recipe</h4>
                <button id="likeBtn" class="fa fa-heart-o main-heart vote_btn" style="font-size:50px; <?php if($like == null) echo'display:block'; else echo'display:none';?> " onclick="likeRecipe(<?php echo $recipe[0]['id_recipe'] ?>, <?php echo $_SESSION['usrid'] ?>)"></button>
                <button id="dislikeBtn" class="fa fa-heart main-heart vote_btn" style="font-size:50px; <?php if($like == null) echo'display:none'; else echo'display:block';?> " onclick="dislikeRecipe(<?php echo $recipe[0]['id_recipe'] ?>, <?php echo $_SESSION['usrid'] ?>)"></button>
            </div>
    </section>
    <footer class="main-footer">
        <nav class="footer-nav">
            <a href="index.php"><img class="footer-logo" src="img/logo.png" alt="Secret du Chef's logo"></a>
            <ul class="footer-imgs">
                <li class="footer-li_item"><a class="footer-li_link"></a><img class="footer-li_img" src="img/fb.png" alt="facebook"></a></li>
                <li class="footer-li_item"><a class="footer-li_link"></a><img class="footer-li_img" src="img/instagram.png" alt="instagram"></a></li>
                <li class="footer-li_item"><a class="footer-li_link"></a><img class="footer-li_img" src="img/pinterest.png" alt="pinterest"></a></li>
                <li class="footer-li_item"><a class="footer-li_link"></a><img class="footer-li_img" src="img/youtube.png" alt="youtube"></a></li>
            </ul>   
            <p class="footer-p"> A proyect by <br> Priscilla Rivera <br> Hiram González</p> 
        </nav>       
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/admin-recipe.js"></script>
</body>
</html>