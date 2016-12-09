<?php
$lang->manual  = new stdclass();

// $lang->manual->title     = '浏览手册';
// $lang->manual->create    = '创建手册';
$lang->manual->content   = '手册正文';
$lang->manual->name      = '手册名称';
$lang->manual->error     = '出错了，请重试';

$lang->manual->manualName  = '手册名称';
$lang->manual->creater  = '作者';
$lang->manual->time  = '创建时间';
// $lang->manual->delete ='删除手册';
// $lang->manual->edit ='编辑手册';
$lang->manual->confirmDelete      = "您确定删除该手册吗？";
$lang->manual->hand = '汉得信息';
$lang->manual->msg = '请输入手册名称';

$lang->manual->createTime ='添加时间';
$lang->manual->lastEdit ='最后编辑';
$lang->manual->yu ='于';
$lang->manual->search ='页内查找';
$lang->manual->placeholder ='请输入搜索内容';

$lang->manual->common             = '手册';
$lang->manual->index             = '首页';
$lang->manual->browse             = '浏览手册';
$lang->manual->create             = '创建手册';
$lang->manual->view             = '查看手册';
$lang->manual->edit               = '编辑手册';
$lang->manual->delete             = '删除手册';

$lang->manual->menu =new stdclass();
$lang->manual->menu->name    = array('link' => '%s' . $lang->arrow, 'fixed' => true);
$lang->manual->menu->browse  = array('link' => '手册|manual|browse', 'alias' => 'create,edit');
