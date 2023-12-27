<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<meta name="format-detection" content="address=no">
<meta name="format-detection" content="date=no">
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
<meta name='robots' content='max-image-preview:large' />
<link rel='stylesheet' id='bootstrap-css' href='<?php $this->options->themeUrl('assets/css/bootstrap.min.css'); ?>' type='text/css' media='all' />
<link rel='stylesheet' id='bifont-css' href='<?php $this->options->themeUrl('assets/css/bootstrap-icons.css'); ?>' type='text/css' media='all' />
<link rel='stylesheet' id='stylecss-css' href='<?php $this->options->themeUrl('assets/css/style.css?ver=2.0.1'); ?>' type='text/css' media='all' />
<link rel='stylesheet' id='stylecss-css' href='<?php $this->options->themeUrl('assets/css/comments.css?ver=2.0.1'); ?>' type='text/css' media='all' />
<script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/jquery.min.js'); ?>" id="jquery-min-js"></script>
<?php echo $this->options->statistics?:''; ?>
<?php $this->header(); ?>
<?php $bannerIdsArr = explode(",", $this->options->bannerIds);?>
</head>
<body class="home blog" >
<style>:root{--bs-main:#b95d40}</style>
<header class="headbox">
	<div class="container">
		<div class="head_top">
			<a class="logo" href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">
                <?php if($this->options->logoUrl && $this->options->logoDisplay != 1):?>
				<img src="<?php $this->options->logoUrl(); ?>" alt="">
                <?php endif;?>
                <?php if($this->options->logoDisplay != 2):?>
				<b><?php $this->options->title(); ?></b>
                <?php endif;?>
			</a>
			<div class="top_right">
				<nav class="header-menu">
                    <ul class="header-menu-ul">
                        <li id="menu-item-home class="menu-item menu-item-type-custom menu-item-object-custom <?php if($this->is('index')): ?>current-menu-item<?php endif; ?> current_page_item menu-item-home"><a href="<?php $this->options->siteUrl(); ?>" aria-current="page">首页</a></li>
                        <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                        <?php while($categorys->next()): ?>
                        <?php if ($categorys->levels === 0): ?>
                        <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                        <li id="menu-item-<?php $categorys->mid(); ?>" class="menu-item menu-item-type-taxonomy menu-item-object-category <?php if($this->is('category', $categorys->slug)): ?> current-menu-item<?php endif; ?> menu-item-<?php $categorys->mid(); ?>"><a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a></li>
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while($pages->next()): ?>
                        <li class="menu-item <?php if($this->is('page', $pages->slug)): ?>current-menu-item<?php endif; ?>"><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </nav>				
                <div class="top_icon" style="display: flex;">
					<div class="top_icon_btn theme-switch d-none d-lg-flex" onclick="switchDarkMode()"><i class="bi bi-lightbulb-fill"></i></div>
                    <div class="top_icon_btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch"><i class="bi bi-search collapse-show"></i><i class="bi bi-x-circle collapse-hide"></i></div>
					<button class="top_icon_btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#right-canvas"><i class="bi bi-list"></i></button>
				</div>
	        </div>
        </div>
    </div>
    <div class="collapse collapseSearch" id="collapseSearch"<?php echo ($this->is('index') && !empty($bannerIdsArr[0]))?' style="position: absolute;"':'';?>>
        <form method="GET" target="_blank" class="searchForm container">
            <input itemprop="query-input" id="search-input" type="text" name="s" required="true" autocomplete="off" placeholder="请输入关键词进行搜索...">
            <button class="searchButton" type="submit" type="button"><i class="bi bi-search"></i></button>
        </form>
    </div>
</header>
<?php if($this->is('index') && !empty($bannerIdsArr[0])):?>
<section id="banner" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php foreach ($bannerIdsArr as $key => $value) { ?>
        <button type="button" data-bs-target="#banner" data-bs-slide-to="<?=$key?>" class="<?=$key==0?'active':''?>"></button>
        <?php }?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($bannerIdsArr as $key => $value) { ?>
        <?php $this->widget('Widget_Archive@banner'.$value, 'pageSize=1&type=post', 'cid='.$value)->to($banner);?>
        <div class="carousel-item<?=$key==0?' active':''?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="banner_loop">
                            <?php if($banner->fields->cover):?>
				            <a class="banner_cover" style="background-image:url('<?=$banner->fields->cover?>');"></a>
				            <?php else:?>
                            <div class="beici">
                                <?php echo getFirstCharacter($banner->title);?>
                            </div>
                            <?php endif?>
                            <h2><a class="" href="<?php $banner->permalink()?>" title="<?php $banner->title()?>"><?php $banner->title(); ?></a></h2>
                            <div class="banner_loop_info">
                                <span><i class="bi bi-person me-2"></i><?php $this->author(); ?></span>
                                <?php
            			        	$categories = $banner->categories;
            			        	foreach($categories as $cate) {
            			        	    if($cate['parent']=='0'){
            			        	        echo '<span><i class="bi bi-list me-2"></i><a href="'.$cate['permalink'].'" rel="category tag">'.$cate['name'].'</a></span>';
            			        	    }
            			        	}
            			        ?>
                                <span><i class="bi bi-calendar-date me-2"></i><?php $this->date(); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev"><i class="bi bi-chevron-compact-left"></i></button>
    <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next"><i class="bi bi-chevron-compact-right"></i></button>
</section>
<?php else:?>
<div class="nei_top"></div>
<?php endif;?>