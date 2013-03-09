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
		/* ========================== Begin of language ======================================= */
		$deutsch_word = "analritter,arsch,arschficker,arschlecker,arschloch,bratze,bumsen,dödel,fick,ficken,flittchen,fratze,geil,hackfresse,hupen,hure,hurensohn,ische,kackbratze,kacke,kacken,kampflesbe,kimme,knackwurst,lümmel,möpse,möse,milchtüten,milf,morgenlatte,mucke,mufti,muschi,nackt,nippel,onanieren,picheln,pimmel,pimpern,pinkeln,pissen,pisser,popel,poppen,reudig,rosette,schabracke,scheiße,schnackeln,tittchen,titten,vögeln,vögeln,vollpfosten,wichsen,wichser,";
		$english_word = "2g1c,acrotomophilia,anal,anilingus,arsehole,asshole,asshole,asshole,assmunch,auto erotic,autoerotic,babeland,baby batter,ball gag,ball gravy,ball kicking,ball licking,ball sack,ball sucking,bangbros,bareback,barely legal,barenaked,bastard,bastardo,bastards,bastinado,bbw,bdsm,beaver cleaver,beaver lips,bestiality,bi curious,big black,big breasts,big knockers,big tits,bimbos,birdlock,bitch,bitch,bitch,bitches,bitching,bitchy,black cock,blonde action,blow j,blow your l,blue waffle,blumpkin,bollocks,bondage,boner,boob,boob,boobie,boobies,boobs,boobs,booby,boobys,booty call,brown showers,brunette action,bukkake,bulldyke,bullet vibe,bullshit,bullshitter,bullshitters,bullshitting,bung hole,bunghole,busty,butt,buttcheeks,butthole,camel toe,camgirl,camslut,camwhore,carpet muncher,carpetmuncher,chickenshit,chickenshits,chocolate rosebuds,circlejerk,cleveland steamer,clit,clit,clitoris,clover clamps,clusterfuck,cock,cock,cockhead,cocks,cocks,cocksuck,cocksucker,cocksucking,coprolagnia,coprophilia,cornhole,cum,cum,cumming,cumming,cums,cunnilingus,cunt,cunt,cuntree,cuntry,cunts,darkie,date rape,daterape,deep throat,deepthroat,dick,dildo,dipshit,dipshits,dirty pillows,dirty sanchez,dog style,doggie style,doggiestyle,doggy style,doggystyle,dolcett,domination,dominatrix,dommes,donkey punch,double dong,double penetration,dp action,dumbfuck,dumbfucks,dumbshit,dumbshits,eat my ass,ecchi,ejaculation,escort,ethical slut,eunuch,fag,faggot,faggot,faggots,faggy,fags,fecal,felch,fellatio,feltch,female squirting,femdom,figging,fingering,fisting,foot fetish,footjob,frotting,fuck,fuck buttons,fucka,fucke,fucked,fucken,fucker,fuckers,fuckface,fuckhead,fuckheads,fuckhed,fuckin,fucking,fucks,fuckup,fuckups,fudge packer,fudgepacker,fukk,fukka,futanari,g-spot,gang bang,gay sex,genitals,giant cock,girl on,girl on top,girls gone wild,goatcx,goatse,gokkun,golden shower,golem,goniff,goo girl,goodpoop,goregasm,grope,group sex,guro,hand job,handjob,hard core,hardcore,heb,hebe,hebes,hentai,homoerotic,honkey,hooker,hot chick,how to kill,how to murder,huge fat,humping,incest,intercourse,jack off,jail bait,jailbait,jerk off,jigaboo,jiggaboo,jiggerboo,jizz,juggs,kike,kikes,kinbaku,kinkster,kinky,knobbing,kunt,kuntree,kuntry,kunts,leather restraint,leather straight jacket,lemon party,lovemaking,make me come,male squirting,masturbate,menage a trois,milf,missionary position,motherfuck,motherfucken,motherfucker,motherfuckers,motherfuckin,motherfucking,mound of venus,mr hands,muff diver,muffdiving,nambla,nawashi,nazi,neonazi,nig nog,nigga,niggah,niggahs,niggard,niggardly,niggas,niggaz,nigger,niggers,nimphomania,nipple,nipples,nsfw images,nympho,nymphomania,octopussy,omorashi,one cup two girls,one guy one jar,orgasm,orgy,paedophile,panties,panty,pedobear,pedophile,pegging,phone sex,piece of shit,piss,piss pig,pissing,pisspig,playboy,pleasure chest,pole smoker,ponyplay,poof,poop chute,poopchute,prince albert piercing,pthc,pubes,pussy,queaf,raghead,raging boner,rape,rapist,rectum,reverse cowgirl,rimjob,rimming,rusty trombone,s&m,scat,schlimazel,schlimiel,schlong,scissoring,sexo,shaved beaver,shaved pussy,shemale,shibari,shit,shitface,shitfaced,shithead,shitheads,shithed,shits,shitting,shitty,shota,shrimping,slanteye,slut,slut,sluts,slutty,smut,snatch,snowballing,sodomize,sodomy,spic,spooge,spread legs,strap on,strapon,strappado,strip club,style doggy,suck,sucks,suicide girls,sultry women,swastika,swinger,tainted love,taste my,tea bagging,threesome,throating,tied up,tight white,tit,tits,titties,titty,tongue in a,topless,tosser,towelhead,tranny,tribadism,tub girl,tubgirl,tushy,twat,twink,twinkie,two girls one cup,undressing,upskirt,urethra play,urophilia,vaginal,venus mound,violet blue,violet wand,vorarephilia,voyeur,vulva,wank,wetback,what the fuck,whatthefuck,white power,whore,whores,whoring,women rapping,wrapping men,wrinkled starfish,wtf,yaoi,yellow showers,yiffy,zoophilia,";
		$indonesian_word = "asu,bajingan,banci,bangsat,bego,bejad,bejat,bencong,bolot,brengsek,budek,geblek,gembel,goblok,idiot,jablay,jancuk,kampungan,kamseupay,keparat,kontol,kunyuk,lonte,maho,ndasmu,ngehe,pecun,perek,sarap,sinting,sompret,tai,tolol,udik,";
		$french_word = "allumé,allumée,baiser,bander,bigornette,bitte,bloblos,bordel,bosser,bourré,bourrée,branlage,branler,branlette,branleur,branleuse,brouter le cresson,cailler,chatte,chiasse,chier,chiottes,cirer,clito,con,conne,connard,connasse,couilles,cramouille,cul,déconne,déconner,doudounes,drague,emmerdant,emmerdeur,emmerdeuse,emmerder,enculé,enculée,enfoiré,enfoirée,étron,fils de pute,fille de pute,flic,folle,foutre,gerber,gouine,grande folle,grogniasse,gueule,jouir,la putain de ta mère,MALPT,maquereau,melon,ménage a trois,merde,merdeuse,merdeux,merlan,meuf,morue,moule,nègre,nique ta mère,noune,palucher,pédale,pédé,pisser,poilu,pouffiasse,pousse-crotte,putain,pute,ramoner,salaud,salope,serin,service trois pièces,suce,tapette,teuf,tirer,tringle,tringler,trique,trou du cul,turlute,veuve,viande a pneus,";	

		$tmp = get_option('uwpf_options');
		$custom = $tmp['custom_keywords'];
		/* ========================== End of language ======================================= */
		
		$words = "";

		if (isset($tmp['chk_lang_deutsch'])) {
			if($tmp['chk_lang_deutsch']=='1'){ $words = "$words, $deutsch_word, ','"; }}
			
		if (isset($tmp['chk_lang_english'])) {
			if($tmp['chk_lang_english']=='1'){ $words = "$words, $english_word, ','"; }}

		if (isset($tmp['chk_lang_french'])) {
			if($tmp['chk_lang_french']=='1'){ $words = "$words, $french_word, ','"; }}
			
		if (isset($tmp['chk_lang_indonesian'])) {
			if($tmp['chk_lang_indonesian']=='1'){ $words = "$words, $indonesian_word, ','"; }}
		
		if (isset($tmp['chk_lang_custom'])) {
			if($tmp['chk_lang_custom']=='1'){ $words = "$words, $custom"; }}
					
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