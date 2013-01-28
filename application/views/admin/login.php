<div id="login-wrapper">
    <div id="login-container">
        <?=form_open('admin/login')?>
        <table border="0" width="100%">
        	<tr>
            	<td>
                	<img src="<?=base_url()?>images/lockscreen.png" border="0" align="absmiddle" />
                    Login
                    <br /><br />
                    <?=$msg?>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        Username
                    </div>
                    <div>
                        <input type="text" name="username" class="input-text" autofocus="autofocus" value="<?=set_value('username')?>" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        Password
                    </div>
                    <div>
                        <input type="password" class="input-text" name="password" />
                    </div>
                </td>
            </tr>
            <tr>
            	<td>
                	<br /><br />
                	<input type="submit" name="login" value="Login" class="input-submit" />
                </td>
            </tr>
        </table>
        <?=form_close()?>
    </div>
</div>