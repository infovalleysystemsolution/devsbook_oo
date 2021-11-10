<?php
require_once 'models/User.php';

class  UserDAOMySQL implements UserDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    private function generateUser($array)
    {
        $u = new User();
        $u->setId( $array['íd']?? 0 )
            ->setEmail($array['email']?? '')
            ->setName($array['name']?? '')
            ->setBirthdate($array['birthdate']?? '')
            ->setCity($array['city']?? '')
            ->setWork($array['work']?? '')
            ->setAvatar($array['avatar']?? '')
            ->setCover($array['cover']?? '')
            ->setToken($array['token']?? '');
        return $u;
    }

    public function findByToken($token)
    {
        if (!empty($token)) {
            $sql = $this->pdo->prepare("select * from users where token = :token");
            $sql->bindValue(':token', $token);
            $sql->execute();
            
            if ($sql->rowCount()>0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }
        return false;
    }
}
