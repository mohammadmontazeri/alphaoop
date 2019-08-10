<?php
if(isset($_FILES['upload']['name']))
{
    $file = $_FILES['upload']['tmp_name'];
    $file_name = $_FILES['upload']['name'];
    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);
    $new_image_name = rand() . '.' . $extension;
    $allowed_extension = array("jpg", "gif", "png");
    if(in_array($extension, $allowed_extension))
    {
        move_uploaded_file($file, 'uploads/' . $new_image_name);
        $function_number = $_GET['CKEditorFuncNum'];
        $url ="http://localhost:8080"."/alpha/panel/uploads/" . $new_image_name;
        $message = '';
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    }
}
class Upload{


    public function uploadImage($image,$post_title)
    {
        $name = $image['name'];
        $sName = explode('.',$name);
        $end = end($sName);
        $rand = rand(100,999);
        $picname = $rand."_".".".$end;
        $path = "uploads/".$picname;
        move_uploaded_file($image['tmp_name'],$path);
        return $path;

    }








}