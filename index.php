<?php

// Display every errors during development

use FFI\CData;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get site's controller
require_once "controllers/SiteController.php";
// Get $routes
require_once("config/routes.php");
// Get Messages class
require_once("utils/Errors.php");
require_once("utils/Success.php");

// Start session
session_start();

$errors = new Errors();
$controller = new SiteController();

// Select the requested route
$route_name = $_GET["path"] ?? "index";

// Controller's method to call
$method = $routes[$route_name] ?? "error404";

if(!isset($_SESSION["last_page"])) $_SESSION["last_page"] = "index";
if(!isset($_SESSION["actual_page"])) $_SESSION["actual_page"] = "index";

// Calls the method dynamically
$controller->{$method}();