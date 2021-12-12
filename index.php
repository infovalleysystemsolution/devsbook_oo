<?php
require 'config.php';
require './models/Auth.php';
require './dao/PostDaoMysql.php';

$auth = new Auth($pdo, $base);
// if ( !isset($_SESSION['logado']) || $_SESSION['logado']!=1 ) {
$userInfo = $auth->checkToken();
// usando no header.php e no feed-editor.php
$firstname = current(explode(' ', $userInfo->name ));
// } else {
//     echo "<br>não entrou para checkar token"; 
// }

$postDao = new PostDAOMySQL($pdo);
$feed = $postDao->getHomeFeed($userInfo->id);

require './partials/header.php';

require './partials/menu.php';

?>
<section class="feed mt-10">
    <div class="row">
        <div class="column pr-5">

            <?php require './partials/feed-editor.php';?>

            <?php foreach($feed as $itemFeed): ?>

                <?php require './partials/feed-item.php';?>        

            <?php endforeach; ?> 

        </div>
        <div class="column side pl-5">
            <?php require './partials/column-home-right.php';?>
        </div>
    </div>
</section>
<?php
require './partials/footer.php';
?>