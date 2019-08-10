<?php
if (isset($_GET))
$post_id = $_GET['pId'];
$parent = $_GET['pnt'];
?>
<div class="type_cmnt" style="width: 50%">
    <form method="post" action="index.php?c=comment&a=addreply&post_id=<?php echo $post_id ?>&parent=<?php echo $parent ?>" enctype="multipart/form-data">
                <input type="email" name="email" style="padding: 10px;margin-bottom: 10px;border: solid .5px #aaa;border-radius: 5px;outline: none;font-size: 1em;font-family: Vazir;box-sizing: border-box;font-weight: 100" placeholder="ایمیل خود را وارد کنید">
                <input type="text" name="name" style="padding: 10px;margin-bottom: 10px;border: solid .5px #aaa;border-radius: 5px;outline: none;font-size: 1em;font-family: Vazir;box-sizing: border-box;font-weight: 100;" placeholder="نام کاربری خود را وارد کنید">
                <div class="typing_part">
                    <input type="text" placeholder="در مورد این پست دیدگاهی داری..." name="body">
                    <button class="btn_comment" name="btn">
                             ارسال دیدگاه
                     </button>
                </div>
    </form>
</div>

