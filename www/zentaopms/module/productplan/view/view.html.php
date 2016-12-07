<?php
/**
 * The view of productplan module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     productplan
 * @version     $Id: view.html.php 5096 2013-07-11 07:02:43Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::set('confirmUnlinkStory', $lang->productplan->confirmUnlinkStory)?>
<?php js::set('confirmUnlinkBug', $lang->productplan->confirmUnlinkBug)?>
<div id='titlebar'>
  <div class='heading'>
  <span class='prefix'><?php echo html::icon($lang->icons['plan']);?> <strong><?php echo $plan->id;?></strong></span>
    <strong><?php echo $plan->title;?></strong>
    <?php if($plan->deleted):?>
    <span class='label label-danger'><?php echo $lang->plan->deleted;?></span>
    <?php endif; ?>
  </div>
  <div class='actions'>
  <?php
   $browseLink = $this->session->productPlanList ? $this->session->productPlanList : inlink('browse', "planID=$plan->id");
   if(!$plan->deleted)
   {
      ob_start();
      echo "<div class='btn-group'>";
      common::printIcon('story', 'create', "productID=$plan->product&branch=$plan->branch&moduleID=0&storyID=0&projectID=0&bugID=0&planID=$plan->id", '', 'button', 'plus');
      if(common::hasPriv('productplan', 'linkStory')) echo html::a(inlink('view', "planID=$plan->id&type=story&orderBy=id_desc&link=true"), '<i class="icon-link"></i> ' . $lang->productplan->linkStory, '', "class='btn'");
      if(common::hasPriv('productplan', 'linkBug'))   echo html::a(inlink('view', "planID=$plan->id&type=bug&orderBy=id_desc&link=true"), '<i class="icon-bug"></i> ' . $lang->productplan->linkBug, '', "class='btn'");
      echo '</div>';
      echo "<div class='btn-group'>";
      common::printIcon('productplan', 'edit',     "planID=$plan->id");
      common::printIcon('productplan', 'delete',   "planID=$plan->id", '', 'button', '', 'hiddenwin');
      echo '</div>';
      $actionLinks = ob_get_contents();
      ob_end_clean();
      echo $actionLinks;
   }
   common::printRPN($browseLink);
  ?>
  </div>
</div>
<div class='row-table <?php echo $this->cookie->productPlanSide == 'hide' ? 'hide-side' : ''?>'>
  <div class='col-main'>
    <div class='main'>
      <div class='tabs'>
        <ul class='nav nav-tabs'>
          <li class='<?php if($type == 'story') echo 'active'?>'><a href='#stories' data-toggle='tab'><?php echo  html::icon($lang->icons['story']) . ' ' . $lang->productplan->linkedStories;?></a></li>
          <li class='<?php if($type == 'bug') echo 'active'?>'><a href='#bugs' data-toggle='tab'><?php echo  html::icon($lang->icons['bug']) . ' ' . $lang->productplan->linkedBugs;?></a></li>
        </ul>
        <div class='tab-content'>
          <div id='stories' class='tab-pane <?php if($type == 'story') echo 'active'?>'>
            <?php if(common::hasPriv('productplan', 'linkStory')):?>
            <div class='action'>
            <?php echo html::a("javascript:showLink($plan->id, \"story\")", '<i class="icon-link"></i> ' . $lang->productplan->linkStory, '', "class='btn btn-sm btn-primary'");?>
              <span class='side-handle-btn'>
              <?php $class = $this->cookie->productPlanSide == 'hide' ? 'icon-collapse-full' : 'icon-expand-full'?>
              <?php echo html::a('###', "<i class='$class'></i>", '', "class='btn btn-sm'")?>
              </span>
            </div>
            <div class='linkBox'></div>
            <?php endif;?>
            <form class='form-condensed' method='post' target='hiddenwin' action="<?php echo inlink('batchUnlinkStory', "planID=$plan->id&orderBy=$orderBy");?>">
              <table class='table tablesorter table-condensed table-hover table-striped table-borderless table-fixed' id='storyList'>
                <?php $vars = "planID={$plan->id}&type=story&orderBy=%s&link=$link&param=$param"; ?>
                <thead>
                <tr>
                  <th class='w-id {sorter:false}' >   <?php common::printOrderLink('id',         $orderBy, $vars, $lang->idAB);?></th>
                  <th class='w-pri {sorter:false}'>   <?php common::printOrderLink('pri',        $orderBy, $vars, $lang->priAB);?></th>
                  <th class='{sorter:false}'>         <?php common::printOrderLink('title',      $orderBy, $vars, $lang->story->title);?></th>
                  <th class='w-user {sorter:false}'>  <?php common::printOrderLink('openedBy',   $orderBy, $vars, $lang->openedByAB);?></th>
                  <th class='w-user {sorter:false}'>  <?php common::printOrderLink('assignedTo', $orderBy, $vars, $lang->assignedToAB);?></th>
                  <th class='w-60px {sorter:false}'>  <?php common::printOrderLink('estimate',   $orderBy, $vars, $lang->story->estimateAB);?></th>
                  <th class='w-status {sorter:false}'><?php common::printOrderLink('status',     $orderBy, $vars, $lang->statusAB);?></th>
                  <th class='w-80px {sorter:false}'>  <?php common::printOrderLink('stage',      $orderBy, $vars, $lang->story->stageAB);?></th>
                  <th class='w-50px {sorter:false}'>  <?php echo $lang->actions?></th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $totalEstimate = 0.0;
                  $canBatchUnlink     = common::hasPriv('productPlan', 'batchUnlinkStory');
                  $canBatchChangePlan = common::hasPriv('story', 'batchChangePlan');
                  ?>
                  <?php foreach($planStories as $story):?>
                  <?php
                  $viewLink = $this->createLink('story', 'view', "storyID=$story->id");
                  $totalEstimate += $story->estimate;
                  ?>
                  <tr class='text-center'>
                    <td>
                      <?php if($canBatchUnlink or $canBatchChangePlan):?>
                      <input class='ml-10px' type='checkbox' name='storyIDList[]'  value='<?php echo $story->id;?>'/> 
                      <?php endif;?>
                      <?php echo html::a($viewLink, sprintf("%03d", $story->id));?>
                    </td>
                    <td><span class='<?php echo 'pri' . zget($lang->story->priList, $story->pri, $story->pri)?>'><?php echo zget($lang->story->priList, $story->pri, $story->pri);?></span></td>
                    <td class='text-left nobr' title='<?php echo $story->title?>'><?php echo html::a($viewLink , $story->title);?></td>
                    <td><?php echo zget($users, $story->openedBy);?></td>
                    <td><?php echo zget($users, $story->assignedTo);?></td>
                    <td><?php echo $story->estimate;?></td>
                    <td class='story-<?php echo $story->status?>'><?php echo $lang->story->statusList[$story->status];?></td>
                    <td><?php echo $lang->story->stageList[$story->stage];?></td>
                    <td>
                      <?php
                      if(common::hasPriv('productplan', 'unlinkStory'))
                      {
                          $unlinkURL = $this->createLink('productplan', 'unlinkStory', "story=$story->id&plan=$plan->id&confirm=yes");
                          echo html::a("javascript:ajaxDelete(\"$unlinkURL\",\"storyList\",confirmUnlinkStory)", '<i class="icon-unlink"></i>', '', "class='btn-icon' title='{$lang->productplan->unlinkStory}'");
                      }
                      ?>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
                  <td colspan='9'>
                    <div class='table-actions clearfix'>
                      <?php 
                      if(count($planStories) and ($canBatchUnlink or $canBatchChangePlan))
                      {
                          echo html::selectButton();
                          echo "<div class='btn-group dropup'>";
                          $actionLink = inlink('batchUnlinkStory', "planID=$plan->id&orderBy=$orderBy");
                          echo html::commonButton($lang->productplan->unlinkStory, ($canBatchUnlink ? '' : 'disabled') . "onclick=\"setFormAction('$actionLink', '', this)\"");
                          echo "<button type='button' class='btn dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button>";
                          echo "<ul class='dropdown-menu'>";
                          echo "<li class='dropdown-submenu'>";
                          echo html::a('javascript:;', $lang->story->planAB, '', "id='changePlan' " . ($canBatchChangePlan ? '' : "class='disabled'"));
                          if($canBatchChangePlan)
                          {
                              unset($plans['']);
                              unset($plans[$plan->id]);
                              $plans      = array(0 => $lang->null) + $plans;
                              $withSearch = count($plans) > 10;
                              echo "<ul class='dropdown-menu" . ($withSearch ? ' with-search':'') . "'>";
                              foreach($plans as $planID => $planName)
                              {
                                  $actionLink = $this->createLink('story', 'batchChangePlan', "planID=$planID&oldPlanID=$plan->id");
                                  echo "<li class='option' data-key='$planID'>" . html::a('#', $planName, '', "onclick=\"setFormAction('$actionLink', 'hiddenwin', this)\"") . "</li>";
                              }
                              if($withSearch) echo "<li class='menu-search'><div class='input-group input-group-sm'><input type='text' class='form-control' placeholder=''><span class='input-group-addon'><i class='icon-search'></i></span></div></li>";
                              echo '</ul>';
                          }
                          echo '</li></ul></div>';
                      }
                      ?>
                      <div class='text'><?php echo $summary;?></div>
                    </div>
                  </td>
                </tr>
                </tfoot>
              </table>
            </form>
          </div>
          <div id='bugs' class='tab-pane <?php if($type == 'bug') echo 'active';?>'>
            <?php if(common::hasPriv('productplan', 'linkBug')):?>
            <div class='action'>
            <?php echo html::a("javascript:showLink($plan->id, \"bug\")", '<i class="icon-bug"></i> ' . $lang->productplan->linkBug, '', "class='btn btn-sm btn-primary'");?>
              <span class='side-handle-btn'>
              <?php $class = $this->cookie->productPlanSide == 'hide' ? 'icon-collapse-full' : 'icon-expand-full'?>
              <?php echo html::a('###', "<i class='$class'></i>", '', "class='btn btn-sm'")?>
              </span>
            </div>
            <div class='linkBox'></div>
            <?php endif;?>
            <form method='post' target='hiddenwin' action="<?php echo inLink('batchUnlinkBug', "planID=$plan->id&orderBy=$orderBy");?>">
              <table class='table tablesorter table-condensed table-hover table-striped table-borderless table-fixed' id='bugList'>
                <?php $vars = "planID={$plan->id}&type=bug&orderBy=%s&link=$link&param=$param"; ?>
                <thead>
                <tr>
                  <th class='w-id {sorter:false}'>    <?php common::printOrderLink('id',         $orderBy, $vars, $lang->idAB);?></th>
                  <th class='w-pri {sorter:false}'>   <?php common::printOrderLink('pri',        $orderBy, $vars, $lang->priAB);?></th>
                  <th class='{sorter:false}'>         <?php common::printOrderLink('title',      $orderBy, $vars, $lang->bug->title);?></th>
                  <th class='w-user {sorter:false}'>  <?php common::printOrderLink('openedBy',   $orderBy, $vars, $lang->openedByAB);?></th>
                  <th class='w-user {sorter:false}'>  <?php common::printOrderLink('assignedTo', $orderBy, $vars, $lang->assignedToAB);?></th>
                  <th class='w-status {sorter:false}'><?php common::printOrderLink('status',     $orderBy, $vars, $lang->statusAB);?></th>
                  <th class='w-50px {sorter:false}'>  <?php echo $lang->actions?></th>
                </tr>
                </thead>
                <tbody>
                  <?php $canBatchUnlink = common::hasPriv('productPlan', 'batchUnlinkBug');?>
                  <?php foreach($planBugs as $bug):?>
                  <tr class='text-center'>
                    <td>
                      <?php if($canBatchUnlink):?>
                      <input class='ml-10px' type='checkbox' name='unlinkBugs[]'  value='<?php echo $bug->id;?>'/> 
                      <?php endif;?>
                      <?php echo html::a($this->createLink('bug', 'view', "bugID=$bug->id"), sprintf("%03d", $bug->id));?>
                    </td>
                    <td><span class='<?php echo 'pri' . zget($lang->bug->priList, $bug->pri, $bug->pri)?>'><?php echo zget($lang->bug->priList, $bug->pri, $bug->pri);?></span></td>
                    <td class='text-left nobr' title='<?php echo $bug->title?>'><?php echo html::a($this->createLink('bug', 'view', "bugID=$bug->id"), $bug->title);?></td>
                    <td><?php echo zget($users, $bug->openedBy);?></td>
                    <td><?php echo zget($users, $bug->assignedTo);?></td>
                    <td class='bug-<?php echo $bug->status?>'><?php echo $lang->bug->statusList[$bug->status];?></td>
                    <td>
                      <?php
                      if(common::hasPriv('productplan', 'unlinkBug'))
                      {
                          $unlinkURL = $this->createLink('productplan', 'unlinkBug', "story=$bug->id&confirm=yes");
                          echo html::a("javascript:ajaxDelete(\"$unlinkURL\",\"bugList\",confirmUnlinkBug)", '<i class="icon-unlink"></i>', '', "class='btn-icon' title='{$lang->productplan->unlinkBug}'");
                      }
                      ?>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
                  <td colspan='7'>
                    <div class='table-actions clearfix'>
                      <?php 
                      if(count($planBugs) and $canBatchUnlink)
                      {
                          echo html::selectButton();
                          echo html::submitButton($lang->productplan->batchUnlink);
                      }
                      ?>
                      <div class='text'><?php echo sprintf($lang->productplan->bugSummary, count($planBugs));?> </div>
                    </div>
                  </td>
                </tr>
                </tfoot>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class='col-side'>
    <div class='main main-side'>
      <fieldset>
        <legend><?php echo $lang->productplan->desc;?></legend>
        <div class='article-content'><?php echo $plan->desc;?></div>
      </fieldset>
      <fieldset>
        <legend><?php echo $lang->productplan->basicInfo?></legend>
        <table class='table table-data table-condensed table-borderless'>
          <tr>
            <th class='w-80px strong'><?php echo $lang->productplan->title;?></th> 
            <td><?php echo $plan->title;?></td>
          </tr>
          <?php if($product->type != 'normal'):?>
          <tr>
            <th><?php echo $lang->product->branch;?></th>
            <td><?php echo $branches[$plan->branch];?></td>
          </tr>
          <?php endif;?>
          <tr>
            <th><?php echo $lang->productplan->begin;?></th>
            <td><?php echo $plan->begin;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->productplan->end;?></th>
            <td><?php echo $plan->end;?></td>
          </tr>
        </table>
      </fieldset>
      <?php include '../../common/view/action.html.php';?>
    </div>
  </div>
</div>
<?php js::set('param', helper::safe64Decode($param))?>
<?php js::set('link', $link)?>
<?php js::set('planID', $plan->id)?>
<?php js::set('orderBy', $orderBy)?>
<?php js::set('type', $type)?>
<?php include '../../common/view/footer.html.php';?>
