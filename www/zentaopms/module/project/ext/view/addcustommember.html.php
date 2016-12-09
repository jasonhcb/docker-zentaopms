<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/datepicker.html.php';?>
<?php if(!empty($config->safe->mode)) $lang->user->placeholder->password1 = $lang->user->placeholder->passwordStrength[$config->safe->mode]?>
<?php js::set('holders', $lang->project->placeholder);?>
<?php js::set('roleGroup', $roleGroup);?>
<div class='container mw-700px'>
    <div id='titlebar'>
        <div class='heading'>
            <span class='prefix'><?php echo html::icon($lang->icons['user']);?></span>
            <strong><small class='text-muted'><?php echo html::icon($lang->icons['create']);?></small> <?php echo $lang->project->addcustom;?></strong>
        </div>
    </div>
    <form class='form-condensed mw-700px' method='post' target='hiddenwin' id='dataform'>
        <table align='center' class='table table-form'>
            <tr>
                <th><?php echo $lang->project->projectname;?></th>
                <td><?php echo $projectid;?></td>
            </tr>
            <tr>
                <th><?php echo $lang->project->account;?></th>
                <td><?php echo html::input('account', '', "class='form-control' autocomplete='off'");?></td>
            </tr>
            <tr>
                <th><?php echo $lang->project->realname;?></th>
                <td><?php echo html::input('realname', '', "class='form-control'");?></td>
            </tr>
            <tr>
                <th><?php echo $lang->project->gender;?></th>
                <td><?php echo html::radio('gender', (array)$lang->user->genderList, 'm');?></td>
            </tr>
            <tr>
                <th><?php echo $lang->project->customname;?></th>
                <td><?php echo html::input('customname', '', "class='form-control'");?></td>
            </tr>
            <tr>
                <th><?php echo $lang->project->join;?></th>
                <td><?php echo html::input('join', '', "class='form-control form-date'");?></td>
            </tr>
            <tr>
                <th><?php echo $lang->project->webaddress;?></th>
                <td><?php echo html::input('webaddress', '', "class='form-control'");?></td>
            </tr>
            <tr><th></th><td><?php echo html::submitButton();?></td></tr>
        </table>
    </form>
</div>
<?php include '../../../common/view/footer.html.php';?>
