<?php


// Parameters
if(isset($_FILES['upload']['name'])) {
    $type = $_GET['type'];
    $CKEditor = $_GET['CKEditor'];
    $funcNum = $_GET['CKEditorFuncNum'];

// Image upload
    if ($type == 'image') {

        $allowed_extension = array(
            "png", "jpg", "jpeg"
        );

        // Get image file extension
        $file_extension = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);

        if (in_array(strtolower($file_extension), $allowed_extension)) {

            if (move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/" . $_FILES['upload']['name'])) {

                $url = "http://localhost:8080". "/alpha/panel/uploads/" . $_FILES['upload']['name'];

                echo '<script>window.parent.CKEDITOR.tools.callFunction(' . $funcNum . ', "' . $url . '", "' . $message . '")</script>';
            }

        }

        exit;
    }
}
/*if(isset($_FILES['upload']['name']))
{
    $file = $_FILES['upload']['tmp_name'];
    $file_name = $_FILES['upload']['name'];
    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);
    $new_image_name = rand() . '.' . $extension;
    chmod('upload', 0666);
    $allowed_extension = array("jpg", "gif", "png");
    if(in_array($extension, $allowed_extension))
    {
        move_uploaded_file($file, 'uploads/' . $new_image_name);
        $function_number = $_GET['CKEditorFuncNum'];
        $url = 'uploads/' . $new_image_name;
        $message = '';
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    }
}*/
class Upload{


    public function uploadImage($image,$post_title)
    {
        $name = $image['name'];
        $sName = explode('.',$name);
        $end = end($sName);
        $rand = rand(100,999);
        $picname = $rand."_".$post_title.".".$end;
        $path = "uploads/".$picname;
        move_uploaded_file($image['tmp_name'],$path);
        return $path;

    }








}