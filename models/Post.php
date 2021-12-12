<?php
class Post
{
    public $id;
    public $id_user;
    public $type;
    public $created_at;
    public $body;
    
    public function index()
    {

    }
}

interface PostDAO
{
    public function insert(Post $p);
    public function getHomeFeed($id_user);
}
