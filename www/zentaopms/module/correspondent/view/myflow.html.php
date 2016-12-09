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
</div>
<div class="main" style="margin-bottom: 50px;">
    <form id='batchForm' method='post'>
    <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false"  data-fixed-left-width="500" data-fixed-right-width="100" data-custom-menu="true">
        <thead>
            <tr>
                <th data-flex="false" data-width="20">ID</th>
                <th data-flex="false" data-width="150"><?php echo $lang->correspondent->companyname; ?></th>
                <th data-flex="false" data-width="150"><?php echo $lang->correspondent->project; ?></th>
                <th data-flex="true" data-width="120"><?php echo $lang->correspondent->status; ?></th>
                <th data-flex="true" data-width="120"><?php echo $lang->correspondent->applytor; ?></th>
                <th data-flex="true" data-width="140"><?php echo $lang->correspondent->applytime; ?></th> 
                <th data-flex="true" data-width="120"><?php echo $lang->correspondent->checktor; ?></th> 
                <th data-flex="true" data-width="140"><?php echo $lang->correspondent->checktime; ?></th>
                <th data-flex="false" data-width="30"><?php echo $lang->correspondent->opration; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($myflow as $k => $list): ?>
            <tr class="text-center">
                <td><?php echo $k+1; ?></td>
                <td><?php echo $list->companyname; ?></td>
                <td><?php echo $list->projectname; ?></td>
                <td><?php echo $list->opinion;?></td>
                <td><?php echo $list->create_by; ?></td>
                <td><?php echo $list->create_time; ?></td>
                <td><?php echo $list->editor; ?></td>
                <td><?php echo $list->edit_time; ?></td>
                <td>
                    <?php if ($list->opinion == '待审核'): ?>
                    <?php $deleteURL = $this->createLink('correspondent', 'cancle', "optid=$list->id");
                        echo html::a("javascript:ajaxDelete(\"$deleteURL\",\"batchForm\",iscancle)", '<i class="icon-off"></i>', '', "class='btn-icon' title='{$lang->correspondent->cancle}'");
                            ?>               
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
