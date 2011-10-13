
<?php
/*
Template Name: Archives Page
*/
?>
<?php get_header() ?>

			<div class="hfeed">

<?php the_post() ?>

				<div id="post-<?php the_ID() ?>" class="<?php webjournal_post_class() ?>">
					<h1 class="entry-title"><?php the_title() ?></h1>
					<?php if ( get_post_custom_values('authorlink') ) printf(__('<div class="archive-meta">By %1$s</div>', 'webjournal'), webjournal_author_link() ) // Add a key/value of "authorlink" to show an author byline on a page ?>
					<div class="entry-content">
					
<?php the_content(); ?>

					<ul class="xoxo">
						<li>
							<h3><?php _e('Archives by Category', 'webjournal') ?></h3>
							<ul>
								<?php wp_list_categories('title_li=&sort_column=name&optioncount=1&feed=rdf&feed_type=rdf&feed_image=http://svn.apache.org/repos/asf/incubator/stanbol/branches/http-endpoint-refactoring/kres/ontologymanager/web/src/main/resources/META-INF/static/images/rdf.png&show_count=0') ?> 
							</ul>
						</li>
						<li>
							<h3><?php _e('Archives by Month', 'webjournal') ?></h3>
							<ul>
								<?php wp_get_archives('type=monthly&show_post_count=0') ?>
							</ul>
						</li>
					</ul>

					</div>
				</div><!-- .post -->
				
				<div class="entry-meta">
				  <div class="entry-meta-inner">
						<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><i><?php unset($previousday); printf(__('%1$s', 'webjournal'), the_date('d F Y', false)) ?></i></abbr></span>
						<?php edit_post_link(__('Edit this entry.', 'webjournal'),'<div class="entry-edit">','</div>') ?>
          </div>
				</div>

<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key/value of "comments" to load comments on a page ?>

			</div><!-- .hfeed -->
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>