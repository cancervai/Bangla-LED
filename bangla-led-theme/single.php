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
