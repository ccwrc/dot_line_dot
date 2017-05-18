<?php
session_start();

require_once 'src/functions.php';

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
        <title> dot </title>
        <meta name="description" content="dummy desc" />
        <meta name="keywords" content="dummy " />
        <meta name="author" content="ccwrc">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
<!--        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/app.js"></script>	-->
    </head>
    <body>    
        <div id="divContainer">
            
            <div id="divMenu">
                menu
            </div>
            
            <div id="divContent">
                content
            </div>
            
            <div id="divFooter">
                footer
            </div>
            
        </div>
    </body>
</html>

