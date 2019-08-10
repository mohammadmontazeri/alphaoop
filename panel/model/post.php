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

    public function showIndex()
    {
        $res = $this->pdo->query("SELECT * FROM posts ORDER by id DESC");
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
}

/*

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





    public function register($data)
    {
        $time = time();
        $pass = sha1($data['password']);
        //if (empty($data['image'])) {
          //  $res = $this->pdo->query("INSERT INTO users (name,email,password,image,created_at) VALUES ('$data[name]','$data[email]','$data[password]','$data[image]','$time')");
        //}else{
            $res = $this->pdo->query("INSERT INTO users (name,email,password,created_at) VALUES ('$data[name]','$data[email]','$pass','$time')");
        //}
        return $res;
    }

    public function login($data)
    {
        $result = $this->pdo->query("SELECT * FROM users WHERE email='$data[email]'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        if (!empty($res)){
            if ($res['password']==sha1($data['password'])){
                return "OK";
            }else{
                return "incorrect pass";
            }
        }else{
            return "no register";
        }
    }
    public function showLoginUserPanel($data)
    {
        $result = $this->pdo->query("SELECT * FROM users WHERE email='$data'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function showUserIndex()
    {
        $res = $this->pdo->query("SELECT * FROM users");
        return $res;
    }

    public function deleteUser($data)
    {
        $this->pdo->query("DELETE FROM users WHERE id='$data' ");
    }
}

?>
*/