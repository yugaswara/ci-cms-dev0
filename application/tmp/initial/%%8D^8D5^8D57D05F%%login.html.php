<?php /* Smarty version 2.6.19, created on 2009-05-21 03:51:21
         compiled from pages/login.html */ ?>
<form name="login_alumni_form" action="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
forum/ucp.php?mode=login" method="POST">
<div class="form_container">
	<div class="form_content clearfix">
		<p class="form_txt">Username</p>
		<input type="text" name="username" tabindex="1" class="form_field1" />
	</div>
	
	<div class="form_content clearfix">
		<p class="form_txt">Password</p>
		<input type="password" name="password" tabindex="2" class="form_field1" />
	</div>
	
	<div class="form_content clearfix">
		<input type="hidden" value="<?php echo $this->_tpl_vars['category']; ?>
" name="destination">
		<input type="submit" name="login" value="Login" class="login_btn" />
	</div>
</div>

<!--	<table>
		<tr>
			<td colspan="3" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username" tabindex="1"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password" tabindex="2"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="hidden" value="<?php echo $this->_tpl_vars['category']; ?>
" name="destination"></td>
			<td><input type="submit" value="login" name="login"></td>
		</tr>
		<tr>
			<td colspan="3" align="center">&nbsp;</td>
		</tr>
	</table> -->
</form>