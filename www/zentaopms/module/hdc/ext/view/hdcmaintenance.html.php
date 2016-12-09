<?php
/**
 * The browse view file of group module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     group
 * @version     $Id: browse.html.php 4769 2013-05-05 07:24:21Z wwccss $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/tablesorter.html.php';?>
<?php js::set('isnotvalid', $lang->hdc->isnotvalid);?>
<?php js::set('browseType', $browseType);?>
<script>
$(function()
{
    $('#<?php echo $browseType; ?>Tab').addClass('active');
});
</script>
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id='allcationTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcallcation', "browseType=allcation"), $lang->hdc->project_allocation); ?></li>
        <li id='undoneTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcundone', "browseType=undone"), $lang->hdc->project_undone); ?></li>
        <li id='unactivatedTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcmanage', "browseType=unactivated"), $lang->hdc->manage); ?></li>        
        <li id='maintenanceTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcmaintenance', "browseType=maintenance"), $lang->hdc->maintenance); ?></li>
    </ul>
</div>
<table align='center' class='table table-condensed table-hover table-striped  tablesorter table-fixed' id='groupList'>
  <thead>
    <tr>
     <th class='w-id'><?php echo $lang->hdc->grpid;?></th>
     <th class='w-120px'><?php echo $lang->hdc->grpname;?></th>
     <th><?php echo $lang->hdc->grpdesc;?></th>
     <th class='w-p60'><?php echo $lang->hdc->grpusers;?></th>
     <th class='w-150px {sorter:false}'><?php echo $lang->actions;?></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($groups as $group):?>
  <?php $users = implode(' ', $groupUsers[$group->id]);?>
  <tr class='text-center'>
    <td class='strong'><?php echo $group->id;?></td>
    <td class='text-left'><?php echo $group->name;?></td>
    <td class='text-left'><?php echo $group->desc;?></td>
    <td class='text-left' title='<?php echo $users;?>'><?php echo $users;?></td>
    <td class='text-center'>
      <?php common::printIcon('group', 'managemember', "groupID=$group->id", '', 'list', 'group', '', 'iframe', 'yes');?>
    </td>
  </tr>
  <?php endforeach;?>
  </tbody>
</table>
<?php include '../../../common/view/footer.html.php';?>
