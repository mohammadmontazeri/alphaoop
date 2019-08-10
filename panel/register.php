<?php
session_start();

if (isset($_POST['btn'])) {
    $_SESSION['data'] = $_POST;
    header("location:index.php?c=user&a=register");
    if (($_POST['name']=="")||($_POST['email']=="")||($_POST['password']=="")){
        header("location:register.php?q=errorfield");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="../ghaleb/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../ghaleb/dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../ghaleb/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="register-page">
<div class="register-box">
   <?php
          if (isset($_GET['m'])){
              echo "<span style='color: #f0004c'> ثبت نام شما با موفقیت انجام شد</span>";
          }
    ?>
    <div class="register-logo">
        <a href="#l"><b>صفحه </b>ثبت نام</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg"><?php
                if (isset($_GET['q'])){
                    if ($_GET['q'] == "error"){
                        echo "<span style='color: #f0004c'>ایمیل وارد شده قبلا ثبت نام کرده است**</span>";
                    }elseif ($_GET['q'] == "errorfield"){
                        echo "<span style='color: #f0004c'>همه خانه ها را پر کنید**</span>";

                    }


                            }
            ?></p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Full name" name="name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="file" class="form-control" name="image">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn">ثبت نام</button>
                </div><!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div>

        <a href="login.html" class="text-center">I already have a membership</a>
    </div><!-- /.form-box -->
</div><!-- /.register-box -->

<!-- jQuery 2.1.4 -->
<script src="../ghaleb/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.4 -->
<script src="../ghaleb/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../ghaleb/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
