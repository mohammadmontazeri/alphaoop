<?php
include_once 'model/post.php';
if ($_GET['q']=="main") {
    $query = $_GET['q'];
    ?>
<
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ایجاد کامنت جدید</div>
                <div class="card-body">
                    <form method="POST" action="index.php?c=comment&a=store&q=<?php echo $query?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">پست را انتخاب کنید</label>
                            <select name="post_id" id="">
                                <?php
                                $obj = new Post();
                                $res = $obj->showIndex();
                                foreach ($res as $re){
                                    ?>
                                    <option value="<?php echo $re['id']?>"><?php echo $re['title']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="body" value="" required autocomplete="name" autofocus>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="btn">
                                    ثبت
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}else {
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ایجاد کامنت جدید</div>
                    <div class="card-body">
                        <form method="POST" action="index.php?c=comment&a=store&q=<?php echo $query?>">
                            <div class="form-group row">
                                <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="body" value="" required autocomplete="name" autofocus>
                                </textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="btn">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php
}
?>

