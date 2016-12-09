<?php
if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
include '../../common/view/header.lite.html.php';
?>

<style type="text/css">
  body{
    padding-bottom: 0px;
  }
  #header{
    padding-top: 0px;
  }
  #wrap {
	padding-bottom: 30px;
	}
</style>
<header id='header'>

  <nav id="modulemenu">
    <?php commonModel::printModuleMenu($this->moduleName);?>
  </nav>
</header>

<div id='wrap'>
  <div class='outer'>


