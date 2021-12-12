<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?php echo $base;?>/assets/css/style.css" />
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="<?php echo $base;?>"><img src="<?php echo $base;?>/assets/images/devsbook_logo.png" /></a>
            </div>
            <div class="head-side">
                <div class="head-side-left">
                    <div class="search-area">
                        <form method="GET" action="<?php echo $base;?>/search.php">
                            <input type="search" placeholder="Pesquisar" name="s" />
                        </form>
                    </div>
                </div>
                <div class="head-side-right">
                    <a href="<?php echo $base;?>/perfil.php" class="user-area">
                        <div class="user-area-text"><?php echo $firstname;?></div>
                        <div class="user-area-icon">
                            <img src="<?php echo $base;?>/media/avatars/<?php echo $userInfo->avatar;?>" />
                        </div>
                    </a>
                    <a href="<?php echo $base;?>/logout.php" class="user-logout">
                        <img src="<?php echo $base;?>/assets/images/power_white.png" />
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section class="container main">