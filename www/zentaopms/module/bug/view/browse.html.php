<?php
/**
 * The browse view file of bug module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     bug
 * @version     $Id: browse.html.php 5102 2013-07-12 00:59:54Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php
include '../../common/view/header.html.php';
include '../../common/view/datatable.fix.html.php';
js::set('browseType',    $browseType);
js::set('moduleID',      $moduleID);
js::set('bugBrowseType', ($browseType == 'bymodule' and $this->session->bugBrowseType == 'bysearch') ? 'all' : $this->session->bugBrowseType);
?>
<div id='featurebar'>
  <ul class='nav'>
    <li>
      <div class='label-angle<?php if($moduleID) echo ' with-close';?>'>
        <?php
        echo $moduleName;
        if($moduleID)
        {
            $removeLink = $browseType == 'bymodule' ? inlink('browse', "productID=$productID&branch=$branch&browseType=$browseType&param=0&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}") : 'javascript:removeCookieByKey("bugModule")';
            echo html::a($removeLink, "<i class='icon icon-remove'></i>", '', "class='text-muted'");
        }
        ?>
      </div>
    </li>
    <?php foreach(customModel::getFeatureMenu($this->moduleName, $this->methodName) as $menuItem):?>
    <?php if(isset($menuItem->hidden)) continue;?>
    <?php if(strpos($menuItem->name, 'QUERY') === 0):?>
    <?php $queryID = (int)substr($menuItem->name, 5);?>
    <li id='<?php echo $menuItem->name?>Tab'><?php echo html::a($this->createLink('bug', 'browse', "productid=$productID&branch=$branch&browseType=bySearch&param=$queryID"), $menuItem->text)?></li>
    <?php else:?>
    <li id='<?php echo $menuItem->name?>Tab'><?php echo html::a($this->createLink('bug', 'browse', "productid=$productID&branch=$branch&browseType={$menuItem->name}&param=0"), $menuItem->text)?></li>
    <?php endif;?>
    <?php endforeach;?>
    <li id='bysearchTab'><a href='#'><i class='icon-search icon'></i>&nbsp;<?php echo $lang->bug->byQuery;?></a></li>
  </ul>
  <div class='actions'>
    <div class='btn-group'>
      <div class='btn-group'>
        <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
          <i class='icon-download-alt'></i> <?php echo $lang->export ?>
          <span class='caret'></span>
        </button>
        <ul class='dropdown-menu' id='exportActionMenu'>
          <?php 
          $misc = common::hasPriv('bug', 'export') ? "class='export'" : "class=disabled";
          $link = common::hasPriv('bug', 'export') ?  $this->createLink('bug', 'export', "productID=$productID&orderBy=$orderBy") : '#';
          echo "<li>" . html::a($link, $lang->bug->export, '', $misc) . "</li>";
          ?>
        </ul>
      </div>
      <div class='btn-group'>
        <?php common::printIcon('bug', 'report', "productID=$productID&browseType=$browseType&moduleID=$moduleID"); ?>
      </div>
    </div>
    <div class='btn-group'>
      <?php
      common::printIcon('bug', 'batchCreate', "productID=$productID&branch=$branch&projectID=0&moduleID=$moduleID");
      if(commonModel::isTutorialMode())
      {
          $wizardParams = helper::safe64Encode("productID=$productID&branch=$branch&extra=moduleID=$moduleID");
          common::printIcon('tutorial', 'wizard', "module=bug&method=create&params=$wizardParams", 'btn', 'button', 'plus', '', 'btn-bug-create', '', false, $lang->bug->create);
      }
      else
      {
          common::printIcon('bug', 'create', "productID=$productID&branch=$branch&extra=moduleID=$moduleID", 'btn', 'button', 'plus', '', 'btn-bug-create');
      }
      ?>
    </div>
  </div>
  <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div>
<div class='side' id='treebox'>
  <a class='side-handle' data-id='bugTree'><i class='icon-caret-left'></i></a>
  <div class='side-body'>
    <div class='panel panel-sm'>
      <div class='panel-heading nobr'>
        <?php echo html::icon($lang->icons['product']);?> <strong><?php echo $branch ? $branches[$branch] : $productName;?></strong>
      </div>
      <div class='panel-body'>
        <?php echo $moduleTree;?>
        <div class='text-right'>
          <?php common::printLink('tree', 'browse', "productID=$productID&view=bug", $lang->tree->manage);?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class='main'>
  <form method='post' id='bugForm'>
    <?php
    $datatableId  = $this->moduleName . ucfirst($this->methodName);
    $useDatatable = (isset($this->config->datatable->$datatableId->mode) and $this->config->datatable->$datatableId->mode == 'datatable');
    $file2Include = $useDatatable ?  dirname(__FILE__) . '/datatabledata.html.php' : dirname(__FILE__) . '/browsedata.html.php';
    $vars         = "productID=$productID&branch=$branch&browseType=$browseType&param=$param&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}";
    include $file2Include;
    ?>
      <tfoot>
        <tr>
          <?php
          $columns = $this->cookie->windowWidth >= $this->config->wideSize ? 12 : 10;
          if($browseType == 'needconfirm') $columns = 7;
          ?>
          <td colspan='<?php echo $columns;?>'>
            <?php if(!empty($bugs)):?>
            <div class='table-actions clearfix'>
              <?php if(!$useDatatable) echo html::selectButton();?>
              <div class='btn-group dropup'>
                <?php
                $actionLink = $this->createLink('bug', 'batchEdit', "productID=$productID&branch=$branch");
                $misc       = common::hasPriv('bug', 'batchEdit') ? "onclick=\"setFormAction('$actionLink')\"" : "disabled='disabled'";
                echo html::commonButton($lang->edit, $misc);
                ?>
                <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button>
                <ul class='dropdown-menu'>
                  <?php
                  $class = "class='disabled'";
                  $actionLink = $this->createLink('bug', 'batchConfirm');
                  $misc = common::hasPriv('bug', 'batchConfirm') ? "onclick=\"setFormAction('$actionLink','hiddenwin')\"" : $class;
                  if($misc) echo "<li>" . html::a('javascript:;', $lang->bug->confirmBug, '', $misc) . "</li>";

                  $actionLink = $this->createLink('bug', 'batchClose');
                  $misc = common::hasPriv('bug', 'batchClose') ? "onclick=\"setFormAction('$actionLink','hiddenwin')\"" : $class;
                  if($misc) echo "<li>" . html::a('javascript:;', $lang->bug->close, '', $misc) . "</li>";

                  if(common::hasPriv('bug', 'batchChangeModule'))
                  {
                      $withSearch = count($modules) > 8;
                      echo "<li class='dropdown-submenu'>";
                      echo html::a('javascript:;', $lang->bug->moduleAB, '', "id='moduleItem'");
                      echo "<ul class='dropdown-menu" . ($withSearch ? ' with-search':'') . "'>";
                      foreach($modules as $moduleId => $module)
                      {
                          $actionLink = $this->createLink('bug', 'batchChangeModule', "moduleID=$moduleId");
                          echo "<li class='option' data-key='$moduleID'>" . html::a('#', $module, '', "onclick=\"setFormAction('$actionLink','hiddenwin')\"") . "</li>";
                      }
                      if($withSearch) echo "<li class='menu-search'><div class='input-group input-group-sm'><input type='text' class='form-control' placeholder=''><span class='input-group-addon'><i class='icon-search'></i></span></div></li>";
                      echo '</ul></li>';
                  }
                  else
                  {
                      echo '<li>' . html::a('javascript:;', $lang->bug->moduleAB, '', $class) . '</li>';
                  }

                  $misc = common::hasPriv('bug', 'batchResolve') ? "id='resolveItem'" : '';
                  if($misc)
                  {
                      echo "<li class='dropdown-submenu'>" . html::a('javascript:;', $lang->bug->resolve,  '', $misc);
                      echo "<ul class='dropdown-menu'>";
                      unset($lang->bug->resolutionList['']);
                      unset($lang->bug->resolutionList['duplicate']);
                      unset($lang->bug->resolutionList['tostory']);
                      foreach($lang->bug->resolutionList as $key => $resolution)
                      {
                          $actionLink = $this->createLink('bug', 'batchResolve', "resolution=$key");
                          if($key == 'fixed')
                          {
                              $withSearch = count($builds) > 4;
                              echo "<li class='dropdown-submenu'>";
                              echo html::a('javascript:;', $resolution, '', "id='fixedItem'");
                              echo "<ul class='dropdown-menu" . ($withSearch ? ' with-search':'') . "'>";
                              unset($builds['']);
                              foreach($builds as $key => $build)
                              {
                                  $actionLink = $this->createLink('bug', 'batchResolve', "resolution=fixed&resolvedBuild=$key");
                                  echo "<li class='option' data-key='$key'>";
                                  echo html::a('javascript:;', $build, '', "onclick=\"setFormAction('$actionLink','hiddenwin')\"");
                                  echo "</li>";
                              }
                              if($withSearch) echo "<li class='menu-search'><div class='input-group input-group-sm'><input type='text' class='form-control' placeholder=''><span class='input-group-addon'><i class='icon-search'></i></span></div></li>";
                              echo '</ul></li>';
                          }
                          else
                          {
                              echo '<li>' . html::a('javascript:;', $resolution, '', "onclick=\"setFormAction('$actionLink','hiddenwin')\"") . '</li>';
                          }
                      }
                      echo '</ul></li>';
                  }
                  else
                  {
                      echo "<li>" . html::a('javascript:;', $lang->bug->resolve,  '', $class);
                  }

                  $canBatchAssignTo = common::hasPriv('bug', 'batchAssignTo');
                  if($canBatchAssignTo && count($bugs))
                  {
                      $withSearch = count($memberPairs) > 10;
                      $actionLink = $this->createLink('bug', 'batchAssignTo', "productID={$productID}&type=product");
                      echo html::select('assignedTo', $memberPairs, '', 'class="hidden"');
                      echo "<li class='dropdown-submenu'>";
                      echo html::a('javascript::', $lang->bug->assignedTo, 'id="assignItem"');
                      echo "<ul class='dropdown-menu" . ($withSearch ? ' with-search':'') . "'>";
                      foreach ($memberPairs as $key => $value)
                      {
                          if(empty($key)) continue;
                          echo "<li class='option' data-key='$key'>" . html::a("javascript:$(\".table-actions #assignedTo\").val(\"$key\");setFormAction(\"$actionLink\")", $value, '', '') . '</li>';
                      }
                      if($withSearch) echo "<li class='menu-search'><div class='input-group input-group-sm'><input type='text' class='form-control' placeholder=''><span class='input-group-addon'><i class='icon-search'></i></span></div></li>";
                      echo "</ul>";
                      echo "</li>";
                  }
                  else
                  {
                      echo "<li>" . html::a('javascript:;', $lang->bug->assignedTo,  '', $class);
                  }
                  ?>
                </ul>
              </div>
            </div>
            <?php endif;?>
            <div class='text-right'><?php $pager->show();?></div>
          </td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
$('#' + bugBrowseType + 'Tab').addClass('active');
$('#module' + moduleID).addClass('active'); 
<?php if($browseType == 'bysearch'):?>
$shortcut = $('#QUERY<?php echo (int)$param;?>Tab');
if($shortcut.size() > 0)
{
    $shortcut.addClass('active');
    $('#bysearchTab').removeClass('active');
    $('#querybox').removeClass('show');
}
<?php endif;?>
<?php $this->app->loadConfig('qa', '', false);?>
<?php if($this->config->qa->homepage != 'browse'):?>
$(function(){$('#modulemenu .nav li:last').after("<li class='right'><a style='font-size:12px' href='javascript:setHomepage(\"qa\", \"browse\")'><i class='icon icon-cog'></i><?php echo $lang->homepage?></a></li>")});
<?php endif;?>
</script>
<?php include '../../common/view/footer.html.php';?>
