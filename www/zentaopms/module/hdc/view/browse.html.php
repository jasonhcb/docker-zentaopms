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
});
</script>
<style>
    .color-tip {color: red;}
</style>
<!-- allcation -->
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id='unactivatedTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('browse', "browseType=unactivated"), $lang->hdc->browse); ?></li>
        <li id='devcountTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcdevcount', "browseType=devcount"), $lang->hdc->hdcdevcount); ?></li>
        <li id='hdcquestionTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcquestion', "browseType=hdcquestion"), $lang->hdc->hdcquestion); ?></li>
    </ul>
    <div class='actions'>
        <div class='btn-group'>
            <?php if (common::hasPriv('hdc', 'exportReport')) : ?>
                <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' id='exportAction'>
                    <i class='icon-download-alt'></i> <?php echo $lang->export ?>
                    <span class='caret'></span>
                </button>
                <ul class='dropdown-menu' id='exportActionMenu'>
                    <?php
                    $link = $this->createLink('hdc', 'exportReport', "project=$projectID&branch=$branch&browseType=$browseType&param=$moduleID&orderBy=$orderBy");
                    echo "<li>" . html::a($link, $lang->hdc->exportReport, '', "class='export'") . "</li>";
                    ?>
                    <?php
                    $link = $this->createLink('hdc', 'exportdateReport', "project=$projectID&branch=$branch&browseType=$browseType&param=$moduleID&orderBy=$orderBy");
                    echo "<li>" . html::a($link, $lang->hdc->exportdateReport, '', "class='export'") . "</li>";
                    ?>
                    <?php
                    $link = $this->createLink('hdc', 'ResultsExport', "project=$projectID&branch=$branch&browseType=$browseType&param=$moduleID&orderBy=$orderBy");
                    echo "<li>" . html::a($link, $lang->hdc->ResultsExport, '_blank', "class=''") . "</li>";
                    ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class='btn-group'>
            <?php
            common::printIcon('hdc', 'import', "projectID=$projectID&branch=$branch", '', 'button', '', '', 'export cboxElement iframe');
            ?>
        </div>
    </div>
</div>
<!-- endallaction -->
<div class="main">
    <form id='batchForm' method='post'>
        <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false" data-fixed-left-width="400" data-fixed-right-width="100" data-custom-menu="true" data-checkbox-name="hdcIDList[]">
            <thead>
                <tr>
                    <?php $vars = "projectID=$projectID&branch=$branch&browseType=$browseType&param=$moduleID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}"; ?>
                    <th data-flex="false" data-width="160"><?php echo $lang->hdc->project; ?></th>
                    <th data-flex="false" data-width="140"><?php echo $lang->hdc->projectframe; ?></th>
                    <th data-flex="false" data-width="100"><?php echo $lang->hdc->projectmanager; ?></th>
                    <th data-flex="true" data-width="120"><?php echo $lang->hdc->uatdate; ?></th>
                    <th data-flex="true" data-width="120"><?php echo  $lang->hdc->onlinedate; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assigntocenter; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->devtechmanager; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assigntotestcenter; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->devtestmanager; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->cto; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->spotcto; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->fpd; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assigntodevelop; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assigndate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->applystatus; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->assignstatus; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->applydescription; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->applydate; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->applyuser; ?></th>
                    <th data-flex="true" data-width="140"><?php echo $lang->hdc->listcomfim; ?></th>
                    <!-- <th data-flex="true" data-width="140"><?php echo $lang->hdc->assignnote; ?></th> -->
                    <th data-flex="false" data-width="100" class="w-actions"><?php echo $lang->hdc->operation; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allcation as $key => $hdc): ?>
                    <tr class='text-center' data-id='<?php echo $hdc->id ?>'>
                        <td><?php echo $hdc->name; ?></td>
                        <td><?php echo $hdc->frame_name;?></td>
                        <td><?php echo $hdc->manager_name; ?></td>
                        <td><?php echo html::input('uat_datecopy',$hdc->uat_datecopy, "class='form-control form-date'");?></td>
                        <td><?php echo html::input('online_datecopy',$hdc->online_datecopy, "class='form-control form-date'");?></td>
                        <td><?php echo $hdc->center_name; ?></td>
                        <td><?php echo $hdc->techname; ?></td>
                        <td><?php echo $hdc->test_name; ?></td>
                        <td><?php echo $hdc->testname; ?></td>
                        <td><?php echo $hdc->cto_name; ?></td>
                        <td><?php echo $hdc->spotcto_name; ?></td>
                        <td><?php echo $hdc->fpd; ?></td>
                        <td><?php echo $hdc->assigntodevelop; ?></td>
                        <td><?php echo $hdc->assigndate; ?></td>
                        <td><?php echo $lang->hdc->statustype[$hdc->applystatus]; ?></td>
                        <td><?php echo $lang->hdc->assigntype[$hdc->assignstatus]; ?></td>
                        <td><?php echo $hdc->description; ?></td>
                        <td><?php echo $hdc->applydate; ?></td>
                        <td><?php echo $hdc->username; ?></td>
                        <td><?php echo $hdc->comfimname; ?></td>
                        <!-- <td><?php echo $hdc->assignnote; ?></td> -->
                        <td><button type="submit" id="submit" data-loading="稍候..." style="border-left-width: 0px;border-right-width: 0px;border-top-width: 0px;border-bottom-width: 0px;background: #f9f9f9;"><i class="icon icon-check-circle" style="color:#003366;"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>
<div id='featurebar' style="margin-top: 20px;border: 1px solid #ddd;margin-left: 2px;margin-right: 2px;background: #ffffff">
    <ul class='nav'>
        <li id='bysearchTab' style="margin-right:10px;"><?php echo "<a href='#'><i class='icon icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
        <li style="font-weight: bold;margin-right:10px;" >筛选条件:</li>
        <li id='unactivatedTab' style="margin-right:10px;"><?php echo html::a($this->inlink('browse', "projectID=$projectID&branch=$branch&browseType=unactivated"), $lang->hdc->unactivated); ?></li>
        <li id='deleayedTab' style="margin-right:10px;"><?php echo html::a($this->inlink('browse', "projectID=$projectID&branch=$branch&browseType=deleayed"),     $lang->hdc->deleay); ?></li>
        <li id='allstatusTab'><?php echo html::a($this->inlink('browse', "projectID=$projectID&branch=$branch&browseType=allStatus"), $lang->hdc->allStatus); ?></li>
    </ul>
    <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div>
<div class="main">
    <form id='batchForm' method='post'>
        <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable1" id="hdcList" data-checkable="true" data-fixed-left-width="400" data-fixed-right-width="100" data-custom-menu="true" data-checkbox-name="hdcIDList[]">
            <thead>
                <tr>
                    <?php $vars = "projectID=$projectID&branch=$branch&browseType=$browseType&param=$moduleID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}"; ?>
                    <th data-flex="false" data-width="140"><?php common::printOrderLink('code', $orderBy, $vars, $lang->hdc->code); ?></th>
                    <th data-flex="false" data-width="auto"><?php common::printOrderLink('name', $orderBy, $vars, $lang->hdc->name); ?></th>
                    <th data-flex="true" data-width="150"><?php common::printOrderLink('step', $orderBy, $vars, $lang->hdc->step); ?></th>
                    <th data-flex="true" data-width="100"><?php common::printOrderLink('deadline', $orderBy, $vars, $lang->hdc->deadline); ?></th>
                    <th data-flex="true" data-width="150"><?php common::printOrderLink('type', $orderBy, $vars, $lang->hdc->type); ?></th>
                    <th data-flex="true" data-width="80"><?php common::printOrderLink('rating', $orderBy, $vars, $lang->hdc->rating); ?></th>
                    <th data-flex="true" data-width="80"><?php common::printOrderLink('totalManday', $orderBy, $vars, $lang->hdc->totalManday); ?></th>
                    <th data-flex="true" data-width="80"><?php common::printOrderLink('onsiteManday', $orderBy, $vars, $lang->hdc->onsiteManday); ?></th>
                    <th data-flex="true" data-width="80"><?php common::printOrderLink('remoteManday', $orderBy, $vars, $lang->hdc->remoteManday); ?></th>
                    <th data-flex="true" data-width="80"><?php common::printOrderLink('codecmtManday', $orderBy, $vars, $lang->hdc->codecmtManday); ?></th>
                    <th data-flex="true" data-width="100"><?php common::printOrderLink('funcDesign', $orderBy, $vars, $lang->hdc->funcDesign); ?></th>
                    <th data-flex="true" data-width="100"><?php common::printOrderLink('techDesign', $orderBy, $vars, $lang->hdc->techDesign); ?></th>
                    <th data-flex="true" data-width="100"><?php common::printOrderLink('codeDevelop', $orderBy, $vars, $lang->hdc->codeDevelop); ?></th>
                    <th data-flex="true" data-width="100"><?php common::printOrderLink('remoteTest', $orderBy, $vars, $lang->hdc->remoteTest); ?></th>
                    <th data-flex="true" data-width="100"><?php common::printOrderLink('siteAccept', $orderBy, $vars, $lang->hdc->siteAccept); ?></th>
                    <th data-flex="true" data-width="100"><?php common::printOrderLink('remoteHead', $orderBy, $vars, $lang->hdc->remoteHead); ?></th>
                    <th data-flex="true" data-width="100"><?php common::printOrderLink('siteHead', $orderBy, $vars, $lang->hdc->siteHead); ?></th>
                    <th data-flex="true" data-width="180"><?php common::printOrderLink('funcOwnership', $orderBy, $vars, $lang->hdc->funcOwnership); ?></th>
                    <th data-flex="true" data-width="180"><?php common::printOrderLink('devOwnership', $orderBy, $vars, $lang->hdc->devOwnership); ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->estReqSubmitDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->estCodeStartDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->estCodeEndDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->estTestEndDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->actReqSubmitDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->actReqComfimBeganDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->actReqComfimEndDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->actCodeStartDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->actCodeEndDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->actTestBeganDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->actTestEndDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->actOnsiteTestBeganDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->actOnsiteTestEndDate; ?></th>
                    <th data-flex="true" data-width="150"><?php echo $lang->hdc->recopercent; ?></th>
                    <th data-flex="true" data-width="60"><?php echo $lang->statusAB; ?></th>
                    <th data-flex="true" data-width="180"><?php echo $lang->hdc->desc; ?></th>
                    <th data-flex="false" data-width="100" class="w-actions"><?php echo $lang->actions; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hdcs as $key => $hdc): ?>
                    <tr class='text-center' data-id='<?php echo $hdc->id ?>'>
                        <td><?php echo $hdc->code;?></td>
                        <td><?php echo $hdc->name;?></td>
                        <td><?php echo $lang->hdc->lustepList[$hdc->step]; ?></td>
                        <td><?php echo $hdc->deadline; ?></td>
                        <td><?php echo $hdc->type; ?></td>
                        <td><?php echo $hdc->rating; ?></td>
                        <td><?php echo $hdc->totalManday; ?></td>
                        <td><?php echo $hdc->onsiteManday; ?></td>
                        <td><?php echo $hdc->remoteManday; ?></td>
                        <td><?php echo $hdc->codecmtManday; ?></td>
                        <td <?php if($hdc->funcDesign && !isset($users[trim(strstr($hdc->funcDesign, '/'), '/')])) echo "class='color-tip'";?>><?php echo $hdc->funcDesign; ?></td>
                        <td <?php if($hdc->techDesign && !isset($users[trim(strstr($hdc->techDesign, '/'), '/')])) echo "class='color-tip'";?>><?php echo $hdc->techDesign; ?></td>
                        <td <?php if($hdc->codeDevelop && !isset($users[trim(strstr($hdc->codeDevelop, '/'), '/')])) echo "class='color-tip'";?>><?php echo $hdc->codeDevelop; ?></td>
                        <td <?php if($hdc->remoteTest && !isset($users[trim(strstr($hdc->remoteTest, '/'), '/')])) echo "class='color-tip'";?>><?php echo $hdc->remoteTest; ?></td>
                        <td <?php if($hdc->siteAccept && !isset($users[trim(strstr($hdc->siteAccept, '/'), '/')])) echo "class='color-tip'";?>><?php echo $hdc->siteAccept; ?></td>
                        <td <?php if($hdc->remoteHead && !isset($users[trim(strstr($hdc->remoteHead, '/'), '/')])) echo "class='color-tip'";?>><?php echo $hdc->remoteHead; ?></td>
                        <td <?php if($hdc->siteHead && !isset($users[trim(strstr($hdc->siteHead, '/'), '/')])) echo "class='color-tip'";?>><?php echo $hdc->siteHead; ?></td>
                        <td><?php echo $hdc->funcOwnership; ?></td>
                        <td><?php echo $hdc->devOwnership; ?></td>
                        <td><?php echo $hdc->estReqSubmitDate; ?></td>
                        <td><?php echo $hdc->estCodeStartDate; ?></td>
                        <td><?php echo $hdc->estCodeEndDate; ?></td>
                        <td><?php echo $hdc->estTestEndDate; ?></td>
                        <td><?php echo $hdc->actReqSubmitDate; ?></td>
                        <td><?php echo $hdc->actReqComfimBeganDate; ?></td>
                        <td><?php echo $hdc->actReqComfimEndDate; ?></td>
                        <td><?php echo $hdc->actCodeStartDate; ?></td>
                        <td><?php echo $hdc->actCodeEndDate; ?></td>
                        <td><?php echo $hdc->actTestBeganDate; ?></td>
                        <td><?php echo $hdc->actTestEndDate; ?></td>
                        <td><?php echo $hdc->actOnsiteTestBeganDate; ?></td>
                        <td><?php echo $hdc->actOnsiteTestEndDate; ?></td>
                        <td><?php echo $hdc->recopercent; ?></td>
                        <td><?php echo $hdc->status ? $lang->hdc->activated : $lang->hdc->unactivated; ?></td>
                        <td><?php echo $hdc->desc; ?></td>
                        <td>
                            <?php //common::printIcon('hdc', 'activate', "hdcID=$hdc->id", $hdc, 'list', 'off', '', true); ?>
                            <?php common::printIcon('hdc', 'edit', "hdcID=$hdc->id", '', 'list'); ?>
                            <?php
                            if (common::hasPriv('hdc', 'activate')) {
                                $activateURL = $this->createLink('hdc', 'activate', "hdcID=$hdc->id");
                                $disabled = $hdc->status ? 'disabled' : '';
                                $ahrf = $hdc->status ? '#' : "javascript:activate(\"$activateURL\")";
                                echo html::a($ahrf, "<i class='icon-off {$disabled}'></i>", '', "class='btn-icon' title='{$lang->hdc->activate}'");
                            }
                            ?>
                            <?php
                            if (common::hasPriv('hdc', 'delete')) {
                                $deleteURL = $this->createLink('hdc', 'delete', "hdcID=$hdc->id&confirm=yes");
                                echo html::a("javascript:ajaxDelete(\"$deleteURL\",\"batchForm\",confirmDelete)", '<i class="icon-remove"></i>', '', "class='btn-icon' title='{$lang->hdc->delete}'");
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="30">
                        <div class='table-actions clearfix'>
                            <?php if (count($hdcs)): ?>
                                <?php echo html::selectButton(); ?>
                                <?php
                                $canBatchActivate = common::hasPriv('hdc', 'batchActivate');
                                $disabled = $canBatchActivate ? '' : "disabled='disabled'";
                                $actionLink = $this->createLink('hdc', 'batchActivate');
                                ?>
                                <div class='btn-group dropup'>
                                    <?php echo html::commonButton($lang->hdc->activate, "onclick=\"setFormAction('$actionLink')\" $disabled"); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php $pager->show(); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
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
