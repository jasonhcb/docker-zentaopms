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
        <li id="detailTab" style="margin-left: 5px;" class="active">
            <?php echo html::a($this->inlink("detail","id=$id"),"CSI".$lang->correspondent->detail);?>
        </li>
    </ul>
</div>
<div class="main" style="margin-bottom: 50px;">
    <form id='batchForm' method='post'>
    <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false"  data-fixed-left-width="500" data-fixed-right-width="100" data-custom-menu="true">
        <thead>
            <tr>
                <th data-flex="false" data-width="20">ID</th>
                <th data-flex="false" data-width="150"><?php echo $lang->correspondent->buyproject; ?></th>
                <th data-flex="false" data-width="150"><?php echo $lang->correspondent->csicode; ?></th>
                <th data-flex="false" data-width="150"><?php echo $lang->correspondent->enddatetime; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($csidata as $k => $list): ?>
            <tr class="text-center">
                <td><?php echo $k+1; ?></td>
                <td><?php echo $productlist[$list->release_id]; ?></td>
                <td><?php echo $list->csi_code; ?></td>
                <td><?php 
                    if (strtotime(date('Y-m-d',time())) < $list->expire_date) {
                        echo (strtotime(date('Y-m-d',time())) - strtotime($list->expire_date))/86400;
                    }else{
                        echo "已经过期";
                    }
                 ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </form>
</div>

<script type="text/javascript">
    $('#<?php echo $browseType; ?>Tab').addClass('active');
</script>
<?php include '../../common/view/footer.html.php';?>
