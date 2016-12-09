<?php

class user extends control {

    public function logout($referer = 0) {
        if (isset($this->app->user->id))
            $this->loadModel('action')->create('user', $this->app->user->id, 'logout');

        session_destroy();

        setcookie('za', '', time() - 3600, $this->config->webRoot);
        setcookie('zp', '', time() - 3600, $this->config->webRoot);

        if ($this->app->user->role == 'custom') {
            if ($this->app->getViewType() == 'json')
                die(json_encode(array('status' => 'success')));
            $vars = !empty($referer) ? "referer=$referer" : '';
            $this->locate($this->createLink('user', 'login', $vars));
        }
        else {
            require_once '../../CAS.php';
            phpCAS::client(CAS_VERSION_2_0, "login.hand-china.com", 443, "/sso");
            phpCAS::setNoCasServerValidation();
            $param = array("service" => $this->config->domain . $this->createLink('user', 'ssologin'));
            phpCAS::logout($param);
        }
    }

}