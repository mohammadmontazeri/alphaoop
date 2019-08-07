<?php
include 'jdf.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">لیست همه کاربران</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">

                    <tr style="background-color: #4e555b; color: white">
                        <th>آی دی کاربر</th>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>تصویر</th>
                        <th style="width: 11%;">تاریخ عضویت</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    <?php
                        foreach ($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><img src="#"></td>
                        <td><?php

                            date_default_timezone_set('Asia/Tehran');
                            print jdate("y/m/d G.i:s", $user['created_at']);?></td>
                        <td>
                            <a class="label label-primary" href="#">ویرایش</a>
                        </td>
                        <td>
                            <?php
                            if ($user['email'] != "montazeriput95@gmail.com") {

                                ?>
                                <a class="label label-danger" href="index.php?c=user&a=delete&id=<?php echo $user['id']; ?>">حذف</a>
                                <?php
                            }
                            ?>

                        </td>
                    </tr>

                  <?php } ?>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>