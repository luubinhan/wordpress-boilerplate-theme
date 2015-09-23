<div <?php post_class() ?> id="post-<?php the_ID(); ?>"> 
  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
  <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time>
  <?php the_category(' | ') ?>
  <div class="the-excerpt">
    <?php the_excerpt(); ?>
  </div>
</div>
