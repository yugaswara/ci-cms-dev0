<?php
class Links extends AdminController {

    function Links()
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
				'links_menu' => 'activemenu',
				'database_alumni_menu' => 'menu1')
        );
        $this->smarty->assign('PAGETITLE' ,WEB_TITLE . ' ADMIN - NEWS');
    }
	
    function index($page="")
    {
		
		$this->load->library('pagination');

		$query  = $this->db->get('links');

		$config['uri_segment'] = 4;
		$config['base_url'] = $this->config->item('base_url').'/admin/news/index/';
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = '10';

		$this->pagination->initialize($config);
		
		$this->smarty->assign("navigator", $this->pagination->create_links());
		$this->smarty->assign("page_num", $page);
		
		$this->db->limit(10, $page);
		$query  = $this->db->get_where('links');
        $rows   = $query->result_array();

        $this->smarty->assign('list', $rows);
		$js[] = '$(document).ready(function(){';
		$js[] = '	$(".check:checkbox").click(selection);';
		$js[] = '});';
		
		$this->smarty->assign("InlineJS", $js);
		
		$this->smarty->append("JS",JS_PATH."admin.js");

        $this->smarty->assign('list', $rows);
        $this->smarty->display('links/list.html');

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
			elements : "en_content, id_content",
			onchange_callback: function(editor) {tinyMCE.triggerSave();$("#" + editor.id).valid();}});';
		
		$this->smarty->assign("InlineJS", $js);
		
		$this->smarty->assign('mode', 'ADD');
		$this->smarty->assign('target', 'do_adding');
		$this->smarty->assign('page_num', $page_num);
        $this->smarty->display('links/edit.html');

    }
	
    function do_adding($page_num="")
    {

        $fields = array (
			'link_name'=> $this->input->post('link_name'),
			'link_address'=> $this->input->post('link_address')
        );
		
		$this->db->insert('links', $fields);
		redirect('admin/links/index/'.$page_num, 'refresh');

    }
	
    function viewing($links_id="", $page_num="")
    {
		
        $query  = $this->db->get_where('links', array("links_id" => $links_id));
        $rows   = $query->result_array();
		
        $this->smarty->assign('list', $rows[0]);
		$this->smarty->assign('page_num', $page_num);
        $this->smarty->display('links/view.html');

    }
	
    function editing($links_id="", $page_num="")
    {
		
        $query  = $this->db->get_where('links', array("links_id" => $links_id));
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
			elements : "en_content, id_content",
			onchange_callback: function(editor) {tinyMCE.triggerSave();$("#" + editor.id).valid();}});';
		
		$this->smarty->assign("InlineJS", $js);
		$this->smarty->assign("page_num", $page_num);
        $this->smarty->display('links/edit.html');

    }
	
    function do_editing()
    {
		
        $fields = array (
			'link_name'=> $this->input->post('link_name'),
			'link_address'=> $this->input->post('link_address')
        );

        $this->db->where('links_id', $this->input->post('links_id'));
        $this->db->update('links', $fields);
        redirect('admin/links/index/'.$this->input->post('page_num'), 'refresh');

    }
	
    function deleting($links_id="", $page_num="")
    {
		
		$this->db->delete('links', "links_id = '$links_id'");
		redirect('admin/links/index/'.$page_num, 'refresh');

    }

    function multi_deleting()
    {
		$collectIds = $this->input->post('collectIds');
		$page_num = $this->input->post('page_num');
		$s_collectIds = split('~', $collectIds);
		foreach($s_collectIds as $de){
			$this->db->delete('links', "links_id = '$de'"); 
		}
		redirect('admin/links/index/'.$page_num, 'refresh');

    }


}
?>
