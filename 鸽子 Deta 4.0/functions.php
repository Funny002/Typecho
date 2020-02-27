<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
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

function get($url, array $data = null)
{ // get 请求
    if (is_string($url)) {
        $url .= substr($url, -1) !== "?" ? '?' : '';
        if (!is_null($data)) foreach ($data as $k => $v) $url .= "$k=$v&";
        return file_get_contents($url); // 大胆的想法
    }
    return false;
}

function mailAvatar($mail)
{ // 邮箱转qq头像
    if (is_string($mail)) {
        $is = preg_match('/^\d+@[qQ]{2}+.[comCOM]{3}/', $mail, $val);
        if ($is) {
            preg_match('/^\d+/', $mail, $val);
            $data = array("appid" => 0, "imgtype" => 3, "uin" => $val[0], "tdsourcetag" => "s_pctim_aiomsg");
            $val = get("https://ptlogin2.qq.com/getface", $data);
            return explode('"', explode(':"', $val)[1])[0];
        } else {
            return 'http://www.gravatar.com/avatar/' . md5($mail) . '?s=64';
        }
    }
    return '/usr/themes/default/Image/avatar.png';
}

function sidebar_menu_icon($str)
{ // 图标快速匹配，用数组的方式定义
    // 定义方式 独立页面名 => 图标名
    $arr = array(
        '关于' => 'exclamation-circle',
    );
    return array_key_exists($str, $arr) ? $arr[$str] : 'bars';
}

function article_generate($article, $obj)
{ // 文章生成
    $data = array(
        'title' => $article['title'], // 标题
        'link' => $article['permalink'], // 链接
        'image' => article_image($article['text']), // 图片
        'text' => Markdown::convert($article['text']), // 内容
        'categories' => array( // 分类
            'name' => $article['categories'][0]['name'],
            'link' => $article['categories'][0]['permalink']
        ),
        'time' => date('Y-m-d', intval($article['created'])),// 时间
        'commentsNum' => intval($article['commentsNum']) === 0 ? '暂无评论' : intval($article['commentsNum']) . ' 条评论', // 评论
    );
    foreach ($obj as $K => $V) {
        if ($V['uid'] === $article['authorId']) {
            $data['user'] = array('name' => $V['screenName'], 'link' => $V['permalink']); // 用户
        }
    }
    return $data;
}

function article_image($text)
{ // 随机图片
    $is = preg_match('/[a-z]+:[^\s]+/', $text, $val);
    if (!$is) {
        $dir = '/usr/themes/default/image/random/';
        $file = array_values(array_diff(scandir('.' . $dir), [".", ".."]));
        return $dir . $file[rand(0, count($file) - 1)];
    } else {
        return $val[0];
    }
}

function browser($browser)
{ // 获取浏览器
    $browser_s = ['Typecho\s', 'Edge\/', 'Navigator\/', 'IEMobile\/', 'Opera\/', 'OPR\/', 'Firefox\/', 'Chrome\/', 'Safari\/', 'MSIE\s', 'Mozilla\/'];
    foreach ($browser_s as $v) { // 浏览器
        $is = preg_match('/' . $v . '([^\s^;]+)/', $browser, $val);
        if ($is) return preg_split('/(\s|\/)/', $val[0]);
    }
    return 'false';
}