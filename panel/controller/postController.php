<?php
require_once 'model/post.php';
include_once 'upload.php';
$obj = new Upload();
$class=new Post();
    switch($action) {

        case 'index':
           //$posts =  $class->showIndex();
            break;

        case 'add':
            $res = $class->showCatAdd();
            break;

        case 'store':
            if (isset($_POST)){
                if (($_POST['title']=="")||($_POST['cat_id']=="")||($_POST['writer']=="")||($_POST['summery']=="")||($_POST['text']=="")||($_FILES['image']['name']=="")){
                    header("location:index.php?c=post&a=add&q=errorfield");
                }
            }
           $url = $obj->uploadImage($_FILES['image'],$_POST['title']);
           $class->insert($_POST,$url);
           header("location:index.php?c=post&a=index");
            break;

        case 'delete':
            $id = $_GET['id'];
            $class->deletePost($id);
            header("location:index.php?c=post&a=index");
            break;

        case 'postDetail':
            $res = $class->detailPost($_GET['q']);
            $detail = $res['text'];
            break;

        case 'edit':
            $id = $_GET['q'];
            $result = $class->showEditInf($id);
            $cat = $class->showCatAdd();
            break;

        case 'update':
            $id = $_GET['q'];
            $url = $obj->uploadImage($_FILES['image'],$_POST['title']);
            $class->updatePost($_POST,$id,$url);
            header("location:index.php?c=post&a=index");
            break;

    }
require_once "view/post/$action.php";