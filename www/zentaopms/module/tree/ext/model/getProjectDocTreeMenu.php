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
