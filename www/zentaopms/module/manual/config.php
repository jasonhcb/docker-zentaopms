<?php
global $lang;

$config->manual = new stdclass();
$config->manual->createLib = new stdclass();
$config->manual->editLib   = new stdclass();
$config->manual->create    = new stdclass();
$config->manual->edit      = new stdclass();

$config->manual->createLib->requiredFields = 'name';
$config->manual->editLib->requiredFields   = 'name';
$config->manual->create->requiredFields = 'title';
$config->manual->edit->requiredFields   = 'title';

$config->manual->editor = new stdclass();
$config->manual->editor->create = array('id' => 'content', 'tools' => 'fullTools');
$config->manual->editor->edit   = array('id' => 'content', 'tools' => 'fullTools');
