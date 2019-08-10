<?php
if (isset($_GET['q']))
$query = $_GET['q'];
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ویرایش کامنت </div>
                <div class="card-body">
                    <form method="POST" action="index.php?c=comment&a=update&q=<?php echo $query?>">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="body" value="" required autocomplete="name" autofocus>
                                <?php echo $body['body']?>
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

