<?php
/**
 * The browse view file of testtask module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     testtask
 * @version     $Id: browse.html.php 4129 2013-01-18 01:58:14Z wwccss $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::set('confirmDelete', $lang->testtask->confirmDelete)?>
<div id="featurebar">
  <ul class="nav">
    <li id='waitTab'><?php echo html::a(inlink('browse', "productID=$productID&branch=$branch&type=wait"), $lang->testtask->wait);?></li>
    <li id='doneTab'><?php echo html::a(inlink('browse', "productID=$productID&branch=$branch&type=done"), $lang->testtask->done);?></li>
  </ul>
  <div class="actions"><?php common::printIcon('testtask', 'create', "product=$productID");?></div>
</div>
<table class='table tablesorter table-fixed' id='taskList'>
  <thead>
  <?php $vars = "productID=$productID&branch=$branch&type=$type&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}"; ?>
    <tr>
      <th class='w-id'>   <?php common::printOrderLink('id',      $orderBy, $vars, $lang->idAB);?></th>
      <th class='w-200px'><?php common::printOrderLink('name',    $orderBy, $vars, $lang->testtask->name);?></th>
      <th>                <?php echo $lang->testtask->project . '/' . $lang->testtask->build;?>
      <th class='w-user'> <?php common::printOrderLink('owner',   $orderBy, $vars, $lang->testtask->owner);?></th>
      <th class='w-100px'><?php common::printOrderLink('begin',   $orderBy, $vars, $lang->testtask->begin);?></th>
      <th class='w-100px'><?php common::printOrderLink('end',     $orderBy, $vars, $lang->testtask->end);?></th>
      <th class='w-80px'> <?php common::printOrderLink('status',  $orderBy, $vars, $lang->statusAB);?></th>
      <th class='w-120px {sorter:false}'><?php echo $lang->actions;?></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($tasks as $task):?>
  <tr class='text-center'>
    <td><?php echo html::a(inlink('view', "taskID=$task->id"), sprintf('%03d', $task->id));?></td>
    <td class='text-left' title="<?php echo $task->name?>"><?php echo html::a(inlink('cases', "taskID=$task->id"), $task->name);?></td>
    <td title="<?php echo $task->projectName . '/' . $task->buildName?>">
      <?php
      echo html::a($this->createLink('project', 'story', "projectID=$task->project"), $task->projectName) . '/'; 
      $task->build == 'trunk' ? print('Trunk') : print(html::a($this->createLink('build', 'view', "buildID=$task->build"), $task->buildName));;
      ?>
    </td>
    <td><?php echo zget($users, $task->owner);?></td>
    <td><?php echo $task->begin?></td>
    <td><?php echo $task->end?></td>
    <td class='status-<?php echo $task->status?>'><?php echo $lang->testtask->statusList[$task->status];?></td>
    <td class='text-center'>
      <?php
      common::printIcon('testtask', 'cases',    "taskID=$task->id", 'play', 'list', 'smile');
      common::printIcon('testtask', 'view',     "taskID=$task->id", '', 'list', 'file');
      common::printIcon('testtask', 'linkCase', "taskID=$task->id", '', 'list', 'link');
      common::printIcon('testtask', 'edit',     "taskID=$task->id", '', 'list');

      if(common::hasPriv('testtask', 'delete'))
      {
          $deleteURL = $this->createLink('testtask', 'delete', "taskID=$task->id&confirm=yes");
          echo html::a("javascript:ajaxDelete(\"$deleteURL\",\"taskList\",confirmDelete)", '<i class="icon-remove"></i>', '', "title='{$lang->testtask->delete}' class='btn-icon'");
      }
      ?>
    </td>
  </tr>
  <?php endforeach;?>
  </tbody>
  <tfoot><tr><td colspan='8'><?php $pager->show();?></td></tr></tfoot>
</table>
<script>$(function(){$('#<?php echo $type?>Tab').addClass('active')})</script>
<?php include '../../common/view/footer.html.php';?>
