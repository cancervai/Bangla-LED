<?php
/**
 * News & Insights hub — topic-cluster home.
 *
 * Articles are grouped by editorial category, then the page cross-links
 * out to area guides, the service lines, and the location network so
 * every cluster reinforces the others. This is the internal-linking
 * spine of the site's SEO architecture.
 *
 * @package Bangla_LED
 */

get_header();

/* The clusters, in display order. */
$clusters = array(
	'insights'      => array(
		'label' => __( 'Industry Insights', 'bangla-led' ),
		'blurb' => __( 'Market analysis, trends, and the strategy behind high-impact outdoor campaigns.', 'bangla-led' ),
	),
	'buying-guides' => array(
		'label' => __( 'Billboard Buying Guides', 'bangla-led' ),
		'blurb' => __( 'How to book, what it costs, which sizes to run, and how to measure return — the practical playbooks.', 'bangla-led' ),
	),
	'area-guides'   => array(
		'label' => __( 'Area & Corridor Guides', 'bangla-led' ),
		'blurb' => __( 'A guide to every billboard corridor we operate — who passes, when, and why it works.', 'bangla-led' ),
	),
);
?>

<section class="pt-40 pb-16 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
	<nav class="text-mono-label uppercase tracking-widest text-on-surface-variant mb-10" aria-label="<?php esc_attr_e( 'Breadcrumb', 'bangla-led' ); ?>">
		<a class="text-on-surface-variant hover:text-primary no-underline transition-colors" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'bangla-led' ); ?></a>
		<span class="px-2" aria-hidden="true">/</span>
		<span class="text-primary"><?php esc_html_e( 'News', 'bangla-led' ); ?></span>
	</nav>

	<div class="max-w-3xl mb-12">
		<span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
			<?php esc_html_e( 'News & Insights', 'bangla-led' ); ?>
		</span>
		<h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
			<?php esc_html_e( 'The Bangla LED Knowledge Hub', 'bangla-led' ); ?>
		</h1>
		<div class="text-body-lg text-on-surface-variant border-l border-white/20 pl-6">
			<p><?php esc_html_e( 'Everything Bangladesh\'s smartest media buyers read before they book — strategy, pricing playbooks, and a guide to every corridor we operate. Browse by cluster below.', 'bangla-led' ); ?></p>
		</div>
	</div>

	<!-- Cluster jump nav -->
	<div class="flex flex-wrap gap-3 mb-4">
		<?php foreach ( $clusters as $slug => $meta ) : ?>
			<a href="#<?php echo esc_attr( $slug ); ?>" class="chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest no-underline hover:border-white/50 transition-colors"><?php echo esc_html( $meta['label'] ); ?></a>
		<?php endforeach; ?>
		<a href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>" class="chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest no-underline hover:border-white/50 transition-colors"><?php esc_html_e( 'Services', 'bangla-led' ); ?></a>
		<a href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>" class="chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest no-underline hover:border-white/50 transition-colors"><?php esc_html_e( 'Locations', 'bangla-led' ); ?></a>
	</div>
</section>

<?php foreach ( $clusters as $slug => $meta ) :
	$cluster_q = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => 9,
		'category_name'  => $slug,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'no_found_rows'  => true,
	) );

	if ( ! $cluster_q->have_posts() ) {
		continue;
	}
	?>
	<section id="<?php echo esc_attr( $slug ); ?>" class="py-section-gap-mobile md:py-16 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
		<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12">
			<div class="max-w-2xl">
				<h2 class="text-headline-xl md:text-display-lg-mobile font-black text-primary uppercase tracking-tight mb-3"><?php echo esc_html( $meta['label'] ); ?></h2>
				<p class="text-body-md text-on-surface-variant m-0"><?php echo esc_html( $meta['blurb'] ); ?></p>
			</div>
			<?php
			$cat_term = get_category_by_slug( $slug );
			$cat_url  = $cat_term ? get_category_link( $cat_term ) : home_url( '/news/' );
			?>
			<a href="<?php echo esc_url( $cat_url ); ?>" class="shrink-0 text-label-caps uppercase text-primary tracking-widest no-underline inline-flex items-center gap-2">
				<?php esc_html_e( 'All', 'bangla-led' ); ?> <?php echo esc_html( $meta['label'] ); ?> <span aria-hidden="true">&rarr;</span>
			</a>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
			<?php
			while ( $cluster_q->have_posts() ) :
				$cluster_q->the_post();
				$thumb = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
				?>
				<article class="group border border-white/10 hover:border-white/40 transition-colors duration-500 flex flex-col overflow-hidden">
					<?php if ( $thumb ) : ?>
						<a href="<?php the_permalink(); ?>" class="block aspect-video overflow-hidden bg-surface-container no-underline">
							<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
						</a>
					<?php endif; ?>
					<div class="p-7 flex flex-col gap-3 flex-1">
						<div class="text-mono-label uppercase text-on-surface-variant tracking-widest text-xs"><?php echo esc_html( wp_date( 'M d, Y', get_the_time( 'U' ) ) ); ?></div>
						<h3 class="text-headline-lg font-bold text-primary uppercase tracking-tight leading-tight m-0">
							<a href="<?php the_permalink(); ?>" class="no-underline text-primary group-hover:text-white transition-colors"><?php the_title(); ?></a>
						</h3>
						<p class="text-body-md text-on-surface-variant m-0 flex-1"><?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 22 ) ); ?></p>
						<a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-label-caps uppercase text-primary tracking-widest no-underline mt-2 group-hover:gap-3 transition-all">
							<?php esc_html_e( 'Read', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
						</a>
					</div>
				</article>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</section>
<?php endforeach; ?>

<!-- Explore the network — cross-link to services + locations -->
<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
	<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
		<div class="glass-panel p-10 flex flex-col gap-5">
			<h2 class="text-headline-lg font-bold text-primary uppercase tracking-tight m-0"><?php esc_html_e( 'Explore Advertising Services', 'bangla-led' ); ?></h2>
			<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( 'Fixed billboards, portable LED, caravan vans, metro screens, static hoardings, and installation.', 'bangla-led' ); ?></p>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>" class="glass-button self-start px-8 py-4 text-label-caps uppercase tracking-widest no-underline"><?php esc_html_e( 'View Services', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span></a>
		</div>
		<div class="glass-panel p-10 flex flex-col gap-5">
			<h2 class="text-headline-lg font-bold text-primary uppercase tracking-tight m-0"><?php esc_html_e( 'Browse The Location Network', 'bangla-led' ); ?></h2>
			<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( '59 premium screens across 10 cities — each with verified traffic, audience, and dwell data.', 'bangla-led' ); ?></p>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>" class="glass-button self-start px-8 py-4 text-label-caps uppercase tracking-widest no-underline"><?php esc_html_e( 'View Locations', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span></a>
		</div>
	</div>

	<div class="mt-12 flex flex-col sm:flex-row gap-4 sm:items-center">
		<span class="text-mono-label uppercase tracking-widest text-on-surface-variant"><?php esc_html_e( 'Ready to book? Talk to us now.', 'bangla-led' ); ?></span>
		<?php bangla_led_call_button( array( 'label' => __( 'Call', 'bangla-led' ) ) ); ?>
	</div>
</section>

<?php get_footer(); ?>
