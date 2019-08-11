<?php
include_once "panel/jdf.php";
?>
<!--<link rel="stylesheet" href="ghaleb/ChiGap/css/style.css">
-->
<?php
if($posts == ""){
    echo "موردی یافت نشد";
}
else {
    ?>
    <section class="all_posts">
        <div class="posts">
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
                                 print jdate("j F Y - h:s", $post['created_at']);
                                 ?>
                    </span>
                        </div>
                    </div>
                    <div class="left">
                        <a href="http://localhost:8080/alpha/index.php?c=post&id=<?php echo $post['id'] ?>">
                            <?php echo $post['title']?>
                        </a>
                        <p>
                            <?php echo substr($post['summery'],0,29)."..."?>
                        </p>
                        <div class="img_box">
                            <img src="http://localhost:8080/alpha/panel/<?php echo $post['image']?>">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php
} ?>


<!--<div class="post_content">
    <div class="post">
        <div class="right">
            <a href="#" id="pic_member">
                <img src="images/OH1W8B0.jpg">
            </a>
            <div class="detail_member">
                <a href="#" id="name_member">
                    پسر شجاع
                </a>
                <span>
                          ۳ روز پیش
                      </span>
            </div>
        </div>
        <div class="left">
            <a href="#">
                من یک برنامه نویس هستم !
            </a>
            <p>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ...
            </p>
            <div class="img_box">
                <img src="images/28419.jpg">
            </div>
        </div>
    </div>
</div>-->