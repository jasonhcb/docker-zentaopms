<?php
/**
 * The common simplified chinese file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     ZenTaoPMS
 * @version     $Id: zh-cn.php 5116 2013-07-12 06:37:48Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
$lang->arrow     = '&nbsp;<i class="icon-angle-right"></i>&nbsp;';
$lang->colon     = '::';
$lang->comma     = '，';
$lang->dot       = '。';
$lang->at        = ' 于 ';
$lang->downArrow = '↓';
$lang->null      = '空';
$lang->ellipsis  = '…';

$lang->zentaoPMS      = '禅道';
$lang->welcome        = "%s项目管理系统";
$lang->logout         = '退出';
$lang->login          = '登录';
$lang->help           = '帮助';
$lang->aboutZenTao    = '关于';
$lang->profile        = '个人档案';
$lang->changePassword = '更改密码';
$lang->runInfo        = "<div class='row'><div class='u-1 a-center' id='debugbar'>时间: %s 毫秒, 内存: %s KB, 查询: %s.  </div></div>";
$lang->agreement      = "已阅读并同意<a href='http://zpl.pub/page/zplv12.html' target='_blank'>《Z PUBLIC LICENSE授权协议1.2》</a>。<span class='text-danger'>未经许可，不得去除、隐藏或遮掩禅道软件的任何标志及链接。</span>";

$lang->reset        = '重填';
$lang->refresh      = '刷新';
$lang->edit         = '编辑';
$lang->delete       = '删除';
$lang->close        = '关闭';
$lang->unlink       = '移除';
$lang->import       = '导入';
$lang->export       = '导出';
$lang->setFileName  = '文件名：';
$lang->submitting   = '稍候...';
$lang->save         = '保存';
$lang->confirm      = '确认';
$lang->preview      = '查看';
$lang->goback       = '返回';
$lang->goPC         = 'PC版';
$lang->more         = '更多';
$lang->day          = '天';
$lang->customConfig = '自定义';
$lang->public       = '公共';

$lang->actions         = '操作';
$lang->comment         = '备注';
$lang->history         = '历史记录';
$lang->attatch         = '附件';
$lang->reverse         = '切换顺序';
$lang->switchDisplay   = '切换显示';
$lang->addFiles        = '上传了附件 ';
$lang->files           = '附件 ';
$lang->pasteText       = '粘贴文本 ';
$lang->uploadImages    = '多图上传 ';
$lang->timeout         = '连接超时，请检查网络环境，或重试！';
$lang->repairTable     = '数据库表可能损坏，请用phpmyadmin或myisamchk检查修复。';
$lang->duplicate       = '已有相同标题的%s';
$lang->ipLimited       = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head><body>抱歉，管理员限制当前IP登录，请联系管理员解除限制。</body></html>";
$lang->unfold          = '+';
$lang->fold            = '-';
$lang->homepage        = '设为模块首页';
$lang->tutorial        = '新手教程';
$lang->changeLog       = '修改日志';
$lang->manual          = '手册';
$lang->customMenu      = '自定义导航';
$lang->tutorialConfirm = '检测到你尚未退出新手教程模式，是否现在退出？';

$lang->preShortcutKey  = '[快捷键:←]';
$lang->nextShortcutKey = '[快捷键:→]';

$lang->select        = '选择';
$lang->selectAll     = '全选';
$lang->selectReverse = '反选';
$lang->loading       = '稍候...';
$lang->notFound      = '抱歉，您访问的对象并不存在！';
$lang->showAll       = '[[全部显示]]';

$lang->future       = '未来';
$lang->year         = '年';
$lang->workingHour  = '工时';

$lang->idAB         = 'ID';
$lang->priAB        = 'P';
$lang->statusAB     = '状态';
$lang->openedByAB   = '创建';
$lang->assignedToAB = '指派';
$lang->typeAB       = '类型';

$lang->common = new stdclass();
$lang->common->common = '公有模块';

/* 主导航菜单。*/
$lang->menu = new stdclass();
$lang->menu->my       = '<i class="icon-home"></i><span> 我的地盘</span>|my|index';
$lang->menu->product  = $lang->productCommon . '|product|index';
$lang->menu->project  = $lang->projectCommon . '|project|index';
$lang->menu->qa       = '测试|qa|index';
$lang->menu->doc      = '文档|doc|index';
$lang->menu->report   = '统计|report|index';
$lang->menu->company  = '组织|company|index';
$lang->menu->admin    = '后台|admin|index';

/* 查询条中可以选择的对象列表。*/
$lang->searchObjects['bug']         = 'Bug';
$lang->searchObjects['story']       = '需求';
$lang->searchObjects['task']        = '任务';
$lang->searchObjects['testcase']    = '用例';
$lang->searchObjects['project']     = $lang->projectCommon;
$lang->searchObjects['product']     = $lang->productCommon;
$lang->searchObjects['user']        = '用户';
$lang->searchObjects['build']       = '版本';
$lang->searchObjects['release']     = '发布';
$lang->searchObjects['productplan'] = $lang->productCommon . '计划';
$lang->searchObjects['testtask']    = '测试版本';
$lang->searchObjects['doc']         = '文档';
$lang->searchTips                   = '编号(ctrl+g)';

/* 导入支持的编码格式。*/
$lang->importEncodeList['gbk']   = 'GBK';
$lang->importEncodeList['big5']  = 'BIG5';
$lang->importEncodeList['utf-8'] = 'UTF-8';

/* 导出文件的类型列表。*/
$lang->exportFileTypeList['csv']  = 'csv';
$lang->exportFileTypeList['xml']  = 'xml';
$lang->exportFileTypeList['html'] = 'html';

$lang->exportTypeList['all']      = '全部记录';
$lang->exportTypeList['selected'] = '选中记录';

/* 语言 */
$lang->lang = 'Language';

/* 风格列表。*/
$lang->theme                 = '主题';
$lang->themes['default']     = '默认';
$lang->themes['green']       = '绿色';
$lang->themes['red']         = '红色';
$lang->themes['lightblue']   = '亮蓝';
$lang->themes['blackberry']  = '黑莓';

/* 首页菜单设置。*/
$lang->index = new stdclass();
$lang->index->menu = new stdclass();

$lang->index->menu->product = "浏览{$lang->productCommon}|product|browse";
$lang->index->menu->project = "浏览{$lang->projectCommon}|project|browse";

/* 我的地盘菜单设置。*/
$lang->my = new stdclass();
$lang->my->menu = new stdclass();

$lang->my->menu->account        = array('link' => '<span id="myname"><i class="icon-user"></i> %s' . $lang->arrow . '</span>', 'fixed' => true);
$lang->my->menu->index          = '首页|my|index';
$lang->my->menu->todo           = array('link' => '待办|my|todo|', 'subModule' => 'todo');
$lang->my->menu->task           = array('link' => '任务|my|task|', 'subModule' => 'task');
$lang->my->menu->bug            = array('link' => 'Bug|my|bug|',   'subModule' => 'bug');
$lang->my->menu->testtask       = array('link' => '测试|my|testtask|', 'subModule' => 'testcase,testtask', 'alias' => 'testcase');
$lang->my->menu->story          = array('link' => '需求|my|story|',   'subModule' => 'story');
$lang->my->menu->myProject      = "{$lang->projectCommon}|my|project|";
$lang->my->menu->dynamic        = '动态|my|dynamic|';
$lang->my->menu->profile        = array('link' => '档案|my|profile', 'alias' => 'editprofile');
$lang->my->menu->changePassword = '密码|my|changepassword';
$lang->my->menu->manageContacts = '联系人|my|managecontacts';

$lang->todo = new stdclass();
$lang->todo->menu = $lang->my->menu;

/* 产品视图设置。*/
$lang->product = new stdclass();
$lang->product->menu = new stdclass();

$lang->product->menu->list    = array('link' => '%s', 'fixed' => true);
$lang->product->menu->story   = array('link' => '需求|product|browse|productID=%s', 'alias' => 'batchedit', 'subModule' => 'story');
$lang->product->menu->dynamic = '动态|product|dynamic|productID=%s';
$lang->product->menu->plan    = array('link' => '计划|productplan|browse|productID=%s', 'subModule' => 'productplan');
$lang->product->menu->release = array('link' => '发布|release|browse|productID=%s',     'subModule' => 'release');
$lang->product->menu->roadmap = '路线图|product|roadmap|productID=%s';
$lang->product->menu->doc     = array('link' => '文档|product|doc|productID=%s', 'subModule' => 'doc');
$lang->product->menu->branch  = '@branch@|branch|manage|productID=%s';
$lang->product->menu->module  = '模块|tree|browse|productID=%s&view=story';
$lang->product->menu->view    = array('link' => '概况|product|view|productID=%s', 'alias' => 'edit');
$lang->product->menu->project = "{$lang->projectCommon}|product|project|status=all&productID=%s";
$lang->product->menu->create  = array('link' => "<i class='icon-plus'></i>&nbsp;添加{$lang->productCommon}|product|create", 'float' => 'right');
$lang->product->menu->all     = array('link' => "<i class='icon-cubes'></i>&nbsp;所有{$lang->productCommon}|product|all|productID=%s", 'float' => 'right');
$lang->product->menu->index   = array('link' => "<i class='icon-home'></i>{$lang->productCommon}主页|product|index|locate=no", 'float' => 'right');

$lang->story       = new stdclass();
$lang->productplan = new stdclass();
$lang->release     = new stdclass();
$lang->branch      = new stdclass();

$lang->branch->menu      = $lang->product->menu;
$lang->story->menu       = $lang->product->menu;
$lang->productplan->menu = $lang->product->menu;
$lang->release->menu     = $lang->product->menu;

/* 项目视图菜单设置。*/
$lang->project = new stdclass();
$lang->project->menu = new stdclass();

$lang->project->menu->list      = array('link' => '%s', 'fixed' => true);
$lang->project->menu->task      = array('link' => '任务|project|task|projectID=%s', 'subModule' => 'task,tree', 'alias' => 'grouptask,importtask,burn,importbug,kanban,printkanban,tree');
$lang->project->menu->story     = array('link' => '需求|project|story|projectID=%s', 'subModule' => 'story', 'alias' => 'linkstory');
$lang->project->menu->bug       = 'Bug|project|bug|projectID=%s';
$lang->project->menu->dynamic   = '动态|project|dynamic|projectID=%s';
$lang->project->menu->build     = array('link' => '版本|project|build|projectID=%s', 'subModule' => 'build');
$lang->project->menu->testtask  = '测试|project|testtask|projectID=%s';
$lang->project->menu->team      = array('link' => '团队|project|team|projectID=%s', 'alias' => 'managemembers');
$lang->project->menu->doc       = array('link' => '文档|project|doc|porjectID=%s', 'subModule' => 'doc');
$lang->project->menu->product   = $lang->productCommon . '|project|manageproducts|projectID=%s';
$lang->project->menu->view      = array('link' => '概况|project|view|projectID=%s', 'alias' => 'edit,start,suspend,putoff,close');
$lang->project->menu->create    = array('link' => "<i class='icon-plus'></i>&nbsp;添加{$lang->projectCommon}|project|create", 'float' => 'right');
$lang->project->menu->all       = array('link' => "<i class='icon-th-large'></i>&nbsp;所有{$lang->projectCommon}|project|all|status=undone&projectID=%s", 'float' => 'right');
$lang->project->menu->index     = array('link' => "<i class='icon-home'></i>{$lang->projectCommon}主页|project|index|locate=no", 'float' => 'right');

$lang->task  = new stdclass();
$lang->build = new stdclass();
$lang->task->menu  = $lang->project->menu;
$lang->build->menu = $lang->project->menu;

/* QA视图菜单设置。*/
$lang->qa = new stdclass();
$lang->qa->menu = new stdclass();

$lang->qa->menu->product  = array('link' => '%s', 'fixed' => true);
$lang->qa->menu->bug      = array('link' => 'Bug|bug|browse|productID=%s');
$lang->qa->menu->testcase = array('link' => '用例|testcase|browse|productID=%s');
$lang->qa->menu->testtask = array('link' => '版本|testtask|browse|productID=%s');
$lang->qa->menu->index    = array('link' => "<i class='icon-home'></i>测试主页|qa|index|locate=no&productID=%s", 'float' => 'right');

$lang->bug = new stdclass();
$lang->bug->menu = new stdclass();

$lang->bug->menu->product  = array('link' => '%s', 'fixed' => true);
$lang->bug->menu->bug      = array('link' => 'Bug|bug|browse|productID=%s', 'alias' => 'view,create,batchcreate,edit,resolve,close,activate,report,batchedit,confirmbug,assignto', 'subModule' => 'tree');
$lang->bug->menu->testcase = array('link' => '用例|testcase|browse|productID=%s');
$lang->bug->menu->testtask = array('link' => '版本|testtask|browse|productID=%s');
$lang->bug->menu->index    = array('link' => "<i class='icon-home'></i>测试主页|qa|index|locate=no&productID=%s", 'float' => 'right');

$lang->testcase = new stdclass();
$lang->testcase->menu = new stdclass();

$lang->testcase->menu->product  = array('link' => '%s', 'fixed' => true);
$lang->testcase->menu->bug      = array('link' => 'Bug|bug|browse|productID=%s');
$lang->testcase->menu->testcase = array('link' => '用例|testcase|browse|productID=%s', 'alias' => 'view,create,batchcreate,edit,batchedit,showimport,groupcase', 'subModule' => 'tree');
$lang->testcase->menu->testtask = array('link' => '版本|testtask|browse|productID=%s', 'alias' => 'view,create,edit,linkcase,cases,start,close,batchrun,groupcase');
$lang->testcase->menu->index    = array('link' => "<i class='icon-home'></i>测试主页|qa|index|locate=no&productID=%s", 'float' => 'right');

$lang->testtask = new stdclass();
$lang->testtask->menu = $lang->testcase->menu;

/* 文档视图菜单设置。*/
$lang->doc = new stdclass();
$lang->doc->menu = new stdclass();

$lang->doc->menu->list    = array('link' => '%s', 'fixed' => true);
$lang->doc->menu->browse  = array('link' => '文档|doc|browse|libID=%s', 'alias' => 'view,create,edit');
$lang->doc->menu->edit    = '编辑|doc|editLib|libID=%s';
$lang->doc->menu->module  = '分类|tree|browse|libID=%s&viewType=doc';
$lang->doc->menu->delete  = array('link' => '删除|doc|deleteLib|libID=%s', 'target' => 'hiddenwin');
$lang->doc->menu->create  = array('link' => '<i class="icon-plus"></i>&nbsp;添加文档库|doc|createLib', 'float' => 'right');

/* 统计视图菜单设置。*/
$lang->report = new stdclass();
$lang->report->menu = new stdclass();

$lang->report->menu->product = array('link' => $lang->productCommon . '|report|productsummary');
$lang->report->menu->prj     = array('link' => $lang->projectCommon . '|report|projectdeviation');
$lang->report->menu->test    = array('link' => '测试|report|bugcreate', 'alias' => 'bugassign');
$lang->report->menu->staff   = array('link' => '组织|report|workload');

/* 组织结构视图菜单设置。*/
$lang->company = new stdclass();
$lang->company->menu = new stdclass();
$lang->company->menu->name         = array('link' => '%s' . $lang->arrow, 'fixed' => true);
$lang->company->menu->browseUser   = array('link' => '用户|company|browse', 'subModule' => 'user');
$lang->company->menu->dept         = array('link' => '部门|dept|browse', 'subModule' => 'dept');
$lang->company->menu->browseGroup  = array('link' => '权限|group|browse', 'subModule' => 'group');
$lang->company->menu->view         = array('link' => '公司|company|view', 'alias' => 'edit');
$lang->company->menu->dynamic      = '动态|company|dynamic|';
$lang->company->menu->addGroup     = array('link' => '<i class="icon-group"></i>&nbsp;添加分组|group|create', 'float' => 'right');
$lang->company->menu->batchAddUser = array('link' => '<i class="icon-plus-sign"></i>&nbsp;批量添加|user|batchCreate|dept=%s', 'subModule' => 'user', 'float' => 'right');
$lang->company->menu->addUser      = array('link' => '<i class="icon-plus"></i>&nbsp;添加用户|user|create|dept=%s', 'subModule' => 'user', 'float' => 'right');

$lang->dept  = new stdclass();
$lang->group = new stdclass();
$lang->user  = new stdclass();

$lang->dept->menu  = $lang->company->menu;
$lang->group->menu = $lang->company->menu;
$lang->user->menu  = $lang->company->menu;

/* 后台管理菜单设置。*/
$lang->admin = new stdclass();
$lang->admin->menu = new stdclass();
$lang->admin->menu->index     = array('link' => '首页|admin|index');
$lang->admin->menu->extension = array('link' => '插件|extension|browse', 'subModule' => 'extension');
$lang->admin->menu->custom    = array('link' => '自定义|custom|index', 'subModule' => 'custom');
$lang->admin->menu->mail      = array('link' => '发信|mail|index', 'subModule' => 'mail');
$lang->admin->menu->convert   = array('link' => '导入|convert|index', 'subModule' => 'convert');
$lang->admin->menu->backup    = array('link' => '备份|backup|index', 'subModule' => 'backup');
$lang->admin->menu->safe      = array('link' => '安全|admin|safe', 'alias' => 'checkweak');
$lang->admin->menu->cron      = array('link' => '计划任务|cron|index', 'subModule' => 'cron');
$lang->admin->menu->trashes   = array('link' => '回收站|action|trash', 'subModule' => 'action');
$lang->admin->menu->dev       = array('link' => '二次开发|dev|api', 'alias' => 'db', 'subModule' => 'dev,editor');
$lang->admin->menu->sso       = '然之集成|admin|sso';

$lang->convert   = new stdclass();
$lang->upgrade   = new stdclass();
$lang->action    = new stdclass();
$lang->backup    = new stdclass();
$lang->extension = new stdclass();
$lang->custom    = new stdclass();
$lang->editor    = new stdclass();
$lang->mail      = new stdclass();
$lang->cron      = new stdclass();
$lang->dev       = new stdclass();
$lang->search    = new stdclass();

$lang->convert->menu   = $lang->admin->menu;
$lang->upgrade->menu   = $lang->admin->menu;
$lang->action->menu    = $lang->admin->menu;
$lang->backup->menu    = $lang->admin->menu;
$lang->cron->menu      = $lang->admin->menu;
$lang->extension->menu = $lang->admin->menu;
$lang->custom->menu    = $lang->admin->menu;
$lang->editor->menu    = $lang->admin->menu;
$lang->mail->menu      = $lang->admin->menu;
$lang->dev->menu       = $lang->admin->menu;

/* 菜单分组。*/
$lang->menugroup = new stdclass();
$lang->menugroup->release     = 'product';
$lang->menugroup->story       = 'product';
$lang->menugroup->branch      = 'product';
$lang->menugroup->productplan = 'product';
$lang->menugroup->task        = 'project';
$lang->menugroup->build       = 'project';
$lang->menugroup->convert     = 'admin';
$lang->menugroup->upgrade     = 'admin';
$lang->menugroup->user        = 'company';
$lang->menugroup->group       = 'company';
$lang->menugroup->bug         = 'qa';
$lang->menugroup->testcase    = 'qa';
$lang->menugroup->testtask    = 'qa';
$lang->menugroup->people      = 'company';
$lang->menugroup->dept        = 'company';
$lang->menugroup->todo        = 'my';
$lang->menugroup->action      = 'admin';
$lang->menugroup->backup      = 'admin';
$lang->menugroup->cron        = 'admin';
$lang->menugroup->extension   = 'admin';
$lang->menugroup->custom      = 'admin';
$lang->menugroup->editor      = 'admin';
$lang->menugroup->mail        = 'admin';
$lang->menugroup->dev         = 'admin';

/* 错误提示信息。*/
$lang->error = new stdclass();
$lang->error->companyNotFound = "您访问的域名 %s 没有对应的公司。";
$lang->error->length          = array("『%s』长度错误，应当为『%s』", "『%s』长度应当不超过『%s』，且不小于『%s』。");
$lang->error->reg             = "『%s』不符合格式，应当为:『%s』。";
$lang->error->unique          = "『%s』已经有『%s』这条记录了。如果您确定该记录已删除，请到后台管理-回收站还原。。";
$lang->error->gt              = "『%s』应当大于『%s』。";
$lang->error->ge              = "『%s』应当不小于『%s』。";
$lang->error->notempty        = "『%s』不能为空。";
$lang->error->empty           = "『%s』必须为空。";
$lang->error->equal           = "『%s』必须为『%s』。";
$lang->error->int             = array("『%s』应当是数字。", "『%s』应当介于『%s-%s』之间。");
$lang->error->float           = "『%s』应当是数字，可以是小数。";
$lang->error->email           = "『%s』应当为合法的EMAIL。";
$lang->error->date            = "『%s』应当为合法的日期。";
$lang->error->account         = "『%s』应当为合法的用户名。";
$lang->error->passwordsame    = "两次密码应当相等。";
$lang->error->passwordrule    = "密码应该符合规则，长度至少为六位。";
$lang->error->accessDenied    = '您没有访问权限';
$lang->error->pasteImg        = '您的浏览器不支持粘贴图片！';
$lang->error->noData          = '没有数据';
$lang->error->editedByOther   = '该记录可能已经被改动。请刷新页面重新编辑！';
$lang->error->tutorialData    = '新手模式下不会插入数据，请退出新手模式操作';

/* 分页信息。*/
$lang->pager = new stdclass();
$lang->pager->noRecord  = "暂时没有记录";
$lang->pager->digest    = "共 <strong>%s</strong> 条记录，%s <strong>%s/%s</strong> &nbsp; ";
$lang->pager->recPerPage= "每页 <strong>%s</strong> 条";
$lang->pager->first     = "<i class='icon-step-backward' title='首页'></i>";
$lang->pager->pre       = "<i class='icon-play icon-rotate-180' title='上一页'></i>";
$lang->pager->next      = "<i class='icon-play' title='下一页'></i>";
$lang->pager->last      = "<i class='icon-step-forward' title='末页'></i>";
$lang->pager->locate    = "GO!";

$lang->proVersion     = "<a href='http://api.zentao.net/goto.php?item=proversion&from=footer' target='_blank' id='proLink' class='text-important'>专业版 <i class='text-danger icon-pro-version'></i></a> &nbsp; ";
$lang->downNotify     = "下载桌面提醒";

$lang->suhosinInfo   = "警告：数据太多，请在php.ini中修改<font color=red>sohusin.post.max_vars</font>和<font color=red>sohusin.request.max_vars</font>（设置更大的数）。 保存并重新启动apache，否则会造成部分数据无法保存。";
$lang->pasteTextInfo = "粘贴文本到文本域中，每行文字作为一条数据的标题。";
$lang->noticeImport  = "<p style='font-size:14px'>导入数据中，含有已经存在系统的数据，请确认这些数据要覆盖或者全新插入</p><p><a href='javascript:submitForm(\"cover\")' class='btn btn-mini'>覆盖</a> <a href='javascript:submitForm(\"insert\")' class='btn btn-mini'>全新插入</a></p>";

$lang->noResultsMatch     = "没有匹配结果";
$lang->searchMore         = "搜索此关键字的更多结果：";
$lang->chooseUsersToMail  = "选择要发信通知的用户...";
$lang->browserNotice      = '你目前使用的浏览器可能无法得到最佳浏览效果，建议使用Chrome、火狐、IE9+、Opera、Safari浏览器。';

/* 时间格式设置。*/
define('DT_DATETIME1',  'Y-m-d H:i:s');
define('DT_DATETIME2',  'y-m-d H:i');
define('DT_MONTHTIME1', 'n/d H:i');
define('DT_MONTHTIME2', 'n月d日 H:i');
define('DT_DATE1',     'Y-m-d');
define('DT_DATE2',     'Ymd');
define('DT_DATE3',     'Y年m月d日');
define('DT_DATE4',     'n月j日');
define('DT_TIME1',     'H:i:s');
define('DT_TIME2',     'H:i');

/* datepicker 时间*/
$lang->datepicker = new stdclass();

$lang->datepicker->dpText = new stdclass();
$lang->datepicker->dpText->TEXT_OR          = '或 ';
$lang->datepicker->dpText->TEXT_PREV_YEAR   = '去年';
$lang->datepicker->dpText->TEXT_PREV_MONTH  = '上月';
$lang->datepicker->dpText->TEXT_PREV_WEEK   = '上周';
$lang->datepicker->dpText->TEXT_YESTERDAY   = '昨天';
$lang->datepicker->dpText->TEXT_THIS_MONTH  = '本月';
$lang->datepicker->dpText->TEXT_THIS_WEEK   = '本周';
$lang->datepicker->dpText->TEXT_TODAY       = '今天';
$lang->datepicker->dpText->TEXT_NEXT_YEAR   = '明年';
$lang->datepicker->dpText->TEXT_NEXT_MONTH  = '下月';
$lang->datepicker->dpText->TEXT_CLOSE       = '关闭';
$lang->datepicker->dpText->TEXT_DATE        = '选择时间段';
$lang->datepicker->dpText->TEXT_CHOOSE_DATE = '选择日期';

$lang->datepicker->dayNames     = array('日', '一', '二', '三', '四', '五', '六');
$lang->datepicker->abbrDayNames = array('日', '一', '二', '三', '四', '五', '六');
$lang->datepicker->monthNames   = array('一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月');

/* Common action icons 通用动作图标 */
$lang->icons['todo']      = 'check';
$lang->icons['product']   = 'cube';
$lang->icons['bug']       = 'bug';
$lang->icons['task']      = 'check-sign';
$lang->icons['tasks']     = 'tasks';
$lang->icons['project']   = 'folder-close-alt';
$lang->icons['doc']       = 'file-text';
$lang->icons['doclib']    = 'folder-close';
$lang->icons['story']     = 'lightbulb';
$lang->icons['release']   = 'tags';
$lang->icons['roadmap']   = 'code-fork';
$lang->icons['plan']      = 'flag';
$lang->icons['dynamic']   = 'volume-up';
$lang->icons['build']     = 'tag';
$lang->icons['test']      = 'check';
$lang->icons['testtask']  = 'check';
$lang->icons['group']     = 'group';
$lang->icons['team']      = 'group';
$lang->icons['company']   = 'building';
$lang->icons['user']      = 'user';
$lang->icons['dept']      = 'sitemap';
$lang->icons['tree']      = 'sitemap';
$lang->icons['usecase']   = 'sitemap';
$lang->icons['testcase']  = 'smile';
$lang->icons['result']    = 'list-alt';
$lang->icons['mail']      = 'envelope';
$lang->icons['trash']     = 'trash';
$lang->icons['extension'] = 'th-large';
$lang->icons['app']       = 'th-large';

$lang->icons['results']        = 'list-alt';
$lang->icons['create']         = 'plus';
$lang->icons['post']           = 'edit';
$lang->icons['batchCreate']    = 'plus-sign';
$lang->icons['batchEdit']      = 'edit-sign';
$lang->icons['batchClose']     = 'off';
$lang->icons['edit']           = 'pencil';
$lang->icons['delete']         = 'remove';
$lang->icons['copy']           = 'copy';
$lang->icons['report']         = 'bar-chart';
$lang->icons['export']         = 'download-alt';
$lang->icons['report-file']    = 'file-powerpoint';
$lang->icons['import']         = 'upload-alt';
$lang->icons['finish']         = 'ok-sign';
$lang->icons['resolve']        = 'ok-sign';
$lang->icons['start']          = 'play';
$lang->icons['restart']        = 'play';
$lang->icons['run']            = 'play';
$lang->icons['runCase']        = 'play';
$lang->icons['batchRun']       = 'play-sign';
$lang->icons['assign']         = 'hand-right';
$lang->icons['assignTo']       = 'hand-right';
$lang->icons['change']         = 'random';
$lang->icons['link']           = 'link';
$lang->icons['close']          = 'off';
$lang->icons['activate']       = 'off';
$lang->icons['review']         = 'search';
$lang->icons['confirm']        = 'search';
$lang->icons['confirmBug']     = 'search';
$lang->icons['putoff']         = 'calendar';
$lang->icons['suspend']        = 'pause';
$lang->icons['pause']          = 'pause';
$lang->icons['cancel']         = 'ban-circle';
$lang->icons['recordEstimate'] = 'time';
$lang->icons['customFields']   = 'cogs';
$lang->icons['manage']         = 'cog';
$lang->icons['unlock']         = 'unlock-alt';
$lang->icons['confirmStoryChange'] = 'search';

include (dirname(__FILE__) . '/menuOrder.php');
