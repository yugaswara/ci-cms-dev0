<?php /* Smarty version 2.6.19, created on 2009-05-27 06:59:30
         compiled from pages/home.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['MAIN_TPL_HEADER']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- START Site Wrapper -->
    <div class="main_structure">

      <!-- START Header Section -->
      <div class="head_container clearfix">
				<img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
head_img_left.gif" alt="" class="head_img_left" />
				<div class="head_content">
					<img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
head_img_logo.gif" alt="" class="head_img_logo" />
						<!--Start Top Menu-->
						<div class="hmcc_menu">
							<ul class="main_menu">
								<li <?php if ($this->_tpl_vars['top_menu'] == 'home'): ?>class="active_menu"<?php endif; ?>><?php if ($this->_tpl_vars['top_menu'] != 'home'): ?><a class="left" href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
"><?php echo $this->_tpl_vars['translation']['home'][$this->_tpl_vars['lang']]; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['translation']['home'][$this->_tpl_vars['lang']]; ?>
<?php endif; ?></li>
								<li <?php if ($this->_tpl_vars['top_menu'] == 'news'): ?>class="active_menu"<?php endif; ?>><?php if ($this->_tpl_vars['top_menu'] != 'news'): ?><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
all_news_event/news"><?php echo $this->_tpl_vars['translation']['news'][$this->_tpl_vars['lang']]; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['translation']['news'][$this->_tpl_vars['lang']]; ?>
<?php endif; ?></li>
								<li <?php if ($this->_tpl_vars['top_menu'] == 'events'): ?>class="active_menu"<?php endif; ?>><?php if ($this->_tpl_vars['top_menu'] != 'events'): ?><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
all_news_event/events"><?php echo $this->_tpl_vars['translation']['event'][$this->_tpl_vars['lang']]; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['translation']['event'][$this->_tpl_vars['lang']]; ?>
<?php endif; ?></li>
								<li <?php if ($this->_tpl_vars['top_menu'] == 'contact_us'): ?>class="active_menu"<?php endif; ?>><?php if ($this->_tpl_vars['top_menu'] != 'contact_us'): ?><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/contact_us"><?php echo $this->_tpl_vars['translation']['contact_us'][$this->_tpl_vars['lang']]; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['translation']['contact_us'][$this->_tpl_vars['lang']]; ?>
<?php endif; ?></li>
								<li <?php if ($this->_tpl_vars['top_menu'] == 'links'): ?>class="active_menu"<?php endif; ?>><?php if ($this->_tpl_vars['top_menu'] != 'links'): ?><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
links/"><?php echo $this->_tpl_vars['translation']['links'][$this->_tpl_vars['lang']]; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['translation']['links'][$this->_tpl_vars['lang']]; ?>
<?php endif; ?></li>
								<li <?php if ($this->_tpl_vars['top_menu'] == 'faq'): ?>class="active_menu"<?php endif; ?>><?php if ($this->_tpl_vars['top_menu'] != 'faq'): ?><a class="right" href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/faq/99"><?php echo $this->_tpl_vars['translation']['faq'][$this->_tpl_vars['lang']]; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['translation']['faq'][$this->_tpl_vars['lang']]; ?>
<?php endif; ?></li>
							</ul>
			<!--
							<div class="hmcc_submenu">
								<a class="arrow" href="#">Awardees Coner</a>
								<a class="arrow" href="#">Alumni Coner</a>
							</div>
			-->
						</div>
						<!--End Top Menu-->
				</div>
				<img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
head_img_right.gif" alt="" class="head_img_right" />
        <img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
head_img_banner.gif" alt="" border="0" class="map" usemap="#Map" />
					<map name="Map" id="Map">
						<area shape="poly" coords="51,29" href="#" alt="" />
						<area shape="poly" coords="128,202,133,159,176,154,51,27,1,78,125,201,127,201" href="http://www.studyin.nl" alt="" />
						<area shape="rect" coords="317,192,337,206" href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
/sl/id/" alt="" />
						<area shape="rect" coords="347,192,367,206" href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
/sl/en/" alt="" />
					</map>
      </div>
      <!--END Header Section-->
      

      
      <!-- START Content Section -->
      <div class="content_container clearfix">
        <div class="left_container"></div>
        
        <div class="center_container clearfix">
          <!--Start Left Content-->
          <div class="left_content_field">
            
            <!--Start Acc Menu-->
			<div id="accordion" class="arrowlistmenu">
              <h3 class="menuheader"><a href="javascript:void(0);" class=<?php if ($this->_tpl_vars['active_menu'] == '0'): ?>"CM01_active"<?php else: ?>"CM01"<?php endif; ?>><?php echo $this->_tpl_vars['translation']['about_stuned'][$this->_tpl_vars['lang']]; ?>
</a></h3>
					<ul>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'history'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/history/0"><?php echo $this->_tpl_vars['translation']['history'][$this->_tpl_vars['lang']]; ?>
</a></li>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'general_information'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/general_information/0"><?php echo $this->_tpl_vars['translation']['general_information'][$this->_tpl_vars['lang']]; ?>
</a></li>
					</ul>
              <h3 class="menuheader"><a href="javascript:void(0);" class=<?php if ($this->_tpl_vars['active_menu'] == '1'): ?>"CM01_active"<?php else: ?>"CM01"<?php endif; ?>><?php echo $this->_tpl_vars['translation']['testimonials'][$this->_tpl_vars['lang']]; ?>
</a></h3>
					<ul>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'regular_programme'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/alumni_voice/1"><?php echo $this->_tpl_vars['translation']['alumni_voice'][$this->_tpl_vars['lang']]; ?>
</a></li>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'pre_registration'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/english_course/1"><?php echo $this->_tpl_vars['translation']['english_course'][$this->_tpl_vars['lang']]; ?>
</a></li>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'english_test_information'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/employee/1"><?php echo $this->_tpl_vars['translation']['employee'][$this->_tpl_vars['lang']]; ?>
</a></li>
					</ul>
              <h3 class="menuheader"><a href="javascript:void(0);" class=<?php if ($this->_tpl_vars['active_menu'] == '2'): ?>"CM01_active"<?php else: ?>"CM01"<?php endif; ?>><?php echo $this->_tpl_vars['translation']['individual_application'][$this->_tpl_vars['lang']]; ?>
</a></h3>
					<ul>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'regular_programme'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/regular_programme/2"><?php echo $this->_tpl_vars['translation']['regular_programme'][$this->_tpl_vars['lang']]; ?>
</a></li>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'pre_registration'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/pre_registration/2"><?php echo $this->_tpl_vars['translation']['pre_registration'][$this->_tpl_vars['lang']]; ?>
</a></li>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'english_test_information'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/english_test_information/2"><?php echo $this->_tpl_vars['translation']['english_test_information'][$this->_tpl_vars['lang']]; ?>
</a></li>
					</ul>
				<h2 class="menuheader"><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/group_application/" class=<?php if ($this->_tpl_vars['top_menu'] == 'group_application'): ?>"CM01_active"<?php else: ?>"CM01"<?php endif; ?>><?php echo $this->_tpl_vars['translation']['group_application'][$this->_tpl_vars['lang']]; ?>
</a></h2>
				<h2 class="menuheader"><a href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/awardees_corner/" class=<?php if ($this->_tpl_vars['top_menu'] == 'awardees_corner'): ?>"CM01_active"<?php else: ?>"CM01"<?php endif; ?>><?php echo $this->_tpl_vars['translation']['awardees_corner'][$this->_tpl_vars['lang']]; ?>
</a></h2>
				<h3 class="menuheader"><a href="javascript:void(0);" class=<?php if ($this->_tpl_vars['active_menu'] == '3'): ?>"CM01_active"<?php else: ?>"CM01"<?php endif; ?>><?php echo $this->_tpl_vars['translation']['alumni_corner'][$this->_tpl_vars['lang']]; ?>
</a></h3>
					<ul>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'alumni_databases'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
login/alumni_databases/3"><?php echo $this->_tpl_vars['translation']['alumni_database'][$this->_tpl_vars['lang']]; ?>
</a></li>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'alumni_forum'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
login/alumni_forum/3"><?php echo $this->_tpl_vars['translation']['discussion_forum'][$this->_tpl_vars['lang']]; ?>
</a></li>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'stuned_celebration'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
articles/stuned_celebration/3"><?php echo $this->_tpl_vars['translation']['stuned_celebration'][$this->_tpl_vars['lang']]; ?>
</a></li>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'alumni_thesis_databases'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
login/alumni_thesis_databases/3"><?php echo $this->_tpl_vars['translation']['searchable_thesis_database'][$this->_tpl_vars['lang']]; ?>
</a></li>
					</ul>
				<h3 class="menuheader"><a href="javascript:void(0);" class=<?php if ($this->_tpl_vars['active_menu'] == '4'): ?>"CM01_active"<?php else: ?>"CM01"<?php endif; ?>><?php echo $this->_tpl_vars['translation']['download_center'][$this->_tpl_vars['lang']]; ?>
</a></h3>
					<ul>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'individual_application'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
download/individual_application/4"><?php echo $this->_tpl_vars['translation']['individual_application'][$this->_tpl_vars['lang']]; ?>
</a></li>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'group_application_dw'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
download/group_application/4"><?php echo $this->_tpl_vars['translation']['group_application'][$this->_tpl_vars['lang']]; ?>
</a></li>
						<li><a class=<?php if ($this->_tpl_vars['top_menu'] == 'general'): ?>"CM02_active"<?php else: ?>"CM02"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
download/general/4"><?php echo $this->_tpl_vars['translation']['general'][$this->_tpl_vars['lang']]; ?>
</a></li>
					</ul>
			</div>
            <!--End Acc Menu-->
            
            <div class="sponsored">
              <div class="logo_sponsored"><a href="http://www.nesoindonesia.or.id/"><img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
nuffic_neso.gif" alt="sponsored_1" /></a></div>
              <div class="logo_sponsored"><a href="http://www.mfa.nl/jak-id/"><img src="<?php echo $this->_tpl_vars['IMG_PATH']; ?>
kedutaan.gif" alt="sponsored_2" /></a></div>
            </div>
          </div>
          <!--End Left Content-->
          
          <!--Start Center Content-->
          <div class="center_content_field">
            <div class="text_field">
                <?php echo $this->_tpl_vars['content']; ?>

            </div>
          </div>
          <!--End Center Content-->
          
          <!--Start Right Content-->
          <div class="right_content_field">
          
            <!--start search thesis-->
            <div class="search_field">
              <p><?php echo $this->_tpl_vars['translation']['search'][$this->_tpl_vars['lang']]; ?>
</p>
              <p><?php echo $this->_tpl_vars['translation']['thesis_database'][$this->_tpl_vars['lang']]; ?>
</p>
              <form action="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
alumni_thesis_databases/" method="POST">
                <fieldset class="clearfix">
                  <input type="text" name="search" value="" />
                  <button type="submit" value="search"></button>
                </fieldset>
              </form>
            </div>
            <!--end search thesis-->
            
            <!--start news-->
            <div class="news_event">
              <h3><?php echo $this->_tpl_vars['translation']['news'][$this->_tpl_vars['lang']]; ?>
</h3>
              <?php echo $this->_tpl_vars['news']; ?>

              <p><a class="arrow" href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
all_news_event/news"><?php echo $this->_tpl_vars['translation']['all_news'][$this->_tpl_vars['lang']]; ?>
</a></p>
            </div>
            <!--end news-->
            
            <!--start event-->
            <div class="news_event">
              <h3><?php echo $this->_tpl_vars['translation']['event'][$this->_tpl_vars['lang']]; ?>
</h3>
              <?php echo $this->_tpl_vars['event']; ?>

              <p><a class="arrow" href="<?php echo $this->_tpl_vars['BASE_PATH']; ?>
all_news_event/events"><?php echo $this->_tpl_vars['translation']['all_event'][$this->_tpl_vars['lang']]; ?>
</a></p>
            </div>
            <!--end event-->
            
          </div>
          <!--End right Content-->
        </div>
        
        <div class="right_container"></div>
                
      </div>
      <!--END Content Section-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['MAIN_TPL_FOOTER']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>