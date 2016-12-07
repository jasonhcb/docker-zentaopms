<?php
/**
 * ZenTaoPHP的baseModel类。
 * The baseModel class file of ZenTaoPHP framework.
 *
 * The author disclaims copyright to this source code.  In place of
 * a legal notice, here is a blessing:
 * 
 *  May you do good and not evil.
 *  May you find forgiveness for yourself and forgive others.
 *  May you share freely, never taking more than you give.
 */

/**
 * baseModel基类。
 * The base class of model.
 * 
 * @package framework
 */
class baseModel
{
    /**
     * 全局对象$app。
     * The global $app object.
     * 
     * @var object
     * @access public
     */
    public $app;

    /**
     * 应用名称$appName。
     * The global appName.
     * 
     * @var string
     * @access public
     */
    public $appName;

    /**
     * 全局对象$config。
     * The global $config object.
     * 
     * @var object
     * @access public
     */
    public $config;

    /**
     * 全局对象$lang。
     * The global $lang object.
     * 
     * @var object
     * @access public
     */
    public $lang;

    /**
     * 全局对象$dbh，数据库连接句柄。
     * The global $dbh object, the database connection handler.
     * 
     * @var object
     * @access public
     */
    public $dbh;

    /**
     * $dao对象，用于访问或者更新数据库。
     * The $dao object, used to access or update database.
     * 
     * @var object
     * @access public
     */
    public $dao;

    /**
     * $post对象，用于访问$_POST变量。
     * The $post object, used to access the $_POST var.
     * 
     * @var ojbect
     * @access public
     */
    public $post;

    /**
     * $get对象，用于访问$_GET变量。
     * The $get object, used to access the $_GET var.
     * 
     * @var ojbect
     * @access public
     */
    public $get;

    /**
     * $session对象，用于访问$_SESSION变量。
     * The $session object, used to access the $_SESSION var.
     * 
     * @var ojbect
     * @access public
     */
    public $session;

    /**
     * $server对象，用于访问$_SERVER变量。
     * The $server object, used to access the $_SERVER var.
     * 
     * @var ojbect
     * @access public
     */
    public $server;

    /**
     * $cookie对象，用于访问$_COOKIE变量。
     * The $cookie object, used to access the $_COOKIE var.
     * 
     * @var ojbect
     * @access public
     */
    public $cookie;

    /**
     * $global对象，用于访问$_GLOBAL变量。
     * The $global object, used to access the $_GLOBAL var.
     * 
     * @var ojbect
     * @access public
     */
    public $global;

    /**
     * 构造方法。
     * 1. 将全局变量设为model类的成员变量，方便model的派生类调用；
     * 2. 设置$config, $lang, $dbh, $dao。
     * 
     * The construct function.
     * 1. global the global vars, refer them by the class member such as $this->app.
     * 2. set the pathes, config, lang of current module
     *
     * @param  string $appName 
     * @access public
     * @return void
     */
    public function __construct($appName = '')
    {
        global $app, $config, $lang, $dbh;
        $this->app     = $app;
        $this->config  = $config;
        $this->lang    = $lang;
        $this->dbh     = $dbh;
        $this->appName = empty($appName) ? $this->app->getAppName() : $appName;

        $moduleName = $this->getModuleName();
        $this->app->loadLang($moduleName, $this->appName);
        $this->app->loadConfig($moduleName, $this->appName, $exitIfNone = false);

        $this->loadDAO();
        $this->setSuperVars();
    }

    /**
     * 获取该model的模块名，而不是用户请求的模块名。
     *
     * 这个方法通过去掉该model类名的'ext'和'model'字符串，来获取当前模块名。
     * 不要使用$app->getModuleName()，因为其返回的是用户请求的模块名。
     * 另一个model可以通过loadModel()加载进来，与请求的模块名不一致。
     * 
     * Get the module name of this model. Not the module user visiting.
     *
     * This method replace the 'ext' and 'model' string from the model class name, thus get the module name.
     * Not using $app->getModuleName() because it return the module user is visiting. But one module can be
     * loaded by loadModel() so we must get the module name of this model.
     *
     * @access public
     * @return string the module name.
     */
    public function getModuleName()
    {
        $parentClass = get_parent_class($this);
        $selfClass   = get_class($this);
        $className   = $parentClass == 'model' ? $selfClass : $parentClass;
        if($className == 'extensionModel') return 'extension';
        return strtolower(str_ireplace(array('ext', 'Model'), '', $className));
    }

    /**
     * 设置全局超级变量。
     * Set the super vars.
     * 
     * @access public
     * @return void
     */
    public function setSuperVars()
    {
        $this->post    = $this->app->post;
        $this->get     = $this->app->get;
        $this->server  = $this->app->server;
        $this->cookie  = $this->app->cookie;
        $this->session = $this->app->session;
        $this->global  = $this->app->global;
    }

    /**
     * 加载一个模块的model。加载完成后，使用$this->$moduleName来访问这个model对象。
     * 比如：loadModel('user')引入user模块的model实例对象，可以通过$this->user来访问它。
     *
     * Load the model of one module. After loaded, can use $this->$moduleName to visit the model object.
     * 
     * @param   string  $moduleName
     * @access  public
     * @return  object|bool  the model object or false if model file not exists.
     */
    public function loadModel($moduleName, $appName = '')
    {
        if(empty($moduleName)) return false;
        if(empty($appName)) $appName = $this->appName;
        $modelFile = helper::setModelFile($moduleName, $appName);

        if(!helper::import($modelFile)) return false;
        $modelClass = class_exists('ext' . $appName . $moduleName. 'model') ? 'ext' . $appName . $moduleName . 'model' : $appName . $moduleName . 'model';
        if(!class_exists($modelClass))
        {
            $modelClass = class_exists('ext' . $moduleName. 'model') ? 'ext' . $moduleName . 'model' : $moduleName . 'model';
            if(!class_exists($modelClass)) $this->app->triggerError(" The model $modelClass not found", __FILE__, __LINE__, $exit = true);
        }

        $this->$moduleName = new $modelClass($appName);
        return $this->$moduleName;
    }

    /**
     * 加载model的class扩展。
     * Load extension class of a model. Saved to $moduleName/ext/model/class/$extensionName.class.php.
     * 
     * @param  string $extensionName 
     * @param  string $moduleName 
     * @access public
     * @return void
     */
    public function loadExtension($extensionName, $moduleName = '')
    {
        if(empty($extensionName)) return false;

        /* Set extenson name and extension file. */
        $extensionName = strtolower($extensionName);
        $moduleName    = $moduleName ? $moduleName : $this->getModuleName();
        $moduleExtPath = $this->app->getModuleExtPath($this->appName, $moduleName, 'model');
        if(!empty($moduleExtPath['site']))$extensionFile = $moduleExtPath['site'] . 'class/' . $extensionName . '.class.php';
        if(!isset($extensionFile) or !file_exists($extensionFile)) $extensionFile = $moduleExtPath['common'] . 'class/' . $extensionName . '.class.php';

        /* Try to import parent model file auto and then import the extension file. */
        if(!class_exists($moduleName . 'Model')) helper::import($this->app->getModulePath($this->appName, $moduleName) . 'model.php');
        if(!helper::import($extensionFile)) return false;

        /* Set the extension class name. */
        $extensionClass = $extensionName . ucfirst($moduleName);
        if(!class_exists($extensionClass)) return false;

        /* Create an instance of the extension class and return it. */
        $extensionObject = new $extensionClass;
        $extensionClass  = str_replace('Model', '', $extensionClass);
        $this->$extensionClass = $extensionObject;
        return $extensionObject;
    }

    /**
     * 加载DAO。
     * Load DAO.
     * 
     * @access public
     * @return void
     */
    public function loadDAO()
    {
        $this->dao = $this->app->loadClass('dao');
    }

    /**
     * 删除记录
     * Delete one record.
     * 
     * @param  string    $table  the table name
     * @param  string    $id     the id value of the record to be deleted
     * @access public
     * @return void
     */
    public function delete($table, $id)
    {
        $this->dao->delete()->from($table)->where('id')->eq($id)->exec();
    }
}
