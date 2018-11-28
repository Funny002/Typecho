<?php if (!defined('__TYPECHO_ROOT_DIR__'))exit ; 
function themeConfig($form) {
	$logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
	$form -> addInput($logoUrl);
	$sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', array('ShowRecentPosts' => _t('显示最新文章'), 'ShowRecentComments' => _t('显示最近回复'), 'ShowCategory' => _t('显示分类'), 'ShowArchive' => _t('显示归档'), 'ShowOther' => _t('显示其它杂项')), array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
	$form -> addInput($sidebarBlock -> multiMode());
	/*| end #|*/

	/* 输出文章缩略图 */
	$slimg = new Typecho_Widget_Helper_Form_Element_Select('slimg', array('showon' => '有图文章显示缩略图，无图文章随机显示缩略图', 'Showimg' => '有图文章显示缩略图，无图文章只显示一张固定的缩略图', 'showoff' => '有图文章显示缩略图，无图文章则不显示缩略图', 'allsj' => '所有文章一律显示随机缩略图', 'guanbi' => '关闭所有缩略图显示'), 'showon', _t('缩略图设置'), _t('默认选择“有图文章显示缩略图，无图文章随机显示缩略图”'));
	$form -> addInput($slimg -> multiMode());
}

/** 使用
 * 	<?php if($this->options->slimg && 'guanbi' == $this->options->slimg): else: if($this->options->slimg && 'showoff'==$this->options->slimg): ?>
 * 		<a href="<?php $this->permalink() ?>" ><?php showThumbnail($this); ?></a>
 * 	<?php else: ?>
 * 		<img src="<?php showThumbnail($this); ?>">
 * 	<?php endif; endif; ?>
 */
function themeFields($layout) {
	$thumb = new Typecho_Widget_Helper_Form_Element_Text('thumb', NULL, NULL, _t('自定义缩略图'), _t('输入缩略图地址(仅文章有效)'));
	$layout -> addItem($thumb);
}

function showThumbnail($widget) {
	$dir = './usr/themes/default/img/random/';
	$n = sizeof(scandir($dir)) - 2;
	if ($n <= 0) {
		$n = 25;
	}
	$rand = rand(1, $n);
	$random = $widget -> widget('Widget_Options') -> themeUrl . '/img/random/' . $rand . '.jpg';
	if (Typecho_Widget::widget('Widget_Options') -> slimg && 'Showimg' == Typecho_Widget::widget('Widget_Options') -> slimg) {
		$random = $widget -> widget('Widget_Options') -> themeUrl . '/img/5.jpg';
	}
	$cai = '';
	$attach = $widget -> attachments(1) -> attachment;
	$pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
	$patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
	$patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';
	if (preg_match_all($pattern, $widget -> content, $thumbUrl)) {
		$ctu = $thumbUrl[1][0] . $cai;
	} else if (preg_match_all($patternMD, $widget -> content, $thumbUrl)) {
		$ctu = $thumbUrl[1][0] . $cai;
	} else if (preg_match_all($patternMDfoot, $widget -> content, $thumbUrl)) {
		$ctu = $thumbUrl[1][0] . $cai;
	} else if ($attach && $attach -> isImage) {

		$ctu = $attach -> url . $cai;
	} else if ($widget -> tags) {
		foreach ($widget->tags as $tag) {

			$ctu = './usr/themes/default/img/random/' . $tag['slug'] . '.jpg';

			if (is_file($ctu)) {
				$ctu = $widget -> widget('Widget_Options') -> themeUrl . '/img/random/' . $tag['slug'] . '.jpg';
			} else {
				$ctu = $random;
			}
			break;
		}
	} else {
		$ctu = $random;
	}
	if (Typecho_Widget::widget('Widget_Options') -> slimg && 'showoff' == Typecho_Widget::widget('Widget_Options') -> slimg) {
		if ($widget -> fields -> thumb) {$ctu = $widget -> fields -> thumb;
		}
		if ($ctu == $random)
			echo '';
		else if ($widget -> is('post') || $widget -> is('page')) {
			echo $ctu;
		} else {
			echo '<img src="' . $ctu . '">';
		}
	} else {
		if ($widget -> fields -> thumb) {$ctu = $widget -> fields -> thumb;
		}
		if (!$widget -> is('post') && !$widget -> is('page')) {
			if (Typecho_Widget::widget('Widget_Options') -> slimg && 'allsj' == Typecho_Widget::widget('Widget_Options') -> slimg) {$ctu = $random;
			}
		}
		echo $ctu;
	}
}

/* 文章阅读 */
function get_post_view($archive) {/* 使用  <?php get_post_view($this) ?>*/
	$cid = $archive -> cid;
	$db = Typecho_Db::get();
	$prefix = $db -> getPrefix();
	if (!array_key_exists('views', $db -> fetchRow($db -> select() -> from('table.contents')))) {
		$db -> query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
		echo 0;
		return;
	}
	$row = $db -> fetchRow($db -> select('views') -> from('table.contents') -> where('cid = ?', $cid));
	if ($archive -> is('single')) {
		$views = Typecho_Cookie::get('extend_contents_views');
		if (empty($views)) {
			$views = array();
		} else {
			$views = explode(',', $views);
		}
		if (!in_array($cid, $views)) {
			$db -> query($db -> update('table.contents') -> rows(array('views' => (int)$row['views'] + 1)) -> where('cid = ?', $cid));
			array_push($views, $cid);
			$views = implode(',', $views);
			Typecho_Cookie::set('extend_contents_views', $views);
			//记录查看cookie
		}
	}
	echo $row['views'];
}

/*
 * ========================================================
 * ********** 获取qq头像	**********
 * ========================================================
 */
function qq_img($obj_1) {
	if ($obj_1 != '') {
		if (strstr($obj_1, "@qq.com")) {// 判断是不是QQ邮箱
			$qq = substr($obj_1, 0, -7);
			if (!preg_match("/[A-Za-z]/", $qq)) {// 判断是否有英文
				if (strlen($qq) >= 8) {
					$img = curl_init();
					//创建接口连接
					curl_setopt($img, CURLOPT_URL, "https://ptlogin2.qq.com/getface?appid=0&imgtype=3&uin=" . $obj_1 . "&tdsourcetag=s_pctim_aiomsg");
					//连接接口
					curl_setopt($img, CURLOPT_HEADER, 0);
					curl_setopt($img, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($img, CURLOPT_RETURNTRANSFER, 1);
					$img_url = curl_exec($img);
					//接收字符串
					curl_close($img);
					$img_url_a = substr($img_url, 18 + strlen($qq), -3);
					echo "" . $img_url_a . "";
				}
			}
		}
	}
}
