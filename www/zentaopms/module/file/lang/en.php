<?php
/**
 * The file module English file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     file
 * @version     $Id: en.php 4129 2013-01-18 01:58:14Z wwccss $
 * @link        http://www.zentao.net
 */
$lang->file = new stdclass();
$lang->file->common        = 'File';
$lang->file->uploadImages  = 'Upload images';
$lang->file->download      = 'Download';
$lang->file->edit          = 'Edit file name';
$lang->file->inputFileName = 'Input file name';
$lang->file->delete        = 'Delete';
$lang->file->label         = 'Title: ';
$lang->file->maxUploadSize = "<span class='red'>%s</span>";
$lang->file->applyTemplate = "Apply";
$lang->file->tplTitle      = "Title";
$lang->file->setPublic     = "Set public template";
$lang->file->exportFields  = "To export fields";
$lang->file->defaultTPL    = "Default template";
$lang->file->setExportTPL  = "Setting";

$lang->file->errorNotExists   = "<span class='red'>The directory '%s' is no exist</span>";
$lang->file->errorCanNotWrite = "<span class='red'>The directory '%s' is unwritable, please change it's permission. Command in linux:sudo -R chmod 777 '%s'</span>";
$lang->file->confirmDelete    = " Are you sure to delete this file?";
$lang->file->errorFileSize    = " The file size exceeds the limit, might not be able to upload!";
$lang->file->errorFileUpload  = " Failed to upload files, file size may exceed the limit!";
$lang->file->dangerFile       = " The file exists security risk, will be canceled upload!";
$lang->file->errorSuffix      = 'Compressed packet format error, can only upload zip!';
$lang->file->errorExtract     = 'Decompression failure! The file may have been damaged';
$lang->file->uploadImagesExplain = <<<EOD
<p>1. Upload file to contain pictures of zip package, the program will take the file name as a title, as content with pictures</p>
<p>2. The file name at the beginning contains 'digital+underline', generation of title will they ignore.</p>
<p>3、Image format : jpg|jpeg|gif|png.</p>
EOD;
