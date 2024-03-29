<?php
include 'jdf.php';
include_once 'model/post.php';
$obj = new Post();
if (!isset($_GET['page'])){
    $page = "1";
}else{
    $page = $_GET['page'];
}
$number_of_records =$obj->numOfRec()->rowCount();
$number_result_per_pages = "2";
$number_of_pages = ceil($number_of_records/$number_result_per_pages);
$first = ($page-1)*2;
//echo $first."=".$number_of_pages."=".$number_result_per_pages."+";die;
$posts = $obj->showIndex($first,$number_result_per_pages);
?>
<div class="row">
    <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">لیست همه پست ها</h3>
                <a class="label label-warning" href="index.php?c=post&a=add" style="float: left;padding: 7px;">افزودن پست جدید</a>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">

                    <tr style="background-color: #4e555b; color: white">
                        <th>آی دی </th>
                        <th>عنوان</th>
                        <th>خلاصه</th>
                        <th>نویسنده</th>
                        <th>تاریخ ثبت </th>
                        <th>دسته بندی</th>
                        <th>محتوای پست</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    <?php
                        foreach ($posts as $post){
                    ?>
                    <tr>
                        <td><?php echo $post['id'] ?></td>
                        <td><?php echo $post['title'] ?></td>
                        <td><?php
                            $sum = substr($post['summery'],0,8);
                            echo $summery = $sum."..."; ?></td>
                        <td><?php echo $post['writer'] ?></td>
                        <td><?php
                            date_default_timezone_set('Asia/Tehran');
                            print jdate("y/m/d G.i:s", $post['created_at']);?></td>
                        <td><?php
                            include_once 'model/category.php';
                            $obj = new Category();
                            $res = $obj->showEdit($post['cat_id']);
                            echo $res['name'];
                            ?></td>
                        <td><a class="label label-info" href="index.php?c=post&a=postDetail&q=<?php echo $post['id']?>">متن پست</a></td>
                        <td>
                            <a class="label label-primary" href="index.php?c=post&a=edit&q=<?php echo $post['id']?>">ویرایش</a>
                        </td>
                        <td>
                                <a class="label label-danger" href="index.php?c=post&a=delete&id=<?php echo $post['id']; ?>">حذف</a>
                        </td>
                    </tr>

                  <?php }

                  ?>

                </table>
            </div><!-- /.box-body -->

        </div><!-- /.box -->
        <?php
        for ($page=1;$page<=$number_of_pages;$page++){
            echo "<a style='margin-right:5px;' href='index.php?c=post&a=index&page=".$page."'>".$page."</a>";
        }


        ?>
    </div>
</div>