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
                <td><?php echo html::select('release',$releases,$release, "class='form-control'");?></td><td></td>
            </tr>
            <tr>
                <th><?php echo '申请部门';?></th>
                <td><?php echo html::select('department',$depts,$this->app->user->dept, "class='form-control'");?></td><td></td>
                <th><?php echo '部门领导';?></th>
                <td><?php echo html::select('leader',$poUsers,'', "class='select-2 chosen'");?></td><td></td>
            </tr>
            <tr>
                <th><?php echo '客户名称';?></th>
                <td><?php echo html::input('custom','', "class='form-control'");?></td><td></td>
                <th><?php echo 'License单价';?></th>
                <td><input type="number" name="licenseprice" id="licenseprice" value="" class="form-control" placeholder="请填入数字"></td><td></td>

                </tr>
            <tr>
                <th><?php echo '下载地址';?></th>
                <td><?php echo html::input('address', '', "class='form-control'");?></td><td></td>
                <th><?php echo 'License数量';?></th>
                <td><input type="number" name="licenseqty" id="licenseqty" value="" class="form-control" placeholder="请填入数字"></td><td></td>

            </tr>
            <tr>
                <td><?php echo html::hidden('status','审批中');?></td><td></td>
                <td><?php echo html::hidden('applicant',$this->app->user->account);?></td><td></td>
                <td><?php echo html::hidden('product',$product, "class='form-control'");?></td><td></td>
                <td><?php echo html::hidden('productID',$productID, "class='form-control'");?></td><td></td>
            </tr>
            <tr>
                <th><?php echo '其他说明';?></th>
                <td colspan='4'><?php echo html::textarea('note', '', "rows='10' class='form-control'");?></td>
            </tr>
            <tr><td></td><td colspan='2'><?php echo html::submitButton() . html::backButton();?></td></tr>
        </table>
    </form>
</div>
<?php include '../../common/view/footer.html.php';?>
