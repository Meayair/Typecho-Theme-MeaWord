<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="post-comment">
    <?php $this->comments()->to($comments); ?>
    <h3 class="post_about_author">评论<small>(<?php $this->commentsNum();?>)</small></h3>
    <div id="comments" class="comments-area mb-5">
        <div class="layoutSingleColumn">
        <?php if($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="respond">
            	<div id="response">发布评论</div>
                <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
                </div>
            	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="row">
                    <?php if($this->user->hasLogin()): ?>
            		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                    <?php else: ?>
            		<div class="col-4 response-input">
                        <i class="bi bi-person"></i>
            			<input type="text" name="author" id="author" class="text" placeholder="<?php _e('昵称'); ?>" value="<?php $this->remember('author'); ?>" required />
            		</div>
            		<div class="col-4 response-input">
                        <i class="bi bi-mailbox"></i>
            			<input type="email" name="mail" id="mail" class="text" placeholder="<?php _e('Email'); ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
            		</div>
            		<div class="col-4 response-input">
                        <i class="bi bi-link-45deg"></i>
            			<input type="url" name="url" id="url" class="text" placeholder="<?php _e('网站地址'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
            		</div>
                    <?php endif; ?>
            		<div class="reply-text">
                        <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
                    </div>
                    <div class="reply-submit">
            		    <button type="submit" class="submit"><?php _e('发布评论'); ?></button>
                    </div>
            	</form>
            </div>
            <?php else: ?>
            <h3><?php _e('评论已关闭'); ?></h3>
            <?php endif; ?>
            <?php if ($comments->have()): ?>
                
            <?php $comments->listComments(array()); ?>
                
            <?php $comments->pageNav('上一页', '下一页', '3', '…'); ?>
                
            <?php endif; ?>
	    </div>
    </div>            
</div>
<style>
ol.comment-list li{
    display: grid;
}
.comment-children{
    order:1;
}
.cancel-comment-reply{
    display: inline-block;
    font-weight: 300;
    font-size: 12px;
}
.cancel-comment-reply a{
    color: #717171;
}
.reply-submit{
    width:100%;
}
.reply-submit button{
    width: 130px;
    padding: 8px;
    float: right;
    background: var(--bs-main);
    color: #fff;
    border: none;
}
.reply-text{
    margin-top: 10px;
}
.reply-text textarea{
    width: 100%;
    height: 150px;
    background-color: #e5e5e5;
    border: none;
    padding: 25px;
    font-size: 16px;
    color: #333;
}
.dark .reply-text textarea{
    background-color: #2b2b2b;
    color: #c9c9c9;
}
#response{
    font-size: 16px;
    margin-bottom: 15px;
    display: inline-block;
}
.response-input{
    position: relative;
}

element.style {
}
@media (max-width: 992px){
    .response-input{
        width: 100%;
        margin: 0px 0px 5px 0px;
    }
}
.response-input i{
    position: absolute;
    top: 15px;
    left: 28px;
    color: #333;
}
.dark .response-input i{
    color: #c9c9c9;
}
.response-input input{
    width: 100%;
    background-color: #e5e5e5;
    border: none;
    padding: 15px 5px 15px 40px;
    font-size: 14px;
    color: #333;
}
.dark .response-input input{
    background-color: #2b2b2b;
    color: #c9c9c9;
}
 .comment-list img.avatar{
    border-radius: 50%;
    width: 70px;
}
.comment-author{
    display: flex;
}
.comment-author .fn{
    font-size: 16px;
    font-weight: inherit;
    font-style: normal;
    margin-left: 15px;
    margin-top: 10px;
}
.comment-meta{
    margin-top: -35px;
    margin-left: 85px;
}
.comment-meta a{
    color: #717171;
}
.comment-content{
    font-size: 16px;
    margin-left: 85px;
    margin-top: 10px;
}
.comment-reply{
    margin-left: 85px;
    padding-bottom: 40px;
}
.comment-reply a{
    color: #333;
    font-weight: 300;
    border-bottom: 1px solid #606060;
    font-size: 13px;
}
ol.comment-list ol.comment-list{
    padding-left:20px;
}
ol.comment-list ol.comment-list ol.comment-list .comment-reply a{
    display:none;
}
</style>
