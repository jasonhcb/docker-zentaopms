<?php
/**
 * The story module English file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     story
 * @version     $Id: en.php 5141 2013-07-15 05:57:15Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
$lang->story->create      = "Create";
$lang->story->batchCreate = "Batch";
$lang->story->change      = "Change";
$lang->story->changed     = 'Changed';
$lang->story->review      = 'Review';
$lang->story->batchReview = 'Batch review';
$lang->story->edit        = "Edit";
$lang->story->batchEdit   = "Batch edit";
$lang->story->close       = 'Close';
$lang->story->batchClose  = 'Batch close';
$lang->story->activate    = 'Activate';
$lang->story->delete      = "Delete";
$lang->story->view        = "Info";
$lang->story->tasks       = "Tasks";
$lang->story->taskCount   = 'Tasks count';
$lang->story->linkStory   = 'Related story';
$lang->story->unlinkStory = 'Unlink related story';
$lang->story->export      = "Export data";
$lang->story->zeroCase    = "Story of zero case";
$lang->story->reportChart = "Report";
$lang->story->batchChangePlan   = "Batch change plan";
$lang->story->batchChangeBranch = "Batch change branch";
$lang->story->batchChangeStage  = "Batch change stage";
$lang->story->batchAssignTo     = "Batch assignto";
$lang->story->batchChangeModule = "Batch change module";

$lang->story->common         = 'Story';
$lang->story->id             = 'ID';
$lang->story->product        = $lang->productCommon;
$lang->story->module         = 'Module';
$lang->story->moduleAB       = 'Module';
$lang->story->source         = 'Source';
$lang->story->fromBug        = 'From bug';
$lang->story->title          = 'Title';
$lang->story->spec           = 'Spec';
$lang->story->verify         = 'Verify';
$lang->story->pri            = 'Priority';
$lang->story->estimate       = 'Estimate';
$lang->story->estimateAB     = 'Estimate';
$lang->story->hour           = 'Hour';
$lang->story->status         = 'Status';
$lang->story->stage          = 'Stage';
$lang->story->stageAB        = 'Stage';
$lang->story->mailto         = 'Mailto';
$lang->story->openedBy       = 'Opened by';
$lang->story->openedDate     = 'Opened date';
$lang->story->assignedTo     = 'Assigned to';
$lang->story->assignedDate   = 'Assigned date';
$lang->story->lastEditedBy   = 'Last edited by';
$lang->story->lastEditedDate = 'Last edited date';
$lang->story->closedBy       = 'Closed by';
$lang->story->closedDate     = 'Closed date';
$lang->story->closedReason   = 'Closed reason';
$lang->story->rejectedReason = 'Reject reason';
$lang->story->reviewedBy     = 'Reviewed by';
$lang->story->reviewedDate   = 'Reviewed date';
$lang->story->version        = 'Version';
$lang->story->plan           = 'Plan';
$lang->story->planAB         = 'Plan';
$lang->story->comment        = 'Comment';
$lang->story->linkStories    = 'Related story';
$lang->story->childStories   = 'Child story';
$lang->story->duplicateStory = 'Duplicate story';
$lang->story->reviewResult   = 'Reviewed result';
$lang->story->preVersion     = 'Pre version';
$lang->story->keywords       = 'Keyword';
$lang->story->newStory       = 'Continue to add story.';
$lang->story->colorTag       = 'Color tag';
$lang->story->files          = 'Files';

$lang->story->ditto       = 'Ditto';
$lang->story->dittoNotice = 'Current story and story above it do not belong to same product!';

$lang->story->useList[0] = 'No use';
$lang->story->useList[1] = 'Use';

$lang->story->statusList['']          = '';
$lang->story->statusList['draft']     = 'Draft';
$lang->story->statusList['active']    = 'Active';
$lang->story->statusList['closed']    = 'Closed';
$lang->story->statusList['changed']   = 'Changed';

$lang->story->stageList['']           = '';
$lang->story->stageList['wait']       = 'Waitting';
$lang->story->stageList['planned']    = 'Planned';
$lang->story->stageList['projected']  = "{$lang->projectCommon}ed";
$lang->story->stageList['developing'] = 'Developing';
$lang->story->stageList['developed']  = 'Developed';
$lang->story->stageList['testing']    = 'Testing';
$lang->story->stageList['tested']     = 'Tested';
$lang->story->stageList['verified']   = 'Verified';
$lang->story->stageList['released']   = 'Released';

$lang->story->reasonList['']           = '';
$lang->story->reasonList['done']       = 'Done';
$lang->story->reasonList['subdivided'] = 'Subdivided';
$lang->story->reasonList['duplicate']  = 'Duplicate';
$lang->story->reasonList['postponed']  = 'Postponed';
$lang->story->reasonList['willnotdo']  = "Won't do";
$lang->story->reasonList['cancel']     = 'Canceled';
$lang->story->reasonList['bydesign']   = 'By design';
//$lang->story->reasonList['isbug']      = '是个Bug';

$lang->story->reviewResultList['']        = '';
$lang->story->reviewResultList['pass']    = 'Pass';
$lang->story->reviewResultList['revert']  = 'Revert';
$lang->story->reviewResultList['clarify'] = 'Clarify';
$lang->story->reviewResultList['reject']  = 'Reject';

$lang->story->reviewList[0] = 'No';
$lang->story->reviewList[1] = 'Yes';

$lang->story->sourceList['']           = '';
$lang->story->sourceList['customer']   = 'Customer';
$lang->story->sourceList['user']       = 'User';
$lang->story->sourceList['po']         = $lang->productCommon . ' Owner';
$lang->story->sourceList['market']     = 'Market';
$lang->story->sourceList['service']    = 'Customer service';
$lang->story->sourceList['competitor'] = 'Competitor';
$lang->story->sourceList['partner']    = 'Partner';
$lang->story->sourceList['dev']        = 'Developer';
$lang->story->sourceList['tester']     = 'Tester';
$lang->story->sourceList['bug']        = 'Bug';
$lang->story->sourceList['other']      = 'Other';

$lang->story->priList[]   = '';
$lang->story->priList[3]  = '3';
$lang->story->priList[1]  = '1';
$lang->story->priList[2]  = '2';
$lang->story->priList[4]  = '4';

$lang->story->legendBasicInfo      = 'Basic info';
$lang->story->legendLifeTime       = 'Life time';
$lang->story->legendRelated        = 'Related info';
$lang->story->legendMailto         = 'Maitto';
$lang->story->legendAttatch        = 'Files';
$lang->story->legendProjectAndTask = "{$lang->projectCommon} & task";
$lang->story->legendBugs           = 'Related Bug';
$lang->story->legendFromBug        = 'From Bug';
$lang->story->legendCases          = 'Related Case';
$lang->story->legendLinkStories    = 'Related story';
$lang->story->legendChildStories   = 'Child story';
$lang->story->legendSpec           = 'Spec';
$lang->story->legendVerify         = 'Verify standard';
$lang->story->legendMisc           = 'Misc';

$lang->story->lblChange            = 'Change';
$lang->story->lblReview            = 'Review';
$lang->story->lblActivate          = 'Activate';
$lang->story->lblClose             = 'Close';

$lang->story->checkAffection       = 'Check Affection';
$lang->story->affectedProjects     = "Affected {$lang->projectCommon}s";
$lang->story->affectedBugs         = 'Affected bugs';
$lang->story->affectedCases        = 'Affected cases';

$lang->story->specTemplate          = "Recommend template:：As <<i class='red'>a type of user</i>>,I want <<i class='red'>some goals</i>>,so that <<i class='red'>some reason</i>>.";
$lang->story->needNotReview         = "needn't review";
$lang->story->successSaved          = "Successfully saved";
$lang->story->confirmDelete         = "Are you sure to delete this story?";
$lang->story->errorEmptyChildStory  = '『Child story』can not be empty.';
$lang->story->mustChooseResult      = 'Must choose s result';
$lang->story->mustChoosePreVersion  = 'Must select an version to revert';

$lang->story->form = new stdclass();
$lang->story->form->area      = 'The story of their respective range';
$lang->story->form->desc      = 'Description and standards, what stories? How to acceptance?';
$lang->story->form->resource  = 'Allocation of resources, who completed? How long does it take?';
$lang->story->form->file      = 'Attachments, if the demand for related documents, please click here to upload.';

$lang->story->action = new stdclass();
$lang->story->action->reviewed            = array('main' => '$date, reviewed by <strong>$actor</strong>, result is <strong>$extra</strong>.', 'extra' => 'reviewResultList');
$lang->story->action->closed              = array('main' => '$date, closed by <strong>$actor</strong>, reason is <strong>$extra</strong> $appendLink.', 'extra' => 'reasonList');
$lang->story->action->linked2plan         = array('main' => '$date, linked to plan <strong>$extra</strong> by <strong>$actor</strong>.'); 
$lang->story->action->unlinkedfromplan    = array('main' => '$date, removed from <stong>$extra></strong> by <strong>$actor</strong>'); 
$lang->story->action->linked2project      = array('main' => '$date, linked to ' . $lang->projectCommon . ' <strong>$extra</strong> by <strong>$actor</strong>.'); 
$lang->story->action->unlinkedfromproject = array('main' => '$date, removed from ' . $lang->projectCommon . ' <strontg>$extra</strong> by <strong>$actor</strong>.');
$lang->story->action->linkrelatedstory    = array('main' => '$date, link related story <strong>$extra</strong> by <strong>$actor</strong>.');
$lang->story->action->subdividestory      = array('main' => '$date, subdivide to <strong>$extra</strong> by <strong>$actor</strong>.');
$lang->story->action->unlinkrelatedstory  = array('main' => '$date, unlink related story <strong>$extra</strong> by <strong>$actor</strong>.');
$lang->story->action->unlinkchildstory    = array('main' => '$date, unlink child story <strong>$extra</strong> by <strong>$actor</strong>.');

/* Report*/
$lang->story->report = new stdclass();
$lang->story->report->common = 'Report';
$lang->story->report->select = 'Select';
$lang->story->report->create = 'Create';
$lang->story->report->value  = 'Stories';

$lang->story->report->charts['storysPerProduct']        = "{$lang->productCommon} storys";
$lang->story->report->charts['storysPerModule']         = 'Module storys';
$lang->story->report->charts['storysPerSource']         = 'Source storys';
$lang->story->report->charts['storysPerPlan']           = 'Plan storys';
$lang->story->report->charts['storysPerStatus']         = 'Sotrys of status';
$lang->story->report->charts['storysPerStage']          = 'Storys of stage';
$lang->story->report->charts['storysPerPri']            = 'Storys of priority';
$lang->story->report->charts['storysPerEstimate']       = 'Storys of Estimate';
$lang->story->report->charts['storysPerOpenedBy']       = 'Opened by user';
$lang->story->report->charts['storysPerAssignedTo']     = 'Assigned to user';
$lang->story->report->charts['storysPerClosedReason']   = 'Storys for reason';
$lang->story->report->charts['storysPerChange']         = 'Story version';

$lang->story->report->options = new stdclass();
$lang->story->report->options->graph   = new stdclass();
$lang->story->report->options->type    = 'pie';
$lang->story->report->options->width   = 500;
$lang->story->report->options->height  = 140;

$lang->story->report->storysPerProduct      = new stdclass();     
$lang->story->report->storysPerModule       = new stdclass();
$lang->story->report->storysPerSource       = new stdclass();
$lang->story->report->storysPerPlan         = new stdclass();
$lang->story->report->storysPerStatus       = new stdclass();
$lang->story->report->storysPerStage        = new stdclass();
$lang->story->report->storysPerPri          = new stdclass();
$lang->story->report->storysPerOpenedBy     = new stdclass();
$lang->story->report->storysPerAssignedTo   = new stdclass();
$lang->story->report->storysPerClosedReason = new stdclass();
$lang->story->report->storysPerEstimate     = new stdclass();
$lang->story->report->storysPerChange       = new stdclass();

$lang->story->report->storysPerProduct->item      = $lang->productCommon;
$lang->story->report->storysPerModule->item       = 'Module';
$lang->story->report->storysPerSource->item       = 'Source';
$lang->story->report->storysPerPlan->item         = 'Plan';
$lang->story->report->storysPerStatus->item       = 'Status';
$lang->story->report->storysPerStage->item        = 'Stage';
$lang->story->report->storysPerPri->item          = 'Pri';
$lang->story->report->storysPerOpenedBy->item     = 'Account';
$lang->story->report->storysPerAssignedTo->item   = 'Account';
$lang->story->report->storysPerClosedReason->item = 'Reason';
$lang->story->report->storysPerEstimate->item     = 'Estimate';
$lang->story->report->storysPerChange->item       = 'Change';

$lang->story->report->storysPerProduct->graph      = new stdclass();     
$lang->story->report->storysPerModule->graph       = new stdclass();
$lang->story->report->storysPerSource->graph       = new stdclass();
$lang->story->report->storysPerPlan->graph         = new stdclass();
$lang->story->report->storysPerStatus->graph       = new stdclass();
$lang->story->report->storysPerStage->graph        = new stdclass();
$lang->story->report->storysPerPri->graph          = new stdclass();
$lang->story->report->storysPerOpenedBy->graph     = new stdclass();
$lang->story->report->storysPerAssignedTo->graph   = new stdclass();
$lang->story->report->storysPerClosedReason->graph = new stdclass();
$lang->story->report->storysPerEstimate->graph     = new stdclass();
$lang->story->report->storysPerChange->graph       = new stdclass();

$lang->story->report->storysPerProduct->graph->xAxisName      = $lang->productCommon;
$lang->story->report->storysPerModule->graph->xAxisName       = 'Module';
$lang->story->report->storysPerSource->graph->xAxisName       = 'Source';
$lang->story->report->storysPerPlan->graph->xAxisName         = 'Plan';
$lang->story->report->storysPerStatus->graph->xAxisName       = 'Status';
$lang->story->report->storysPerStage->graph->xAxisName        = 'Stage';
$lang->story->report->storysPerPri->graph->xAxisName          = 'Priority';
$lang->story->report->storysPerOpenedBy->graph->xAxisName     = 'Opened by';
$lang->story->report->storysPerAssignedTo->graph->xAxisName   = 'Assigned to';
$lang->story->report->storysPerClosedReason->graph->xAxisName = 'Closed reason';
$lang->story->report->storysPerEstimate->graph->xAxisName     = 'Estimate';
$lang->story->report->storysPerChange->graph->xAxisName       = 'Change';

$lang->story->placeholder = new stdclass();
$lang->story->placeholder->estimate = $lang->story->hour;

$lang->story->chosen = new stdClass();
$lang->story->chosen->reviewedBy = 'Choose users who review...';
