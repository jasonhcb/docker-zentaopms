<?php include '../../../common/view/header.html.php';?>
<style>
    .rowcolor{background-color: #f9f9f9;}

</style>
<div id='titlebar'>
  <div class='heading'>
    <strong> <?php echo $title;?></strong>
  </div>
</div>
<div class='side'>
  <?php include '../../view/blockreportlist.html.php';?>
</div>

<div class='main' style="margin-bottom: 40px;">
  <div id='conditions' style='line-height: 34px;height: 59px'>
  <div class="active-a" style="float: left">
    <table>
      <tbody>
        <tr>
          
          <td>
            <strong><?php echo $lang->report->productnames?>：</strong>
          </td>
          <td style="width: 140px;">
            <input type="text" name="productnames" id="productnames" value="<?php echo $productname;?>" class="form-control  searchInput" style="height: 25px;">
          </td>
          <td style="padding-left: 10px">
            <strong><?php echo $lang->report->objectnames?>：</strong>
          </td>
          <td style="width: 140px;">
            <input type="text" name="objectnames" id="objectnames" value="<?php echo $objectname;?>" class="form-control  searchInput" style="height: 25px;">
          </td>
          <td style="padding-left: 10px">
            <strong><?php echo $lang->report->projectstatus?>：</strong>
          </td>
          <td>
            <select name='projectType' style='height: 25px;' class="form-control w-80px" id="projectType">
              <option value=''></option>
              <option value='doingnow' <?php if($type=='doingnow' ) echo 'selected';?>>
                <?php echo $lang->report->doingnow?>
              </option>
              <option value='doingwait' <?php if($type=='doingwait' ) echo 'selected';?>>
                <?php echo $lang->report->doingwait?>
              </option>
              <option value='other' <?php if($type=='other' ) echo 'selected';?>>
                <?php echo $lang->report->otherProject?>
              </option>

            </select>
          </td>
            <td style="padding-left: 10px">
            <button class="btn btn-primary pull-right" style="height:30px;line-height:17px;" target="_blank" id="sub_search">搜索</button>
            </td>
          
        </tr>
      </tbody>
    </table>
    </div>
     <div class='active-b' style="float: right;margin-top: 3px;">
            <?php echo html::a($this->createLink('report', 'productStatisticsExport', "orderBy=$orderBy&type=$type&productnames=$productname&objectnames=$objectname"), "<i class='icon-download-alt'></i></i>$lang->export", '_blank', "class='bttn btn-export' style='color:#036;");?>
     </div>
  </div>

  <table class='table table-condensed table-bordered tablesorter table-fixed active-disabled' id='product'>
    <thead>
    <tr class='colhead'>
        <?php $vars = "orderBy=%s&type=$type&productnames=$productname&objectnames=$objectname";?>
      <th class="w-50px">序号</th>
      <th width='300'><?php common::printOrderLink('name', $orderBy, $vars, $lang->report->productName);?><?php //echo $lang->report->productName;?></th>
      <th class="w-80px"><?php common::printOrderLink('totalStory', $orderBy, $vars, $lang->report->storyTotal);?><?php //echo $lang->report->storyTotal;?></th>
      <th class="w-50px"><?php echo $lang->report->storyActive;?></th>
      <th class="w-50px"><?php echo $lang->report->storyClosed;?></th>
      <th><?php echo $lang->report->projectName;?></th>
      <th class="w-60px"><?php common::printOrderLink('totalTask', $orderBy, $vars, $lang->report->taskTotal);?></th>
      <th class="w-50px"><?php echo $lang->report->taskOngoing;?></th>
      <th class="w-50px"><?php echo $lang->report->taskClosed;?></th>
      <th class="w-50px"><?php echo $lang->report->bugTotal;?></th>
      <th class="w-50px"><?php echo $lang->report->bugActive;?></th>
      <th class="w-50px"><?php echo $lang->report->bugResolved;?></th>
    </tr>
    </thead>
    <tbody>
     <?php $iee = 1;?>
    <?php foreach($statistics as $product):?>
        <?php if($product->projects):?>
        <?php $style = $style=='' ? 'rowcolor' : ''; ?>
      <tr class="a-center">
        <?php $count = isset($product->projects) ? count($product->projects) : 1;?>
        <td class="<?php echo $style;?>" align='left' rowspan="<?php echo $count;?>"><?php echo $iee; $iee++;?></td>
        <td class="<?php echo $style;?>" align='left' rowspan="<?php echo $count;?>"><?php echo "<p>" . html::a($this->createLink('product', 'view', "product=$product->id"), $product->name) . "</p>";?></td>
        <td class="<?php echo $style;?>" rowspan="<?php echo $count;?>" class="a-center"><?php echo $product->totalStory;?></td>
        <td class="<?php echo $style;?>" rowspan="<?php echo $count;?>" class="a-center"><?php echo $product->totalStory-$product->closedStory;?></td>
        <td class="<?php echo $style;?>" rowspan="<?php echo $count;?>" class="a-center"><?php echo $product->closedStory;?></td>
        <?php $id = 1;?>
        <?php foreach($product->projects as $project):?>
          <?php $tdclass = $tdclass=='' ? 'rowcolor' : '';?>
          <?php if($id != 1) echo "<tr class='a-center'>"?>
            <td align='left' class="<?php echo $tdclass;?>"><?php echo $project->name;?></td>
            <td class="<?php echo $tdclass;?>"><?php echo $project->totalTask;?></td>
            <td class="<?php echo $tdclass;?>"><?php echo $project->totalTask-$project->closedTask;?></td>
            <td class="<?php echo $tdclass;?>"><?php echo $project->closedTask;?></td>
            <td class="<?php echo $tdclass;?>"><?php echo $project->totalBug;?></td>
            <td class="<?php echo $tdclass;?>"><?php echo $project->activeBug;?></td>
            <td class="<?php echo $tdclass;?>"><?php echo $project->totalBug-$project->activeBug;?></td>
          <?php if($id != 1) echo "</tr>"?>
          <?php $id ++;?>
        <?php endforeach;?>
      </tr>
      <?php endif;?>

    <?php endforeach;?>
    </tbody>

  </table> 
</div>

<script>
$('#sub_search').click(function()
{
    var type = $("#projectType").val();
    var productname = $("#productnames").val();
    var projectname = $("#objectnames").val();
    productname = encodeURIComponent(productname);
    projectname = encodeURIComponent(projectname);
    // projectname = projectname.replace(/-/g,"%%");
    location.href = createLink('report', 'productStatistics', 'orderBy=<?php echo $orderBy;?>&type=' + type +'&productnames=' + productname +'&objectnames='+projectname);
})
</script>
<?php include '../../../common/view/footer.html.php';?>
