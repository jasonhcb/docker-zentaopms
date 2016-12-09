<?php header("Content-type: text/html; charset=utf-8"); ?>
<?php

class product extends control
{
    public $products = array();

    /**
     * Construct function.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        /* Load need modules. */
        $this->loadModel('story');
        $this->loadModel('release');
        $this->loadModel('tree');
        $this->loadModel('user');

        /* Get all products, if no, goto the create page. */
        $this->products = $this->product->getPairs('nocode');
        if (empty($this->products) and strpos('create', $this->methodName) === false and $this->app->getViewType() != 'mhtml') $this->locate($this->createLink('product', 'create'));
        $this->view->products = $this->products;
    }

    public function ajaxGetDropMenu($productID, $module, $method, $extra)
    {
        $code = $this->dao->select('*')->from(TABLE_PROJECT)
            ->where('status')->eq('doing')
            ->fetchAll('code');
        $this->view->link = $this->product->getProductLink($module, $method, $extra);
        $this->view->productID = $productID;
        $this->view->module = $module;
        $this->view->method = $method;
        $this->view->extra = $extra;
        $this->view->products = $this->dao->select('*')->from(TABLE_PRODUCT)
            ->where('id')->in(array_keys($this->products))
            ->orderBy('`order` desc')
            ->fetchAll();
        $this->view->doing_products = $this->dao->select('*')->from(TABLE_PRODUCT)
            ->where('id')->in(array_keys($this->products))
            ->andwhere('code')->in(array_keys($code))
            ->orderBy('`order` desc')
            ->fetchAll();
        $this->display();
    }
}