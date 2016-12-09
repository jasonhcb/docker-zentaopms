<?php
include '../../common/view/header.html.php';
include 'table.html.php';
include 'table2.html.php';
?>
<?php include '../../common/view/datepicker.html.php';?>
<?php js::set('confirmDelete', $lang->hdc->confirmDelete);?>
<?php js::set('browseType', $browseType);?>
<script>
$(function()
{
    if(browseType == 'bysearch') ajaxGetSearchForm();
    $('#bll').click();
    $("#peosummarydetailTab").addClass('active');
    $('#<?php echo $browseType; ?>Tab').addClass('active');
});
</script>

<style>
    .color-tip {color: red;}
</style>
<!-- allcation -->
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id='hdcsummaryTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcsummary', "browseType=hdcsummary"), $lang->hdc->hdcsummary); ?></li>
        <li id='bysearchTab' style="display: none;"><?php echo "<a id='bll' href='#'><i class='icon-search icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
        <li id='peosummaryTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('peosummary', "hr_id=$hr_id&browseType=peosummary"), $lang->hdc->peosummary); ?></li>
        <li id='peosummarydetailTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('peosummarydetail', "userid=$userid&browseType=peosummarydetail"), $lang->hdc->peosummarydetail); ?></li>
    </ul>
    <div class='actions' style="margin-right: 30px;">
        <div class='btn-group'>
                <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' id='exportAction'>
                    <i class='icon-download-alt'></i> <?php echo $lang->export ?>
                    <span class='caret'></span>
                </button>
                <ul class='dropdown-menu' id='exportActionMenu'>
                    <?php
                    $link = $this->createLink('hdc', 'exportpeosumarydetail', "acoount=$userid&browseType=$browseType&param=$moduleID&orderBy=$orderBy");
                    echo "<li>" . html::a($link, $lang->hdc->exportsumary, '', "") . "</li>";
                    ?>
                </ul>
        </div>
    </div>
    <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>

</div>
<!-- endallaction -->
<div class="main" style="margin-bottom: 50px;">
    <form id='batchForm' method='post'>
        <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false" data-fixed-left-width="500" data-fixed-right-width="100" data-custom-menu="true" data-checkbox-name="hdcIDList[]">
            <thead>
                <tr>
                    <?php $vars = "param=$hr_id&browseType=$browseType&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}"; ?>
                    <th data-flex="false" data-width="220">
                    <?php echo $lang->hdc->hdcproject; ?>
                    </th>
                    <th data-flex="false" data-width="80">
                    <?php echo $lang->hdc->summary->hdctechmanager; ?>
                    </th>
                    <th data-flex="false" data-width="80">
                    <?php echo $lang->hdc->summary->hdctestmanager; ?>
                    </th>
                    <th data-flex="true" data-width="100">
                    <?php echo $lang->hdc->assigntocenter; ?>
                   </th>
                    <th data-flex="true" data-width="80">
                    <?php echo $lang->hdc->summary->hdcprosums; ?></th>
                    <th data-flex="true" data-width="80">
                    <?php echo $lang->hdc->summary->hdcpeosums; ?></th>
                    <th data-flex="true" data-width="80">
                    <?php echo $lang->hdc->summary->uncheckpro; ?></th>
                    <th data-flex="true" data-width="80">
                    <?php echo $lang->hdc->summary->uncheckpeo; ?></th>
                    <th data-flex="true" data-width="100">
                    <?php echo $lang->hdc->summary->waitpro; ?></th>
                    <th data-flex="true" data-width="100">
                    <?php echo $lang->hdc->summary->waitpeo; ?></th>
                    <th data-flex="true" data-width="80">
                    <?php echo $lang->hdc->summary->doingpro; ?></th>
                    <th data-flex="true" data-width="80">
                    <?php echo $lang->hdc->summary->doingpeo; ?></th>
                    <th data-flex="true" data-width="80">
                    <?php echo $lang->hdc->summary->doingtestpro; ?></th>
                    <th data-flex="true" data-width="80">
                    <?php echo $lang->hdc->summary->doingtestpeo; ?></th>
                    <th data-flex="true" data-width="80">
                    <?php echo $lang->hdc->summary->donepro; ?></th>
                    <th data-flex="true" data-width="80">
                    <?php echo $lang->hdc->summary->donepeo; ?></th>
                    <th data-flex="true" data-width="100">
                    <?php echo $lang->hdc->summary->unsolvproblem; ?></th>
                    <th data-flex="true" data-width="100">
                    <?php echo $lang->hdc->summary->solproblem; ?></th>
                    <th data-flex="true" data-width="120">
                    <?php echo $lang->hdc->summary->delaydevpercent; ?>(%)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($summarydata as $key => $hdc): ?>
                    <tr class='text-center' data-id='<?php echo $hdc->id ?>'>
                        <td title="<?php echo $hdc->name;?>"><?php echo $hdc->name;?></td>
                        <td><?php echo $hdc->techname;?></td>
                        <td><?php echo $hdc->testname;?></td>
                        <td><?php echo $hdc->center_name; ?></td>
                        <td><?php echo $hdc->hdcprosums; ?></td>
                        <td><?php echo $hdc->hdcpeosums; ?></td>
                        <td><?php echo $hdc->uncheckpro; ?></td>
                        <td><?php echo $hdc->uncheckpeo; ?></td>
                        <td><?php echo $hdc->waitpro; ?></td>
                        <td><?php echo $hdc->waitpeo; ?></td>
                        <td><?php echo $hdc->doingpro; ?></td>
                        <td><?php echo $hdc->doingpeo; ?></td>
                        <td><?php echo $hdc->doingtestpro; ?></td>
                        <td><?php echo $hdc->doingtestpeo; ?></td>
                        <td><?php echo $hdc->donepro; ?></td>
                        <td><?php echo $hdc->donepeo; ?></td>
                        <td><?php echo $hdc->unsolved; ?></td>
                        <td><?php echo $hdc->solproblem; ?></td>
                        <td><?php echo !empty($hdc->hdcprosums) ? (round($hdc->delaydevpercent/$hdc->hdcprosums,2) * 100) : 0; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <?php if ($browseType == 'bysearch' || $browseType == 'hdcsummary'): ?>
            <?php $pager->show();?>
        <?php endif;?>
    </form>
</div>
<script language='javascript'>
    $('#<?php echo $browseType; ?>Tab').addClass('active');
    
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
<?php include '../../common/view/footer.html.php'; ?>
