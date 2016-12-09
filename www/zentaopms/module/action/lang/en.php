<?php
/**
 * The action module English file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     action
 * @version     $Id: en.php 4729 2013-05-03 07:53:55Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
$lang->action->common     = 'Logs';
$lang->action->product    = $lang->productCommon;
$lang->action->project    = $lang->projectCommon;
$lang->action->objectType = 'Object';
$lang->action->objectID   = 'ID';
$lang->action->objectName = 'Name';
$lang->action->actor      = 'Actor';
$lang->action->action     = 'Action';
$lang->action->date       = 'Date';

$lang->action->trash       = 'Trash';
$lang->action->undelete    = 'Undelete';
$lang->action->hideOne     = 'Hide';
$lang->action->hideAll     = 'Hide all';
$lang->action->editComment = 'Edit comment';

$lang->action->trashTips      = "Tips:The deleting actions in zentao are all logic";
$lang->action->textDiff       = 'Text mode';
$lang->action->original       = 'Original content';
$lang->action->confirmHideAll = 'Are you sure you hide these records?';
$lang->action->needEdit       = 'To restore the %s name or code already exists, please change the editor.';

$lang->action->dynamic = new stdclass();
$lang->action->dynamic->today      = 'Today';
$lang->action->dynamic->yesterday  = 'Yesterday';
$lang->action->dynamic->twoDaysAgo = 'Two days ago';
$lang->action->dynamic->thisWeek   = 'This week';
$lang->action->dynamic->lastWeek   = 'Last week';
$lang->action->dynamic->thisMonth  = 'This month';
$lang->action->dynamic->lastMonth  = 'Last month';
$lang->action->dynamic->all        = 'All';
$lang->action->dynamic->hidden     = 'Hidden';
$lang->action->dynamic->search     = 'Search';

$lang->action->objectTypes['product']     = $lang->productCommon;
$lang->action->objectTypes['story']       = 'Story';
$lang->action->objectTypes['productplan'] = 'Plan';
$lang->action->objectTypes['release']     = 'Release';
$lang->action->objectTypes['project']     = $lang->projectCommon;
$lang->action->objectTypes['task']        = 'Task';
$lang->action->objectTypes['build']       = 'Build';
$lang->action->objectTypes['bug']         = 'Bug';
$lang->action->objectTypes['case']        = 'Case';
$lang->action->objectTypes['caseresult']  = 'Case Result';
$lang->action->objectTypes['stepresult']  = 'Step Result';
$lang->action->objectTypes['testtask']    = 'Test Task';
$lang->action->objectTypes['user']        = 'User';
$lang->action->objectTypes['doc']         = 'Doc';
$lang->action->objectTypes['doclib']      = 'DocLib';
$lang->action->objectTypes['todo']        = 'Todo';
$lang->action->objectTypes['branch']      = 'Branch';

/* The desc of actions. */
$lang->action->desc = new stdclass();
$lang->action->desc->common         = '$date, <strong>$action</strong> by <strong>$actor</strong>.';
$lang->action->desc->extra          = '$date, <strong>$action</strong> as <strong>$extra</strong> by <strong>$actor</strong>.';
$lang->action->desc->opened         = '$date, opened by <strong>$actor</strong>.';
$lang->action->desc->created        = '$date, created by <strong>$actor</strong>.';
$lang->action->desc->changed        = '$date, changed by <strong>$actor</strong>.';
$lang->action->desc->edited         = '$date, edited by <strong>$actor</strong>.';
$lang->action->desc->assigned       = '$date, <strong>$actor</strong> assigned task to <strong>$extra</strong>.' . "\n";
$lang->action->desc->closed         = '$date, closed by <strong>$actor</strong>.';
$lang->action->desc->deleted        = '$date, deleted by <strong>$actor</strong>.';
$lang->action->desc->deletedfile    = '$date, deleted file by <strong>$actor</strong>, the file is <strong><i>$extra</i></strong>.';
$lang->action->desc->editfile       = '$date, edit file by <strong>$actor</strong>, the file is <strong><i>$extra</i></strong>.';
$lang->action->desc->erased         = '$date, erased by <strong>$actor</strong>.';
$lang->action->desc->undeleted      = '$date, restored by <strong>$actor</strong>.';
$lang->action->desc->hidden         = '$date, hidden by <strong>$actor</strong>.';
$lang->action->desc->commented      = '$date, commented by <strong>$actor</strong>.';
$lang->action->desc->activated      = '$date, activated by <strong>$actor</strong>.';
$lang->action->desc->moved          = '$date, moved by <strong>$actor</strong>, previouse is "$extra".';
$lang->action->desc->confirmed      = '$date, confirmed by <strong>$actor</strong>, version is<strong>#$extra</strong>.';
$lang->action->desc->caseconfirmed  = '$date, confirmed by <strong>$actor</strong>, version is<strong>#$extra</strong>.';
$lang->action->desc->bugconfirmed   = '$date, confirmed by <strong>$actor</strong>.';
$lang->action->desc->frombug        = '$date, from Bug by <strong>$actor</strong> BugID:<strong>$extra</strong>.';
$lang->action->desc->started        = '$date, started by <strong>$actor</strong>.';
$lang->action->desc->restarted      = '$date, continued by <strong>$actor</strong>' . "\n";
$lang->action->desc->delayed        = '$date, delayed by <strong>$actor</strong>.';
$lang->action->desc->suspended      = '$date, suspended by <strong>$actor</strong>.';
$lang->action->desc->recordestimate = '$date, <strong>$actor</strong> recorded <strong>$extra</strong> hours.';
$lang->action->desc->editestimate   = '$date, <strong>$actor</strong> edited working hours';
$lang->action->desc->deleteestimate = '$date, <strong>$actor</strong> deleted working hours'; 
$lang->action->desc->canceled       = '$date, canceled by <strong>$actor</strong>.';
$lang->action->desc->svncommited    = '$date, <strong>$actor</strong> commited to svn，revision is <strong>#$extra</strong>.' . "\n";
$lang->action->desc->gitcommited    = '$date, <strong>$actor</strong> commited to git，revision is <strong>#$extra</strong>.' . "\n";
$lang->action->desc->finished       = '$date, finished by <strong>$actor</strong>.';
$lang->action->desc->paused         = '$date, paused by <strong>$actor</strong>.';
$lang->action->desc->diff1          = 'changed <strong><i>%s</i></strong>, old is "%s", new is "%s".<br />';
$lang->action->desc->diff2          = 'changed <strong><i>%s</i></strong>, the diff is:' . "\n" . "<blockquote>%s</blockquote>" . "\n<div class='hidden'>%s</div>";
$lang->action->desc->diff3          = "changed file's name %s to %s.";

/* The desc of actions for link and unlink related case. */
$lang->action->desc->linkrelatedcase   = '$date, linked related case <strong>$extra</strong> by <strong>$actor</strong>.' . "\n";
$lang->action->desc->unlinkrelatedcase = '$date, unlinked related case <strong>$extra</strong> by <strong>$actor</strong>.' . "\n";

/* The action labels. */
$lang->action->label = new stdclass();
$lang->action->label->created             = 'created';
$lang->action->label->opened              = 'opened';
$lang->action->label->changed             = 'changed';
$lang->action->label->edited              = 'edited';
$lang->action->label->assigned            = 'assigned';
$lang->action->label->closed              = 'closed';
$lang->action->label->deleted             = 'deleted';
$lang->action->label->deletedfile         = 'deleted file';
$lang->action->label->editfile            = 'edit file name';
$lang->action->label->erased              = 'deleted';
$lang->action->label->undeleted           = 'restore';
$lang->action->label->hidden              = 'hidden';
$lang->action->label->commented           = 'commented';
$lang->action->label->activated           = 'activated';
$lang->action->label->resolved            = 'resolved';
$lang->action->label->reviewed            = 'reviewed';
$lang->action->label->moved               = 'moved';
$lang->action->label->confirmed           = 'confirmed,';
$lang->action->label->bugconfirmed        = 'confirmed';
$lang->action->label->tostory             = 'converted to story';
$lang->action->label->frombug             = 'converted from bug';
$lang->action->label->totask              = 'converted to task';
$lang->action->label->svncommited         = 'commited code';
$lang->action->label->gitcommited         = 'commited code';
$lang->action->label->linked2plan         = 'link to plan';
$lang->action->label->unlinkedfromplan    = 'unlink from plan';
$lang->action->label->changestatus        = 'change status';
$lang->action->label->marked              = 'edited';
$lang->action->label->linked2project      = "link to {$lang->projectCommon}";
$lang->action->label->unlinkedfromproject = "unlik from {$lang->projectCommon}";
$lang->action->label->linkrelatedbug      = "linked related Bug";
$lang->action->label->unlinkrelatedbug    = "unlinked related Bug";
$lang->action->label->linkrelatedcase     = "linked related case";
$lang->action->label->unlinkrelatedcase   = "unlinked related case";
$lang->action->label->linkrelatedstory    = "linked related story";
$lang->action->label->unlinkrelatedstory  = "unlinked related story";
$lang->action->label->subdividestory      = "subdivided story";
$lang->action->label->unlinkchildstory    = "unlinked child story";
$lang->action->label->started             = 'started';
$lang->action->label->restarted           = 'continued';
$lang->action->label->recordestimate      = 'Hours';
$lang->action->label->editestimate        = 'edit hour';
$lang->action->label->canceled            = 'canceled';
$lang->action->label->finished            = 'finished';
$lang->action->label->paused              = 'paused';
$lang->action->label->delayed             = 'delayed';
$lang->action->label->suspended           = 'suspended';
$lang->action->label->login               = 'login';
$lang->action->label->logout              = "logout";
$lang->action->label->deleteestimate      = "delete estimate";

/* Link of every action. */
$lang->action->label->product     = $lang->productCommon . '|product|view|productID=%s';
$lang->action->label->productplan = 'plan|productplan|view|productID=%s';
$lang->action->label->release     = 'release|release|view|productID=%s';
$lang->action->label->story       = 'story|story|view|storyID=%s';
$lang->action->label->project     = $lang->projectCommon . '|project|view|projectID=%s';
$lang->action->label->task        = 'task|task|view|taskID=%s';
$lang->action->label->build       = 'build|build|view|buildID=%s';
$lang->action->label->bug         = 'bug|bug|view|bugID=%s';
$lang->action->label->case        = 'case|testcase|view|caseID=%s';
$lang->action->label->testtask    = 'test task|testtask|view|caseID=%s';
$lang->action->label->todo        = 'todo|todo|view|todoID=%s';
$lang->action->label->doclib      = 'doc library|doc|browse|libID=%s';
$lang->action->label->doc         = 'doc|doc|view|docID=%s';
$lang->action->label->user        = 'user';
$lang->action->label->space       = ' ';

/* Object type. */
$lang->action->search->objectTypeList['']            = '';    
$lang->action->search->objectTypeList['product']     = $lang->productCommon;
$lang->action->search->objectTypeList['project']     = $lang->projectCommon;
$lang->action->search->objectTypeList['bug']         = 'bug';
$lang->action->search->objectTypeList['case']        = 'case';
$lang->action->search->objectTypeList['caseresult']  = 'case result';
$lang->action->search->objectTypeList['stepresult']  = 'step result';
$lang->action->search->objectTypeList['story']       = 'story';
$lang->action->search->objectTypeList['task']        = 'task';
$lang->action->search->objectTypeList['testtask']    = 'testtask';
$lang->action->search->objectTypeList['user']        = 'user';
$lang->action->search->objectTypeList['doc']         = 'doc';
$lang->action->search->objectTypeList['doclib']      = 'doclib';
$lang->action->search->objectTypeList['todo']        = 'todo';
$lang->action->search->objectTypeList['build']       = 'build';
$lang->action->search->objectTypeList['release']     = 'release';
$lang->action->search->objectTypeList['productplan'] = 'plan';
$lang->action->search->objectTypeList['branch']      = 'branch';

/* Display action for search. */
$lang->action->search->label['']                    = '';
$lang->action->search->label['created']             = $lang->action->label->created;
$lang->action->search->label['opened']              = $lang->action->label->opened;
$lang->action->search->label['changed']             = $lang->action->label->changed;
$lang->action->search->label['edited']              = $lang->action->label->edited;
$lang->action->search->label['assigned']            = $lang->action->label->assigned;
$lang->action->search->label['closed']              = $lang->action->label->closed;
$lang->action->search->label['deleted']             = $lang->action->label->deleted;
$lang->action->search->label['deletedfile']         = $lang->action->label->deletedfile;
$lang->action->search->label['editfile']            = $lang->action->label->editfile;
$lang->action->search->label['erased']              = $lang->action->label->erased;
$lang->action->search->label['undeleted']           = $lang->action->label->undeleted;
$lang->action->search->label['hidden']              = $lang->action->label->hidden;
$lang->action->search->label['commented']           = $lang->action->label->commented;
$lang->action->search->label['activated']           = $lang->action->label->activated;
$lang->action->search->label['resolved']            = $lang->action->label->resolved;
$lang->action->search->label['reviewed']            = $lang->action->label->reviewed;
$lang->action->search->label['moved']               = $lang->action->label->moved;
$lang->action->search->label['confirmed']           = $lang->action->label->confirmed;
$lang->action->search->label['bugconfirmed']        = $lang->action->label->bugconfirmed;
$lang->action->search->label['tostory']             = $lang->action->label->tostory;
$lang->action->search->label['frombug']             = $lang->action->label->frombug;
$lang->action->search->label['totask']              = $lang->action->label->totask;
$lang->action->search->label['svncommited']         = $lang->action->label->svncommited;
$lang->action->search->label['gitcommited']         = $lang->action->label->gitcommited;
$lang->action->search->label['linked2plan']         = $lang->action->label->linked2plan;
$lang->action->search->label['unlinkedfromplan']    = $lang->action->label->unlinkedfromplan;
$lang->action->search->label['changestatus']        = $lang->action->label->changestatus;
$lang->action->search->label['marked']              = $lang->action->label->marked;
$lang->action->search->label['linked2project']      = $lang->action->label->linked2project;
$lang->action->search->label['unlinkedfromproject'] = $lang->action->label->unlinkedfromproject;
$lang->action->search->label['started']             = $lang->action->label->started;
$lang->action->search->label['restarted']           = $lang->action->label->restarted;
$lang->action->search->label['recordestimate']      = $lang->action->label->recordestimate;
$lang->action->search->label['editestimate']        = $lang->action->label->editestimate;
$lang->action->search->label['canceled']            = $lang->action->label->canceled;
$lang->action->search->label['finished']            = $lang->action->label->finished;
$lang->action->search->label['paused']              = $lang->action->label->paused;
$lang->action->search->label['login']               = $lang->action->label->login;
$lang->action->search->label['logout']              = $lang->action->label->logout;
