<?php
require_once 'models/Post.php';
require_once 'dao/UserRelationDaoMysql.php';
require_once 'dao/UserDaoMysql.php';

class  PostDAOMySQL implements PostDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }
    
    public function insert(Post $p) 
    {

        $sql = $this->pdo->prepare("INSERT INTO posts( 
                    id_user, type, created_at, body
            ) VALUES ( :id_user, :type, :created_at, :body)"
            );
        $sql->bindValue(':id_user',     $p->id_user);
        $sql->bindValue(':type',        $p->type);
        $sql->bindValue(':created_at',  $p->created_at);
        $sql->bindValue(':body',        $p->body);
        $sql->execute();

        return true;

    }

    public function getHomeFeed($id_user)
    {
        $array = [];
        // Lista usuário que usuário segue
        $urDao = new UserRelationDaoMysql($this->pdo);
        $userList = $urDao->getRelationsFrom($id_user);
        // print_r($userList);

        // Pegar a lista de Post por data
        $data = $this->_getFeeds(implode(",", $userList));

        // Transformando o resultado em objetos
        $array = $this->_postListObject( $data, $id_user);

        return $array;

    }

    private function _getFeeds($array)
    {
        if (strlen($array)<=0) {
            return false;
        }
        $sql = $this->pdo->query("select * from posts As p  WHERE id_user IN (".$array.") ORDER BY  created_at DESC ");
        
        if ($sql->rowCount()>0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    private function _postListObject($post_list, $id_user)
    {

        $posts = [];
        $userDao = new UserDAOMySQL($this->pdo);

        foreach($post_list as $item) {
            $newPost = new Post();
            $newPost->id            = $item['id'];
            $newPost->type          = $item['type'];
            $newPost->created_at    = $item['created_at'];
            $newPost->body          = $item['body'];
            $newPost->mine          = false;

            if ($item['id_user']==$id_user) {
                $newPost->mine = true;
            }

            // Pegando informações do usuário do post
            $newPost->user = $userDao->findById($item['id_user']);

            // Informações sobre LIKE
            $newPost->likeCount = 0;
            $newPost->liked = false;

            // Informações sobre COMMENTS
            $newPost->comments = [];

            $posts[] = $newPost;
        }

        return $posts;
    }


}
