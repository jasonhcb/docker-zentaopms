

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

