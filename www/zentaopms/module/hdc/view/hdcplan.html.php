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
    .all{
            width: 300;height: 33px;
        }
    .all .block{
            width: 14.286%;
            height: 100%;
            float: left;
            /*background-color: #f9f9f9;*/
            position: relative;
            border: 1px solid #ddd;
            border-bottom: none;border-top: none;

        }
    .all .block .bottom{
            width: 100%;
            height: 100%;
            background-color: #4a9eda;
            position: absolute;
            bottom: 0;
        }
</style>

<!-- allcation -->
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="###"><?php echo $firstcenter;?><span class="caret" style="border-top-color: #036;"></span></a>
            <ul class="dropdown-menu">
                <?php foreach ($devcenter as $k => $val): ?>
                    <li><?php echo html::a($this->inlink('hdcplan', "hr_id=$k&browseType=hdcplan"), $val); ?></li>
                <?php endforeach ?>
            </ul>
        </li>
        <li id='hdcplanTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcplan', "hr_id=$hr_id"), $lang->hdc->hdcresouces); ?></li>
        <li id='bysearchTab' style="display: none;"><?php echo "<a id='bll' href='#'><i class='icon-search icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
        <!-- <li id='detailresTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcdevcount', "browseType=detailres"), $lang->hdc->hdcdetailres); ?></li> -->
    </ul>
    <div class='actions'>
        <div class='btn-group'>
            <!-- <?php echo html::a(helper::createLink('hdc', 'initplan',"hdcID=$hdcid"), "<i class='icon  icon-refresh'></i> " . $lang->hdc->plan->init, '', "class='btn'") ?> -->
        </div>
    </div>
    <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div>
<!-- endallaction -->
<div class="main" style="margin-bottom: 50px;">
    <form id='batchForm' method='post'>
        <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false" data-fixed-left-width="400" data-fixed-right-width="100" data-custom-menu="true" data-checkbox-name="hdcIDList[]">
            <thead>
                <tr>
                    <?php $vars = "param=$hr_id&browseType=$browseType&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}"; ?>
                    <th data-flex="false" data-width="100">
                    <?php common::printOrderLink('name', $orderBy, $vars, $lang->hdc->department); ?>
                    </th>
                    <!-- <th data-flex="false" data-width="120">
                    <?php common::printOrderLink('realname', $orderBy, $vars, $lang->hdc->directmanager); ?>
                    </th> -->
                    <th data-flex="false" data-width="100">
                    <?php common::printOrderLink('account', $orderBy, $vars, $lang->hdc->usernumber); ?>
                    </th>
                    <th data-flex="false" data-width="90">
                    <!-- <?php common::printOrderLink('username', $orderBy, $vars, $lang->hdc->realname); ?> -->
                    <?php echo $lang->hdc->realname; ?>
                   </th>
                    <th data-flex="true" data-width="300" style="padding: 0px !important;">
                    <?php echo $lang->hdc->plan->firstplan; ?></th>
                    <th data-flex="true" data-width="100">
                    <?php echo $lang->hdc->plan->firstplanemp; ?></th>
                    <th data-flex="true" data-width="300" style="padding: 0px !important;">
                    <?php echo $lang->hdc->plan->secondplan; ?></th>
                    <th data-flex="true" data-width="100">
                    <?php echo $lang->hdc->plan->secondplanemp; ?></th>
                    <th data-flex="true" data-width="120">
                    <?php echo $lang->hdc->plan->thirdplan; ?></th>
                    <th data-flex="true" data-width="120">
                    <?php echo $lang->hdc->plan->fourplan; ?></th>
                    <th data-flex="true" data-width="120">
                    <?php echo $lang->hdc->plan->fivetoeightplan; ?></th>
                    <th data-flex="false" data-width="100" class="w-actions"><?php echo $lang->actions; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($planresult as $key => $hdc): ?>
                    <tr class='text-center' data-id='<?php echo $hdc->id ?>'>
                        <td><?php echo $hdc->name;?></td>
                        <!-- <td><?php echo $hdc->realname;?></td> -->
                        <td><?php echo $hdc->account; ?></td>
                        <td><?php echo $hdc->username; ?></td>
                        <td style="padding:0px;vertical-align: bottom;">
                            <div class='all'>
                                <?php $j= 0; ?>
                                <?php for ($i=$now_start; $i < $first; $i = date('Y-m-d',strtotime("$i + 1 days"))):?>
                                    <?php 
                                        $noware =  $hdc->fisrstdate[$j]->plandate;
                                        // echo $i;
                                        // echo date('w',strtotime($i));
                                        if (in_array(date('w',strtotime($i)),array(0,6))) {
                                           $backgroundcolor = "#675a5a";
                                        }else{
                                           $backgroundcolor = "#4a9eda";
                                        }
                                        if ($noware == $i) { 
                                    ?>
                                    <div class='block' title="<?php echo $i.'/'.$hdc->fisrstdate[$j]->percent.'%';?>">
                                    <div class="bottom" style="height:<?php echo $hdc->fisrstdate[$j]->percent;?>%;background-color: <?php echo $backgroundcolor;?>"></div></div>
                                    <?php 
                                        $j++;
                                    }else{ ?>
                                        <div class='block' title="<?php echo $i; ?>"><div class="bottom" style="height:0%;"></div></div>
                                     <?php   } ?>
                                <?php endfor;?>
                            </div>
                        </td>
                        <td style="padding-bottom: 0px;padding-top: 0px;vertical-align: bottom;">
                            <?php echo ($hdc->firstemptydate == '')? 5 : 5-$hdc->firstemptydate; ?>
                        </td>
                        <td style="padding: 0px;vertical-align: bottom;">
                            <div class='all'>
                                <?php $j= 0; ?>
                                <?php for ($i=$second_begin; $i < $second_end; $i = date('Y-m-d',strtotime("$i + 1 days"))):?>
                                    <?php 
                                        $noware =  $hdc->seconddate[$j]->plandate;
                                        if ($noware == $i) { 
                                    ?>
                                    <div class='block' title="<?php echo $i.'/'.$hdc->seconddate[$j]->percent.'%';?>"><div class="bottom" style="height:<?php echo $hdc->seconddate[$j]->percent;?>%;"></div></div>
                                    <?php 
                                        $j++;
                                    }else{ ?>
                                        <div class='block' title="<?php echo $i; ?>"><div class="bottom" style="height:0%;"></div></div>
                                     <?php   } ?>
                                <?php endfor;?>
                            </div>
                        </td>
                        <td style="padding-bottom: 0px;padding-top: 0px;vertical-align: bottom;">
                            <?php echo ($hdc->secondemptydate == '')? 5 : 5-$hdc->secondemptydate; ?>
                        </td>
                        <td style="padding-bottom: 0px;padding-top: 0px;vertical-align: bottom;">
                            <?php echo ($hdc->thirdemptydate == '')? 5 : 5-$hdc->thirdemptydate; ?>
                        </td>
                        <td style="padding-bottom: 0px;padding-top: 0px;vertical-align: bottom;">
                            <?php echo ($hdc->fouremptydate == '')? 5 : 5-$hdc->fouremptydate; ?>                       
                        </td>
                        <td style="padding-bottom: 0px;padding-top: 0px;vertical-align: bottom;" >
                        <?php echo ($hdc->fiveemptydate == '')? 20 : 20-$hdc->fiveemptydate; ?> 
                        </td>
                        <td>
                            <?php 
                                echo html::a($this->createLink('hdc', 'hdcdetailplan', "user_id=$hdc->id&hr_id=$hr_id"),'<i class="icon icon-th-list" style="font-size:14.16px;"></i>','',"class='btn-icon'");
                            ?>
                            <?php
                                $deleteURL = $this->createLink('hdc', 'hdcdeleteplan', "user_id=$hdc->id&type=all");
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
