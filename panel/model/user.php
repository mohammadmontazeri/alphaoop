<?php
class User {
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
    public function registerAuth($data)
    {
        $result = $this->pdo->query("SELECT * FROM users WHERE email='$data'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
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
        //$count = $res->rowCount();
        return $res;
    }

    public function deleteUser($data)
    {
        $this->pdo->query("DELETE FROM users WHERE id='$data' ");
    }
}

?>
