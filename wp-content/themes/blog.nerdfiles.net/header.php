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

<meta name="viewport" content="width=device-width, initial-scale=0.33" />  

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
    <?php _e('Blog archives', 'webjournal') ?>
<?php elseif ( is_search() ) : ?>
    <?php _e('Search results', 'webjournal') ?>
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
  href="<?php bloginfo('template_directory'); ?>/global.css" />
  
<?php wp_head() // Do not remove; helps plugins work ?>
<!-- End wp_head -->

<!-- RDF Feed -->
  
<link 
  rel="alternate" 
  type="application/rdf+xml" 
  href="<?php bloginfo('rdf_url') ?>" 
  title="<?php bloginfo('name') ?> <?php _e('RDF feed', 'webjournal' ) ?>" />

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
<div id="top"></div>
<div id="wrapper" dir="ltr">
<div id="container" class="container_16 clearfix">
<div id="content" class="grid_16">

<div id="header" class="clearfix">
      
<div id="site-access">
<ul>
<li><span class="content-access">Back to <a href="#top">top</a></span></li>
<?php
global $post; 
$content = (is_front_page()) ? "#site-search" : "#post-" . get_the_ID();
$contentText = (is_front_page()) ? 'Search from home' : 'Skip to content';
?>
<li><span class="content-access"><a href="<?php echo $content; ?>" title="<?php echo $contentText; ?>"><?php echo $contentText; ?></a></span></li>
<?php if ( current_user_can('administrator') ) { ?>
<li><a href="http://webjournal.nerdfiles.net/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit">Edit post</a></li>
<?php } ?>
<?php 
if ( $post->comment_count != 0 ) { ?>
<li><span class="content-access"><a href="#comments" title="Read post comments">Read comments</a></span></li>
<?php } ?>
<?php
if ('open' == $post->comment_status && !is_front_page()) {
?>
<li><span class="content-access"><a href="#respond" title="Respond to post">Respond to post</a></span></li>
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
                
<div id="site-header" class="grid_16 alpha">
<div class="grid_4 alpha site-name">
<div class="drop-shadow">
<span class="call-access-menu drop-shadow">&uarr; esc</span>
<a href="<?php echo get_settings('home') ?>/" title="A weedy florilegium" class="logo">
<span class="a">A</span>
<span class="weedy">weedy</span>
<span class="florilegium">florilegium</span>
</a>
<span class="author-tag">web journal of <a href="http://nerdfiles.net" title="Go to nerdfiles.net">nerdfiles</a></span>
</div>
</div><!-- End .site-name -->
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
</aside>
</div>
</div>
</div><!-- End .site-description -->
</div><!-- End #site-header -->
				
<div id="site-navigation" class="grid_12 alpha">
<?php // @copyof wp_nav_menu(); ?>
<div class="menu-jininmi-container">
<ul id="menu-jininmi" class="menu">
<li id="menu-item-2218" class="grid_1 alpha menu-item menu-item-type-post_type menu-item-object-page menu-item-2218"><a class="drop-shadow" href="http://webjournal.nerdfiles.net/the-semantic-web/">sw</a></li>
<li id="menu-item-2219" class="grid_1 menu-item menu-item-type-post_type menu-item-object-page menu-item-2219"><a class="drop-shadow" href="http://webjournal.nerdfiles.net/content-is-king/">cok</a></li>
<li id="menu-item-2220" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2220"><a class="drop-shadow" href="http://webjournal.nerdfiles.net/recipes/">recipes</a></li>
<li id="menu-item-2221" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2221"><a class="drop-shadow" href="http://webjournal.nerdfiles.net/poems/">poems</a></li>
<li id="menu-item-2222" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2222"><a class="drop-shadow" href="http://webjournal.nerdfiles.net/claims/">claims</a></li>
<li id="menu-item-2223" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2223"><a class="drop-shadow" href="http://webjournal.nerdfiles.net/quotes/">quotes</a></li>
<li id="menu-item-2224" class="grid_2 omega menu-item menu-item-type-post_type menu-item-object-page menu-item-2224"><a class="drop-shadow" href="http://webjournal.nerdfiles.net/about/">about</a></li>
</ul>
</div>

</div><!-- End #site-navigation -->

<div id="site-admin" class="grid_4 omega">
<ul class="admin-meta">
<?php if ( is_user_logged_in() ) { ?>
<li class="grid_2 alpha"><a class="drop-shadow" href="http://webjournal.nerdfiles.net/wp-admin/">proliferate</a></li>
<?php if (!current_user_can('administrator')) { ?>
<li class="grid_2 omega"><a class="drop-shadow" onclick="google.friendconnect.requestSignOut()" href="#signout">an exodus</a></li>
<?php } else { ?> 
<li class="grid_2 omega"><a class="drop-shadow" href="http://webjournal.nerdfiles.net/wp-login.php?action=logout&#038;_wpnonce=2d602251a8">an exodus</a></li>
<?php } ?>
<?php } else { ?>
<?php if (!current_user_can('administrator')) { ?>
<li class="grid_4 alpha omega"><a class="drop-shadow" href="http://webjournal.nerdfiles.net/wp-login.php">transpierce</a></li>
<?php } else { ?>
<li class="grid_4 alpha omega"><a class="drop-shadow gfc-button-base-v2 gfc-button-2" href="http://webjournal.nerdfiles.net/wp-login.php">transpierce</a></li>
<?php } ?>
<?php }; ?>
</ul>
</div><!-- End #site-admin -->

<div id="site-breadcrumb" class="grid_16 alpha">
<ul>
<li><a href="//webjournal.nerdfiles.net" rel="index" title="A weedy florilegium">..</a></li>
<?php if (!is_front_page()) { ?>
<li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>"><?php echo $_SERVER['REQUEST_URI']; ?></a></li>
<?php } ?>
</ul>
</div><!-- End #site-breadcrumb -->

<style>
#site-breadcrumb { margin-top: 15px; text-align: center; color: #e0e0e0; }
#site-breadcrumb ul { margin: 0; list-style: none; }
#site-breadcrumb li { display: inline; margin: 0 0 0 5px; }
#site-breadcrumb a { text-decoration: none; }
</style>

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

<?php if (is_search()) : ?>
<div class="pagenavi-container clearfix">
<div class="grid_16 alpha">
<?php wp_pagenavi(); ?>
</div>
</div>
<?php endif; ?>
