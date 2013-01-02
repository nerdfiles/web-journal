
<?php get_header() ?>


<!-- == 
  
  page.php 
  
== -->


  <div class="hfeed">

    <?php the_post() ?>

    <div id="post-<?php the_ID(); ?>" class="<?php webjournal_post_class() ?>">

      <h1 class="entry-title"><?php the_title(); ?></h1>

      <?php if ( get_post_custom_values('authorlink') ) printf(__('<div class="archive-meta">By %1$s</div>', 'webjournal'), webjournal_author_link() ) // Add a key/value of "authorlink" to show an author byline on a page ?>

      <div class="entry-content">
        <?php the_content() ?>
      </div>

      <div class="entry-meta">
        <div class="entry-meta-inner">
        <span class="entry-date">Publish'd on <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><i><?php unset($previousday); printf(__('%1$s', 'webjournal'), the_date('d F Y', false)) ?></i></abbr></span>
        <?php edit_post_link(__('Edit this entry', 'webjournal'),'<div class="entry-edit">','</div>') ?>
        </div>
      </div>

    </div><!-- .post -->

  </div><!-- .hfeed -->

</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar() ?>

<?php get_footer() ?>
