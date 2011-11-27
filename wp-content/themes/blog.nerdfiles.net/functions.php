<?php

function list_hooked_functions($tag=false){
 global $wp_filter;
 if ($tag) {
  $hook[$tag]=$wp_filter[$tag];
  if (!is_array($hook[$tag])) {
  trigger_error("Nothing found for '$tag' hook", E_USER_WARNING);
  return;
  }
 }
 else {
  $hook=$wp_filter;
  ksort($hook);
 }
 echo '<pre>';
 foreach($hook as $tag => $priority){
  echo "<br />&gt;&gt;&gt;&gt;&gt;\t<strong>$tag</strong><br />";
  ksort($priority);
  foreach($priority as $priority => $function){
  echo $priority;
  foreach($function as $name => $properties) echo "\t$name<br />";
  }
 }
 echo '</pre>';
 return;
}

//list_hooked_functions('wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

function remove_generator() {
	return '';
}

add_filter('the_generator', 'remove_generator');

add_action('wp', 'clear_fe', 1);

function clear_fe() {
    global $post;
    
    if (!is_admin()) {
    remove_action('wp_head', 'GA_Filterspool_analytics', 2);
    remove_action('wp_head', 'wp_generator', 10);
    remove_action('wp_head', 'wp_print_styles', 8);
    //remove_action('wp_head', 'wp_print_head_scripts', 9);
    //remove_action('wp_head', 'rel_canonical');
    //remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'gfc_wp_head', 10);
    remove_action('wp_head', 'gfci_header', 10);
    
    //add_action('wp_footer', 'gfc_wp_head');
    add_action('wp_footer', 'g_analytics', 2);
    if ( !is_front_page() && 'open' == $post->comment_status ) {
      add_action('wp_head', 'friendconnect', 11);
    }
    
    wp_deregister_script('l10n');
    wp_deregister_script('jquery');
    
    add_action('wp_footer', 'javascript_res', 1);
    }
}

function javascript_res() {
?>
<!-- Scripts -->

    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js"></script>
    <script>
        Modernizr.load([
            {
                load: 'http://code.jquery.com/jquery.min.js',
                complete: function () {
                    
                    if ( !window.jQuery ) {
                        // We're fucked!
                    }
                    
                    Modernizr.load('/wp-includes/js/l10n.js?ver=20101110');
                    Modernizr.load('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
                    Modernizr.load('/wp-content/themes/blog.nerdfiles.net/_assets/_js-lib/jquery.waypoints/waypoints.min.js');
                    Modernizr.load('/wp-content/themes/blog.nerdfiles.net/_assets/_js/mew.js');
                    
                }
            }
        ]);
    </script>

<?php
}

function friendconnect() {
?>

<style type="text/css">

    #gfc_profile {
        font-size: 11px;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        margin: 20px 40px;
        padding: 15px;
    }

    #gfc_profile img {
        border: 2px solid grey;
        margin-top: 15px;
        margin-right: 10px;     
    }

    #gfc_profile ul {
        list-style-type:none;
    }

    #gfc_profile ul li {
        list-style-type:none;
    } 
</style>

<!-- Load the Google AJAX API Loader -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<!-- Load the Google Friend Connect javascript library. -->

<script type="text/javascript">
google.load('friendconnect', '0.8');
</script>

<!-- Initialize the Google Friend Connect OpenSocial API. -->
<script type="text/javascript">
var SITE_ID = "12148896585969289050"
google.friendconnect.container.setParentUrl('http://webjournal.nerdfiles.net/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.initOpenSocialApi({
    site: SITE_ID,
    onload: function(securityToken) { 
        if (!window.timesloaded) {
            window.timesloaded = 1;
        } else {
            window.timesloaded++;
        }
        initAllData(window.timesloaded); 
    }
});
</script>
<script type="text/javascript">

// Send request to GFC if needed

function initAllData(gfc_loaded) {

    if ( gfc_loaded > 1 ) {
        //Page is loded twice or more
        //Sign In or Sign out happened -> reload page
        window.location.reload();
    } else {
        google.friendconnect.renderSignInButton({ 'id': 'gfc_profile','style':'standard','text': 'Sign In'});
    }
};   
</script>
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<?php
}

function g_analytics() {
?>
<script>
//<![CDATA[
var _gaq = _gaq || [];
_gaq.push(['_setAccount','UA-1343124-3']);
_gaq.push(['_trackPageview'],['_trackPageLoadTime']);
(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
//]]>
</script>
<?php
}

// Produces links for every page just below the header
function webjournal_globalnav() {
	echo "\t\t\t<div id=\"globalnav\"><ul id=\"menu\">";
	if ( !is_front_page() ) { ?><li class="page_item_home home-link"><a href="<?php bloginfo('home'); ?>/" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?>" rel="home"><?php _e('Home', 'webjournal') ?></a></li><?php }
	$menu = wp_list_pages('title_li=&sort_column=menu_order&echo=0'); // Params for the page list in header.php
	echo str_replace(array("\r", "\n", "\t"), '', $menu);
	echo "</ul></div>\n";
}

// Produces an hCard for the "admin" user
function webjournal_admin_hCard() {
	global $wpdb, $admin_info;
	$admin_info = get_userdata(1);
	echo '<span class="vcard"><a class="url fn n" href="' . $admin_info->user_url . '"><span class="given-name">' . $admin_info->first_name . '</span> <span class="family-name">' . $admin_info->last_name . '</span></a></span>';
}

// Produces an hCard for post authors
function webjournal_author_hCard() {
	global $wpdb, $authordata;
	echo '<span class="entry-author author vcard"><a class="url fn n" href="' . get_author_link(false, $authordata->ID, $authordata->user_nicename) . '" title="View all posts by ' . $authordata->display_name . '">' . get_the_author() . '</a></span>';
}

function webjournal_author_link() {
	global $wpdb, $authordata;
	echo '<span class="entry-author author vcard"><a class="url fn n" href="' . get_author_link(false, $authordata->ID, $authordata->user_nicename) . '" title="View all posts by ' . $authordata->display_name . '">' . get_the_author() . '</a></span>';
}

// Produces semantic classes for the body element; Originally from the Sandbox, http://www.plaintxt.org/themes/sandbox/
function webjournal_body_class( $print = true ) {
	global $wp_query, $current_user;

	$c = array('wordpress');

	webjournal_date_classes(time(), $c);

	is_home()       ? $c[] = 'home'       : null;
	is_archive()    ? $c[] = 'archive'    : null;
	is_date()       ? $c[] = 'date'       : null;
	is_search()     ? $c[] = 'search'     : null;
	is_paged()      ? $c[] = 'paged'      : null;
	is_attachment() ? $c[] = 'attachment' : null;
	is_404()        ? $c[] = 'four04'     : null;

	if ( is_single() ) {
		the_post();
		$c[] = 'single';
		if ( isset($wp_query->post->post_date) )
			webjournal_date_classes(mysql2date('U', $wp_query->post->post_date), $c, 's-');
		foreach ( (array) get_the_category() as $cat )
			$c[] = 's-category-' . $cat->category_nicename;
			$c[] = 's-author-' . get_the_author_login();
		rewind_posts();
	}

	elseif ( is_author() ) {
		$author = $wp_query->get_queried_object();
		$c[] = 'author';
		$c[] = 'author-' . $author->user_nicename;
	}
	
	elseif ( is_category() ) {
		$cat = $wp_query->get_queried_object();
		$c[] = 'category';
		$c[] = 'category-' . $cat->category_nicename;
	}

	elseif ( is_page() ) {
		the_post();
		$c[] = 'page';
		$c[] = 'page-author-' . get_the_author_login();
		rewind_posts();
	}

	if ( $current_user->ID )
		$c[] = 'loggedin';
		
	$c = join(' ', apply_filters('body_class',  $c));

	return $print ? print($c) : $c;
}

// Produces semantic classes for the each individual post div; Originally from the Sandbox, http://www.plaintxt.org/themes/sandbox/
function webjournal_post_class( $print = true ) {
	global $post, $webjournal_post_alt;

	$c = array('hentry', "p$webjournal_post_alt", $post->post_type, $post->post_status);

	$c[] = 'author-' . get_the_author_login();

	if ( is_attachment() )
		$c[] = 'attachment';

	foreach ( (array) get_the_category() as $cat )
		$c[] = 'category-' . $cat->category_nicename;

	webjournal_date_classes(mysql2date('U', $post->post_date), $c);

	if ( ++$webjournal_post_alt % 2 )
		$c[] = 'alt';
		
	$c = join(' ', apply_filters('post_class', $c));

	return $print ? print($c) : $c;
}
$webjournal_post_alt = 1;

// Produces semantic classes for the each individual comment li; Originally from the Sandbox, http://www.plaintxt.org/themes/sandbox/
function webjournal_comment_class( $print = true ) {
	global $comment, $post, $webjournal_comment_alt;

	$c = array($comment->comment_type);

	if ( $comment->user_id > 0 ) {
		$user = get_userdata($comment->user_id);

		$c[] = "byuser commentauthor-$user->user_login";

		if ( $comment->user_id === $post->post_author )
			$c[] = 'bypostauthor';
	}

	webjournal_date_classes(mysql2date('U', $comment->comment_date), $c, 'c-');
	if ( ++$webjournal_comment_alt % 2 )
		$c[] = 'alt';

	$c[] = "c$webjournal_comment_alt";

	if ( is_trackback() ) {
		$c[] = 'trackback';
	}

	$c = join(' ', apply_filters('comment_class', $c));

	return $print ? print($c) : $c;
}

// Produces date-based classes for the three functions above; Originally from the Sandbox, http://www.plaintxt.org/themes/sandbox/
function webjournal_date_classes($t, &$c, $p = '') {
	$t = $t + (get_option('gmt_offset') * 3600);
	$c[] = $p . 'y' . gmdate('Y', $t);
	$c[] = $p . 'm' . gmdate('m', $t);
	$c[] = $p . 'd' . gmdate('d', $t);
	$c[] = $p . 'h' . gmdate('h', $t);
}

// Returns other categories except the current one (redundant); Originally from the Sandbox, http://www.plaintxt.org/themes/sandbox/
function webjournal_other_cats($glue) {
	$current_cat = single_cat_title('', false);
	$separator = "\n";
	$cats = explode($separator, get_the_category_list($separator));

	foreach ( $cats as $i => $str ) {
		if ( strstr($str, ">$current_cat<") ) {
			unset($cats[$i]);
			break;
		}
	}

	if ( empty($cats) )
		return false;

	return trim(join($glue, $cats));
}

// Returns other tags except the current one (redundant); Originally from the Sandbox, http://www.plaintxt.org/themes/sandbox/
function webjournal_other_tags($glue) {
	$current_tag = single_tag_title('', '',  false);
	$separator = "\n";
	$tags = explode($separator, get_the_tag_list("", "$separator", ""));

	foreach ( $tags as $i => $str ) {
		if ( strstr($str, ">$current_tag<") ) {
			unset($tags[$i]);
			break;
		}
	}

	if ( empty($tags) )
		return false;

	return trim(join($glue, $tags));
}

// Produces an avatar image with the hCard-compliant photo class
function webjournal_commenter_link() {
	$commenter = get_comment_author_link();
	if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
		$commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	} else {
		$commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	}
	$email = get_comment_author_email();
	$avatar_size = get_option('webjournal_avatarsize');
	if ( empty($avatar_size) ) $avatar_size = '64';
	$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( "$email", "$avatar_size" ) );
	echo '<div class="avatar">' . $avatar . '</div><span class="fn n">' . $commenter . '</span>';
}

// Function to filter the default gallery shortcode
function webjournal_gallery($attr) {
	global $post;
	if ( isset($attr['orderby']) ) {
		$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
		if ( !$attr['orderby'] )
			unset($attr['orderby']);
	}

	extract(shortcode_atts( array(
		'orderby'    => 'menu_order ASC, ID ASC',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
	), $attr ));

	$id           =  intval($id);
	$orderby      =  addslashes($orderby);
	$attachments  =  get_children("post_parent=$id&post_type=attachment&post_mime_type=image&orderby={$orderby}");

	if ( empty($attachments) )
		return null;

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $id => $attachment )
			$output .= wp_get_attachment_link( $id, $size, true ) . "\n";
		return $output;
	}

	$listtag     =  tag_escape($listtag);
	$itemtag     =  tag_escape($itemtag);
	$captiontag  =  tag_escape($captiontag);
	$columns     =  intval($columns);
	$itemwidth   =  $columns > 0 ? floor(100/$columns) : 100;

	$output = apply_filters( 'gallery_style', "\n" . '<div class="gallery">', 9 ); // Available filter: gallery_style

	foreach ( $attachments as $id => $attachment ) {
		$img_lnk = get_attachment_link($id);
		$img_src = wp_get_attachment_image_src( $id, $size );
		$img_src = $img_src[0];
		$img_alt = $attachment->post_excerpt;
		if ( $img_alt == null )
			$img_alt = $attachment->post_title;
		$img_rel = apply_filters( 'gallery_img_rel', 'attachment' ); // Available filter: gallery_img_rel
		$img_class = apply_filters( 'gallery_img_class', 'gallery-image' ); // Available filter: gallery_img_class

		$output  .=  "\n\t" . '<' . $itemtag . ' class="gallery-item gallery-columns-' . $columns .'">';
		$output  .=  "\n\t\t" . '<' . $icontag . ' class="gallery-icon"><a href="' . $img_lnk . '" title="' . $img_alt . '" rel="' . $img_rel . '"><img src="' . $img_src . '" alt="' . $img_alt . '" class="' . $img_class . ' attachment-' . $size . '" /></a></' . $icontag . '>';

		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "\n\t\t" . '<' . $captiontag . ' class="gallery-caption">' . $attachment->post_excerpt . '</' . $captiontag . '>';
		}

		$output .= "\n\t" . '</' . $itemtag . '>';
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= "\n</div>\n" . '<div class="gallery">';
	}
	$output .= "\n</div>\n";

	return $output;
}

// Loads a webjournal-style Search widget
function widget_webjournal_search($args) {
	extract($args);
	$options = get_option('widget_webjournal_search');
	$title = empty($options['title']) ? __( 'Blog Search', 'webjournal' ) : $options['title'];
	$button = empty($options['button']) ? __( 'Find', 'webjournal' ) : $options['button'];
?>
		<?php echo $before_widget ?>
				<?php echo $before_title ?><label for="s"><?php echo $title ?></label><?php echo $after_title ?>
			<form id="searchform" method="get" action="<?php bloginfo('home') ?>">
				<div>
					<input id="s" name="s" class="text-input" type="text" value="<?php the_search_query() ?>" size="10" tabindex="1" accesskey="S" />
					<input id="searchsubmit" name="searchsubmit" class="submit-button" type="submit" value="<?php echo $button ?>" tabindex="2" />
				</div>
			</form>
		<?php echo $after_widget ?>
<?php
}

// Widget: Search; element controls for customizing text within Widget plugin
function widget_webjournal_search_control() {
	$options = $newoptions = get_option('widget_webjournal_search');
	if ( $_POST['search-submit'] ) {
		$newoptions['title'] = strip_tags( stripslashes( $_POST['search-title'] ) );
		$newoptions['button'] = strip_tags( stripslashes( $_POST['search-button'] ) );
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option( 'widget_webjournal_search', $options );
	}
	$title = attribute_escape( $options['title'] );
	$button = attribute_escape( $options['button'] );
?>
			<p><label for="search-title"><?php _e( 'Title:', 'webjournal' ) ?> <input class="widefat" id="search-title" name="search-title" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="search-button"><?php _e( 'Button Text:', 'webjournal' ) ?> <input class="widefat" id="search-button" name="search-button" type="text" value="<?php echo $button; ?>" /></label></p>
			<input type="hidden" id="search-submit" name="search-submit" value="1" />
<?php
}

// Loads a webjournal-style Meta widget
function widget_webjournal_meta($args) {
	extract($args);
	$options = get_option('widget_meta');
	$title = empty($options['title']) ? __('Meta', 'webjournal') : $options['title'];
?>
		<?php echo $before_widget; ?>
			<?php echo $before_title . $title . $after_title; ?>
			<ul>
				<li id="copyright">&copy; <?php echo( date('Y') ); ?> <?php webjournal_admin_hCard(); ?></li>
				<li id="generator-link"><?php _e('Powered by <a href="http://wordpress.org/" title="WordPress">WordPress</a>', 'webjournal') ?></li>
				<li id="web-standards"><?php printf(__('Compliant <a href="http://validator.w3.org/check/referer" title="Valid XHTML">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/validator?profile=css2&amp;warning=2&amp;uri=%s" title="Valid CSS">CSS</a>', 'webjournal'), get_bloginfo('stylesheet_url') ); ?></li>
				<?php wp_register() ?>

				<li><?php wp_loginout() ?></li>
				<?php wp_meta() ?>
			</ul>
		<?php echo $after_widget; ?>
<?php
}

function widget_webjournal_homelink($args) {
	extract($args);
	$options = get_option('widget_webjournal_homelink');
	$title = empty($options['title']) ? __( 'Home', 'webjournal' ) : $options['title'];
	if ( !is_front_page() || is_paged() ) {
?>
			<?php echo $before_widget; ?>
				<?php echo $before_title; ?><a href="<?php bloginfo('home'); ?>/" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?>" rel="home"><?php echo $title; ?></a><?php echo $after_title; ?>
			<?php echo $after_widget; ?>
<?php }
}

// Loads the control functions for the Home Link, allowing control of its text
function widget_webjournal_homelink_control() {
	$options = $newoptions = get_option('widget_webjournal_homelink');
	if ( $_POST['homelink-submit'] ) {
		$newoptions['title'] = strip_tags( stripslashes( $_POST['homelink-title'] ) );
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option( 'widget_webjournal_homelink', $options );
	}
	$title = attribute_escape( $options['title'] );
?>
			<p><?php _e('Adds a link to the home page on every page <em>except</em> the home.', 'webjournal'); ?></p>
			<p><label for="homelink-title"><?php _e( 'Title:', 'webjournal' ) ?> <input class="widefat" id="homelink-title" name="homelink-title" type="text" value="<?php echo $title; ?>" /></label></p>
			<input type="hidden" id="homelink-submit" name="homelink-submit" value="1" />
<?php
}

// Loads webjournal-style RSS Links (separate from Meta) widget
function widget_webjournal_rsslinks($args) {
	extract($args);
	$options = get_option('widget_webjournal_rsslinks');
	$title = empty($options['title']) ? __( 'RSS Links', 'webjournal' ) : $options['title'];
?>
		<?php echo $before_widget; ?>
			<?php echo $before_title . $title . $after_title; ?>
			<ul>
				<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars( get_bloginfo('name'), 1 ) ?> <?php _e( 'Posts RSS feed', 'webjournal' ); ?>" rel="alternate" type="application/rss+xml"><?php _e( 'All posts', 'webjournal' ) ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?> <?php _e( 'Comments RSS feed', 'webjournal' ); ?>" rel="alternate" type="application/rss+xml"><?php _e( 'All comments', 'webjournal' ) ?></a></li>
			</ul>
		<?php echo $after_widget; ?>
<?php
}

// Loads the control functions for the RSS Links, allowing control of its text
function widget_webjournal_rsslinks_control() {
	$options = $newoptions = get_option('widget_webjournal_rsslinks');
	if ( $_POST['rsslinks-submit'] ) {
		$newoptions['title'] = strip_tags( stripslashes( $_POST['rsslinks-title'] ) );
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option( 'widget_webjournal_rsslinks', $options );
	}
	$title = attribute_escape( $options['title'] );
?>
			<p><label for="rsslinks-title"><?php _e( 'Title:', 'webjournal' ) ?> <input class="widefat" id="rsslinks-title" name="rsslinks-title" type="text" value="<?php echo $title; ?>" /></label></p>
			<input type="hidden" id="rsslinks-submit" name="rsslinks-submit" value="1" />
<?php
}

// Loads a recent comments widget just like the default webjournal one
function widget_webjournal_recent_comments($args) {
	global $wpdb, $comments, $comment;
	extract($args);
	$options = get_option('widget_webjournal_recent_comments');
	$title = empty($options['title']) ? __('Recent Comments', 'webjournal') : $options['title'];
	$count = empty($options['count']) ? __('5', 'webjournal') : $options['count'];
	$comments = $wpdb->get_results("SELECT comment_author, comment_author_url, comment_ID, comment_post_ID, SUBSTRING(comment_content,1,65) AS comment_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $count");
?>
		<?php echo $before_widget; ?>
			<?php echo $before_title ?><?php echo $title ?><?php echo $after_title ?>
				<ul id="recentcomments"><?php
				if ( $comments ) : foreach ($comments as $comment) :
				echo  '<li class="recentcomments">' . sprintf(__('<span class="comment-author vcard">%1$s</span> <span class="comment-entry-title">on <cite title="%2$s">%2$s</cite></span> <blockquote class="comment-summary" cite="%3$s" title="Comment on %2$s">%4$s &hellip;</blockquote>'),
					'<a href="'. get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '" title="' . $comment->comment_author . ' on ' . get_the_title($comment->comment_post_ID) . '"><span class="fn n">' . $comment->comment_author . '</span></a>',
					get_the_title($comment->comment_post_ID),
					get_permalink($comment->comment_post_ID),
					strip_tags($comment->comment_excerpt) ) . '</li>';
				endforeach; endif;?></ul>
		<?php echo $after_widget; ?>
<?php
}

// Allows control over the text for the webjournal recent comments widget
function widget_webjournal_recent_comments_control() {
	$options = $newoptions = get_option('widget_webjournal_recent_comments');
	if ( $_POST['rc-submit'] ) {
		$newoptions['title'] = strip_tags( stripslashes( $_POST['rc-title'] ) );
		$newoptions['count'] = strip_tags( stripslashes( $_POST['rc-count'] ) );
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option( 'widget_webjournal_recent_comments', $options );
	}
	$rc_title = attribute_escape( $options['title'] );
	$rc_count = attribute_escape( $options['count'] );
?>
			<p><label for="rc-title"><?php _e( 'Title:', 'webjournal' ) ?> <input class="widefat" id="rc-title" name="rc-title" type="text" value="<?php echo $rc_title; ?>" /></label></p>
			<p>
				<label for="rc-count"><?php _e('Number of comments to show:', 'webjournal'); ?> <input style="width:25px;text-align:center;" id="rc-count" name="rc-count" type="text" value="<?php echo $rc_count; ?>" /></label>
				<br />
				<small><?php _e('(at most 15)'); ?></small>
			</p>
			<input type="hidden" id="rc-submit" name="rc-submit" value="1" />
<?php
}

// Loads, checks that Widgets are loaded and working
function webjournal_widgets_init() {
	if ( !function_exists('register_sidebars') )
		return;

	$p = array(
		'before_title' => "<h3 class='widgettitle'>",
		'after_title' => "</h3>\n",
	);

	register_sidebars(2, $p);

	// Finished intializing Widgets plugin, now let's load the webjournal default widgets; first, webjournal search widget
	$widget_ops = array(
		'classname'    =>  'widget_search',
		'description'  =>  __( "A search form for your blog (webjournal)", "webjournal" )
	);
	wp_register_sidebar_widget( 'search', __( 'Search', 'webjournal' ), 'widget_webjournal_search', $widget_ops );
	unregister_widget_control('search');
	wp_register_widget_control( 'search', __( 'Search', 'webjournal' ), 'widget_webjournal_search_control' );

	// webjournal Meta widget
	$widget_ops = array(
		'classname'    =>  'widget_meta',
		'description'  =>  __( "Log in/out and administration links (webjournal)", "webjournal" )
	);
	wp_register_sidebar_widget( 'meta', __( 'Meta', 'webjournal' ), 'widget_webjournal_meta', $widget_ops );
	unregister_widget_control('meta');
	wp_register_widget_control( 'meta', __('Meta'), 'wp_widget_meta_control' );

	//webjournal Home Link widget
	$widget_ops = array(
		'classname'    =>  'widget_home_link',
		'description'  =>  __( "Link to the front page when elsewhere (webjournal)", "webjournal" )
	);
	wp_register_sidebar_widget( 'home_link', __( 'Home Link', 'webjournal' ), 'widget_webjournal_homelink', $widget_ops );
	wp_register_widget_control( 'home_link', __( 'Home Link', 'webjournal' ), 'widget_webjournal_homelink_control' );

	//webjournal Recent Comments widget
	$widget_ops = array(
		'classname'    =>  'widget_webjournal_recent_comments',
		'description'  =>  __( "Semantic recent comments (webjournal)", "webjournal" )
	);
	wp_register_sidebar_widget( 'webjournal-recent-comments', __( 'Recent Comments', 'webjournal' ), 'widget_webjournal_recent_comments', $widget_ops );
	wp_register_widget_control( 'webjournal-recent-comments', __( 'Recent Comments', 'webjournal' ), 'widget_webjournal_recent_comments_control' );

	//webjournal RSS Links widget
	$widget_ops = array(
		'classname'    =>  'widget_rss_links',
		'description'  =>  __( "RSS links for both posts and comments (webjournal)", "webjournal" )
	);
	wp_register_sidebar_widget( 'rss_links', __( 'RSS Links', 'webjournal' ), 'widget_webjournal_rsslinks', $widget_ops );
	wp_register_widget_control( 'rss_links', __( 'RSS Links', 'webjournal' ), 'widget_webjournal_rsslinks_control' );
}

add_action('init', 'webjournal_widgets_init');

add_filter('archive_meta', 'wptexturize');
add_filter('archive_meta', 'convert_smilies');
add_filter('archive_meta', 'convert_chars');
add_filter('archive_meta', 'wpautop');

add_filter('post_gallery', 'webjournal_gallery', $attr);

function new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
    global $post;
	return '... <div class="more"><a href="'. get_permalink($post->ID) . '">Read more</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Readies for translation.
load_theme_textdomain('webjournal');

add_filter( 'show_admin_bar', '__return_false' );

?>
