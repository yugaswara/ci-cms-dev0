<?php /* Smarty version 2.6.19, created on 2009-05-18 13:49:52
         compiled from database_alumni/view.html */ ?>
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
				<div class="TextBar">VIEW PAGE</div>
                <a class="menu5" href="<?php echo $this->_tpl_vars['ADMIN_PATH']; ?>
database_alumni/index/<?php echo $this->_tpl_vars['page_num']; ?>
"><div class="BlueButton right">Back to List</div></a>
			</div>
            <table width="100%">
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['name']; ?>
</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['gender']; ?>
</td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['email_address']; ?>
</td>
                </tr>
                <tr>
                    <td>Batch</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['batch']; ?>
</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['dob']; ?>
</td>
                </tr>
                <tr>
                    <td>Scholarship</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['link_address']; ?>
</td>
                </tr>
                <tr>
                    <td>Univ</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['univ']; ?>
</td>
                </tr>
                <tr>
                    <td>Study Program</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['study_program']; ?>
</td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['mobile']; ?>
</td>
                </tr>
                <tr>
                    <td>Home Address</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['home_address']; ?>
</td>
                </tr> 
                <tr>
                    <td>Home City</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['home_city']; ?>
</td>
                </tr>
                <tr>
                    <td>Home Phone</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['home_phone']; ?>
</td>
                </tr>
                <tr>
                    <td>Office Address</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['office_address']; ?>
</td>
                </tr>
                <tr>
                    <td>Office City</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['office_city']; ?>
</td>
                </tr>
                <tr>
                    <td>Office Province</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['office_provinsi']; ?>
</td>
                </tr>
                <tr>
                    <td>Office Phone</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['office_phone']; ?>
</td>
                </tr>
                <tr>
                    <td>Office Fax</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['office_fax']; ?>
</td>
                </tr>
                <tr>
                    <td>Thesis Title</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['title']; ?>
</td>
                </tr>
                <tr>
                    <td>Thesis Content</td>
                    <td>:</td>
                    <td><?php echo $this->_tpl_vars['list']['thesis_content']; ?>
</td>
                </tr>
            </table>
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