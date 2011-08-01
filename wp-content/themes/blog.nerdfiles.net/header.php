<?php
if (!current_user_can('add_users')){
 wp_deregister_script( 'admin-bar' );
 wp_deregister_style( 'admin-bar' );
 remove_action('wp_footer','wp_admin_bar_render',1000);
}
?>
<!DOCTYPE HTML>
<html lang="en" class="no-js <?php blogtxt_body_class() ?>">
<head>

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
<meta name="viewport" content="width=device-width, initial-scale=0.33">  

<title>
<?php if ( is_404() ) : ?>
    <?php _e('Page not found', 'blogtxt') ?>
<?php elseif ( is_home() ) : ?>
    <?php echo "Home"; ?>
<?php elseif ( is_category() ) : ?>
    <?php echo single_cat_title(); ?>
<?php elseif ( is_date() ) : ?>
    <?php _e('Blog archives', 'blogtxt') ?>
<?php elseif ( is_search() ) : ?>
    <?php _e('Search results', 'blogtxt') ?>
<?php else : ?>
    <?php the_title() ?>
<?php endif ?>
 &sect; <?php bloginfo('name') ?>
</title>

<!-- Stylesheets -->

<link 
  rel="stylesheet" 
  href="http://fonts.googleapis.com/css?family=Philosopher"
  media="all" /> 
  
<link 
  rel="stylesheet"
  media="all" 
  href="<?php bloginfo('template_directory'); ?>/_assets/_css-lib/960.gs/css/reset.css" />
  
<link 
  rel="stylesheet" 
  media="all" 
  href="<?php bloginfo('template_directory'); ?>/_assets/_css-lib/960.gs/css/text.css" />
  
<link 
  rel="stylesheet" 
  media="all" 
  href="<?php bloginfo('template_directory'); ?>/_assets/_css-lib/960.gs/css/960.css" />
  
<link 
  rel="stylesheet" 
  media="all" 
  href="<?php bloginfo('stylesheet_url'); ?>" />
  
<link 
  rel="stylesheet" 
  media="print" 
  href="<?php bloginfo('template_directory'); ?>/print.css" />
    
<!-- Scripts -->

<script src="<?php bloginfo('template_directory'); ?>/_assets/_js-lib/script.js/dist/script.min.js"></script>

<script>
  $script('//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', 'jquery');
  $script('/wp-content/themes/blog.nerdfiles.net/_assets/_js/mew.js', 'mew');
  $script('/wp-includes/js/l10n.js?ver=20101110', 'l10n');
</script>

<!-- wp_head -->  
<?php wp_head() // Do not remove; helps plugins work ?>
<!-- End wp_head -->

<!-- RDF Feed -->
  
<link 
  rel="alternate" 
  type="application/rdf+xml" 
  href="<?php bloginfo('rdf_url') ?>" 
  title="<?php bloginfo('name') ?> <?php _e('RDF feed', 'blogtxt' ) ?>" />

<!-- Comments Feed -->

<link 
  rel="alternate" 
  type="application/rss+xml" 
  href="<?php bloginfo('comments_rss2_url') ?>" 
  title="<?php bloginfo('name') ?> <?php _e( 'comments RSS feed', 'blogtxt' ) ?>" />

<!-- Trace and Pinkbacks -->

<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

<!-- Misc -->

<link rel="me" type="text/html" href="http://www.google.com/profiles/nerdfiles"/>

</head>

<body <?php body_class(); ?>>

<div id="wrapper">
	<div id="container" class="container_16 clearfix">
		<div id="content" class="grid_16">

            <div id="header" class="clearfix">
            
                <div id="site-access">
                    <ul>
                        <?php
                        $content = (is_front_page()) ? "#site-search" : "#post-" . get_the_ID();
                        $contentText = (is_front_page()) ? 'Search from home' : 'Skip to content';
                        ?>
                        <li><span class="content-access"><a href="<?php echo $content; ?>" title="<?php echo $contentText; ?>"><?php echo $contentText; ?></a></span></li>
                        <?php
                        global $post; 
                        if ('open' == $post->comment_status && !is_front_page()) {
                        ?>
                        <li><span class="content-access"><a href="#respond" title="Respond to this post">Respond to this post</a></span></li>
                        <?php } ?>
                        <li><span class="content-access"><a href="#latest" title="<?php _e('Skip to latest posts', 'blogtxt'); ?>"><?php _e('Skip to #latest post', 'blogtxt'); ?></a></span></li>
                        <?php if(is_front_page()) { ?>
                        <li><span class="content-access"><a href="#art" title="<?php _e('Skip to #art posts', 'blogtxt'); ?>"><?php _e('Skip to #art related posts', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#philosophy" title="<?php _e('Skip to #philosophy posts', 'blogtxt'); ?>"><?php _e('Skip to #philosophy related posts', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#life" title="<?php _e('Skip to #life posts', 'blogtxt'); ?>"><?php _e('Skip to #life related posts', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#web" title="<?php _e('Skip to #web related posts', 'blogtxt'); ?>"><?php _e('Skip to #web related posts', 'blogtxt'); ?></a></span></li>
                        <?php } ?>
                        <li><span class="content-access"><a href="#site-navigation" title="<?php _e('Skip to navigation', 'blogtxt'); ?>"><?php _e('Skip to navigation', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#site-search" title="<?php _e('Skip to search', 'blogtxt'); ?>"><?php _e('Skip to search', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#site-admin" title="<?php _e('Skip to administrator\'s section', 'blogtxt'); ?>"><?php _e('Skip to administrator\'s section', 'blogtxt'); ?></a></span></li>
                    </ul>
                </div>
                
				<div id="site-header" class="grid_16 alpha">
    				<div class="grid_4 alpha site-name">
    				    <div class="drop-shadow">
    				        <span class="call-access-menu">&uarr; escape</span>
                            <style>
                                .call-access-menu { 
                                    position: absolute; 
                                    font-size: 9px !important; 
                                    color: #999;
                                    font-weight: 400; 
                                    margin-top: -10px; 
                                    margin-left: 4px;
                                    opacity: .4;
                                    text-shadow: 0 0 1px rgba(30,30,30,.5); }
                            </style>
    				        <a href="<?php echo get_settings('home') ?>/" title="A weedy florilegium">
    				            <span class="a">A</span>
    				            <span class="weedy">weedy</span>
    				            <span class="florilegium">florilegium</span>
    				        </a>
    				        <span class="author-tag">web journal of <a href="http://nerdfiles.net" title="Go to nerdfiles.net">nerdfiles</a></span>
    				    </div>
    				</div>
                    <div class="grid_12 omega site-description">
                        <div class="drop-shadow">
                            <?php //bloginfo('description') ?>

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
				    </div>
				</div>
				
				<div id="site-navigation" class="grid_12 alpha">
				    
				    <?php // @copyof wp_nav_menu(); ?>
				    
				    <div class="menu-jininmi-container"><ul id="menu-jininmi" class="menu">
				    <li id="menu-item-2218" class="grid_1 alpha menu-item menu-item-type-post_type menu-item-object-page menu-item-2218"><a class="drop-shadow" href="http://blog.nerdfiles.net/the-semantic-web/">sw</a></li>
                    <li id="menu-item-2219" class="grid_1 menu-item menu-item-type-post_type menu-item-object-page menu-item-2219"><a class="drop-shadow" href="http://blog.nerdfiles.net/content-is-king/">cok</a></li>
                    <li id="menu-item-2220" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2220"><a class="drop-shadow" href="http://blog.nerdfiles.net/recipes/">recipes</a></li>
                    <li id="menu-item-2221" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2221"><a class="drop-shadow" href="http://blog.nerdfiles.net/poetry/">poetry</a></li>
                    <li id="menu-item-2222" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2222"><a class="drop-shadow" href="http://blog.nerdfiles.net/claims/">claims</a></li>
                    <li id="menu-item-2223" class="grid_2 menu-item menu-item-type-post_type menu-item-object-page menu-item-2223"><a class="drop-shadow" href="http://blog.nerdfiles.net/quotes/">quotes</a></li>
                    <li id="menu-item-2224" class="grid_2 omega menu-item menu-item-type-post_type menu-item-object-page menu-item-2224"><a class="drop-shadow" href="http://blog.nerdfiles.net/about/">about</a></li>
                    </ul></div>
                    
				</div>

				<div id="site-admin" class="grid_4 omega">
    				<ul class="admin-meta">
                    <?php if ( is_user_logged_in() ) { ?>
                        <li class="grid_2 alpha"><a class="drop-shadow" href="http://blog.nerdfiles.net/wp-admin/">proliferate</a></li>
                        <?php if (!current_user_can('administrator')) { ?>
                        <li class="grid_2 omega"><a class="drop-shadow" onclick="google.friendconnect.requestSignOut()" href="#signout">an exodus</a></li>
                        <?php } else { ?> 
                        <li class="grid_2 omega"><a class="drop-shadow" href="http://blog.nerdfiles.net/wp-login.php?action=logout&#038;_wpnonce=2d602251a8">an exodus</a></li>
                        <?php } ?>
                    <?php } else { ?>
                        <li class="grid_4 alpha omega"><a class="drop-shadow" href="http://blog.nerdfiles.net/wp-login.php">transpierce</a></li>
                    <?php }; ?>
                    </ul>
                </div>

				<div id="site-search" class="grid_16 alpha">
                    <?php get_search_form(); ?>
        </div>
        
    <div id="site-social">
    <!-- AddThis Button BEGIN -->
    <div class="addthis_toolbox addthis_default_style">
<!-- AddThis Button BEGIN -->
    <a class="addthis_button_google_plusone"></a>
    <!--a class="addthis_counter addthis_pill_style"></a-->
    </div>
    <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e2f186100316162"></script>
    <!-- AddThis Button END -->
    </div>
				
<?php the_post() ?>

<?php if ( is_day() ) : ?>
				<div class="archive-description archive-description-daily"><?php _e('You are currently viewing the daily archives for', 'blogtxt') ?> <?php the_time(__('l, F Y', 'blogtxt')) ?></div>
<?php elseif ( is_month() ) : ?>
				<div class="archive-description archive-description-monthly"><?php _e('You are currently viewing the monthly archives for', 'blogtxt') ?> <?php the_time(__('F Y', 'blogtxt')) ?></div>
<?php elseif ( is_year() ) : ?>
				<div class="archive-description archive-description-yearly"><?php _e('You are currently viewing the yearly archives for', 'blogtxt') ?> <?php the_time(__('Y', 'blogtxt')) ?></div>
<?php elseif ( is_author() ) : ?>
				<div class="archive-description archive-description-author"><?php _e('You are currently viewing the author archives of ', 'blogtxt') ?> <?php the_author(); ?></div>
<?php elseif ( is_category() ) : ?>
				<div class="archive-description archive-description-category"><?php if ( !('' == category_description()) ) : echo single_cat_title(); _e(' &mdash; ', 'blogtxt'); echo category_description(); else : echo 'You are currently viewing the category archives of '; echo single_cat_title(); endif; ?></div>
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
