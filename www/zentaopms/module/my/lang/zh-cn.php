<?php
$lang->my->common = '我的地盘';

/* 方法列表。*/
$lang->my->index          = '首页';
$lang->my->todo           = '我的待办';
$lang->my->task           = '我的任务';
$lang->my->bug            = '我的Bug';
$lang->my->testTask       = '我的版本';
$lang->my->testCase       = '我的用例';
$lang->my->story          = '我的需求';
$lang->my->myProject      = "我的{$lang->projectCommon}";
$lang->my->profile        = '我的档案';
$lang->my->dynamic        = '我的动态';
$lang->my->editProfile    = '修改档案';
$lang->my->changePassword = '修改密码';
$lang->my->unbind         = '解除然之绑定';
$lang->my->manageContacts = '维护联系人';
$lang->my->deleteContacts = '删除联系人';

$lang->my->taskMenu = new stdclass();
$lang->my->taskMenu->assignedToMe = '指派给我';
$lang->my->taskMenu->openedByMe   = '由我创建';
$lang->my->taskMenu->finishedByMe = '由我完成';
$lang->my->taskMenu->closedByMe   = '由我关闭';
$lang->my->taskMenu->canceledByMe = '由我取消';

$lang->my->storyMenu = new stdclass();
$lang->my->storyMenu->assignedToMe = '指派给我';
$lang->my->storyMenu->openedByMe   = '由我创建';
$lang->my->storyMenu->reviewedByMe = '由我评审';
$lang->my->storyMenu->closedByMe   = '由我关闭';

$lang->my->home = new stdclass();
$lang->my->home->latest        = '最新动态';
$lang->my->home->action        = "%s, %s <em>%s</em> %s <a href='%s'>%s</a>。";
$lang->my->home->projects      = $lang->projectCommon;
$lang->my->home->products      = $lang->productCommon;
$lang->my->home->createProject = "创建一个{$lang->projectCommon}";
$lang->my->home->createProduct = "创建一个{$lang->productCommon}";
$lang->my->home->help          = "<a href='http://www.zentao.net/help-read-79236.html' target='_blank'>帮助文档</a>";
$lang->my->home->noProductsTip = "这里还没有{$lang->productCommon}。";

$lang->my->form = new stdclass();
$lang->my->form->lblBasic   = '基本信息';
$lang->my->form->lblContact = '联系信息';
$lang->my->form->lblAccount = '帐号信息';
