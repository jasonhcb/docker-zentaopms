<?php
include '../../../common/view/header.html.php';
include '../../view/table.html.php';
?>
<?php js::set('confirmDelete', $lang->hdc->isnotvalid);?>
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
<div id='featurebar'>
    <ul class='nav' style="margin-left: 10px;">
        <li id='allcationTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcallcation', "browseType=allcation"), $lang->hdc->project_allocation); ?></li>
        <li id='undoneTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcundone', "browseType=undone"), $lang->hdc->project_undone); ?></li>
        <li id='unactivatedTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcmanage', "browseType=unactivated"), $lang->hdc->manage); ?></li>        
        <?php if ($roleok == 'yes'):?>
        <li id='maintenanceTab' style="margin-left: 5px;"><?php echo html::a($this->inlink('hdcmaintenance', "browseType=maintenance"), $lang->hdc->maintenance); ?></li>
        <?php endif;?>
        <li id='bysearchTab' style="display: none;"><?php echo "<a id='bll' href='#'><i class='icon-search icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
    </ul>
    <div class='actions'>
         <div class='btn-group'>
            <?php echo html::a(helper::createLink('hdc', 'createmanager',"hdcID=$hdcid"), "<i class='icon-plus'></i> " . $lang->hdc->create, '', "class='btn'") ?>
        </div>
        
    </div>
    <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div>
<div class="main" style="margin-bottom: 50px;">
    <form id='batchForm' method='post'>
        <table class="table table-condensed table-hover table-striped tablesorter table-fixed datatable" id="hdcList" data-checkable="false" data-fixed-left-width="400" data-fixed-right-width="100" data-custom-menu="true" data-checkbox-name="hdcIDList[]">
            <thead>
                <tr>
                    <?php $vars = "browseType=$browseType&param=$hdcid&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}"; ?>
                    <th data-flex="false" data-width="80">
                    <?php common::printOrderLink('account', $orderBy, $vars, $lang->hdc->usernumber); ?>
                    </th>
                    <th data-flex="false" data-width="100">
                    <?php common::printOrderLink('username', $orderBy, $vars, $lang->hdc->realname); ?>
                   </th>
                    <th data-flex="false" data-width="100">
                    <?php common::printOrderLink('route', $orderBy, $vars, $lang->hdc->route); ?></th>
                    <th data-flex="false" data-width="100">
                    <?php echo $lang->hdc->goodfor; ?></th>
                    <th data-flex="false" data-width="100" class="w-actions"><?php echo $lang->actions; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $key => $hdc): ?>
                    <tr class='text-center' data-id='<?php echo $hdc->id ?>'>
                        <td><?php echo $hdc->account;?></td>
                        <td><?php echo $hdc->username;?></td>
                        <td><?php echo $this->lang->hdc->routetype[$hdc->route]; ?></td>
                        <td><input type="checkbox" disabled="true" name="is_valid" id="goodfor"
                        <?php if ($hdc->is_valid == '1') {
                            echo "checked='checked'";
                        } ?> value="<?php echo $hdc->is_valid; ?>"></td>
                        <td>
                            <?php 
                                echo html::a($this->createLink('hdc', 'editmanager', "hdcID=$hdc->id"),'<i class="icon-common-edit icon-pencil"></i>','',"class='btn-icon'");
                            ?>
                            <?php
                                $deleteURL = $this->createLink('hdc', 'deletemanager', "hdcID=$hdc->id");
                                echo html::a("javascript:ajaxDelete(\"$deleteURL\",\"batchForm\",confirmDelete)", '<i class="icon-off"></i>', '', "class='btn-icon' title='{$lang->hdc->novalid}'");
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <?php $pager->show();?>
    </form>
</div>

<?php include '../../../common/view/footer.html.php'; ?>
<script language='javascript'>
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

