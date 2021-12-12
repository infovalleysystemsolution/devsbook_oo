            <div class="box feed-new">
                <div class="box-body">
                    <div class="feed-new-editor m-10 row">
                        <div class="feed-new-avatar">
                            <img src="<?php echo $base;?>/media/avatars/<?php echo $userInfo->avatar;?>" />
                        </div>
                        <div class="feed-new-input-placeholder">O que você está pensando, <?php echo $firstname;?>?</div>
                        <div class="feed-new-input" contenteditable="true"></div>
                        <div class="feed-new-send">
                            <img src="<?php echo $base;?>/assets/images/send.png" />
                        </div>
                        <form class = "feed-new-form" action="<?php echo $base;?>/feed_editor_action.php" method="post">
                            <input type="hidden" name="body">
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                let feedinput = document.querySelector('.feed-new-input');
                let feedsubmit = document.querySelector('.feed-new-send');
                let feedform = document.querySelector('.feed-new-form');
                feedsubmit.addEventListener('click', function(){
                    let value = feedinput.innerText.trim();
                    feedform.querySelector('input[name=body]').value = value;
                    feedform.submit();
                });
            </script>