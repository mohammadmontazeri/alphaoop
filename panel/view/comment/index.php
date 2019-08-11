<?php
include_once "model/comment.php";
include 'jdf.php';
function postId($post_id){
       $class = new Comment();
       $res = $class->ShowPostIdIndex($post_id);
      // var_dump($res['title']);
    return $res['title'];
}
function userId($user_id){
    $class = new Comment();
    $res = $class->ShowUserIdIndex($user_id);
    return $res['name'];
}
function status($status){
    if ($status == 0){
        return "<span style='color: #f0004c'>غیر فعال </span>";
    }else{
        return "<span style='color: #3c763d;'>فعال </span>";
    }
}
if (!isset($comments)){
    echo "<a href='index.php?c=comment&a=add'><i class='fa fa-plus-square'></i></a>";
}else {
    /*    function parent($parent)
        {
            $obj = new Comment();
            $parents = $obj->answerOfId($parent);
            echo "<ul>";

            foreach ($parents as $par) {
                echo "<li style='list-style-type: none;border: solid .5px #cccccc;padding: 8px 4px ;border-radius: 3px;background-color: #b98585;'>$par[body]<a href='index.php?c=comment&a=status&id=$par[id]' style='color: #ffffff;font-size: 1em;margin-right: 10px;'>".status($par['status'])."</a></li><a href='index.php?c=comment&a=add&q=$par[id]'><i class='fa fa-plus-square'></i></a><a style='color: red;margin-right: 5px' href='index.php?c=comment&a=delete&q=$par[id]'><i class='fa fa-times'></i></a><a style='color: green;margin-right: 5px;' href='index.php?c=comment&a=edit&q=$par[id]'><i class='fa fa-edit'></i></a><span style='color:#fff;padding: 1.5px 2.5px;border-radius:2px;background-color:#595959;font-size: 0.85em;font-weight: bolder;margin-right: 10px;'>".userId($par['user_id'])."</span>";
                if ($par['is_parent'] == "1") {
                    parent($par['id']);
                }
            }


            echo "</ul>";
        }

        function ch($comment)
        {
            echo "<ul>";
            foreach ($comment as $key => $item) {

                if (($item['parent'] == "") && ($item['is_parent'] == "1")) {
                    echo "<li style='list-style-type: none;border: solid .5px #cccccc;padding: 8px 4px ;border-radius: 3px;background-color: #94bfd6;'>$item[body]<a href='index.php?c=comment&a=status&id=$item[id]' style='color: #ffffff;font-size: 1em;margin-right: 10px;'>".status($item['status'])."</a>"."<span class='label-danger' style='float: left;margin-left: 7px;padding: 3.5px 5px;font-size: .8em;border-radius: 2px;'>".postId($item['post_id'])."</span>"."</li><a href='index.php?c=comment&a=add&q=$item[id]'><i class='fa fa-plus-square'></i></a><a style='color: red;margin-right: 5px' href='index.php?c=comment&a=delete&q=$item[id]'><i class='fa fa-times'></i></a><a style='color: green;margin-right: 5px;' href='index.php?c=comment&a=edit&q=$item[id]'><i class='fa fa-edit'></i></a><span style='color:#fff;padding: 1.5px 2.5px;border-radius:2px;background-color:#595959;font-size: 0.85em;font-weight: bolder;margin-right: 10px;'>".userId($item['user_id'])."</span>";
                    parent($item['id']);
                }
                if (($item['parent'] == "") && ($item['is_parent'] == "0")) {
                    echo "<li style='list-style-type: none;border: solid .5px #cccccc;padding: 8px 4px ;border-radius: 3px;background-color: #94bfd6;'>$item[body]<a href='index.php?c=comment&a=status&id=$item[id]' style='color: #ffffff;font-size: 1em;margin-right: 10px;'>".status($item['status'])."</a>"."<span class='label-danger' style='float: left;margin-left: 7px;padding: 3.5px 5px;font-size: .8em;border-radius: 2px;'>".postId($item['post_id'])."</span>"."</li><a href='index.php?c=comment&a=add&q=$item[id]'><i class='fa fa-plus-square'></i></a><a style='color: red;margin-right: 5px' href='index.php?c=comment&a=delete&q=$item[id]'><i class='fa fa-times'></i></a><a style='color: green;margin-right: 5px;' href='index.php?c=comment&a=edit&q=$item[id]'><i class='fa fa-edit'></i></a><span style='color:#fff;padding: 1.5px 2.5px;border-radius:2px;background-color:#595959;font-size: 0.85em;font-weight: bolder;margin-right: 10px;'>".userId($item['user_id'])."</span>";
                }
            }
            echo "</ul>";
            echo "<a style='margin-right: 10px;' href='index.php?c=comment&a=add&q=main'><i class='fa fa-plus-square'></i></a>";
        }

        ch($comments);*/
    ?>

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست همه کامنت ها</h3>
                    <a class="label label-warning" href="index.php?c=comment&a=add&q=main" style="float: left;padding: 7px;">افزودن کامنت جدید</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">

                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی </th>
                            <th>متن</th>
                            <th>نویسنده</th>
                            <th>تاریخ ثبت </th>
                            <th>وضعیت</th>
                            <th>دسته بندی</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                            <th>پاسخ دادن</th>
                        </tr>
                        <?php
                        foreach ($comments as $post){
                            ?>
                            <tr>
                                <td><?php echo $post['id'] ?></td>
                                <td><?php echo $post['body'] ?></td>
                                <td><?php echo userId($post['user_id']) ?></td>
                                <td><?php
                                    date_default_timezone_set('Asia/Tehran');
                                    print jdate("y/m/d G.i:s", $post['created_at']);?></td>
                                <td><a href="index.php?c=comment&a=status&id=<?php echo $post['id']?>" style="color: #ffffff;font-size: 1em;margin-right: 10px;"><?php echo status($post['status']) ?></a></td>
                                <td><?php echo postId($post['post_id']); ?></td>
                                <td>
                                    <a class="label label-primary" href="index.php?c=comment&a=edit&q=<?php echo $post['id'] ?>">ویرایش</a>
                                </td>
                                <td>
                                    <a class="label label-danger" href="index.php?c=comment&a=delete&q=<?php echo $post['id']?>">حذف</a>
                                </td>
                                <td>
                                    <a class="label label-info" href="index.php?c=comment&a=add&q=<?php echo $post['id']?>">پاسخ بده </a></td>
                            </tr>

                        <?php } ?>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>


    <?php
}
?>