<?php
	function show_navbar() 
	{
		$CI =& get_instance();
		$CI->load->view('navbar');		
	}
	
	
    function compare_sections($a, $b)
    {
        $al = strtolower($a->webTitle);
        $bl = strtolower($b->webTitle);
        if ($al == $bl) {
            return 0;
        }
        return ($al > $bl) ? +1 : -1;
    }
?>