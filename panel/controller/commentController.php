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
           // var_dump($_POST);die;
            if ($_GET['q'] != "main"){
                $class->CommentAddIsParent($_GET['q']);
                $post_id = $class->getPostId($_GET['q']);
                $result = $class->CommentAdd($_POST,$post_id['post_id'],$_GET['q']);
                header("location:index.php?c=comment&a=index");
            }else{
                $class->mainCommentadd($_POST);
                header("location:index.php?c=comment&a=index");
            }
            break;
        case 'delete':
            $result = $class->isParentDeleteOne($_GET['q']);
            if ($result['is_parent'] == 1){
                $res = $class->subParentIsParent($result['id']);
                foreach ($res as $re){
                    $class->deleteSubParent($re['id']);
                }
            }
            $class->deleteSubParent($_GET['q']);
            header("location:index.php?c=comment&a=index");
            break;

        case 'edit':
            $body = $class->isParentDeleteOne($_GET['q']);
            break;

        case 'update':
            $class->updateComment($_POST,$_GET['q']);
            header("location:index.php?c=comment&a=index");
            break;
        case 'status':
            $comment = $class->isParentDeleteOne($_GET['id']);
            if ($comment['status'] == "0"){
                 $class->UpdateStatusToOne($_GET['id']);
            }else{
                $class->UpdateStatusToZero($_GET['id']);
            }
            header("location:index.php?c=comment&a=index");
            break;

    }
require_once "view/comment/$action.php";