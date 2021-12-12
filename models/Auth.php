<?php
require_once 'dao/UserDaoMysql.php';
class Auth
{
    private $pdo;
    private $base;
    private $dao;

    public function __construct(PDO $pdo, $base)
    {
        $this->pdo = $pdo;
        $this->base = $base;       
        $this->dao = new UserDAOMySQL($this->pdo);
    }

    public function checkToken()
    {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            // echo "<br>checkToken $token";

            // $userDao = new UserDAOMySQL($this->pdo);
            $user = $this->dao->findByToken($token);
            if($user)
                return $user;
        }
        header("Location: ".$this->base."/login.php");
        exit;
    }

    public function validateLogin($email, $password) {
        $user = $this->dao->findByEmail($email);
        // echo "<br>".$user->name." ".$user->password;
        if ($user) {

            if (password_verify($password, $user->password)) {
                $token = md5(time().rand(0,9999));

                $_SESSION['token'] = $token;
                $user->token = $token;
                // echo "<br>id usuário: ".$user->id." - SESSION[token]: ".$_SESSION['token']." - token variável: ".$user->token;
                if ($this->dao->update($user)) {
                // echo "<br>token ".$token;exit;
                return true;
                } else {
                    return false;
                }
            }
        }


        return false;
    }

    public function emailsExists($email) {
        return $this->dao->findByEmail($email)?true:false;
    }

    public function registerUser($name, $email, $password, $birthdate) {

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999));

        $newUser = new User();
        $newUser->name = $name ;
        $newUser->email = $email;
        $newUser->password = $hash;
        $newUser->birthdate = $birthdate;
        $newUser->token = $token;

        $this->dao->insert($newUser);

        $_SESSION['token'] = $token;

    }


    


}