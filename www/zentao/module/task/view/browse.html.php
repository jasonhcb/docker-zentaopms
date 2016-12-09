<?php
/**
 * The browse view file of task module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     task
 * @version     $Id: browse.html.php 4129 2013-01-18 01:58:14Z wwccss $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='doc3'>
  <table align='center' class='table-4'>
    <caption><?php echo $lang->task->browse;?></caption>
    <tr>
      <th><?php echo $lang->task->id;?></th>
      <th><?php echo $lang->task->name;?></th>
      <th><?php echo $lang->task->assignedTo;?></th>
    </tr>
    <?php foreach($tasks as $task):?>
    <tr>
      <td><?php echo $task->id;?></td>
      <td><?php echo $task->name;?></td>
      <td><?php echo $task->assignedTo;?></td>
    </tr>
    <?php endforeach;?>
  </table>
  <?php 
  $vars['project'] = $project;
  $addLink = $this->createLink($this->moduleName, 'create', $vars);
  echo "<a href='$addLink'>{$lang->task->create}</a>";
  ?>
</div>  
<?php include '../../common/view/footer.html.php';?>
