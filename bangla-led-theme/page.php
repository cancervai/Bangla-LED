<?php
/**
 * Static page template.
 *
 * @package Bangla_LED
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="pt-40 pb-section-gap-mobile md:pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
		<div class="max-w-3xl">
			<h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-12">
				<?php the_title(); ?>
			</h1>
			<div class="entry-content text-body-lg text-on-surface-variant">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
<?php endwhile; ?>

<?php get_footer(); ?>
