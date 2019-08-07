<?php
include_once "model/comment.php";

if (!isset($comments)){
    echo "<a href='index.php?c=comment&a=add'><i class='fa fa-plus-square'></i></a>";
}else {
    function parent($parent)
    {
        $obj = new Comment();
        $parents = $obj->answerOfId($parent);
        echo "<ul>";

        foreach ($parents as $par) {
            echo "<li style='list-style-type: none'>$par[body]<a style='color: red' href='index.php?c=comment&a=delete&q='><i class='fa fa-times'></i></a><a style='color: green' href='index.php?c=comment&a=edit&q='><i class='fa fa-edit'></i></a></li><a href='index.php?c=comment&a=add&q=$par[id]'><i class='fa fa-plus-square'></i></a>";

            if ($par['is_parent'] == "1") {
                parent($par['id']);
            }
        }


        echo "</ul>";
    }

    function ch($comment)
    {
        echo "<ul>";
        foreach ($comment as $key => $cat) {

            if (($cat['parent'] == "") && ($cat['is_parent'] == "1")) {
                echo "<li style='list-style-type: none'>$cat[body]<a style='color: red' href='index.php?c=comment&a=delete&q='><i class='fa fa-times'></i></a><a style='color: green' href='index.php?c=comment&a=edit&q='><i class='fa fa-edit'></i></a></li><a href='index.php?c=comment&a=add&q=$cat[id]'><i class='fa fa-plus-square'></i></a>";
                parent($cat['id']);
            }
            if (($cat['parent'] == "") && ($cat['is_parent'] == "0")) {
                echo "<li style='list-style-type: none'>$cat[body]<a style='color: red' href='index.php?c=comment&a=delete&q='><i class='fa fa-times'></i></a><a style='color: green' href='index.php?c=comment&a=edit&q='><i class='fa fa-edit'></i></a></li><a href='index.php?c=comment&a=add&q=$cat[id]'><i class='fa fa-plus-square'></i></a>";
            }
        }
        echo "</ul>";
        echo "<a style='margin-right: 10px;' href='index.php?c=comment&a=add&q=main'><i class='fa fa-plus-square'></i></a>";
    }

    ch($comments);
}
?>