<?php
/**
 * Description of Mhome
 *
 * @author wiz
 */
class Mhome extends MY_Model {

    function Mhome()
    {
        parent::MY_Model();
    }

    function get_meta()
    {
        $query_home = $this->db->get_where('static_content', array('page_name' => 'home'));
        $content = $query_home->row_array();

        $this->smarty->assign("metadesc", $content[$this->curr_lang.'_meta_description']);
        $this->smarty->assign("metakey", $content[$this->curr_lang.'_meta_keywords']);
    }


    function get_articles($category="", $active_menu="")
    {
		$lang = get_cookie('ln');
		($lang=='')?$lang="id":$lang=$lang;
        $query = $this->db->get_where('article', array('category' => $category, 'active' => 1));
		if($query->num_rows() > 1 && $query->num_rows() != 0)
		{
			$content = "";
			$pattern = '/(<.*?(.*?).*?>)/';
			$content = '<h3>'.ucwords(str_replace('_', ' ', $category)).'</h3>';
			foreach ($query->result() as $row)
			{
			  $title = ($lang=='id')?$row->id_page_title:$row->en_page_title;
			  $text_content = ($lang=='id')?$row->id_content:$row->en_content;
			  
			  $content .= '<div class="line_container clearfix">';
			  $content .= '<h5>'.$title.'</h5>';
			  $content .= '<p>';
			  if($category == 'contact_us'){
				$content .= $this->string_limit_words(preg_replace($pattern, "<br />", $text_content), 25);
			  }else{
				if($this->word_count(preg_replace($pattern, "", $text_content)) <= 400){
					$content .= $text_content;
				}else{
					$content .= $this->string_limit_words($text_content, 400);
				}
			  }
			  $content .= '</p>';
  			    if($this->word_count(preg_replace($pattern, "", $text_content)) >= 400){
				    $content .= '<a class="arrow" href="'.BASE_PATH.'article/'.$category.'/'.$row->article_id.'/'.$active_menu.'">'.$this->translation['read_more'][$lang].'</a>';
			    }
			  $content .= '</div>';
			}
			return $content;
		}elseif($query->num_rows() != 0){
			$content = $query->row_array();
			$ret_content = "";
			$ret_content .= '<div class="line_container clearfix">';
			$ret_content .= '<h5>'.$content[$lang.'_page_title'].'</h5>';
			$ret_content .= '<p>';
			$ret_content .= $content[$lang.'_content'];
			$ret_content .= '</p>';
			$ret_content .= '<br />';
			$ret_content .= '</div>';
			return $ret_content;
		}
    }

    function get_article($id="", $active_menu='', $category="")
    {
		$lang = get_cookie('ln');
		($lang=='')?$lang="id":$lang=$lang;
		
		$content = '';
		
        $query = $this->db->get_where('article', array('article_id' => $id, 'active' => 1));
		if($query->num_rows() != 0)
		{
			$result = $query->row_array();
			$content .= '<div class="line_container clearfix">';
			$content .= '<h5>'.$result[$lang.'_page_title'].'</h5>';
			$content .= '<p>';
			$content .= $result[$lang.'_content'];
			$content .= '</p>';
			$content .= '<a class="arrowback" href="'.BASE_PATH.'articles/'.$category.'/'.$active_menu.'">'.$this->translation['back'][$lang].'</a>';
			$content .= '<br />';
			$content .= '</div>';
			return $content;
		}
    }	

    function get_news_event($category)
    {
		$lang = get_cookie('ln');
		($lang=='')?$lang="id":$lang=$lang;
		
		$this->db->limit(3, 0);
		$this->db->order_by("date");
        $query = $this->db->get_where('news_event', array('category' => $category, 'active' => 1));
		if($query->num_rows() != 0)
		{
			$content = "";
			$pattern = '/(<.*?(.*?).*?>)/';
			foreach ($query->result() as $row)
			{
			  $date = split('-', $row->date);
			  $date = $date[2].'/'.$date[1].'/'.$date[0];
			  $title = ($lang=='id')?$row->id_title:$row->en_title;
			  $text_content = ($lang=='id')?$row->id_content:$row->en_content;
			  
			  $content .= '<div class="line_container clearfix">';
			  $content .= '<h5>'.$title.'</h5>';
			  $content .= '<p>';
			  $content .= $this->string_limit_words(preg_replace($pattern, "", $text_content), 25);
			  $content .= '<h6>'.$date.'</h6>';
			  $content .= '<a class="arrow" href="'.BASE_PATH.'news_event/'.$category.'/'.$row->news_event_id.'">'.$this->translation['read_more'][$lang].'</a>';
			  $content .= '</p>';
			  $content .= '</div>';
			}
			return $content;
		}
    }

    function detail_news_event($category="", $id="")
    {
		$lang = get_cookie('ln');
		($lang=='')?$lang="id":$lang=$lang;
		
        $query = $this->db->get_where('news_event', array('news_event_id' => $id, 'active' => 1));
		if($query->num_rows() != 0)
		{
			$content = "";
			$pattern = '/(<.*?(.*?).*?>)/';
			foreach ($query->result() as $row)
			{
			  $date = split('-', $row->date);
			  $date = $date[2].'/'.$date[1].'/'.$date[0];
			  $title = ($lang=='id')?$row->id_title:$row->en_title;
			  $text_content = ($lang=='id')?$row->id_content:$row->en_content;
			  
			  $content .= '<div class="line_container clearfix">';
			  $content .= '<h5>'.$title.'</h5>';
			  $content .= '<h6>'.$date.'</h6>';
			  $content .= '<p>';
			  $content .= $text_content;
			  $content .= '</p>';
			  $content .= '<br />';
			  $content .= '<a class="arrowback" href="'.BASE_PATH.'all_news_event/'.$category.'">'.$this->translation['back'][$lang].'</a>';
			  $content .= '</div>';
			}
			return $content;
		}
    }

    function all_news_event($category="")
    {
		$lang = get_cookie('ln');
		($lang=='')?$lang="id":$lang=$lang;
		
        $query = $this->db->get_where('news_event', array('category' => $category, 'active' => 1));
		if($query->num_rows() != 0)
		{
			$content = "";
			$pattern = '/(<.*?(.*?).*?>)/';
			foreach ($query->result() as $row)
			{
			  $date = split('-', $row->date);
			  $date = $date[2].'/'.$date[1].'/'.$date[0];
			  $title = ($lang=='id')?$row->id_title:$row->en_title;
			  $text_content = ($lang=='id')?$row->id_content:$row->en_content;
			  
			  $content .= '<div class="line_container clearfix">';
			  $content .= '<h5>'.$title.'</h5>';
			  $content .= '<p>';
			  $content .= $this->string_limit_words(preg_replace($pattern, "", $text_content), 25);
			  $content .= '<h6 class="fleft">'.$date.'</h6>';
			  $content .= '</p>';
			  $content .= '<a class="arrow fleft" href="'.BASE_PATH.'news_event/'.$category.'/'.$row->news_event_id.'">'.$this->translation['read_more'][$lang].'</a>';
			  $content .= '</div>';
			}
			return $content;
		}
    }

    function download_list($category="", $active_menu="")
    {
		$lang = get_cookie('ln');
		($lang=='')?$lang="id":$lang=$lang;
		
        $query = $this->db->get_where('upload', array('category' => $category, 'active' => 1));
		if($query->num_rows() > 1 && $query->num_rows() != 0)
		{
			$content = "";
			$pattern = '/(<img.*?src="(.*?)".*?>)/';
			foreach ($query->result() as $row)
			{
			  $title = ($lang=='id')?$row->id_title:$row->en_title;
			  $text_content = ($lang=='id')?$row->id_description:$row->en_description;
			  $content .= '<div class="line_container clearfix">';
			  $content .= '<h5>'.$title.'</h5>';
			  $content .= '<p>';
			  $content .=  $text_content;
			  $content .= '<a href="'.BASE_PATH.$row->file.'">download file</a>';
			  $content .= '</p>';
			  $content .= '<br />';
			  $content .= '</div>';
			}
			return $content;
		}elseif($query->num_rows() != 0){
			$content = $query->row_array();
			$ret_content = '<div class="line_container clearfix">';
			$ret_content .= '<h5>'.$content[$lang.'_title'].'</h5>';
			$ret_content .= '<p>';
			$ret_content .= $content[$lang.'_description'];
			$ret_content .= '<a href="'.BASE_PATH.$content['file'].'">download file</a>';
		    $ret_content .= '</p>';
		    $ret_content .= '<br />';
		    $ret_content .= '</div>';
			return $ret_content;
		}
    }
	
	function links(){
		$query = $this->db->get('links');
		if($query->num_rows() != 0)
		{
			$content = "<h3>Links</h3>";
			foreach ($query->result() as $row)
			{
			  $content .= '<div class="line_container clearfix">';
			  $content .= '<h4>'.$row->link_name.'</h4>';
			  $content .= '<p>Link : <a href="'.$row->link_address.'">'.$row->link_address.'</a></p>';
			  $content .= '</div>';
			}
			return $content;
		}
		
	}
	
    function download($category, $id, $active_menu)
    {
		$lang = get_cookie('ln');
		($lang=='')?$lang="id":$lang=$lang;
		
        $query = $this->db->get_where('upload', array('upload_id' => $id, 'active' => 1));
		if($query->num_rows() != 0)
		{
			$content = "";
			foreach ($query->result() as $row)
			{
			  $title = ($lang=='id')?$row->id_title:$row->en_title;
			  $text_content = ($lang=='id')?$row->id_description:$row->en_description;
			  $content .= '<div class="line_container clearfix">';
			  $content .= '<h5>'.$title.'</h5>';
			  $content .= '<p>';
			  $content .= $text_content;
			  $content .= '<a href="'.BASE_PATH.$row->file.'">Download File</a>';
			  $content .= '<a class="arrowback" href="'.BASE_PATH.'download/'.$category.'/'.$active_menu.'">'.$this->translation['back'][$lang].'</a>';
			  $content .= '</p>';
			  $content .= '<br />';
			  $content .= '</div>';
			  
			}
			return $content;
		}
    }
	
    function alumni_databasesz($page="", $search="")
    {
		session_start();
		$logedin = (isset($_SESSION['logedin']))?$_SESSION['logedin']:'';
		if($logedin == 'ok'){
			$lang = get_cookie('ln');
			($lang=='')?$lang="id":$lang=$lang;
			
			if($search != ''){
				$query  = $this->db->query("SELECT * FROM alumni WHERE name LIKE '%".$search."%'");
				$config['uri_segment'] = 4;
			}else{
				$query = $this->db->get('alumni');
				$config['uri_segment'] = 3;
			}
			$this->load->library('pagination');			
			$config['base_url'] = $this->config->item('base_url').'alumni_databases/2/'.$search;
			$config['total_rows'] = $query->num_rows();
			$config['per_page'] = '20';
			$this->pagination->initialize($config);			
			$this->smarty->assign("navigator", $this->pagination->create_links());
			
			if($search != ''){
				$query  = $this->db->query("SELECT * FROM alumni WHERE name LIKE '%".$search."%' LIMIT ".$page.", 20");
			}else{
				$this->db->limit(20, $page);
				$query = $this->db->get('alumni');
			}

			$content = '<a href="../forum/ucp.php?mode=logout">logout</a>';
			$content .= '<form action="'.BASE_PATH.'alumni_databases/" method="POST">';
			$content .= '	<input type="text" name="search" value="'.$search.'"><input type="submit" value="search">';
			$content .= '</form>';
			$content .= $this->pagination->create_links();

			if($query->num_rows() != 0)
			{
				foreach ($query->result() as $row)
				{
				  $name = $row->name;
				  $email_address = (empty($row->email_address))?'no address':$row->email_address;
				  
				  $content .= '<div class="line_container clearfix">';
				  $content .= '<h5>'.$name.'</h5>';
				  $content .= '<p>';
				  $content .= $email_address;
				  $content .= '<br />';
				  $content .= '<a class="arrow" href="'.BASE_PATH.'alumni_databases_detail/2/'.$row->unique_id.'/'.$page.'">'.$this->translation['read_more'][$lang].'</a>';
				  $content .= '</p>';
				  $content .= '</div>';
				}
			}
			
			$content .= $this->pagination->create_links();
			return $content;
			
		}else{
			header('Location:'.BASE_PATH.'login/alumni_databases/2');
		}
    }
	
    function get_thesis($page="", $search="")
    {
		session_start();
		$logedin = (isset($_SESSION['logedin']))?$_SESSION['logedin']:'';
		if($logedin == 'ok'){
			$lang = get_cookie('ln');
			($lang=='')?$lang="id":$lang=$lang;
			
			if($search != ''){
				$query  = $this->db->query("SELECT * FROM alumni WHERE thesis_title LIKE '%".$search."%'");
				$config['uri_segment'] = 4;
			}else{
				$query = $this->db->get('alumni');
				$config['uri_segment'] = 3;
			}
			$this->load->library('pagination');			
			$config['base_url'] = $this->config->item('base_url').'alumni_thesis_databases/2/'.$search;
			$config['total_rows'] = $query->num_rows();
			$config['per_page'] = '20';
			$this->pagination->initialize($config);			
			$this->smarty->assign("navigator", $this->pagination->create_links());
			
			if($search != ''){
				$query  = $this->db->query("SELECT * FROM alumni WHERE thesis_title LIKE '%".$search."%' LIMIT ".$page.", 20");
			}else{
				$this->db->limit(20, $page);
				$query = $this->db->get('alumni');
			}

			$content = '<a href="../forum/ucp.php?mode=logout">logout</a>';
			$content .= '<form action="'.BASE_PATH.'alumni_thesis_databases/" method="POST">';
			$content .= '	<input type="text" name="search" value="'.$search.'"><input type="submit" value="search">';
			$content .= '</form>';
			$content .= $this->pagination->create_links();

			if($query->num_rows() != 0)
			{
				foreach ($query->result() as $row)
				{
				  $name = $row->name;
				  $thesis_title = (empty($row->thesis_title))?'no thesis':$row->thesis_title;
				  
				  $content .= '<h5>'.$name.'</h5>';
				  $content .= '<p>';
				  $content .= $thesis_title;
				  $content .= '<br />';
				  $content .= '<a class="arrow" href="'.BASE_PATH.'alumni_thesis_databases_detail/2/'.$row->unique_id.'/'.$page.'">'.$this->translation['read_more'][$lang].'</a>';
				  $content .= '</p>';
				}
			}
			
			$content .= $this->pagination->create_links();
			return $content;
			
		}else{
			header('Location:'.BASE_PATH.'login/alumni_databases/2');
		}
    }
	
	function alumni_databases_detl($page, $id)
	{
		session_start();
		$logedin = (isset($_SESSION['logedin']))?$_SESSION['logedin']:'';
		if($logedin == 'ok'){
			$lang = get_cookie('ln');
			($lang=='')?$lang="id":$lang=$lang;
			$query  = $this->db->get_where('alumni', array("unique_id" => $id));
			$rows   = $query->result_array();
			$content = '<h3>'.$rows[0]['name'].'</h3>';
			$gender = "";
			if($rows[0]['gender'] == 'f'){
				$gender = '(female)';
			}elseif($rows[0]['gender'] == 'm'){
				$gender = '(male)';
			}
			$content .= $gender.'<br />';
			$content .= '<u>email address : </u><br />'.$rows[0]['email_address'].'<br />';
			$content .= '<u>batch : </u><br />'.$rows[0]['batch'].'<br />';
			$content .= '<u>date of birth : </u><br />'.substr($rows[0]['dob'], 0, 5).'<br />';
			$content .= '<u>scholarship : </u><br />'.$rows[0]['scholarship'].'<br />';
			$content .= '<u>univ : </u><br />'.$rows[0]['univ'].'<br />';
			$content .= '<u>study program : </u><br />'.$rows[0]['study_program'].'<br />';
			$content .= '<u>home city : </u><br />'.$rows[0]['home_city'].'<br />';
			$content .= '<u>office address : </u><br />'.$rows[0]['office_address'].'<br />';
			$content .= '<u>office city : </u><br />'.$rows[0]['office_city'].'<br />';
			$content .= '<u>office province : </u><br />'.$rows[0]['office_provinsi'].'<br />';
			$content .= '<u>office phone : </u><br />'.$rows[0]['office_phone'].'<br />';
			$content .= '<u>office fax : </u><br />'.$rows[0]['office_fax'].'<br />';
			$content .= '<u>Others : </u><br />'.$rows[0]['others'].'<br />';
			$content .= '<a class="arrowback" href="'.BASE_PATH.'alumni_databases/2">'.$this->translation['back'][$lang].'</a>';
			return $content;
		}
	}
	
	function alumni_thesis_databases_detl($page, $id)
	{
		session_start();
		$logedin = (isset($_SESSION['logedin']))?$_SESSION['logedin']:'';
		if($logedin == 'ok'){
			$query  = $this->db->get_where('alumni', array("unique_id" => $id));
			$rows   = $query->result_array();
			$content = '<h6>'.$rows[0]['name'].'</h6>';
			$thesis_title = "";
			if($rows[0]['thesis_title'] != ''){
				$thesis_title = $rows[0]['thesis_title'];
			}
			$content .= $thesis_title.'<br />';
			$content .= '<u>thesis content : </u><br />'.$rows[0]['thesis_content'].'<br />';
			$content .= '<a class="arrowback" href="'.BASE_PATH.'alumni_thesis_databases/2">'.$this->translation['back'][$lang].'</a>';
			return $content;
		}
	}
	
	function string_limit_words($string, $word_limit) {
		$words = explode(' ', $string);
		return implode(' ', array_slice($words, 0, $word_limit));
	}

	function word_count($string) {
		$words = explode(" ", $string);  
		$num = count($words);  
		return $num;
	}

    function get_static_content( $table )
    {
        $query = $this->db->get_where('static_content', array('page_name' => $table));
        if ($query->num_rows() > 0)
            $row = $query->row_array();
            $contents = array(
                'metadesc'  => $row[$this->curr_lang.'_meta_description'],
                'metakey'   => $row[$this->curr_lang.'_meta_keywords'],
                'section_1' => $row[$this->curr_lang.'_section_1'],
                'section_2' => $row[$this->curr_lang.'_section_2'],
                'section_3' => $row[$this->curr_lang.'_section_3'],
                'section_4' => $row[$this->curr_lang.'_section_4'],
                'section_5' => $row[$this->curr_lang.'_section_5']
            );
            $this->smarty->assign($table, $contents);
    }

    function get_hosting_content( $table )
    {
        //$this->output->enable_profiler(TRUE);

        $this->db->order_by('RAND()');
        $this->db->like('hosting_name', $table);
        $query = $this->db->get('hosting_category');
        if ($query->num_rows() > 0)
        { 
            $content = $query->row_array();
            /*
            $this->db->order_by('RAND()');
            $this->db->like('en_name', 'hard disk');
            $this->db->or_like('en_name', 'harddisk');
            $this->db->or_like('en_name', 'traffic'); 
            $this->db->or_like('en_name', 'space');
            $this->db->group_by('en_name');
            $this->db->order_by('hosting_facility.facility_id', 'asc');
            if($table=='dedicated')
            {
                $this->db->join('hosting_facility', 'hosting_facility.facility_name = hosting_detail.facility_name');
            }
            else
            {
                $this->db->join('hosting_facility', 'hosting_facility.facility_id = hosting_detail.facility_id');
            }
             
            $query = $this->db->get_where('hosting_detail', array('category_id' => $content['category_id']), 2);
            */
            if($table=='dedicated')
            {
                $join = "JOIN `hosting_facility` ON `hosting_facility`.`facility_name` = `hosting_detail`.`facility_name`";
            }
            else
            {
                $join = "JOIN `hosting_facility` ON `hosting_facility`.`facility_id` = `hosting_detail`.`facility_id`";
            }
            
            $query = $this->db->query("SELECT *
                            FROM (`hosting_detail`)
                            ".$join."
                            WHERE `category_id` = ".$content['category_id']."
                            AND  (`en_name`  LIKE '%disk%'
                            OR  `en_name`  LIKE '%memory%'
                            OR  `en_name`  LIKE '%traffic%'
                            OR  `en_name`  LIKE '%space%')
                            ORDER BY `hosting_facility`.`en_name` asc
                            LIMIT 2 ");
            $subcontent = $query->result_array();
            $content = array(
                'monthly_price' => $content['monthly_price'],
                'link'          => $content[$this->curr_lang.'_link'],
                'detail'        => $subcontent
            );
            $this->smarty->assign($table, $content);
        }
    }

}
