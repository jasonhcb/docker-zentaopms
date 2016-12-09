<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/tablesorter.html.php';?>
<?php js::set('confirmUnlinkMember', $lang->project->confirmUnlinkMember)?>
<div>
    <div id='titlebar'>
        <div class='heading'>
            <?php echo html::icon($lang->icons['team']);?> <?php echo $lang->project->custommanage;?>
        </div>
        <div class='actions'>
            <?php common::printLink('project', 'addcustommember', "projectID=$project->id&onlybody=yes", $lang->project->addcustomMembers, '', "class='iframe btn btn-primary'");?>
        </div>
    </div>
    <table class='table tablesorter' id='memberList'>
        <thead>
        <tr>
            <th><?php echo $lang->project->email;?></th>
            <th><?php echo $lang->project->realname;?></th>
            <th><?php echo $lang->project->role;?></th>
            <th><?php echo $lang->project->customname;?></th>
            <th><?php echo $lang->project->join;?></th>
            <th><?php echo $lang->project->webaddress;?></th>
            <th><?php echo $lang->actions;?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($custom as $member):?>
            <tr class='text-center'>
                <td><?php echo $member->account;?></td>
                <td><?php echo $member->realname;?></td>
                <td><?php echo $member->role;?></td>
                <td><?php echo $member->cusname;?></td>
                <td><?php echo substr($member->join, 2);?></td>
                <td><?php echo $member->webaddress;?></td>
                <td>
                    <?php
                    if (common::hasPriv('project', 'unlinkcustom'))
                    {
                        $unlinkURL = $this->createLink('project', 'unlinkcustom', "projectID=$project->id&account=$member->account&confirm=yes");
                        echo html::a("javascript:ajaxDelete(\"$unlinkURL\",\"memberList\",confirmUnlinkMember)", '<i class="icon-green-project-unlinkMember icon-remove"></i>', '', "class='btn-icon' title='{$lang->project->unlinkMember}'");
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php include '../../../common/view/footer.html.php';?>
