<?php
/*
Plugin Name: Ultimate WP Filter
Plugin URI: http://faleddo.x10.bz
Description: A lighweight filtering plugin. Just activate and it will censor explicit words automatically by replace them with asterik(*) characters.
Version: 1.0
Author: Laurensius Faleddo
Author URI: http://faleddo.x10.bz
Text Domain: ultimate-wp-filter
Licence: GPL2
*/
	add_action( 'admin_menu', 'uwpf_options' );

	function uwpf_options() {
		add_options_page('Ultimate WP Filter Configs', 'Ultimate WP Filter', 'manage_options', __FILE__, 'build_page');
	}
	
	function build_page() {
		$options = get_option( 'uwpf_option' );
		$customkeywords = isset( $options['custom_keywords'] ) ? $options['custom_keywords'] : '';
	?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Ultimate WP Filter</h2>
		<p></p>
		
		
		<form method="post" action="options.php">
			<table class="form-table">
				<th scope="row">
						Custom Keywords:
						<br/>
						<span class="description">
							Include custom keywords to be filtered. Separate them with a comma(,).
						</span>
					</th>
					<td>
						<textarea name="uwpf_option[custom_keywords]" rows="10" cols=100%><?php echo esc_textarea( $customkeywords ); ?></textarea>
					</td>
				</tr>
			</table>
			
			<p class="submit">
				<input type="submit" class="button-primary" value="Save Changes" />
			</p>
		</form>
	</div>
	<?php	
}
	function CleanWords($teks) {
				
		$indonesian_word = "asu,bajingan,bangsat,jancuk,kontol,lonte,ndasmu,";
		$english_word = "bitch,asshole,fuck,motherfucker,wtf,what the fuck,whatthefuck";
		$words = "$indonesian_word, $english_word";
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

	add_filter('comment_text', 'CleanWords');
	add_filter('get_comment_author', 'CleanWords');
	add_filter('term_links-post_tag', 'CleanWords');
	add_filter('the_title', 'CleanWords');
	add_filter('the_content', 'CleanWords');
	add_filter('wp_tag_cloud', 'CleanWords');

	if (class_exists('bbPress')) {
		add_filter('bbp_get_topic_content', 'CleanWords');
		add_filter('bbp_get_reply_content', 'CleanWords');
	}
?>