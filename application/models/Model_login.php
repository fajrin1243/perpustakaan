<?php 

class Model_login extends CI_Model
{
	public function validasimember()
	{
		$query = $this->db->get_where('login', array(
			'username' => $this->input->post('username'),
			'password'=>$this->input->post('password')
			);
		
		if($query->num_rows == 1)
		{
			return true;
		}
	}
}