<?php
/**
 * @package MyStyle
 */

get_header(); ?>

<div id="main" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
   
    <h2><?php the_title(); ?></h2>
   
  
    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	<?php  
		$table = get_field( 'your_table_field_name' );

		if ( $table ) {

		    echo '<table border="0">';

		        if ( $table['header'] ) {

		            echo '<thead>';

		                echo '<tr>';

		                    foreach ( $table['header'] as $th ) {

		                        echo '<th>';
		                            echo $th['c'];
		                        echo '</th>';
		                    }

		                echo '</tr>';

		            echo '</thead>';
		        }

		        echo '<tbody>';

		            foreach ( $table['body'] as $tr ) {

		                echo '<tr>';

		                    foreach ( $tr as $td ) {

		                        echo '<td>';
		                            echo $td['c'];
		                        echo '</td>';
		                    }

		                echo '</tr>';
		            }

		        echo '</tbody>';

		    echo '</table>';
		}
	?>
    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  
  </div>
  <?php endwhile; endif; ?>
  <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

  <?php comments_template(); ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
