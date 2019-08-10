<?php
include_once "panel/jdf.php";
?>
<section class="top_post" style="width: 40%;">
      <span class="top_post_head">
         نوشته های انتخاب شده برای شما
      </span>
    <div class="owl-carousel">
        <?php
        foreach ($randpost as $item){
        ?>
        <div class="selected_post">

            <div class="layer">
                <a href="index.php?c=post&id=<?php echo $item['id']?>" id="top_title">
                   <?php echo $item['title'];?>
                </a>
                <div class="char_top_post" style="width: 62%">
                    <img src="http://localhost:8080/alpha/panel/uploads/119_asd.jpg" alt="">
                    <div class="char_user">
                        <a href="#">
                            <?php echo $item['writer'];?>
                        </a>
                        <span>
                                <?php
                                $time = $item['created_at'];
                                print jdate("j F Y - h:s", $time);
                                ?>
                        </span>
                    </div>
                </div>
            </div>
            <img src="http://localhost:8080/alpha/panel/<?php echo $item['image'];?>" alt="">
        </div>

        <?php } ?>

    </div>

</section>
<section class="about_item">
    <div class="about">
          <span>
              به
          </span>
        <span class="f_logo">
              چی
          </span>
        <span class="s_logo">
              گپ
          </span>
        <span class="t_part">
              خوش آمدید...
          </span>
        <p class="about_text">
            اگه بخوام ساده براتون بگم چی گپ جایی واسه کسایی که عاشق نوشتن هستن
            یه شبکه اجتماعی آنلاینه که شما میتونید توی اون دل نوشته ها و مواردی رو تمایل دارید بنوسید . بعد مدتی کار با اون متوجه میشید که اینجا
            میشه جایی که نمیتونید ولش کنید
        </p>
    </div>
</section>
<section class="all_posts" style="width: 50%">
    <h4>
        آخرین نوشته ها
    </h4>
    <div class="posts" >
<?php foreach ($posts as $post){ ?>
        <div class="post">
            <div class="right">
                <a href="#" id="pic_member">
                    <img src="http://localhost:8080/alpha/panel/uploads/119_asd.jpg">
                </a>
                <div class="detail_member">
                    <a href="#" id="name_member">
                       <?php echo $post['writer']?>
                    </a>
                    <span>
                         <?php
                             echo jdate("j F Y - h:s", $post['created_at']);
                         ?>
                      </span>
                </div>
            </div>
            <div class="left">
                <a href="index.php?c=post&id=<?php echo $post['id']?>">
                    <?php echo $post['title']?>
                </a>
                <p>
                    <?php echo substr($post['summery'],0,41)."..."?>
                </p>
                <div class="img_box">
                    <img src="http://localhost:8080/alpha/panel/<?php echo $post['image']?>">
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</section>
