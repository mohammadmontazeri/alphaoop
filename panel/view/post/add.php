<?php
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">افزودن پست جدید</h3>
        <?php
            if (isset($_GET['q'])){
                echo  "<span style='color: #f0004c'>**همه موارد را تکمیل کنید**</span>";
            }
        ?>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="index.php?c=post&a=store" enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">عنوان پست</label>
                <input type="text" class="form-control" name="title"   placeholder="عنوان پست خود را وارد کنید">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">دسته بندی را انتخاب کنید</label>
                <select name="cat_id" id="">
                    <?php foreach ($res as $re){
                    ?>
                        <option value="<?php echo $re['id']?>"><?php echo $re['name']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">نویسنده</label>
                <input type="text" class="form-control" name="writer" placeholder="نویسنده را وارد کنید">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">خلاصه متن</label>
                <input type="text" class="form-control" name="summery" placeholder="خلاصه متن را وارد کنید">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">متن محتوا</label>
                <textarea class="form-control" id="editor1" class="ckeditor" name="text">
                </textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="exampleInputFile">تصویر شاخص</label>
                <input type="file" id="exampleInputFile" name="image">
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="btn">افزودن</button>
        </div>
    </form>
</div><!-- /.box -->