<?php 
include '../../control.php';
class myBlock extends block
{
	
	public function admin($id = 0, $module = 'my')
    {
        $this->session->set('blockModule', $module);

        $title = $id == 0 ? $this->lang->block->createBlock : $this->lang->block->editBlock;

        if($module == 'my')
        {
            $modules = $this->lang->block->moduleList;
            foreach($modules as $moduleKey => $moduleName)
            {
                if($moduleKey == 'todo') continue;
                if(in_array($moduleKey, $this->app->user->rights['acls'])) unset($modules[$moduleKey]);
                if(!common::hasPriv($moduleKey, 'index')) unset($modules[$moduleKey]);
            }

            $modules['dynamic']   = $this->lang->block->dynamic;
            $modules['flowchart'] = $this->lang->block->lblFlowchart;
			$modules['bulletin']   = $this->lang->block->bulletin;
            $modules['html']      = 'HTML';
            $modules = array('' => '') + $modules;

            $hiddenBlocks = $this->block->getHiddenBlocks();
            foreach($hiddenBlocks as $block) $modules['hiddenBlock' . $block->id] = $block->title;
            $this->view->modules = $modules;
        }
        elseif(isset($this->lang->block->moduleList[$module]))
        {
            $this->get->set('mode', 'getblocklist');
            $this->view->blocks = $this->fetch('block', 'main', "module=$module&id=$id");
        }

        $this->view->block      = $this->block->getByID($id);
        $this->view->blockID    = $id;
        $this->view->title      = $title;
        $this->display();
    }
	
}