<?php /* Smarty version 2.6.19, created on 2009-05-21 05:47:46
         compiled from news/list.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['MAIN_TPL_HEADER']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="MiddleContainer">
		<div class="ContentFieldList left">
			<div class="BlueLine">
				<div class="TextBar">Article</div>
				<a class="menu5" href="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
news/adding/index/<?php echo $this->_tpl_vars['page_num']; ?>
"><div class="BlueButton right">Add</div></a>		
			</div>
			<table width="99%">
				<tr>
					<td>Checklist</td>
					<td>Page Title</td>
					<td>View</td>
					<td>Edit</td>
					<td>Active</td>
					<td>Delete</td>
				</tr>
				<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
				<tr>
					<td width="60"><input type="checkbox" class="check" name="ar_<?php echo $this->_tpl_vars['item']['news_event_id']; ?>
" value="<?php echo $this->_tpl_vars['item']['news_event_id']; ?>
"></td>
					<td><span class="BoldTxt"><?php echo $this->_tpl_vars['item']['id_title']; ?>
</span> - <span class="Italic"><?php echo $this->_tpl_vars['item']['en_title']; ?>
</span></td>
					<td width="30"><a href="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
news/viewing/<?php echo $this->_tpl_vars['item']['news_event_id']; ?>
/<?php echo $this->_tpl_vars['page_num']; ?>
"><img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
view.gif"></a></td>
					<td width="30"><a href="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
news/editing/<?php echo $this->_tpl_vars['item']['news_event_id']; ?>
/<?php echo $this->_tpl_vars['page_num']; ?>
"><img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
edit.gif"></td>
					<td width="30"><input type="checkbox" class="active"  id="<?php echo $this->_tpl_vars['item']['news_event_id']; ?>
" onClick="javascript:active_check('../../../services/news', '<?php echo $this->_tpl_vars['item']['news_event_id']; ?>
')" name="act_<?php echo $this->_tpl_vars['item']['news_event_id']; ?>
" value="<?php echo $this->_tpl_vars['item']['news_event_id']; ?>
" <?php if ($this->_tpl_vars['item']['active'] == 1): ?>checked<?php endif; ?>></td>
					<td width="30"><a href="javascript:void();" onClick="javascript:delete_confirm('<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
news/deleting/<?php echo $this->_tpl_vars['item']['news_event_id']; ?>
/<?php echo $this->_tpl_vars['page_num']; ?>
')"><img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
delete.gif"></td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
			<div class="BlueLineBtm">
				<div class="BlueButton left"><a class="menu5" href="javascript:checkbox_select_all();">Select All</a></div>
				<div class="BlueButton left"><a class="menu5" href="javascript:checkbox_deselect_all();">Deselect All</a></div>
				<form method="post" action="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
news/multi_deleting" onsubmit="return delete_all_check()">
					<input type="hidden" id="collectIds" name="collectIds">
					<input type="hidden" name="category" value="<?php echo $this->_tpl_vars['category']; ?>
">
					<input type="hidden" id="page_num" name="page_num" value="<?php echo $this->_tpl_vars['page_num']; ?>
">
					<input type="submit" value="Delete Selection" class="BlueButtonR">
					<?php echo $this->_tpl_vars['navigator']; ?>

				</form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['MAIN_TPL_FOOTER']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--
			<div class="WhiteLine">
				<div class="Column1">
					&nbsp;
				</div>
				<div class="Column2">
					Content
				</div>
				<div class="Column3">
					<div class="IconMenu">Delete</div>
					<div class="IconMenu">Active</div>
					<div class="IconMenu">Edit</div>
					<div class="IconMenu">View</div>
				</div>
			</div>
            <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<div class="WhiteLine">
				<div class="Column1">
					<input type="checkbox">
				</div>
				<div class="Column2">
					<span class="BoldTxt"><?php echo $this->_tpl_vars['item']['id_page_title']; ?>
</span> - <span class="Italic"><?php echo $this->_tpl_vars['item']['en_page_title']; ?>
</span>
				</div>
				<div class="Column3">
					<div class="IconMenu"><input type="checkbox"></div>
					<div class="IconMenu"><a href="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
article/editing/<?php echo $this->_tpl_vars['item']['article_id']; ?>
"><img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
edit.gif"></a></div>
					<div class="IconMenu"><a href="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
article/viewing/<?php echo $this->_tpl_vars['item']['article_id']; ?>
"><img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
view.gif"></a></div>
					<div class="IconMenu"><a href="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
article/viewing/<?php echo $this->_tpl_vars['item']['article_id']; ?>
"><img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
delete.gif"></a></div>
				</div>
			</div>
			<?php endforeach; endif; unset($_from); ?>
--!>