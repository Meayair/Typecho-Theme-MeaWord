<?php
/**
 * 归档页面
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
$this->need('common/header.php');
?>
<section class="post-loop">
    <div class="container">
        <div class="post-box">
	    	<div class="post-box-txt">
                <h3 class="latest_post">归档</h3>
            </div>
            <?php $this->widget("Widget_Metas_Tag_Cloud", "sort=mid&ignoreZeroCount=1&desc=0")->to($tags);
            if ($tags->have()): ?>
            <div id="tags" class="mod-archive-name">标签</div>
            <ul class="mod-archive-list">
                <?php while ($tags->next()): ?>
                    <li class="li-inline">
                        <a href="<?php $tags->permalink(); ?>" rel="tag" title="<?php $tags->name(); ?>">
                            <?php $tags->name(); ?><span>(<?php $tags->count(); ?>)</span>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php endif;?>
            <?php $this->widget("Widget_Metas_Category_List")->to($categories); ?>
            <?php if ($categories->have()): ?>
            <div id="category" class="mod-archive-name">分类</div>   
            <ul class="mod-archive-list">
                <?php while ($categories->next()): ?>
                    <li class="li-inline">
                        <a href="<?php $categories->permalink(); ?>" rel="category" title="<?php $categories->name(); ?>">
                            <?php $categories->name(); ?><span>(<?php $categories->count(); ?>)</span>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <?php foreach (getArchives($this) as $year => $archives_year) { ?>
            <div id="year-<?php echo $year;?>" class="mod-archive-name"><?php echo $year;?></div>
            <ul class="mod-archive-list">
                <?php foreach ($archives_year as $timestamp => $archive) { ?>
	    		<li id="post-<?php $archive['cid']?>"><time class="mod-archive-time text-nowrap me-4" datetime="<?php echo date("m-d H:i:s", $timestamp);?>"><?php echo date("m-d", $timestamp);?></time><a href="<?php echo $archive['permalink']?>" title="<?php echo $archive['title']?>"><?php echo $archive['title']?></a></li>
	    		<?php }?>
	    	</ul>
            <?php }?>
        </div>
    </div>
</section>
<?php $this->need('common/footer.php');?>