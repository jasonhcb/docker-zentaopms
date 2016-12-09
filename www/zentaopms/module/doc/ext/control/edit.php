<?php

include '../../control.php'; 
class myDoc extends doc
{
   

 public function edit($docID)
    {
        if(!empty($_POST))
        {
            $msg=$this->loadModel('file')->isFilenameExists('files','labels',$docID, 'doc');
            if($msg){
				echo js::alert($msg);
                die();
            }
            $changes  = $this->doc->update($docID);

            if(dao::isError()) die(js::error(dao::getError()));
            $files = $this->loadModel('file')->saveUpload('doc', $docID);
            if($this->post->comment != '' or !empty($changes) or !empty($files))
            {
                $action = !empty($changes) ? 'Edited' : 'Commented';
                $fileAction = '';
                if(!empty($files)) $fileAction = $this->lang->addFiles . join(',', $files) . "\n" ;
                $actionID = $this->action->create('doc', $docID, $action, $fileAction . $this->post->comment);
                $this->action->logHistory($actionID, $changes);
            }
            die(js::locate($this->createLink('doc', 'view', "docID=$docID"), 'parent'));
        }

        /* Get doc and set menu. */
        $doc = $this->doc->getById($docID);
        $libID = $doc->lib;
        $this->doc->setMenu($this->libs, $libID);

        /* Get modules. */
        if($libID == 'product' or $libID == 'project')
        {
            $moduleOptionMenu = $this->tree->getOptionMenu(0, $libID . 'doc', $startModuleID = 0);
        }
        else
        {
            $moduleOptionMenu = $this->tree->getOptionMenu($libID, 'customdoc', $startModuleID = 0);
        }

        $this->view->title      = $this->libs[$libID] . $this->lang->colon . $this->lang->doc->edit;
        $this->view->position[] = html::a($this->createLink('doc', 'browse', "libID=$libID"), $this->libs[$libID]);
        $this->view->position[] = $this->lang->doc->edit;

        $this->view->doc              = $doc;   //文档标题
        $this->view->libID            = $libID;  
        $this->view->libs             = $this->libs;//文档库
        $this->view->moduleOptionMenu = $moduleOptionMenu;
        $this->view->products         = $doc->project == 0 ? $this->product->getPairs() : $this->project->getProducts($doc->project, false);
        $this->view->projects         = $this->loadModel('project')->getPairs('all');
        $this->display();
    }
}


?>