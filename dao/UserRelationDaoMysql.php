<?php
require_once 'models/UserRelation.php';

class  UserRelationDaoMysql implements UserRelationDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }
    
    public function insert(UserRelation $p) 
    {

        // $sql = $this->pdo->prepare("INSERT INTO posts( 
        //             id_user, type, created_at, body
        //     ) VALUES ( :id_user, :type, :created_at, :body)"
        //     );
        // $sql->bindValue(':id_user',     $p->id_user);
        // $sql->bindValue(':type',        $p->type);
        // $sql->bindValue(':created_at',  $p->created_at);
        // $sql->bindValue(':body',        $p->body);
        // $sql->execute();

        // return true;

    }

    public function getRelationsFrom($id=null)
    {
        if (empty($id) || $id==null) {
            return false;
        }
        $users = [$id];
        $sql = $this->pdo->prepare("select u.user_to from userrelations As u WHERE u.user_from = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if ($sql->rowCount()>0) {
            $data = $sql->fetchAll();
            foreach($data as $item) {
                $users[] = $item['user_to'];
            }
        }
        return $users;        
    }

}