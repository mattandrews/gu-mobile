<?php

class Browse extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$obj = $this->getdata();
		$data['articles'] = $obj->response->results;
		$this->load->view('index', $data);
	}
	
	function getdata()
	{
		$url = 'http://content.guardianapis.com/search?order-by=newest&format=json&show-fields=all&api-key=uzz2uugna375yavz2zkwpvpx';
		$json = file_get_contents($url);
		return json_decode($json);
	}
}