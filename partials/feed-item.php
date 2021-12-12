<?php 
    $actionPhrase = '';
    switch($itemFeed->type)
    {
        case 'text':
            $actionPhrase = 'fez um post';
            break;
        case 'photo':
            $actionPhrase = 'postou uma foto';
            break;
    }

?>
                    <div class="box feed-item">
                        <div class="box-body">
                            <div class="feed-item-head row mt-20 m-width-20">
                                <div class="feed-item-head-photo">
                                    <a href="<?php echo $base;?>/perfil.php?id=<?php echo $itemFeed->user->id;?>"><img src="<?php echo $base;?>/media/avatars/<?php echo $itemFeed->user->avatar;?>" /></a>
                                </div>
                                <div class="feed-item-head-info">
                                    <a href="<?php echo $base;?>/perfil.php?id=<?php echo $itemFeed->user->id;?>"><span class="fidi-name"><?php echo $itemFeed->user->name;?></span></a>
                                    <span class="fidi-action">
                                        <?php echo $actionPhrase;?>
                                    </span>
                                    <br/>
                                    <span class="fidi-date"><?php echo date('d/m/Y', strtotime($itemFeed->created_at));?></span>
                                </div>
                                <div class="feed-item-head-btn">
                                    <img src="<?php echo $base;?>/assets/images/more.png" />
                                </div>
                            </div>
                            <div class="feed-item-body mt-10 m-width-20">
                                <?php echo nl2br($itemFeed->body);?>
                            </div>
                            <div class="feed-item-buttons row mt-20 m-width-20">
                                <div class="like-btn <?php echo $itemFeed->likeed? 'on': '';?> "><?php echo $itemFeed->likeCount;?></div>
                                <div class="msg-btn"><?php echo count($itemFeed->comments);?></div>
                            </div>
                            <div class="feed-item-comments">
                                
                                <!-- <div class="fic-item row m-height-10 m-width-20">
                                    <div class="fic-item-photo">
                                        <a href=""><img src="media/avatars/avatar.jpg" /></a>
                                    </div>
                                    <div class="fic-item-info">
                                        <a href="">Bonieky Lacerda</a>
                                        Comentando no meu próprio post
                                    </div>
                                </div>

                                <div class="fic-item row m-height-10 m-width-20">
                                    <div class="fic-item-photo">
                                        <a href=""><img src="media/avatars/avatar.jpg" /></a>
                                    </div>
                                    <div class="fic-item-info">
                                        <a href="">Bonieky Lacerda</a>
                                        Muito legal, parabéns!
                                    </div>
                                </div> -->

                                <div class="fic-answer row m-height-10 m-width-20">
                                    <div class="fic-item-photo">
                                        <a href="<?php echo $base;?>/perfil.php"><img src="<?php echo $base;?>/media/avatars/<?php echo $userInfo->avatar;?>/" /></a>
                                    </div>
                                    <input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
                                </div>

                            </div>
                        </div>
                    </div>