<?php

class bulletin extends control {

    private $data_path;

    public function __construct() {
        parent::__construct();
        $this->loadModel('company')->setMenu();
        $this->data_path = dirname(__FILE__) . '/data/';
    }

    public function browse() {
        $title = $this->lang->company->orgView . $this->lang->colon . $this->lang->bulletin->browse;
        $position[] = $this->lang->bulletin->browse;

        $this->view->bulletins = $this->bulletin->getBulletinData();

        $this->view->title = $title;
        $this->view->position = $position;

        $this->display();
    }

    public function create() {
        $this->loadModel('action');

        if (!empty($_POST)) {
            if (empty($_POST['title']))
                die(js::error($this->lang->bulletin->needTitle));
            if (empty($_POST['content']))
                die(js::error($this->lang->bulletin->needContent));

            $bulletin = fixer::input('post')
                    ->stripTags($this->config->bulletin->editor->create['id'], $this->config->allowedTags)
                    ->get();
            $t = time();
            $data = array('date' => date('Y-m-d H:i:s', $t), 'actor' => $this->app->user->account, 'title' => $bulletin->title, 'content' => $bulletin->content);

            @file_put_contents($this->data_path . $t . '.data', serialize($data));
            if (isonlybody())
                die(js::closeModal('parent.parent', 'this'));
            die(js::locate($this->createLink('bulletin', 'browse'), 'parent'));
        }

        $this->view->title = $this->lang->company->orgView . $this->lang->colon . $this->lang->bulletin->create;
        $this->display();
    }

    public function edit($bulletinID) {
        $bulletindata = $this->bulletin->getBulletinData($bulletinID);
        if (!empty($_POST)) {
            if (empty($_POST['title']))
                die(js::error($this->lang->bulletin->needTitle));
            if (empty($_POST['content']))
                die(js::error($this->lang->bulletin->needContent));

            $bulletin = fixer::input('post')
                    ->stripTags($this->config->bulletin->editor->create['id'], $this->config->allowedTags)
                    ->get();
            $bulletindata['title'] = $bulletin->title;
            $bulletindata['content'] = $bulletin->content;
            $data = $bulletindata;
            @file_put_contents($this->data_path . $bulletinID . '.data', serialize($data));
            if (isonlybody())
                die(js::closeModal('parent.parent', 'this'));
            die(js::locate($this->createLink('bulletin', 'browse'), 'parent'));
        }

        $this->view->bulletin = $bulletindata;

        $title = $this->lang->company->orgView . $this->lang->colon . $this->lang->bulletin->edit;
        $position[] = $this->lang->bulletin->edit;
        $this->view->title = $title;
        $this->view->position = $position;

        $this->display();
    }

    public function delete($bulletinID, $confirm = 'no') {
        if ($confirm == 'no') {
            die(js::confirm($this->lang->bulletin->confirmDelete, $this->createLink('bulletin', 'delete', "bulletinID=$bulletinID&confirm=yes")));
        } else {
            $file = $this->data_path . $bulletinID . '.data';
            if (file_exists($file)) {
                unlink($file);
                $res = array('result' => 'success');
            } else {
                $res = array('message' => $this->lang->bulletin->failedDlete);
            }
            exit(json_encode($res));
        }
    }

    public function detail($bulletinID) {
        $this->view->bulletin = $this->bulletin->getBulletinData($bulletinID);
        $this->display();
    }

}