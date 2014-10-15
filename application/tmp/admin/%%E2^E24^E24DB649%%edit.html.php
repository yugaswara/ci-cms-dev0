<?php /* Smarty version 2.6.19, created on 2009-05-22 11:46:32
         compiled from database_alumni/edit.html */ ?>
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
database_alumni/index/<?php echo $this->_tpl_vars['page_num']; ?>
"><div class="BlueButton right">Back to List</div></a>
			</div>
                <form name="article" id="form" method="POST" action="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
database_alumni/<?php echo $this->_tpl_vars['target']; ?>
">
<table width="100%" border="0">
	<tr>
		<td>Name</td><td>:</td>
		<td><input type="text" name="name" class="required" value="<?php echo $this->_tpl_vars['list']['name']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Gender</td><td>:</td>
		<td>
			<select name="gender">
				<option value="m"><?php if ($this->_tpl_vars['list']['gender'] == 'f'): ?>female<?php elseif ($this->_tpl_vars['list']['gender'] == 'm'): ?>male<?php else: ?><?php endif; ?></option>
				<option value="m">male</option>
				<option value="f">female</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Email Address</td><td>:</td>
		<td><input type="text" name="email_address" class="required" value="<?php echo $this->_tpl_vars['list']['email_address']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Batch</td><td>:</td>
		<td><input type="text" name="batch" class="required" value="<?php echo $this->_tpl_vars['list']['batch']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Date of Birth</td><td>:</td>
		<td><input type="text" name="dob" class="required" value="<?php echo $this->_tpl_vars['list']['dob']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Scholarship</td><td>:</td>
		<td><input type="text" name="scholarship" class="required" value="<?php echo $this->_tpl_vars['list']['scholarship']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Univ</td><td>:</td>
		<td><input type="text" name="univ" class="required" value="<?php echo $this->_tpl_vars['list']['univ']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Study Program</td><td>:</td>
		<td><input type="text" name="study_program" class="required" value="<?php echo $this->_tpl_vars['list']['study_program']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Mobile</td><td>:</td>
		<td><input type="text" name="mobile" class="required" value="<?php echo $this->_tpl_vars['list']['mobile']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Home Address</td><td>:</td>
		<td><input type="text" name="home_address" class="required" value="<?php echo $this->_tpl_vars['list']['home_address']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Home City</td><td>:</td>
		<td><input type="text" name="home_city" class="required" value="<?php echo $this->_tpl_vars['list']['home_city']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Home Phone</td><td>:</td>
		<td><input type="text" name="home_phone" class="required" value="<?php echo $this->_tpl_vars['list']['home_phone']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Office Address</td><td>:</td>
		<td><input type="text" name="office_address" class="required" value="<?php echo $this->_tpl_vars['list']['office_address']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Office City</td><td>:</td>
		<td><input type="text" name="office_city" class="required" value="<?php echo $this->_tpl_vars['list']['office_city']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Office Province</td><td>:</td>
		<td><input type="text" name="office_provinsi" class="required" value="<?php echo $this->_tpl_vars['list']['office_provinsi']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Office Phone</td><td>:</td>
		<td><input type="text" name="office_phone" class="required" value="<?php echo $this->_tpl_vars['list']['office_phone']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Office Fax</td><td>:</td>
		<td><input type="text" name="office_fax" class="required" value="<?php echo $this->_tpl_vars['list']['office_fax']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Others</td><td>:</td>
		<td><input type="text" name="others" class="required" value="<?php echo $this->_tpl_vars['list']['others']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Thesis Title</td><td>:</td>
		<td><input type="text" name="thesis_title" class="required" value="<?php echo $this->_tpl_vars['list']['thesis_title']; ?>
" style="width:250px"></td>
	</tr>
	<tr>
		<td>Thesis Content</td><td>:</td>
		<td><textarea name="thesis_content" class="required"><?php echo $this->_tpl_vars['list']['thesis_content']; ?>
</textarea></td>
	</tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td>
		<td><input type="hidden" name="unique_id" value="<?php echo $this->_tpl_vars['list']['unique_id']; ?>
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