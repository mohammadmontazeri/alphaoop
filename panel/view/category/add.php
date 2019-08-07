<?php
if (isset($_GET['q'])) {
    $query = $_GET['q'];
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ایجاد دسته جدید</div>
                <div class="card-body">
                    <form method="POST" action="index.php?c=category&a=store&q=<?php echo $query?>">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ثبت دسته جدید</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>
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