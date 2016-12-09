<?php 
include '../../control.php';
class myBlock extends block
{
	public function dashboard($module)
    {
        $blocks = $this->block->getBlockList($module);
        $inited = empty($this->config->$module->common->blockInited) ? '' : $this->config->$module->common->blockInited;

        /* Init block when vist index first. */
        if(empty($blocks) and !$inited and !defined('TUTORIAL'))
        {
            if($this->block->initBlock($module)) die(js::reload());
        }

        foreach($blocks as $key => $block)
        {
            if($block->block == 'dynamic'&&!common::hasPriv('my', 'dynamic'))
            {
                unset($blocks[$key]);
                continue;
            }
            $block->params  = json_decode($block->params);
            $blockID = $block->block;
            $source  = empty($block->source) ? 'common' : $block->source;

            $block->blockLink = $this->createLink('block', 'printBlock', "id=$block->id&module=$block->module");
            $block->moreLink  = '';
            if(isset($this->lang->block->modules[$source]->moreLinkList->{$blockID}))
            {
                list($moduleName, $method, $vars) = explode('|', sprintf($this->lang->block->modules[$source]->moreLinkList->{$blockID}, isset($block->params->type) ? $block->params->type : ''));
                $block->moreLink = $this->createLink($moduleName, $method, $vars);
            }
            elseif($block->block == 'dynamic')
            {
                $block->moreLink = $this->createLink('company', 'dynamic');
            }
        }

        $this->view->blocks = $blocks;
        $this->view->module = $module;

        if($this->app->getViewType() == 'json')
        {
            die(json_encode($blocks));
        }

        $this->display();
    }
	
}