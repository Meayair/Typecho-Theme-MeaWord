<footer class="footer">
    <div class="container">
        <h3><?php $this->options->description() ?></h3>
        <p>©️ <?php echo $this->options->startYear?$this->options->startYear.' - ':''; ?> <?php echo  date("Y")?> <?php $this->options->title(); ?>. Designed by <a href="https://www.bawge.com/" target="_blank">Meayair</a>
        </p>
        <?php if($this->options->beianNum):?>
        <p><a class="beian" href="https://beian.miit.gov.cn/" rel="external nofollow" target="_blank" title="备案号"><i class="bi bi-shield-check me-1"></i><?php $this->options->beianNum()?></a></p>
        <?php endif?>
        <?php echo $this->options->footerExtra?:''; ?>
    </div>
</footer>
<div class="offcanvas offcanvas-end" id="right-canvas" style="width: 80%;">
    <div class="sidebar_canvas">
        <div class="right-slide-header" style="justify-content: flex-end;">
            <button type="button" class="theme-switch" onclick="switchDarkMode()"><i style="font-size: 18px;margin-right: 20px;" class="bi bi-lightbulb-fill"></i></button>
            <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x"></i></button>
        </div>
        <div class="sidebar_box" style="height: calc(100vh - 127px);">
            <aside id="nav_menu-2" class="widget widget_nav_menu">
                <h3 class="widget-title">分类</h3>
                <div class="menu-category-container">
                    <ul class="menu">
                        <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                        <?php while($categorys->next()): ?>
                        <?php if ($categorys->levels === 0): ?>
                        <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-<?php $categorys->mid(); ?>"><a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a></li>
                        <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </aside>
            <aside id="nav_menu-2" class="widget widget_nav_menu">
                <h3 class="widget-title">页面</h3>
                <div class="menu-page-container">
                    <ul class="menu">
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while($pages->next()): ?>
                        <li class="menu-item <?php if($this->is('page', $pages->slug)): ?>current-menu-item<?php endif; ?>"><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </aside>      
        </div>
    </div>
</div>
<button class="scrollToTopBtn" title="返回顶部"><i class="bi bi-chevron-up"></i></button>
<script>
  const isDark= localStorage.getItem("isDarkMode");
  if(isDark==="1"){
    document.documentElement.classList.add('dark');
  }else{
    document.documentElement.classList.remove('dark');
  }
</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/bootstrap.min.js'); ?>" id="bootstrap-js"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/ajax-scroll.js'); ?>" id="ajax-scroll-js"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/main.js?ver=2.0.1'); ?>" id="main-js"></script>
<script>
<?php if($this->options->needAjaxScroll && ($this->is('index')||$this->is('archive')||$this->is('category')||$this->is('tag')||$this->is('search'))):?>
// ajax-scroll
let ias = new InfiniteAjaxScroll('.post_loop', {
item: '.post_list',
next: '.next a',
pagination: '.page-navigator',
spinner: '.spinner',
});
ias.on('last', function() {
  let el = document.querySelector('.no-more');
  el.style.opacity = '1';
})
ias.on('page', (event) => {
  document.title = event.title;
  let state = history.state;
  history.replaceState(state, event.title, event.url);
});
<?php endif;?>
</script>
</body>
</html>