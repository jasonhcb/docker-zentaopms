<?php
/**
 * The testtask module English file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     testtask
 * @version     $Id: en.php 4490 2013-02-27 03:27:05Z wyd621@gmail.com $
 * @link        http://www.zentao.net
 */
$lang->testtask->index          = "Index";
$lang->testtask->create         = "Create";
$lang->testtask->delete         = "Delete";
$lang->testtask->view           = "Info";
$lang->testtask->edit           = "Edit";
$lang->testtask->browse         = "Browse";
$lang->testtask->linkCase       = "Link case";
$lang->testtask->unlinkCase     = "Del";
$lang->testtask->batchAssign    = "Batch Assign";
$lang->testtask->runCase        = "Run";
$lang->testtask->batchRun       = "Batch Run";
$lang->testtask->results        = "Result";
$lang->testtask->createBug      = "Bug(+)";
$lang->testtask->assign         = 'Assign';
$lang->testtask->cases          = 'Cases';
$lang->testtask->groupCase      = "View case by group";
$lang->testtask->pre            = 'Previous';
$lang->testtask->next           = 'Next';
$lang->testtask->start          = "Start";
$lang->testtask->close          = "Close";
$lang->testtask->wait           = "Testing build";
$lang->testtask->done           = "Tested build";

$lang->testtask->common         = 'Test build';
$lang->testtask->product        = $lang->productCommon;
$lang->testtask->project        = $lang->projectCommon;
$lang->testtask->build          = 'Build';
$lang->testtask->owner          = 'Owner';
$lang->testtask->pri            = 'Priority';
$lang->testtask->name           = 'Name';
$lang->testtask->begin          = 'Begin';
$lang->testtask->end            = 'End';
$lang->testtask->desc           = 'Desc';
$lang->testtask->mailto         = 'Mailto';
$lang->testtask->status         = 'Status';
$lang->testtask->assignedTo     = 'Assign';
$lang->testtask->linkVersion    = 'Version';
$lang->testtask->lastRunAccount = "Run";
$lang->testtask->lastRunTime    = 'Time';
$lang->testtask->lastRunResult  = 'Result';
$lang->testtask->report         = 'Report';
$lang->testtask->files          = 'Upload Files';

$lang->testtask->legendDesc      = 'Desc';
$lang->testtask->legendReport    = 'Report';
$lang->testtask->legendBasicInfo = 'Basic info';

$lang->testtask->statusList['wait']    = 'Pending';
$lang->testtask->statusList['doing']   = 'In progress';
$lang->testtask->statusList['done']    = 'Done';
$lang->testtask->statusList['blocked'] = 'Blocked';

$lang->testtask->priList[0] = '';
$lang->testtask->priList[3] = '3';
$lang->testtask->priList[1] = '1';
$lang->testtask->priList[2] = '2';
$lang->testtask->priList[4] = '4';

$lang->testtask->unlinkedCases = 'Unlinked';
$lang->testtask->linkByStory   = 'Link by story';
$lang->testtask->linkByBug     = 'Link by bug';
$lang->testtask->passAll       = 'Pass all';
$lang->testtask->pass          = 'Pass';
$lang->testtask->fail          = 'Fail';
$lang->testtask->showResult    = 'Executed <span class="text-info">%s</span> times';
$lang->testtask->showFail      = 'Failed <span class="text-danger">%s</span times';

$lang->testtask->confirmDelete     = 'Are you sure to delete this test build?';
$lang->testtask->confirmUnlinkCase = 'Are you sure to unlink this case?';

$lang->testtask->assignedToMe  = 'Assgined to me';
$lang->testtask->allCases      = 'All Cases';

$lang->testtask->lblCases      = 'Case list';
$lang->testtask->lblUnlinkCase = 'Remove case';
$lang->testtask->lblRunCase    = 'Run';
$lang->testtask->lblResults    = 'Result';

$lang->testtask->placeholder = new stdclass();
$lang->testtask->placeholder->begin = 'begin date';
$lang->testtask->placeholder->end   = 'end date';

$lang->testtask->mail = new stdclass();
$lang->testtask->mail->create = new stdclass();
$lang->testtask->mail->edit   = new stdclass();
$lang->testtask->mail->close  = new stdclass();
$lang->testtask->mail->create->title = "%s created testtask #%s:%s";
$lang->testtask->mail->edit->title   = "%s finished testtask #%s:%s";
$lang->testtask->mail->close->title  = "%s closed testtask #%s:%s";

$lang->testtask->action = new stdclass();
$lang->testtask->action->testtaskopened  = '$date, 由 <strong>$actor</strong> opened test task. <strong>$extra</strong>。' . "\n";
$lang->testtask->action->testtaskstarted = '$date, 由 <strong>$actor</strong> started test task. <strong>$extra</strong>。' . "\n";
$lang->testtask->action->testtaskclosed  = '$date, 由 <strong>$actor</strong> finished test task. <strong>$extra</strong>。' . "\n";
