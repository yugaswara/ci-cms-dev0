<?php /* Smarty version 2.6.19, created on 2009-05-21 23:21:16
         compiled from events/edit.html */ ?>
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
events/index/<?php echo $this->_tpl_vars['page_num']; ?>
"><div class="BlueButton right">Back to List</div></a>
			</div>
                <form name="article" id="form" method="POST" action="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
events/<?php echo $this->_tpl_vars['target']; ?>
">
<table width="100%" border="0">
	<tr>
		<td></td><td></td><td><input type="hidden" name="category" value="events"></td>
	<tr>
	<tr>
		<td>Date</td><td>:</td>
		<td>
			<input type="text" name="date" class="required" id="date" value="<?php echo $this->_tpl_vars['date']; ?>
">
		</td>
	<tr>
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
		<td><input type="text" name="id_title" class="required" value="<?php echo $this->_tpl_vars['id_title']; ?>
" style="width:250px"></td>
	</tr>
	<tr><td>Content</td><td>:</td>
		<td><textarea name="id_content" id="id_content" rows="10" cols="85"><?php echo $this->_tpl_vars['list']['id_content']; ?>
</textarea>
	</td></tr>
	</table>
	
	</div>
	<div id="tabs-2">
	
	<table>
	<tr>
		<td>Title</td><td>:</td>
		<td><input type="text" name="en_title" value="<?php echo $this->_tpl_vars['en_title']; ?>
" style="width:250px"></td>
	</tr>
	<tr><td>Content</td><td>:</td>
		<td><textarea name="en_content" id="en_content" rows="10" cols="85"><?php echo $this->_tpl_vars['list']['en_content']; ?>
</textarea>
	</td></tr>
	</table>
	</div>
</div>	
	
	<table>
	<tr><td>&nbsp;</td><td>&nbsp;</td>
		<td><input type="hidden" name="news_event_id" value="<?php echo $this->_tpl_vars['list']['news_event_id']; ?>
">
			<input type="text" name="page_num" id="page_num" value="<?php echo $this->_tpl_vars['page_num']; ?>
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