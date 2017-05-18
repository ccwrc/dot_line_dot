<?php
session_start();

require_once 'src/functions.php';

$loadPage = "";

if (isset($_GET['load_page']) && ($_GET['load_page'] === 'contact' 
        || $_GET['load_page'] === 'main' || $_GET['load_page'] === 'sources')) {
    $loadPage = $_GET['load_page'];
}

if (!isset($_SESSION['language'])) {
    $language = "pl";
} else if ($_SESSION['language'] === "en" || $_SESSION['language'] === "esperanto"
        || $_SESSION['language'] === "pl" || $_SESSION['language'] === "fr") {
    $language = $_SESSION['language'];
}
?>

<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title> Morsem go! </title>
        <meta name="description" content="morse code translator" />
        <meta name="keywords" content="ccwrc morse code translator" />
        <meta name="author" content="ccwrc">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
<!--        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/app.js"></script>	-->
    </head>
    <body>    
        <div id="divContainer">

            <div id="divMenu">
                <ul class="ulMenu">
                    <li>Polski</li>
                    <li>English</li>
                    <li>Français</li>
                    <li>Esperanto</li>
                </ul>
            </div>

            <?php
            switch ($loadPage) {
                case "contact":
                    include 'index_content/contact.php';
                    break;
                case "main":
                    include 'index_content/main.php';
                    break;
                case "sources":
                    include 'index_content/sources.php';
                    break;                
                default :
                    include 'index_content/main.php';
            }
            ?>

            <div id="divFooter">
                <ul class="ulMenu">
                    <li><a href="index.php?load_page=main"><?=$textTranslate[$language]['translator']?></a></li>
                    <li><a href="index.php?load_page=contact"><?=$textTranslate[$language]['contact']?></a></li>
                    <li><a href="index.php?load_page=sources"><?=$textTranslate[$language]['sources']?></a></li>
                    <li><a href="https://github.com/ccwrc" target="_blank"><?=$textTranslate[$language]['author']?></a></li>
                </ul>
            </div>

        </div>
    </body>
</html>

