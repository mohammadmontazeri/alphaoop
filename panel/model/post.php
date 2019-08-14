<?php
class Post
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

    public function showIndex($first,$second)
    {
        $res = $this->pdo->query("SELECT * FROM posts ORDER by id DESC LIMIT $first,$second");
        return $res;
    }

    public function numOfRec()
    {
        $res = $this->pdo->query("SELECT * FROM posts ");
        return $res;
    }
    public function showCatAdd()
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE  (is_parent = '0')");
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

    public function updatePost($data,$id,$url)
    {
        $this->pdo->query("UPDATE posts SET title = '$data[title]',writer = '$data[writer]',summery ='$data[summery]',image = '$url',text ='$data[text]',cat_id ='$data[cat_id]'  WHERE id = '$id'");
    }

   public function ShowRandIndex()
   {
       $result = $this->pdo->query("SELECT * FROM posts ORDER BY RAND() LIMIT 1,2");
       //$res = $result->rowCount();
       //$res = $result->fetch(PDO::FETCH_ASSOC);
       return $result;
   }
    public function ShowAllCommentIbPostPage($id)
    {
        $result = $this->pdo->query("SELECT * FROM comments WHERE post_id = '$id'");
        return $result;
    }
    public function searchPost($data)
    {
        $result = $this->pdo->query("SELECT * FROM posts WHERE title LIKE '%$data%'");
        return $result;
    }
    public function showPaginateInCat($first,$second,$cat_id)
    {
        $res = $this->pdo->query("SELECT * FROM posts WHERE cat_id='$cat_id' ORDER by id DESC LIMIT $first,$second   ");
        return $res;
    }
    public function numOfPostCat($cat_id)
    {
        $res = $this->pdo->query("SELECT * FROM posts WHERE cat_id='$cat_id'");
        return $res;
    }

}

