<?php
require_once 'model/category.php';
$class=new Category();
    switch($action)
        {
        case 'index':
                $categories = $class->showIndex();
            break;

        case 'delete':
               $parent = $class->isParentOne($_GET['q']);

               if ($parent['is_parent'] == 1){
                   $result = $class->allIsParent($parent['id']);

                   foreach ($result as $res){
                       $class->deleteIsParentOne($res['id']);
                   }
               }

                $class->deleteIsParentOne($parent['id']);

                $isparent = $class->showEdit($parent['parent']);
                if ($isparent['is_parent'] == "1"){
                    $output=$class->allIsParent($isparent['id']);
                    if (empty($output)){
                        $class->zeroIsParent($isparent['id']);
                    }
                }
               header("location:index.php?c=category&a=index");
            break;
        case 'add':
                $query = $_GET['q'];
                header("category/add.php?q=$query");

            break;

        case 'store':

            if ($_GET['q'] != "main"){
                $result = $class->allIsParentOneadd($_GET['q']);
                $class->updateIsParent($result['id']);
                $class->insert($_POST,$result['id']);
                header("location:index.php?c=category&a=index");
            }else{
                $class->mainCat($_POST);
                header("location:index.php?c=category&a=index");
            }

            break;

        case 'edit':
            $query = $_GET['q'];
            header("category/edit.php?q=$query");
            break;

        case 'update':
            $result = $class->updateCat($_POST['name'],$_GET['q']);
            header("location:index.php?c=category&a=index");
            break;
        }

        require_once "view/category/$action.php";