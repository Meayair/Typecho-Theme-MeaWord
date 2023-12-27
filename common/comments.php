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
