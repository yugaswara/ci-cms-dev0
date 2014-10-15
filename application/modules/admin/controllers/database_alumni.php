<?php
class Database_alumni extends AdminController {

    function Database_alumni()
    {
        parent::AdminController();

		if(!$this->authentication->logged_in())
     		redirect('admin/login/', 'refresh');

        $this->smarty->assign(array(
                'BASE_PATH' => BASE_PATH,
                'IMG_PATH' => IMG_PATH,
                'IMG_ID_PATH', IMG_ID_PATH,
                'CSS_PATH' => CSS_PATH,
                'JS_PATH' => JS_PATH,
                'ADMIN_PATH' => BASE_PATH . 'admin/',
                'RIGHT_SIDEBAR' => 'rightsidebar.html',
                'home_menu' => 'menu1',
                'article_menu' => 'menu1',
                'download_center_menu' => 'menu1',
                'news_menu' => 'menu1',
                'events_menu' => 'menu1',
				'links_menu' => 'menu1',
				'database_alumni_menu' => 'activemenu')
        );
        $this->smarty->assign('PAGETITLE' ,WEB_TITLE . ' ADMIN - DATABASE ALUMNI');
    }
	
    function index($page="")
    {
		
		$this->load->library('pagination');

		$query  = $this->db->get('alumni');

		$config['uri_segment'] = 4;
		$config['base_url'] = $this->config->item('base_url').'/admin/database_alumni/index/';
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = '10';

		$this->pagination->initialize($config);
		
		$this->smarty->assign("navigator", $this->pagination->create_links());
		$this->smarty->assign("page_num", $page);
		
		$this->db->limit(10, $page);
		$query  = $this->db->get_where('alumni');
        $rows   = $query->result_array();

        $this->smarty->assign('list', $rows);
		$js[] = '$(document).ready(function(){';
		$js[] = '	$(".check:checkbox").click(selection);';
		$js[] = '});';
		
		$this->smarty->assign("InlineJS", $js);
		
		$this->smarty->append("JS",JS_PATH."admin.js");

        $this->smarty->assign('list', $rows);
        $this->smarty->display('database_alumni/list.html');

    }
	
    function adding($page_num="")
    {
		
		$this->smarty->append("JS",JS_PATH."jquery.validate.min.js");
		$this->smarty->append("JS",JS_PATH."tiny_mce/tiny_mce_gzip.js");
		$this->smarty->append("JS",JS_PATH."jquery/ui.datepicker.js");
		
		$js[] = '$(document).ready(function(){';
		$js[] = '	$("#date").datepicker({ dateFormat: \'dd/mm/yy\' }).attr("readonly", "readonly");';
		$js[] = '	$("#form").validate();';
		$js[] = '});';
		$js[] = 'tinyMCE_GZ.init({themes : "simple,advanced",languages : "en",disk_cache : false,debug : false});';
		$js[] = 'tinyMCE.init({mode : "exact",
			theme : "advanced",
			plugins:"ibrowser",
			theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink",
			theme_advanced_buttons2 : "formatselect,fontselect,fontsizeselect,separator,ibrowser,code",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			elements : "thesis_content",
			onchange_callback: function(editor) {tinyMCE.triggerSave();$("#" + editor.id).valid();}});';
		
		$this->smarty->assign("InlineJS", $js);
		
		$this->smarty->assign('mode', 'ADD');
		$this->smarty->assign('target', 'do_adding');
		$this->smarty->assign('page_num', $page_num);
        $this->smarty->display('database_alumni/edit.html');

    }
	
    function do_adding($page_num="")
    {

		$batch = $this->input->post('batch');
		$gender = $this->input->post('gender');
		if($gender == 'm'){
			$v_gender = '01';
		}elseif($gender == 'f'){
			$v_gender = '02';
		}else{
			$v_gender = '00';
		}
		$scholarship = $this->input->post('scholarship');
		if($scholarship == 'EEDP Project (ADB)'){
			$v_scholarship = '01';
		}elseif($scholarship == 'FF'){
			$v_scholarship = '02';
		}elseif($scholarship == 'HUYGENS'){
			$v_scholarship = '03';
		}elseif($scholarship == 'INIS-leidenship'){
			$v_scholarship = '04';
		}elseif($scholarship == 'Leprosy Relief'){
			$v_scholarship = '05';
		}elseif($scholarship == 'NFP'){
			$v_scholarship = '06';
		}elseif($scholarship == 'NFP*'){
			$v_scholarship = '07';
		}elseif($scholarship == 'NFP+HUYGENS'){
			$v_scholarship = '08';
		}elseif($scholarship == 'StuNed'){
			$v_scholarship = '09';
		}elseif($scholarship == 'TALIS'){
			$v_scholarship = '10';
		}elseif($scholarship == 'TPSDP'){
			$v_scholarship = '11';
		}elseif($scholarship == 'Untar Schol'){
			$v_scholarship = '12';
		}elseif($scholarship == 'WAU-Fellowship'){
			$v_scholarship = '13';
		}else{
			$v_scholarship = '14';
		}
		$unique_id = $batch.'-'.$v_gender.'-'.$v_scholarship.'-'.rand(100, 1000);
        $fields = array (
			'unique_id'=> $unique_id,
			'name'=> $this->input->post('name'),
			'gender'=> $this->input->post('gender'),
			'email_address'=> $this->input->post('email_address'),
			'batch'=> $this->input->post('batch'),
			'dob'=> $this->input->post('dob'),
			'scholarship'=> $this->input->post('scholarship'),
			'univ'=> $this->input->post('univ'),
			'study_program'=> $this->input->post('study_program'),
			'mobile'=> $this->input->post('mobile'),
			'home_address'=> $this->input->post('home_address'),
			'home_city'=> $this->input->post('home_city'),
			'home_phone'=> $this->input->post('home_phone'),
			'office_address'=> $this->input->post('office_address'),
			'office_city'=> $this->input->post('office_city'),
			'office_provinsi'=> $this->input->post('office_provinsi'),
			'office_phone'=> $this->input->post('office_phone'),
			'office_fax'=> $this->input->post('office_fax'),
			'others'=> $this->input->post('others'),
			'thesis_title'=> $this->input->post('thesis_title'),
			'thesis_content'=> $this->input->post('thesis_content')
        );
		
		$this->db->insert('alumni', $fields);
		redirect('insert_forum.php?name='.$unique_id.'&email='.$this->input->post('email_address').'&page_num='.$page_num, 'refresh');

    }
	
    function viewing($unique_id="", $page_num="")
    {
		
        $query  = $this->db->get_where('alumni', array("unique_id" => $unique_id));
        $rows   = $query->result_array();
		
        $this->smarty->assign('list', $rows[0]);
		$this->smarty->assign('page_num', $page_num);
        $this->smarty->display('database_alumni/view.html');

    }
	
    function editing($unique_id="", $page_num="")
    {
		
        $query  = $this->db->get_where('alumni', array("unique_id" => $unique_id));
        $rows   = $query->result_array();

        $this->smarty->assign('list', $rows[0]);
		$this->smarty->assign('mode', 'ADD');
		$this->smarty->assign('target', 'do_editing');
		
		$this->smarty->append("JS",JS_PATH."jquery.validate.min.js");
		$this->smarty->append("JS",JS_PATH."news.js");
		$this->smarty->append("JS",JS_PATH."tiny_mce/tiny_mce_gzip.js");
		$this->smarty->append("JS",JS_PATH."jquery/ui.datepicker.js");
		
		$js[] = '$(document).ready(function(){';
		$js[] = '	$("#form").validate();';
		$js[] = '	$("#date").datepicker().attr("readonly", "readonly");';
		$js[] = '});';
		$js[] = 'tinyMCE_GZ.init({themes : "simple,advanced",languages : "en",disk_cache : false,debug : false});';
		$js[] = 'tinyMCE.init({mode : "exact",
			theme : "advanced",
			plugins:"ibrowser",
			theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink",
			theme_advanced_buttons2 : "formatselect,fontselect,fontsizeselect,separator,ibrowser,code",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			elements : "thesis_content",
			onchange_callback: function(editor) {tinyMCE.triggerSave();$("#" + editor.id).valid();}});';
		
		$this->smarty->assign("InlineJS", $js);
		$this->smarty->assign("page_num", $page_num);
        $this->smarty->display('database_alumni/edit.html');

    }
	
    function do_editing()
    {
		
        $fields = array (
			'name'=> $this->input->post('name'),
			'gender'=> $this->input->post('gender'),
			'email_address'=> $this->input->post('email_address'),
			'batch'=> $this->input->post('batch'),
			'dob'=> $this->input->post('dob'),
			'scholarship'=> $this->input->post('scholarship'),
			'univ'=> $this->input->post('univ'),
			'study_program'=> $this->input->post('study_program'),
			'mobile'=> $this->input->post('mobile'),
			'home_address'=> $this->input->post('home_address'),
			'home_city'=> $this->input->post('home_city'),
			'home_phone'=> $this->input->post('home_phone'),
			'office_address'=> $this->input->post('office_address'),
			'office_city'=> $this->input->post('office_city'),
			'office_provinsi'=> $this->input->post('office_provinsi'),
			'office_phone'=> $this->input->post('office_phone'),
			'office_fax'=> $this->input->post('office_fax'),
			'others'=> $this->input->post('others'),
			'thesis_title'=> $this->input->post('thesis_title'),
			'thesis_content'=> $this->input->post('thesis_content')
        );

        $this->db->where('unique_id', $this->input->post('unique_id'));
        $this->db->update('alumni', $fields);
        redirect('admin/database_alumni/index/'.$this->input->post('page_num'), 'refresh');

    }
	
    function deleting($unique_id="", $page_num="")
    {
		
		$this->db->delete('alumni', "unique_id = '$unique_id'");
		redirect('delete_forum.php?unique_id='.$unique_id.'&page_num='.$page_num, 'refresh');

    }

    function multi_deleting()
    {
		$collectIds = $this->input->post('collectIds');
		$page_num = $this->input->post('page_num');
		$s_collectIds = split('~', $collectIds);
		foreach($s_collectIds as $de){
			$this->db->delete('alumni', "unique_id = '$de'"); 
		}
		redirect('delete_multiple_forum.php?collectIds='.$collectIds.'&page_num='.$page_num, 'refresh');

    }


}
?>
