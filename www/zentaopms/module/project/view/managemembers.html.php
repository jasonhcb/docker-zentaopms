<?php
/**
 * The link user view of project module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     project
 * @version     $Id: managemembers.html.php 4662 2013-04-18 02:34:33Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::set('projectID', $project->id);?>
<?php js::set('team2Import', $team2Import);?>
<?php js::set('roles', $roles);?>
<div id='titlebar'>
  <div class='heading'>
    <strong><?php echo $lang->project->manageMembers;?></strong>
    <i class='icon icon-angle-right text-muted'></i>
  </div>
  <div id='deptSelector'><?php echo html::select('dept', $depts, $dept, "class='form-control chosen' onchange='setDeptUsers(this)' data-placeholder='{$lang->project->selectDept}'");?></div>
  <div class='actions'>
    <button class='btn' id='itBtn'><?php echo html::icon($lang->icons['copy']) . ' ' . $lang->project->copyTeam;?></button>
  </div>
</div>
<div class='main'>
  <form class='form-condensed' method='post' id='teamForm'>
    <table class='table table-form'>
      <thead>
        <tr class='text-center'>
          <th><?php echo $lang->team->account;?></th>
          <th><?php echo $lang->team->role;?></th>
          <th class='w-100px'><?php echo $lang->team->days;?></th>
          <th class='w-100px'><?php echo $lang->team->hours;?></th>
          <th class="w-40px"> <?php echo $lang->actions;?></th>
          <th class="w-40px"> <?php echo $lang->delete;?></th>
        </tr>
      </thead>
      <?php $i = 1; $memberCount = 0;?>
      <?php foreach($currentMembers as $member):?>
      <?php if(!isset($users[$member->account])) continue;?>
      <?php unset($users[$member->account]);?>
      <tr>
        <td><input type='text' name='realnames[]' id='account<?php echo $i;?>' value='<?php echo $member->realname;?>' readonly class='form-control' /></td>
        <td><input type='text' name='roles[]'     id='role<?php echo $i;?>'    value='<?php echo $member->role;?>' class='form-control' /></td>
        <td><input type='text' name='days[] '     id='days<?php echo $i;?>'    value='<?php echo $member->days;?>' class='form-control' /></td>
        <td>
          <input type='text'   name='hours[]' id='hours<?php echo $i;?>' value='<?php echo $member->hours;?>' class='form-control' />
          <input type='hidden' name='modes[]' value='update' />
          <input type='hidden' name='accounts[]' value='<?php echo $member->account;?>' />
        </td>
        <td><a href='javascript:;' onclick='addItem()' class='btn btn-block'><i class='icon-plus'></i></a></td>
        <td><a href='javascript:;' onclick='deleteItem()' class='disabled btn btn-block'><i class='icon icon-remove'></i></a></td>
      </tr>
      <?php $i ++; $memberCount ++;?>
      <?php endforeach;?>

      <?php foreach($members2Import as $member2Import):?>
      <tr class='addedItem'>
        <td><?php echo html::select("accounts[]", $users, $member2Import->account, "class='select-2 chosen' onchange='setRole(this.value, $i)'");?></td>
        <td><input type='text' name='roles[]' id='role<?php echo $i;?>' class='form-control' value='<?php echo $member2Import->role;?>' /></td>
        <td><input type='text' name='days[]'  id='days<?php echo $i;?>' class='form-control' value='<?php echo $project->days?>'/></td>
        <td>
          <input type='text'   name='hours[]' id='hours<?php echo $i;?>' class='form-control' value='<?php echo $member2Import->hours;?>' />
          <input type='hidden' name='modes[]' value='create' />
        </td>
        <td><a href='javascript:;' onclick='addItem()' class='btn btn-block'><i class='icon-plus'></i></a></td>
        <td><a href='javascript:;' onclick='deleteItem(this)' class='btn btn-block'><i class='icon icon-remove'></i></a></td>
      </tr>
      <?php $i ++; $memberCount ++;?>
      <?php endforeach;?>

      <?php foreach($deptUsers as $deptAccount => $userName):?>
      <?php if(!isset($users[$deptAccount])) continue;?>
      <tr class='addedItem'>
        <td><?php echo html::select("accounts[]", $users, $deptAccount, "class='select-2 chosen' onchange='setRole(this.value, $i)'");?></td>
        <td><input type='text' name='roles[]' id='role<?php echo $i;?>' class='form-control' value='<?php echo $roles[$deptAccount]?>'/></td>
        <td><input type='text' name='days[]'  id='days<?php echo $i;?>' class='form-control' value='<?php echo $project->days?>'/></td>
        <td>
          <input type='text'   name='hours[]' id='hours<?php echo $i;?>' class='form-control' value='<?php echo $lang->project->workHours?>' />
          <input type='hidden' name='modes[]' value='create' />
        </td>
        <td><a href='javascript:;' onclick='addItem()' class='btn btn-block'><i class='icon-plus'></i></a></td>
        <td><a href='javascript:;' onclick='deleteItem(this)' class='btn btn-block'><i class='icon icon-remove'></i></a></td>
      </tr>
      <?php unset($users[$deptAccount]);?>
      <?php $i ++; $memberCount ++;?>
      <?php endforeach;?>

      <?php for($j = 0; $j < 5; $j ++):?>
      <tr class='addedItem'>
        <td><?php echo html::select("accounts[]", $users, '', "class='select-2 chosen' onchange='setRole(this.value, $i)'");?></td>
        <td><input type='text' name='roles[]' id='role<?php  echo ($i);?>' class='form-control' /></td>
        <td><input type='text' name='days[]'  id='days<?php  echo ($i);?>' class='form-control' value='<?php echo $project->days?>'/></td>
        <td>
          <input type='text'   name='hours[]' id='hours<?php echo ($i);?>' class='form-control' value='<?php echo $lang->project->workHours?>' />
          <input type='hidden' name='modes[]' value='create' />
        </td>
        <td><a href='javascript:;' onclick='addItem()' class='btn btn-block'><i class='icon-plus'></i></a></td>
        <td><a href='javascript:;' onclick='deleteItem(this)' class='btn btn-block'><i class='icon icon-remove'></i></a></td>
      </tr>
      <?php $i ++; $memberCount ++;?>
      <?php endfor;?>
      <?php js::set('i', $i);?>

      <tr id='submit'>
        <td colspan='6' class='text-center'>
          <?php echo html::submitButton() ?>
        </td>
      </tr>
    </table>
  </form>
</div>
<div>
  <?php $i = '%i%';?>
  <table class='hidden'>
    <tr id='addItem' class='hidden'>
      <td><?php echo html::select("accounts[]", $users, '', "class='select-2' onchange='setRole(this.value, $i)'");?></td>
      <td><input type='text' name='roles[]' id='role<?php  echo ($i);?>' class='form-control' /></td>
      <td><input type='text' name='days[]'  id='days<?php  echo ($i);?>' class='form-control' value='<?php echo $project->days?>'/></td>
      <td>
        <input type='text'   name='hours[]' id='hours<?php echo ($i);?>' class='form-control' value='<?php echo $lang->project->workHours?>' />
        <input type='hidden' name='modes[]' value='create' />
      </td>
      <td><a href='javascript:;' onclick='addItem()' class='btn btn-block'><i class='icon-plus'></i></a></td>
      <td><a href='javascript:;' onclick='deleteItem(this)' class='btn btn-block'><i class='icon icon-remove'></i></a></td>
    </tr>
  </table>
</div>
<div class='modal fade' id='importTeamModal'>
  <div class='modal-dialog mw-700px'>
    <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal'>&times;</button>
      <h4 class='modal-title' id='myModalLabel'><?php echo $lang->project->copyTeamTitle;?></h4>
    </div>
    <div class='modal-body'>
      <?php if(count($teams2Import) == 1):?>
      <div class='alert alert-warning'>
        <i class='icon-info-sign'></i>
        <div class='content'>
          <p><?php echo $lang->project->copyNoProject;?></p>
        </div>
      </div>
      <?php else:?>
      <div id='importTeams' class='row'>
      <?php foreach ($teams2Import as $id => $name):?>
      <?php if(empty($id)):?>
        <?php if($team2Import != 0):?>
        <div class='col-md-4 col-sm-6'><a href='javascript:;' data-id='' class='cancel'><?php echo html::icon($lang->icons['cancel']) . ' ' . $lang->project->cancelCopy;?></a></div>
        <?php endif;?>
      <?php else: ?>
        <div class='col-md-4 col-sm-6'><a href='javascript:;' data-id='<?php echo $id;?>' class='nobr <?php echo ($team2Import == $id) ? ' active' : '';?>'><?php echo html::icon($lang->icons['team'], 'text-muted') . ' ' . $name;?></a></div>
      <?php endif; ?>
      <?php endforeach;?>
      </div>
      <?php endif;?>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
