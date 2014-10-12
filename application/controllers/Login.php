<?php 

class Login extends CI_Controller
{
	public function index()
	{
		$data = array(
			'view' => 'login/default', 
			);
		$this->load->view('template',$data);
	}

	public function validasi()
	{
		$query = $this->db->get_where('login', array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
			));
		
		if($query->num_rows == 1)
		{
			return true;
		}
	}

	public function validasi_aksi()
	{
		$query = $this->validasi();

  		if($query) // jika data user benar
  		{
  			$data = array(
  				'username' => $this->input->post('username'),
  				'is_logged_in' => true
  				);
  			$this->session->set_userdata($data);
  			redirect('dashboard');
  		}
 		else // username atau password salah
 		{
 			$this->index();
 		}
 	}

 	public function logout()
 	{
 		$this->session->sess_destroy();
 		redirect('login');
 	}
 }