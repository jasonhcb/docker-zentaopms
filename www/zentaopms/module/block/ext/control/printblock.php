<?php
include '../../control.php';
class myBlock extends block
{

    public function printBlock($id, $module = 'my')
    {
        $block = $this->block->getByID($id);

        if(empty($block)) return false;

        $html = '';
        if($block->block == 'html')
        {
            $html = "<div class='article-content'>" . htmlspecialchars_decode($block->params->html) .'</div>';
        }
        elseif($block->source != '')
        {
            $this->get->set('mode', 'getblockdata');
            $this->get->set('module', $block->module);
            $this->get->set('source', $block->source);
            $this->get->set('blockid', $block->block);
            $this->get->set('param',base64_encode(json_encode($block->params)));
            $html = $this->fetch('block', 'main', "module={$block->source}&id=$id");
        }
        elseif($block->block == 'dynamic')
        {
            $html = $this->fetch('block', 'dynamic');
        }
        elseif($block->block == 'flowchart')
        {
            $html = $this->fetch('block', 'flowchart');
        }
		elseif($block->block == 'bulletin')
        {
            $html = $this->fetch('block', 'bulletin');
        }
        
        die($html);
    }
	
	public function bulletin()
    {
        $this->view->bulletins = $this->loadModel('bulletin')->getBulletinData();
        $this->display();
    }
	
	public function main($module = '', $id = 0)
    {
        if(!$this->selfCall)
        {
            $lang = $this->get->lang;
            $this->app->setClientLang($lang);
            $this->app->loadLang('common');
            $this->app->loadLang('block');
        }

        $mode = strtolower($this->get->mode);
        if($mode == 'getblocklist')
        {   
            $blocks = $this->block->getAvailableBlocks($module);
            if(!$this->selfCall)
            {
                echo $blocks;
                return true;
            }

            $blocks     = json_decode($blocks, true);
            $blockPairs = array('' => '') + $blocks;

            $block = $this->block->getByID($id);

            echo "<th>{$this->lang->block->lblBlock}</th>";
            echo '<td>' . html::select('moduleBlock', $blockPairs, ($block and $block->source != '') ? $block->block : '', "class='form-control' onchange='getBlockParams(this.value, \"$module\")'") . '</td>';
            if(isset($block->source)) echo "<script>$(function(){getBlockParams($('#moduleBlock').val(), '{$block->source}')})</script>";
        }   
        elseif($mode == 'getblockform')
        {   
            $code = strtolower($this->get->blockid);
            $func = 'get' . ucfirst($code) . 'Params';
            echo $this->block->$func($module);
        }   
        elseif($mode == 'getblockdata')
        {
            $code = strtolower($this->get->blockid);

            $params = $this->get->param;
            $params = json_decode(base64_decode($params));
            if(!$this->selfCall)
            {
                //$this->app->user = $this->dao->select('*')->from(TABLE_USER)->where('ranzhi')->eq($params->account)->fetch();
                if(empty($this->app->user)) 
                {
                    $this->app->user = new stdclass();
                    $this->app->user->account = 'guest';
                }
                $this->app->user->rights = $this->loadModel('user')->authorize($this->app->user->account);

                $sso = base64_decode($this->get->sso);
                $this->view->sso  = $sso;
                $this->view->sign = strpos($sso, '&') === false ? '?' : '&';
            }

            $this->viewType   = (isset($params->viewType) and $params->viewType == 'json') ? 'json' : 'html';
            $this->params     = $params;
            $this->view->code = $this->get->blockid;

            $func = 'print' . ucfirst($code) . 'Block';
            if(method_exists('block', $func))
            {
                $this->$func($module);
            }
            else
            {
                $this->view->data = $this->block->$func($module, $params);
            }

            $this->view->moreLink = '';
            if(isset($this->lang->block->modules[$module]->moreLinkList->{$code}))
            {
                list($moduleName, $method, $vars) = explode('|', sprintf($this->lang->block->modules[$module]->moreLinkList->{$code}, isset($params->type) ? $params->type : ''));
                $this->view->moreLink = $this->createLink($moduleName, $method, $vars);
            }

            if($this->viewType == 'json')
            {
                unset($this->view->app);
                unset($this->view->config);
                unset($this->view->lang);
                unset($this->view->header);
                unset($this->view->position);
                unset($this->view->moduleTree);

                $output['status'] = is_object($this->view) ? 'success' : 'fail';
                $output['data']   = json_encode($this->view);
                $output['md5']    = md5(json_encode($this->view));
                die(json_encode($output));
            }

            $this->display();
        }
    }

}
