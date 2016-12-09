<?php
/**
 * The extension module en file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     extension
 * @version     $Id$
 * @link        http://www.zentao.net
 */
$lang->extension->common        = 'Extension';
$lang->extension->browse        = 'Browse';
$lang->extension->install       = 'Install';
$lang->extension->installAuto   = 'AutoInstall';
$lang->extension->installForce  = 'ForceInstall';
$lang->extension->uninstall     = 'Uninstall';
$lang->extension->activate      = 'Activate';
$lang->extension->deactivate    = 'Deactivate';
$lang->extension->obtain        = 'Obtain';
$lang->extension->view          = 'Info';
$lang->extension->downloadAB    = 'Down';
$lang->extension->upload        = 'Upload and install';
$lang->extension->erase         = 'Erase';
$lang->extension->upgrade       = 'Upgrade Extension';
$lang->extension->agreeLicense  = 'I agree the license';

$lang->extension->structure   = 'Structure';
$lang->extension->installed   = 'Installed';
$lang->extension->deactivated = 'Deactivated';
$lang->extension->available   = 'Downloaded';

$lang->extension->version     = 'Version';
$lang->extension->compatible  = 'Compatible';
$lang->extension->latest      = '<small>Latest:<strong><a href="%s" target="_blank" class="extension">%s</a></strong>，need zentao <a href="http://api.zentao.net/goto.php?item=latest" target="_blank"><strong>%s</strong></small>';
$lang->extension->author      = 'Author';
$lang->extension->license     = 'License';
$lang->extension->site        = 'Site';
$lang->extension->downloads   = 'Downloads';
$lang->extension->compatible  = 'Compatible';
$lang->extension->grade       = 'Grade';
$lang->extension->depends     = 'Depends';

$lang->extension->publicList[0] = 'Manually';
$lang->extension->publicList[1] = 'Auto';

$lang->extension->compatibleList[0] = 'Unknow';
$lang->extension->compatibleList[1] = 'Compatible';

$lang->extension->byDownloads   = 'Downloads';
$lang->extension->byAddedTime   = 'New added';
$lang->extension->byUpdatedTime = 'Last updated';
$lang->extension->bySearch      = 'Search';
$lang->extension->byCategory    = 'By Category';

$lang->extension->installFailed            = '%s failed, the reason is:';
$lang->extension->uninstallFailed          = 'Uninstall failed, the reason is:';
$lang->extension->confirmUninstall         = 'Uninstall will delete or modify database, whether to uninstall?';
$lang->extension->installFinished          = 'Good, the extension has been %s successfully.';
$lang->extension->refreshPage              = 'Refresh';
$lang->extension->uninstallFinished        = 'Extension has been successfully uninstalled.';
$lang->extension->deactivateFinished       = 'Extension has been successfully deactivated.';
$lang->extension->activateFinished         = 'Extension has been successfully activated.';
$lang->extension->eraseFinished            = 'Extension has been successfully erased.';
$lang->extension->unremovedFiles           = 'There are some unremoved files, you need remove them manually';
$lang->extension->executeCommands          = '<h3>Execute the following commands to fix them:</h3>';
$lang->extension->successDownloadedPackage = 'Successfully downloaded the package file.';
$lang->extension->successCopiedFiles       = 'Successfully copied files. ';
$lang->extension->successInstallDB         = 'Successfully installed database.';
$lang->extension->viewInstalled            = 'View installed extensions.';
$lang->extension->viewAvailable            = 'View available extensions';
$lang->extension->viewDeactivated          = 'View deactivated extensions';
$lang->extension->backDBFile               = 'Plug-related data has been backed up to %s file!';
$lang->extension->noticeOkFile             = "<h5>For security reason, system need to confirm you're administrator of zentao system.</h5>
    <h5>Please login into the zentao host and create the %s file.</h5>
    <p>Note:</p>
    <ol>
    <li>Keep the ok.txt content empty.</li>
    <li>If the file exists already, remove and recreate it again.</li>
    </ol>"; 

$lang->extension->upgradeExt     = 'Upgrade';
$lang->extension->installExt     = 'Install';
$lang->extension->upgradeVersion = '(Upgrade from %s to %s)';

$lang->extension->waring = 'Waring';

$lang->extension->errorOccurs                  = 'Error:';
$lang->extension->errorGetModules              = "Get extensions' categories data from the www.zentao.net failed. ";
$lang->extension->errorGetExtensions           = 'Get extensions from www.zentao.net failed. You can visit <a href="http://www.zentao.net/extension/" target="_blank">www.zentao.net</a> to find your extensions, download it manually and then upload to zentaopms to install it.';
$lang->extension->errorDownloadPathNotFound    = 'The save path of package file <strong>%s</strong>does not exists.<br />For linux users, can execute <strong>mkdir -p %s</strong> to fix it.';
$lang->extension->errorDownloadPathNotWritable = 'The save path of package file <strong>%s</strong>is not writable.<br />For linux users, can execute <strong>sudo chmod 777 %s</strong> to fix it.';
$lang->extension->errorPackageFileExists       = 'There is already a file with the same name <strong>%s</strong>.<h5> If you want to %s again, <a href="%s">please click this link</a>.</h5>';
$lang->extension->errorDownloadFailed          = 'Download failed, please try again. Or you can download it manually and upload it to install.';
$lang->extension->errorMd5Checking             = 'The downloawd files checking failed, Please download it manually and upload it to install';
$lang->extension->errorExtracted               = 'The package file <strong> %s </strong> extracted failed. The error is:<br />%s';
$lang->extension->errorCheckIncompatible       = 'This extenion is not compatible with current zentao version. <h3>You can <a href="%s">Force %s</a> or <a href="#" onclick=parent.location.href="%s">Cancel</a></h3>.';
$lang->extension->errorFileConflicted          = 'There are some files conflicted: <br />%s <h3>You can <a href="%s">Overide them</a> or <a href="#" onclick=parent.location.href="%s">Cancel</a></h3>.';
$lang->extension->errorPackageNotFound         = 'The package file <strong>%s </strong> not found, perhaps download failed, try again.';
$lang->extension->errorTargetPathNotWritable   = 'Target path <strong>%s </strong>not writable.';
$lang->extension->errorTargetPathNotExists     = 'Target path <strong>%s </strong>not exists';
$lang->extension->errorInstallDB               = 'Execute database sql failed, the error is: %s';
$lang->extension->errorConflicts               = 'With plug-in "%s" Conflict!';
$lang->extension->errorDepends                 = 'The following dependency plugin is not installed or the version is incorrect:<br /><br /> %s';
$lang->extension->errorIncompatible            = 'The plug-in with your ZenTao incompatible version';
$lang->extension->errorUninstallDepends        = 'Plugin "%s" relying on the plug-in, can not uninstall';
