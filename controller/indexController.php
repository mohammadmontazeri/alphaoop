<?php
include_once 'panel/model/post.php';
$obj = new Post();
switch ($action){

        case 'index':
            $randpost = $obj->ShowRandIndex();
            //$posts = $obj->showIndex();
            break;
    case 'search':
        $posts = $obj->searchPost($_POST['body']);

        break;




}
include_once "view/index/$action.php";