<?php
/**
 * The report view file of task module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      wenjie<wenjie@cnezsoft.com>
 * @package     project
 * @version     $Id: report.html.php 1594 2011-04-10 11:00:00Z wj $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include 'chart.html.php';?>
<?php js::set('confirmDelete', $lang->hdc->confirmDelete);?>
<?php js::set('browseType', $browseType);?>
<script>
$(function()
{
    $('#<?php echo $browseType; ?>Tab').addClass('active');
});
</script>
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id='unactivatedTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('browse', "browseType=unactivated"), $lang->hdc->browse); ?></li>
        <li id='devcountTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcdevcount', "browseType=devcount"), $lang->hdc->hdcdevcount); ?></li>
        <li id='hdcquestionTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcquestion', "browseType=hdcquestion"), $lang->hdc->hdcquestion); ?></li>
    </ul>
</div>
<div class='row'>
  <div class='col-md-3 col-lg-2'>
    <div class='panel panel-sm'>
      <div class='panel-heading'>
        <strong><?php echo $lang->hdc->report->select;?></strong>
      </div>
      <div class='panel-body' style='padding-top:0'>
        <form method='post'>
          <?php echo html::checkBox('charts', $lang->hdc->report->chartques, $checkedCharts, '', 'block')?>
          <?php echo html::selectAll('', "button", false, 'btn-sm')?>
          <?php echo html::submitButton($lang->hdc->report->create, "", 'btn btn-sm btn-primary');?>
        </form>
      </div>
    </div>
  </div>
  <div class='col-md-9 col-lg-10'>
    <div class='panel panel-sm'>
      <div class='panel-heading'>
        <strong><?php echo $lang->hdc->report->common;?></strong>
      </div>
      <table class='table active-disabled'>
        <?php foreach($charts as $chartType => $chartOption):?>
        <tr class='text-top'>
          <td>
            <div class='chart-wrapper text-center'>
              <h5><?php echo $lang->hdc->report->chartques[$chartType];?></h5>
              <div class='chart-canvas'><canvas id='chart-<?php echo $chartType ?>' width='<?php echo $chartOption->width;?>' height='<?php echo $chartOption->height;?>' data-responsive='true'></canvas></div>
            </div>
          </td>
          <td style='width: 320px;'>
            <div style="height: 480px;overflow:auto;" class='table-wrapper'>
              <table class='table table-condensed table-hover table-striped table-bordered table-chart' data-chart='<?php echo $chartOption->type; ?>' data-target='#chart-<?php echo $chartType ?>' data-animation='false'>
                <thead>
                  <tr>
                    <th class='chart-label' colspan='2'><?php echo $lang->hdc->report->$chartType->item;?></th>
                    <th><?php echo $lang->hdc->report->quesvalue;?></th>
                    <th><?php echo $lang->hdc->report->quesday;?></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($datas[$chartType] as $key => $data):?>
                <tr class='text-center'>
                  <td class='chart-color w-20px'><i class='chart-color-dot icon-circle'></i></td>
                  <td class='chart-label'><?php echo $data->name;?></td>
                  <td class='chart-value'><?php echo $data->quesvalue;?></td>
                  <td class='chart-manday'><?php echo $data->quesday;?></td>
                </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
