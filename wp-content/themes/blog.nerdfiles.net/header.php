<!DOCTYPE HTML>
<html lang="en" class="no-js <?php blogtxt_body_class() ?>">
<head>

    <meta charset="utf-8" />
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
		&sect;
		<?php bloginfo('name') ?>
	</title>

    <?php wp_head() // Do not remove; helps plugins work ?>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Philosopher" type="text/css" /> 
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/_assets/_css-lib/960.gs/css/reset.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/_assets/_css-lib/960.gs/css/text.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/_assets/_css-lib/960.gs/css/960.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('template_directory'); ?>/print.css" />
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/_assets/_js/mew.js"></script>

	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php bloginfo('name') ?> <?php _e('RSS feed', 'blogtxt' ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php bloginfo('name') ?> <?php _e( 'comments RSS feed', 'blogtxt' ) ?>" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

</head>

<body class="<?php blogtxt_body_class() ?>">

<div id="wrapper">
	<div id="container" class="container_16 clearfix">
		<div id="content" class="grid_16">

            <div id="header" class="clearfix">
            
                <div id="site-access">
                    <small>Note: 8 site access controls</small>
                    <ul>
                        <li><span class="content-access"><a href="#content" title="<?php _e('Skip to content', 'blogtxt'); ?>"><?php _e('Skip to content', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#latest" title="<?php _e('Skip to latest posts', 'blogtxt'); ?>"><?php _e('Skip to #latest post', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#art" title="<?php _e('Skip to #art posts', 'blogtxt'); ?>"><?php _e('Skip to #art related posts', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#philosophy" title="<?php _e('Skip to #philosophy posts', 'blogtxt'); ?>"><?php _e('Skip to #philosophy related posts', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#life" title="<?php _e('Skip to #life posts', 'blogtxt'); ?>"><?php _e('Skip to #life related posts', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#web" title="<?php _e('Skip to #web related posts', 'blogtxt'); ?>"><?php _e('Skip to #web related posts', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#site-navigation" title="<?php _e('Skip to navigation', 'blogtxt'); ?>"><?php _e('Skip to navigation', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#site-search" title="<?php _e('Skip to search', 'blogtxt'); ?>"><?php _e('Skip to search', 'blogtxt'); ?></a></span></li>
                        <li><span class="content-access"><a href="#site-admin" title="<?php _e('Skip to administrator\'s section', 'blogtxt'); ?>"><?php _e('Skip to administrator\'s section', 'blogtxt'); ?></a></span></li>
                    </ul>
                </div>
                
				<div id="site-header" class="grid_16 alpha">
    				<div class="grid_4 alpha site-name">
    				    <div class="drop-shadow">
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
                        <li class="grid_2 omega"><a class="drop-shadow" href="http://blog.nerdfiles.net/wp-login.php?action=logout&#038;_wpnonce=2d602251a8">an exodus</a></li> 
                    <?php } else { ?>
                        <li class="grid_4 alpha omega"><a class="drop-shadow" href="http://blog.nerdfiles.net/wp-login.php">transpierce</a></li>
                    <?php }; ?>
                    </ul>
                </div>

				<div id="site-search" class="grid_16 alpha">
                    <?php get_search_form(); ?>
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
