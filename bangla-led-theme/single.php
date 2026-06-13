<?php
/**
 * Single post — long-form SEO editorial.
 *
 * @package Bangla_LED
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article>
		<section class="pt-40 pb-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
			<div class="max-w-3xl">
				<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-6">
					<?php echo esc_html( get_the_date() ); ?> &middot; <?php esc_html_e( 'Insights', 'bangla-led' ); ?>
				</div>
				<h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
					<?php the_title(); ?>
				</h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="text-body-lg text-on-surface-variant border-l border-white/20 pl-6"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</div>
		</section>

		<?php if ( has_post_thumbnail() ) : ?>
			<section class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto pb-20">
				<?php the_post_thumbnail( 'bangla-led-wide', array( 'class' => 'w-full grayscale border border-white/10' ) ); ?>
			</section>
		<?php endif; ?>

		<section class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto pb-section-gap-mobile md:pb-section-gap">
			<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
				<div class="md:col-span-8 entry-content text-body-lg text-on-surface-variant bl-article">
					<?php the_content(); ?>
				</div>
				<aside class="md:col-span-4 md:col-start-10">
					<div class="glass-panel p-8 md:p-10 flex flex-col gap-6 md:sticky md:top-28">
						<h2 class="text-headline-lg font-bold text-primary uppercase tracking-tight m-0"><?php esc_html_e( 'Ready To Be Seen?', 'bangla-led' ); ?></h2>
						<p class="text-body-md text-on-surface-variant m-0">
							<?php esc_html_e( 'Get the network media kit — every screen, every city, with verified audience data and current rates.', 'bangla-led' ); ?>
						</p>
						<a class="glass-button px-8 py-4 text-label-caps uppercase tracking-widest text-center no-underline" href="<?php echo esc_url( home_url( '/#booking' ) ); ?>">
							<?php esc_html_e( 'Get Pricing', 'bangla-led' ); ?>
						</a>
						<a class="text-label-caps uppercase text-on-surface-variant hover:text-primary tracking-widest text-center transition-colors no-underline" href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>">
							<?php esc_html_e( 'Browse Locations', 'bangla-led' ); ?>
						</a>
					</div>
				</aside>
			</div>
		</section>
	</article>

	<!-- Interconnected ecosystem: related articles + suggested locations -->
	<?php
	$cats     = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'ids' ) );
	$rel_args = array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'post__not_in'   => array( get_the_ID() ),
		'no_found_rows'  => true,
	);
	if ( $cats && ! is_wp_error( $cats ) ) {
		$rel_args['category__in'] = $cats;
	}
	$rel = new WP_Query( $rel_args );
	if ( $rel->have_posts() ) :
		?>
		<section class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto pb-section-gap-mobile md:pb-16 border-t border-white/10 pt-section-gap-mobile md:pt-16">
			<h2 class="text-headline-xl font-black text-primary uppercase tracking-tight mb-12"><?php esc_html_e( 'Keep Reading', 'bangla-led' ); ?></h2>
			<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
				<?php
				while ( $rel->have_posts() ) :
					$rel->the_post();
					?>
					<article class="group border border-white/10 hover:border-white/40 transition-colors duration-500 p-8 flex flex-col gap-4">
						<div class="text-mono-label uppercase text-on-surface-variant tracking-widest text-xs"><?php echo esc_html( get_the_date() ); ?></div>
						<h3 class="text-headline-lg font-bold text-primary uppercase tracking-tight leading-tight m-0">
							<a href="<?php the_permalink(); ?>" class="no-underline text-primary group-hover:text-white transition-colors"><?php the_title(); ?></a>
						</h3>
						<a href="<?php the_permalink(); ?>" class="mt-auto inline-flex items-center gap-2 text-label-caps uppercase text-primary tracking-widest no-underline"><?php esc_html_e( 'Read', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span></a>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</section>
	<?php endif; ?>

	<!-- Suggested placements + service cross-links -->
	<?php
	$loc_ids = get_posts( array( 'post_type' => 'location', 'posts_per_page' => 3, 'orderby' => 'rand', 'fields' => 'ids', 'no_found_rows' => true ) );
	if ( $loc_ids ) :
		?>
		<section class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto pb-section-gap-mobile md:pb-section-gap border-t border-white/10 pt-section-gap-mobile md:pt-16">
			<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
				<h2 class="text-headline-xl font-black text-primary uppercase tracking-tight m-0"><?php esc_html_e( 'Premium Placements To Book', 'bangla-led' ); ?></h2>
				<a class="glass-button self-start md:self-end px-8 py-4 text-label-caps uppercase tracking-widest no-underline" href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>"><?php esc_html_e( 'View All Locations', 'bangla-led' ); ?> &rarr;</a>
			</div>
			<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
				<?php
				foreach ( $loc_ids as $rid ) :
					$post = get_post( $rid );
					setup_postdata( $post );
					get_template_part( 'template-parts/location-card' );
				endforeach;
				wp_reset_postdata();
				?>
			</div>
			<div class="mt-12 flex flex-wrap gap-3">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>" class="chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest no-underline hover:border-white/50 transition-colors"><?php esc_html_e( 'Advertising Services', 'bangla-led' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest no-underline hover:border-white/50 transition-colors"><?php esc_html_e( 'News Hub', 'bangla-led' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/proposal/' ) ); ?>" class="chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest no-underline hover:border-white/50 transition-colors"><?php esc_html_e( 'Download Proposal', 'bangla-led' ); ?></a>
			</div>
		</section>
	<?php endif; ?>

	<style>
		/* Long-form article polish on black */
		.bl-article h2 { font-size: 32px; font-weight: 800; letter-spacing: -0.02em; margin: 2.5em 0 0.75em; }
		.bl-article h3 { font-size: 22px; font-weight: 700; letter-spacing: -0.01em; margin: 2em 0 0.5em; }
		.bl-article table { width: 100%; border-collapse: collapse; margin: 1.5em 0; font-size: 15px; }
		.bl-article th, .bl-article td { border: 1px solid rgba(255,255,255,0.15); padding: 12px 16px; text-align: left; color: #c4c7c8; }
		.bl-article th { color: #ffffff; text-transform: uppercase; font-size: 12px; letter-spacing: 0.1em; background: rgba(255,255,255,0.04); }
		.bl-article ul, .bl-article ol { padding-left: 1.4em; }
		.bl-article li { margin: 0.4em 0; }
		.bl-article blockquote { border-left: 2px solid #e50914; margin: 1.5em 0; padding: 0.25em 0 0.25em 1.25em; color: #ffffff; font-style: italic; }
		.bl-article strong { color: #ffffff; }
	</style>
<?php endwhile; ?>

<?php get_footer(); ?>
