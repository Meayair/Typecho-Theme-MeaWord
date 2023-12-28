<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
Typecho_Plugin::factory('admin/footer.php')->end = array('Meayair', 'editOptionsTheme');
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('Meayair', 'blockquoteExtra');
Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('Meayair', 'blockquoteExtra');
class Meayair
{
    public static function blockquoteExtra($con, $obj, $text)
    {
        $text = empty($text) ? $con : $text;
        $pattern = '/<blockquote class="block-extra block-down"\>(.*?)<\/blockquote>/s';
        preg_match_all($pattern, $text, $matches);
        $text = preg_replace_callback($pattern, 'replaceDownClock', $text);
        return $text;
    }
    public static function editOptionsTheme()
    {
        $currentURL = $_SERVER['REQUEST_URI'];
        $fileName = basename($currentURL);
        $fileNameCut = explode('.',$fileName);
        if($fileNameCut[0] == 'options-theme'){
            // todo
        }else if($fileNameCut[0] == 'write-post' || $fileNameCut[0] == 'write-page'){
            $css = '<style>#custom-field input,textarea{width:100%;}.wmd-button-row{height:auto;}</style>';echo $css;
            echo "<script src='" . Helper::options()->themeUrl . '/assets/admin/js/write-post.js' . "'></script>";
        }
    }
}

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);

    $logoDisplay = new Typecho_Widget_Helper_Form_Element_Select('logoDisplay', array(
        2 => '仅显示LOGO',
        1 => '仅显示标题',
        0 => 'logo,标题同时显示'
    ), 0, _t('logo,标题显示状态'), _t('在这里选择logo,标题显示状态。'));
    $form->addInput($logoDisplay);

    $mainColor = new Typecho_Widget_Helper_Form_Element_Text('mainColor', NULL, NULL, _t('主题色'), _t('填写颜色代码。<a href="https://www.bawge.com/archives/72.html">点击帮忙配色</a>'));
    $form->addInput($mainColor);

    $backgroundColor = new Typecho_Widget_Helper_Form_Element_Text('backgroundColor', NULL, NULL, _t('背景色'), _t('填写颜色代码。<a href="https://www.bawge.com/archives/72.html">点击帮忙配色</a>'));
    $form->addInput($backgroundColor);

    $bannerIds = new Typecho_Widget_Helper_Form_Element_Text('bannerIds', NULL, NULL, _t('轮播设置'), _t('在这里输入文章cid,多个文章请用‘,’分隔'));
    $form->addInput($bannerIds);

    $needAjaxScroll = new Typecho_Widget_Helper_Form_Element_Select('needAjaxScroll', array(
        1 => '开启',
        0 => '不开启'
    ), 0, _t('Ajax-scroll自动加载'), _t('开启后会在浏览到页面底部否自动加载下一页。'));
    $form->addInput($needAjaxScroll);

    $startYear = new Typecho_Widget_Helper_Form_Element_Text('startYear', NULL, NULL, _t('站点起始年份'), _t('在这里填入站点起始年份'));
    $form->addInput($startYear);
    $statistics = new Typecho_Widget_Helper_Form_Element_Textarea('statistics', NULL, NULL, _t('统计代码'), _t('在这里填入统计代码，将会放在heade内'));
    $form->addInput($statistics);
    $beianNum = new Typecho_Widget_Helper_Form_Element_Text('beianNum', NULL, NULL, _t('备案号'), _t('在这里填入站点备案号'));
    $form->addInput($beianNum);
    $footerExtra = new Typecho_Widget_Helper_Form_Element_Textarea('footerExtra', NULL, NULL, _t('额外footer内容（html）'), _t('如果你有额外想添加到footer的内容，可以添加到这里'));
    $form->addInput($footerExtra);
    $shuoshuo = new Typecho_Widget_Helper_Form_Element_Text('shuoshuo', NULL, NULL, _t('说说'), _t('这里填写说说的分类号'));
    $form->addInput($shuoshuo);
}


function themeFields($layout) {
    $cover = new Typecho_Widget_Helper_Form_Element_Text('cover', NULL, 'w-100', _t('特色图像'), _t('在这里填入一个图片URL地址,用以在文章列表及其他地方'));
    $layout->addItem($cover);
}

function getFirstCharacter($title) {
    // 去除字符串中的非字母、非汉字字符
    $title = preg_replace('/[^\p{L}\p{Han}]/u', '', $title);

    // 使用正则表达式匹配标题中的第一个汉字或字母
    preg_match('/^[\p{L}]/u', $title, $matches);

    // 如果匹配到，则返回第一个匹配项
    if (!empty($matches)) {
        $firstCharacter = $matches[0];
        if (ctype_lower($firstCharacter)) {
            $firstCharacter = strtoupper($firstCharacter);
        }
        return $firstCharacter;
    }

    // 如果没有匹配到字母，则返回下一个字母
    preg_match('/[a-zA-Z]/', $title, $matches);

    // 如果匹配到字母，则返回第一个匹配项
    if (!empty($matches)) {
        $firstCharacter = $matches[0];
        if (ctype_lower($firstCharacter)) {
            $firstCharacter = strtoupper($firstCharacter);
        }
        return $firstCharacter;
    }

    // 如果都没有匹配到，则返回默认值，可以根据需求修改
    return 'M';
}

function getArchives($widget)
{
  $db = Typecho_Db::get();
  $rows = $db->fetchAll(
    $db
      ->select()
      ->from("table.contents")
      ->order("table.contents.created", Typecho_Db::SORT_DESC)
      ->where("table.contents.type = ?", "post")
      ->where("table.contents.status = ?", "publish")
  );

  $stat = [];
  $midShuoShuo = Helper::options() -> shuoshuo;
  foreach ($rows as $row) {
    $row = $widget->filter($row);
    $isShuoshuo = 0;
    if(!empty($midShuoShuo)){
        $querymid = $db->select()->from('table.relationships')
        ->where('table.relationships.cid = ?', $row["cid"]);

        $mids = $db->fetchAll($querymid);
        foreach ($mids as $mid) {
            if($mid['mid'] == $midShuoShuo){
                $isShuoshuo = 1;
            }
        }
        if($isShuoshuo){continue;}
    }
    

    $arr = [
      "cid" => $row["cid"],
      "title" => $row["title"],
      "permalink" => $row["permalink"],
    ];
    $stat[date("Y", $row["created"])][$row["created"]] = $arr;
  }
  return $stat;
}


function theNextPrev($widget){
    $html = '';
    $prevResult = getNextPrev(true, $widget);
    $nextResult = getNextPrev(false, $widget);
    if (!$prevResult && !$nextResult) {
        $html .= '';
    } else if (!$nextResult) {
        $html .= '<div class="post-prev"><div class="next_prev_beici">PREV</div><a href="' . $prevResult["permalink"] . '">' . $prevResult["title"] . '</a></div>';
    } else if (!$prevResult) {
        $html .= '<div class="post-next"><div class="next_prev_beici">NEXT</div><a href="' . $nextResult["permalink"] . '">' . $nextResult["title"] . '</a></div>';
    } else {
        $html .= '<div class="post-prev"><div class="next_prev_beici">PREV</div><a href="' . $prevResult["permalink"] . '">' . $prevResult["title"] . '</a></div>';
        $html .= '<div class="post-next"><div class="next_prev_beici">NEXT</div><a href="' . $nextResult["permalink"] . '">' . $nextResult["title"] . '</a></div>';
    }
    echo $html;
}

function getNextPrev($mode, $archive, $fields_name = ''){
    $options = Helper::options();
    $db = Typecho_Db::get();
    //数据准备
    $where = null;
    $sorted = null;
    $fields = '';
    //$mode为true查询上文，false查询下文
    if ($mode) {
        $where = 'table.contents.created < ?';
        $sorted = Typecho_Db::SORT_DESC;
    } else {
        $where = 'table.contents.created > ?';
        $sorted = Typecho_Db::SORT_ASC;
    }

    $mid = $options -> shuoshuo;
    $query = $db->select()->from('table.contents')
        ->where($where, $archive->created)
        ->join('table.relationships', 'table.contents.cid = table.relationships.cid', 'LEFT')
        ->where('table.relationships.mid <> ? ', $mid)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $archive->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', $sorted)
        ->limit(1);
    $content = $db->fetchRow($query);
    $result = null;
    if ($content) {
        $content = $archive->filter($content);
        $title = $content['title'];
        $permalink = $content['permalink'];

        if(!empty($fields_name)){
            $query = $db->select()->from('table.fields')
            ->where('table.fields.cid = ?', $content['cid'])
            ->where('table.fields.name = ?', $fields_name)
            ->limit(1);
        }

        $content = $db->fetchRow($query);
        if ($content) {
            $fields = $content['str_value'];
        }

        $result = array('fields' => $fields, 'title' => $title, 'permalink' => $permalink);
    } else {
        $result = false;
    }
    return $result;
}

function replaceDownClock($matches){
    $string = $matches[1];
    $source_name = '？？？';
    $source_href = '';
    $source_type = '';
    $source_method = '';
    $source_code = '';
    
    $pattern = '/\[资源名称\]：\[(.*?)\]/s';
    if (preg_match($pattern, $string, $matches)) {
        $source_name = $matches[1];
    }
    
    $pattern = '/\[资源地址\]：\[(.*?)\]/s';
    if (preg_match($pattern, $string, $matches)) {
        $source_href = $matches[1];
    }

    $pattern = '/\[资源类型\]：\[(.*?)\]/s';
    if (preg_match($pattern, $string, $matches)) {
        $source_type = $matches[1];
    }

    $pattern = '/\[分享方式\]：\[(.*?)\]/s';
    if (preg_match($pattern, $string, $matches)) {
        $source_method = $matches[1];
    }

    $pattern = '/\[提取码\]：\[(.*?)\]/s';
    if (preg_match($pattern, $string, $matches)) {
        $source_code = $matches[1];
    }
    if(!empty($source_href)){
        $html = "<blockquote class=\"block-extra block-down\">
    <div class=\"block-down-title\">
        <p>{$source_name}</p>
        <div class=\"block-down-button\"><p>点击下载</p>{$source_href}</div>
    </div>";
        $block_down_footer = "";
        if(!empty($source_type)){
            $block_down_footer .= "<div class=\"block-down-info\"><span>类型：</span>{$source_type}</div>";
        }
        if(!empty($source_method)){
            $block_down_footer .= "<div class=\"block-down-info\"><span>方式：</span>{$source_method}</div>";
        }
        if(!empty($source_code)){
            $block_down_footer .= "<div class=\"block-down-info\"><span>提取码：</span>{$source_code}</div>";
        }
        if(!empty($block_down_footer)){
            $html .= "<div class=\"block-down-footer\">" . $block_down_footer . "</div>";
        }
        $html .= "
    </blockquote>";
    }
    return $html;
}
