<?php
/**
 * The model file of install module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     install
 * @version     $Id: model.php 5006 2013-07-03 08:52:21Z wyd621@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php
class installModel extends model
{
    /**
     * Check version of zentao.
     * 
     * @access public
     * @return void
     */
    public function checkZenTaoVersion()
    {
    }

    /**
     * get php version.
     * 
     * @access public
     * @return string
     */
    public function getPhpVersion()
    {
        return PHP_VERSION;
    }

    /**
     * Get latest release.
     * 
     * @access public
     * @return string or bool
     */
    public function getLatestRelease()
    {
        if(!function_exists('json_decode')) return false;
        $snoopy = $this->app->loadClass('snoopy');
        if(@$snoopy->fetchText('http://www.zentao.net/misc-getlatestrelease.json'))
        {
            $result = json_decode($snoopy->results);
            if(isset($result->release) and $this->config->version != $result->release->version)
            {
                return $result->release;
            }
        }
        return false;
    }

    /**
     * Check php version.
     * 
     * @access public
     * @return string   ok|fail
     */
    public function checkPHP()
    {
        return $result = version_compare(PHP_VERSION, '5.2.0') >= 0 ? 'ok' : 'fail';
    }

    /**
     * Check PDO.
     * 
     * @access public
     * @return string   ok|fail
     */
    public function checkPDO()
    {
        return $result = extension_loaded('pdo') ? 'ok' : 'fail';
    }

    /**
     * Check PDO::MySQL 
     * 
     * @access public
     * @return string   ok|fail
     */
    public function checkPDOMySQL()
    {
        return $result = extension_loaded('pdo_mysql') ? 'ok' : 'fail';
    }

    /**
     * Check json extension.
     * 
     * @access public
     * @return string   ok|fail
     */
    public function checkJSON()
    {
        return $result = extension_loaded('json') ? 'ok' : 'fail';
    }

    /**
     * Get tempRoot info.
     * 
     * @access public
     * @return array
     */
    public function getTmpRoot()
    {
        $result['path']    = $this->app->getTmpRoot();
        $result['exists']  = is_dir($result['path']);
        $result['writable']= is_writable($result['path']);
        return $result;
    }

    /**
     * Check tmpRoot.
     * 
     * @access public
     * @return string   ok|fail
     */
    public function checkTmpRoot()
    {
        $tmpRoot = $this->app->getTmpRoot();
        return $result = (is_dir($tmpRoot) and is_writable($tmpRoot)) ? 'ok' : 'fail';
    }

    /**
     * Get session save path. 
     * 
     * @access public
     * @return array 
     */
    public function getSessionSavePath()
    {
        $result['path']     = preg_replace("/\d;/", '', session_save_path());
        $result['exists']   = is_dir($result['path']);
        $result['writable'] = is_writable($result['path']);
        return $result;
    }

    /**
     * Check session save path. 
     * 
     * @access public
     * @return string
     */
    public function checkSessionSavePath()
    {
        $sessionSavePath = preg_replace("/\d;/", '', session_save_path());
        return $result   = (is_dir($sessionSavePath) and is_writable($sessionSavePath)) ? 'ok' : 'fail'; 
    }

    /**
     * Get data root 
     * 
     * @access public
     * @return array
     */
    public function getDataRoot()
    {
        $result['path']    = $this->app->getAppRoot() . 'www' . DS . 'data';
        $result['exists']  = is_dir($result['path']);
        $result['writable']= is_writable($result['path']);
        return $result;
    }

    /**
     * Check the data root. 
     * 
     * @access public
     * @return string ok|fail
     */
    public function checkDataRoot()
    {
        $dataRoot = $this->app->getAppRoot() . 'www' . DS . 'data';
        return $result = (is_dir($dataRoot) and is_writable($dataRoot)) ? 'ok' : 'fail';
    }

    /**
     * Get the php.ini info.
     * 
     * @access public
     * @return string
     */
    public function getIniInfo()
    {
        $iniInfo = '';
        ob_start();
        phpinfo(1);
        $lines = explode("\n", strip_tags(ob_get_contents()));
        ob_end_clean();
        foreach($lines as $line) if(strpos($line, 'ini') !== false) $iniInfo .= $line . "\n";
        return $iniInfo;
    }

    /**
     * Check config ok or not.
     * 
     * @access public
     * @return array
     */
    public function checkConfig()
    {
        $return = new stdclass();
        $return->result = 'ok';

        /* Connect to database. */
        $this->setDBParam();
        $this->dbh = $this->connectDB();
        if(strpos($this->post->dbName, '.') !== false)
        {
            $return->result = 'fail';
            $return->error  = $this->lang->install->errorDBName;
            return $return;
        }
        if(!is_object($this->dbh))
        {
            $return->result = 'fail';
            $return->error  = $this->lang->install->errorConnectDB . $this->dbh;
            return $return;
        }

        /* Get mysql version. */
        $version = $this->getMysqlVersion();

        /* If database no exits, try create it. */
        if(!$this->dbExists())
        {
            if(!$this->createDB($version))
            {
                $return->result = 'fail';
                $return->error  = $this->lang->install->errorCreateDB;
                return $return;
            }
        }
        elseif($this->tableExits() and $this->post->clearDB == false)
        {
            $return->result = 'fail';
            $return->error  = $this->lang->install->errorTableExists;
            return $return;
        }

        /* Create tables. */
        if(!$this->createTable($version))
        {
            $return->result = 'fail';
            $return->error  = $this->lang->install->errorCreateTable;
            return $return;
        }

        return $return;
    }

    /**
     * Set database params.
     * 
     * @access public
     * @return void
     */
    public function setDBParam()
    {
        $this->config->db->host     = $this->post->dbHost;
        $this->config->db->name     = $this->post->dbName;
        $this->config->db->user     = $this->post->dbUser;
        $this->config->db->password = $this->post->dbPassword;
        $this->config->db->port     = $this->post->dbPort;
        $this->config->db->prefix   = $this->post->dbPrefix;

    }

    /**
     * Connect to database.
     * 
     * @access public
     * @return object
     */
    public function connectDB()
    {
        $dsn = "mysql:host={$this->config->db->host}; port={$this->config->db->port}";
        try 
        {
            $dbh = new PDO($dsn, $this->config->db->user, $this->config->db->password);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->exec("SET NAMES {$this->config->db->encoding}");
            if(isset($this->config->db->strictMode) and $this->config->db->strictMode == false) $dbh->exec("SET @@sql_mode= ''");
            return $dbh;
        }
        catch (PDOException $exception)
        {
             return $exception->getMessage();
        }
    }

    /**
     * Check db exits or not.
     * 
     * @access public
     * @return bool
     */
    public function dbExists()
    {
        $sql = "SHOW DATABASES like '{$this->config->db->name}'";
        return $this->dbh->query($sql)->fetch();
    }

    /**
     * Check table exits or not.
     * 
     * @access public
     * @return void
     */
    public function tableExits()
    {
        $configTable = str_replace('`', "'", TABLE_CONFIG);
        $sql = "SHOW TABLES FROM {$this->config->db->name} like $configTable";
        return $this->dbh->query($sql)->fetch();
    }

    /**
     * Get mysql version.
     * 
     * @access public
     * @return string
     */
    public function getMysqlVersion()
    {
        $sql = "SELECT VERSION() AS version";
        $result = $this->dbh->query($sql)->fetch();
        return substr($result->version, 0, 3);
    }

    /**
     * Create database.
     * 
     * @param  string    $version 
     * @access public
     * @return bool
     */
    public function createDB($version)
    {
        $sql = "CREATE DATABASE `{$this->config->db->name}`";
        if($version > 4.1) $sql .= " DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
        return $this->dbh->query($sql);
    }

    /**
     * Create tables.
     * 
     * @param  string    $version 
     * @access public
     * @return bool
     */
    public function createTable($version)
    {
        $dbFile = $this->app->getAppRoot() . 'db' . DS . 'zentao.sql';
        $tables = explode(';', file_get_contents($dbFile));
        foreach($tables as $table)
        {
            $table = trim($table);
            if(empty($table)) continue;

            if(strpos($table, 'CREATE') !== false and $version <= 4.1)
            {
                $table = str_replace('DEFAULT CHARSET=utf8', '', $table);
            }
            elseif(strpos($table, 'DROP') !== false and $this->post->clearDB != false)
            {
                $table = str_replace('--', '', $table);
            }

            /* Skip sql that is note. */
            if(strpos($table, '--') === 0) continue;

            $table = str_replace('`zt_', $this->config->db->name . '.`zt_', $table);
            $table = str_replace('`ztv_', $this->config->db->name . '.`ztv_', $table);
            $table = str_replace('zt_', $this->config->db->prefix, $table);
            if(!$this->dbh->query($table)) return false;
        }
        return true;
    }

    /**
     * Create a comapny, set admin.
     * 
     * @access public
     * @return void
     */
    public function grantPriv()
    {
        if($this->post->password == '') die(js::error($this->lang->install->errorEmptyPassword));

        /* Insert a company. */
        $company = new stdclass();
        $company->name   = $this->post->company;
        $company->admins = ",{$this->post->account},";
        $this->dao->insert(TABLE_COMPANY)->data($company)->autoCheck()->batchCheck('name', 'notempty')->exec();

        if(!dao::isError())
        {
            /* Set admin. */
            $admin = new stdclass();
            $admin->account  = $this->post->account;
            $admin->realname = $this->post->account;
            $admin->password = md5($this->post->password);
            $admin->gender   = 'f';
            $this->dao->insert(TABLE_USER)->data($admin)->check('account', 'notempty')->exec();

            /* Update group name and desc on dafault lang. */
            $groups = $this->dao->select('*')->from(TABLE_GROUP)->orderBy('id')->fetchAll();
            foreach($groups as $group)
            {
                $data = zget($this->lang->install->groupList, $group->name, '');
                if($data) $this->dao->update(TABLE_GROUP)->data($data)->where('id')->eq($group->id)->exec();
            }
        }
    }

    /**
     * Import demo data. 
     * 
     * @access public
     * @return void
     */
    public function importDemoData()
    {
        $demoDataFile = $this->app->getAppRoot() . 'db' . DS . 'demo.sql';
        $insertTables = explode(";\n", file_get_contents($demoDataFile));
        foreach($insertTables as $table)
        { 
            $table = trim($table);
            if(empty($table)) continue;
  
            $table = str_replace('`zt_', $this->config->db->name . '.`zt_', $table);
            $table = str_replace('zt_', $this->config->db->prefix, $table);
            if(!$this->dbh->query($table)) return false;
        }

        $config->module  = 'common';
        $config->owner   = 'system';
        $config->section = 'global';
        $config->key     = 'showDemoUsers';
        $config->value   = '1';
        $this->dao->replace(TABLE_CONFIG)->data($config)->exec();
        return true;
    }
}
