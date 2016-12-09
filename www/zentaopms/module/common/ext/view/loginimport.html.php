<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php
$webRoot      = $this->app->getWebRoot();
$jsRoot       = $webRoot . "js/";
$themeRoot    = $webRoot . "theme/";
$defaultTheme = $webRoot . 'theme/default/';
$langTheme    = $themeRoot . 'lang/' . $app->getClientLang() . '.css';
$clientTheme  = $this->app->getClientTheme();
?>
<!DOCTYPE html>
<html lang='<?php echo $app->getClientLang();?>'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="renderer" content="webkit">
    <?php
    echo html::title($title . ' - ' . $lang->zentaoPMS);
    js::import($jsRoot . 'login/jquery.min.js',$config->version);
    js::import($jsRoot . 'login/beyond.min.js',$config->version);
    js::import($jsRoot . 'login/bootstrap.min.js',$config->version);
    js::import($jsRoot . 'login/main.js',$config->version);
    js::import($jsRoot . 'login/skins.min.js',$config->version);

    css::import($themeRoot . 'login/beyond.min.css',$config->version);
    css::import($themeRoot . 'login/bootstrap.min.css',$config->version);
    css::import($themeRoot . 'login/font-awesome.min.css',$config->version);
    css::import($themeRoot . 'login/mylogin.css',$config->version);
    css::import($themeRoot . 'login/mystyle.css',$config->version);
    css::import($themeRoot . 'login/typicons.min.css',$config->version);

    js::exportConfigVars();
    if($config->debug)
    {
        js::import($jsRoot . 'jquery/lib.js', $config->version);
        js::import($jsRoot . 'zui/min.js', $config->version);
        js::import($jsRoot . 'my.min.js',     $config->version);

        css::import($themeRoot . 'zui/css/min.css',   $config->version);
        css::import($defaultTheme . 'style.css', $config->version);

        css::import($langTheme, $config->version);
        if(strpos($clientTheme, 'default') === false) css::import($clientTheme . 'style.css', $config->version);
    }
    else
    {
        js::import($jsRoot . 'all.js', $config->version);
        css::import($defaultTheme . $this->cookie->lang . '.' . $this->cookie->theme . '.css', $config->version);
    }

    if(isset($pageCss)) css::internal($pageCss);

    echo html::favicon($webRoot . 'favicon.ico');
    ?>
    <!--[if lt IE 9]>
    <?php
js::import($jsRoot . 'html5shiv/min.js');
js::import($jsRoot . 'respond/min.js');
?>
    <![endif]-->
    <!--[if lt IE 10]>
    <?php js::import($jsRoot . 'jquery/placeholder/min.js'); ?>
    <![endif]-->
</head>
<body>
