<?php
/**
 * The convert module zh-cn file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     convert
 * @version     $Id: zh-cn.php 4129 2013-01-18 01:58:14Z wwccss $
 * @link        http://www.zentao.net
 */
$lang->convert->common  = '从其他系统导入';
$lang->convert->index   = '首页';

$lang->convert->start   = '开始转换';
$lang->convert->desc    = <<<EOT
<p>欢迎使用系统转换向导，本程序会帮助您将其他系统的数据转换到禅道项目管理系统中。</p>
<strong>转换存在一定的风险，转换之前，我们强烈建议您备份数据库及相应的数据文件，并保证转换的时候，没有其他人进行操作。</strong>
EOT;

$lang->convert->setConfig      = '来源系统配置';
$lang->convert->setBugfree     = 'Bugfree配置';
$lang->convert->setRedmine     = 'Redmine配置';
$lang->convert->checkBugFree   = '检查Bugfree';
$lang->convert->checkRedmine   = '检查Redmine';
$lang->convert->convertRedmine = '转换Redmine';
$lang->convert->convertBugFree = '转换BugFree';

$lang->convert->selectSource     = '选择来源系统及版本';
$lang->convert->mustSelectSource = "必须选择一个来源。";

$lang->convert->direction             = "请选择{$lang->projectCommon}问题转换方向";
$lang->convert->questionTypeOfRedmine = 'Redmine中问题类型';
$lang->convert->aimTypeOfZentao       = '转化为Zentao中的类型';

$lang->convert->directionList['bug']   = 'Bug';
$lang->convert->directionList['task']  = '任务';
$lang->convert->directionList['story'] = '需求';

$lang->convert->sourceList['BugFree'] = array('bugfree_1' => '1.x', 'bugfree_2' => '2.x');
$lang->convert->sourceList['Redmine'] = array('Redmine_1.1' => '1.1');

$lang->convert->setting     = '设置';
$lang->convert->checkConfig = '检查配置';

$lang->convert->ok          = '<span class="text-success"><i class="icon-ok-sign"></i> 检查通过</span>';
$lang->convert->fail        = '<span class="text-danger"><i class="icon-remove-sign"></i> 检查失败</span>';

$lang->convert->dbHost      = '数据库服务器';
$lang->convert->dbPort      = '服务器端口';
$lang->convert->dbUser      = '数据库用户名';
$lang->convert->dbPassword  = '数据库密码';
$lang->convert->dbName      = '%s使用的库';
$lang->convert->dbCharset   = '%s数据库编码';
$lang->convert->dbPrefix    = '%s表前缀';
$lang->convert->installPath = '%s安装的根目录';

$lang->convert->checkDB    = '数据库';
$lang->convert->checkTable = '表';
$lang->convert->checkPath  = '安装路径';

$lang->convert->execute    = '执行转换';
$lang->convert->item       = '转换项';
$lang->convert->count      = '转换数量';
$lang->convert->info       = '转换信息';

$lang->convert->bugfree = new stdclass();
$lang->convert->bugfree->users    = '用户';
$lang->convert->bugfree->projects = $lang->projectCommon;
$lang->convert->bugfree->modules  = '模块';
$lang->convert->bugfree->bugs     = 'Bug';
$lang->convert->bugfree->cases    = '测试用例';
$lang->convert->bugfree->results  = '测试结果';
$lang->convert->bugfree->actions  = '历史记录';
$lang->convert->bugfree->files    = '附件';

$lang->convert->redmine = new stdclass();
$lang->convert->redmine->users        = '用户';
$lang->convert->redmine->groups       = '用户分组';
$lang->convert->redmine->products     = $lang->productCommon;
$lang->convert->redmine->projects     = $lang->projectCommon;
$lang->convert->redmine->stories      = '需求';
$lang->convert->redmine->tasks        = '任务';
$lang->convert->redmine->bugs         = 'Bug';
$lang->convert->redmine->productPlans = $lang->productCommon . '计划';
$lang->convert->redmine->teams        = '团队';
$lang->convert->redmine->releases     = '发布';
$lang->convert->redmine->builds       = 'Build';
$lang->convert->redmine->docLibs      = '文档库';
$lang->convert->redmine->docs         = '文档';
$lang->convert->redmine->files        = '附件';

$lang->convert->errorFileNotExits  = '文件 %s 不存在';
$lang->convert->errorUserExists    = '用户 %s 已存在';
$lang->convert->errorGroupExists   = '分组 %s 已存在';
$lang->convert->errorBuildExists   = 'Build %s 已存在';
$lang->convert->errorReleaseExists = '发布 %s 已存在';
$lang->convert->errorCopyFailed    = '文件 %s 拷贝失败';

$lang->convert->setParam = '请设置转换参数';

$lang->convert->statusType = new stdclass();
$lang->convert->priType    = new stdclass();

$lang->convert->aimType           = '问题类型转换';
$lang->convert->statusType->bug   = '状态类型转换(Bug状态)';
$lang->convert->statusType->story = '状态类型转换(Story状态)';
$lang->convert->statusType->task  = '状态类型转换(Task状态)';
$lang->convert->priType->bug      = '优先级类型转换(Bug状态)';
$lang->convert->priType->story    = '优先级类型转换(Story状态)';
$lang->convert->priType->task     = '优先级类型转换(Task状态)';

$lang->convert->issue = new stdclass();
$lang->convert->issue->redmine = 'Redmine';
$lang->convert->issue->zentao  = '禅道';
$lang->convert->issue->goto    = '转换为';
