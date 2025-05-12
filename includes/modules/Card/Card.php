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

        // Render button
        $button = $this->render_button(array(
            'button_text' => $button_text,
            'button_url'  => $button_url,
        ));

        // Build card image
        $image = $this->props['cardimage'];
        $cardimage = $image 
            ? sprintf('<div class="utm-card__image"><img src=%1$s alt="%2$s"></img></div>', $this->props['cardimage'], $this->props['alt'])
            : '';

        // Build card structure
        $wrappergroup  = '<div class="utm-card__group">';
        $wrapperstart  = sprintf('<div data-variant-style="%1$s" class="utm-card utm-card--%1$s utm-card__outer"><div class="utm-card__wrapper">', $this->props['variant']);
        $headlinemobile = sprintf('<div class="utm-card__headline__mobile">%1$s</div>', $this->props['heading']);
        $heading       = sprintf('<div class="utm-card__content"><div class="utm-card__headline">%1$s</div>', $this->props['heading']);
        $content       = sprintf('<div class="utm-card__body">%1$s</div>', $this->props['textarea']);
        $buttonwrapper = '<div class="utm-link__container"><div class="utm-card__link">';

        // Build button if URL and text are provided
        $buttrender = ($button_url && $button_text)
            ? sprintf('<a href=%1$s class="utm-btn utm-card--%3$s utm-btn--link utm-btn--link-arrow">%2$s<span class="utm-btn--arrow"></span></a></div></div>', 
                $button_url, 
                $button_text, 
                $variant
            )
            : '</div></div>';

        $wrapperend = '</div></div></div></div>';

        // Assemble final module
        $module = $wrapperstart . 
                 $headlinemobile . 
                 $wrappergroup . 
                 $cardimage . 
                 $heading . 
                 $content . 
                 $buttonwrapper . 
                 $buttrender . 
                 $wrapperend;

        return $module;
    }
}

new UTMC_Card;
