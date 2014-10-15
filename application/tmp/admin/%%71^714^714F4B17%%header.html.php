<?php /* Smarty version 2.6.19, created on 2009-05-21 02:27:04
         compiled from header.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $this->_tpl_vars['PAGETITLE']; ?>
</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-language" content="id" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<meta name="robots" content="noodp,noydir" />
		<?php unset($this->_sections['icss']);
$this->_sections['icss']['name'] = 'icss';
$this->_sections['icss']['loop'] = is_array($_loop=$this->_tpl_vars['CSS']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['icss']['show'] = true;
$this->_sections['icss']['max'] = $this->_sections['icss']['loop'];
$this->_sections['icss']['step'] = 1;
$this->_sections['icss']['start'] = $this->_sections['icss']['step'] > 0 ? 0 : $this->_sections['icss']['loop']-1;
if ($this->_sections['icss']['show']) {
    $this->_sections['icss']['total'] = $this->_sections['icss']['loop'];
    if ($this->_sections['icss']['total'] == 0)
        $this->_sections['icss']['show'] = false;
} else
    $this->_sections['icss']['total'] = 0;
if ($this->_sections['icss']['show']):

            for ($this->_sections['icss']['index'] = $this->_sections['icss']['start'], $this->_sections['icss']['iteration'] = 1;
                 $this->_sections['icss']['iteration'] <= $this->_sections['icss']['total'];
                 $this->_sections['icss']['index'] += $this->_sections['icss']['step'], $this->_sections['icss']['iteration']++):
$this->_sections['icss']['rownum'] = $this->_sections['icss']['iteration'];
$this->_sections['icss']['index_prev'] = $this->_sections['icss']['index'] - $this->_sections['icss']['step'];
$this->_sections['icss']['index_next'] = $this->_sections['icss']['index'] + $this->_sections['icss']['step'];
$this->_sections['icss']['first']      = ($this->_sections['icss']['iteration'] == 1);
$this->_sections['icss']['last']       = ($this->_sections['icss']['iteration'] == $this->_sections['icss']['total']);
?>
		<link href="<?php echo $this->_tpl_vars['CSS'][$this->_sections['icss']['index']]; ?>
" type="text/css" rel="stylesheet" media="screen" />
		<?php endfor; endif; ?>
		<?php unset($this->_sections['ijs']);
$this->_sections['ijs']['name'] = 'ijs';
$this->_sections['ijs']['loop'] = is_array($_loop=$this->_tpl_vars['JS']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ijs']['show'] = true;
$this->_sections['ijs']['max'] = $this->_sections['ijs']['loop'];
$this->_sections['ijs']['step'] = 1;
$this->_sections['ijs']['start'] = $this->_sections['ijs']['step'] > 0 ? 0 : $this->_sections['ijs']['loop']-1;
if ($this->_sections['ijs']['show']) {
    $this->_sections['ijs']['total'] = $this->_sections['ijs']['loop'];
    if ($this->_sections['ijs']['total'] == 0)
        $this->_sections['ijs']['show'] = false;
} else
    $this->_sections['ijs']['total'] = 0;
if ($this->_sections['ijs']['show']):

            for ($this->_sections['ijs']['index'] = $this->_sections['ijs']['start'], $this->_sections['ijs']['iteration'] = 1;
                 $this->_sections['ijs']['iteration'] <= $this->_sections['ijs']['total'];
                 $this->_sections['ijs']['index'] += $this->_sections['ijs']['step'], $this->_sections['ijs']['iteration']++):
$this->_sections['ijs']['rownum'] = $this->_sections['ijs']['iteration'];
$this->_sections['ijs']['index_prev'] = $this->_sections['ijs']['index'] - $this->_sections['ijs']['step'];
$this->_sections['ijs']['index_next'] = $this->_sections['ijs']['index'] + $this->_sections['ijs']['step'];
$this->_sections['ijs']['first']      = ($this->_sections['ijs']['iteration'] == 1);
$this->_sections['ijs']['last']       = ($this->_sections['ijs']['iteration'] == $this->_sections['ijs']['total']);
?>
		<script src="<?php echo $this->_tpl_vars['JS'][$this->_sections['ijs']['index']]; ?>
" type="text/javascript"></script>
		<?php endfor; endif; ?>
		<script language="javascript" type="text/javascript">
		// <![CDATA[
		<?php unset($this->_sections['ijs']);
$this->_sections['ijs']['name'] = 'ijs';
$this->_sections['ijs']['loop'] = is_array($_loop=$this->_tpl_vars['InlineJS']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ijs']['show'] = true;
$this->_sections['ijs']['max'] = $this->_sections['ijs']['loop'];
$this->_sections['ijs']['step'] = 1;
$this->_sections['ijs']['start'] = $this->_sections['ijs']['step'] > 0 ? 0 : $this->_sections['ijs']['loop']-1;
if ($this->_sections['ijs']['show']) {
    $this->_sections['ijs']['total'] = $this->_sections['ijs']['loop'];
    if ($this->_sections['ijs']['total'] == 0)
        $this->_sections['ijs']['show'] = false;
} else
    $this->_sections['ijs']['total'] = 0;
if ($this->_sections['ijs']['show']):

            for ($this->_sections['ijs']['index'] = $this->_sections['ijs']['start'], $this->_sections['ijs']['iteration'] = 1;
                 $this->_sections['ijs']['iteration'] <= $this->_sections['ijs']['total'];
                 $this->_sections['ijs']['index'] += $this->_sections['ijs']['step'], $this->_sections['ijs']['iteration']++):
$this->_sections['ijs']['rownum'] = $this->_sections['ijs']['iteration'];
$this->_sections['ijs']['index_prev'] = $this->_sections['ijs']['index'] - $this->_sections['ijs']['step'];
$this->_sections['ijs']['index_next'] = $this->_sections['ijs']['index'] + $this->_sections['ijs']['step'];
$this->_sections['ijs']['first']      = ($this->_sections['ijs']['iteration'] == 1);
$this->_sections['ijs']['last']       = ($this->_sections['ijs']['iteration'] == $this->_sections['ijs']['total']);
?>
		<?php echo $this->_tpl_vars['InlineJS'][$this->_sections['ijs']['index']]; ?>

		<?php endfor; endif; ?>
		// ]]>
		</script>

	</head>
	<body>
<div class="MainStructure">
    <div class="TopContainer">
		<div class="LoggoField"><img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
loggo2.png"></div>
        <?php if ($this->_tpl_vars['header_menu'] != 'disabled'): ?>
		<div class="MenuField">
			<div class="<?php echo $this->_tpl_vars['home_menu']; ?>
"><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
admin/">Home</a></div>
			<div class="<?php echo $this->_tpl_vars['article_menu']; ?>
"><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
admin/article">Article</a></div>
			<div class="<?php echo $this->_tpl_vars['download_center_menu']; ?>
"><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
admin/download_center/index/0">Download Center</a></div>
			<div class="<?php echo $this->_tpl_vars['news_menu']; ?>
"><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
admin/news/index/0">News</a></div>
			<div class="<?php echo $this->_tpl_vars['events_menu']; ?>
"><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
admin/events/index/0">Events</a></div>
			<div class="<?php echo $this->_tpl_vars['links_menu']; ?>
"><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
admin/links/index/0">Links</a></div>
			<div class="<?php echo $this->_tpl_vars['database_alumni_menu']; ?>
"><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
admin/database_alumni/index/0">Database Alumni</a></div>
        <!--
		<div class="LanguageField right">
			<div class="Flag left"><a href="#"><img src="<?php echo $this->_tpl_vars['admin_files']; ?>
images/flag01.gif"></a></div>
			<div class="Flag left"><a href="#"><img src="<?php echo $this->_tpl_vars['admin_files']; ?>
images/flag02.gif"></a></div>
		</div>
		-->
		</div>
        <?php endif; ?>
	</div>