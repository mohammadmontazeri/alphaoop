<?php
require_once 'model/user.php';
$class=new User();
    switch($action)
        {

            case 'register':
             $res=$class->registerAuth($_SESSION['data']['email']);
             if (!empty($res)){
                 session_destroy();
                 header("location:register.php?q=error");
             }else{
                 $result = $class->register($_SESSION['data']);
                 session_destroy();
                 header("location:register.php?okInformation");
             }
            break;

        case 'login':
                $res = $class->login($_SESSION['login']);
                if ($res == "OK"){
                    header("location:index.php");
                }elseif ($res == "incorrect pass"){
                    header("location:login.php?incorrectpass");
                }elseif ($res == "no register"){
                    header("location:login.php?noregister");
                }
            break;

        case 'logout':
            session_destroy();
            header("location:index.php");
            break;

        case 'index':
            $users = $class->showUserIndex();
            break;

        case 'delete':
                $class->deleteUser($_GET['id']);
                header("location:index.php?c=user&a=index");
            break;


        }

        require_once "view/user/$action.php";