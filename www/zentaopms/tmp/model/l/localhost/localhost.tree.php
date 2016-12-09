<?php
helper::import('/Applications/MAMP/htdocs/ztp/zentaopms/module/tree/model.php');
class exttreeModel extends treeModel 
{
public function getProductDocTreeMenu()
{
    $code = $this->dao->select('*')->from(TABLE_PROJECT)
    ->where('status')->eq('doing')
    ->fetchAll('code');

    $menu     = "<ul class='tree'>";
    $this->products = $this->loadModel('product')->getPairs('nocode');

    if (empty($this->products) and strpos('create', $this->methodName) === false and $this->app->getViewType() != 'mhtml') $this->locate($this->createLink('product', 'create'));
    $this->view->products = $this->products;

    $products = $this->dao->select('id,name')->from(TABLE_PRODUCT)
    ->where('id')->in(array_keys($this->products))
    ->andwhere('code')->in(array_keys($code))
    ->orderBy('`order` desc')
    ->fetchAll();

    $product= json_decode(json_encode($products), true);

    $products=array();
    foreach ($product as $pro){
       $id=$pro['id'];
       $products[$id]=$pro['name'];
    }

    $productModules = $this->getTreeMenu(0, 'productdoc', 0, array('treeModel', 'createDocLink'), 'product');
    $productModules = substr($productModules, 17, strlen($productModules) - 23);
    $projectModules = $this->getTreeMenu(0, 'projectdoc', 0, array('treeModel', 'createDocLink'), 'product');
    $projectModules = substr($projectModules, 17, strlen($projectModules) - 23);
    foreach($products as $productID =>$productName)
    {
        $menu .= '<li>';
        $menu .= html::a(helper::createLink('doc', 'browse', "libID=product&module=0&productID=$productID"), $productName);
        if(!empty($productModules))
        {
            $menu .= '<ul>';
            $menu .= str_replace('%productID%', $productID, $productModules);

            if(!empty($projectModules))
            {
                $menu .= '<li>';
                $menu .= html::a(helper::createLink('doc', 'browse', "libID=product&module=0&productID=$productID&projectID=int"), $this->lang->tree->projectDoc);
                $menu .= '<ul>';
                $menu .= str_replace('%productID%', $productID, $projectModules);
                $menu .= '</ul></li>';
            }
            $menu .= '</ul>';
        }
        $menu .='</li>';
    }
    $menu .= '</ul>';
    return $menu;
}
public function getProjectDocTreeMenu()
{
$menu = "<ul class='tree'>";
    $products = $this->loadModel('product')->getPairs('nocode');
    $projects = $this->loadModel('project')->getProductGroupList();

    $projectModules = $this->getTreeMenu(0, 'projectdoc', 0, array('treeModel', 'createDocLink'), 'project');
    $projectModules = substr($projectModules, 17, strlen($projectModules) - 23);

    foreach ($projects as $id => $project) {
    if ($id == '') {
    $projects[0] = $projects[''];
    unset($projects['']);
    }
    }

    if (!empty($projects[0])) $products[0] = $this->lang->project->noProduct;

    foreach ($products as $productID => $productName) {
    $project_s = $projects[$productID];
    if ($project_s[0]->status == 'doing') {

    $menu .= '<li>';
        $menu .= $productName;

        if (isset($projects[$productID])) {
        $menu .= '<ul>';
            foreach ($projects[$productID] as $project) {
            $menu .= '<li>' . html::a(helper::createLink('doc', 'browse', "libID=project&module=0&productID=0&projectID=$project->id"), $project->name);
                if (!empty($projectModules)) {
                $menu .= '<ul>';
                    $menu .= str_replace('%projectID%', $project->id, $projectModules);
                    $menu .= '</ul>';
                }
                $menu .= '</li>';
            }
            $menu .= '</ul>';
        }
        $menu .= '</li>';
    }
    }
    $menu .= '</ul>';
return $menu;
}
//**//
}