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
    <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div>
<div class="main">
    <form id='batchForm' method='post'>
        <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false" data-fixed-left-width="400" data-fixed-right-width="100" data-custom-menu="true" data-checkbox-name="hdcIDList[]">
            <thead>
                <tr>
                    <?php $vars = "projectID=$projectID&branch=$branch&browseType=$browseType&param=$moduleID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}"; ?>
                    <th data-flex="false" data-width="140"><?php echo $lang->hdc->centername; ?></th>
                    <th data-flex="false" data-width="140"><?php echo $lang->hdc->totalmember; ?></th>
                    <th data-flex="false" data-width="140"><?php echo $lang->hdc->reducemenber; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->unfinishedpo; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->doingnowpo; ?></th>
                    <th data-flex="true" data-width="140"><?php echo  $lang->hdc->notdopo; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->coefficient1; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->reducecoefficient1; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->coefficient2; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->reducecoefficient2; ?></th>
                    <!-- <th data-flex="true" data-width="140"><?php echo $lang->hdc->internnumber; ?></th> -->
                    <!-- <th data-flex="true" data-width="140"><?php echo $lang->hdc->newstaffnumber; ?></th> -->
                    <!-- <th data-flex="false" data-width="100" class="w-actions"><?php echo $lang->hdc->operation; ?></th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $hdc): ?>
                    <tr class='text-center' data-id='<?php echo $hdc->id ?>'>
                        <td><?php echo $hdc->center_name; ?></td>
                        <td><?php echo $hdc->userall;?></td>
                        <td><?php echo $hdc->manager_name; ?></td>
                        <td><?php echo !empty($hdc->undone) ? $hdc->undone : 0 ; ?></td>
                        <td><?php echo !empty($hdc->done) ? $hdc->done : 0 ; ?></td>
                        <td><?php echo $hdc->undone-$hdc->done< 0 ? 0 : $hdc->undone-$hdc->done ;?></td>
                        <td><?php 
                            if (empty($hdc->userall)){
                                echo "0";
                        }else{echo round($hdc->undone/$hdc->userall,2);} ?></td>
                        <td><?php  ?></td>
                        <td><?php 
                        if (empty($hdc->userall)){
                                echo "0";
                        }else{
                            echo round(($hdc->undone-$hdc->done< 0 ? 0 : $hdc->undone-$hdc->done)/$hdc->userall,2);} ?></td>
                        <td><?php  ?></td>
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

