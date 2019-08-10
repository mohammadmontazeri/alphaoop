<?php
include_once 'panel/model/post.php';
$obj = new Post();
//var_dump($_GET['id']);die;
$id = $_GET['id'];
$post = $obj->detailPost($id);
$comments = $obj->ShowAllCommentIbPostPage($id);

require_once "view/post/index.php";
