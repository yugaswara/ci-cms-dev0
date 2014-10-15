<?php 

class Initial extends ServicesController {
	
	function Initial()
	{
        parent::ServicesController();
		if(!$this->authentication->logged_in()){
			echo 'no way';
			exit();
		}
		
	}
	
	function index()
	{
	   
	}
	
	function article(){
		if($this->input->post('act') == 1){
			$fields = array (
				'active'=> $this->input->post('value'),
			);
			$this->db->where('article_id', $this->input->post('id'));
			$this->db->update('article', $fields);
			$query  = $this->db->get_where('article', array("article_id" => $this->input->post('id')));
			$rows   = $query->result_array();
			echo $rows[0]['active'];
		}
	}
	
	function uploads(){
		if($this->input->post('act') == 1){
			$fields = array (
				'active'=> $this->input->post('value'),
			);
			$this->db->where('upload_id', $this->input->post('id'));
			$this->db->update('upload', $fields);
			$query  = $this->db->get_where('upload', array("article_id" => $this->input->post('id')));
			$rows   = $query->result_array();
			echo $rows[0]['active'];
		}
	}
	
	function news(){
		if($this->input->post('act') == 1){
			$fields = array (
				'active'=> $this->input->post('value'),
			);
			$this->db->where('news_event_id', $this->input->post('id'));
			$this->db->update('news_event', $fields);
			$query  = $this->db->get_where('news_event', array("news_event_id" => $this->input->post('id')));
			$rows   = $query->result_array();
			echo $rows[0]['active'];
		}
	}
	
	function events(){
		if($this->input->post('act') == 1){
			$fields = array (
				'active'=> $this->input->post('value'),
			);
			$this->db->where('news_event_id', $this->input->post('id'));
			$this->db->update('news_event', $fields);
			$query  = $this->db->get_where('news_event', array("news_event_id" => $this->input->post('id')));
			$rows   = $query->result_array();
			echo $rows[0]['active'];
		}
	}
}
