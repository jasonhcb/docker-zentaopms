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
<div class='main'>
    <div class='row' style='margin-bottom:5px;'>
        <div class='col-sm-4'>
            <div class='input-group w-200px input-group-sm'>
                <span class='input-group-addon'><?php echo $lang->report->project;?></span>
                <?php echo html::select('project', $projects, $projectID, "class='form-control chosen' onchange='changeProject(this.value)' autocomplete='off'");?>
            </div>
        </div>
    </div>
  <table class='table table-condensed table-bordered tablesorter table-fixed active-disabled'>
    <thead>
        <tr class='colhead'>
          <th><?php echo $lang->report->projectName;?></th>
          <th><?php echo $lang->report->projectCode;?></th>
          <th class="w-150px"><?php echo $lang->report->projectMember;?></th>
          <th class="w-100px"><?php echo $lang->report->planMandays;?></th>
          <th class="w-100px"><?php echo $lang->report->actualMandays;?></th>
          <th class="w-100px"><?php echo $lang->report->deviation;?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($projectDays as $project):?>
        <?php $style = $style=='' ? 'rowcolor' : ''; ?>
      <tr class="a-center">
        <?php $count = isset($project->mandays) ? count($project->mandays) : 1;?>
        <td class="<?php echo $style;?>" align='left' rowspan="<?php echo $count;?>"><?php echo "<p>" . html::a($this->createLink('project', 'view', "project=$project->id"), $project->name) . "</p>";?></td>
        <td class="<?php echo $style;?>" rowspan="<?php echo $count;?>" class="a-center"><?php echo $project->code;?></td>
        <?php $id = 1;?>
        <?php foreach($project->mandays as $manday):?>
          <?php $tdclass = $tdclass=='' ? 'rowcolor' : '';?>
          <?php if($id != 1) echo "<tr class='a-center'>"?>
            <td class="<?php echo $tdclass;?>"><?php echo $manday->realname;?></td>
            <td class="<?php echo $tdclass;?>"><?php echo $manday->plandays;?></td>
            <td class="<?php echo $tdclass;?>"><?php echo $manday->actualdays;?></td>
            <td class="<?php echo $tdclass;?>"><?php if($manday->plandays!='' && $manday->actualdays!='') echo sprintf("%01.2f",($manday->actualdays-$manday->plandays)/$manday->plandays*100) . '%';?></td>
          <?php if($id != 1) echo "</tr>"?>
          <?php $id ++;?>
        <?php endforeach;?>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table> 
</div>
<script>
function changeProject(project) {
	link = createLink('report', 'projectdays', 'projectID=' + project);
    location.href=link;
}
</script>
<?php include '../../../common/view/footer.html.php';?>
