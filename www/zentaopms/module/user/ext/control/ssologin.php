<?php
require_once '../../CAS.php';

class user extends control
{
    public function ssologin()
    {
        phpCAS::setDebug();

        // Initialize phpCAS
        // phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);
        phpCAS::client(CAS_VERSION_2_0, "login.hand-china.com", 443, "/sso");

        // For production use set the CA certificate that is the issuer of the cert
        // on the CAS server and uncomment the line below
        // phpCAS::setCasServerCACert($cas_server_ca_cert_path);

        // For quick testing you can disable SSL validation of the CAS server.
        // THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
        // VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
        phpCAS::setNoCasServerValidation();

        // force CAS authentication
        phpCAS::forceAuthentication();

        // at this step, the user has been authenticated by the CAS server
        // and the user's login name can be read with phpCAS::getUser().

        // logout if desired
        if (isset($_REQUEST['logout'])) {
            phpCAS::logout();
        }

        $account = phpCAS::getUser();

        $location = $this->createLink('index', 'index');

        // 获取用户信息
        $user = $this->loadModel('user')->getById($account);
        if($user)
        {
            $this->user->cleanLocked($user->account);
            $user->rights = $this->user->authorize($account);
            $user->groups = $this->user->getGroups($account);
//          $this->dao->update(TABLE_USER)->set('visits = visits + 1')->set('ip')->eq($userIP)->set('last')->eq($last)->where('account')->eq($user->account)->exec();
            $this->session->set('user', $user);
            $this->app->user = $this->session->user;
            $this->loadModel('action')->create('user', $user->id, 'login');

            if (isset($_REQUEST['referer'])) {
                $this->locate($_REQUEST['referer']);
            }
            else
            {
                // 跳转页面到index页面或者referer页面
                $this->locate($location);
            }
        }
        else
        {

            $user->realname = $account;
            $user->account =$account;
            $user->password = 'handhand';
            $this->dao->insert('zentao.zt_user')->data($user)->exec();

            $this->dao->insert('zentao.zt_usergroup')
                ->set('account')->eq($account)
                ->set('`group`')->eq(2)
                ->exec();
            $this->locate($location);

        }
    }
}
