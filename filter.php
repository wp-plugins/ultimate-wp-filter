<?php

	function uwpf_clean() {

		if( is_admin() ) return;

		$tmp = get_option('uwpf_options');

		if (isset($tmp['rdo_group_filtering'])) {
			if($tmp['rdo_group_filtering']=='off'){ return; }}

		if (isset($tmp['chk_comment_author'])) {
			if($tmp['chk_comment_author']=='1'){ add_filter('get_comment_author', 'CleanWords'); }}		

		if (isset($tmp['chk_comment_text'])) {
			if($tmp['chk_comment_text']=='1'){ add_filter('comment_text', 'CleanWords'); }}

		if (isset($tmp['chk_post_content'])) {
			if($tmp['chk_post_content']=='1'){ add_filter('the_content', 'CleanWords'); }}		
		
		/*
		================= under development =================
		if (isset($tmp['chk_post_tags'])) {
			if($tmp['chk_post_tags']=='1'){ add_filter('term_links-post_tag', 'CleanWords'); }}		
		*/
		
		if (isset($tmp['chk_post_title'])) {
			if($tmp['chk_post_title']=='1'){ add_filter('the_title', 'CleanWords'); }}

		if (isset($tmp['chk_tag_cloud'])) {
			if($tmp['chk_tag_cloud']=='1'){ add_filter('wp_tag_cloud', 'CleanWords'); }}

		if (isset($tmp['chk_bbpress'])) {
			if($tmp['chk_bbpress']=='1'){
				if (class_exists('bbPress')) {
					add_filter('bbp_get_topic_content', 'CleanWords');
					add_filter('bbp_get_reply_content', 'CleanWords');
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
	
	function CleanWords($teks) {

		$tmp = get_option('uwpf_options');
		$custom = $tmp['custom_keywords'];
		
		$teks = wg_encode($teks);
		$url = "http://filter.faleddo.x10.bz/service-full.php?text=".$teks."&custom=".$custom;

		$ParseXML = simplexml_load_file($url);
		return wg_decode($ParseXML->response);
	}

?>