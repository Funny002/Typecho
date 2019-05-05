<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;

// 主题配置项
function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());
}
/**
 * =================================================================
 * ===========  自定义导航图标  ===========
 * =================================================================
*/
function ion_icon($val){
    switch ($val) {
        case '关于': echo "contacts"; break;
        default: echo "list-box"; break;
    }
}
/**
 * =================================================================
 * ===========  文章阅读量  Reading($this->cid)  ===========
 * =================================================================
*/
function Reading($cid) {
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
/**
 * =================================================================
 * ===========  获取文章中的略缩图  Thumbnails($this->content) ===========
 * =================================================================
*/
 function Thumbnails($val){
    // $val = $data->content;
    $len = preg_match('/[a-zA-Z]+:\/\/[^\s"]+/',$val,$data);
    if($len <= 0){
        $dir = "./usr/themes/default/Img/Random/";
        $file = array_values(array_diff(scandir($dir),[".",".."]));
        $len = null;
        while ($len == null) {
            $len = rand(0,count($file));
        }
        $data = $dir.$file[$len];
    }else{ // 已获取到第一张图片
        $data = preg_replace('/[a-zA-Z]+:\/\/[\w]+/','.',$data[0]);
    }
    return $data;
}
/**
 * =================================================================
 * ===========  根据QQ数字邮箱 (***@qq.com) 或者QQ号 返回 加密头像链接  ===========
 * =================================================================
*/
function Avatar($mail){
    $data = QqAvatar($mail);
    if($data == false){
        echo "http://www.gravatar.com/avatar/".md5($mail)."?s=64";
    }else{
        echo $data;
    }
}
function QqAvatar($QQ){
    $Ajax = new Ajax();
    if (!is_string($QQ)) return false;
    $data = preg_match('/^[0-9]+/', $QQ, $val);
    if ($data <= 0) return false;
    if (strlen($val[0]) >= 11)return false;
    $url = "https://ptlogin2.qq.com/getface";
    $data =  array(
        "appid" => 0,
        "imgtype" => 3,
        "uin" => $val[0],
        "tdsourcetag" =>"s_pctim_aiomsg",
    );
    $len = preg_match('/http([\W]|[\w])+[0-9]/',$Ajax->get($url,$data),$val);
    if(intval($len) <= 0)return false;
    preg_match('/t=[0-9]+/',$val[0],$data);
    if(intval(explode("=",$data[0])[1]) == 0)return false;
    return $val[0];
}
/**
 * =================================================================
 *  ===========  is Ajax ? 调用需要 new  ===========
 * =================================================================
*/
class Ajax{
    public function get($url, $data = null){
        if ($data != null) {
            $get = "?";
            foreach ($data as $key => $val) {
                $get .= "$key=$val&";
            }
            $url .= $get;
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }
    public function post($url, $data){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }
}