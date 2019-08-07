<?php
require_once 'model/comment.php';
//include_once 'upload.php';
$class=new Comment();
    switch($action) {

        case 'index':
            $comments = $class->showIndex();
            break;

        case 'add':
            $query = $_GET['q'];
            header("comment/add.php?q=$query");

            break;
        case 'store':

            if ($_GET['q'] != "main"){
                $result = $class->CommentAddIsParent($_GET['q']);
                $post_id = $class->getPostId($_GET['q']);
                $class->CommentAdd($_POST,$post_id['post_id'],$_GET['q']);
                header("location:index.php?c=comment&a=index");
            }else{
                $class->mainCommentadd($_POST);
                header("location:index.php?c=comment&a=index");
            }

            break;


    }
require_once "view/comment/$action.php";