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
        $u->setId( $array['id']?? 0 )
            ->setEmail($array['email']?? '')
            ->setName($array['name']?? '')
            ->setBirthdate($array['birthdate']?? '')
            ->setCity($array['city']?? '')
            ->setWork($array['work']?? '')
            ->setAvatar($array['avatar']?? '')
            ->setCover($array['cover']?? '')
            ->setToken($array['token']?? '')
            ->setPassword($array['password']?? '');
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

    public function findByEmail($email)
    {
        if (!empty($email)) {
            $sql = $this->pdo->prepare("select * from users where email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();
            
            if ($sql->rowCount()>0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }
        return false;
    }

    public function findById($id)
    {
        if (!empty($id)) {
            $sql = $this->pdo->prepare("select * from users where id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            
            if ($sql->rowCount()>0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }
        return false;
    }    

    public function update(User $u)
    {
        try {
            $sql = $this->pdo->prepare("UPDATE users SET 
                                            email = :email,
                                            password = :password,
                                            name = :name,
                                            birthdate = :birthdate,
                                            city = :city,
                                            work = :work,
                                            avatar = :avatar,
                                            cover = :cover,
                                            token = :token
                                        WHERE id = :id ");
            $sql->bindValue(':email', $u->email, PDO::PARAM_STR );
            $sql->bindValue(':password', $u->password, PDO::PARAM_STR);
            $sql->bindValue(':name', $u->name, PDO::PARAM_STR);
            $sql->bindValue(':birthdate', $u->birthdate);
            $sql->bindValue(':city', $u->city, PDO::PARAM_STR);
            $sql->bindValue(':work', $u->work, PDO::PARAM_STR);
            $sql->bindValue(':avatar', $u->avatar, PDO::PARAM_STR);
            $sql->bindValue(':cover', $u->cover, PDO::PARAM_STR);
            $sql->bindValue(':token', $u->token, PDO::PARAM_STR);
            $sql->bindValue(':id', $u->id, PDO::PARAM_INT);
            $sql->execute();

            return true;

        } catch (PDOException $e) {
            print $e->getMessage();
        }        

    }

    public function insert(User $u) {
        $sql = $this->pdo->prepare("INSERT INTO users( 
                    email, password, name, birthdate, token
            ) VALUES ( :email, :password, :name, :birthdate, :token) "
            );
        $sql->bindValue(':email',     $u->email);
        $sql->bindValue(':password',  $u->password);
        $sql->bindValue(':name',      $u->name);
        $sql->bindValue(':birthdate', $u->birthdate);
        $sql->bindValue(':token',     $u->token);
        $sql->execute();

        return true;
    }
}
