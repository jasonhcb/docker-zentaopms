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
    $("#peosummaryTab").addClass('active');
    $('#<?php echo $browseType; ?>Tab').addClass('active');
});
</script>

<style>
    .color-tip {color: red;}
</style>
<!-- allcation -->
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="###"><?php echo $firstcenter;?><span class="caret" style="border-top-color: #036;"></span></a>
            <ul class="dropdown-menu">
                <?php foreach ($devcenter as $k => $val): ?>
                    <li><?php echo html::a($this->inlink('peosummary', "hr_id=$k&browseType=peosummary"), $val); ?></li>
                <?php endforeach ?>
            </ul>
        </li>
        <li id='hdcsummaryTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcsummary', "browseType=hdcsummary"), $lang->hdc->hdcsummary); ?></li>
        <li id='bysearchTab' style="display: none;"><?php echo "<a id='bll' href='#'><i class='icon-search icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
        <li id='peosummaryTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('peosummary', "hr_id=$hr_id&browseType=peosummary"), $lang->hdc->peosummary); ?></li>
    </ul>
    <div class='actions' style="margin-right: 30px;">
        <div class='btn-group'>
                <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' id='exportAction'>
                    <i class='icon-download-alt'></i> <?php echo $lang->export ?>
                    <span class='caret'></span>
                </button>
                <ul class='dropdown-menu' id='exportActionMenu'>
                    <?php
                    $link = $this->createLink('hdc', 'exportpeosumary', "hr_id=$hr_id&browseType=$browseType&param=$moduleID&orderBy=$orderBy");
                    echo "<li>" . html::a($link, $lang->hdc->exportsumary, '', "") . "</li>";
                    ?>
                </ul>
        </div>
    </div>
    <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>

</div>
<!-- <div id='featurebar' style="margin-top: 10px;border: 1px solid #ddd;margin-left: 2px;margin-right: 2px;background: #ffffff">
    <ul class='nav'>
        <li style="font-weight: bold;margin-right:10px;" ><?php echo $lang->hdc->summary->prostatus;?>:</li>
        <?php foreach ($lang->hdc->summary->status as $key => $value): ?>
            <li id="<?php echo $key?>Tab" style="margin-right:10px;"><?php echo html::a($this->inlink('hdcsummary', "browseType=$key"),$value); ?></li>
        <?php endforeach ?>
        
    </ul>
    <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div> -->
<!-- endallaction -->
<div class="main" style="margin-bottom: 50px;">
    <form id='batchForm' method='post'>
        <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false" data-fixed-left-width="400" data-fixed-right-width="100" data-custom-menu="true" data-checkbox-name="hdcIDList[]">
            <thead>
                <tr>
                    <?php $vars = "param=$hr_id&browseType=$browseType&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}"; ?>
                    <th data-flex="false" data-width="80">
                    <?php echo $lang->hdc->centername; ?>
                    </th>
                    <th data-flex="false" data-width="100">
                    <?php echo $lang->hdc->department; ?>
                    </th>
                    <th data-flex="false" data-width="60">
                    <?php echo $lang->hdc->usernumber; ?>
                    </th>
                    <th data-flex="true" data-width="100">
                    <?php echo $lang->hdc->realname; ?>
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
                    <th data-flex="false" data-width="40">
                    <?php echo $lang->hdc->operation; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($summarydata as $key => $hdc): ?>
                    <tr class='text-center' data-id='<?php echo $hdc->id ?>'>
                        <td title="<?php echo $hdc->name;?>"><?php echo $hdc->centername;?></td>
                        <td><?php echo $hdc->name;?></td>
                        <td><?php echo $hdc->account;?></td>
                        <td><?php echo $hdc->username; ?></td>
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
                        <td><?php echo html::a($this->createLink('hdc','peosummarydetail', "hdcID=$hdc->account&browseType=peosummarydetail"), $lang->hdc->sumsdetail); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
            <?php $pager->show();?>
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
