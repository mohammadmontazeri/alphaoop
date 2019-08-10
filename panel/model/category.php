<?php
class Category {
    protected $pdo;
    public function __construct()
    {
        $this->db();
    }

    public function db()
    {
        $this->pdo=new PDO("mysql:host=localhost;dbname=chigap","root","");
        $this->pdo->query('SET CHARACTER SET utf8');
    }
    public function showIndex()
    {
        $res = $this->pdo->query("SELECT * FROM categories");
        return $res;
    }

    public function parentId($data)
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE parent='$data'");
        //$res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function isParentOne($data)
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE name='$data'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function allIsParent($data)
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE parent='$data'");
        return $result;

    }

    public function deleteIsParentOne($data)
    {
        $this->pdo->query("DELETE FROM categories WHERE id='$data' ");
    }

    public function allIsParentOneadd($data)
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE name='$data'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;

    }

    public function updateIsParent($data)
    {
        $this->pdo->query("UPDATE categories SET is_parent = '1' WHERE id = '$data'");
    }

    public function insert($data,$parent)
    {
         $time = time();
         $this->pdo->query("INSERT INTO categories (name,parent,is_parent,created_at) VALUES ('$data[name]','$parent','0','$time')");
    }

    public function mainCat($data)
    {
        $time = time();
        $this->pdo->query("INSERT INTO categories (name,created_at) VALUES ('$data[name]','$time')");
    }


    public function showEdit($data)
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE id='$data'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;

    }
    public function updateCat($name,$id)
    {
        $this->pdo->query("UPDATE categories SET name = '$name' WHERE id = '$id'");
    }
    /// End AdminPanel Queries
    /*public function displayPost($cat_id)
    {
        $result = $this->pdo->query("SELECT * FROM categories INNER JOIN posts ON posts.cat_id=$cat_id");
        //echo $result->rowCount();die;
        //$res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }*/
    public function displayPost($cat_id)
    {
        $result = $this->pdo->query("SELECT * FROM posts WHERE  cat_id=$cat_id");
        //echo $result->rowCount();die;
        //$res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}

?>
