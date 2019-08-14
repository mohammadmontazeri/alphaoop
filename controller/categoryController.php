<?php
include_once 'panel/model/category.php';
$obj = new Category();
//var_dump($_GET['id']);die;
    //$posts = $obj->displayPost($_GET['id']);
    $category = $obj->showEdit($_GET['id']);
require_once "view/category/index.php";
