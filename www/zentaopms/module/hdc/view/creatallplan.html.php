<?php
/**
 * The batch create view of task module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yangyang Shi <shiyangyang@cnezsoft.com>
 * @package     task
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id='creatallplanTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('creatallplan', "user_id=$user_id&hr_id=$hr_id"), $lang->hdc->creatallplan); ?></li>
    </ul>
</div>
<?php
$visibleFields = array();
foreach(explode(',', $showFields) as $field)
{
    if($field)$visibleFields[$field] = '';
}
?>
<form class='form-condensed' method='post' target='hiddenwin'>
  <table class='table table-form with-border' style="border-collapse:initial;">
    <thead>
      <tr class='text-center'>
        <th class='w-30px'><?php echo $lang->idAB;?></th> 
        <th class='w-200px'><?php echo $lang->hdc->plan->datefrom;?> <span class='required'></span></th>
        <th class='w-200px'><?php echo $lang->hdc->plan->dateto;?> <span class='required'></span></th>
        <th class='w-200px'><?php echo $lang->hdc->hdcproject;?></th>
        <th class='w-150px'><?php echo $lang->hdc->plan->worktype;?></th>
        <th class='w-200px'><?php echo $lang->hdc->plan->planpercent;?></th>
        <th width="220px;"><?php echo $lang->hdc->plan->plantarget;?></th>
      </tr>
    </thead>

    <?php for($i = 0; $i < $config->hdc->batchCreate; $i++):?>
    <?php 
    if($i == 0)
    {

        $datefrom = '';
        $type         = '';
        $projee = '';
    }
    else
    {
       $type = 'ditto';
       $projee = 'ditto';
    }
    ?>
    <?php $pri = 3;?>
    <tr>
      <td class='text-center'><?php echo $i+1;?></td>
      <td ><?php echo html::input("datefrom[$i]",'', "class='form-control text-center form-date'");?></td>
      <td ><?php echo html::input("dateto[$i]", '', "class='form-control text-center form-date'");?></td>
      <td><?php echo html::select("hdcproject[$i]", $projectlist,$projee,"class='form-control chosen'");?></td>
      <td><?php echo html::select("type[$i]", $typelist, $type, "class='form-control chosen'");?></td>
      <td><input type="number" name="planpercent[<?php echo $i;?>]" id="planpercent[<?php echo $i;?>]" value="100" class="form-control"  min="1" max = '100' autocomplete="off"></td>
      <td ><?php echo html::textarea("plantarget[$i]", '', "rows='1' class='form-control autosize'");?></td>
    </tr>
    <?php endfor;?>
    <tr><td colspan='7' class='text-center'><?php echo html::submitButton() . html::backButton();?></td></tr>
  </table>
</form>
<?php js::set('mainField', 'name');?>
<?php js::set('ditto', $lang->hdc->ditto);?> 
<?php $customLink = $this->createLink('custom', 'ajaxSaveCustomFields', 'module=task&section=custom&key=batchCreateFields')?>
<?php include '../../common/view/customfield.html.php';?>
<?php include '../../common/view/pastetext.html.php';?>
<?php include '../../common/view/footer.html.php';?>
