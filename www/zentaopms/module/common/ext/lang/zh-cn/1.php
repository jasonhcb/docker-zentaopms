<?php
$lang->welcome        = "%s产品研发管理平台";

$lang->menu->distribution = '分发|distribution|index';
/* 分发视图菜单设置。 */
$lang->distribution = new stdclass();
$lang->distribution->menu = new stdclass();

// $lang->distribution->menu->list          = '%s';
// $lang->distribution->menu->browse        = array('link' => '分发|distribution|browse');
$lang->distribution->menu->release       = array('link' => '分发列表|distribution|index');
$lang->distribution->menu->download      = array('link' => '下载|distribution|download');

$lang->project->menu->custommanage  = array('link' => '外部用户|project|custommanage|projectID=%s', 'alias' => 'addcustommember');
/* 客户视图菜单设置*/
$lang->menu->correspondent = '客户|correspondent|index';
$lang->correspondent = new stdclass();
$lang->correspondent->menu = new stdclass();

$lang->correspondent->menu->index = array('link' => '客户管理|correspondent|index','alias' => 'index,create,edit,myflow,detail');
$lang->correspondent->menu->check = array('link' => '审批关联|correspondent|check','alias' => 'check');
/* end */
$lang->menu->hdc    = 'HDC|hdc|browse';
/* HDC视图菜单设置。*/
$lang->hdc = new stdclass();
$lang->hdc->menu = new stdclass();
$funcarray = array('browse','hdcdevcount','hdcquestion');
if (in_array($_GET['f'],$funcarray)) {
	$lang->hdc->menu->projectselect = array('link' => '%s', 'fixed' => true);
}
// $lang->hdc->menu->browse = array('link' => '开发项|hdc|browse|projectID=%s','alias' => 'showimport,edit');
$lang->hdc->menu->hdcproject = array('link' => '项目|hdc|browse|projectID=%s','alias' => 'showimport,edit,hdcdevcount,hdcquestion');
$lang->hdc->menu->hdcstatic = array('link' => '统计|hdc|hdcstatic','alias' => 'hdcsummary,peosummary');
$lang->hdc->menu->hdcplan = array('link' => '计划|hdc|hdcplan','alias' => 'hdcplan,hdcdetailplan,hdceditplan');
$lang->hdc->menu->hdcmanage = array('link' => '管理|hdc|hdcmanage','alias' => 'hdcmanage,hdcmaintenance,hdcundone,hdcallcation,managerall,centerall,centerusercreate,frameall,createframe,createcation,manageedit,allcationedit,createmanager,editmanager');

$lang->company->menu->browseBulletin      =   array('link' => '公告|bulletin|browse', 'subModule' => 'bulletin');
/* 公告视图菜单设置。*/
$lang->bulletin = new stdclass();

$lang->bulletin->menu = $lang->company->menu;

$lang->menugroup->bulletin       = 'company';

$lang->icons['bulletin']     = 'bulletin';

$lang->report->menu->product = array('link' => $lang->productCommon . '|report|productsummary', 'alias' => 'productstatistics');
$lang->report->menu->prj     = array('link' => $lang->projectCommon . '|report|projectdeviation', 'alias' => 'projectdays');
