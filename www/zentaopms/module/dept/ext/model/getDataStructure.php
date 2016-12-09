    public function getDataStructure($rootDeptID = 0) 
    {
        $tree = array_values($this->getSons($rootDeptID));
        if(count($tree))
        {
            foreach ($tree as $node)
            {
                $children = $this->getDataStructure($node->id);
                if(count($children))
                {
                    $node->children = $children;
                    $node->actions = array('delete' => false);
                }
            }
        }
        return $tree; 
    }