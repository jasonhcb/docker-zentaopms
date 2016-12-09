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

  js::exportConfigVars();
  if($config->debug)
  {
      js::import($jsRoot . 'jquery/lib.js');
      js::import($jsRoot . 'zui/min.js');
      js::import($jsRoot . 'my.min.js');

      css::import($themeRoot . 'zui/css/min.css');
      css::import($defaultTheme . 'style.css');

      css::import($langTheme);
      if(strpos($clientTheme, 'default') === false) css::import($clientTheme . 'style.css');
  }
  else
  {
      js::import($jsRoot . 'all.js');
      css::import($defaultTheme . $this->cookie->lang . '.' . $this->cookie->theme . '.css');
  }

  if(!defined('IN_INSTALL') and commonModel::isTutorialMode())
  {
      $wizardModule    = defined('WIZARD_MODULE') ? WIZARD_MODULE : $this->moduleName;
      $wizardMethod    = defined('WIZARD_METHOD') ? WIZARD_METHOD : $this->methodName;
      $requiredFields  = '';
      if(isset($config->$wizardModule->$wizardMethod->requiredFields)) $requiredFields = str_replace(' ', '', $config->$wizardModule->$wizardMethod->requiredFields);
      echo "<script>window.TUTORIAL = {'module': '$wizardModule', 'method': '$wizardMethod', tip: '$lang->tutorialConfirm'}; if(config) config.requiredFields = '$requiredFields'; </script>";
  }

  if(isset($pageCSS)) css::internal($pageCSS);

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
<script>
function initHelpLink(){var c="<?php echo $this->createLink('manual','index');?>";var f=$("#mainmenu > .nav").first();var a;var e=10000;var d=function(){clearTimeout(a);$("#helpContent").removeClass("show-error")};var g=function(){d();var j=f.children("li.active:not(#helpMenuItem)").removeClass("active").addClass("close-help-tab");var h=$("#helpMenuItem").addClass("active");var l=$("#helpContent");if(!l.length){l=$('<div id="helpContent"><div class="load-error text-center"><h4 class="text-danger">'+lang.timeout+'</h4><p><a href="###" class="open-help-tab"><i class="icon icon-arrow-right"></i> '+c+'</a></p></div><iframe id="helpIframe" name="helpIframe" src="'+c+'" frameborder="no" allowtransparency="true" scrolling="auto" hidefocus="" style="width: 100%; height: 100%; left: 0px;"></iframe></div>');$("#header").after(l);var k=$("#helpIframe").get(0);a=setTimeout(function(){$("#helpContent").addClass("show-error")},e);k.onload=k.onreadystatechange=function(){if(this.readyState&&this.readyState!="complete"){return}d()}}else{if($("body").hasClass("show-help-tab")){$("#helpIframe").get(0).contentWindow.location.replace(c);return}}$("body").addClass("show-help-tab")};var b=function(){$("body").removeClass("show-help-tab");$("#helpMenuItem").removeClass("active");f.find("li.close-help-tab").removeClass("close-help-tab").addClass("active")};$(document).on("click",".open-help-tab",function(){var h=$("#helpMenuItem");if(!h.length){h=$('<li id="helpMenuItem"><a href="javascript:;" class="open-help-tab">'+$(this).text()+'<i class="icon icon-remove close-help-tab"></i></a></li>');f.find(".custom-item").before(h)}g()}).on("click",".close-help-tab",function(h){b();h.stopPropagation();h.preventDefault()})}
</script>
</head>
<body>
