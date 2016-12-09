<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../common/view/header.lite.html.php';?>
<?php include '../../common/view/tablesorter.html.php';?>
<div class='main'>
<form class="form-condensed" method='post' target='hiddenwin' id='dataform'>
<div class="form-group">
<div class="form-group has-success">
  <label for="inputSuccess1">请输入您申请的CSI编码</label>
  <input type="text" class="form-control" id="inputSuccess1" name="CSIcode">
</div>
</div>
    <div align="center"><?php echo html::submitButton('下载');?></div>
</form>
</div>