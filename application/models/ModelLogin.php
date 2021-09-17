<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLogin extends CI_Model {

	public function fungsiLogin($where)
	{
		$query = $this->db->get_where('tb_user', $where);
		return $query;
	}

}

/* End of file ModelLogin.php */
/* Location: ./application/models/ModelLogin.php */