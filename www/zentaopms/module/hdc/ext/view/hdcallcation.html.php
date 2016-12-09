<?php
include '../../../common/view/header.html.php';
include '../../view/table.html.php';
?>
<?php js::set('isnotvalid', $lang->hdc->isnotvalid);?>
<?php js::set('browseType', $browseType);?>
<script>
$(function()
{
    if(browseType == 'bysearch') ajaxGetSearchForm();
    $('#bll').click();
    $('#<?php echo $browseType; ?>Tab').addClass('active');
});
</script>
<style>
    .color-tip {color: red;}
</style>
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id='allcationTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcallcation', "browseType=allcation"), $lang->hdc->project_allocation); ?></li>
        <li id='undoneTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcundone', "browseType=undone"), $lang->hdc->project_undone); ?></li>
        <li id='unactivatedTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcmanage', "browseType=unactivated"), $lang->hdc->manage); ?></li>        
        <?php if ($roleok == 'yes'):?>
        <li id='maintenanceTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcmaintenance', "browseType=maintenance"), $lang->hdc->maintenance); ?></li>
        <?php endif;?>
        <li id='bysearchTab' style="display: none;"><?php echo "<a id='bll' href='#'><i class='icon-search icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
    </ul>
    <div class='actions'>
         <div class='btn-group'>
            <?php echo html::a(helper::createLink('hdc', 'createcation'), "<i class='icon-plus'></i> " . $lang->hdc->create, '', "class='btn'") ?>
        </div>
        
    </div>
    <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div>
<div class="main">
    <form id='batchForm' method='post'>
        <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false" data-fixed-left-width="400" data-fixed-right-width="100" data-custom-menu="true" data-checkbox-name="hdcIDList[]">
            <thead>
                <tr>
                    <?php $vars = "projectID=$projectID&branch=$branch&browseType=$browseType&param=$moduleID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}"; ?>
                    <th data-flex="false" data-width="160"><?php echo $lang->hdc->project; ?></th>
                    <th data-flex="false" data-width="140"><?php echo $lang->hdc->projectframe; ?></th>
                    <th data-flex="false" data-width="100"><?php echo $lang->hdc->projectmanager; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->uatdate; ?></th>
                    <th data-flex="true" data-width="140"><?php echo  $lang->hdc->onlinedate; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->applystatus; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assignstatus; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assigntocenter; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assigntotestcenter; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->cto; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->spotcto; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->fpd; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->applydescription; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->applydate; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->applyuser; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assigntodevelop; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assigndate; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->devtechmanager; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->devtestmanager; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assignnote; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->listcomfim; ?></th>
                    <th data-flex="false" data-width="100" class="w-actions"><?php echo $lang->hdc->operation; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allcation as $key => $hdc): ?>
                    <tr class='text-center' data-id='<?php echo $hdc->id ?>'>
                        <td><?php echo $hdc->name; ?></td>
                        <td><?php echo $hdc->frame_name;?></td>
                        <td><?php echo $hdc->manager_name; ?></td>
                        <td><?php echo $hdc->uat_date; ?></td>
                        <td><?php echo $hdc->online_date; ?></td>
                        <td><?php echo $lang->hdc->statustype[$hdc->applystatus]; ?></td>
                        <td><?php echo $lang->hdc->assigntype[$hdc->assignstatus]; ?></td>
                        <td><?php echo $hdc->center_name; ?></td>
                        <td><?php echo $hdc->test_name; ?></td>
                        <td><?php echo $hdc->cto_name; ?></td>
                        <td><?php echo $hdc->spotcto_name; ?></td>
                        <td><?php echo $hdc->fpd; ?></td>
                        <td><?php echo $hdc->description; ?></td>
                        <td><?php echo $hdc->applydate; ?></td>
                        <td><?php echo $hdc->username; ?></td>
                        <td><?php echo $hdc->assigntodevelop; ?></td>
                        <td><?php echo $hdc->assigndate; ?></td>
                        <td><?php echo $hdc->techname; ?></td>
                        <td><?php echo $hdc->testname; ?></td>
                        <td><?php echo $hdc->assignnote; ?></td>
                        <td><?php echo $hdc->comfimname; ?></td>
                        <td><?php 
                                echo html::a($this->createLink('hdc', 'allcationedit', "allcationid=$hdc->id"),'<i class="icon-common-edit icon-pencil"></i>','',"class='btn-icon'");
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>
<?php include '../../../common/view/footer.html.php'; ?>
<script language='javascript'>
    function activate(url){
        $.ajax(
        {
            type:     'GET', 
            url:      url,
            dataType: 'json', 
            success:  function(data) 
            {
                if(data.result == 'success') 
                {
                    location.reload();
                }
                else
                {
                    alert(data.message);
                }
            }
        });
    }
</script>

