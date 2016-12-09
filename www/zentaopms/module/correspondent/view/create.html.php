<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/tablesorter.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php js::set('browseType', $browseType);?>
<script type="text/javascript">
$(function()
{
    $("#addfield").click(function(){
        var urls = "<?php echo $this->createLink('correspondent','create').'&addfield=1'; ?>";
        $.ajax({
          url: urls,
          type: "GET",
          dataType: "json",
          success: function (jdata, stat) {
           $("#next").before(jdata);
           $("#next").prev().find("td > #buyproject").trigger("chosen:updated");
           $("#next").prev().find("td > #buyproject").chosen();
        }
        });
    })
});
</script>
<style type="text/css">
    .require_td{
        color: #d2322d !important; 
        font-family: arial !important;
        font-size: 20px !important;
        content: "*" !important;
    }
</style>
<div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
<div>
    <li id='bysearchTab' style="display: none;"><?php echo "<a id='bll' href='#'><i class='icon-search icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
</div>
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id="customerlistTab" style="margin-left: 5px;" class="active">
            <?php echo html::a($this->inlink("create",""),$lang->correspondent->create);?>
        </li>
    </ul>
</div>
<form class="form-condensed" method='post' target='hiddenwin' id='dataform'>
    <table class='table table-form' style="border: none;"> 
        <tr>
            <th class='w-120px'><?php echo $lang->correspondent->companyname;?></th>
            <td class='w-500px'><?php echo html::input('cpyname', '', "class='form-control' placeholder='请输入公司名称'");?></td>
            <td class="require_td"> *</td>
        </tr>
        <tr>
            <th class='w-120px'><?php echo $lang->correspondent->projecttime;?></th>
            <td class='w-500px'>
                <div class='input-group' id='dataPlanGroup'>
                    <?php echo html::input('begantime', '', "class='form-control form-date' placeholder='预计开始'");?>
                    <span class='input-group-addon fix-border'>~</span>
                    <?php echo html::input('endtime', '', "class='form-control form-date' placeholder='截止日期'");?> 
                </div>
            </td>
            <td class="require_td"></td>
            <th class='w-120px'><?php echo $lang->correspondent->project;?></th>
            <td class='w-500px'><?php echo html::select('project', $projects,$projects[''], "class='form-control chosen'");?></td>
            <td class="require_td"> *</td>
        </tr> 
        <tr>
            <th class='w-120px'><?php echo $lang->correspondent->contractid;?></th>
            <td class='w-500px'><?php echo html::input('contractid', '', "class='form-control' placeholder='合同编号'");?></td>
            <td class="require_td"> *</td>
            <th class='w-120px'><?php echo $lang->correspondent->promanager;?></th>
            <td class='w-500px'><?php echo html::select('promanager',$users,$users[''], "class='form-control chosen' placeholder='项目负责人'");?></td>
            <td class="require_td"></td>
        </tr>
        <tr>
            <th class='w-120px'><?php echo $lang->correspondent->tel;?></th>
            <td class='w-500px'><?php echo html::input('tel', '', "class='form-control' placeholder='联系电话'");?></td>
            <td class="require_td"></td>
            <th class='w-120px'><?php echo $lang->correspondent->email;?></th>
            <td class='w-500px'><?php echo html::input('email','', "class='form-control' placeholder='邮箱地址'");?></td>
            <td class="require_td"></td>
        </tr>
        <tr>
            <th class='w-120px'><?php echo $lang->correspondent->buyproject;?></th>
            <td width="40%;"><?php echo html::select('buyproject[]',$productlist,'', "class='form-control chosen'");?></td>
            <div class='input-group' id='icongropu'>
            <td style="float: left;">
                <a id="addfield" class="btn btn-block"><i class="icon-plus"></i></a>
            </td>
            </div>
        </tr>
        <tr id="next">
        </tr>
        <tr>
        <td></td>
        <td colspan='2'><?php echo html::submitButton() . html::backButton();;?></td>
        </tr>
    </table>
</form>
<?php include '../../common/view/footer.html.php';?>
