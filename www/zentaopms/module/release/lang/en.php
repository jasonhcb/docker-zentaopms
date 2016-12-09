<?php
/**
 * The release module English file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     release
 * @version     $Id: en.php 4129 2013-01-18 01:58:14Z wwccss $
 * @link        http://www.zentao.net
 */
$lang->release->common    = 'Release';
$lang->release->create    = "Create";
$lang->release->edit      = "Edit";
$lang->release->linkStory = "Link story";
$lang->release->linkBug   = "Link bug";
$lang->release->delete    = "Delete";
$lang->release->deleted   = 'Deleted';
$lang->release->view      = "Info";
$lang->release->browse    = "Browse";
$lang->release->changeStatus     = "Change status";
$lang->release->batchUnlink      = "Batch unlink";
$lang->release->batchUnlinkStory = "Batch unlink story";
$lang->release->batchUnlinkBug   = "Batch unlink bug";

$lang->release->confirmDelete      = "Are sure to delete this release?";
$lang->release->confirmUnlinkStory = "Are you sure to remove this story?";
$lang->release->confirmUnlinkBug   = "Are you sure to remove this bug?";

$lang->release->basicInfo = 'Basic Info';

$lang->release->id                    = 'ID';
$lang->release->product               = $lang->productCommon;
$lang->release->build                 = 'Build';
$lang->release->name                  = 'Name';
$lang->release->date                  = 'Date';
$lang->release->desc                  = 'Desc';
$lang->release->status                = 'Status';
$lang->release->last                  = 'Last release';
$lang->release->unlinkStory           = 'Remove story';
$lang->release->unlinkBug             = 'Remove bug';
$lang->release->stories               = 'Finished stories';
$lang->release->bugs                  = 'Resolved bugs';
$lang->release->generatedBugs         = 'Generated bug';
$lang->release->finishStories         = 'The total demand for a complete %s';
$lang->release->resolvedBugs          = 'The total solution of bug %s';
$lang->release->createdBugs           = 'The total generated of bug %s';
$lang->release->export                = 'Export as HTML';

$lang->release->filePath = 'Download : ';
$lang->release->scmPath  = 'SCM Path : ';

$lang->release->exportTypeList['all']     = 'All';
$lang->release->exportTypeList['story']   = 'Resolved Stories';
$lang->release->exportTypeList['bug']     = 'Resolved bugs';
$lang->release->exportTypeList['leftbug'] = 'Generated bugs';

$lang->release->statusList['']          = '';
$lang->release->statusList['normal']    = 'Normal';
$lang->release->statusList['terminate'] = 'Terminate';

$lang->release->changeStatusList['normal']    = 'Activate';
$lang->release->changeStatusList['terminate'] = 'Terminate';

$lang->release->action = new stdclass();
$lang->release->action->changestatus = array('main' => '$date, $extra By <strong>$actor</strong>.', 'extra' => 'changeStatusList');
