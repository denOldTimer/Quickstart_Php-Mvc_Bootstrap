<?php
// ------------------------------ THE INSTANTIATOR -------------------------------------------

// COMPOSER
//require "../vendor/autoload.php";

// TWIG
//Twig_Autoloader::register();

// SC APP
require "../.paths";
require PATH_CORE . "Functions.php";
require PATH_CORE . "App.php";
$app = new App\Core\App();
