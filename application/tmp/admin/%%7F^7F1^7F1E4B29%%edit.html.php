<?php /* Smarty version 2.6.19, created on 2009-05-21 23:11:41
         compiled from download_center/edit.html */ ?>
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
download_center/index/<?php echo $this->_tpl_vars['page_num']; ?>
"><div class="BlueButton right">Back to List</div></a>
			</div>
                <form name="article" id="form" method="POST" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
download_center/<?php echo $this->_tpl_vars['target']; ?>
">
<table width="100%" border="0">
	<tr>
		<td>Category</td>
		<td>:</td>
		<td>
			<select name="category">
				<option value="individual_application">Individual Application</option>
				<option value="group_application">Group Application</option>
				<option value="general">General</option>
			</select>
		</td>
	</tr>
	<tr><td>Active</td><td>:</td><td><input type="checkbox" name="active" value="1" <?php if ($this->_tpl_vars['list']['active'] == 1): ?>checked<?php endif; ?>></td></tr>
	<tr><td>Upload File</td><td>:</td><td><input type="hidden" name="old_file" value="<?php echo $this->_tpl_vars['list']['file']; ?>
"><input type="file" name="download_files">
	<?php if ($this->_tpl_vars['mode'] == 'EDIT'): ?>
		<a href="../../../../<?php echo $this->_tpl_vars['list']['file']; ?>
" target="_blank">[download existing file]</a>
	<?php endif; ?>
	</td></tr>
	</table>
	
<div id="tabs">	

	<ul>
		<li><a href="#tabs-1">Indonesia</a></li>
		<li><a href="#tabs-2">English</a></li>
	</ul>

	<div id="tabs-1">

	<table>
	<tr>
		<td>Title</td><td>:</td>
		<td><input type="text" name="id_title" value="<?php echo $this->_tpl_vars['id_title']; ?>
" class="required" style="width:250px"></td>
	</tr>
	<tr><td>Description</td>	<td>:</td>
		<td>
			<textarea name="id_description" id="id_description"  class="required" rows="10" cols="65"><?php echo $this->_tpl_vars['list']['id_description']; ?>
</textarea>
		</td>
	</tr>
	</table>
	
	</div>
	<div id="tabs-2">
	
	<table>
	<tr>
		<td>Title</td><td>:</td>
		<td><input type="text" name="en_title" value="<?php echo $this->_tpl_vars['en_title']; ?>
" class="required" style="width:250px"></td>
	</tr>
	<tr><td>Description</td>	<td>:</td>
		<td>
			<textarea name="en_description" id="en_description"  class="required" rows="10" cols="65"><?php echo $this->_tpl_vars['list']['en_description']; ?>
</textarea>
		</td>
	</tr>
	</table>
	</div>
</div>	
	
	<table>
	<tr><td>&nbsp;</td><td>&nbsp;</td>
		<td><input type="hidden" name="upload_id" value="<?php echo $this->_tpl_vars['list']['upload_id']; ?>
">
			<input type="hidden" name="page_num" id="page_num" value="<?php echo $this->_tpl_vars['page_num']; ?>
">
			</td>
	</tr>
</table>
                
                <div class="BlueLineBtm"><input class="BlueButton Left" type="submit" name="save" value="Save">
			</div></form>
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