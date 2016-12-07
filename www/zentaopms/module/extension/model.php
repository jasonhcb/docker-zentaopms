<?php
/**
 * The model file of extension module of ZenTaoCMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     extension
 * @version     $Id$
 * @link        http://www.zentao.net
 */
class extensionModel extends model
{
    /**
     * The extension manager version. Don't change it. 
     */
    const EXT_MANAGER_VERSION = '1.3';

    /**
     * The api agent(use snoopy).
     * 
     * @var object   
     * @access public
     */
    public $agent;

    /**
     * The api root.
     * 
     * @var string
     * @access public
     */
    public $apiRoot;

    /**
     * The construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setAgent();
        $this->setApiRoot();
        $this->classFile = $this->app->loadClass('zfile');
    }

    /**
     * Set the api agent.
     * 
     * @access public
     * @return void
     */
    public function setAgent()
    {
        $this->agent = $this->app->loadClass('snoopy');
    }

    /**
     * Set the apiRoot.
     * 
     * @access public
     * @return void
     */
    public function setApiRoot()
    {
        $this->apiRoot = $this->config->extension->apiRoot;
    }

    /**
     * Fetch data from an api.
     * 
     * @param  string    $url 
     * @access public
     * @return mixed
     */
    public function fetchAPI($url)
    {
        $url .= (strpos($url, '?') === false ? '?' : '&') . 'lang=' . str_replace('-', '_', $this->app->getClientLang()) . '&managerVersion=' . self::EXT_MANAGER_VERSION . '&zentaoVersion=' . $this->config->version;
        $this->agent->fetch($url);
        $result = json_decode($this->agent->results);

        if(!isset($result->status)) return false;
        if($result->status != 'success') return false;
        if(isset($result->data) and md5($result->data) != $result->md5) return false;
        if(isset($result->data)) return json_decode($result->data);
    }

    /**
     * Get extension modules from the api.
     * 
     * @access public
     * @return string|bool
     */
    public function getModulesByAPI()
    {
        $requestType = $this->config->requestType;
        $webRoot     = helper::safe64Encode($this->config->webRoot);
        $apiURL      = $this->apiRoot . 'apiGetmodules-' . $requestType . '-' . $webRoot . '.json';
        $data = $this->fetchAPI($apiURL);
        if(isset($data->modules)) return $data->modules;
        return false;
    }

    /**
     * Get extensions by some condition.
     * 
     * @param  string    $type 
     * @param  mixed     $param 
     * @access public
     * @return array|bool
     */
    public function getExtensionsByAPI($type, $param, $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $apiURL = $this->apiRoot . "apiGetExtensions-$type-$param-$recTotal-$recPerPage-$pageID.json";
        $data   = $this->fetchAPI($apiURL);
        if(isset($data->extensions))
        {
            foreach($data->extensions as $extension)
            {
                $extension->currentRelease = isset($extension->compatibleRelease) ? $extension->compatibleRelease : $extension->latestRelease;
                $extension->currentRelease->compatible = isset($extension->compatibleRelease);
            }
            return $data;
        }
        return false;
    }

    /**
     * Get versions for some extensions.
     * 
     * @param  string    $extensions 
     * @access public
     * @return array|bool
     */
    public function getVersionsByAPI($extensions)
    {
        $extensions = helper::safe64Encode($extensions);
        $apiURL = $this->apiRoot . 'apiGetVersions-' . $extensions . '.json';
        $data = $this->fetchAPI($apiURL);
        if(isset($data->versions)) return (array)$data->versions;
        return false;
    }

    /**
     * Check incompatible extension
     * 
     * @param  array    $versions 
     * @access public
     * @return array
     */
    public function checkIncompatible($versions)
    {
        $apiURL = $this->apiRoot . 'apiCheckIncompatible' . '.json?versions=' . helper::safe64Encode(json_encode($versions));
        $data = $this->fetchAPI($apiURL);
        if(isset($data->incompatibleExts)) return (array)$data->incompatibleExts;
        return array();

    }

    /**
     * Download an extension.
     * 
     * @param  string    $extension 
     * @param  string    $downLink 
     * @access public
     * @return void
     */
    public function downloadPackage($extension, $downLink)
    {
        $packageFile = $this->getPackageFile($extension);
        $this->agent->fetch($downLink);
        file_put_contents($packageFile, $this->agent->results);
    }

    /**
     * Get extensions by status.
     * 
     * @param  string    $status 
     * @access public
     * @return array
     */
    public function getLocalExtensions($status)
    {
        $extensions = $this->dao->select('*')->from(TABLE_EXTENSION)->where('status')->eq($status)->fi()->fetchAll('code');
        foreach($extensions as $extension)
        {
            if($extension->site and stripos(strtolower($extension->site), 'http') === false) $extension->site = 'http://' . $extension->site;
        }
        return $extensions;
    }

    /**
     * Get extension info from database.
     * 
     * @param  string    $extension 
     * @access public
     * @return object
     */
    public function getInfoFromDB($extension)
    {
        return $this->dao->select('*')->from(TABLE_EXTENSION)->where('code')->eq($extension)->fetch();
    }

    /**
     * Get info of an extension from the package file.
     * 
     * @param  string    $extension 
     * @access public
     * @return object
     */
    public function getInfoFromPackage($extension)
    {
        /* Init the data. */
        $data = new stdclass();
        $data->name             = $extension;
        $data->code             = $extension;
        $data->version          = 'unknown';
        $data->author           = 'unknown';
        $data->desc             = $extension;
        $data->site             = 'unknown';
        $data->license          = 'unknown';
        $data->zentaoCompatible = '';
        $data->type             = '';
        $data->depends          = '';

        $info = $this->parseExtensionCFG($extension);
        foreach($info as $key => $value) if(isset($data->$key)) $data->$key = $value;
        if(isset($info->zentaoversion))        $data->zentaoCompatible = $info->zentaoversion;
        if(isset($info->zentao['compatible'])) $data->zentaoCompatible = $info->zentao['compatible'];
        if(isset($info->depends))              $data->depends          = json_encode($info->depends);

        return $data;
    }

    /**
     * Parse extension's config file.
     * 
     * @param  string    $extension 
     * @access public
     * @return object
     */
    public function parseExtensionCFG($extension)
    {
        $info = new stdclass();

        /* First, try ini file. before 2.5 version. */
        $infoFile = "ext/$extension/doc/copyright.txt";
        if(file_exists($infoFile)) return (object)parse_ini_file($infoFile);

        /**
         * Then try parse yaml file. since 2.5 version.  
         */

        /* Try the yaml of current lang, then try en. */
        $lang = $this->app->getClientLang();
        $infoFile = "ext/$extension/doc/$lang.yaml";
        if(!file_exists($infoFile)) $infoFile = "ext/$extension/doc/en.yaml";
        if(!file_exists($infoFile)) return $info;

        /* Load the yaml file and parse it into object. */
        $this->app->loadClass('spyc', true);
        $info = (object)spyc_load(file_get_contents($infoFile));
        if(isset($info->releases))
        {
            krsort($info->releases);
            $info->version = key($info->releases);
            foreach($info->releases[$info->version] as $key => $value) $info->$key = $value;
        }
        return $info;
    }

    /**
     * Get the full path of the zip file of a extension. 
     * 
     * @param  string    $extension 
     * @access public
     * @return string
     */
    public function getPackageFile($extension)
    {
        return $this->app->getTmpRoot() . 'extension/' . $extension . '.zip';
    }

    /**
     * Get pathes from an extension package.
     * 
     * @param  string    $extension 
     * @access public
     * @return array
     */
    public function getPathesFromPackage($extension)
    {
        $pathes = array();
        $packageFile = $this->getPackageFile($extension);

        /* Get files from the package file. */
        $this->app->loadClass('pclzip', true);
        $zip   = new pclzip($packageFile);
        $files = $zip->listContent();
        if($files)
        {
            foreach($files as $file)
            {
                $file = (object)$file;
                if($file->folder) continue;
                $file->filename = substr($file->filename, strpos($file->filename, '/') + 1);
                $pathes[] = dirname($file->filename);
            }
        }

        /* Append the pathes to stored the extracted files. */
        $pathes[] = "module/extension/ext/";

        return array_unique($pathes);
    }

    /**
     * Get all files from a package.
     * 
     * @param  string    $extension 
     * @access public
     * @return array
     */
    public function getFilesFromPackage($extension)
    {
        $extensionDir = "ext/$extension/";
        $files = $this->classFile->readDir($extensionDir, array('db', 'doc'));
        return $files;
    }

    /**
     * Get the extension's condition. 
     * 
     * @param  string    $extenstion 
     * @access public
     * @return object
     */
    public function getCondition($extension)
    {
        $info      = $this->parseExtensionCFG($extension);
        $condition = new stdclass();

        $condition->zentao    = array('compatible' => '', 'incompatible' => '');
        $condition->depends   = '';
        $condition->conflicts = '';

        if(isset($info->zentao))        $condition->zentao    = $info->zentao;
        if(isset($info->depends))       $condition->depends   = $info->depends;
        if(isset($info->conflicts))     $condition->conflicts = $info->conflicts;

        if(isset($info->zentaoVersion)) $condition->zentao['compatible'] = $info->zentaoVersion;
        if(isset($info->zentaoversion)) $condition->zentao['compatible'] =  $info->zentaoversion;

        return $condition;
    }

    /**
     * Process license. If is opensource return the full text of it.
     * 
     * @param  string    $license 
     * @access public
     * @return string
     */
    public function processLicense($license)
    {
        if(strlen($license) > 10) return $license;    // more then 10 letters, not gpl, lgpl, apache, bsd or mit.

        $licenseFile = dirname(__FILE__) . '/license/' . strtolower($license) . '.txt';
        if(file_exists($licenseFile)) return file_get_contents($licenseFile);

        return $license;
    }

    /**
     * Get hook file for install or uninstall.
     * 
     * @param  string    $extension 
     * @param  string    $hook      preinstall|postinstall|preuninstall|postuninstall 
     * @access public
     * @return string|bool
     */
    public function getHookFile($extension, $hook)
    {
        $hookFile = "ext/$extension/hook/$hook.php";
        if(file_exists($hookFile)) return $hookFile;
        return false;
    }

    /**
     * Get the install db file.
     * 
     * @param  string    $extension 
     * @param  string    $method 
     * @access public
     * @return string
     */
    public function getDBFile($extension, $method = 'install')
    {
        return "ext/$extension/db/$method.sql";
    }

    /**
     * Check the download path.
     * 
     * @access public
     * @return object   the check result.
     */
    public function checkDownloadPath()
    {
        /* Init the return. */
        $return = new stdclass();
        $return->result = 'ok';
        $return->error  = '';

        $tmpRoot = $this->app->getTmpRoot();
        $downloadPath = $tmpRoot . 'extension';

        if(!is_dir($downloadPath))
        {
            if(is_writable($tmpRoot))
            {
                mkdir($downloadPath);
            }
            else
            {
                $return->result = 'fail';
                $return->error  = sprintf($this->lang->extension->errorDownloadPathNotFound, $downloadPath, $downloadPath);
            }
        }
        elseif(!is_writable($downloadPath))
        {
            $return->result = 'fail';
            $return->error  = sprintf($this->lang->extension->errorDownloadPathNotWritable, $downloadPath, $downloadPath);
        }
        return $return;
    }

    /**
     * Check extension files.
     * 
     * @param  string    $extension 
     * @access public
     * @return object    the check result.
     */
    public function checkExtensionPathes($extension)
    {
        $return = new stdclass();
        $return->result        = 'ok';
        $return->errors        = '';
        $return->mkdirCommands = '';
        $return->chmodCommands = '';
        $return->dirs2Created  = array();

        $appRoot = $this->app->getAppRoot();
        $pathes  = $this->getPathesFromPackage($extension);
        foreach($pathes as $path)
        {
            if($path == 'db' or $path == 'doc' or $path == 'hook') continue;
            $path = $appRoot . $path;
            if(is_dir($path))
            {
                if(!is_writable($path))
                {
                    $return->errors .= sprintf($this->lang->extension->errorTargetPathNotWritable, $path) . '<br />';
                    $return->chmodCommands .= "sudo chmod -R 777 $path<br />";
                }
            }
            else
            {
                if(!@mkdir($path, 0755, true))
                {
                    $return->errors .= sprintf($this->lang->extension->errorTargetPathNotExists, $path) . '<br />';
                    $return->mkdirCommands .= "mkdir -p $path<br />";
                    $return->chmodCommands .= "sudo chmod -R 777 $path<br />";
                }
                $return->dirs2Created[] = $path;
            }
        }

        if($return->errors) $return->result = 'fail';
        $return->mkdirCommands = empty($return->mkdirCommands) ? '' : '<code>' . str_replace('/', DIRECTORY_SEPARATOR, $return->mkdirCommands) . '</code>';
        $return->errors .= $this->lang->extension->executeCommands . $return->mkdirCommands;
        if(PHP_OS == 'Linux') $return->errors .= empty($return->chmodCommands) ? '' : '<code>' . $return->chmodCommands . '</code>';
        return $return;
    }

    /**
     * Check the extension's version is compatibility for zentao version
     * 
     * @param  string    $version 
     * @access public
     * @return bool
     */
    public function checkVersion($version)
    {
        if($version == 'all') return true;
        $version = explode(',', $version);
        if(in_array($this->config->version, $version)) return true;
        return false;
    }

    /**
     * Check files in the package conflicts with exists files or not.
     * 
     * @param  string    $extension 
     * @param  string    $type
     * @param  bool      $isCheck
     * @access public
     * @return object
     */
    public function checkFile($extension)
    {
        $return = new stdclass();
        $return->result = 'ok';
        $return->error  = '';

        $extensionFiles = $this->getFilesFromPackage($extension);
        $appRoot = $this->app->getAppRoot();
        foreach($extensionFiles as $extensionFile)
        {
            $compareFile = $appRoot . str_replace(realpath("ext/$extension") . '/', '', $extensionFile);
            if(!file_exists($compareFile)) continue;
            if(md5_file($extensionFile) != md5_file($compareFile)) $return->error .= $compareFile . '<br />';
        }

        if($return->error != '') $return->result = 'fail';
        return $return;
    }

    /**
     * Extract an extension.
     * 
     * @param  string    $extension 
     * @access public
     * @return object
     */
    public function extractPackage($extension) 
    {
        $return = new stdclass();
        $return->result = 'ok';
        $return->error  = '';

        /* try remove pre extracted files. */
        $extensionPath = "ext/$extension";
        if(is_dir($extensionPath)) $this->classFile->removeDir($extensionPath);

        /* Extract files. */
        $packageFile = $this->getPackageFile($extension);
        $this->app->loadClass('pclzip', true);
        $zip = new pclzip($packageFile);
        $files = $zip->listContent();
        $removePath = $files[0]['filename'];
        if($zip->extract(PCLZIP_OPT_PATH, $extensionPath, PCLZIP_OPT_REMOVE_PATH, $removePath) == 0)
        {
            $return->result = 'fail';
            $return->error  = $zip->errorInfo(true);
        }

        return $return;
    }

    /**
     * Copy package files. 
     * 
     * @param  int    $extension 
     * @access public
     * @return array
     */
    public function copyPackageFiles($extension)
    {
        $appRoot      = $this->app->getAppRoot();
        $extensionDir = "ext/$extension/";
        $pathes       = scandir($extensionDir);
        $copiedFiles  = array();

        foreach($pathes as $path)
        {
            if($path == 'db' or $path == 'doc' or $path == 'hook' or $path == '..' or $path == '.') continue;
            $copiedFiles = $this->classFile->copyDir($extensionDir . $path, $appRoot . $path);
        }
        foreach($copiedFiles as $key => $copiedFile)
        {
            $copiedFiles[$copiedFile] = md5_file($copiedFile);
            unset($copiedFiles[$key]);
        }
        return $copiedFiles;
    }

    /**
     * Remove an extension.
     * 
     * @param  string    $extension 
     * @access public
     * @return array     the remove commands need executed manually.
     */
    public function removePackage($extension)
    {
        $extension = $this->getInfoFromDB($extension);
        if($extension->type == 'patch') return true;
        $dirs  = json_decode($extension->dirs);
        $files = json_decode($extension->files);
        $appRoot = $this->app->getAppRoot();
        $removeCommands = array();

        /* Remove files first. */
        if($files)
        {
            foreach($files as $file => $savedMD5)
            {
                $file = $appRoot . $file;
                if(!file_exists($file)) continue;

                if(md5_file($file) != $savedMD5)
                {
                    $removeCommands[] = PHP_OS == 'Linux' ? "rm -fr $file #changed" : "del $file :changed";
                }
                elseif(!@unlink($file))
                {
                    $removeCommands[] = PHP_OS == 'Linux' ? "rm -fr $file" : "del $file";
                }
            }
        }

        /* Then remove dirs. */
        if($dirs)
        {
            rsort($dirs);    // remove from the lower level directory.
            foreach($dirs as $dir)
            {
                if(!@rmdir($appRoot . $dir)) $removeCommands[] = "rmdir $appRoot$dir";
            }
        }

        /* Clean model cache files. */
        $this->cleanModelCache();

        return $removeCommands;
    }

    /**
     * Clean model cache files.
     * 
     * @access public
     * @return void
     */
    public function cleanModelCache()
    {
        $modelCacheFiles = glob($this->app->getTmpRoot() . 'model/*');
        foreach($modelCacheFiles as $cacheFile) @unlink($cacheFile);
    }

    /**
     * Erase an extension's package file.
     * 
     * @param  string    $extension 
     * @access public
     * @return array     the remove commands need executed manually.
     */
    public function erasePackage($extension)
    {
        $removeCommands = array();

        $this->dao->delete()->from(TABLE_EXTENSION)->where('code')->eq($extension)->exec();

        /* Remove the zip file. */
        $packageFile = $this->getPackageFile($extension);
        if(!file_exists($packageFile)) return false;
        if(file_exists($packageFile) and !@unlink($packageFile))
        {
            $removeCommands[] = PHP_OS == 'Linux' ? "rm -fr $packageFile" : "del $packageFile";
        }

        /* Remove the extracted files. */
        $extractedDir = realpath("ext/$extension");
        if($extractedDir != '/' and !$this->classFile->removeDir($extractedDir))
        {
            $removeCommands[] = PHP_OS == 'Linux' ? "rm -fr $extractedDir" : "rmdir $extractedDir /s";
        }

        return $removeCommands;
    }

    /**
     * Judge need execute db install or not.
     * 
     * @param  string    $extension 
     * @param  string    $method 
     * @access public
     * @return bool
     */
    public function needExecuteDB($extension, $method = 'install')
    {
        return file_exists($this->getDBFile($extension, $method));
    }

    /**
     * Install the db.
     * 
     * @param  int    $extension 
     * @access public
     * @return object
     */
    public function executeDB($extension, $method = 'install')
    {
        $return = new stdclass();
        $return->result = 'ok';
        $return->error  = '';
        $ignoreCode     = '|1050|1060|1062|1091|1169|';

        $dbFile = $this->getDBFile($extension, $method);
        if(!file_exists($dbFile)) return $return;

        $sqls = file_get_contents($this->getDBFile($extension, $method));
        $sqls = explode(';', $sqls);

        foreach($sqls as $sql)
        {
            $sql = trim($sql);
            if(empty($sql)) continue;
            $sql = str_replace('zt_', $this->config->db->prefix, $sql);

            try
            {
                $this->dbh->query($sql);
            }
            catch(PDOException $e) 
            {
                $errorInfo = $e->errorInfo;
                $errorCode = $errorInfo[1];
                if(strpos($ignoreCode, "|$errorCode|") === false) $return->error .= '<p>' . $e->getMessage() . "<br />THE SQL IS: $sql</p>";
            }
        }
        if($return->error) $return->result = 'fail';
        return $return;
    }

    /**
     * Backup db when uninstall extension. 
     * 
     * @param  string    $extension 
     * @access public
     * @return bool|string
     */
    public function backupDB($extension)
    {
        $zdb = $this->app->loadClass('zdb');

        $sqls = file_get_contents($this->getDBFile($extension, 'uninstall'));
        $sqls = explode(';', $sqls);

        /* Get tables for backup. */
        $backupTables = array();
        foreach($sqls as $sql)
        {
            $sql = str_replace('zt_', $this->config->db->prefix, $sql);
            $sql = preg_replace('/IF EXISTS /i', '', trim($sql));
            if(preg_match('/TABLE +`?([^` ]*)`?/i', $sql, $out))
            {
                if(!empty($out[1])) $backupTables[$out[1]] = $out[1];
            }
        }

        /* Back up database. */
        if($backupTables)
        {
            $backupFile = $this->app->getTmpRoot() . $extension . '.' . date('Ymd') . '.sql';
            $result     = $zdb->dump($backupFile, $backupTables);
            if($result->result) return $backupFile;
            return false; 
        }
        return false; 
    }

    /**
     * Save the extension to database.
     * 
     * @param  string    $extension     the extension code
     * @param  string    $type          the extension type
     * @access public
     * @return void
     */
    public function saveExtension($extension, $type)
    {
        $code      = $extension;
        $extension = $this->getInfoFromPackage($extension);
        $extension->status = 'available';
        $extension->code   = $code;
        $extension->type   = empty($type) ? $extension->type : $type;

        $this->dao->replace(TABLE_EXTENSION)->data($extension)->exec();
    }

    /**
     * Update an extension.
     * 
     * @param  string    $extension 
     * @param  string    $status 
     * @param  array     $files 
     * @access public
     * @return void
     */
    public function updateExtension($extension, $data)
    {
        $data = (object)$data;
        $appRoot = $this->app->getAppRoot();

        if(isset($data->dirs))
        {
            if($data->dirs)
            {
                foreach($data->dirs as $key => $dir)
                {
                    $data->dirs[$key] = str_replace($appRoot, '', $dir);
                }
            }
            $data->dirs = json_encode($data->dirs);
        }

        if(isset($data->files))
        {
            foreach($data->files as $fullFilePath => $md5)
            {
                $relativeFilePath = str_replace($appRoot, '', $fullFilePath);
                $data->files[$relativeFilePath] = $md5;
                unset($data->files[$fullFilePath]);
            }
            $data->files = json_encode($data->files);
        }
        return $this->dao->update(TABLE_EXTENSION)->data($data)->where('code')->eq($extension)->exec();
    }

    /**
     * Check depends extension.
     * 
     * @param  string    $extension 
     * @access public
     * @return array
     */
    public function checkDepends($extension)
    {
        $result        = array();
        $extensionInfo = $this->dao->select('*')->from(TABLE_EXTENSION)->where('code')->eq($extension)->fetch();
        $dependsExts   = $this->dao->select('*')->from(TABLE_EXTENSION)->where('depends')->like("%$extension%")->andWhere('status')->ne('available')->fetchAll();
        if($dependsExts)
        {
            foreach($dependsExts as $dependsExt)
            {
                $depends = json_decode($dependsExt->depends, true);
                if($this->compare4Limit($extensionInfo->version, $depends[$extension])) $result[] = $dependsExt->name;
            }
        }
        return $result;
    }

    /**
     * Compare for limit data.
     * 
     * @param  string $version 
     * @param  array  $limit 
     * @param  string $type 
     * @access public
     * @return void
     */
    public function compare4Limit($version, $limit, $type = 'between')
    {
        $result = false;
        if(empty($limit)) return true;

        if($limit == 'all')
        {
            $result = true;
        }
        else
        {
            if(!empty($limit['min']) and $version >= $limit['min']) $result = true;
            if(!empty($limit['max']) and $version <= $limit['max']) $result = true;
            if(!empty($limit['max']) and $version > $limit['max'] and $result) $result = false;
        }

        if($type != 'between') return !$result;
        return $result;
    }
}
