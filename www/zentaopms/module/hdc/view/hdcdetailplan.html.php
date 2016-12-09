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
    $('#<?php echo $browseType; ?>Tab').addClass('active');
});
</script>

<style>
    .color-tip {color: red;}
</style>
<!-- allcation -->
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li style="margin-right: 10px;"><?php echo $username;?></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="###"><?php echo $firstcenter;?><span class="caret" style="border-top-color: #036;"></span></a>
            <ul class="dropdown-menu">
                <?php foreach ($devcenter as $k => $val): ?>
                    <li><?php echo html::a($this->inlink('hdcplan', "hr_id=$k&browseType=hdcplan"), $val); ?></li>
                <?php endforeach ?>
            </ul>
        </li>
        <li id='hdcplanTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcplan', "hr_id=$hr_id&browseType=hdcplan"), $lang->hdc->hdcresouces); ?></li>
        <li id='bysearchTab' style="display: none;"><?php echo "<a id='bll' href='#'><i class='icon-search icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
        <li id='detailplanTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcdetailplan', "user_id=$user_id&hr_id=$hr_id"), $lang->hdc->hdcdetailplan); ?></li>
    </ul>
    <div class='actions'>
        <div class='btn-group'>
            <?php echo html::a(helper::createLink('hdc', 'creatallplan',"user_id=$user_id&hr_id=$hr_id"), "<i class='icon  icon-plus-sign'></i> " . $lang->hdc->creatallplan, '', "class='btn'") ?>
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
                    <th data-flex="false" data-width="160">
                    <?php echo $lang->hdc->date; ?>
                    </th>
                    <th data-flex="false" data-width="160">
                    <?php echo $lang->hdc->hdcproject; ?>
                    </th>
                    <th data-flex="false" data-width="160">
                    <?php echo $lang->hdc->plan->worktype; ?>
                    </th>
                    <th data-flex="false" data-width="160">
                    <?php echo $lang->hdc->plan->planpercent; ?>(%)
                   </th>
                    <th data-flex="false" data-width="200">
                    <?php echo $lang->hdc->plan->plantarget; ?></th>
                    <th data-flex="false" data-width="200">
                    <?php echo $lang->hdc->operation; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($planresult as $key => $hdc): ?>
                    <tr class='text-center' data-id='<?php echo $hdc->id ?>'>
                        <?php 
                            if (in_array(date('w',strtotime($hdc->plandate)),array('0','6'))) {
                                $backgroundcolor = "#cddeef";
                            }
                        ?>
                        <td style="background-color: <?php echo $backgroundcolor;?>"><?php echo $hdc->plandate;?></td>
                        <?php $backgroundcolor=''; ?>
                        <td><?php echo $hdc->name;?></td>
                        <td><?php echo $lang->hdc->plan->type[$hdc->worktype]; ?></td>
                        <td><?php echo $hdc->percent; ?></td>
                        <td><?php echo $hdc->target; ?></td>
                        <td>
                            <?php 
                                if ($hdc->plandate >= $nowdate) {
                                    echo html::a($this->createLink('hdc', 'hdceditplan', "hdcID=$hdc->id&user_id=$user_id&hr_id=$hr_id"),'<i class="icon icon-edit" style="font-size:14.16px;"></i>','',"class='btn-icon'" );        
                                }else{
                                    echo html::a($this->createLink('hdc', 'hdcdetailplan', "user_id=$user_id&hr_id=$hr_id"),'<i class="icon icon-lock" style="font-size:14.16px;"></i>','',"class='btn-icon'" );    
                                }
                            ?>
                            <?php
                                $deleteURL = $this->createLink('hdc', 'hdcdeleteplan', "hdcID=$hdc->id&type=one");
                                echo html::a("javascript:ajaxDelete(\"$deleteURL\",\"batchForm\",confirmDelete)", '<i class="icon-remove"></i>', '', "class='btn-icon' title='{$lang->hdc->delete}'");
                            ?>
                        </td>
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
