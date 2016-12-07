<?php
/**
 * The convert module zh-tw file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     convert
 * @version     $Id: zh-tw.php 4129 2013-01-18 01:58:14Z wwccss $
 * @link        http://www.zentao.net
 */
$lang->convert->common  = '從其他系統導入';
$lang->convert->index   = '首頁';

$lang->convert->start   = '開始轉換';
$lang->convert->desc    = <<<EOT
<p>歡迎使用系統轉換嚮導，本程序會幫助您將其他系統的數據轉換到禪道項目管理系統中。</p>
<strong>轉換存在一定的風險，轉換之前，我們強烈建議您備份資料庫及相應的數據檔案，並保證轉換的時候，沒有其他人進行操作。</strong>
EOT;

$lang->convert->setConfig      = '來源系統配置';
$lang->convert->setBugfree     = 'Bugfree配置';
$lang->convert->setRedmine     = 'Redmine配置';
$lang->convert->checkBugFree   = '檢查Bugfree';
$lang->convert->checkRedmine   = '檢查Redmine';
$lang->convert->convertRedmine = '轉換Redmine';
$lang->convert->convertBugFree = '轉換BugFree';

$lang->convert->selectSource     = '選擇來源系統及版本';
$lang->convert->mustSelectSource = "必須選擇一個來源。";

$lang->convert->direction             = "請選擇{$lang->projectCommon}問題轉換方向";
$lang->convert->questionTypeOfRedmine = 'Redmine中問題類型';
$lang->convert->aimTypeOfZentao       = '轉化為Zentao中的類型';

$lang->convert->directionList['bug']   = 'Bug';
$lang->convert->directionList['task']  = '任務';
$lang->convert->directionList['story'] = '需求';

$lang->convert->sourceList['BugFree'] = array('bugfree_1' => '1.x', 'bugfree_2' => '2.x');
$lang->convert->sourceList['Redmine'] = array('Redmine_1.1' => '1.1');

$lang->convert->setting     = '設置';
$lang->convert->checkConfig = '檢查配置';

$lang->convert->ok          = '<span class="text-success"><i class="icon-ok-sign"></i> 檢查通過</span>';
$lang->convert->fail        = '<span class="text-danger"><i class="icon-remove-sign"></i> 檢查失敗</span>';

$lang->convert->dbHost      = '資料庫伺服器';
$lang->convert->dbPort      = '伺服器連接埠';
$lang->convert->dbUser      = '資料庫用戶名';
$lang->convert->dbPassword  = '資料庫密碼';
$lang->convert->dbName      = '%s使用的庫';
$lang->convert->dbCharset   = '%s資料庫編碼';
$lang->convert->dbPrefix    = '%s表首碼';
$lang->convert->installPath = '%s安裝的根目錄';

$lang->convert->checkDB    = '資料庫';
$lang->convert->checkTable = '表';
$lang->convert->checkPath  = '安裝路徑';

$lang->convert->execute    = '執行轉換';
$lang->convert->item       = '轉換項';
$lang->convert->count      = '轉換數量';
$lang->convert->info       = '轉換信息';

$lang->convert->bugfree = new stdclass();
$lang->convert->bugfree->users    = '用戶';
$lang->convert->bugfree->projects = $lang->projectCommon;
$lang->convert->bugfree->modules  = '模組';
$lang->convert->bugfree->bugs     = 'Bug';
$lang->convert->bugfree->cases    = '測試用例';
$lang->convert->bugfree->results  = '測試結果';
$lang->convert->bugfree->actions  = '歷史記錄';
$lang->convert->bugfree->files    = '附件';

$lang->convert->redmine = new stdclass();
$lang->convert->redmine->users        = '用戶';
$lang->convert->redmine->groups       = '用戶分組';
$lang->convert->redmine->products     = $lang->productCommon;
$lang->convert->redmine->projects     = $lang->projectCommon;
$lang->convert->redmine->stories      = '需求';
$lang->convert->redmine->tasks        = '任務';
$lang->convert->redmine->bugs         = 'Bug';
$lang->convert->redmine->productPlans = $lang->productCommon . '計劃';
$lang->convert->redmine->teams        = '團隊';
$lang->convert->redmine->releases     = '發佈';
$lang->convert->redmine->builds       = 'Build';
$lang->convert->redmine->docLibs      = '文檔庫';
$lang->convert->redmine->docs         = '文檔';
$lang->convert->redmine->files        = '附件';

$lang->convert->errorFileNotExits  = '檔案 %s 不存在';
$lang->convert->errorUserExists    = '用戶 %s 已存在';
$lang->convert->errorGroupExists   = '分組 %s 已存在';
$lang->convert->errorBuildExists   = 'Build %s 已存在';
$lang->convert->errorReleaseExists = '發佈 %s 已存在';
$lang->convert->errorCopyFailed    = '檔案 %s 拷貝失敗';

$lang->convert->setParam = '請設置轉換參數';

$lang->convert->statusType = new stdclass();
$lang->convert->priType    = new stdclass();

$lang->convert->aimType           = '問題類型轉換';
$lang->convert->statusType->bug   = '狀態類型轉換(Bug狀態)';
$lang->convert->statusType->story = '狀態類型轉換(Story狀態)';
$lang->convert->statusType->task  = '狀態類型轉換(Task狀態)';
$lang->convert->priType->bug      = '優先順序類型轉換(Bug狀態)';
$lang->convert->priType->story    = '優先順序類型轉換(Story狀態)';
$lang->convert->priType->task     = '優先順序類型轉換(Task狀態)';

$lang->convert->issue = new stdclass();
$lang->convert->issue->redmine = 'Redmine';
$lang->convert->issue->zentao  = '禪道';
$lang->convert->issue->goto    = '轉換為';
