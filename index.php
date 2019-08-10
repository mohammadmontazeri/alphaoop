<?php
ob_start();

//date_default_timezone_set("Asia/Tehran");
include_once "controller/layoutController.php";
include_once "view/layouts/header.php";

if (isset($_GET['c'])){
    $controller = $_GET['c']."Controller";
}else{
    $controller = "indexController";
}
if (isset($_GET['a'])){
    $action = $_GET['a'];
}else{
    $action = "index";
}


require_once "controller/$controller".".php";

include_once "view/layouts/footer.php";




