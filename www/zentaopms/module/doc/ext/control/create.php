<?php
/**
* 
*/
include '../../control.php'; 
class myDoc extends doc
{
    

public function create($libID, $moduleID = 0, $productID = 0, $projectID = 0, $from = 'doc',$objectID = '')
    {
        $projectID = (int)$projectID;
        if(!empty($_POST))
        {

            $msg=$this->loadModel('file')->isFilenameExists('files','labels',$objectID, $from);
            if($msg){
                echo js::alert($msg);
                die();
            }

            $docResult = $this->doc->create();
            if(!$docResult or dao::isError()) die(js::error(dao::getError()));

            $docID = $docResult['id'];
            if($docResult['status'] == 'exists')
            {
                echo js::alert(sprintf($this->lang->duplicate, $this->lang->doc->common));
                die(js::locate($this->createLink('doc', 'view', "docID=$docID"), 'parent'));
            }

            $this->action->create('doc', $docID, 'Created');

            if($from == 'product') $link = $this->createLink('product', 'doc', "productID={$this->post->product}");
            if($from == 'project') $link = $this->createLink('project', 'doc', "projectID={$this->post->project}");
            if($from == 'doc')
            {
                $productID = intval($this->post->product);
                $projectID = intval($this->post->project);
                $vars = "libID=$libID&moduleID={$this->post->module}&productID=$productID&projectID=$projectID";
                $link = $this->createLink('doc', 'browse', $vars);
            }
            die(js::locate($link, 'parent'));
        }

        $this->loadModel('product');
        $this->loadModel('project');

        /* According the from, set menus. */
        if($from == 'product')
        {
            $this->lang->doc->menu      = $this->lang->product->menu;
            $this->lang->doc->menuOrder = $this->lang->product->menuOrder;
            $this->product->setMenu($this->product->getPairs(), $productID);
            $this->lang->set('menugroup.doc', 'product');
        }
        elseif($from == 'project')
        {
            $this->lang->doc->menu      = $this->lang->project->menu;
            $this->lang->doc->menuOrder = $this->lang->project->menuOrder;
            $this->project->setMenu($this->project->getPairs('nocode'), $projectID);
            $this->lang->set('menugroup.doc', 'project');
        }
        else
        {
            $this->doc->setMenu($this->libs, $libID);
        }

        /* Get the modules. */
        if($libID == 'product' or $libID == 'project')
        {
            $moduleOptionMenu = $this->tree->getOptionMenu(0, $libID . 'doc', $startModuleID = 0);
        }
        else
        {
            $moduleOptionMenu = $this->tree->getOptionMenu($libID, 'customdoc', $startModuleID = 0);
        }

        $products = $projectID == 0 ? $this->product->getPairs() : $this->project->getProducts($projectID, false);
        if($libID == 'product' and empty($products))
        {
            echo js::alert($this->lang->doc->errorEmptyProduct);
            die(js::locate('back'));
        }

        $projects = $this->project->getPairs('all');
        if($libID == 'project' and empty($projects))
        {
            echo js::alert($this->lang->doc->errorEmptyProject);
            die(js::locate('back'));
        }

        $this->view->title      = $this->libs[$libID] . $this->lang->colon . $this->lang->doc->create;
        $this->view->position[] = html::a($this->createLink('doc', 'browse', "libID=$libID"), $this->libs[$libID]);
        $this->view->position[] = $this->lang->doc->create;

        $this->view->libID            = $libID;
        $this->view->moduleOptionMenu = $moduleOptionMenu;
        $this->view->moduleID         = $moduleID;
        $this->view->productID        = $productID;
        $this->view->projectID        = $projectID;
        $this->view->products         = $products;
        $this->view->projects         = $projects;

        $this->display();
    }
}

?>