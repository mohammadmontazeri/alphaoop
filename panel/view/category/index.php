<?php
include_once "model/category.php";

if (!isset($categories)){
    echo "<a href='index.php?c=category&a=add'><i class='fa fa-plus-square'></i></a>";
}else {
    function parent($parent)
    {
        $obj = new Category();
        $parents = $obj->parentId($parent);
       // var_dump($parents['name']);die;
        echo "<ul>";

        foreach ($parents as $par) {
            echo "<li style='list-style-type: none'>$par[name]<a style='color: red' href='index.php?c=category&a=delete&q=$par[name]'><i class='fa fa-times'></i></a><a style='color: green' href='index.php?c=category&a=edit&q=$par[id]'><i class='fa fa-edit'></i></a></li><a href='index.php?c=category&a=add&q=$par[name]'><i class='fa fa-plus-square'></i></a>";

            if ($par['is_parent'] == "1") {
                parent($par['id']);
            }
        }


        echo "</ul>";
    }

    function ch($category)
    {
        echo "<ul>";
        foreach ($category as $key => $cat) {

            if (($cat['parent'] == "") && ($cat['is_parent'] == "1")) {
                echo "<li style='list-style-type: none'>$cat[name]<a style='color: red' href='index.php?c=category&a=delete&q=$cat[name]'><i class='fa fa-times'></i></a><a style='color: green' href='index.php?c=category&a=edit&q=$cat[id]'><i class='fa fa-edit'></i></a></li><a href='index.php?c=category&a=add&q=$cat[name]'><i class='fa fa-plus-square'></i></a>";
                parent($cat['id']);
            }
            if (($cat['parent'] == "") && ($cat['is_parent'] == "0")) {
                echo "<li style='list-style-type: none'>$cat[name]<a style='color: red' href='index.php?c=category&a=delete&q=$cat[name]'><i class='fa fa-times'></i></a><a style='color: green' href='index.php?c=category&a=edit&q=$cat[id]'><i class='fa fa-edit'></i></a></li><a href='index.php?c=category&a=add&q=$cat[name]'><i class='fa fa-plus-square'></i></a>";
            }
        }
        echo "</ul>";

    }
    echo "<a style='margin-right: 10px;background-color: #bbb;color: #fff;border-radius: 2px;padding: 2.5px 3.5px;' href='index.php?c=category&a=add&q=main'><span>افزودن دسته جدید</span></a>";
    ch($categories);
}
?>