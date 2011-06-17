
<?php get_header() ?>

			<div class="hfeed">

<?php the_post() ?>

				<div id="post-<?php the_ID(); ?>" class="<?php blogtxt_post_class() ?>">
					
					<h1 class="entry-title"><?php the_title(); ?></h1>
					
					<?php if ( get_post_custom_values('authorlink') ) printf(__('<div class="archive-meta">By %1$s</div>', 'blogtxt'), blogtxt_author_link() ) // Add a key/value of "authorlink" to show an author byline on a page ?>
					<div class="entry-content">

                        <?php the_content() ?>

					</div>
					
					<div class="entry-meta">
					    <div class="entry-meta-inner">
						<span class="meta-sep">&para;</span>
						<span class="entry-date"><?php _e('Posted', 'blogtxt') ?> <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s', 'blogtxt'), the_date('d F Y', false)) ?></abbr></span>
						<?php //blogtxt_author_link(); // Function for author link option ?>
						<!--span class="meta-sep">&sect;</span-->
						<!--span class="entry-category"><?php //the_category(' &sect; ') ?></span>
						<span class="meta-sep">&Dagger;</span-->
						<!--span class="entry-comments"><?php //comments_popup_link(__('Comments (0)', 'blogtxt'), __('Comments (1)', 'blogtxt'), __('Comments (%)', 'blogtxt')) ?></span-->
						<!--span class="meta-sep">&deg;</span-->
						<!--span class="entry-tags"><?php //the_tags(__('Tagged: ', 'blogtxt'), ", ", "") ?></span-->
						<!--span class=\"meta-sep\">&equiv;</span-->
<?php edit_post_link(__('Edit', 'blogtxt'), "\n\t\t\t\t\t<span class='entry-edit'>[", "]</span>\n"); ?>
                        </div>
					</div>
					
				</div><!-- .post -->

                <?php //if ( get_post_custom_values('comments') ) comments_template() // Add a key/value of "comments" to load comments on a page ?>

			</div><!-- .hfeed -->
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>