<?php 

class Initial extends AdminController
{
	
	function Initial()
	{
        parent::AdminController();

        $this->smarty->assign(array(
                'BASE_PATH' => BASE_PATH,
                'IMG_PATH' => IMG_PATH,
                'CSS_PATH' => CSS_PATH,
                'RIGHT_SIDEBAR' => 'rightsidebar.html')
        );
	}
	
	function index()
	{
        if(!$this->authentication->logged_in())
            redirect('admin/login', 'refresh');
            
        $this->home();
	}

    function login()
    {
        if($this->authentication->logged_in())
            redirect('admin/home', 'refresh');

        $user = $this->input->post('un');
        $password = $this->input->post('ps');
        
        if($this->authentication->login($user, $password))
        {
            redirect('admin/home', 'refresh');
        }
        else
        {
            if($this->input->post('login'))
            {
                $this->smarty->assign('warning', TRUE);
            }
            $this->smarty->assign('PAGETITLE' ,WEB_TITLE . ' ADMIN LOGIN ');
            $this->smarty->assign('header_menu', 'disabled');
            $this->smarty->display('pages/login.html');
        }
    }

    function home()
    {
        if(!$this->authentication->logged_in())
            redirect('admin/login', 'refresh');

        $this->_check_menu('home');
        $this->smarty->assign('PAGETITLE' ,WEB_TITLE . ' ADMIN HOME ');
        $this->smarty->display('pages/home.html');
    }

    function logout()
    {
        $this->authentication->logout();
            redirect('admin/login', 'refresh');
    }

    //Private Functions

	function _check_menu($menu)
	{
	    $this->_menu_stats = array(
			'home_menu' => ($menu==='home')?'activemenu':'menu1',
			'article_menu' => ($menu==='history')?'activemenu':'menu1',
			'download_center_menu' => ($menu==='download_menu')?'activemenu':'menu1',
			'news_menu' => ($menu==='news_menu')?'activemenu':'menu1',
			'events_menu' => ($menu==='events_menu')?'activemenu':'menu1',
			'links_menu' => ($menu==='links_menu')?'activemenu':'menu1',
			'database_alumni_menu' => ($menu==='database_alumni_menu')?'activemenu':'menu1'
			);

	    return  $this->smarty->assign($this->_menu_stats);
    }
}
