<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="ghaleb/ChiGap/css/style.css">
    <link rel="stylesheet" href="ghaleb/ChiGap/css/owl.carousel.min.css">
    <link rel="stylesheet" href="ghaleb/ChiGap/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="ghaleb/ChiGap/css/media.css">
    <script type="text/javascript" src="ghaleb/ChiGap/js/Untitled.js"></script>
    <script type="text/javascript" src="ghaleb/ChiGap/js/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>چی گپ |گپ هاتو تو چی گپ بنویس</title>
</head>
<body>
<div class="viewports">

</div>
<!--======header========-->

<header class="header_item">
    <div class="logotop">
        <a href="index.php">
          <span class="f_logo">
              چی
          </span>
        <span class="s_logo">
              گپ
          </span>
        </a>
    </div>
    <!--  <div class="reg_sig">
         <a href="#" class="sig">
               ورود
           </a>
           <a href="#" class="bet">
               |
           </a>
           <a href="#" class="reg">
               ثبت نام
           </a>
       </div>-->
    <!--<div class="hidden_welcome">
        <div class="welcome">
            <a href="#">نوشتن پست جدید</a>
        </div>
        <div class="user_part_login">
            <a href="#" class="profile">
                پروفایل شما
            </a>
            <a href="#" class="bet">
                |
            </a>
            <a href="#" class="exit">
                خروج              </a>
        </div>
    </div>-->
</header>
<section class="menu">
    <div class="sub_menu">
         <span class="all_sub" style="font-weight: bolder">
             دسته بندی نوشته ها
         </span>
        <div class="sub">
            <?php
            foreach ($cats as $cat) {
                ?>
                <a href="index.php?c=category&id=<?php echo $cat['id']?>">
                    <?php echo $cat['name']?>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</section>
