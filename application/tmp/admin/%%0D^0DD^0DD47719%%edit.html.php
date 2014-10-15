<?php /* Smarty version 2.6.19, created on 2009-05-18 12:04:32
         compiled from links/edit.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['MAIN_TPL_HEADER']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="MiddleContainer">
		<div class="ContentField left">
		<?php echo $this->_tpl_vars['middle_content_menu']; ?>

		<div class="clear"></div>
			<div class="BlueLine">
				<div class="TextBar"> <?php echo $this->_tpl_vars['mode']; ?>
 PAGE</div>
                <a class="menu5" href="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
links/index/<?php echo $this->_tpl_vars['page_num']; ?>
"><div class="BlueButton right">Back to List</div></a>
			</div>
                <form name="article" id="form" method="POST" action="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
links/<?php echo $this->_tpl_vars['target']; ?>
">
<table width="100%" border="0">
	<tr>
		<td>Link Name</td><td>:</td>
		<td><input type="text" name="link_name" class="required" value="<?php echo $this->_tpl_vars['list']['link_name']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Link Address</td><td>:</td>
		<td><input type="text" name="link_address" class="required" value="<?php echo $this->_tpl_vars['list']['link_address']; ?>
" style="width:250px"></td>
	</tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td>
		<td><input type="hidden" name="links_id" value="<?php echo $this->_tpl_vars['list']['links_id']; ?>
">
			<input type="hidden" name="page_num" id="page_num" value="<?php echo $this->_tpl_vars['page_num']; ?>
">
			<input class="BlueButton Left" type="submit" name="save" value="Save"></td>
	</tr>
</table>
                </form>
                <div class="BlueLineBtm">
			</div>
		</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['RIGHT_SIDEBAR']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<div class="clear"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['MAIN_TPL_FOOTER']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>