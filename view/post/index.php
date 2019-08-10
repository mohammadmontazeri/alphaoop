<?php
include_once "panel/jdf.php";
include_once "panel/model/comment.php";

?>
<section class="post_bac">
    <div class="post_section">
        <div class="title_post">
            <a href="#">
                <h2>
                        <?php echo $post['title']?>
                </h2>
            </a>
        </div>
        <div class="user_post">
            <div class="usr_pic">
                <img src="http://localhost:8080/alpha/panel/uploads/119_asd.jpg" alt="">
            </div>
            <div class="usr_inf">
                <a href="#">
                    <?php echo $post['writer']?>
                </a>
                <span class="time_distribution">
                   <?php
                   echo jdate("j F Y - h:s", $post['created_at']);
                   ?>
                </span>
            </div>
        </div>
        <div class="post_content">
           <span class="dot">
               ...
           </span>
            <p>
                <?php echo $post['text']?>
            </p>
        </div>
    </div>

</section>

<section class="comment_part">
    <h3>
        نظرات
    </h3>
<?php
if (isset($_GET['q']))
    if ($_GET['q']=="error") {
        echo "<span style='color: #f0004c;'>شما با این ایمیل کامنت ثبت کردید اما نام کاربری شما صحیح نمی باشد</span>";
    }elseif ($_GET['q']=="existedName"){
        echo "<span style='color: #f0004c;'>کاربری با این نام کاربری قبلا ثبت نام کرده است</span>";
    }


 ?>
    <div class="type_cmnt">
        <form method="post" action="index.php?c=comment&a=add&id=<?php echo $post['id'] ?>" enctype="multipart/form-data">
            <input type="email" name="email" style="padding: 10px;margin-bottom: 10px;border: solid .5px #aaa;border-radius: 5px;outline: none;font-size: 1em;font-family: Vazir;box-sizing: border-box;font-weight: 100" placeholder="ایمیل خود را وارد کنید">
            <input type="text" name="name" style="padding: 10px;margin-bottom: 10px;border: solid .5px #aaa;border-radius: 5px;outline: none;font-size: 1em;font-family: Vazir;box-sizing: border-box;font-weight: 100;" placeholder="نام کاربری خود را وارد کنید">
            <div class="typing_part">
                <input type="text" placeholder="در مورد این پست دیدگاهی داری..." name="body">
                <button class="btn_comment" name="btn">
                    ارسال دیدگاه
                </button>
            </div>
        </form>
        <div class="all_comment">

            <?php
            function userId($user_id){
                $class = new Comment();
                $res = $class->ShowUserIdIndex($user_id);
                // var_dump($res['title']);
                return $res['name'];
            }
            function status($status){
                if ($status == 0){
                    return "<i class='fa fa-thumbs-down' style='color: #f0004c'></i>";
                }else{
                    return "<i class='fa fa-thumbs-up' style='color: #f0004c'></i>";
                }
            }
            if (!isset($comments)){
                echo "<a href='index.php?c=comment&a=add'><i class='fa fa-plus-square'></i></a>";
            }else {
                function parent($parent,$post_id)
                {
                    $obj = new Comment();
                    $parents = $obj->answerOfId($parent);
                    echo "<ul style='margin-right: 10px;'>";

                    foreach ($parents as $par) {
                       if ($par['status']=="1"){
                           echo "<li style='list-style-type: none;border: solid .5px #aaa;padding: 8px 4px ;border-radius: 3px;background-color: #eeeeee;'>$par[body]<span class='label-danger' style='float: left;margin-left: 7px;padding: 2.5px 5px;font-size: .8em;border-radius: 2px;background-color: #f0004c;color: #fff;font-weight: bolder;'>".userId($par['user_id'])."</span>"."</li><a href='index.php?c=comment&a=reply&pId=$post_id&pnt=$par[id]'><i class='fa fa-plus-square'></i></a><span style='color: #c87f0a;float: left;font-size: .7em;font-weight: bold;'>".jdate("j F Y - h:s", $par['created_at'])."</span>";
                           if ($par['is_parent'] == "1") {
                               parent($par['id'],$post_id);
                           }
                       }
                    }


                    echo "</ul>";
                }

                function ch($comment,$post)
                {
                    echo "<ul>";
                    foreach ($comment as $key => $item) {

                        if (($item['parent'] == "") && ($item['is_parent'] == "1")&&($item['status']=="1")) {
                            echo "<li style='list-style-type: none;border: solid .5px #aaa;padding: 8px 4px ;border-radius: 3px;background-color: #FFF;'>$item[body]<span class='label-danger' style='float: left;margin-left: 7px;padding: 2.5px 5px;font-size: .8em;border-radius: 2px;background-color: #f0004c;color: #fff;font-weight: bolder;'>".userId($item['user_id'])."</span>"."</li><a href='index.php?c=comment&a=reply&pId=$post[id]&pnt=$item[id]'><i class='fa fa-plus-square'></i></a><span style='color: #c87f0a;float: left;font-size: .7em;font-weight: bold;'>".jdate("j F Y - h:s", $item['created_at'])."</span>";
                            parent($item['id'],$post['id']);
                        }
                        if (($item['parent'] == "") && ($item['is_parent'] == "0")&&($item['status']=="1")) {
                            echo "<li style='list-style-type: none;border: solid .5px #aaa;padding: 8px 4px ;border-radius: 3px;background-color: #fff;'>$item[body]<span class='label-danger' style='float: left;margin-left: 7px;padding: 2.5px 5px;font-size: .8em;border-radius: 2px;background-color: #f0004c;color: #fff;font-weight: bolder;'>".userId($item['user_id'])."</span>"."</li><a href='index.php?c=comment&a=reply&pId=$post[id]&pnt=$item[id]'><i class='fa fa-plus-square'></i></a><span style='color: #c87f0a;float: left;font-size: .7em;font-weight: bold;'>".jdate("j F Y - h:s", $item['created_at'])."</span>";
                        }
                    }
                    echo "</ul>";
                }

                ch($comments,$post);
            }
            ?>

        </div>
    </div>
</section>
