<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/table.html.php';?>
<?php include '../view/table.html.php'; ?>
<?php js::set('iscancle', $lang->correspondent->iscancle);?>
<?php js::set('browseType', $browseType);?>
<script type="text/javascript">
    $(function()
    {
        if(browseType == 'bysearch') ajaxGetSearchForm();
        $('#bll').click();
        $('#<?php echo $type; ?>Tab').addClass('active');
    });
</script>
<div>
    <li id='bysearchTab' style="display: none;"><?php echo "<a id='bll' href='#'><i class='icon-search icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
</div>
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id="uncheckTab" style="margin-left: 5px;">
            <?php echo html::a($this->inlink("check","browseType=check&type=uncheck"),$lang->correspondent->uncheck);?>
        </li>
        <li id="hscheckTab" style="margin-left: 5px;">
            <?php echo html::a($this->inlink("check","browseType=check&type=hscheck"),$lang->correspondent->hscheck);?>
        </li>
    </ul>
    <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div>
<div class="main" style="margin-bottom: 50px;">
    <form id='batchForm' method='post'>
    <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false"  data-fixed-left-width="400" data-fixed-right-width="100" data-custom-menu="true">
        <thead>
            <tr>
                <th data-flex="false" data-width="20">ID</th>
                <th data-flex="false" data-width="150"><?php echo $lang->correspondent->applytor; ?></th>
                <th data-flex="false" data-width="150"><?php echo $lang->correspondent->applytordept; ?></th>
                <th data-flex="true" data-width="200"><?php echo $lang->correspondent->checkcommon; ?></th>
                <th data-flex="true" data-width="260"><?php echo $lang->correspondent->project; ?></th>
                <th data-flex="true" data-width="140"><?php echo $lang->correspondent->contractid; ?></th> 
                <th data-flex="true" data-width="120"><?php echo $lang->correspondent->promanager; ?></th> 
                <th data-flex="true" data-width="140"><?php echo $lang->correspondent->projecttimebegan; ?></th>
                <th data-flex="true" data-width="140"><?php echo $lang->correspondent->projecttimeend; ?></th>
                <th data-flex="true" data-width="500"><?php echo $lang->correspondent->buyproject; ?></th>
                <th data-flex="false" data-width="50"><?php echo $lang->correspondent->opration; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($basedata as $k => $list): ?>
            <tr class="text-center">
                <td><?php echo $k+1; ?></td>
                <td><?php echo $list->create_by; ?></td>
                <td><?php echo $list->deptname; ?></td>
                <td><?php echo $list->companyname;?></td>
                <td><?php echo $list->projectname; ?></td>
                <td><?php echo $list->contractid; ?></td>
                <td><?php echo $list->promanager; ?></td>
                <td><?php echo $list->protimebegan; ?></td>
                <td><?php echo $list->protimeend; ?></td>
                <td><?php echo $list->buyproject; ?></td>
                <td>
                    <?php if ($type == 'uncheck'): ?>
                    <?php echo html::a($this->createLink('correspondent', 'passorrefuse', "optid=$list->id&type=pass"),'<i class="icon-common-edit icon-check"></i>','',"class='btn-icon'");
                    ?> 
                    <?php echo html::a($this->createLink('correspondent', 'passorrefuse', "optid=$list->id&type=refuse"),'<i class="icon-common-edit icon-times"></i>','',"class='btn-icon'");
                    ?>                         
                    <?php endif ?>

                    <?php if ($type == 'hscheck'): ?>
                        <?php echo $list->opinion; ?>
                    <?php endif ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php $pager->show(); ?>
    </form>
</div>

<script type="text/javascript">
    $('#<?php echo $browseType; ?>Tab').addClass('active');
</script>
<?php include '../../common/view/footer.html.php';?>
