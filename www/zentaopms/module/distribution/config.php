<?php 
$config->distribution = new stdclass();
global $lang, $app;
$app->loadLang('distribution');
$func =  $app->getMethodName();
$config->distribution->search['module'] = 'distribution';
if ($func == "index") {
    $config->distribution->search['fields']['productName'] = $lang->distribution->projectname;
    $config->distribution->search['fields']['name'] = $lang->distribution->name;
    $config->distribution->search['fields']['manager'] = $lang->distribution->manager;
    $config->distribution->search['fields']['build'] = $lang->distribution->build;
    $config->distribution->search['fields']['date'] = $lang->distribution->date;

    $config->distribution->search['params']['productName']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
    $config->distribution->search['params']['name']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
    $config->distribution->search['params']['manager']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
    $config->distribution->search['params']['build']       = array('operator' => 'include', 'control' => 'input',  'values' => '');
    $config->distribution->search['params']['date']       = array('operator' => '>=', 'control' => 'input',  'values' => '','class' => 'date');
}
