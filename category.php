

<?php



$taxonomy = 'subjects';
$terms = get_terms($taxonomy);

if ( $terms && !is_wp_error( $terms ) ) :
?>
    <ul>
        <?php foreach ( $terms as $term ) { ?>
            <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
        <?php 
    
          $queryy = new WP_Query(array(
                        'post_type' => 'classes',
                        'order' => 'DESC',
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'subjects',  
                            'field' => 'slug',          
                            'terms' => $term->name,  
                        )
                    )
                ));

 if($queryy->have_posts()) : while ($queryy->have_posts()) : $queryy->the_post(); ?>

          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

      <?php endwhile; ?>
          <?php else : ?>
          <div class="alert alert-danger">No Portfolio Found</div>
          <?php endif;  

      } ?>
    </ul>


<?php endif;                          
?>
