<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * InitialDesign Utility class
 */
class Utility extends Id
{
    
	var $CI;
    var $themes_table = 'themes';
    
    function Utility()
    {
        parent::Id();
    }
    
    function get_current_themes()
    {
        //Put here for PHP 4 users
		$this->CI =& get_instance();
		
		$curr_theme = '';
		
        $query = $this->CI->db->query('SELECT name 
            FROM '.$this->themes_table.'
            where active = 1');
        
		if ($query->num_rows() > 0)
		{
		    $row = $query->row_array();
		    $curr_theme = $row['name'];
		}
		
		return $curr_theme;
    }
	
	function is_false($var)
	{
		return (is_bool($var) && !$var);
	}
	
	function objToArray($obj)
	{
		$_arr = is_object($obj) ? get_object_vars($obj) : $obj;
		foreach ($_arr as $key => $val)
		{
			$val = (is_array($val) || is_object($val)) ? $this->_objToArray($val) : $val;
			$arr[$key] = $val;
		}
		return $arr;
	}
	
	function createDir($wd)
	{
		do {
			$dir = $wd;
			while (!is_dir($dir))
			{
				$basedir = dirname($dir);
				if ($basedir == '/' || is_dir($basedir))
					mkdir($dir,0755);
				else
					$dir=$basedir;
			}
		} while ($dir != $wd);
	}

}

?>
