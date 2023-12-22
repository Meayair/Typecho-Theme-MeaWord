<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
$this->need('common/header.php');
?>
<section class="post-loop">
    <div class="container">
        <div class="post-box">
            <div class="post_list post_head_title">
                <div class="post_beici"><?php echo getFirstCharacter($this->title);?></div>
                <h1><?php $this->title() ?></h1>
                <div class="post_loop_info">
                    <span><?php $this->author(); ?></span>
                    <?php
            			$categories = $this->categories;
            			foreach($categories as $cate) {
            			    if($cate['parent']=='0'){
            			        echo '<span><a href="'.$cate['permalink'].'" rel="category tag">'.$cate['name'].'</a></span>';
            			    }
            			}
            		?>
                    <span><?php $this->date(); ?></span>
                </div>
            </div>
			<article class="wznrys">
                <?php $this->content(); ?>
			</article>
            <div class="post_tag">           
                 <div class="mt-4"><i class="iconfont icon-tags"></i><?php $this->tags('', true, '<span>暂无标签</span>'); ?></div>
            </div>
            <div class="post-next-prev row">
                <?php theNextPrev($this); ?>
            </div>
            <?php $this->need('common/comments.php'); ?>
        </div>
    </div>
</section>
<?php $this->need('common/footer.php');?>