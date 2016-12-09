<?php
include '../../../common/ext/view/loginimport.html.php';
?>
<div class="login-container animated fadeInDown">
    <div class="login-container logobox">
        <img src="logo-12.png">
    </div>
    <div class="loginbox">
        <div class="loginbox-title"><p><?php echo vsprintf($lang->welcome, array($app->company->name));?></p></div>
        <form method='post' target='hiddenwin'>
            <div class="loginbox-textbox">
                <div class="login-input">
                    <div class="button_link">
                    <span class="input-icon">
                       <input type="text" class="form-control" placeholder="<?php echo $lang->user->account;?>" style="color: #eef4fe" name="account"
                              id='account'/>
                       <i class="typcn typcn-user-outline"></i>
                    </span>
                        <span class="line line_left"></span>
                    </div>
                </div>
            </div>
            <div class="loginbox-textbox login-topinput">
                <div class="login-input">
                    <div class="button_link">
                    <span class="input-icon">
                       <input type="password" class="form-control" placeholder="<?php echo $lang->user->password;?>" style="color: #eef4fe"
                              name="password"/>
                       <i class="typcn typcn-lock-closed-outline"></i>
                    </span>
                        <span class="line line_left"></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="checkbox" style="color: #fff;padding-left: 20px;" >
                    <label>
                        <input type="checkbox" class="colored-blue" name="keepLogin" <?php if($keepLogin=='on') echo 'checked' ?>>
                        <span class="text"><?php echo $lang->user->keepLogin['on'];?></span>
                    </label>
                </div>
            </div>
            <div class="loginbox-submit">
                <button class="btn btn-submit btn-primary" style="width: 100%;"><?php echo $lang->login;?></button>
            </div>
            <div class="loginbox-signup">
                <span><a href="#"><?php echo $lang->user->resetPassword;?></a></span>
            </div>
        </form>
    </div>
</div>
<?php include '../../../common/view/footer.lite.html.php'; ?>
