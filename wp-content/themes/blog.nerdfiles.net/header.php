<!DOCTYPE
  html 
  public "♥">
<!--[if lt IE 7]> <html lang="en-us" class="no-js ie6 <?php webjournal_body_class() ?>"> <![endif]-->
<!--[if IE 7]>    <html lang="en-us" class="no-js ie7 <?php webjournal_body_class() ?>"> <![endif]-->
<!--[if IE 8]>    <html lang="en-us" class="no-js ie8 <?php webjournal_body_class() ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-us" class="no-js <?php webjournal_body_class() ?>"> <!--<![endif]-->
<head>

<meta charset="utf-8" />

<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" />

<meta name="viewport" content="width=device-width" />  

<link rel="dns-prefetch" href="//fonts.googleapis.com/" />
<link rel="dns-prefetch" href="//code.jquery.com/" />
<link rel="dns-prefetch" href="//cdnjs.cloudflare.com/" />
<link rel="dns-prefetch" href="//ajax.googleapis.com/" />
<link rel="dns-prefetch" href="//google.com/jsapi" />
<link rel="dns-prefetch" href="//apis.google.com/" />
<link rel="dns-prefetch" href="//platform.twitter.com/" />

<title dir="ltr">
<?php if ( is_404() ) : ?>
    <?php _e('Page not found', 'webjournal') ?>
<?php elseif ( is_home() ) : ?>
    <?php echo "Home"; ?>
<?php elseif ( is_category() ) : ?>
    <?php echo single_cat_title(); ?>
<?php elseif ( is_date() ) : ?>
    <?php _e('Archives', 'webjournal') ?>
<?php elseif ( is_search() ) : ?>
    <?php _e('Search results', 'webjournal') ?>
<?php elseif ( is_author() ) : ?>
<?php _e('Author', 'webjournal') ?> <?php the_author_meta('user_display_name'); ?>
<?php else : ?>
    <?php the_title() ?>
<?php endif ?>
 &sect; <?php bloginfo('name') ?>
</title>

<!-- Stylesheets -->
  
<link 
  rel="stylesheet" 
  href="//fonts.googleapis.com/css?family=Philosopher"
  media="all" /> 
  
<link 
  rel="stylesheet" 
  media="all" 
  href="<?php bloginfo('template_directory'); ?>/_assets/_css-lib/960.gs/css/min/combined.css" />
  
<link 
  rel="stylesheet" 
  media="all" 
  href="<?php bloginfo('template_directory'); ?>/_assets/_css/compass/stylesheets/global.css" />
  
<?php wp_head() // Do not remove; helps plugins work ?>
<!-- End wp_head -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.1/modernizr.min.js"></script>

<!-- RDF Feeds -->
  
<link 
  rel="alternate" 
  type="application/rdf+xml" 
  href="<?php bloginfo('rdf_url') ?>" 
  title="<?php bloginfo('name') ?> <?php _e('RDF feed', 'webjournal' ) ?>" />

<?php if (is_category()) :
$the_cat = get_the_category();
$cat_slug = $the_cat[0]->slug; ?>

<link 
  rel="alternate" 
  type="application/rdf+xml" 
  href="<?echo get_bloginfo('url'); ?>/topics/<?echo $cat_slug; ?>/feed/rdf/" 
  title="<?php bloginfo('name') ?> | <?echo $category_name; ?> <?php _e('RDF feed', 'webjournal' ) ?>" />  

<?php endif; ?>

<!-- Comments Feed -->

<link 
  rel="alternate" 
  type="application/rss+xml" 
  href="<?php bloginfo('comments_rss2_url') ?>" 
  title="<?php bloginfo('name') ?> <?php _e( 'comments RSS feed', 'webjournal' ) ?>" />

<!-- Trace and Pinkbacks -->

<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

<!-- Misc -->

<link rel="me" type="text/html" href="//gplus.to/nerdfiles" />

</head>

<body <?php body_class(); ?>>
  
<div id="top"></div><!-- hackish? fuck you.-->

<div id="wrapper" dir="ltr">
<div id="container" class="container_16 clearfix">
<div id="content" class="grid_16">

<!-- == SITE HEADER ========================================== > 








< ========================================================== -->

<div id="header" class="clearfix">

<!-- == SITE ACCESS ======================================== --> 

<div id="site-access">
<p class="mouse-thinkers-beware" title="An analysis of modalities, link strategy, and tacticle experience, oh my!"><small>Design's heavily influenced by my practices in unlearning the Mouse and the variegrated habits of Mouse-think (theism, restroom banter, the politico-historical moorings of cr&ecirc;pe cuisine, et cetera), with a touch of not having gone to finishing school.</small></p>
<ul>
<li><span class="content-access">Back to <a href="#top">top</a></span></li>
<?php
global $post; 
$content = (is_front_page()) ? "#site-search" : "#post-" . get_the_ID();
$contentText = (is_front_page()) ? 'Search from home' : 'Skip to content';
?>

<?php if ( current_user_can('administrator') ) { ?>
<li>
  <a href="<?php bloginfo('url'); ?>/wp-admin/">Dashboardly</a>
</li>
<li><a href="<?php bloginfo('url'); ?>/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit">Edit post</a></li>
<?php } ?>

<li><span class="content-access"><a href="<?php echo $content; ?>" title="<?php echo $contentText; ?>"><?php echo $contentText; ?></a></span></li>
<?php 
if ( $post->comment_count != 0 ) { ?>
<!--li><span class="content-access"><a href="#comments" title="Read post comments">Read comments</a></span></li-->
<?php } ?>
<?php
if ('open' == $post->comment_status && !is_front_page()) {
?>
<li><span class="content-access"><a href="#disqus_thread" title"Go to comments">Go to comments</a></li>
<?php } ?>
<?php
if ('open' == $post->comment_status && !is_front_page()) {
?>
<!--li><span class="content-access"><a href="#respond" title="Respond to post">Respond to post</a></span></li-->
<?php } ?>
<li><span class="content-access"><a href="#latest" title="<?php _e('Skip to latest posts', 'webjournal'); ?>"><?php _e('Skip to #latest', 'webjournal'); ?></a></span></li>
<?php if(is_front_page()) { ?>
<li><span class="content-access"><a href="#art" title="<?php _e('Skip to #art related posts', 'webjournal'); ?>"><?php _e('Skip to #art posts', 'webjournal'); ?></a></span></li>
<li><span class="content-access"><a href="#philosophy" title="<?php _e('Skip to #philosophy posts', 'webjournal'); ?>"><?php _e('Skip to #philosophy posts', 'webjournal'); ?></a></span></li>
<li><span class="content-access"><a href="#life" title="<?php _e('Skip to #life related posts', 'webjournal'); ?>"><?php _e('Skip to #life posts', 'webjournal'); ?></a></span></li>
<li><span class="content-access"><a href="#web" title="<?php _e('Skip to #web related posts', 'webjournal'); ?>"><?php _e('Skip to #web posts', 'webjournal'); ?></a></span></li>
<?php } ?>
<li><span class="content-access"><a href="#site-navigation" title="<?php _e('Skip to nav', 'webjournal'); ?>"><?php _e('Skip to nav', 'webjournal'); ?></a></span></li>
<li><span class="content-access"><a href="#s" title="<?php _e('Skip to search', 'webjournal'); ?>"><?php _e('Skip to search', 'webjournal'); ?></a></span></li>
<!--li><span class="content-access"><a href="#site-social">Skip to g+</a></li-->
<noscript><li><span class="content-access"><a href="#footer">Skip to #footer</a></li></noscript>
<li><span class="content-access"><a href="#site-admin" title="<?php _e('Skip to #meta', 'webjournal'); ?>"><?php _e('Skip to #meta', 'webjournal'); ?></a></span></li>
</ul>
</div><!-- End #site-access -->


<!-- == SITE ACCESS ======================================== --> 

<div id="site-header" class="grid_16 alpha">
<div class="grid_4 alpha site-name">
<div class="drop-shadow">
<span class="call-access-menu drop-shadow">&uarr; esc</span>
<a href="<?php echo get_settings('home') ?>/" title="A weedy florilegium" class="logo">
A weedy florilegium
</a>
<span class="author-tag">web journal of <a href="http://nerdfiles.net" title="Go to nerdfiles.net">nerdfiles</a></span>
</div>
</div><!-- End .site-name -->


<!-- == LATEST ============================================= --> 

<div class="grid_12 omega site-description">
<div class="drop-shadow">
<div id="latest" class="latest">
<aside>
<header>
<h1>Latest</h1>
</header>
<?php $my_query = new WP_Query('posts_per_page=1&orderby=date&order=DESC'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>

<div class="time">
<time><?php the_date(); ?></time>
</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
<?php $my_query = new WP_Query('p='+get_the_ID()); ?>
</aside>
</div>
</div>
</div><!-- End .site-description -->

</div><!-- End #site-header -->

<!-- == END SITE HEADER ==================================== --> 


<!-- == SITE NAV ============================================= > 








< ========================================================== -->

<!-- == MAIN NAV =========================================== --> 

<div id="site-navigation" class="grid_12 alpha">
<?php // @copyof wp_nav_menu(); ?>
<div class="menu-jininmi-container">
<ul id="menu-jininmi" class="menu">
<li id="menu-item-2218" class="grid_1 alpha menu-item menu-item-type-post_type menu-item-object-page menu-item-2218"><a class="drop-shadow" href="<?php bloginfo('url'); ?>/the-semantic-web/">sw</a></li>
<li id="menu-item-2219" class="grid_1 menu-item menu-item-type-post_type menu-item-object-page menu-item-2219"><a class="drop-shadow" href="<?php bloginfo('url'); ?>/content-is-king/">cok</a></li>
<li id="menu-item-2220" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2220"><a class="drop-shadow" href="<?php bloginfo('url'); ?>/recipes/">recipes</a></li>
<li id="menu-item-2221" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2221"><a class="drop-shadow" href="<?php bloginfo('url'); ?>/poems/">poems</a></li>
<li id="menu-item-2222" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2222"><a class="drop-shadow" href="<?php bloginfo('url'); ?>/claims/">claims</a></li>
<li id="menu-item-2223" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2223"><a class="drop-shadow" href="<?php bloginfo('url'); ?>/quotes/">quotes</a></li>
<li id="menu-item-2224" class="grid_2 omega menu-item menu-item-type-post_type menu-item-object-page menu-item-2224"><a class="drop-shadow" href="<?php bloginfo('url'); ?>/about/">about</a></li>
</ul>
</div>

</div><!-- End #site-navigation -->


<!-- == SITE ADMIN ======================================== --> 

<div id="site-admin" class="grid_4 omega">
<ul class="admin-meta">
<?php if ( is_user_logged_in() ) { ?>
<li class="grid_2 alpha"><a class="drop-shadow" href="<?php bloginfo('url'); ?>/wp-admin/">proliferate</a></li>
<?php if (!current_user_can('administrator')) { ?>
<li class="grid_2 omega"><a class="drop-shadow" onclick="#disqus-signout" href="#signout">an exodus</a></li>
<?php } else { ?> 
<li class="grid_2 omega"><a class="drop-shadow" href="<?php bloginfo('url'); ?>/wp-login.php?action=logout&#038;_wpnonce=2d602251a8">an exodus</a></li>
<?php } ?>
<?php } else { ?>
<?php if (!current_user_can('administrator')) { ?>
<li class="grid_4 alpha omega"><a class="drop-shadow" href="<?php bloginfo('url'); ?>/wp-login.php">transpierce</a></li>
<?php } else { ?>
<li class="grid_4 alpha omega"><a class="drop-shadow gfc-button-base-v2 gfc-button-2" href="<?php bloginfo('url'); ?>/wp-login.php">transpierce</a></li>
<?php } ?>
<?php }; ?>
</ul>
</div><!-- End #site-admin -->

<!-- == END SITE NAV ======================================= -->


<!-- == SITE BREADCRUMB ====================================== > 


  urls and breadcrumbs _are_ different





< ========================================================== -->

<!-- == BREADCRUMB ========================================= -->

<div id="site-breadcrumb" class="grid_16 alpha">

<ul>

<li><a href="<?php bloginfo('url'); ?>" rel="index" title="A weedy florilegium">~</a></li>

<?php if (!is_front_page()) { ?>
 
<?php $arc_year = get_the_modified_time('Y'); ?>
<?php $arc_month = get_the_modified_time('m'); ?>
<?php $arc_day = get_the_modified_time('d'); ?>

<li><a href="<?php bloginfo('url'); ?>/<?php echo get_the_modified_date('Y'); ?>/"><?=$arc_year;?></a></li>

<?php if ( is_single() or is_page() or is_month() or is_day() ) { ?>
<!--li><a href="/<?php echo get_the_modified_date('Y'); ?>/<?php echo get_the_modified_date('m'); ?>/"><?=$arc_month;?></a></li-->
<?php } ?>

<?php if ( is_single() or is_page() or is_day() ) { ?>
<!--li><a href="/<?php echo get_the_modified_date('Y'); ?>/<?php echo get_the_modified_date('m'); ?>/<?php echo get_the_modified_date('d'); ?>/"><?=$arc_day;?></a></li-->
<?php } ?>

<?php if (is_single() or is_page()) { ?> 
<li><a href="<?php echo get_permalink(); ?>"><?php echo preg_replace('/http\:\/\/webjournal\.nerdfiles\.net\/(\d+)/(\d+)/(\d+)/', '/', get_permalink()); ?></a></li>
<?php } ?>

<?php } ?>

</ul>

</div><!-- End #site-breadcrumb -->

<!-- == END SITE BREADCRUMB ================================ -->


<!-- == SITE SEARCH ========================================== > 








< ========================================================== -->

<!-- == SEARCH ============================================= -->

<div id="site-search" class="grid_16 alpha">
<?php get_search_form(); ?>
</div><!-- End #site-search -->

<?php the_post() ?><!-- the_post() -->

<?php if ( is_day() ) : ?>

<div class="archive-description archive-description-daily"><?php _e('You are currently viewing the daily archives for', 'webjournal') ?> <?php the_time(__('l, F Y', 'webjournal')) ?></div>
<?php elseif ( is_month() ) : ?>
<div class="archive-description archive-description-monthly"><?php _e('You are currently viewing the monthly archives for', 'webjournal') ?> <?php the_time(__('F Y', 'webjournal')) ?></div>
<?php elseif ( is_year() ) : ?>
<div class="archive-description archive-description-yearly"><?php _e('You are currently viewing the yearly archives for', 'webjournal') ?> <?php the_time(__('Y', 'webjournal')) ?></div>
<?php elseif ( is_author() ) : ?>
<div class="archive-description archive-description-author"><?php _e('You are currently viewing the author archives of ', 'webjournal') ?> <?php the_author(); ?></div>
<?php elseif ( is_category() ) : ?>
<div class="archive-description archive-description-category"><?php if ( !('' == category_description()) ) : echo single_cat_title(); _e(' &mdash; ', 'webjournal'); echo category_description(); else : echo 'You are currently viewing the category archives of '; echo single_cat_title(); endif; ?></div>

<?php endif; ?>

<?php rewind_posts() ?>

</div><!-- #header -->

<?php if (is_search() or is_archive()) : ?>
<div class="pagenavi-container clearfix">
<div class="grid_16 alpha">
<?php wp_pagenavi(); ?>
</div>
</div>
<?php endif; ?>
