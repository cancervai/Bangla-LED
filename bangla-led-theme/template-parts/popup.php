<?php
/**
 * Lead-capture popup — gated access modal shown once per visitor.
 *
 * Collects name, designation, company, phone, email before granting
 * access to the network's pricing/availability information. Visibility
 * is controlled by JS (localStorage) so it appears only once.
 *
 * @package Bangla_LED
 */
?>
<div id="bl-popup" class="fixed inset-0 z-[60] hidden items-center justify-center p-4" role="dialog" aria-modal="true" aria-labelledby="bl-popup-title">
	<div class="absolute inset-0 bg-black/80" style="backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);" data-bl-popup-close></div>
	<div class="relative glass-panel max-w-lg w-full p-8 md:p-10 max-h-[92vh] overflow-y-auto">
		<button type="button" class="absolute top-4 right-4 text-on-surface-variant hover:text-primary text-2xl leading-none" aria-label="<?php esc_attr_e( 'Close', 'bangla-led' ); ?>" data-bl-popup-close>&times;</button>

		<span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-5"><?php esc_html_e( 'Access The Network', 'bangla-led' ); ?></span>
		<h2 id="bl-popup-title" class="text-headline-xl font-black text-primary uppercase tracking-tight mb-3"><?php esc_html_e( 'Get Rates, Availability &amp; The Media Kit', 'bangla-led' ); ?></h2>
		<p class="text-body-md text-on-surface-variant mb-6"><?php esc_html_e( 'Tell us who you are and we will send the full Bangla LED network media kit — placements, audience data, and current rates — within one business day.', 'bangla-led' ); ?></p>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="flex flex-col gap-5">
			<input type="hidden" name="action" value="bangla_led_lead" />
			<input type="hidden" name="bl_intent" value="popup" />
			<?php wp_nonce_field( 'bangla_led_lead', 'bangla_led_lead_nonce' ); ?>
			<div class="absolute -left-[9999px]" aria-hidden="true"><input type="text" name="bl_company_website" tabindex="-1" autocomplete="off" /></div>

			<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
				<div class="flex flex-col gap-2">
					<label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="pop_name"><?php esc_html_e( 'Name', 'bangla-led' ); ?></label>
					<input class="input-glass w-full py-2.5 px-0 text-body-md text-primary" id="pop_name" name="bl_name" type="text" required />
				</div>
				<div class="flex flex-col gap-2">
					<label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="pop_desig"><?php esc_html_e( 'Designation', 'bangla-led' ); ?></label>
					<input class="input-glass w-full py-2.5 px-0 text-body-md text-primary" id="pop_desig" name="bl_designation" type="text" required />
				</div>
			</div>
			<div class="flex flex-col gap-2">
				<label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="pop_company"><?php esc_html_e( 'Company Name', 'bangla-led' ); ?></label>
				<input class="input-glass w-full py-2.5 px-0 text-body-md text-primary" id="pop_company" name="bl_company" type="text" required />
			</div>
			<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
				<div class="flex flex-col gap-2">
					<label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="pop_phone"><?php esc_html_e( 'Phone Number', 'bangla-led' ); ?></label>
					<input class="input-glass w-full py-2.5 px-0 text-body-md text-primary" id="pop_phone" name="bl_phone" type="tel" required />
				</div>
				<div class="flex flex-col gap-2">
					<label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="pop_email"><?php esc_html_e( 'Email', 'bangla-led' ); ?></label>
					<input class="input-glass w-full py-2.5 px-0 text-body-md text-primary" id="pop_email" name="bl_email" type="email" required />
				</div>
			</div>

			<button class="mt-1 glass-button w-full py-4 text-label-caps uppercase text-primary tracking-widest" type="submit"><?php esc_html_e( 'Unlock Access', 'bangla-led' ); ?> &rarr;</button>
			<div class="flex items-center justify-center gap-3 text-mono-label uppercase tracking-widest text-on-surface-variant">
				<span class="h-px w-8 bg-white/15"></span><span><?php esc_html_e( 'or call now', 'bangla-led' ); ?></span><span class="h-px w-8 bg-white/15"></span>
			</div>
			<a href="tel:<?php echo esc_attr( BANGLA_LED_PHONE_TEL ); ?>" data-bl-call="1" class="text-center text-label-caps uppercase text-primary tracking-widest no-underline">&#9742; <?php echo esc_html( BANGLA_LED_PHONE ); ?></a>
		</form>
	</div>
</div>
