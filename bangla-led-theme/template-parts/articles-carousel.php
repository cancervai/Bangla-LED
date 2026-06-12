<?php
/**
 * Articles carousel — featured stories with internal backlinks.
 *
 * @package Bangla_LED
 */

$articles = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 6,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'meta_query'     => array( // exclude drafts
		array(
			'key'     => '_pingme',
			'compare' => 'NOT EXISTS',
		),
	),
) );

if ( ! $articles->have_posts() ) {
	return;
}
?>

<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
	<div class="mb-16">
		<span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
			<?php esc_html_e( 'Latest Stories', 'bangla-led' ); ?>
		</span>
		<h2 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-4">
			<?php esc_html_e( 'News & Insights', 'bangla-led' ); ?>
		</h2>
		<p class="text-body-lg text-on-surface-variant max-w-2xl">
			<?php esc_html_e( 'Deep dives into digital advertising strategy, market analysis, and the science behind premium DOOH placements.', 'bangla-led' ); ?>
		</p>
	</div>

	<!-- Articles carousel container -->
	<div class="articles-carousel relative">
		<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
			<?php
			while ( $articles->have_posts() ) :
				$articles->the_post();
				$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
				$excerpt = wp_trim_words( get_the_excerpt() ?? get_the_content(), 20, '…' );
				?>
				<article class="group cursor-pointer">
					<?php if ( $featured_image ) : ?>
						<div class="relative overflow-hidden mb-6 aspect-video bg-surface-container">
							<img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
						</div>
					<?php endif; ?>

					<div class="text-mono-label uppercase text-on-surface-variant tracking-widest text-xs mb-4">
						<?php echo esc_html( wp_date( 'M d, Y', get_the_time( 'U' ) ) ); ?>
					</div>

					<h3 class="text-headline-lg font-bold text-primary uppercase tracking-tight mb-4 group-hover:text-white transition-colors line-clamp-3">
						<?php the_title(); ?>
					</h3>

					<p class="text-body-md text-on-surface-variant mb-6 line-clamp-2">
						<?php echo esc_html( $excerpt ); ?>
					</p>

					<a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-3 text-label-caps uppercase tracking-widest text-primary group-hover:gap-4 transition-all">
						<?php esc_html_e( 'Read Story', 'bangla-led' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</article>
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>

	<!-- View all link -->
	<div class="mt-16 text-center">
		<a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="inline-block glass-button px-8 py-4 text-label-caps uppercase tracking-widest no-underline">
			<?php esc_html_e( 'View All Articles', 'bangla-led' ); ?>
		</a>
	</div>
</section>

<?php
