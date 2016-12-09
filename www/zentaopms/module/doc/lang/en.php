<?php
/**
 * The doc module english file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     doc
 * @version     $Id: en.php 824 2010-05-02 15:32:06Z wwccss $
 * @link        http://www.zentao.net
 */
/* Fields. */
$lang->doc->common         = 'Doc';
$lang->doc->id             = 'ID';
$lang->doc->product        = $lang->productCommon;
$lang->doc->project        = $lang->projectCommon;
$lang->doc->lib            = 'Library';
$lang->doc->module         = 'Module';
$lang->doc->title          = 'Title';
$lang->doc->digest         = 'Digest';
$lang->doc->comment        = 'Comment';
$lang->doc->type           = 'Type';
$lang->doc->content        = 'Content';
$lang->doc->keywords       = 'Keywords';
$lang->doc->url            = 'URL';
$lang->doc->files          = 'File';
$lang->doc->addedBy        = 'Added by';
$lang->doc->addedDate      = 'Added date';
$lang->doc->editedBy       = 'Edited by';
$lang->doc->editedDate     = 'Edited date';
$lang->doc->basicInfo      = 'Basic Info';
$lang->doc->deleted        = 'Deleted';

$lang->doc->moduleDoc      = 'By module';
$lang->doc->searchDoc      = 'By search';
//$lang->doc->allDoc         = 'All document';

/* Actions. */
$lang->doc->index          = 'Index';
$lang->doc->create         = 'Create doc';
$lang->doc->edit           = 'Edit doc';
$lang->doc->delete         = 'Delete doc';
$lang->doc->browse         = 'Browse doc';
$lang->doc->view           = 'View doc';
$lang->doc->manageType     = 'Manage type';
$lang->doc->addType        = 'Add type';

$lang->doc->libName        = 'Library name';
$lang->doc->createLib      = 'Create library';
$lang->doc->editLib        = 'Edit library';
$lang->doc->deleteLib      = 'Delete library';

/* Browse tabs. */
$lang->doc->allProduct     = "All {$lang->productCommon}s";
$lang->doc->allProject     = "All {$lang->projectCommon}s";

$lang->doc->systemLibs['product'] = "{$lang->productCommon} doc";
$lang->doc->systemLibs['project'] = "{$lang->projectCommon} doc";

$lang->doc->types['file'] = 'File';
$lang->doc->types['url']  = 'Link';
$lang->doc->types['text'] = 'Html';

$lang->doc->confirmDelete      = "Are you sure to delete this doc?";
$lang->doc->confirmDeleteLib   = " Are you sure to delete this doc library?";
$lang->doc->errorEditSystemDoc = "System doc library needn't edit";
$lang->doc->errorEmptyProduct  = "{$lang->productCommon} is empty, can not create doc.";
$lang->doc->errorEmptyProject  = "{$lang->projectCommon} is empty, can not create doc.";

$lang->doc->placeholder = new stdclass();
$lang->doc->placeholder->url = 'url';
