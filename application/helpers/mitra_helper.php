<?php
	function db_get_one_data($field, $table, $where)
	{
		$CI = get_instance();
		$CI->db->select($field);
		$data = $CI->db->get_where($table, $where)->row_array();
		return $data[$field];
	}

	function next_auto_increment($table)
	{
		$CI = get_instance();
		$next = $CI->db->query("SHOW TABLE STATUS LIKE '".$table."'");
		$next = $next->row(0);
		$next->Auto_increment;
		return $next->Auto_increment;
	}

	function generateRandomString($jml=5){
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $jml; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
?>