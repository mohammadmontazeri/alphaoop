<?php
ob_start();
session_start();

if (!isset($_SESSION['login'])){
    header("location:login.php?loginError");
}
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



include_once "view/layouts/aside.php";
include_once "view/layouts/footer.php";




