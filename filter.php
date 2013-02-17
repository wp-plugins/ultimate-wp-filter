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
			
		if (isset($tmp['chk_post_tags'])) {
			if($tmp['chk_post_tags']=='1'){ add_filter('term_links-post_tag', 'CleanWords'); }}		
			
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
	
	function CleanWords($teks) {
		$tmp = get_option('uwpf_options');
		
		$custom = $tmp['custom_keywords'];
		$english_word = "asshole,bitch,fuck,motherfucker,what the fuck,whatthefuck,wtf,";
		$indonesian_word = "asu,bajingan,banci,bangsat,bego,bejad,bejat,bencong,bolot,brengsek,budek,geblek,gembel,goblok,idiot,jablay,jancuk,kampungan,kamseupay,keparat,kontol,kunyuk,lonte,maho,ndasmu,ngehe,pecun,perek,sarap,sinting,sompret,tai,tolol,udik";
		$words = "$custom, $indonesian_word, $english_word";
		$words = explode(",", $words);
			
			foreach($words as $keywords)
			{
				$keywords = trim($keywords);
				if(strlen($keywords) > 2)
				{
					$search = substr($keywords, 0, 1).str_repeat('*', strlen(substr($keywords, 1)));	
					$teks = ireplace($keywords, $search, $teks);
				}
			}
		
		return $teks;
	}

	function ireplace($needle,$replacement,$haystack){
		$needle = str_replace('/','\\/', preg_quote($needle));
		$pattern = "/\b$needle\b/i";
		$haystack = preg_replace($pattern, $replacement, $haystack);
		return $haystack;
	}

?>