<?php

class Article extends AdminController {

    function Article()
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
                'article_menu' => 'activemenu',
                'download_center_menu' => 'menu1',
                'news_menu' => 'menu1',
                'events_menu' => 'menu1',
				'links_menu' => 'menu1',
				'database_alumni_menu' => 'menu1')
        );
        $this->smarty->assign('PAGETITLE' ,WEB_TITLE . ' ADMIN - ARTICLE');
    }

    /*
     * Index page (list of static-content)
     */
    function index()
    {

        $this->smarty->display('article/article.html');

    }

    function listing($article_name="", $page="")
    {
		
		$this->load->library('pagination');

		$query  = $this->db->get_where('article', array("category" => $article_name));
		
		$config['uri_segment'] = 5;
		$config['base_url'] = $this->config->item('base_url').'/admin/article/listing/'.$article_name;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = '10';

		$this->pagination->initialize($config);
		
		$this->smarty->assign("navigator", $this->pagination->create_links());
		$this->smarty->assign("page_num", $page);
		
		$this->db->limit(10, $page);
        $query  = $this->db->get_where('article', array("category" => $article_name));
		
        $rows   = $query->result_array();
		
		$this->smarty->assign('category', $article_name);
        $this->smarty->assign('list', $rows);
		$js[] = '$(document).ready(function(){';
		$js[] = '	$(".check:checkbox").click(selection);';
		$js[] = '});';
		
		$this->smarty->assign("InlineJS", $js);
		
		$this->smarty->append("JS",JS_PATH."admin.js");

        $this->smarty->display('article/list.html');

    }

    function viewing($article_id="", $page_num="")
    {
		
        $query  = $this->db->get_where('article', array("article_id" => $article_id));
        $rows   = $query->result_array();
		
        $this->smarty->assign('list', $rows[0]);
		$this->smarty->assign('page_num', $page_num);
        $this->smarty->display('article/view.html');

    }
	
    function editing($article_id="", $page_num="")
    {
		
        $query  = $this->db->get_where('article', array("article_id" => $article_id));
        $rows   = $query->result_array();
		
		$this->smarty->assign('id_page_title', htmlentities($rows[0]['id_page_title']));
		$this->smarty->assign('en_page_title', htmlentities($rows[0]['en_page_title']));
        $this->smarty->assign('list', $rows[0]);
		$this->smarty->assign('mode', 'ADD');
		$this->smarty->assign('page_num', $page_num);
		$this->smarty->assign('target', 'do_editing');
		
		$this->smarty->append("JS",JS_PATH."jquery.validate.min.js");
		$this->smarty->append("JS",JS_PATH."article.js");
		$this->smarty->append("JS",JS_PATH."tiny_mce/tiny_mce_gzip.js");
		$this->smarty->append("JS",JS_PATH."jquery-ui-1.7.1.custom.min.js");
		
		$js[] = '$(document).ready(function(){';
		$js[] = '	$("#tabs").tabs();';
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
        $this->smarty->display('article/edit.html');

    }
	
    function do_editing()
    {
		
        // save the object
        $fields = array (
			'category'=> $this->input->post('category'),
            'active'=> $this->input->post('active'),
			'id_page_title'=> $this->input->post('id_page_title'),
            'id_meta_keywords'=> $this->input->post('id_meta_keywords'),
            'id_meta_description'=> $this->input->post('id_meta_description'),
            'id_content'=> $this->input->post('id_content'),
            'en_page_title'=> $this->input->post('en_page_title'),
            'en_meta_keywords'=> $this->input->post('en_meta_keywords'),
            'en_meta_description'=> $this->input->post('en_meta_description'),
            'en_content'=> $this->input->post('en_content'),
        );

        //$success = $this->_model->add( $info );
        //return array($success, $id);
        $this->db->where('article_id', $this->input->post('article_id'));
        $this->db->update('article', $fields);
        redirect('admin/article/listing/'.$this->input->post('category').'/'.$this->input->post('page_num'), 'refresh');

    }

    function adding($article_name="", $page_num="")
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
			elements : "en_content, id_content",
			onchange_callback: function(editor) {tinyMCE.triggerSave();$("#" + editor.id).valid();}});';
			
		$this->smarty->assign("InlineJS", $js);
		$this->smarty->assign("page_num", $page_num);
		
		$this->smarty->assign('list', array("category" => $article_name, "active" => 1));
		$this->smarty->assign('mode', 'ADD');
		$this->smarty->assign('target', 'do_adding');
        $this->smarty->display('article/edit.html');

    }

    function do_adding()
    {
		
        $fields = array (
			'category'=> $this->input->post('category'),
            'active'=> $this->input->post('active'),
			'id_page_title'=> $this->input->post('id_page_title'),
            'id_meta_keywords'=> $this->input->post('id_meta_keywords'),
            'id_meta_description'=> $this->input->post('id_meta_description'),
            'id_content'=> $this->input->post('id_content'),
            'en_page_title'=> $this->input->post('en_page_title'),
            'en_meta_keywords'=> $this->input->post('en_meta_keywords'),
            'en_meta_description'=> $this->input->post('en_meta_description'),
            'en_content'=> $this->input->post('en_content'),
        );
		$this->db->insert('article', $fields);
		redirect('admin/article/listing/'.$this->input->post('category').'/'.$this->input->post('page_num'), 'refresh');
    }

    function deleting($article_id="", $category="", $page_num="")
    {
		
		$this->db->delete('article', "article_id = '$article_id'");
		redirect('admin/article/listing/'.$category.'/'. $page_num, 'refresh');

    }

    function multi_deleting()
    {
		$collectIds = $this->input->post('collectIds');
		$page_num = $this->input->post('page_num');
		$s_collectIds = split('~', $collectIds);
		foreach($s_collectIds as $de){
			$this->db->delete('article', "article_id = '$de'"); 
		}
		redirect('admin/article/listing/'.$this->input->post('category').'/'.$page_num, 'refresh');

    }

}
