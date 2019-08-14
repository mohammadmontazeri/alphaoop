<?php
include_once "panel/jdf.php";
include_once 'panel/model/post.php';
$obj = new Post();
if (!isset($_GET['page'])){
    $page = "1";
}else{
    $page = $_GET['page'];
}
$number_post = $obj->numOfPostCat($category['id'])->rowCount();
$number_of_records =$number_post;
$number_result_per_pages = "2";
$number_of_pages = ceil($number_of_records/$number_result_per_pages);
$first = ($page-1)*2;
//echo $first."=".$number_of_pages."=".$number_result_per_pages."+";die;
$posts = $obj->showPaginateInCat($first,$number_result_per_pages,$category['id']);
?>
<!--<link rel="stylesheet" href="ghaleb/ChiGap/css/style.css">
--><section class="cat_part">
    <div class="cat_content">
        <div class="title_content">
                <span class="cat_name">
                    تمامی نوشته های دسته: <span class="succes" style="font-weight: bolder"><?php echo $category['name']?></span>
                </span>
            <span class="number_cat">
                    تعداد کل نوشته ها : <span class="number" style="font-weight: bolder"><?php echo $number_post ?></span>
                </span>
        </div>
    </div>
</section>
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
                <a href="index.php?c=post&id=<?php echo $post['id'] ?>">
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
    <div style="background-color: red;margin-bottom: 30px;position: relative;">
        <ul style="display: flex;flex-direction: row-reverse;position: absolute;margin-right: 50%;">
            <?php
            for ($page=1;$page<=$number_of_pages;$page++){
                ?>
                <li style="margin-right: 7px;"><a href="index.php?c=category&id=<?php echo $category['id']?>&page=<?php echo $page;?>" style="color: #f0004c;font-weight: bolder;"><?php echo $page?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</section>

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