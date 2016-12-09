<?php
/**
 * ZenTaoPHP的helper类。
 * The helper class file of ZenTaoPHP framework.
 *
 * The author disclaims copyright to this source code. In place of
 * a legal notice, here is a blessing:
 * 
 *  May you do good and not evil.
 *  May you find forgiveness for yourself and forgive others.
 *  May you share freely, never taking more than you give.
 */

/**
 * 该类实现了一些常用的方法
 * The helper class, contains the tool functions.
 *
 * @package framework
 */
include dirname(__FILE__) . '/base/helper.class.php';
class helper extends baseHelper
{
    public static function getViewType($source = false)
    {
        global $config, $app;
        if($config->requestType != 'GET')
        {
            $pathInfo = $app->getPathInfo();
            if(!empty($pathInfo))
            {
                $dotPos = strrpos($pathInfo, '.');
                if($dotPos)
                {
                    $viewType = substr($pathInfo, $dotPos + 1);
                }
                else
                {
                    $config->default->view = $config->default->view == 'mhtml' ? 'html' : $config->default->view;
                }
            }
        }
        elseif($config->requestType == 'GET')
        {
            if(isset($_GET[$config->viewVar]))
            {
                $viewType = $_GET[$config->viewVar]; 
            }
            else
            {
                /* Set default view when url has not module name. such as only domain. */
                $config->default->view = ($config->default->view == 'mhtml' and isset($_GET[$config->moduleVar])) ? 'html' : $config->default->view;
            }
        }
        if($source and isset($viewType)) return $viewType;

        if(isset($viewType) and strpos($config->views, ',' . $viewType . ',') === false) $viewType = $config->default->view;
        return isset($viewType) ? $viewType : $config->default->view;
    }

    /**
     * Encode json for $.parseJSON
     * 
     * @param  array  $data 
     * @param  int    $options 
     * @static
     * @access public
     * @return string
     */
    static public function jsonEncode4Parse($data, $options = 0)
    {
        $json = json_encode($data);
        if($options) $json = str_replace(array("'", '"'), array('\u0027', '\u0022'), $json);

        $escapers     = array("\\",  "/",   "\"", "'", "\n",  "\r",  "\t", "\x08", "\x0c", "\\\\u");
        $replacements = array("\\\\", "\\/", "\\\"", "\'", "\\n", "\\r", "\\t",  "\\f",  "\\b", "\\u");
        return str_replace($escapers, $replacements, $json);
    }
}
