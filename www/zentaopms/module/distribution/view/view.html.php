<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<div class='container mw-1400px'>
    <div id='titlebar'>
        <div class='heading'>
            <strong><small class='text-muted'><i class='icon icon-plus'></i></small> <?php echo '申请分发';?></strong>
        </div>
    </div>
    <form class='form-condensed' method='post' id='dataform' enctype='multipart/form-data'>
        <table class='table table-form'>
            <tr>
                <th><?php echo '发布';?></th>
                <td><?php echo html::input('address', $applyinfo->releasename, "class='form-control'");?></td><td></td>
                <th><?php echo '审批状态';?></th>
                <td><?php echo html::input('address', $applyinfo->status, "class='form-control'");?></td><td></td>
            </tr>
            <tr>
                <th><?php echo '申请部门';?></th>
                <td><?php echo html::input('address', $applyinfo->deptname, "class='form-control'");?></td><td></td>
                <th><?php echo '部门领导';?></th>
                <td><?php echo html::input('address', $applyinfo->address, "class='form-control'");?></td><td></td>
            </tr>
            <tr>
                <th><?php echo '客户名称';?></th>
                <td><?php echo html::input('custom',$applyinfo->custom, "class='form-control'");?></td><td></td>
                <th><?php echo '下载地址';?></th>
                <td><?php echo html::input('address', $applyinfo->address, "class='form-control'");?></td><td></td>
            </tr>
            <tr>
                <th><?php echo 'License数量';?></th>
                <td><?php echo html::input('licenseqty', $applyinfo->licenseqty, "class='form-control'");?></td><td></td>
                <th><?php echo 'License单价';?></th>
                <td><?php echo html::input('licenseprice', $applyinfo->licenseprice, "class='form-control'");?></td><td></td>
            </tr>
            <tr>
                <th><?php echo '其他说明';?></th>
                <td colspan='4'><?php echo html::textarea('note', $applyinfo->note, "rows='10' class='form-control'");?></td>
            </tr>
        </table>
    </form>
</div>
<?php include '../../common/view/footer.html.php';?>
