<?php

/**
 * InitialDesign Controller class
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Extends the CodeIgniter Controller class
 */
class MY_Controller extends Controller
{
    
    var $curr_user_id;
    var $curr_roles;
    var $logged_in;
	var $curr_lang;
    var $_data;
    
    function MY_Controller()
    {
        parent::Controller();
        
        $this->output->enable_profiler(FALSE);
        
        $this->load->library('authentication');
        
        $this->logged_in    = $this->authentication->logged_in();
        $this->curr_user_id = $this->authentication->get_user_id();
        $this->curr_roles   = $this->authentication->get_user_roles();
		
		$this->curr_lang    = $this->input->cookie('lang');

		if( ! $this->curr_lang)
		{
			$this->curr_lang = (( ! $this->input->cookie('lang')) ? 'en' : $this->input->cookie('lang'));
		}
		
		$cookie = array(
		   'name'   => 'lang',
		   'value'  => $this->curr_lang,
		   'expire' => $this->config->item('sess_expiration'),
		   'domain' => $this->config->item('cookie_domain'),
		   'path'   => $this->config->item('cookie_path'),
		   'prefix' => '',
		);

		set_cookie($cookie);


		define('WEB_TITLE', "Neso Official Website");
		define('FOOTER', "Neso Official Website");
		define('BASE_PATH', $this->config->item('base_url'));
    }

}

/**
 * Extends the MY_Controller class
 */
class InitialController extends MY_Controller
{
    
    var $curr_theme;
    
    function InitialController()
    {
        parent::MY_Controller();
        
        $this->curr_theme = $this->utility->get_current_themes();
        
        define('JS_PATH', BASE_PATH . 'static/js/');
        define('CSS_PATH', BASE_PATH . 'static/'.$this->curr_theme.'/css/initial/');
        define('IMG_PATH', BASE_PATH . 'static/'.$this->curr_theme.'/images/initial/');
        
        $this->smarty->template_dir = APPPATH . "templates/".$this->curr_theme."/initial/";
        $this->smarty->compile_dir = APPPATH . "tmp/initial/";
        
        $this->smarty->assign("MAIN_TPL_HEADER", 'header.html');
        $this->smarty->assign("MAIN_TPL_FOOTER", 'footer.html');
        $this->smarty->assign("FOOTER", FOOTER);
        
        $this->smarty->append("CSS",CSS_PATH."default.css");
		$this->smarty->append("CSS",CSS_PATH."jquery/ui.all.css");
		$this->smarty->assign("CSS_PATH",CSS_PATH);
        $this->smarty->append("JS",JS_PATH."jquery/jquery.js");
        $this->smarty->append("JS",JS_PATH."idesign.js");
        $this->smarty->append('InlineJS', "var blankImg_id = '".IMG_PATH."blank.gif';");

        $this->smarty->assign($this->_fetch_title($this->curr_lang));
    }

    function _mail_config()
    {
	    $this->load->library('email');
	    //$this->load->helper('email');

	    //Mail-Config
//        $config['protocol'] = 'smtp';
        //$config['smtp_host'] = $this->smtp_host;
        //$config['smtp_user'] = $this->smtp_user;
        //$config['smtp_password'] = $this->smtp_pass;
//        $config['smtp_host'] = SMTP_HOST;
//        $config['smtp_user'] = SMTP_USER;
//        $config['smtp_password'] = SMTP_PASS;
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
    }
    
    /**
	 * Remove HTML tags, including invisible text such as style and
	 * script code, and embedded objects.  Add line breaks around
	 * block-level tags to prevent word joining after tag removal.
	 */
	function _strip_html_tags( $text )
	{
	    $text = preg_replace(
	        array(
	          // Remove invisible content
	            '@<head[^>]*?>.*?</head>@siu',
	            '@<style[^>]*?>.*?</style>@siu',
	            '@<script[^>]*?.*?</script>@siu',
	            '@<object[^>]*?.*?</object>@siu',
	            '@<embed[^>]*?.*?</embed>@siu',
	            '@<applet[^>]*?.*?</applet>@siu',
	            '@<noframes[^>]*?.*?</noframes>@siu',
	            '@<noscript[^>]*?.*?</noscript>@siu',
	            '@<noembed[^>]*?.*?</noembed>@siu',
	          // Add line breaks before and after blocks
	            '@</?((address)|(blockquote)|(center)|(del))@iu',
	            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
	            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
	            '@</?((table)|(th)|(td)|(caption))@iu',
	            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
	            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
	            '@</?((frameset)|(frame)|(iframe))@iu',
	        ),
	        array(
	            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
	            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
	            "\n\$0", "\n\$0",
	        ),
	        $text );
	    return strip_tags( $text );
	}
    
    function _gen_pass($m) {
        $m = intval($m);
        $pass = "";
        for ($i = 0; $i < $m; $i++) {
            $te = mt_rand(48, 122);
            if (($te > 57 && $te < 65) || ($te > 90 && $te < 97)) $te = $te - 9;
            $pass .= chr($te);
        }
        return $pass;
    }
    
    function _cek_pass($m)
    {
	    $code = substr(hexdec(md5("".date("F j")."".$m."")), 2, 4);
	    return $code;
    }

    function _fetch_title( $lang )
    {
        if($lang == 'en')
        {
            return array(
                'menu_home' => 'Home',
                'menu_hosting' => 'Hosting',
                'menu_specials' => 'Specials',
                'menu_our_network' => 'Our Network',
                'menu_sla' => 'SLA',
                'menu_domain' => 'Domain',
                'menu_about' => 'About Us',
                'menu_contact' => 'Contact',
                'menu_news' => 'News',
                'menu_why' => 'Why Server Boost?',
                'menu_policy' => 'Acceptable Use Policy',
                'ot_feature' => 'Feature',
                'ot_domain_ext' => 'Domain ext',
                'ot_description' => 'Description',
                'ot_price_year' => 'Price/year',
                'ot_order' => 'Order',
                'ot_read_more' => 'read more',
                'ot_learn_more' => 'learn more',
                'ot_about2' => 'About Us',
                'ot_weekly_special_offers' => 'Weekly Special Offers',
                'ot_contact_info' => 'Contact Information',
                'ot_latest_news' => 'Last News',
                'ot_order_now' => 'Order now',
                'ot_facilities' => 'Facilities',
                'ot_customize_server' => 'Customize server',
                'ot_customize_option' => 'Customization options',
                'ot_colocation' => 'Colocation',
                'ot_next_step' => 'next step',
                'ot_month' => 'month',
                'ot_months' => 'months',
                'ot_year' => 'year',
                'ot_payment' => 'Payment type',
                'ot_monthly' => 'Monthly',
                'ot_quarterly' => 'Quarterly',
                'ot_semi_annual' => 'Semi Annual',
                'ot_annual' => 'Annual',
                'ot_footer' => 'Prices mentioned on our website are 19% VAT exclusive',
                'ot_back' => 'Back',
                'ot_required' => 'This field is required.',
                'ot_choose_item' => 'Please choose one item!',
                'ot_go' => 'Go!',
                'ot_specification' => 'Specification',
                'ot_value' => 'Value',
                'ot_memory' => 'Memory',
                'ot_harddisk' => 'Hard Disk',
                'ot_extra_options' => 'Extra Options',
                'ot_click_extra_options' => 'Click here for extra options',
                'ot_registered' => 'Registered',
                'ot_selected_options' => 'Selected options',
                'ot_total_price' => 'Total price',
                'ot_submit' => 'Submit',
                'curr_lang' => 'en',
                'co_form' => 'Contact form',
                'co_name' => 'Name',
                'co_phone' => 'Phone number',
                'co_email' => 'E-mail',
                'co_info' => 'Information',
                'co_send' => 'Send',
                'co_email_reg' => 'Email regular information',
                'co_email_sup' => 'Email Support/Helpdesk',
				'ot_domaint' => 'Domain'
            );
        }
        elseif ($lang == 'nl')
        {
            return array(
                'menu_home' => 'Home',
                'menu_hosting' => 'Hosting',
                'menu_specials' => 'Specials',
                'menu_our_network' => 'Ons Netwerk',
                'menu_sla' => 'SLA',
                'menu_domain' => 'Domeinen',
                'menu_about' => 'Over Ons',
                'menu_contact' => 'Contact',
                'menu_news' => 'Nieuws',
                'menu_why' => 'Waarom Server Boost?',
                'menu_policy' => 'Algemene voorwaarden',
                'ot_feature' => 'Mogelijkheden',
                'ot_domain_ext' => 'Domein ext',
                'ot_description' => 'Beschrijving',
                'ot_price_year' => 'Prijs/jaar',
                'ot_order' => 'Bestellen',
                'ot_read_more' => 'lees verder',
                'ot_learn_more' => 'lees verder',
                'ot_about2' => 'Over Server Boost',
                'ot_weekly_special_offers' => 'Speciale Weekaanbieding',
                'ot_contact_info' => 'Contact Informatie',
                'ot_latest_news' => 'Laatste Nieuws',
                'ot_order_now' => 'Bestel nu',
                'ot_facilities' => 'Specificaties',
                'ot_customize_server' => 'Stel uw eigen server samen',
                'ot_customize_option' => 'Configuratie opties',
                'ot_colocation' => 'Colocatie',
                'ot_next_step' => 'volgende stap',
                'ot_month' => 'maand',
                'ot_months' => 'maanden',
                'ot_year' => 'jaar',
                'ot_payment' => 'Betaalwijze',
                'ot_monthly' => 'Maandelijks',
                'ot_quarterly' => 'Per kwartaal',
                'ot_semi_annual' => 'Half jaarlijks',
                'ot_annual' => 'Jaarlijks',
                'ot_footer' => 'Alle prijzen op onze site zijn exclusief 19% BTW',
                'ot_back' => 'Terug',
                'ot_required' => 'Dit veld is verplicht.',
                'ot_choose_item' => 'Kies alstublieft 1 optie!',
                'ot_go' => 'Controleer',
                'ot_specification' => 'Specificaties',
                'ot_value' => 'Waarde',
                'ot_memory' => 'Geheugen',
                'ot_harddisk' => 'Hardeschijf',
                'ot_extra_options' => 'Extra Opties',
                'ot_click_extra_options' => 'Klik hier voor extra opties',
                'ot_registered' => 'Geregistreerd',
                'ot_selected_options' => 'Geselecteerde opties',
                'ot_total_price' => 'Totaal prijs',
                'ot_submit' => 'Verzenden',
                'curr_lang' => 'nl',
                'co_form' => 'Contact formulier',
                'co_name' => 'Naam',
                'co_phone' => 'Telefoonnummer',
                'co_email' => 'E-mail',
                'co_info' => 'Vraag',
                'co_send' => 'Versturen',
                'co_email_reg' => 'Email afdeling verkoop',
                'co_email_sup' => 'Email afdeling Support',
				'ot_domaint' => 'Domein'
            );
        }
    }

}

/**
 * Extends the MY_Controller class
 */
class AdminController extends MY_Controller
{
    
    var $is_admin = FALSE;
    var $curr_theme;
    
    function AdminController()
    {
        parent::MY_Controller();
        
        if (count($this->curr_roles) > 0)
        {
            foreach($this->curr_roles as $role)
            {
                if ($role['name'] == 'admin')
                {
                    $this->is_admin = TRUE;
                }
            }
        }
        
        $this->curr_theme = $this->utility->get_current_themes();
        
        define('IMG_SRC', './static/'.$this->curr_theme.'/images/initial/');
        define('ADMIN_PATH',  BASE_PATH . 'admin/');
        
        define('JS_PATH', BASE_PATH . 'static/js/');
        define('CSS_PATH', BASE_PATH . 'static/'.$this->curr_theme.'/css/admin/');
        define('IMG_PATH', BASE_PATH . 'static/'.$this->curr_theme.'/images/admin/');
        define('IMG_ID_PATH', BASE_PATH . 'static/'.$this->curr_theme.'/images/initial/');
        
        $this->smarty->template_dir = APPPATH . "templates/".$this->curr_theme."/admin/";
        $this->smarty->compile_dir = APPPATH . "tmp/admin/";
        
        $this->smarty->assign("MAIN_TPL_HEADER", 'header.html');
        $this->smarty->assign("MAIN_TPL_FOOTER", 'footer.html');
        $this->smarty->assign("MAIN_TPL_MIDDLE", 'middle.html');
        
        $this->smarty->append("CSS",CSS_PATH."default.css");
		$this->smarty->append("CSS",CSS_PATH."docstyle.css");
		$this->smarty->append("CSS",CSS_PATH."logstyle.css");
		$this->smarty->append("CSS",CSS_PATH."jquery/ui.all.css");
		$this->smarty->assign("CSS_PATH",CSS_PATH);

        $this->smarty->append("JS",JS_PATH."jquery/jquery.js");
        $this->smarty->append("JS",JS_PATH."idesign.js");
        $this->smarty->append('InlineJS', "var blankImg_id = '".IMG_ID_PATH."blank.gif';");

        $this->smarty->assign("WEB_TITLE", WEB_TITLE);
    }

    function _pagination( $table, $where = FALSE, $url = '' )
    {
        //$where should be an arrays
        if( $where )
        {
            $this->db->where( $where );
        }

        $query = $this->db->get( $table );
        $total = $query->num_rows;

        $url = ($url) ? $url : $table . '/index/';

        $url_cut = explode("/", $url);
        $uri_segment = count($url_cut) + 1;

        $config['base_url'] = ADMIN_PATH . $url;
        $config['total_rows'] = $total;
		$config['per_page'] = PER_PAGE;
		$config['uri_segment'] = $uri_segment;
		$config['full_tag_open'] = '<p style="color:#fff">';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '&nbsp;<strong>';
		$config['cur_tag_close'] = '</strong>';
		$this->pagination->initialize( $config );
        
        return $this->pagination->create_links();
    }

    function _upload_image( $module, $t_width, $t_height, $width, $thumb = TRUE, $pic_id = '', $resize = FALSE)
    {
        $pic_old = ($pic_id) ? $pic_id . '_old' : 'pic_old';
        if($this->input->post($pic_old)){
           @unlink(IMG_SRC . $module .'/'.$this->input->post($pic_old));
           @unlink(IMG_SRC . $module .'/thumb/'.$this->input->post($pic_old));
        }

        $config['upload_path'] = IMG_SRC . $module .'/';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size']   = '1500';
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';

        $this->load->library('upload', $config);
        $pic_id = ($pic_id) ? $pic_id : 'picture';

        if ( ! $this->upload->do_upload($pic_id))
        {
            print_r($this->upload->display_errors());
            die;
        }
        else
        {
			$this->_data = $this->upload->data();
            
            if($thumb)
            {
                $this->load->library('image_lib');

                $config['image_library'] = 'gd2';
                $config['source_image'] = IMG_SRC . $module .'/'.$this->_data['file_name'];
                $config['new_image'] = IMG_SRC . $module .'/thumb/';
                $config['create_thumb'] = TRUE;
                $config['thumb_marker'] = '';
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $t_width;
                $config['height'] = $t_height;

                $this->image_lib->initialize($config);
                $this->image_lib->resize();
            }
            
            if($resize)
            {
                $this->load->library('image_lib');
	            $config['image_library'] = 'gd2';
	            $config['source_image'] = IMG_SRC . $module .'/'.$this->_data['file_name'];
	            $config['new_image'] = IMG_SRC . $module .'/';
	            $config['maintain_ratio'] = TRUE;
	            $config['width'] = $width;
                $config['height'] = $width;
	
	            $this->image_lib->initialize($config);
	            $this->image_lib->resize();
            }
        }
        
        return $this->_data;
    }

    function _assets_base( $elements )
    {
        $this->smarty->append("JS",JS_PATH."jquery/jquery.validate.min.js");
        $this->smarty->append("JS",JS_PATH."jquery/ui.datepicker.js");
        $this->smarty->append("JS",JS_PATH."tiny_mce/tiny_mce_gzip.js");
        //

        $this->smarty->append('InlineJS', $this->id->tinymce( $elements ));
    }

}

/**
 * Extends the MY_Controller class
 */
class ServicesController extends MY_Controller
{
    
    function ServicesController()
    {
        parent::MY_Controller();
    }

}

?>
