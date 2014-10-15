<?php /* Smarty version 2.6.19, created on 2009-05-21 23:22:58
         compiled from article/edit.html */ ?>
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
article/listing/<?php echo $this->_tpl_vars['list']['category']; ?>
/<?php echo $this->_tpl_vars['page_num']; ?>
"><div class="BlueButton right">Back to List</div></a>
			</div>
                <form name="article" id="form" method="POST" action="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
article/<?php echo $this->_tpl_vars['target']; ?>
">
<table width="100%" border="0">
	<tr>
		<td>Category</td><td>:</td>
		<td>
			<select name="category">
				<option value="<?php echo $this->_tpl_vars['list']['category']; ?>
"><?php echo $this->_tpl_vars['list']['category']; ?>
</option><option value="history">History</option><option value="general_information">General Information</option>
				<option value="regular_programme">Regular Programme</option><option value="pre_registration">Pre-Registration</option><option value="english_test_information">English Test Information</option>
				<option value="alumni_voice">Alumni Voice</option><option value="english_course">English Course</option><option value="employee">Employee</option>
				<option value="group_aplication">Group Aplication</option><option value="awardees_corner">Awardees Corner</option><option value="contact_us">Contact Us</option><option value="faq">FAQ</option>
				<option value="stuned_celebration">Stuned Celebration</option>
			</select>
		</td>
	</tr>
	<tr><td>Active</td><td>:</td><td><input type="checkbox" name="active" value="1" <?php if ($this->_tpl_vars['list']['active'] == 1 || $this->_tpl_vars['list']['active'] == ''): ?>checked<?php endif; ?>></td></tr>
	</table>
	
<div id="tabs">	

	<ul>
		<li><a href="#tabs-1">Indonesia</a></li>
		<li><a href="#tabs-2">English</a></li>
	</ul>

	<div id="tabs-1">

	<table>
	<tr>
		<td>Page Title</td><td>:</td>
		<td><input type="text" name="id_page_title" value="<?php echo $this->_tpl_vars['id_page_title']; ?>
" class="required" style="width:250px"></td>
	</tr>
	<tr><td colspan="3">&nbsp;</td></tr>
		<tr><td colspan="3">
		<table border="0" cellpadding="0" cellspacing="0">
		<!--
		<tr>
			<td>Meta Keywords<textarea name="id_meta_keywords" class="static required"><?php echo $this->_tpl_vars['list']['id_meta_keywords']; ?>
</textarea></td>
			<td>Meta Description<textarea name="id_meta_description" class="static required"><?php echo $this->_tpl_vars['list']['id_meta_description']; ?>
</textarea></td>
		</tr>
		-->
		<tr>
			<td colspan="2">
				Content<br>
				<textarea name="id_content" id="id_content"  class="required" rows="10" cols="85"><?php echo $this->_tpl_vars['list']['id_content']; ?>
</textarea>
			</td>
		</tr>
		</table>
		</td></tr>
	</table>
	
	</div>
	<div id="tabs-2">
	
	<table>
	<tr>
		<td>Page Title</td><td>:</td>
		<td><input type="text" name="en_page_title" value="<?php echo $this->_tpl_vars['en_page_title']; ?>
" class="required" style="width:250px"></td>
	</tr>
	<tr><td colspan="3">&nbsp;</td></tr>
	<tr><td colspan="3">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<!--
			<td>Meta Keywords<textarea name="en_meta_keywords" class="static required"><?php echo $this->_tpl_vars['list']['en_meta_keywords']; ?>
</textarea></td>
			<td>Meta Description<textarea name="en_meta_description" class="static required"><?php echo $this->_tpl_vars['list']['en_meta_description']; ?>
</textarea></td>
			-->
		</tr>
		<tr>
			<td colspan="2">
				Content<br>
				<textarea name="en_content" id="en_content"  class="required" rows="10" cols="85"><?php echo $this->_tpl_vars['list']['en_content']; ?>
</textarea>
			</td>
		</tr>
		</table>
		</td></tr>
	</table>
	</div>
</div>	
	
	<table>
	<tr><td>&nbsp;</td><td>&nbsp;</td>
		<td><input type="hidden" name="article_id" value="<?php echo $this->_tpl_vars['list']['article_id']; ?>
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