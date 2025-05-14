<?php

class UTMC_Card extends ET_Builder_Module {
    public $slug       = 'utmc_card';
    public $vb_support = 'on';

    protected $module_credits = array(
        'author'     => 'Simple[A]',
        'author_uri' => '',
    );

    public function init() {
        $this->name = esc_html__( 'UT McCombs - Card', 'utmc_card' );
        
        // Register scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function enqueue_scripts() {
        wp_enqueue_script(
            'utmc-options',
            plugin_dir_url(__FILE__) . '../../fields/options.js',
            array('jquery'),
            '1.0.0',
            true
        );
    }

    /**
     * Define module fields
     *
     * @return array
     */
    public function get_fields() {
        return array(
            'heading' => array(
                'label'           => esc_html__( 'Card Heading', 'utmc_card' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Card Heading here.', 'utmc_card' ),
                'toggle_slug'     => 'main_content',
            ),
            'textarea' => array(
                'label'           => esc_html__( 'Card Body', 'utmc_card' ),
                'type'            => 'textarea',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter Card text here', 'utmc_card' ),
                'toggle_slug'     => 'main_content',
            ),
            'button_text' => array(
                'label'           => et_builder_i18n( 'Link Text' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your desired button text.', 'utmc_card' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
                'mobile_options'  => true,
                'hover'           => 'tabs',
            ),
            'button_url' => array(
                'label'           => esc_html__( 'Link URL', 'utmc_card' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input the destination URL for your button.', 'utmc_card' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'url',
            ),
            'variant' => array(
                'label'           => esc_html__( 'Variant', 'utmc_card' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'image_top' => esc_html__( 'Image Top', 'utmc_card' ),
                    'orange'    => esc_html__( 'Orange', 'utmc_card' ),
                    'white'     => esc_html__( 'White', 'utmc_card' ),
                    'zoom'      => esc_html__( 'Zoom', 'utmc_card' ),
                ),
                'default'         => 'orange',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),
            'cardimage' => array(
                'label'              => et_builder_i18n( 'Card Image' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => et_builder_i18n( 'Upload an image' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'utmc_card' ),
                'update_text'        => esc_attr__( 'Set As Image', 'utmc_card' ),
                'depends_show_if'    => 'off',
                'description'        => esc_html__( 'Upload an image for Card.', 'utmc_card' ),
                'toggle_slug'        => 'image',
                'dynamic_content'    => 'image',
                'mobile_options'     => true,
                'hover'              => 'tabs',
            ),
            'alt' => array(
                'label'           => esc_html__( 'Image Alt Text', 'utmc_card' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Provide HTML ALT text for your image here.', 'utmc_card' ),
                'depends_show_if' => 'off',
                'toggle_slug'     => 'image',
                'dynamic_content' => 'text',
            ),
        );
    }

    /**
     * Render module
     *
     * @param array  $attrs
     * @param string $content
     * @param string $render_slug
     *
     * @return string
     */
    public function render( $attrs, $content = null, $render_slug ) {
        $button_url  = $this->props['button_url'];
        $button_text = $this->_esc_attr( 'button_text', 'limited' );
        $variant     = $this->props['variant'];
        $heading_text = $this->props['heading'];
        $body_text = $this->props['textarea'];
        $image = $this->props['cardimage'];
        $alt_text = $this->props['alt'];

        // Generate unique IDs for accessibility
        $card_id = 'utm-card-' . uniqid();
        $heading_id = $card_id . '-heading';

        // Build card image with proper alt text handling
        $cardimage = $image
            ? sprintf(
                '<div class="utm-card__image" role="presentation">' .
                '<img src="%1$s" alt="%2$s" %3$s>' .
                '</div>',
                esc_url($image),
                esc_attr($alt_text),
                empty($alt_text) ? 'aria-hidden="true"' : ''
            )
            : '';

        // Build card structure with proper semantics and ARIA
        $card_start = sprintf(
            '<article id="%1$s" class="utm-card utm-card--%2$s utm-card__outer" aria-labelledby="%3$s">',
            esc_attr($card_id),
            esc_attr($variant),
            esc_attr($heading_id)
        );

        // Single heading for all screen sizes, visually styled differently for mobile
        $heading = sprintf(
            '<h2 id="%1$s" class="utm-card__headline">%2$s</h2>',
            esc_attr($heading_id),
            esc_html($heading_text)
        );

        // Card content
        $content = sprintf(
            '<div class="utm-card__body">%s</div>',
            esc_html($body_text)
        );

        // Build button with proper ARIA label
        $button = '';
        if ($button_url && $button_text) {
            $button = sprintf(
                '<div class="utm-link__container">' .
                '<div class="utm-card__link">' .
                '<a href="%1$s" class="utm-btn utm-card--%2$s utm-btn--link utm-btn--link-arrow" aria-label="%3$s">' .
                '%4$s' .
                '<span class="utm-btn--arrow" aria-hidden="true" role="presentation"></span>' .
                '</a>' .
                '</div>' .
                '</div>',
                esc_url($button_url),
                esc_attr($variant),
                esc_attr(sprintf('%s - %s', $button_text, $heading_text)), // Context for screen readers
                esc_html($button_text)
            );
        }

        // Assemble final module with proper nesting
        $module = $card_start .
            '<div class="utm-card__wrapper">' .
                '<div class="utm-card__group">' .
                    $cardimage .
                    '<div class="utm-card__content-wrapper">' .
                        $heading .
                        $content .
                        $button .
                    '</div>' .
                '</div>' .
            '</div>' .
        '</article>';

        return $module;
    }
}

new UTMC_Card;
