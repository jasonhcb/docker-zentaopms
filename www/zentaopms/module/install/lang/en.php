<?php
/**
 * The install module English file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     install
 * @version     $Id: en.php 4972 2013-07-02 06:50:10Z zhujinyonging@gmail.com $
 * @link        http://www.zentao.net
 */
$lang->install = new stdclass();

$lang->install->common  = 'Install';
$lang->install->next    = 'Next';
$lang->install->pre     = 'Back';
$lang->install->reload  = 'Reload';
$lang->install->error   = 'Error ';

$lang->install->start            = 'Start install';
$lang->install->keepInstalling   = 'Keep install this version';
$lang->install->seeLatestRelease = 'See the latest release.';
$lang->install->welcome          = 'Welcome to use ZenTaoPMS.';
$lang->install->license          = 'ZentaoPMS use license of Z PUBLIC LICENSE(ZPL) 1.2';
$lang->install->desc             = <<<EOT
ZenTaoPMS is an opensource project management software licensed under <a href='http://zpl.pub' target='_blank'>ZPL</a>. It has product manage, project mange, testing mange features, also with organization manage and affair manage.

ZenTaoPMS is developped by PHH and mysql under the zentaophp framework developped by the same team. Through the framework, ZenTaoPMS can be customed and extended very easily.
EOT;
$lang->install->links = <<<EOT
ZenTaoPMS is developped by <strong class='red'><a href='http://www.cnezsoft.com' target='_blank'>Nature EasySoft Network Tecnology Co.ltd, QingDao, China</a></strong>。
The official website of ZenTaoPMS is <a href='http://en.zentao.net' target='_blank'>http://en.zentao.net</a>
twitter:zentaopms


The version of current release is <strong class='red'>%s</strong>。
EOT;

$lang->install->newReleased= "<strong class='red'>Notice</strong>：There is a new version <strong class='red'>%s</strong>, released on %s。";
$lang->install->or         = 'or';
$lang->install->checking   = 'System checking';
$lang->install->ok         = 'OK(√)';
$lang->install->fail       = 'Failed(×)';
$lang->install->loaded     = 'Loaded';
$lang->install->unloaded   = 'Not loaded';
$lang->install->exists     = 'Exists ';
$lang->install->notExists  = 'Not exists ';
$lang->install->writable   = 'Writable ';
$lang->install->notWritable= 'Not writable ';
$lang->install->phpINI     = 'PHP ini file';
$lang->install->checkItem  = 'Items';
$lang->install->current    = 'Current';
$lang->install->result     = 'Result';
$lang->install->action     = 'How to fix';

$lang->install->phpVersion = 'PHP version';
$lang->install->phpFail    = 'Must > 5.2.0';

$lang->install->pdo          = 'PDO extension';
$lang->install->pdoFail      = 'Edit the php.ini file to load PDO extsion.';
$lang->install->pdoMySQL     = 'PDO_MySQL extension';
$lang->install->pdoMySQLFail = 'Edit the php.ini file to load PDO_MySQL extsion.';
$lang->install->json         = 'JSON extension';
$lang->install->jsonFail     = 'Edit the php.ini file to load JSON extension';
$lang->install->tmpRoot      = 'Temp directory';
$lang->install->dataRoot     = 'Upload directory.';
$lang->install->session      = 'Session save path';
$lang->install->sessionFail  = 'Edit the php.ini file to set session.save_path';
$lang->install->mkdir        = '<p>Should creat the directory %s。<br /> Under linux, can try<br /> mkdir -p %s</p>';
$lang->install->chmod        = 'Should change the permission of "%s".<br />Under linux, can try<br />chmod o=rwx -R %s';

$lang->install->defaultLang    = 'Default Language';
$lang->install->dbHost         = 'Database host';
$lang->install->dbHostNote     = 'If 127.0.0.1 can not connect, try localhost';
$lang->install->dbPort         = 'Host port';
$lang->install->dbUser         = 'Database user';
$lang->install->dbPassword     = 'Database password';
$lang->install->dbName         = 'Database name';
$lang->install->dbPrefix       = 'Table prefix';
$lang->install->clearDB        = 'Clear data if database exists.';
$lang->install->importDemoData = 'Import demo data if database exists.';

$lang->install->requestTypes['GET']       = 'GET';
$lang->install->requestTypes['PATH_INFO'] = 'PATH_INFO';

$lang->install->errorConnectDB      = 'Database connect failed.';
$lang->install->errorDBName         = 'The database name cannot contain "."';
$lang->install->errorCreateDB       = 'Database create failed.';
$lang->install->errorTableExists    = 'The same tables alread exists, to continue install, go back and check the clear db box.';
$lang->install->errorCreateTable    = 'Table create failed.';
$lang->install->errorImportDemoData = 'Import demo data.';

$lang->install->setConfig  = 'Create config file';
$lang->install->key        = 'Item';
$lang->install->value      = 'Value';
$lang->install->saveConfig = 'Save config';
$lang->install->save2File  = '<div class="alert alert-warning">Copy the text of the textareaand save to "<strong> %s </strong>".</div>';
$lang->install->saved2File = 'The config file has saved to "<strong>%s</strong> ".';
$lang->install->errorNotSaveConfig = "Hasn't save the config file. ";

$lang->install->getPriv  = 'Set admin';
$lang->install->company  = 'Company name';
$lang->install->account  = 'Administrator';
$lang->install->password = 'Admin password';
$lang->install->errorEmptyPassword = "Can't be empty";

$lang->install->groupList['ADMIN']['name']  = 'Administrator';
$lang->install->groupList['ADMIN']['desc']  = 'for administrator';
$lang->install->groupList['DEV']['name']    = 'Developer';
$lang->install->groupList['DEV']['desc']    = 'for developers';
$lang->install->groupList['QA']['name']     = 'tester';
$lang->install->groupList['QA']['desc']     = 'for testers';
$lang->install->groupList['PM']['name']     = 'Project manager';
$lang->install->groupList['PM']['desc']     = 'for project managers';
$lang->install->groupList['PO']['name']     = 'Product manager';
$lang->install->groupList['PO']['desc']     = 'for product managers';
$lang->install->groupList['TD']['name']     = 'Technical director';
$lang->install->groupList['TD']['desc']     = 'for technical director';
$lang->install->groupList['PD']['name']     = 'Product director';
$lang->install->groupList['PD']['desc']     = 'for product director';
$lang->install->groupList['QD']['name']     = 'Quality director';
$lang->install->groupList['QD']['desc']     = 'for quality director';
$lang->install->groupList['TOP']['name']    = 'Top manager';
$lang->install->groupList['TOP']['desc']    = 'for top manager';
$lang->install->groupList['OTHERS']['name'] = 'Others';
$lang->install->groupList['OTHERS']['desc'] = 'for others';

$lang->install->success  = "Success installed";
$lang->install->login    = 'Sign into ZentaoPMS';
$lang->install->register = 'Register Zentao community website';

$lang->install->joinZentao = <<<EOT
<p>You have installed ZentaoPMS %s successfully. <strong class='red'>Please remove install.php in time</strong>.</p>
<i>Tips: For you get zentao news in time, please register Zetao community(<a href='http://www.zentao.net' target='_blank'>www.zentao.net</a>).</i> 
EOT;

$lang->install->promotion = "Other products of Nature EasySoft: ";
$lang->install->chanzhi   = new stdclass();
$lang->install->chanzhi->name = '蝉知企业门户系统';
$lang->install->chanzhi->desc = <<<EOD
<ul>
  <li>专业的企业营销门户系统</li>
  <li>功能丰富，操作简洁方便</li>
  <li>大量细节针对SEO优化</li>
  <li>开源免费，不限商用！</li>
</ul>
EOD;
$lang->install->ranzhi = new stdclass();
$lang->install->ranzhi->name = '然之协同管理系统';
$lang->install->ranzhi->desc = <<<EOD
<ul>
  <li>客户管理，订单跟踪</li>
  <li>项目任务，公告文档</li>
  <li>收入支出，出帐入账</li>
  <li>论坛博客，动态消息</li>
</ul>
EOD;
$lang->install->yidou = new stdclass();
$lang->install->yidou->name = '亿斗进销存管理运营系统';
$lang->install->yidou->desc = <<<EOD
<ul>
  <li>销售订单处理，信息及时反馈</li>
  <li>采销业务状况，时时查询跟进</li>
  <li>仓储配货送货，轻松便利快捷</li>
  <li>财务收款付款，简单实用准确</li>
</ul>
EOD;
