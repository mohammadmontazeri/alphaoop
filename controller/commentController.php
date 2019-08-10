<?php
include_once 'panel/model/comment.php';
$obj = new Comment();
//var_dump($_GET['id']);die;
   switch ($action){
       case 'add':
           $post_id = $_GET['id'];
           $res=$obj->registerAuth($_POST['email']);
           if (!empty($res)){
               if ($_POST['name'] != $res['name']){

                   header("location:index.php?c=post&id=$post_id&q=error");
               }else{
                   $user_id = $res['id'];
                   $obj->commentAddFromUser($_POST['body'],$user_id,$post_id);
                   header("location:index.php?c=post&id=$post_id");
               }
           }else{
               $name = $obj->registerAuthName($_POST['name']);
                   if (empty($name)){
                   $result = $obj->registerForComment($_POST);
                   $user = $obj->registerAuth($_POST['email']);
                   $user_id = $user['id'];
                   $obj->commentAddFromUser($_POST['body'],$user_id,$post_id);
                   header("location:index.php?c=post&id=$post_id");
                   }else{
                       header("location:index.php?c=post&id=$post_id&q=existedName");
                   }
           }

           break;
       case 'reply':

           break;

       case 'addreply':
            $post_id = $_GET['post_id'];
            $parent = $_GET['parent'];
            $user = $obj->registerAuthName($_POST['name']);
            $obj->commentAddReplyFromUser($_POST['body'],$user['id'],$post_id,$parent);
            $obj->CommentAddIsParent($parent);
           header("location:index.php?c=post&id=$post_id&insertCmntOk");
           break;

   }
require_once "view/comment/$action.php";
