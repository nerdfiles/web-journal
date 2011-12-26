<?php
require_once '/home/nerdfiles/webapps/webjournal/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?><div class="post">
<header>
<h3>
  <?php echo link_to(get_the_title(), get_permalink()); ?>

</h3></header><div class="content">
  <?php echo get_the_filtered_content(); ?>

</div></div>