<?php

$lang->block->bulletin      = '最新公告';

$lang->block->modules['common']->moreLinkList->bulletin = 'bulletin|browse|';

$lang->block->default['project']['1']['params']['type']    = 'doing';

$lang->block->default['my']['2']['title']  = '最新公告';
$lang->block->default['my']['2']['block']  = 'bulletin';
$lang->block->default['my']['2']['grid']   = 4;
$lang->block->default['my']['2']['source'] = '';
$lang->block->default['my']['10']['title']  = '最新动态';
$lang->block->default['my']['10']['block']  = 'dynamic';
$lang->block->default['my']['10']['grid']   = 4;
$lang->block->default['my']['10']['source'] = '';

$lang->block->flowchart   = array();
$lang->block->flowchart[] = array('管理员',   '维护公司', '添加用户', '维护权限', '发布公告');
$lang->block->flowchart[] = array('产品经理',  '维护模块', '维护计划', '维护需求', '创建发布');
$lang->block->flowchart[] = array('项目经理', '激活项目', '维护团队', '关联产品', '关联需求', '分解任务');
$lang->block->flowchart[] = array('研发人员', '领取任务和Bug', '更新状态', '完成任务和Bug');
$lang->block->flowchart[] = array('测试人员', '撰写用例', '执行用例', '提交Bug', '验证Bug', '关闭Bug');