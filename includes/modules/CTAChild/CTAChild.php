<?php
/**
 * Items module / module item (module which appears inside parent module) with FULL builder support
 * This module appears on Visual Builder and requires react component to be provided
 * Due to full builder support, all advanced options (except button options) are added by default
 *
 * @since 1.0.0
 */
class CTA_Module_Child extends ET_Builder_Module {
    // Module slug (also used as shortcode tag)
    public $slug                     = 'utmc_cta_child';

    // Module item has to use `child` as its type property
    public $type                     = 'child';

    // Module item's attribute that will be used for module item label on modal
    public $child_title_var          = 'button_text';

    // If the attribute defined on $this->child_title_var is empty, this attribute will be used instead
    public $child_title_fallback_var = 'label';

    public $child_toggle_counter = 0;


    // Full Visual Builder support
    public $vb_support = 'on';

    /**
     * Module properties initialization
     *
     * @since 1.0.0
     *
     * @todo Remove $this->advanced_options['background'] once https://github.com/elegantthemes/Divi/issues/6913 has been addressed
     */
    function init() {

        // Module name
        $this->name             = esc_html__( 'Action Link', 'utmc-cta' );
        /*
                // Default label for module item. Basically if $this->child_title_var and $this->child_title_fallback_var
                // attributes are empty, this default text will be used instead as item label
                $this->advanced_setting_title_text = esc_html__( 'Action Link', UTMC_TEXT_DOMAIN );

                // Module item's modal title
                $this->settings_text = esc_html__( 'Action Link Settings', UTMC_TEXT_DOMAIN );*/

        // Toggle settings
        $this->settings_modal_toggles  = array(
            'general'  => array(
                'toggles' => array(
                    'main_content' => esc_html__( 'Content', 'utmc-cta' ),
                ),
            ),
        );
    }

    /**
     * Module's specific fields
     *
     * @since 1.0.0
     *
     * @return array
     */
    function get_fields() {
        return array(
            'button_url'       => array(
                'label'           => esc_html__( 'Button Link URL', 'utmc-cta' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input the destination URL for your button.', 'utmc-cta' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'url',
            ),

            'button_text'      => array(
                'label'           => et_builder_i18n( 'Button' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your desired button text.', 'utmc-cta' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
                'mobile_options'  => true,
                'hover'           => 'tabs',
            ),
            'button_style'               => array(
                'label'           => esc_html__( 'Button Style', 'utmc-cta' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'button'      => esc_html__( 'Button', 'utmc-cta' ),
                    'link'        => esc_html__( 'Link', 'utmc-cta' ),
                    'arrow'         => esc_html__( 'Arrow', 'utmc-cta' ),
                ),
                'default'         => 'button',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),
        );
    }

    /**
     * Module's advanced fields configuration
     *
     * @since 1.0.0
     *
     * @return array
     */
    function get_advanced_fields_config() {
        $advanced_fields = array(
            'box_shadow'     => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% .utm-cta__btn',
                    ),
                ),
            ),
            'borders'        => array(
                'default' => array(
                    'css'      => array(
                        'main' => array(
                            'border_styles' => "%%order_class%% .utm-cta__btn",
                        ),
                    ),
                    'defaults' => array(
                        'border_radii' => 'on|0px|0px|0px|0px',
                    ),
                ),
            ),
            'fonts'          => array(
                'button'        => array(
                    'label'            => et_builder_i18n( 'Button' ),
                    'css'   => array(
                        'main'      => "%%order_class%% .utm-cta__btn",
                        'important' => 'plugin_only',
                    ),
                    'font_size'       => array(
                        'default' => '16px',
                    ),
                ),
            ),
            'margin_padding' => array(
                'css'    => array(
                    'padding'   => "%%order_class%% .utm-cta__btn",
                    'margin'    => "%%order_class%% .utm-cta__btn",
                    'important' => "all",
                ),
            ),
            'background' => false,
            'button' => false,
            'text' => false,
            'link_options' => false,
            'filters' => false,
            'sizing' => false,
            'transform' => false,
            'link_options' => false,
        );
        return $advanced_fields;
    }

    /**
     * Render module output
     *
     * @since 1.0.0
     *
     * @param array  $attrs       List of unprocessed attributes
     * @param string $content     Content being processed
     * @param string $render_slug Slug of module that is used for rendering output
     *
     * @return string module's rendered output
     */

    public function render( $attrs, $content, $render_slug ) {

        $buttonvariant = $this->props['button_style'];

        $button_url = !empty( $this->props['button_url'] ) ? $this->props['button_url'] : '#';
        $button_text = !empty( $this->props['button_text'] ) ? $this->props['button_text'] : '';
        $button_style = !empty( $this->props['button_style'] ) ? $this->props['button_style'] : '';

        if ( $buttonvariant =='arrow' ) {
            return $button_url ? sprintf( '<div class="utm-cta__link"><a href=%1$s class="utm-btn--link utm-btn--link-arrow">%2$s<span class="utm-btn--arrow"></span></a></div>', $button_url, $button_text, $button_style ) : '';
         } else {
            return $button_url ? sprintf( '<div class="utm-cta__link"><a href=%1$s class="utm-btn--%3$s">%2$s</a></div>', $button_url, $button_text, $button_style ) : '';
        }

    }
}
new CTA_Module_Child();
