<?php
$config->installed       = true;
$config->debug           = true;
$config->requestType     = 'GET';
$config->db->host        = '127.0.0.1';
$config->db->port        = '3306';
$config->db->name        = 'zentao';
$config->db->user        = 'root';
$config->db->password    = '19940527';
$config->db->prefix      = 'zt_';
$config->webRoot         = getWebRoot();
$config->default->lang   = 'zh-cn';
$config->mysqldump       = '/usr/bin/mysqldump';

define('TABLE_HDC',         '`' . $config->db->prefix . 'hdc`');
define('TABLE_CUSTOME',         '`' . $config->db->prefix . 'custome`');
define('TABLE_APPROVAL',         '`' . $config->db->prefix . 'approval`');
define('TABLE_CSICODE',         '`' . $config->db->prefix . 'csicode`');
$config->objectTables['hdc']      = TABLE_HDC;
$config->objectTables['custome']      = TABLE_CUSTOME;
$config->objectTables['approval']      = TABLE_APPROVAL;
$config->objectTables['csicode']      = TABLE_CSICODE;
// $config->domain = 'http://rdcdev.saas.hand-china.com/';
