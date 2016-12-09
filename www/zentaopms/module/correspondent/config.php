<?php
	$config->correspondent = new stdClass();
	global $lang,$app;
	$app->loadLang('correspondent');
	$func =  $app->getMethodName();
	$config->correspondent->search['module'] = 'correspondent';
	if ($func == "index") {
		$config->correspondent->search['fields']['companyname'] = $lang->correspondent->companyname;
		$config->correspondent->search['fields']['projects'] = $lang->correspondent->project;
		$config->correspondent->search['fields']['promanager'] = $lang->correspondent->promanager;
		$config->correspondent->search['fields']['contractid'] = $lang->correspondent->contractid;

		$config->correspondent->search['params']['companyname']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
		$config->correspondent->search['params']['projects']          = array('operator' => '=', 'control' => 'select',  'values' => '');
		$config->correspondent->search['params']['promanager']          = array('operator' => '=', 'control' => 'select',  'values' => '');
		$config->correspondent->search['params']['contractid']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
	}

	if ($func == "check") {
		$config->correspondent->search['fields']['companyname'] = $lang->correspondent->checkcommon;
		$config->correspondent->search['fields']['projects'] = $lang->correspondent->project;
		$config->correspondent->search['fields']['promanager'] = $lang->correspondent->promanager;
		$config->correspondent->search['fields']['applytor'] = $lang->correspondent->applytor;

		$config->correspondent->search['params']['companyname']          = array('operator' => 'include', 'control' => 'input',  'values' => '');
		$config->correspondent->search['params']['projects']          = array('operator' => '=', 'control' => 'select',  'values' => '');
		$config->correspondent->search['params']['promanager']          = array('operator' => '=', 'control' => 'select',  'values' => '');
		$config->correspondent->search['params']['applytor']          = array('operator' => '=', 'control' => 'select',  'values' => '');
	}
	