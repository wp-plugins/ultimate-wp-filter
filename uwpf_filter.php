<?php

	function uwpf_clean() {

		if( is_admin() ) return;

		$tmp = get_option('uwpf_options');

		if (isset($tmp['rdo_group_filtering'])) {
			if($tmp['rdo_group_filtering']=='off'){ return; }}

		if (isset($tmp['chk_comment_author'])) {
			if($tmp['chk_comment_author']=='1'){ add_filter('get_comment_author', 'uwpf_CleanWords'); }}		

		if (isset($tmp['chk_comment_text'])) {
			if($tmp['chk_comment_text']=='1'){ add_filter('comment_text', 'uwpf_CleanWords'); }}

		if (isset($tmp['chk_post_content'])) {
			if($tmp['chk_post_content']=='1'){ add_filter('the_content', 'uwpf_CleanWords'); }}		
		
		if (isset($tmp['chk_post_title'])) {
			if($tmp['chk_post_title']=='1'){ add_filter('the_title', 'uwpf_CleanWords'); }}

		if (isset($tmp['chk_tag_cloud'])) {
			if($tmp['chk_tag_cloud']=='1'){ add_filter('wp_tag_cloud', 'uwpf_CleanWords'); }}

		if (isset($tmp['chk_bbpress'])) {
			if($tmp['chk_bbpress']=='1'){
				if (class_exists('bbPress')) {
					add_filter('bbp_get_topic_content', 'uwpf_CleanWords');
					add_filter('bbp_get_reply_content', 'uwpf_CleanWords');
				}
			}
		}
	}

	function wg_encode($text){
		$text = str_ireplace("&", "a1n14d4", $text );
		$text = str_ireplace("'", "a1p16s19t20", $text );
		$text = str_ireplace("#", "s19h8a1r18p16", $text );
		$text = str_ireplace("<", "l12e5s19s19", $text );
		$text = str_ireplace(">", "m12o15r18e5", $text );
		return $text;
	}
	
	function wg_decode($text){
		$text = str_ireplace("a1n14d4", "&", $text );
		$text = str_ireplace("a1p16s19t20", "'", $text );
		$text = str_ireplace("s19h8a1r18p16", "#", $text );
		$text = str_ireplace("l12e5s19s19", "<", $text );
		$text = str_ireplace("m12o15r18e5", ">", $text );
		return $text;
	}
	
	function uwpf_CleanWords($teks) {

		$tmp = get_option('uwpf_options');
		$custom = $tmp['custom_keywords'];
		$level = $tmp['level'];

			
		if($tmp['chk_smartfilter']=='1'){
			$smartfilter = "on";
		}else{
			$smartfilter = "off";
		}
		
		$teks = wg_encode($teks);
		$url = "http://filter.faleddo.com/service-pro.php?text=".$teks."&custom=".$custom."&i=".$smartfilter."&level=".$level;
		//$url = "http://localhost/wwwguard/service-pro.php?text=".$teks."&custom=".$custom."&i=".$smartfilter."&level=".$level;
		
		$ParseXML = simplexml_load_file($url);
		return wg_decode($ParseXML->response);
	}

?>