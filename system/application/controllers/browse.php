<?php

class Browse extends My_Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$params = array(
			'order-by' => 'newest',
			'format' => 'json',
			'show-fields' => 'all',
			'pageSize' => 3
		);
		
		if($custom_sections = get_cookie('gu-section-prefs')) {
			$data['sections'] = explode(',', $custom_sections);
			$data['title'] = 'customised homepage';
		} else {
			$data['sections'] = array('news', 'sport', 'commentisfree', 'culture', 'business');
		}
		foreach($data['sections'] as $s) {
			$params['section'] = $s;
			$obj = $this->getdata($params);
			$data['articles'][$s] = $obj->response->results;
		}
		
		$data['html'] = $this->load->view('index', $data, TRUE);
		$this->showPage($data);
	}
	
	function sections()
	{
		if($custom_sections = get_cookie('gu-section-prefs')) {
			$data['preset_sections'] = explode(',', $custom_sections);
		} else {
			$data['preset_sections'] = array('news', 'sport', 'commentisfree', 'culture', 'business');
		}
		$obj = $this->getdata(array('format' => 'json'), 'sections');
		$data['sections'] = $obj->response->results;
		$data['html'] = $this->load->view('sections', $data, TRUE);
		$this->showPage($data);
	}
	
	function article($path)
	{
		$data['comments'] = $this->getcomments($path);
		$path = str_replace('_', '/', $path);
		$params = array(
			'format' => 'json',
			'show-fields' => 'all',
			'show-related' => 'true',
			'order-by' => 'newest',
			'show-media' => 'all'
		);
		$obj = $this->getdata($params, $path);
		$data['article'] = $obj->response->content;
		$data['media'] = $obj->response->content->mediaAssets;
		$data['html'] = $this->load->view('article', $data, TRUE);
		$this->showPage($data);
	}
	
	function updatesections()
	{
		if(!$this->input->post('section_id')) { redirect('/'); }
		$sections = $this->input->post('section_id');
		$cookie = array(
                   'name'   => 'gu-section-prefs',
                   'value'  => implode(',', $sections),
                   'expire' => '86500',
                   'path'   => '/'
        );
		set_cookie($cookie);
		redirect('/'); 
	}
	
	function getcomments($path)
	{
		$this->load->library('simple_html_dom');
		$url = 'http://www.guardian.co.uk/' . str_replace('_', '/', $path);
		$html = file_get_html($url);
		
		$comments = array();
		
		foreach($html->find('ul.comment') as $comment) {
			$item['comment'] = $comment->find('div.comment-body', 0)->innertext;
			$item['author'] = $comment->find('div.profile a', 0)->outertext;
			$item['date'] = $comment->find('div.profile p.date', 0)->plaintext;
			$comments[] = $item;
		}
		
		return $comments;
	}
	
	function galleries()
	{
		$params = array(
			'tag' => 'type/gallery',
			'order-by' => 'newest',
			'format' => 'json',
			'show-fields' => 'all',
			'show-media' => 'all'
		);
		$obj = $this->getdata($params);
		$galleries = array();
		foreach($obj->response->results as $g) {
			$galleries[$g->id] = array(
				'id' => $g->id,
				'sectionName' => $g->sectionName,
				'headline' => $g->fields->headline,
				'trailText' => $g->fields->trailText,
				'thumbnail' => $g->fields->thumbnail,
				'standfirst' => $g->fields->standfirst			
			);
			foreach($g->mediaAssets as $m) {
				if($m->type == 'picture') {
					$galleries[$g->id]['photos'][] = array(
						'file' => $m->file,
						'source' => $m->fields->source,
						'photographer' => isset($m->fields->photographer) ? $m->fields->photographer : NULL,
						'credit' => $m->fields->credit,
						'caption' => $m->fields->caption
					);
				}
			} 
		} // end of loops
		
		$data['galleries'] = $galleries;
		$data['html'] = $this->load->view('galleries', $data, TRUE);
		$this->showPage($data);		
	
	}
	
	function gallery($path, $offset =1) {
		$data['offset'] = $offset;
		$path = str_replace('_', '/', $path);
		$params = array(
			'format' => 'json',
			'show-fields' => 'all',
			'order-by' => 'newest',
			'show-media' => 'all'
		);
		$obj = $this->getdata($params, $path);
		
		$g = $obj->response->content;
		$gallery = array(
				'id' => $g->id,
				'sectionName' => $g->sectionName,
				'headline' => $g->fields->headline,
				'trailText' => $g->fields->trailText,
				'thumbnail' => $g->fields->thumbnail,
				'standfirst' => $g->fields->standfirst			
		);
		foreach($g->mediaAssets as $m) {
			if($m->type == 'picture') {
				$gallery['photos'][] = array(
					'file' => $m->file,
					'source' => $m->fields->source,
					'photographer' => isset($m->fields->photographer) ? $m->fields->photographer : NULL,
					'credit' => $m->fields->credit,
					'caption' => $m->fields->caption
				);
			}
		} 
		
		$data['gallery'] = $gallery;
		$data['html'] = $this->load->view('gallery', $data, TRUE);
		$this->showPage($data);
		
	}
	
	function getdata($query = NULL, $mode='search')
	{
		//$api_key = 'uzz2uugna375yavz2zkwpvpx';
		$api_key = 'techdev-internal';
		if($query) { $qs = ''; foreach($query as $key=>$value) {  $qs .= '&'.$key.'='.$value; } }
		$url = 'http://content.guardianapis.com/'.$mode.'?api-key='.$api_key.$qs;
		$json = file_get_contents($url);
		return json_decode($json);
	}
}