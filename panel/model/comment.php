<?php
class Comment
{
    protected $pdo;

    public function __construct()
    {
        $this->db();
    }

    public function db()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=chigap", "root", "");
        $this->pdo->query('SET CHARACTER SET utf8');
    }

    public function showIndex()
    {
        $res = $this->pdo->query("SELECT * FROM comments");
        return $res;
    }

    public function answerOfId($data)
    {
        $result = $this->pdo->query("SELECT * FROM comments WHERE parent='$data'");
       // $res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function mainCommentadd($data)
    {
        $user_id = "4";
        $time = time();
        $post_id = $data['post_id'];
        $this->pdo->query("INSERT INTO comments (post_id,user_id,body,created_at) VALUES ('$post_id','$user_id','$data[body]','$time')");
    }

    public function CommentAddIsParent($data)
    {
        $this->pdo->query("UPDATE comments SET is_parent = '1' WHERE id='$data'");
    }

    public function getPostId($data)
    {
        $res = $this->pdo->query("SELECT * FROM comments WHERE id='$data'");
        $result = $res->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function CommentAdd($data,$post_id,$parent)
    {

        $user_id = "4";
        $time = time();
        $body = $data['body'];
        //echo $body."=".$post_id."---".$parent."=".$time;die;
        $this->pdo->query("INSERT INTO comments (post_id,user_id,parent,body,created_at) VALUES ('$post_id','$user_id','$parent','$data[body]','$time')");

    }
    public function isParentDeleteOne($id)
    {
        $res = $this->pdo->query("SELECT * FROM comments WHERE id='$id'");
        $result = $res->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function subParentIsParent($id)
    {
        $res = $this->pdo->query("SELECT * FROM comments WHERE parent='$id'");
        //$result = $res->fetch(PDO::FETCH_ASSOC);
        return $res;

    }
    public function deleteSubParent($id)
    {
        $this->pdo->query("DELETE FROM comments WHERE id='$id'");
    }

    public function updateComment($data,$id)
    {
        $this->pdo->query("UPDATE comments SET body = '$data[body]'  WHERE id = '$id'");
    }
    public function ShowPostIdIndex($post_id)
    {
        $result = $this->pdo->query("SELECT * FROM posts p INNER JOIN comments c ON p.id = $post_id ");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function UpdateStatusToOne($id)
    {
        $this->pdo->query("UPDATE comments SET status = '1'  WHERE id = '$id'");
    }
    public function UpdateStatusToZero($id)
    {
        $this->pdo->query("UPDATE comments SET status = '0'  WHERE id = '$id'");
    }
    public function registerAuth($email){
        $result = $this->pdo->query("SELECT * FROM users WHERE email='$email' ");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function registerAuthName($name){
        $result = $this->pdo->query("SELECT * FROM users WHERE name='$name' ");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function registerForComment($data)
    {
        $time = time();
        $this->pdo->query("INSERT INTO users (name,email,created_at) VALUES ('$data[name]','$data[email]','$time')");
    }
    public function commentAddFromUser($data,$user_id,$post_id){
        $time = time();
        //echo $body."=".$post_id."---".$parent."=".$time;die;
        $this->pdo->query("INSERT INTO comments (post_id,user_id,body,created_at) VALUES ('$post_id','$user_id','$data','$time')");

    }
    public function ShowUserIdIndex($user_id)
    {
        $result = $this->pdo->query("SELECT * FROM users u INNER JOIN comments c ON u.id = $user_id ");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function commentAddReplyFromUser($data,$user_id,$post_id,$parent){
        $time = time();
        $this->pdo->query("INSERT INTO comments (post_id,user_id,body,parent,created_at) VALUES ('$post_id','$user_id','$data','$parent','$time')");
    }

}