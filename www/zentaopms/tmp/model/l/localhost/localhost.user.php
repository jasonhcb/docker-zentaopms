<?php
helper::import('/Applications/MAMP/htdocs/ztp/zentaopms/module/user/model.php');
class extuserModel extends userModel 
{
public function getPairs($params = '', $usersToAppended = '')
{
    /* Set the query fields and orderBy condition.
     *
     * If there's xxfirst in the params, use INSTR function to get the position of role fields in a order string,
     * thus to make sure users of this role at first.
     */
    $fields = 'account, realname, deleted';
    if(strpos($params, 'pofirst') !== false) $fields .= ", INSTR(',pd,po,', role) AS roleOrder";
    if(strpos($params, 'pdfirst') !== false) $fields .= ", INSTR(',po,pd,', role) AS roleOrder";
    if(strpos($params, 'qafirst') !== false) $fields .= ", INSTR(',qd,qa,', role) AS roleOrder";
    if(strpos($params, 'qdfirst') !== false) $fields .= ", INSTR(',qa,qd,', role) AS roleOrder";
    if(strpos($params, 'pmfirst') !== false) $fields .= ", INSTR(',td,pm,', role) AS roleOrder";
    if(strpos($params, 'devfirst')!== false) $fields .= ", INSTR(',td,pm,qd,qa,dev,', role) AS roleOrder";
    $orderBy = strpos($params, 'first') !== false ? 'roleOrder DESC, account' : 'account';

    /* Get raw records. */
    $users = $this->dao->select($fields)->from(TABLE_USER)
        ->beginIF(strpos($params, 'nodeleted') !== false)->where('deleted')->eq(0)->fi()
        ->orderBy($orderBy)
        ->fetchAll('account');
    if($usersToAppended) $users += $this->dao->select($fields)->from(TABLE_USER)->where('account')->in($usersToAppended)->fetchAll('account');

    /* Cycle the user records to append the first letter of his account. */
    foreach($users as $account => $user)
    {
//        $firstLetter = ucfirst(substr($account, 0, 1)) . ':';

        $firstLetter = $account . ':';
        if(strpos($params, 'noletter') !== false) $firstLetter =  '';
        $users[$account] =  $firstLetter . ($user->deleted ? $account : ($user->realname ? $user->realname : $account));
    }

    /* Append empty, closed, and guest users. */
    if(strpos($params, 'noempty')   === false) $users = array('' => '') + $users;
    if(strpos($params, 'noclosed')  === false) $users = $users + array('closed' => 'Closed');
    if(strpos($params, 'withguest') !== false) $users = $users + array('guest' => 'Guest');

    return $users;
}
//**//
}