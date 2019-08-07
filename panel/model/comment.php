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
        $this->pdo->query("INSERT INTO comments (post_id,user_id,parent,body,created_at) VALUES ('$post_id','$user_id','$parent','$data[body]','$time')");

    }



    /*public function showIndex()
    {
        $res = $this->pdo->query("SELECT * FROM posts");
        return $res;
    }

    public function showCatAdd()
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE (parent > '0') AND (is_parent = '0')");
        //$res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($data, $url)
    {
        $time = time();
        $this->pdo->query("INSERT INTO posts (title,cat_id,writer,summery,text,image,created_at) VALUES ('$data[title]','$data[cat_id]','$data[writer]','$data[summery]','$data[text]','$url','$time')");
    }

    public function deletePost($data)
    {
        $this->pdo->query("DELETE FROM posts WHERE id='$data' ");
    }

    public function detailPost($id)
    {
        $result = $this->pdo->query("SELECT * FROM posts WHERE id='$id'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function showEditInf($id)
    {
        $result = $this->pdo->query("SELECT * FROM posts WHERE id='$id'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function updatePost($data,$id)
    {
        $title = $data['title'];
        $this->pdo->query("UPDATE posts SET title = '$data[title]',writer = '$data[writer]',summery ='$data[summery]',text ='$data[text]',cat_id ='$data[cat_id]'  WHERE id = '$id'");
    }*/

   /* public function test()
    {
        $result = $this->pdo->query("SELECT * FROM users u INNER JOIN comments c ON u.id = c.user_id ");
       // $res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }*/

}