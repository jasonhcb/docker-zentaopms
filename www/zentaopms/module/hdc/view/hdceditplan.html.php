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
<script>
$(function()
{
    $('#hdceditoneTab').addClass('active');
});
</script>
<style type="text/css">
    .require_td{
        color: #d2322d !important; 
        font-family: arial !important;
        font-size: 20px !important;
        content: "*" !important;
    }
</style>
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id='hdceditoneTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdceditplan', "hdcID=$editid&user_id=$user_id&hr_id=$hr_id"), $lang->hdc->hdceditplan); ?></li>
    </ul>

</div>
<form class='form-condensed' method='post' target='hiddenwin'>
  <table class='table table-form' style="border: none;">
      <tr>
        <th><?php echo $lang->hdc->date;?></th>
        <td><?php echo html::input("plandate",$olddata->plandate, "class='form-control form-date'");?></td>
        <td class="require_td">*</td>
        <th><?php echo $lang->hdc->hdcproject;?></th>
        <td><?php echo html::select('project_id',$projects,$olddata->project_id, "class='form-control chosen'");?></td>
        <td class="require_td"></td>
      </tr> 
      <tr>
        <th><?php echo $lang->hdc->plan->worktype;?></th>
        <td><?php echo html::select('worktype',$typelist,$olddata->worktype,"class='form-control chosen'");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->plan->planpercent;?></th>
        <td><input type="number" name="percent" id="planpercent" value="<?php echo $olddata->percent;?>" class="form-control"  min="1" max = '100' autocomplete="off"></td>
      </tr>
      <tr>
        <th><?php echo $lang->hdc->plan->plantarget;?></th>
        <td><?php echo html::textarea('target',$olddata->target,"class='form-control'");?></td>
      </tr>     
      <tr><td></td><td colspan='2'><?php echo html::submitButton() . html::backButton();?></td></tr>
  </table>
</form>
<?php include '../../common/view/footer.html.php';?>
