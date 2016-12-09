<?php include './header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>

<style type="text/css">
  #bymoduleTab{
    margin-left:10px; 
  }
</style>
<script language='Javascript'>
var browseType = '<?php echo $browseType;?>';
var confirmDelete ='<?php echo $lang->manual->confirmDelete;?>';
</script>
<div id='featurebar'>
  <ul class='nav'>
    <li id='bymoduleTab'><b><?php echo $lang->manual->browse;?></b></li>
  </ul>
  <div class='actions'>
    <?php common::printIcon('manual', 'create');?>
  </div>
</div>

<div class='main'>
  <table class='table table-condensed table-hover table-striped tablesorter table-fixed' id='manualList'>
    <thead>
      <tr>
        <th>   <?php echo $lang->manual->manualName;?></th>
        <th class='w-150px'>   <?php echo $lang->manual->creater;?></th>
        <th class='w-250px'><?php echo $lang->manual->time;?></th>
        <th class='w-100px {sorter:false}'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($manuals as $key => $manual):?>
      <?php
      $viewLink = $this->createLink('manual', 'view', "name=$key");
      ?>
      <tr class='text-center'>
        <td><nobr><?php echo html::a($viewLink, $manual->title, '_blank');?></nobr></td>
        <td><nobr><?php echo $manual->creater;?></nobr></td>
        <td><?php echo $manual->time;?></td>
        <td>
          <?php 
          common::printIcon('manual', 'edit', "manual={$key}", '', 'list');
          if(common::hasPriv('manual', 'delete'))
          {
              $deleteURL = $this->createLink('manual', 'delete', "ID=$key&confirm=yes");
              echo html::a("javascript:ajaxDelete(\"$deleteURL\",\"manualList\",confirmDelete)", '<i class="icon-remove"></i>', '', "class='btn-icon' title='{$lang->manual->delete}'");
          }
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<?php include './footer.html.php';?>