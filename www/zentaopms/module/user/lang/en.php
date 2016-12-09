<?php
/**
 * The user module English file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     user
 * @version     $Id: en.php 5053 2013-07-06 08:17:37Z wyd621@gmail.com $
 * @link        http://www.zentao.net
 */
$lang->user->common      = 'User';
$lang->user->id          = 'ID';
$lang->user->company     = 'Company';
$lang->user->dept        = 'Department';
$lang->user->account     = 'Account';
$lang->user->password    = 'Password';
$lang->user->password2   = 'Repeat password';
$lang->user->role        = 'Role';
$lang->user->group       = 'Group';
$lang->user->realname    = 'Fullname';
$lang->user->nickname    = 'Nickname';
$lang->user->commiter    = 'Commit account';
$lang->user->birthyear   = 'Birth year';
$lang->user->gender      = 'Gender';
$lang->user->email       = 'Email';
$lang->user->basicInfo   = 'Basic info';
$lang->user->accountInfo = 'Account info';
$lang->user->verify      = 'Safety verification';
$lang->user->contactInfo = 'Contact info';
$lang->user->skype       = 'Skype';
$lang->user->qq          = 'QQ';
$lang->user->yahoo       = 'Yahoo!';
$lang->user->gtalk       = 'GTalk';
$lang->user->wangwang    = 'Wangwang';
$lang->user->mobile      = 'Mobile';
$lang->user->phone       = 'Phone';
$lang->user->address     = 'Address';
$lang->user->zipcode     = 'Zipcode';
$lang->user->join        = 'Join date';
$lang->user->visits      = 'Visits';
$lang->user->ip          = 'Last IP';
$lang->user->last        = 'Last login';
$lang->user->ranzhi      = 'Ranzhi account';
$lang->user->ditto       = 'Ditto';
$lang->user->originalPassword = 'Original password';
$lang->user->verifyPassword   = 'Enter your password';
$lang->user->resetPassword    = 'Reset password';

$lang->user->index           = "Index";
$lang->user->view            = "Info";
$lang->user->create          = "Add";
$lang->user->batchCreate     = "Batch add user";
$lang->user->edit            = "Edit";
$lang->user->batchEdit       = "Batch Edit";
$lang->user->unlock          = "Unlock";
$lang->user->delete          = "Delete";
$lang->user->unbind          = "Unbind ranzhi";
$lang->user->login           = "Login";
$lang->user->mobileLogin     = "Mobile";
$lang->user->editProfile     = "Edit profile";
$lang->user->deny            = "Denied";
$lang->user->confirmDelete   = "Are you sure to delete this user?";
$lang->user->confirmUnlock   = "Are you sure to unlock this user?";
$lang->user->confirmUnbind   = "Are you sure to unbind this user to ranzhi?";
$lang->user->relogin         = "Relogin";
$lang->user->asGuest         = "Guest";
$lang->user->goback          = "Back";
$lang->user->deleted         = '(deleted)';

$lang->user->profile     = 'Profile';
$lang->user->project     = $lang->projectCommon;
$lang->user->task        = 'Task';
$lang->user->bug         = 'Bug';
$lang->user->test        = 'Test';
$lang->user->testTask    = 'Test task';
$lang->user->testCase    = 'Test case';
$lang->user->todo        = 'Todo';
$lang->user->story       = 'Story';
$lang->user->dynamic     = 'Dynamic';

$lang->user->openedBy    = 'Opened by him';
$lang->user->assignedTo  = 'Assigned to him';
$lang->user->finishedBy  = 'Finished by him';
$lang->user->resolvedBy  = 'Resolved by him';
$lang->user->closedBy    = 'Closed by him';
$lang->user->reviewedBy  = 'Reviewed by him';
$lang->user->canceledBy  = 'Canceled by him';

$lang->user->testTask2Him = 'His build';
$lang->user->case2Him     = 'His case';
$lang->user->caseByHim    = 'Case he opened';

$lang->user->errorDeny    = "Sorry, you can't access the <b>%s</b> module's <b>%s</b> feature";
$lang->user->loginFailed  = "Login failed, please check your account and password.";
$lang->user->lockWarning  = "You only have %s times to try.";
$lang->user->loginLocked  = "You try the password too many times, please contact the administrator or try again after %s minutes.";
$lang->user->weakPassword = "Your password strength is less than the system settings.";

$lang->user->roleList['']       = '';
$lang->user->roleList['dev']    = 'Developer';
$lang->user->roleList['qa']     = 'Tester';
$lang->user->roleList['pm']     = 'Project manager';
$lang->user->roleList['po']     = 'Product owner';
$lang->user->roleList['td']     = 'Technical director';
$lang->user->roleList['pd']     = 'Product director';
$lang->user->roleList['qd']     = 'Quality Director';
$lang->user->roleList['top']    = 'Top manager';
$lang->user->roleList['others'] = 'Others';

$lang->user->genderList['m'] = 'Male';
$lang->user->genderList['f'] = 'Female';

$lang->user->passwordStrengthList[0] = "<span style='color:red'>Weak</span>";
$lang->user->passwordStrengthList[1] = "<span style='color:#000'>Good</span>";
$lang->user->passwordStrengthList[2] = "<span style='color:green'>Strong</span>";

$lang->user->statusList['active'] = 'Activate';
$lang->user->statusList['delete'] = 'Deleted';

$lang->user->keepLogin['on']      = 'Keep login';
$lang->user->loginWithDemoUser    = 'Login with demo user:';

$lang->user->placeholder = new stdclass();
$lang->user->placeholder->account   = 'Letters/underline/numbers, three above';
$lang->user->placeholder->password1 = 'Six above';
$lang->user->placeholder->role      = '';
$lang->user->placeholder->group     = '';
$lang->user->placeholder->commiter  = 'The account in version control systems';
$lang->user->placeholder->verify    = 'You need to enter the password to verify.';

$lang->user->placeholder->passwordStrength[1] = 'Strength must be middle, 6 or more, having letters,numbers';
$lang->user->placeholder->passwordStrength[2] = 'Strength must be strong, 10 or more, having letters,numbers,specials';

$lang->user->error = new stdclass();
$lang->user->error->account       = "ID %s，Letters/underline/numbers, three above";
$lang->user->error->accountDupl   = "ID %s，this account has been exist";
$lang->user->error->realname      = "ID %s，please input realname";
$lang->user->error->password      = "ID %s，password must be six letters at least";
$lang->user->error->mail          = "ID %s，please input correct email address";
$lang->user->error->role          = "ID %s，please input role";

$lang->user->error->verifyPassword   = "Password error security verification. Please enter your login password.";
$lang->user->error->originalPassword = "The original password is not correct";

$lang->user->contacts = new stdclass();
$lang->user->contacts->common   = 'Contacts';
$lang->user->contacts->listName = 'List name';

$lang->user->contacts->manage        = 'Manage List';
$lang->user->contacts->contactsList  = 'List';
$lang->user->contacts->selectedUsers = 'Users';
$lang->user->contacts->selectList    = 'List';
$lang->user->contacts->createList    = 'Create a list';
$lang->user->contacts->noListYet     = 'No contacts list yet, please create a list first.';
$lang->user->contacts->confirmDelete = 'Are you sure to delete this list?';
$lang->user->contacts->or            = ' or ';

$lang->user->resetFail       = "Reset fail, Check account";
$lang->user->resetSuccess    = "Reset success.";
$lang->user->noticeResetFile = "<h5>For security reason, system need to confirm you're administrator of zentao system.</h5>
    <h5>Please login into the zentao host and create the %s file.</h5>
    <p>Note:</p>
    <ol>
    <li>Keep the ok.txt content empty.</li>
    <li>If the file exists already, remove and recreate it again.</li>
    </ol>"; 
