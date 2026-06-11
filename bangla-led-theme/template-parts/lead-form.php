<?php
/**
 * Glass lead-capture form.
 *
 * Accepts via $args:
 * - 'location'    (string) Location title to attach to the lead.
 * - 'button_text' (string) Submit button label.
 *
 * @package Bangla_LED
 */

$form_location = isset( $args['location'] ) ? $args['location'] : '';
$button_text   = isset( $args['button_text'] ) ? $args['button_text'] : __( 'Request Media Kit', 'bangla-led' );
$lead_state    = isset( $_GET['lead'] ) ? sanitize_text_field( wp_unslash( $_GET['lead'] ) ) : '';
?>
<div class="glass-panel p-8 md:p-12 relative overflow-hidden">
    <div class="absolute -top-24 -right-24 w-64 h-64 bg-white/5 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

    <?php if ( 'success' === $lead_state ) : ?>
        <div class="relative z-10 flex flex-col gap-6 py-8 text-center">
            <span class="chip self-center px-4 py-2 text-mono-label uppercase text-primary tracking-widest"><?php esc_html_e( 'Request Received', 'bangla-led' ); ?></span>
            <h3 class="text-headline-lg font-bold uppercase text-primary tracking-tight"><?php esc_html_e( 'You are on the list.', 'bangla-led' ); ?></h3>
            <p class="text-body-md text-on-surface-variant"><?php esc_html_e( 'Our placement team will respond within one business day with the media kit, availability calendar, and current rate structure.', 'bangla-led' ); ?></p>
        </div>
    <?php else : ?>
        <?php if ( 'error' === $lead_state ) : ?>
            <p class="relative z-10 mb-6 border border-white/30 px-4 py-3 text-mono-label uppercase tracking-widest text-primary">
                <?php esc_html_e( 'Something went wrong — please complete the name and brand fields and try again.', 'bangla-led' ); ?>
            </p>
        <?php endif; ?>

        <form class="flex flex-col gap-8 relative z-10" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="bangla_led_lead" />
            <?php wp_nonce_field( 'bangla_led_lead', 'bangla_led_lead_nonce' ); ?>
            <?php if ( $form_location ) : ?>
                <input type="hidden" name="bl_location" value="<?php echo esc_attr( $form_location ); ?>" />
            <?php endif; ?>

            <!-- Honeypot -->
            <div class="absolute -left-[9999px]" aria-hidden="true">
                <label for="bl_company_website"><?php esc_html_e( 'Leave this field empty', 'bangla-led' ); ?></label>
                <input type="text" id="bl_company_website" name="bl_company_website" tabindex="-1" autocomplete="off" />
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="bl_name"><?php esc_html_e( 'Name / Representative', 'bangla-led' ); ?></label>
                <input class="input-glass w-full py-3 px-0 text-body-md text-primary" id="bl_name" name="bl_name" placeholder="<?php esc_attr_e( 'Enter your full name', 'bangla-led' ); ?>" type="text" required />
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="bl_brand"><?php esc_html_e( 'Brand / Agency', 'bangla-led' ); ?></label>
                <input class="input-glass w-full py-3 px-0 text-body-md text-primary" id="bl_brand" name="bl_brand" placeholder="<?php esc_attr_e( 'Enter your brand or agency name', 'bangla-led' ); ?>" type="text" required />
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="bl_email"><?php esc_html_e( 'Work Email', 'bangla-led' ); ?></label>
                <input class="input-glass w-full py-3 px-0 text-body-md text-primary" id="bl_email" name="bl_email" placeholder="<?php esc_attr_e( 'name@company.com', 'bangla-led' ); ?>" type="email" required />
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="bl_dates"><?php esc_html_e( 'Proposed Campaign Dates', 'bangla-led' ); ?></label>
                <input class="input-glass w-full py-3 px-0 text-body-md text-primary" id="bl_dates" name="bl_dates" placeholder="<?php esc_attr_e( 'e.g., Q3 2026', 'bangla-led' ); ?>" type="text" />
            </div>

            <button class="mt-4 glass-button w-full py-4 text-label-caps uppercase text-primary tracking-widest flex items-center justify-center gap-2 group" type="submit">
                <?php echo esc_html( $button_text ); ?>
                <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
            </button>
        </form>
    <?php endif; ?>
</div>
