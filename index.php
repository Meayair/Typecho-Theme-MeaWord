<?php
/**
 * 这是一套文字美学模板
 * 
 * @package Typecho MeaWord Theme 
 * @author Meayair
 * @version 2.0.1
 * @link https://www.bawge.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('common/header.php');
?>

<section class="post-loop">
    <div class="container">
        <div class="post-box">
            <div class="post-box-txt">
                <h3 class="latest_post">最新文章</h3>
            </div>
            <div class="post_loop">
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
