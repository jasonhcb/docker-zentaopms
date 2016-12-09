<?php
/**
 * The upgrade module English file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     upgrade
 * @version     $Id: en.php 5119 2013-07-12 08:06:42Z wyd621@gmail.com $
 * @link        http://www.zentao.net
 */
$lang->upgrade->common  = 'Upgrade';
$lang->upgrade->result  = 'Result';
$lang->upgrade->fail    = 'Fail';
$lang->upgrade->success = 'Success';
$lang->upgrade->tohome  = 'Visit ZenTao';
$lang->upgrade->license = 'The license of ZentaoPMS has changed to Z PUBLIC LICENSE(ZPL) 1.2.';
$lang->upgrade->warnning= 'Warning';
$lang->upgrade->checkExtension  = 'Check extension';
$lang->upgrade->warnningContent = <<<EOT
Warning! Upgradinng is dangeous, backup your database first.<br />
EOT;







$lang->upgrade->setStatusFile = "<p>For security reason, we will check file <strong>%s</strong><br />
                                 But this file doesn't exist or out of date. You can use the flowing command to create(update)it <br />
                                 For linux:<strong>touch %s;</strong> <br />
                                 For windows:<strong>echo ok > %s</strong></p>
                                 I have done this work, <a href='upgrade.php'>continue upgrade</a>";


$lang->upgrade->selectVersion = 'Select version';
$lang->upgrade->continue      = 'Continue';
$lang->upgrade->noteVersion   = "Must select the correct version";
$lang->upgrade->fromVersion   = 'From version';
$lang->upgrade->toVersion     = 'To version';
$lang->upgrade->confirm       = 'Confirm the sql to executed.';
$lang->upgrade->sureExecute   = 'Execute';
$lang->upgrade->forbiddenExt  = 'Because it is incompatible with this version, the following extension automatically disabled, ：';

$lang->upgrade->fromVersions['0_3beta']   = '0.3 BETA';
$lang->upgrade->fromVersions['0_4beta']   = '0.4 BETA';
$lang->upgrade->fromVersions['0_5beta']   = '0.5 BETA';
$lang->upgrade->fromVersions['0_6beta']   = '0.6 BETA';
$lang->upgrade->fromVersions['1_0beta']   = '1.0 BETA';
$lang->upgrade->fromVersions['1_0rc1']    = '1.0 RC1';
$lang->upgrade->fromVersions['1_0rc2']    = '1.0 RC2';
$lang->upgrade->fromVersions['1_0']       = '1.0 STABLE';
$lang->upgrade->fromVersions['1_0_1']     = '1.0.1';
$lang->upgrade->fromVersions['1_1']       = '1.1';
$lang->upgrade->fromVersions['1_2']       = '1.2';
$lang->upgrade->fromVersions['1_3']       = '1.3';
$lang->upgrade->fromVersions['1_4']       = '1.4';
$lang->upgrade->fromVersions['1_5']       = '1.5';
$lang->upgrade->fromVersions['2_0']       = '2.0';
$lang->upgrade->fromVersions['2_1']       = '2.1';
$lang->upgrade->fromVersions['2_2']       = '2.2';
$lang->upgrade->fromVersions['2_3']       = '2.3';
$lang->upgrade->fromVersions['2_4']       = '2.4';
$lang->upgrade->fromVersions['3_0_beta1'] = '3.0 BETA1';
$lang->upgrade->fromVersions['3_0_beta2'] = '3.0 BETA2';
$lang->upgrade->fromVersions['3_0']       = '3.0 STABLE';
$lang->upgrade->fromVersions['3_1']       = '3.1';
$lang->upgrade->fromVersions['3_2']       = '3.2';
$lang->upgrade->fromVersions['3_2_1']     = '3.2.1';
$lang->upgrade->fromVersions['3_3']       = '3.3';
$lang->upgrade->fromVersions['4_0_beta1'] = '4.0 BETA1';
$lang->upgrade->fromVersions['4_0_beta2'] = '4.0 BETA2';
$lang->upgrade->fromVersions['4_0']       = '4.0';
$lang->upgrade->fromVersions['4_0_1']     = '4.0.1';
$lang->upgrade->fromVersions['4_1']       = '4.1';
$lang->upgrade->fromVersions['4_2_beta']  = '4.2.beta';
$lang->upgrade->fromVersions['4_3_beta']  = '4.3.beta';
$lang->upgrade->fromVersions['5_0_beta1'] = '5.0.beta1';
$lang->upgrade->fromVersions['5_0_beta2'] = '5.0.beta2';
$lang->upgrade->fromVersions['5_0']       = '5.0';
$lang->upgrade->fromVersions['5_1']       = '5.1';
$lang->upgrade->fromVersions['5_2']       = '5.2';
$lang->upgrade->fromVersions['5_2_1']     = '5.2.1';
$lang->upgrade->fromVersions['5_3']       = '5.3';
$lang->upgrade->fromVersions['6_0_beta1'] = '6.0.beta1';
$lang->upgrade->fromVersions['6_0']       = '6.0';
$lang->upgrade->fromVersions['6_1']       = '6.1';
$lang->upgrade->fromVersions['6_2']       = '6.2';
$lang->upgrade->fromVersions['6_3']       = '6.3';
$lang->upgrade->fromVersions['6_4']       = '6.4';
$lang->upgrade->fromVersions['7_0']       = '7.0';
$lang->upgrade->fromVersions['7_1']       = '7.1';
$lang->upgrade->fromVersions['7_2']       = '7.2';
$lang->upgrade->fromVersions['7_2_4']     = '7.2.4';
$lang->upgrade->fromVersions['7_2_5']     = '7.2.5';
$lang->upgrade->fromVersions['7_3']       = '7.3';
$lang->upgrade->fromVersions['7_4_beta']  = '7.4.beta';
$lang->upgrade->fromVersions['8_0']       = '8.0';
$lang->upgrade->fromVersions['8_0_1']     = '8.0.1';
$lang->upgrade->fromVersions['8_1']       = '8.1';
$lang->upgrade->fromVersions['8_1_3']     = '8.1.3';
$lang->upgrade->fromVersions['8_2_beta']  = '8.2.beta';
$lang->upgrade->fromVersions['8_2']       = '8.2';
