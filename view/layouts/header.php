<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="ghaleb/chigap/css/style.css">
    <link rel="stylesheet" href="ghaleb/chigap/css/owl.carousel.min.css">
    <link rel="stylesheet" href="ghaleb/chigap/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="ghaleb/chigap/css/media.css">
    <script type="text/javascript" src="ghaleb/chigap/js/Untitled.js"></script>
    <script type="text/javascript" src="ghaleb/chigap/js/owl.carousel.min.js"></script>
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
    <div style="margin-top: 15px;">
        <form action="index.php?c=index&a=search" method="post">
            <input type="text" name="body" style="width:100%;padding: 6px 4px;box-sizing: border-box;border-radius: 2px;border: solid .5px #ccc;font-family: Vazir;font-size: .7em;" placeholder="پست مورد نظر خود را پیدا کنید ...">
            <button  style="margin-top:5px;font-family: Vazir;font-weight: bold;background-color: #f0004c;color: #fff;padding: 5px 6px;box-sizing: border-box;outline: none;border: #eeeeee;border-radius: 2px;cursor: pointer;" name="btn">جستجو</button>
        </form>
    </div>
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
