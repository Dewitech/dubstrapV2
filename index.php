<?php
/**
 * Index
 */
get_header(); 

?>

    <article class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="jumbotron">
	  <?php query_posts('category_name=' . '&posts_per_page=1'); ?>
	  <?php while (have_posts()) : the_post(); ?>
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></h1>
		<?php the_excerpt(); ?>
		<p><a class="btn btn-default btn btn-default-primary btn btn-default-large" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">View details &raquo;</a></p>
	  <?php endwhile;?>
	  <?php wp_reset_query(); ?>
      </div>

      <!-- Featured Contente Start -->
	  
	  <div class="row">
	  <?php query_posts('category_name='. get_option('dt_fcat') .'&posts_per_page='. get_option('dt_fcatnum') .''); ?>
	  <?php while (have_posts()) : the_post(); ?>
			<div class="col-md-4">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
				<p><a class="btn btn-default" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">View details &raquo;</a></p>
			</div>
	  <?php endwhile;?>
	  <?php wp_reset_query(); ?>
	  </div>

      <hr>
	  
	  <!-- Featured Portfolio Start -->
	  <div class="row">
		<?php query_posts('category_name='. get_option('dt_fcat2') .'&posts_per_page='. get_option('dt_fcatnum2') .''); ?>
		
		  <?php while (have_posts()) : the_post(); ?>
			<?php
				$args = array('post_type' => 'attachment', 'post_parent' => $post->ID,  'orderby' => menu_order, 'order' => ASC); 
				$attachments = get_children($args); 							

				foreach ($attachments as $attachment) { 
					$full_url = wp_get_attachment_url($attachment->ID);
					$image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					$full = wp_get_attachment_image_src($attachment->ID, 'full');
					$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
					$image_title = $attachment->post_title;
			?>
				<div class="col-md-4 portfolio-img">
					<a href="<?php echo $full_url;?>" data-rel="prettyPhoto" rel="prettyPhoto">
						<img src="<?php echo $full_url; ?>" title="<?php the_title(); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
					</a>
				</div>
			<?php } ?>
		  <?php endwhile;?>
		  <?php wp_reset_query(); ?>
	  </div>

      <hr>

    </article> <!-- /article -->
<?php get_footer(); ?>