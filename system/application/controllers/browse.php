<?php

class Browse extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$data['articles'] = $this->getdata();
		$this->load->view('index', $data);
	}
	
	function getdata()
	{
		$url = 'http://content.guardianapis.com/search?order-by=newest&format=json&api-key=uzz2uugna375yavz2zkwpvpx';
		$json = file_get_contents($url);
		return json_decode($json);
	}
}