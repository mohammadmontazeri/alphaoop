<?php
include_once 'panel/model/category.php';
include_once 'panel/model/post.php';
$obj = new Post();
$cats = $obj->showCatAdd();