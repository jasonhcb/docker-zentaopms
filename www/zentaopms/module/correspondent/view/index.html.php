<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/table.html.php';?>
<?php include '../view/table.html.php'; ?>
<?php js::set('isnotvalid', $lang->correspondent->isnotvalid);?>
<?php js::set('browseType', $browseType);?>
<script type="text/javascript">
    $(function()
    {
        if(browseType == 'bysearch') ajaxGetSearchForm();
        $('#bll').click();
        $('#<?php echo $browseType; ?>Tab').addClass('active');
    });
    
</script>
<div>
    <li id='bysearchTab' style="display: none;"><?php echo "<a id='bll' href='#'><i class='icon-search icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
</div>
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id="customerlistTab" style="margin-left: 5px;">
            <?php echo html::a($this->inlink("index","browseType=customerlist"),$lang->correspondent->customerlist);?>
        </li>
        <li id="myflowTab" style="margin-left: 5px;">
            <?php echo html::a($this->inlink("myflow","browseType=myflow"),$lang->correspondent->myflow);?>
        </li>
    </ul>
    <div class='actions'>
        <div class='btn-group'>
            <?php echo html::a($this->createLink('correspondent', 'create',""), "<i class='icon-plus'></i> " . $lang->correspondent->create, '', "class='btn'") ?>
        </div>
    </div>
    <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div>
<div class="main" style="margin-bottom: 50px;">
    <form id='batchForm' method='post'>
    <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false"  data-fixed-left-width="600" data-fixed-right-width="100" >
        <thead>
            <tr>
                <th data-flex="false" data-width="20">ID</th>
                <th data-flex="false" data-width="150"><?php echo $lang->correspondent->companyname; ?></th>
                <th data-flex="false" data-width="160"><?php echo $lang->correspondent->project; ?></th>
                <th data-flex="false" data-width="80"><?php echo $lang->correspondent->promanager; ?></th>
                <th data-flex="true" data-width="180"><?php echo $lang->correspondent->csicode; ?></th>
                <th data-flex="true" data-width="160"><?php echo $lang->correspondent->projecttimebegan; ?></th> 
                <th data-flex="true" data-width="160"><?php echo $lang->correspondent->projecttimeend; ?></th>
                <th data-flex="true" data-width="160"><?php echo $lang->correspondent->contractid; ?></th>
                <th data-flex="true" data-width="160"><?php echo $lang->correspondent->tel; ?></th>
                <th data-flex="true" data-width="160"><?php echo $lang->correspondent->email; ?></th>
                <th data-flex="false" data-width="80"><?php echo $lang->correspondent->opration; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($basedata as $k => $list): ?>
            <tr class="text-center">
                <td><?php echo $k+1; ?></td>
                <td><?php echo $list->companyname; ?></td>
                <td><?php echo $list->projectname; ?></td>
                <td><?php $ar = explode(':',$list->promanager);echo $ar[1];?></td>
                <td><?php echo common::printIcon('correspondent', 'detail',   "id=$list->id", '', 'list', 'barcode', '', 'iframe', false);?></td>
                <td><?php echo $list->protimebegan; ?></td>
                <td><?php echo $list->protimeend; ?></td>
                <td><?php echo $list->contractid; ?></td>
                <td><?php echo $list->tel; ?></td>
                <td><?php echo $list->email; ?></td>
                <td>
                    <?php echo html::a($this->createLink('correspondent', 'edit', "optid=$list->id"),'<i class="icon-common-edit icon-pencil"></i>','',"class='btn-icon'");
                            ?>
                    <?php $deleteURL = $this->createLink('correspondent', 'delete', "optid=$list->id");
                        echo html::a("javascript:ajaxDelete(\"$deleteURL\",\"batchForm\",isnotvalid)", '<i class="icon-times"></i>', '', "class='btn-icon' title='{$lang->correspondent->delete}'");
                            ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </form>
    <?php $pager->show(); ?>
</div>

<script type="text/javascript">
    $('#<?php echo $browseType; ?>Tab').addClass('active');
</script>
<?php include '../../common/view/footer.html.php';?>
