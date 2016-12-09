<?php 
$config->hdc = new stdclass();
$config->hdc->importFields = 'code,name,desc,step,deadline,type,rating,funcDesign,techDesign,codeDevelop,remoteTest,siteAccept,remoteHead,siteHead,
    funcOwnership,devOwnership,estReqSubmitDate,estCodeStartDate,estCodeEndDate,estTestEndDate,actReqSubmitDate,actCodeStartDate,actCodeEndDate,actTestEndDate';

global $lang, $app;
$app->loadLang('hdc');
$func =  $app->getMethodName();
$config->hdc->search['module']             = 'hdc';
if ($func == "hdcmanage") {
    $config->hdc->search['fields']['center_code'] = $lang->hdc->centerncode;
    $config->hdc->search['fields']['center_name'] = $lang->hdc->centername;
    $config->hdc->search['fields']['realname'] = $lang->hdc->centermanager;
    $config->hdc->search['fields']['name'] = $lang->hdc->hrorg;

    $config->hdc->search['params']['center_code']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
    $config->hdc->search['params']['center_name']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
    $config->hdc->search['params']['realname']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
    $config->hdc->search['params']['name']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
}

//中心人员清单
if ($func == "centerall") {
    $config->hdc->search['fields']['name'] = $lang->hdc->department;
    $config->hdc->search['fields']['account'] = $lang->hdc->usernumber;
    $config->hdc->search['fields']['username'] = $lang->hdc->name;
    // $config->hdc->search['fields']['status'] = $lang->hdc->status;
    $config->hdc->search['fields']['fromway'] = $lang->hdc->from;

    $config->hdc->search['params']['name']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
    $config->hdc->search['params']['account']       = array('operator' => '=', 'control' => 'select',  'values' => 'users');
    // $config->hdc->search['params']['status']          = array('operator' => 'include', 'control' => 'select',  'values' => $lang->hdc->statutype);
    $config->hdc->search['params']['username']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
    $config->hdc->search['params']['fromway']       = array('operator' => '=', 'control' => 'select',  'values' => $lang->hdc->fromtype);

}

//框架信息列表
if ($func == "frameall") {
    $config->hdc->search['fields']['name'] = $lang->hdc->framework;
    $config->hdc->search['fields']['description'] = $lang->hdc->framedesprition;

    $config->hdc->search['params']['name']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
    $config->hdc->search['params']['description']       = array('operator' => '=', 'control' => 'input',  'values' => '');
}

//管理人员
if ($func == "managerall") {
    $config->hdc->search['fields']['account'] = $lang->hdc->usernumber;
    $config->hdc->search['fields']['username'] = $lang->hdc->name;
    $config->hdc->search['fields']['route'] = $lang->hdc->routefile;

    $config->hdc->search['params']['account']          = array('operator' => '=', 'control' => 'input',  'values' => '');
    $config->hdc->search['params']['username']       = array('operator' => '=', 'control' => 'input',  'values' => '');
    $config->hdc->search['params']['route']       = array('operator' => '=', 'control' => 'select',  'values' => $lang->hdc->routetype);
}

//项目分配
if ($func == "hdcallcation") {
    $config->hdc->search['fields']['name'] = $lang->hdc->project;
    $config->hdc->search['fields']['applystatus'] = $lang->hdc->applystatus;
    $config->hdc->search['fields']['assignstatus'] = $lang->hdc->assignstatus;
    $config->hdc->search['fields']['center_name'] = $lang->hdc->assigntocenter;
    $config->hdc->search['fields']['projectframe'] = $lang->hdc->projectframe;

    $config->hdc->search['params']['name']          = array('operator' => '=', 'control' => 'input',  'values' => '');
    $config->hdc->search['params']['applystatus']       = array('operator' => '=', 'control' => 'select',  'values' => $lang->hdc->statustype);
    $config->hdc->search['params']['assignstatus']       = array('operator' => '=', 'control' => 'select',  'values' => $lang->hdc->assigntype);
    $config->hdc->search['params']['center_name']       = array('operator' => '=', 'control' => 'input',  'values' => '');
    $config->hdc->search['params']['projectframe']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
}

//未完成开发统计
if ($func == "hdcundone") {
    $config->hdc->search['fields']['center_name'] = $lang->hdc->centername;
    $config->hdc->search['params']['center_name']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
}
$config->hdc->batchCreate = '10';

//当是browse模块的时候
if ($func == 'browse') {

$config->hdc->search['fields']['code']    = $lang->hdc->code;
$config->hdc->search['fields']['name']       = $lang->hdc->name;
$config->hdc->search['fields']['step']   = $lang->hdc->step;
$config->hdc->search['fields']['desc'] = $lang->hdc->desc;
$config->hdc->search['fields']['deadline']    = $lang->hdc->deadline;
$config->hdc->search['fields']['type']   = $lang->hdc->type;
$config->hdc->search['fields']['rating']      = $lang->hdc->rating;
$config->hdc->search['fields']['funcDesign']      = $lang->hdc->funcDesign;
$config->hdc->search['fields']['techDesign']      = $lang->hdc->techDesign;
$config->hdc->search['fields']['codeDevelop']      = $lang->hdc->codeDevelop;
$config->hdc->search['fields']['remoteTest']      = $lang->hdc->remoteTest;
$config->hdc->search['fields']['siteAccept']      = $lang->hdc->siteAccept;
$config->hdc->search['fields']['remoteHead']      = $lang->hdc->remoteHead;
$config->hdc->search['fields']['siteHead']      = $lang->hdc->siteHead;
$config->hdc->search['fields']['funcOwnership']      = $lang->hdc->funcOwnership;
$config->hdc->search['fields']['devOwnership']      = $lang->hdc->devOwnership;

$config->hdc->search['params']['code']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->hdc->search['params']['name']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->hdc->search['params']['step']         = array('operator' => '=',       'control' => 'select', 'values' => $lang->hdc->lustepList);
$config->hdc->search['params']['desc']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->hdc->search['params']['deadline']     = array('operator' => '>=', 'control' => 'input', 'values' => '', 'class' => 'date');
$config->hdc->search['params']['type']         = array('operator' => '=',       'control' => 'select', 'values' => $lang->hdc->lutypeList);
$config->hdc->search['params']['rating']         = array('operator' => '=',       'control' => 'select', 'values' => $lang->hdc->luratingList);
$config->hdc->search['params']['funcDesign']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->hdc->search['params']['techDesign']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->hdc->search['params']['codeDevelop']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->hdc->search['params']['remoteTest']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->hdc->search['params']['siteAccept']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->hdc->search['params']['remoteHead']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->hdc->search['params']['siteHead']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
$config->hdc->search['params']['funcOwnership']          = array('operator' => '=',       'control' => 'select', 'values' => $lang->hdc->lufuncOSList);
$config->hdc->search['params']['devOwnership']            = array('operator' => '=',       'control' => 'select', 'values' => $lang->hdc->ludevOSList);
}

//详细计划搜索
if ($func == 'hdcdetailplan') {
    $config->hdc->search['fields']['plandate'] = $lang->hdc->date;
    $config->hdc->search['fields']['projectname'] = $lang->hdc->hdcproject;

    $config->hdc->search['params']['plandate']       = array('operator' => '>=', 'control' => 'input',  'values' => '', 'class' => 'date');
    $config->hdc->search['params']['projectname']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
}

if ($func == 'hdcplan') {

    $config->hdc->search['fields']['department'] = $lang->hdc->department;
    $config->hdc->search['fields']['account'] = $lang->hdc->usernumber.'/'.$lang->hdc->realname;
    $config->hdc->search['fields']['freetime'] = $lang->hdc->plan->freetime;

    $config->hdc->search['params']['department']       = array('operator' => 'include', 'control' => 'input',  'values' =>'');
    $config->hdc->search['params']['account']       = array('operator' => '=', 'control' => 'select',  'values' => 'users');
    $config->hdc->search['params']['freetime']  = array('operator' => '=', 'control' => 'select',  'values' => $lang->hdc->plan->freelist);
}

if ($func == 'hdcsummary') {

    $config->hdc->search['fields']['projects'] = $lang->hdc->project;
    $config->hdc->search['fields']['assigntocenter'] = $lang->hdc->assigntocenter;
    $config->hdc->search['fields']['uatdate'] = $lang->hdc->uatdate;
    $config->hdc->search['fields']['onlinedate'] = $lang->hdc->onlinedate;
    $config->hdc->search['fields']['hdcimporttime'] = $lang->hdc->summary->hdcimporttime;

    $config->hdc->search['params']['projects']       = array('operator' => '=', 'control' => 'select',  'values' =>'');
    $config->hdc->search['params']['assigntocenter']       = array('operator' => '=', 'control' => 'select',  'values' => '');
    $config->hdc->search['params']['uatdate']  = array('operator' => '>=', 'control' => 'input',  'values' => '' ,'class' => 'date');
    $config->hdc->search['params']['onlinedate']  = array('operator' => '>=', 'control' => 'input',  'values' => '' ,'class' => 'date');
    $config->hdc->search['params']['hdcimporttime']  = array('operator' => '>=', 'control' => 'input',  'values' => '' ,'class' => 'date');
}

if ($func == 'peosummary') {

    $config->hdc->search['fields']['department'] = $lang->hdc->department;
    $config->hdc->search['fields']['account'] = $lang->hdc->usernumber.'/'.$lang->hdc->realname;
    $config->hdc->search['fields']['actCodeStartDate'] = $lang->hdc->actCodeStartDate;
    $config->hdc->search['fields']['actReqSubmitDate'] = $lang->hdc->actReqSubmitDate;
    // $config->hdc->search['fields']['hdcimporttime'] = $lang->hdc->summary->hdcimporttime;

    $config->hdc->search['params']['department']       = array('operator' => 'include', 'control' => 'input',  'values' =>'');
    $config->hdc->search['params']['account']       = array('operator' => '=', 'control' => 'select',  'values' => 'users');
    $config->hdc->search['params']['actCodeStartDate']  = array('operator' => '>=', 'control' => 'input',  'values' => '' ,'class' => 'date');
    $config->hdc->search['params']['actReqSubmitDate']  = array('operator' => '>=', 'control' => 'input',  'values' => '' ,'class' => 'date');
    // $config->hdc->search['params']['hdcimporttime']  = array('operator' => '>=', 'control' => 'input',  'values' => '' ,'class' => 'date');
}

if ($func == 'peosummarydetail') {
    $config->hdc->search['fields']['projects'] = $lang->hdc->project;
    $config->hdc->search['fields']['hdcimporttime'] = $lang->hdc->summary->hdcimporttime;

    $config->hdc->search['params']['projects']       = array('operator' => '=', 'control' => 'select',  'values' =>'');
    $config->hdc->search['params']['hdcimporttime']  = array('operator' => '>=', 'control' => 'input',  'values' => '' ,'class' => 'date');
}

$config->hdc->designManday = array(
    'Form' => array(
        'Very Easy' => 0.5,
        'Easy' => 1.5,
        'Medium' => 3,
        'Complex' => 5,
    ),
    'Form Mod' => array(
        'Very Easy' => 0.25,
        'Easy' => 0.75,
        'Medium' => 1.5,
        'Complex' => 2.5,
    ),
    'Report' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2.5,
        'Complex' => 4,
    ),
    'Report Mod' => array(
        'Very Easy' => 0.25,
        'Easy' => 0.5,
        'Medium' => 1.25,
        'Complex' => 2,
    ),
    'Program' => array(
        'Very Easy' => 0.5,
        'Easy' => 2,
        'Medium' => 3,
        'Complex' => 6,
    ),
    'Interface' => array(
        'Very Easy' => 0.5,
        'Easy' => 2,
        'Medium' => 3,
        'Complex' => 6,
    ),
    'DB Trigger' => array(
        'Very Easy' => 0.5,
        'Easy' => 2,
        'Medium' => 3,
        'Complex' => 6,
    ),
    'Menu' => array(
        'Very Easy' => 0.25,
        'Easy' => 0.25,
        'Medium' => 0.25,
        'Complex' => 0.5,
    ),
    'Table' => array(
        'Very Easy' => 0.25,
        'Easy' => 0.25,
        'Medium' => 0.5,
        'Complex' => 0.5,
    ),
    'SRS' => array(
        'Very Easy' => 0.25,
        'Easy' => 0.75,
        'Medium' => 1.5,
        'Complex' => 2.5,
    ),
    'Flexfield' => array(
        'Very Easy' => 0.5,
        'Easy' => 2,
        'Medium' => 3,
        'Complex' => 6,
    ),
    'WorkFlow' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 3,
        'Complex' => 5,
    ),
    'WorkFlow Mod' => array(
        'Very Easy' => 0.25,
        'Easy' => 0.5,
        'Medium' => 2,
        'Complex' => 4,
    ),
    'Discover' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2,
        'Complex' => 3.5,
    ),
    'Form Personalization' => array(
        'Very Easy' => 0.25,
        'Easy' => 0.75,
        'Medium' => 1.5,
        'Complex' => 2.5,
    ),
    'XML Publisher' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2.5,
        'Complex' => 4,
    ),
    'OAF' => array(
        'Very Easy' => 1,
        'Easy' => 2,
        'Medium' => 4,
        'Complex' => 6,
    ),
    'WebADI' => array(
        'Very Easy' => 0.5,
        'Easy' => 2,
        'Medium' => 3,
        'Complex' => 6,
    ),
);
$config->hdc->SAPdesignManday = array(
    'Dialog' => array(
        'Very Easy' => 1,
        'Easy' => 1.5,
        'Medium' => 3,
        'Complex' => 6,
    ),
    'Report' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2,
        'Complex' => 4,
    ),
    'Smartforms' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2,
        'Complex' => 3,
    ),
    'Interface' => array(
        'Very Easy' => 1,
        'Easy' => 1.5,
        'Medium' => 3,
        'Complex' => 6,
    ),
    'Enhacement' => array(
        'Very Easy' => 0.25,
        'Easy' => 1,
        'Medium' => 2,
        'Complex' => 3,
    ),
    'WebDynpro' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2,
        'Complex' => 4,
    ),
    'BatchInput' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2,
        'Complex' => 3,
    ),
    'UI5' => array(
        'Very Easy' => 1,
        'Easy' => 1.5,
        'Medium' => 3,
        'Complex' => 6,
    ),
);
$config->hdc->buildManday = array(
    'Form' => array(
        'Very Easy' => 1,
        'Easy' => 2,
        'Medium' => 5,
        'Complex' => 10,
    ),
    'Form Mod' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2.5,
        'Complex' => 5,
    ),
    'Report' => array(
        'Very Easy' => 1,
        'Easy' => 2,
        'Medium' => 4,
        'Complex' => 6,
    ),
    'Report Mod' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2,
        'Complex' => 3,
    ),
    'Program' => array(
        'Very Easy' => 1,
        'Easy' => 3,
        'Medium' => 6,
        'Complex' => 10,
    ),
    'Interface' => array(
        'Very Easy' => 1,
        'Easy' => 3,
        'Medium' => 6,
        'Complex' => 10,
    ),
    'DB Trigger' => array(
        'Very Easy' => 1,
        'Easy' => 3,
        'Medium' => 6,
        'Complex' => 10,
    ),
    'Menu' => array(
        'Very Easy' => 0.5,
        'Easy' => 0.5,
        'Medium' => 0.5,
        'Complex' => 1,
    ),
    'Table' => array(
        'Very Easy' => 0.25,
        'Easy' => 0.5,
        'Medium' => 0.75,
        'Complex' => 1,
    ),
    'SRS' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2.5,
        'Complex' => 5,
    ),
    'Flexfield' => array(
        'Very Easy' => 1,
        'Easy' => 3,
        'Medium' => 6,
        'Complex' => 10,
    ),
    'WorkFlow' => array(
        'Very Easy' => 1,
        'Easy' => 2,
        'Medium' => 5,
        'Complex' => 8,
    ),
    'WorkFlow Mod' => array(
        'Very Easy' => 0.5,
        'Easy' => 1.5,
        'Medium' => 3,
        'Complex' => 5,
    ),
    'Discover' => array(
        'Very Easy' => 0.5,
        'Easy' => 1.5,
        'Medium' => 3,
        'Complex' => 6,
    ),
    'Form Personalization' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2.5,
        'Complex' => 5,
    ),
    'XML Publisher' => array(
        'Very Easy' => 1,
        'Easy' => 2,
        'Medium' => 4,
        'Complex' => 6,
    ),
    'OAF' => array(
        'Very Easy' => 1,
        'Easy' => 2,
        'Medium' => 5,
        'Complex' => 10,
    ),
    'WebADI' => array(
        'Very Easy' => 1,
        'Easy' => 3,
        'Medium' => 6,
        'Complex' => 10,
    ),
);
$config->hdc->SAPbuildManday = array(
    'Dialog' => array(
        'Very Easy' => 1,
        'Easy' => 3,
        'Medium' => 6,
        'Complex' => 10,
    ),
    'Report' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 2,
        'Complex' => 5,
    ),
    'Smartforms' => array(
        'Very Easy' => 1,
        'Easy' => 2,
        'Medium' => 4,
        'Complex' => 7,
    ),
    'Interface' => array(
        'Very Easy' => 1,
        'Easy' => 2,
        'Medium' => 3,
        'Complex' => 5,
    ),
    'Enhacement' => array(
        'Very Easy' => 0.5,
        'Easy' => 1,
        'Medium' => 3,
        'Complex' => 5,
    ),
    'WebDynpro' => array(
        'Very Easy' => 1,
        'Easy' => 2,
        'Medium' => 5,
        'Complex' => 7,
    ),
    'BatchInput' => array(
        'Very Easy' => 1,
        'Easy' => 2,
        'Medium' => 4,
        'Complex' => 7,
    ),
    'UI5' => array(
        'Very Easy' => 1,
        'Easy' => 3,
        'Medium' => 6,
        'Complex' => 10,
    ),
);