<?php
/**
 * News / Articles archive page.
 *
 * @package Bangla_LED
 */

get_header();
?>

<section class="pt-40 pb-section-gap-mobile md:pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
	<nav class="text-mono-label uppercase tracking-widest text-on-surface-variant mb-10" aria-label="<?php esc_attr_e( 'Breadcrumb', 'bangla-led' ); ?>">
		<a class="text-on-surface-variant hover:text-primary no-underline transition-colors" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'bangla-led' ); ?></a>
		<span class="px-2" aria-hidden="true">/</span>
		<span class="text-primary"><?php esc_html_e( 'News', 'bangla-led' ); ?></span>
	</nav>

	<div class="max-w-3xl mb-20">
		<span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
			<?php esc_html_e( 'Latest Stories', 'bangla-led' ); ?>
		</span>
		<h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
			<?php esc_html_e( 'News & Insights', 'bangla-led' ); ?>
		</h1>
		<div class="text-body-lg text-on-surface-variant border-l border-white/20 pl-6">
			<p><?php esc_html_e( 'Deep dives into digital advertising strategy, market analysis, and the science behind premium DOOH placements in Bangladesh.', 'bangla-led' ); ?></p>
		</div>
	</div>

	<?php
	$articles = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => 12,
		'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );

	if ( $articles->have_posts() ) :
		?>
		<div class="flex flex-col gap-gutter mb-20">
			<?php
			while ( $articles->have_posts() ) :
				$articles->the_post();
				$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
				?>
				<article class="group flex flex-col md:flex-row gap-gutter items-stretch border border-white/10 hover:border-white/40 transition-colors duration-500 overflow-hidden">
					<?php if ( $featured_image ) : ?>
						<div class="shrink-0 w-full md:w-48 h-40 md:h-auto overflow-hidden bg-surface-container">
							<img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
						</div>
					<?php endif; ?>
					<div class="flex-1 p-8 md:p-10 flex flex-col justify-between">
						<div>
							<div class="text-mono-label uppercase text-on-surface-variant tracking-widest text-xs mb-4"><?php echo esc_html( wp_date( 'M d, Y', get_the_time( 'U' ) ) ); ?></div>
							<h2 class="text-headline-xl font-bold text-primary uppercase tracking-tight leading-tight mb-4">
								<a href="<?php the_permalink(); ?>" class="no-underline text-primary group-hover:text-white transition-colors"><?php the_title(); ?></a>
							</h2>
							<p class="text-body-md text-on-surface-variant mb-6"><?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 40 ) ); ?></p>
						</div>
						<a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-label-caps uppercase text-primary tracking-widest no-underline w-fit group-hover:gap-3 transition-all">
							<?php esc_html_e( 'Read Article', 'bangla-led' ); ?> <span aria-hidden="true">→</span>
						</a>
					</div>
				</article>
			<?php endwhile; ?>
		</div>

		<div class="mt-20 flex justify-center gap-6 text-label-caps uppercase tracking-widest">
			<?php
			$args = array(
				'total'     => $articles->max_num_pages,
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'prev_text' => __( '&larr; Previous', 'bangla-led' ),
				'next_text' => __( 'Next &rarr;', 'bangla-led' ),
			);
			echo paginate_links( $args );
			?>
		</div>
	<?php else : ?>
		<p class="text-body-lg text-on-surface-variant"><?php esc_html_e( 'No articles yet. Check back soon.', 'bangla-led' ); ?></p>
	<?php endif; ?>

	<?php wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>
