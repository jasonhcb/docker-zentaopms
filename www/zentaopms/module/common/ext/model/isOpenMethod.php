	public function isOpenMethod($module, $method)
    {
        if($module == 'user' and strpos('login|logout|deny|reset|ssologin', $method) !== false) return true;
        if($module == 'api'  and $method == 'getsessionid') return true;
        if($module == 'misc' and $method == 'ping')  return true;
        if($module == 'misc' and $method == 'checktable') return true;
        if($module == 'misc' and $method == 'qrcode') return true;
        if($module == 'misc' and $method == 'about') return true;
        if($module == 'misc' and $method == 'checkupdate') return true;
        if($module == 'misc' and $method == 'changelog') return true;
        if($module == 'sso' and $method == 'login')  return true;
        if($module == 'sso' and $method == 'logout') return true;
        if($module == 'sso' and $method == 'bind') return true;
        if($module == 'sso' and $method == 'gettodolist') return true;
        if($module == 'product' and $method == 'showerrornone') return true;
        if($module == 'block' and $method == 'printblock') return true;
        if($module == 'block' and $method == 'main') return true;

        if($this->loadModel('user')->isLogon())
        {
            if(stripos($method, 'ajax') !== false) return true;
            if(stripos($method, 'downnotify') !== false) return true;
            if($module == 'tutorial') return true;
            if($module == 'block') return true;
        }

        if(stripos($method, 'ajaxgetdropmenu') !== false) return true;
        if(stripos($method, 'ajaxgetmatcheditems') !== false) return true;
        return false;
    }