<?php
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">ویرایش </h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="index.php?c=post&a=update&q=<?php echo $result['id']?>" enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">عنوان پست</label>
                <input type="text" class="form-control" name="title"   value="<?php echo $result['title']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">دسته بندی را انتخاب کنید</label>
                <select name="cat_id" id="">
                    <?php foreach ($cat as $re){
                    ?>
                        <option value="<?php echo $re['id']?>" <?php if ($result['cat_id']==$re['id']){echo "selected";} ?>><?php echo $re['name']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">نویسنده</label>
                <input type="text" class="form-control" name="writer" value="<?php echo $result['writer']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">خلاصه متن</label>
                <input type="text" class="form-control" name="summery" value="<?php echo $result['summery']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">متن محتوا</label>
                <textarea class="form-control" id="editor1" class="ckeditor" name="text"><?php echo $result['text']?>
                </textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="exampleInputFile">تصویر شاخص</label>
                <input type="file" id="exampleInputFile" name="image" value="<?php echo $result['image']?>">
                <img src="<?php echo $result['image']?>">
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="btn">ویرایش</button>
        </div>
    </form>
</div><!-- /.box -->