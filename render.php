<?php
/**
 * Server-side rendering for the Accessible Testimonial block
 *
 * @param array $attributes Block attributes.
 * @return string Rendered HTML.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Renders the testimonial block with accessibility features.
 *
 * @param array $attributes Block attributes.
 * 
 * @since  1.0.0
 * @return string Rendered HTML for the testimonial block.
 */
function a11y_render_testimonial_block( $attributes ) {
    // Set defaults for attributes.
    $quote   = isset( $attributes['quote'] ) ? $attributes['quote'] : '';
    $author  = isset( $attributes['author'] ) ? $attributes['author'] : '';
    $company = isset( $attributes['company'] ) ? $attributes['company'] : '';

    ob_start();
    ?>
    <section class="a11y-testimonial-block" aria-labelledby="testimonial-heading">
        <h2 id="testimonial-heading" class="screen-reader-text">
            <?php esc_html_e( 'Testimonial', 'a11y-testimonial' ); ?>
        </h2>
        <blockquote>
            <p><?php echo wp_kses_post( $quote ); ?></p>
            <footer>
                <strong><?php esc_html_e( $author ); ?></strong>
                <?php if ( ! empty( $company ) ) : ?>
                    <span class="company">, <?php esc_html_e( $company ); ?></span>
                <?php endif; ?>
            </footer>
        </blockquote>
    </section>
    <?php
    return ob_get_clean();
}
