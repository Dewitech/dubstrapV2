<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

	<article class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<?php if (is_category()) { ?>
						<h1 class="archive_title h2">
							<col-md-><?php _e("Posts Category:", "dubstrap"); ?></col-md-> <?php single_cat_title(); ?>
						</h1>
						<?php if ( category_description() ) : // Show an optional category description ?>
						<div class="archive-meta"><?php echo category_description(); ?></div>
						<?php endif; ?>
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2">
							<col-md-><?php _e("Posts Tag:", "dubstrap"); ?></col-md-> <?php single_tag_title(); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<col-md-><?php _e("Daily Archives", "dubstrap"); ?></col-md-> <?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
						<h1 class="archive_title h2">
							<col-md-><?php _e("Monthly Archives", "dubstrap"); ?>:</col-md-> <?php the_time('F Y'); ?>
						</h1>
					<?php } elseif (is_year()) { ?>
						<h1 class="archive_title h2">
							<col-md-><?php _e("Yearly Archives", "dubstrap"); ?>:</col-md-> <?php the_time('Y'); ?>
						</h1>
					<?php } ?>
				</div>
			</div>
			<?php
				// declare variable before get_template_part
				$layout = get_option(dt_layout);
			
				// call global $layout from inside the template part
				global $layout;
				get_template_part($layout);
			?>
		</div><!-- /row -->
	</article><!-- article -->
<?php get_footer(); ?>