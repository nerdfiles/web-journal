
<?php get_header(); ?>

			<div class="hfeed">

<?php the_post(); ?>

				<div id="post-<?php the_ID(); ?>" class="<?php blogtxt_post_class(); ?>">
					
					<h1 class="entry-title"><?php the_title(); ?></h1>
					 
					<div class="entry-content">
					
<?php the_content('<span class="more-link">'.__('Continue Reading &raquo;', 'blogtxt').'</span>'); ?>

<?php link_pages('<div class="page-link">'.__('Pages: ', 'blogtxt'), "</div>\n", 'number'); ?>

					</div>
					
					<div class="entry-meta">
					    <div class="entry-meta-inner">
						<span class="meta-sep">&para;</span>
						<span class="entry-date"><?php _e('Posted', 'blogtxt') ?> <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s', 'blogtxt'), the_date('d F Y', false)) ?></abbr></span>
						<?php blogtxt_author_link(); // Function for author link option ?>
						<span class="meta-sep">&sect;</span>
						<span class="entry-category"><?php the_category(' &sect; ') ?></span>
						<span class="meta-sep">&Dagger;</span>
						<span class="entry-comments"><?php comments_popup_link(__('Comments (0)', 'blogtxt'), __('Comments (1)', 'blogtxt'), __('Comments (%)', 'blogtxt')) ?></span>
						<!--span class="meta-sep">&deg;</span>
						<span class="entry-tags"><?php the_tags(__('Tagged: ', 'blogtxt'), ", ", "") ?></span-->
<?php edit_post_link(__('Edit', 'blogtxt'), "\t\t\t\t\t<span class=\"meta-sep\">&equiv;</span>\n\t\t\t\t\t<span class='entry-edit'>", "</span>\n"); ?>
                        </div>
					</div>

                    <?php trackback_rdf(); ?>

				</div><!-- .post -->
				
				<?php comments_template(); ?>

			</div><!-- .hfeed -->
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_footer() ?>
