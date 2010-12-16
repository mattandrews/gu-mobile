<?php
class MY_Controller extends Controller {

	var $user = false;

    function MY_Controller() {
		parent::Controller();
	}

	function showPage($data)
	{
		if(!isset($data['title'])) { $data['title'] = 'no title set'; }
		$this->load->view('header/head', $data);
		if(isset($data['scripts'])) { $this->load->view('header/scripts', $data);}
		$this->load->view('header/body', $data);
		$this->load->view('master', $data);
		$this->load->view('footer/base', $data);
	}

}
?>