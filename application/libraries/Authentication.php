<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Authentication Class
 * Makes authentication simple
 */

class Authentication
{
	var $CI;
    var $get_user_id;
	var $user_table = 'users';
	var $roles_table = 'roles';
	var $user_roles_table = 'user_roles';

	function Authentication()
	{
		// get_instance does not work well in PHP 4
		// you end up with two instances
		// of the CI object and missing data
		// when you call get_instance in the constructor
		//$this->CI =& get_instance();
	}

	/**
	 * Create a user account
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function create($user = '', $password = '', $auto_login = TRUE)
	{
		//Put here for PHP 4 users
		$this->CI =& get_instance();		

		//Make sure account info was sent
		if($user == '' OR $password == '')
		{
			return FALSE;
		}
		
		//Check against user table
		$this->CI->db->where('user_id', $user); 
		$query = $this->CI->db->getwhere($this->user_table);
		
		if ($query->num_rows() > 0)
		{
			//username already exists
			return FALSE;
		}
		else
		{
			//Encrypt password
			$password = md5($password);
			
			//Insert account into the database
			$data = array(
						'user_id' => $user,
						'password' => $password
					);
			$this->CI->db->set($data);
			if(!$this->CI->db->insert($this->user_table))
			{
				//There was a problem!
				return FALSE;
			}
			$user_id = $this->CI->db->insert_id();
			
			//Automatically login to created account
			if($auto_login)
			{
				//Destroy old session
				$this->CI->session->sess_destroy();
				
				//Create a fresh, brand new session
				$this->CI->session->sess_create();
				
				//Set session data
				$this->CI->session->set_userdata(array('user_id' => $user));
				
				//Set logged_in to true
				$this->CI->session->set_userdata(array('logged_in' => TRUE));
			
			}
			
			//Login was successful			
			return TRUE;
		}

	}

	/**
	 * Delete user
	 *
	 * @access	public
	 * @param integer
	 * @return	bool
	 */
	function delete($user_id) {
		//Put here for PHP 4 users
		$this->CI =& get_instance();

		if($this->CI->db->delete($this->user_table, array('user_id' => $user_id)))
		{
			//Database call was successful, user is deleted
			return TRUE;
		}
		else
		{
			//There was a problem
			return FALSE;
		}
	}


	/**
	 * Login and sets session variables
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function login($user = '', $password = '')
	{
		//Put here for PHP 4 users
		$this->CI =& get_instance();		

		//Make sure login info was sent
		if($user == '' OR $password == '')
		{
			return FALSE;
		}

		//Check if already logged in
		if($this->get_user_id == $user)
		{
			//User is already logged in.
			return FALSE;
		}
		
		//Check against user table
		$this->CI->db->where('user_id', $user); 
		$query = $this->CI->db->getwhere($this->user_table);
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row_array(); 
			
			//Check against password
			if(md5($password) != $row['password'])
			{
				return FALSE;
			}
			
			//Destroy old session
			$this->CI->session->sess_destroy();
			
			//Create a fresh, brand new session
			$this->CI->session->sess_create();
			
			//Remove the password field
			unset($row['password']);
			
			//Set session data
			$this->CI->session->set_userdata($row);
			
			//Set logged_in to true
			$this->CI->session->set_userdata(array('logged_in' => TRUE));
			
			//Login was successful			
			return TRUE;
		}
		else
		{
			//No database result found
			return FALSE;
		}	

	}

	/**
	 * Check login
	 *
	 * @access	public
	 * @return	void
	 */
	function logged_in()
	{
		//Put here for PHP 4 users
		$this->CI =& get_instance();

		//Check if already logged in
		if($this->CI->session->userdata('logged_in') == TRUE)
        {
			//User is already logged in.
			return TRUE;
		}
        else
        {
			//User is not logged in yet.
            return FALSE;
        }
	}
	
	/**
	 * Get current user_id
	 *
	 * @access	public
	 * @return	user_id
	 */
	function get_user_id()
	{
	    //Put here for PHP 4 users
		$this->CI =& get_instance();
		
		//Get user_id
		$user_id = $this->CI->session->userdata('user_id');
		
	    //Return current user_id
	    return ( ! empty($user_id)) ? $user_id : 0;
    }
    
    /**
	 * Get current user roles
	 *
	 * @access	public
	 * @return	role list
	 */
    function get_user_roles()
    {
        //Put here for PHP 4 users
		$this->CI =& get_instance();
		
        $roles = array();
        $query = $this->CI->db->query('SELECT a.role_unid, b.name 
            FROM '.$this->user_roles_table.' a, '.$this->roles_table.' b 
            where (a.role_unid = b.unid) and a.user_id = "'.$this->get_user_id().'"');
        
		if ($query->num_rows() > 0)
		{
		    foreach ($query->result() as $row)
            {
                $roles[] = array('unid'=>$row->role_unid, 'name'=>$row->name);
            }
		}
		
		return $roles;
    }

	/**
	 * Logout user
	 *
	 * @access	public
	 * @return	void
	 */
	function logout()
	{
		//Put here for PHP 4 users
		$this->CI =& get_instance();

		//Destroy session
		$this->CI->session->sess_destroy();
	}
}
?>
