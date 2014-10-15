<?php
class Download_center extends AdminController {

    function Download_center()
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
                'download_center_menu' => 'activemenu',
                'news_menu' => 'menu1',
                'events_menu' => 'menu1',
				'links_menu' => 'menu1',
				'database_alumni_menu' => 'menu1')
        );
        $this->smarty->assign('PAGETITLE' ,WEB_TITLE . ' ADMIN - ARTICLE');
    }
	
    function index($page="")
    {
		
		$this->load->library('pagination');

		$query  = $this->db->get('upload');

		$config['uri_segment'] = 4;
		$config['base_url'] = $this->config->item('base_url').'/admin/download_center/index/';
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = '10';

		$this->pagination->initialize($config);
		
		$this->smarty->assign("navigator", $this->pagination->create_links());
		$this->smarty->assign("page_num", $page);
		
		$this->db->limit(10, $page);
		$query  = $this->db->get('upload');
        $rows   = $query->result_array();

        $this->smarty->assign('list', $rows);
		$js[] = '$(document).ready(function(){';
		$js[] = '	$(".check:checkbox").click(selection);';
		$js[] = '});';
		
		$this->smarty->assign("InlineJS", $js);
		
		$this->smarty->append("JS",JS_PATH."admin.js");

        $this->smarty->assign('list', $rows);
        $this->smarty->display('download_center/list.html');

    }
	
    function adding($page_num="")
    {
		
		$this->smarty->append("JS",JS_PATH."jquery.validate.min.js");
		$this->smarty->append("JS",JS_PATH."tiny_mce/tiny_mce_gzip.js");
		$this->smarty->append("JS",JS_PATH."jquery-ui-1.7.1.custom.min.js");
		
		$js[] = '$(document).ready(function(){';
		$js[] = '	$("#form").validate();';
		$js[] = '	$("#tabs").tabs();';
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
			elements : "en_description, id_description",
			onchange_callback: function(editor) {tinyMCE.triggerSave();$("#" + editor.id).valid();}});';
		
		$this->smarty->assign("InlineJS", $js);
		
		$this->smarty->assign('mode', 'ADD');
		$this->smarty->assign('page_num', $page_num);
		$this->smarty->assign('target', 'do_adding');
        $this->smarty->display('download_center/edit.html');

    }
	
    function do_adding()
    {
		
		$config['upload_path'] = 'static/files';
		$config['allowed_types'] = 'doc|xls|ppt|flv|pdf|jpg|png|gif';
		$config['file_name'] = date('mydhis');
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('download_files'))
		{
			@unlink($this->input->post('old_file'));
			$file = $config['upload_path'].'/'.$config['file_name'].$this->upload->file_ext;
		}	
		
        $fields = array (
			'category'=> $this->input->post('category'),
			'id_title'=> $this->input->post('id_title'),
            'id_description'=> $this->input->post('id_description'),
			'en_title'=> $this->input->post('en_title'),
            'en_description'=> $this->input->post('en_description'),
			'file'=> $file,
			'active'=> $this->input->post('active')
        );
		$this->db->insert('upload', $fields);
		redirect('admin/download_center/index/'.$this->input->post('page_num'), 'refresh');

    }
	
    function viewing($upload_id="", $page_num="")
    {
		
        $query  = $this->db->get_where('upload', array("upload_id" => $upload_id));
        $rows   = $query->result_array();
		
        $this->smarty->assign('list', $rows[0]);
		$this->smarty->assign('page_num', $page_num);
        $this->smarty->display('download_center/view.html');

    }
	
    function editing($upload_id="", $page_num="")
    {
		
        $query  = $this->db->get_where('upload', array("upload_id" => $upload_id));
        $rows   = $query->result_array();
		
		$this->smarty->assign('id_title', htmlentities($rows[0]['id_title']));
		$this->smarty->assign('en_title', htmlentities($rows[0]['en_title']));
        $this->smarty->assign('list', $rows[0]);
		$this->smarty->assign('mode', 'EDIT');
		$this->smarty->assign('target', 'do_editing');
		
		$this->smarty->append("JS",JS_PATH."jquery.validate.min.js");
		$this->smarty->append("JS",JS_PATH."article.js");
		$this->smarty->append("JS",JS_PATH."tiny_mce/tiny_mce_gzip.js");
		$this->smarty->append("JS",JS_PATH."jquery-ui-1.7.1.custom.min.js");
		
		$js[] = '$(document).ready(function(){';
		$js[] = '	$("#form").validate();';
		$js[] = '	$("#tabs").tabs();';
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
			elements : "en_description, id_description",
			onchange_callback: function(editor) {tinyMCE.triggerSave();$("#" + editor.id).valid();}});';
		
		$this->smarty->assign("InlineJS", $js);
		$this->smarty->assign("page_num", $page_num);
        $this->smarty->display('download_center/edit.html');

    }
	
    function do_editing()
    {
		
        // save the object
		
		$config['upload_path'] = 'static/files';
		$config['allowed_types'] = 'doc|xls|ppt|flv|pdf|jpg|png|gif';
		$config['file_name'] = date('mydhis');
		$config['overwrite'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('download_files'))
		{
			@unlink($this->input->post('old_file'));
			$file = $config['upload_path'].'/'.$config['file_name'].$this->upload->file_ext;
		}	
		else
		{
			$file = $this->input->post('old_file');
		}

        $fields = array (
			'category'=> $this->input->post('category'),
			'id_title'=> $this->input->post('id_title'),
            'id_description'=> $this->input->post('id_description'),
			'en_title'=> $this->input->post('en_title'),
            'en_description'=> $this->input->post('en_description'),
            'active'=> $this->input->post('active'),
			'file'=> $file,
        );

        $this->db->where('upload_id', $this->input->post('upload_id'));
        $this->db->update('upload', $fields);
        redirect('admin/download_center/index/'.$this->input->post('page_num'), 'refresh');

    }
	
    function deleting($upload_id="", $page_num="")
    {
		
		$this->db->delete('upload', "upload_id = '$upload_id'");
		redirect('admin/download_center/index/'.$page_num, 'refresh');

    }

    function multi_deleting()
    {
		$collectIds = $this->input->post('collectIds');
		$page_num = $this->input->post('page_num');
		$s_collectIds = split('~', $collectIds);
		foreach($s_collectIds as $de){
			$this->db->delete('upload', "upload_id = '$de'"); 
		}
		redirect('admin/download_center/index/'.$page_num, 'refresh');

    }


}
?>
