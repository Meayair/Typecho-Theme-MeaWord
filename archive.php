<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('common/header.php');
?>

<section class="post-loop">
    <div class="container">
        <div class="post-box">
            <div class="post-box-txt">
                <h3 class="latest_post"><?php $this->archiveTitle(array(
            'category'  =>  _t('%s'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('# %s'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h3>
            </div>
            <?php $isShuoshuoCat = 0;
            if(!empty($this->options->shuoshuo) && $this->is('category')){
                 $this->widget('Widget_Metas_Category_List')->to($categorys);
                 while($categorys->next()){
                    if ($categorys->levels === 0 && $this->is('category', $categorys->slug) && $categorys->mid == $this->options->shuoshuo){
                        $isShuoshuoCat = 1;
                    }
                 }
            }?>
            <div class="post_loop">
                <?php if($isShuoshuoCat) :?>
                <?php while($this->next()): ?>
                <div class="post_list post_list_shuoshuo">
                    <div class="post-date">
                        <span class="post-date-day"><?php $this->date('d'); ?></span><span class="post-date-month"><?php $this->date('F'); ?></span>
                    </div>
                    <p style="box-shadow: 0px 0px 15px rgb(199 199 199 / 65%) inset;padding: 2rem;"><?php $this->excerpt(9999,'')?></p>
                    <div class="post_loop_info">
                        <span><?php $this->date('F jS , Y \\a\t h:i a'); ?></span>
                    </div>

                </div>
                <?php endwhile; ?> 
                <?php else :?>
                <?php while($this->next()): ?>
                <?php
            		$categories = $this->categories;
                    $isShuoshuo = 0;
                    $cats = '';
            		foreach($categories as $cate) {
            		    if($cate['parent']=='0'){
            		        $cats .= '<span><a href="'.$cate['permalink'].'" rel="category tag">'.$cate['name'].'</a></span>';
                            if($cate['mid'] == $this->options->shuoshuo){
                                $isShuoshuo = 1;
                            }
            		    }
            		}
            	?>
                <?php if($isShuoshuo):?>
                <div class="post_list">
                    <?php if($this->fields->cover):?>
				    <a class="post_cover" style="background-image:url('<?=$this->fields->cover?>');"></a>
				    <?php else:?>
                    <div class="post_beici">
                        <i class="bi bi-chat-text"></i>
                    </div>
                    <?php endif?>
                    <p style="position:relative;padding: 2rem 0;-webkit-line-clamp: unset;"><?php $this->excerpt(9999,'')?></p>
                    <div class="post_loop_info">
                        <span><?php $this->date('F jS , Y \\a\t h:i a'); ?></span>
                    </div>
                </div>

                <?php else: ?>
                <div class="post_list">
                    <?php if($this->fields->cover):?>
				    <a class="post_cover" style="background-image:url('<?=$this->fields->cover?>');"></a>
				    <?php else:?>
                    <div class="post_beici">
                        <?php echo getFirstCharacter($this->title);?>
                    </div>
                    <?php endif?>
                    <h2><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->title() ?></a></h2>
                    <p style="position:relative"><?php $this->excerpt(100)?></p>
                    <div class="post_loop_info">
                        <span><?php $this->author(); ?></span>
                        <?php echo $cats;?>
                        <span><?php $this->date(); ?></span>
                    </div>
                </div>
                <?php endif;?>
                <?php endwhile; ?> 
                <?php endif;?> 
             </div>
             <?php if($this->options->needAjaxScroll):?>
            <div class="no-more">没有更多了~</div>
            <div id="spinner1" class="spinner">
                <div class="spinner-grow" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
            <?php endif;?>
            <?php $this->pageNav('<', '>'); ?>
        </div>
    </div>
</section>
<?php $this->need('common/footer.php');?>