<?php
session_start();

require_once 'src/functions.php';

$loadPage = "";
$translatedText = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['toMorse'])) {
        $translatedText = translateHumanToMorse($_POST['toMorse'], $morseCode);
    } else if (isset($_POST['toText'])) {
        $translatedText = translateMorseToHuman($_POST['toText'], $morseCode);
    }
}

if (isset($_GET['load_page']) && ($_GET['load_page'] === 'contact' 
        || $_GET['load_page'] === 'main' || $_GET['load_page'] === 'sources')) {
    $loadPage = $_GET['load_page'];
}

if (isset($_GET['translate_to']) && ($_GET['translate_to'] === 'esperanto' 
        || $_GET['translate_to'] === 'pl' || $_GET['translate_to'] === 'en' 
        || $_GET['translate_to'] === 'fr')) {
    $_SESSION['language'] = $_GET['translate_to'];
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
        <META http-equiv="Content-Language" content="pl,en,fr,eo">
        <title> Morsem go! </title>
        <meta name="description" content="morse code translator" />
        <meta name="keywords" content="ccwrc morse code translator tłumacz alfabetu morsa" />
        <meta name="author" content="ccwrc">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/app.js"></script>	
    </head>
    <body>    
        <div id="divContainer">

            <div id="divMenu">
                <ul class="ulMenu">
                    <li class="menuButton"><img src="img/pl.png"/> <a href="index.php?translate_to=pl">Polski</a></li>
                    <li class="menuButton"><img src="img/en.png"/> <a href="index.php?translate_to=en">English</a></li>
                    <li class="menuButton"><img src="img/fr.png"/> <a href="index.php?translate_to=fr">Français</a></li>
                    <li class="menuButton"><img src="img/es.png"/> <a href="index.php?translate_to=esperanto">Esperanto</a></li>
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
                    <li class="menuButton"><a href="index.php?load_page=main"><?=$textTranslate[$language]['translator']?></a></li>
                    <li class="menuButton"><a href="index.php?load_page=contact"><?=$textTranslate[$language]['contact']?></a></li>
                    <li class="menuButton"><a href="index.php?load_page=sources"><?=$textTranslate[$language]['sources']?></a></li>
                    <li class="menuButton"><a href="https://github.com/ccwrc" target="_blank" 
                                           title="<?=$textTranslate[$language]['openInNewWindow']?>"><?=$textTranslate[$language]['author']?></a></li>
                </ul> 
            </div>

        </div>
    </body>
</html>

