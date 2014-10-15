<?php 

class Initial extends InitialController {
    
	var $translation;
	
    function Initial()
    {
        parent::InitialController();
		
        $this->load->model('mhome');
        $this->load->model('translate');
		
		$lang = get_cookie('ln');
		($lang=='')?$lang="id":$lang=$lang;   
		
		$translation = $this->translate->get_translate();
		$this->translation = $translation;
		$this->smarty->assign("translation", $translation);
		$this->smarty->assign("lang", $lang);
        $this->smarty->assign('BASE_PATH', BASE_PATH);
        $this->smarty->assign('IMG_PATH', IMG_PATH);
    }
    
    function index()
    {
		$this->home();
		
		$content = $this->mhome->get_articles('history');
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');

		$this->smarty->assign("top_menu", 'home');
		$this->smarty->assign("news", $news);

		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		
		$this->smarty->display('pages/home.html');
    }
    
    function home($active_menu=99)
    {    
		$this->smarty->append("JS",JS_PATH."jquery-1.3.2.min.js");
		$this->smarty->append("JS",JS_PATH."jquery-ui-1.7.1.custom.min.js");
		
		$this->smarty->append("CSS",CSS_PATH."default.css");
		$this->smarty->append("CSS",CSS_PATH."costum.css");
		
		($active_menu == "")?$active_menu=99:$active_menu=$active_menu;
		$js[] = '$(function() {';
		$js[] = '	$("#accordion").accordion({';
		$js[] = '		autoHeight: false, active: '.$active_menu.', navigation: false, header: "h3"';
		$js[] = '	});';
		$js[] = '});';
		$this->smarty->assign("InlineJS", $js);
    }
    
    function articles($category="", $active_menu="")
    {
		$content = $this->mhome->get_articles($category, $active_menu);
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		$this->home($active_menu);
		$this->smarty->assign("active_menu", $active_menu);
		$this->smarty->assign("top_menu", $category);
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
    }
	
    function alumni_databases($active_menu="", $search="", $page=0)
    {
		if($this->input->post('search') != ''){
			$search = $this->input->post('search');
		}elseif($page == 0 && is_numeric($search)){
			$page = $search;
			$search = "";
		}else{
			$search = $search;
		}
		
		$content = $this->mhome->alumni_databasesz($page, $search);
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		$this->home($active_menu);
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
    }
	
	function alumni_thesis_databases($active_menu='', $search="", $page=0){
		if($this->input->post('search') != ''){
			$search = $this->input->post('search');
		}elseif($page == 0 && is_numeric($search)){
			$page = $search;
			$search = "";
		}else{
			$search = $search;
		}
		$content = $this->mhome->get_thesis($page, $search);
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		($active_menu == 0)?$active_menu='0':$active_menu=$active_menu;
		$this->home($active_menu);
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
	}
	
    function alumni_databases_detail($active_menu="", $id="", $page=0)
    {
		
		$content = $this->mhome->alumni_databases_detl($page, $id);
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		$this->home($active_menu);
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
    }
	
    function alumni_thesis_databases_detail($active_menu="", $id="", $page=0)
    {
		
		$content = $this->mhome->alumni_thesis_databases_detl($page, $id);
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		$this->home($active_menu);
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
    }
	
    function login($category="", $active_menu="")
    {
		session_start();
		$logedin = (isset($_SESSION['logedin']))?$_SESSION['logedin']:'';
		if($logedin != 'ok'){
			$this->smarty->assign("category", $category.'/'.$active_menu);
			$content = $this->smarty->fetch('pages/login.html');
			$news = $this->mhome->get_news_event('news');
			$event = $this->mhome->get_news_event('events');
			$this->home($active_menu);
			$this->smarty->assign("top_menu", $category);
			$this->smarty->assign("news", $news);
			$this->smarty->assign("event", $event);
			$this->smarty->assign("content", $content);
			$this->smarty->display('pages/home.html');
		}else{
			if($category=="alumni_forum"){
				header('Location:'.BASE_PATH.'forum/index.php');
			}else{
				header('Location:'.BASE_PATH.$category.'/'.$active_menu);
			}
		}
    }
	
    function article($category="", $id="", $active_menu='')
    {
		$content = $this->mhome->get_article($id, $active_menu, $category);
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		($active_menu == 0)?$active_menu='0':$active_menu=$active_menu;
		$this->home($active_menu);
		$this->smarty->assign("active_menu", $active_menu);
		$this->smarty->assign("top_menu", $category);
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
    }
	
    function all_news_event($category, $active_menu=0)
    {
		$content = $this->mhome->all_news_event($category, $active_menu);
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		$this->home($active_menu);
		$this->smarty->assign("top_menu", $category);
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
    }
	
    function news_event($category="", $id="", $active_menu=0)
    {
		$content = $this->mhome->detail_news_event($category, $id);
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		$this->home($active_menu);
		$this->smarty->assign("top_menu", $category);
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
    }
	
    function download($category="", $active_menu=0)
    {
		$content = $this->mhome->download_list($category, $active_menu);
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		$this->home($active_menu);
		$this->smarty->assign("active_menu", $active_menu);
		($category == 'group_application')?$category = 'dw_group_application':$category = $category;
		$this->smarty->assign("top_menu", $category);
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
    }

    function download_detail($category="", $id="", $active_menu=0)
    {
		$content = $this->mhome->download($category, $id, $active_menu);
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		$this->home($active_menu);
		$this->smarty->assign("active_menu", $active_menu);
		$this->smarty->assign("top_menu", $category);
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
    }
	
    function links($active_menu=0)
    {
		$content = $this->mhome->links();
		$news = $this->mhome->get_news_event('news');
		$event = $this->mhome->get_news_event('events');
		$this->home($active_menu);
		$this->smarty->assign("top_menu", 'links');
		$this->smarty->assign("news", $news);
		$this->smarty->assign("event", $event);
		$this->smarty->assign("content", $content);
		$this->smarty->display('pages/home.html');
    }
    
    function policy()
    {
        $this->mstatic->get('policy');
    }

    function about()
    {
        $this->mstatic->get('about');
    }

    function our_network()
    {
        $this->mstatic->get('our_network');
    }

    function sla()
    {
        $this->mstatic->get('sla');
    }

    function specials()
    {
        $this->mstatic->get('specials');
    }

    function contact($error = '')
    {
        if($error=='error')
        {
            if($this->curr_lang=='en')
            {
                $message = 'Wrong security code!';
            }
            else
            {
                $message = 'Verkeerde beveiligingscode!';
            }
            $this->smarty->assign('error_message', $message);
        }
        $this->smarty->append("JS",JS_PATH."jquery/jquery.validate.min.js");
        $this->smarty->append('InlineJS', '$(document).ready(function(){
                        $("#form").validate();
                        })');
       
        $random_num = $this->_gen_pass(10);
        
        $this->smarty->assign('rand', $random_num);

        $this->mstatic->get('contact');
    }

    function sitemap()
    {
        $this->smarty->assign('PAGETITLE' ,WEB_TITLE . ' SITEMAP');
        $this->smarty->display('pages/sitemap.html');
    }

	function contact_process()
	{
        if ($this->input->post('secret') == $this->_cek_pass($this->input->post('random_num')))
        {
            $this->_mail_config();
            //Declaring variable
            

            $query = $this->db->get_where('static_content', array('page_name' => 'contact'));
            $row = $query->row_array();

            //Sendmail Process
            $this->email->to($row['en_section_6']);
            $this->email->from('server@serverboost.com');
            $this->email->subject('Contact from: Name: '.$this->input->post('name'));
            $this->email->message($message_content);
            $this->email->send();
    //        echo $this->email->print_debugger();
            redirect('contact', 'refresh');
        }
        else
        {
            redirect('contact/error', 'refresh');
        }
	}
    
    function wcaptcha($code)
    {        
        $code = substr(hexdec(md5("".date("F j")."".$code."")), 2, 4);
            $image = ImageCreateFromJpeg(IMG_PATH."code_bg.jpg");
            $text_color = ImageColorAllocate($image, 100, 100, 100);
            Header("Content-type: image/jpeg");
            ImageString($image, 5, 12, 2, $code, $text_color);
            ImageJpeg($image, "", 50);
            ImageDestroy($image);
            exit;
            break;
    }
    
    function security_check($code)
    {
        echo $this->_cek_pass($code);
    }

    function sl($lang)
    {
        delete_cookie('ln');

        $cookie = array(
           'name'   => 'ln',
           'value'  => $lang,
           'expire' => $this->config->item('sess_expiration'),
           'domain' => $this->config->item('cookie_domain'),
           'path'   => $this->config->item('cookie_path'),
           'prefix' => '',
        );

        set_cookie($cookie);
        $url = preg_replace("|".base_url()."|", "",  $_SERVER["HTTP_REFERER"]);
           redirect($url, 'refresh');
    }
	
}
