<h1 class="page-title"><a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php printf( __( 'Return to %s', 'meutema' ), wp_specialchars( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment"><span class="meta-nav">« </span><?php echo get_the_title($post->post_parent) ?></a></h1>
 
  <div id="container">
   <div id="content">
 
    <div id="nav-above" class="navigation">
     <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">«</span> %title' ) ?></div>
     <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">»</span>' ) ?></div>
    </div><!– #nav-above –>
 
    <div class="entry-content">
      <div class="entry-attachment">
<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "medium"); ?>
      <p class="attachment"><a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a>
      </p>
<?php else : ?>
      <a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
<?php endif; ?>
      </div>
      <div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>
 
<?php the_content( __( 'Continue reading <span class="meta-nav">»</span>', 'meutema' )  ); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'meutema' ) . '&after=</div>') ?>
 
     </div><!– .entry-content –>  
 
    <div id="nav-below" class="navigation">
     <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">«</span> %title' ) ?></div>
     <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">»</span>' ) ?></div>
    </div><!– #nav-below –>  

    <?php comments_template('', true); ?>
 
   </div><!– #content –>
  </div><!– #container –>
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>