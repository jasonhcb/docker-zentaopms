<?php
/**
 * The doc module zh-tw file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     doc
 * @version     $Id: zh-tw.php 824 2010-05-02 15:32:06Z wwccss $
 * @link        http://www.zentao.net
 */
/* 欄位列表。*/
$lang->doc->common         = '文檔';
$lang->doc->id             = '文檔編號';
$lang->doc->product        = '所屬' . $lang->productCommon;
$lang->doc->project        = '所屬' . $lang->projectCommon;
$lang->doc->lib            = '所屬文檔庫';
$lang->doc->module         = '所屬分類';
$lang->doc->title          = '文檔標題';
$lang->doc->digest         = '文檔摘要';
$lang->doc->comment        = '文檔備註';
$lang->doc->type           = '文檔類型';
$lang->doc->content        = '文檔正文';
$lang->doc->keywords       = '關鍵字';
$lang->doc->url            = '文檔URL';
$lang->doc->files          = '附件';
$lang->doc->addedBy        = '由誰添加';
$lang->doc->addedDate      = '添加時間';
$lang->doc->editedBy       = '由誰編輯';
$lang->doc->editedDate     = '編輯時間';
$lang->doc->basicInfo      = '基本信息';
$lang->doc->deleted        = '已刪除';

$lang->doc->moduleDoc      = '按模組瀏覽';
$lang->doc->searchDoc      = '搜索';
//$lang->doc->allDoc         = '所有文檔';

/* 方法列表。*/
$lang->doc->index          = '首頁';
$lang->doc->create         = '創建文檔';
$lang->doc->edit           = '編輯文檔';
$lang->doc->delete         = '刪除文檔';
$lang->doc->browse         = '文檔列表';
$lang->doc->view           = '文檔詳情';
$lang->doc->manageType     = '維護分類';
$lang->doc->addType        = '增加分類';

$lang->doc->libName        = '文檔庫名稱';
$lang->doc->createLib      = '創建文檔庫';
$lang->doc->editLib        = '編輯文檔庫';
$lang->doc->deleteLib      = '刪除文檔庫';

/* 查詢條件列表 */
$lang->doc->allProduct     = '所有' . $lang->productCommon;
$lang->doc->allProject     = '所有' . $lang->projectCommon;

$lang->doc->systemLibs['product'] = $lang->productCommon . '文檔庫';
$lang->doc->systemLibs['project'] = $lang->projectCommon . '文檔庫';

$lang->doc->types['file'] = '檔案';
$lang->doc->types['url']  = '連結';
$lang->doc->types['text'] = '網頁';

$lang->doc->confirmDelete      = "您確定刪除該文檔嗎？";
$lang->doc->confirmDeleteLib   = "您確定刪除該文檔庫嗎？";
$lang->doc->errorEditSystemDoc = "系統文檔庫無需修改。";
$lang->doc->errorEmptyProduct  = "沒有{$lang->productCommon}，無法創建文檔";
$lang->doc->errorEmptyProject  = "沒有{$lang->projectCommon}，無法創建文檔";

$lang->doc->placeholder = new stdclass();
$lang->doc->placeholder->url = '相應的連結地址';
