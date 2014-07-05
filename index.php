<?php
/**
 * Index
 */
get_header(); 

?>

    <article class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="jumbotron">
	  <?php query_posts('&&posts_per_page=1' . '&ignore_sticky_posts=1'); ?>
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
			<div class="col-md-4 col-sm-6">
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
		  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); 
		  ?>
				<div class="col-md-4 col-sm-6">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></h2>
					<?php if ( has_post_thumbnail() ) {
						echo '<a href="' . $url . '" data-rel="prettyPhoto" rel="prettyPhoto">
						<img src="' . $url . '" id="homethumb" class="img-responsive" /></a>';
					}
					?>
					
					<?php the_excerpt(); ?>
					<p><a class="btn btn-default" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">View details &raquo;</a></p>
				</div>
		  <?php endwhile;?>
		  <?php wp_reset_query(); ?>
	  </div>

      <hr>

    </article> <!-- /article -->
<?php get_footer(); ?>