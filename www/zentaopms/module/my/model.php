<?php
/**
 * The model file of dashboard module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     dashboard
 * @version     $Id: model.php 4129 2013-01-18 01:58:14Z wwccss $
 * @link        http://www.zentao.net
 */
?>
<?php
class myModel extends model
{
    /**
     * Set menu.
     * 
     * @access public
     * @return void
     */
    public function setMenu()
    {
        $this->lang->my->menu->account['link'] = sprintf($this->lang->my->menu->account['link'], $this->app->user->realname);

        /* Adjust the menu order according to the user role. */
        $role = $this->app->user->role;
        if($role == 'qa')
        {
            unset($this->lang->my->menuOrder[20]);
            $this->lang->my->menuOrder[32] = 'task';
        }
        elseif($role == 'po')
        {
            unset($this->lang->my->menuOrder[35]);
            unset($this->lang->my->menuOrder[20]);
            $this->lang->my->menuOrder[17] = 'story';
            $this->lang->my->menuOrder[42] = 'task';
        }
        elseif($role == 'pm')
        {
            unset($this->lang->my->menuOrder[40]);
            $this->lang->my->menuOrder[17] = 'myProject';
        }
    }
}
