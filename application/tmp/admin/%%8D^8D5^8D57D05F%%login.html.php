<?php /* Smarty version 2.6.19, created on 2009-05-21 02:27:04
         compiled from pages/login.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['MAIN_TPL_HEADER']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="middle_field">
	<div class="main_field left">
	<form name="form_login" method="post" action="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
admin/initial/login">
	<div class="field">
		<div class="main_form">
			<div class="label left text1">User Name :&nbsp;</div>
			<div class="input left"><input id="username" type="text" name="un" value="" /></div>
		</div>
		<div class="main_form">
			<div class="label left text1">Password :&nbsp;</div>
			<div class="input left"><input id="password" type="password" name="ps" value="" /></div>
		</div>
        <?php if ($this->_tpl_vars['warning']): ?>
		<div class="main_form">
                <div class="label left text1"></div>
                <div class="input left">Wrong username and/or password!</div>
		</div>
        <?php endif; ?>
		<!--
		<div class="main_form">
			<div class="label left text1"></div>
			<div class="input left"><a href="#">Forgot Your Password</a></div>
		</div>
		-->
		<div class="main_form">
			<div class="label left text1"></div>
			<div class="input left"><input type="submit" class="btlogin left" name="login" value="login"></div>
		</div>
	</div>
	
	</form>
	</div>
	<div class="image_field right"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['MAIN_TPL_FOOTER']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>