<?php
/*
Template Name: blog.nerdfiles.net > Home
*/

get_header() ?>

<div id="home" class="hfeed clearfix">

<h1 class="page-title">Home | nerdfiles.net</h1>

<div id="art" class="grid_4 alpha art">
<section>
<header><h2>Art</h2></header>
<?php $my_query = new WP_Query('category_name=music,music-review,music-download,photo,poetry&posts_per_page=5&orderby=date&order=DESC'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); 
$do_not_duplicate = $post->ID; ?>
<article class="~drop-shadow">
<header>
<h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
<div class="time">
<time><?php the_date(); ?></time>
</div>
</header>
<?php the_excerpt(); ?>
<footer></footer>
</article>
<?php endwhile; ?>
</section>
</div>

<div id="philosophy" class="grid_4 phil">
<section>
<header><h2>Philosophy</h2></header>
<?php $my_query = new WP_Query('category_name=philosophy,fair-trade,freethought,global,politics,wittgenstein,history,science,spinoza,theology,atheism,religion,readings,anarchism&posts_per_page=5&orderby=date&order=DESC'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); 
if( $post->ID == $do_not_duplicate ) continue; 
$do_not_duplicate = $post->ID; ?>
<article class="~drop-shadow">
<header>
<h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
<div class="time">
<time><?php the_date(); ?></time>
</div>
</header>
<?php the_excerpt(); ?>
<footer></footer>
</article>
<?php endwhile; ?>
</section>
</div>

<div id="life" class="grid_4 life">
<section>
<header><h2>Life</h2></header>
<?php $my_query = new WP_Query('category_name=uncategorized,none,podcasts,links,school,life,humor,news,school,foodstuffs&posts_per_page=5&orderby=date&order=DESC'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); 
if( $post->ID == $do_not_duplicate ) continue; 
$do_not_duplicate = $post->ID; ?>
<article class="~drop-shadow">
<header>
<h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
<div class="time">
<time><?php the_date(); ?></time>
</div>
</header>
<?php the_excerpt(); ?>
<footer></footer>
</article>
<?php endwhile; ?>
</section>
</div>

<div id="web" class="grid_4 omega web">
<section>
<header><h2>Web</h2></header>
<?php $my_query = new WP_Query('category_name=work,webdesign,webdev&posts_per_page=5&orderby=date&order=DESC'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); 
if( $post->ID == $do_not_duplicate ) continue; 
$do_not_duplicate = $post->ID; ?>
<article class="~drop-shadow">
<header>
<h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
<div class="time">
<time><?php the_date(); ?></time>
</div>
</header>
<?php the_excerpt(); ?>
<footer></footer>
</article>
<?php endwhile; ?>
</section>
</div>

</div><!-- .hfeed -->
</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>
