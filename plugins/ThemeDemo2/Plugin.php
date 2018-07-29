<?php
/**
 * 使用：http://siteUrl/{主题目录}
 * 
 * @package ThemeDemo2
 * @author doudou
 * @version 1.0.0
 * @link http://doudou.me
 */
class ThemeDemo2_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('index.php')->begin = array('ThemeDemo2_Plugin', 'route');
        Typecho_Plugin::factory('Widget_Archive')->handleInit = array('ThemeDemo2_Plugin', 'settheme');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 配置routingTable
     * 
     * @access public
     * @return void
     */
    public static function route(){
        $routes = Typecho_Widget::widget('Widget_Options')->routingTable;
        $pathinfo = Typecho_Router::getPathInfo();
        foreach ($routes[0] as $key => $route) {
            if (preg_match($route['regx'], $pathinfo, $matches)) return;
        }
        if (preg_match('([^/]+)', $pathinfo, $matches)) {
            if (!self::check($matches[0])) return;
        } else {
            return;
        }
        global $theme;
        $theme = $matches[0];
        foreach ($routes[0] as $k => $v) {
            if ($k!='comment_page' && $k!='feedback') {
            $routes[0][$k]['url'] = '/' . $theme . $v['url'];
            $routes[0][$k]['regx'] = str_ireplace("|^", "|^/" . $theme, $v['regx']);
            $routes[0][$k]['format'] = implode("", array("/" . $theme, $v['format']));
            }
        }
        foreach ($routes as $k => $v) {
            if ($k!=0) {
                $routes[$k]['url'] = '/' . $theme . $v['url'];
            }
        }
        Typecho_Router::setRoutes($routes);
    }
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function settheme($widget)
    {
        global $theme;
        if (!$theme) return;
        /** 删除旧主题的相关设置 */
        $options = Typecho_Widget::widget('Widget_Options');
        $rowName = 'theme:' . $options->theme;
        if ($options->__isSet($rowName)) {
            $config = unserialize($options->$rowName);
            $options->__set($rowName, '');
            foreach ($config as $key => $value) {
                $options->__set($key, '');
            }
        }
        /** 载入新主题的相关设置 参考var/Widget/Themes/Edit.php */
        $configFile = __TYPECHO_ROOT_DIR__ . __TYPECHO_THEME_DIR__ . '/' . $theme . '/functions.php';
        if (file_exists($configFile)) {
            require_once $configFile;
            if (function_exists('themeConfig')) {
                $form = new Typecho_Widget_Helper_Form();
                themeConfig($form);
                $config = $form->getValues();
                if ($config) {
                    $options->__set('theme:' . $theme, serialize($config));
                    foreach ($config as $key => $value) {
                        $options->__set($key, $value);
                    }
                }
            }
        }
        /** 修改$this->options->theme */
        $options->__set('theme', $theme);
        /** 修改$this->_themeDir */
        $widget->setThemeDir(__TYPECHO_ROOT_DIR__ . '/' . __TYPECHO_THEME_DIR__ . '/' . $theme . '/');
    }

    /**
     * 检查主题目录是否存在
     * 
     * @access public
     * @return void
     */
    public static function check($path){
        $dir = __TYPECHO_ROOT_DIR__ . __TYPECHO_THEME_DIR__ . '/' . $path;
        $themes = glob(__TYPECHO_ROOT_DIR__ . __TYPECHO_THEME_DIR__ . '/*');
        foreach ($themes as $key => $value) {
            if ($value == $dir) {
                return true;
            }
        }
        return false;
    }
}
