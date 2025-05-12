<?php

class UTMC_SectionHeading extends ET_Builder_Module {

    public $slug       = 'utmc_section_heading';
    public $vb_support = 'on';

    protected $module_credits = array(
//        'module_uri' => 'https://www.simplea.com/divi/custom/section_heading',
        'author'     => 'Simple[A]',
        'author_uri' => '',
    );

    private static $section_counter = 0;

    public function init() {
        $this->name = esc_html__( 'UT McCombs - Section Heading', 'utmc-section-heading' );
    }

    //Module's Necessary Fields
    public function get_fields() {
        return array(

            'heading'     => array(
                'label'           => esc_html__( 'Section Heading Headline', 'utmc-section-heading' ),
                'type'            => 'maxInput',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your Section Heading here.', 'utmc-section-heading' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
            ),

            'button_text'      => array(
                'label'           => et_builder_i18n( 'Section Heading Link Text' ),
                'type'            => 'maxInput',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your desired button text.', 'utmc-section-heading' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
                'mobile_options'  => true,
                'hover'           => 'tabs',
            ),


            'button_url'       => array(
                'label'           => esc_html__( 'Section Heading Link URL', 'utmc-section-heading' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input the destination URL for your button.', 'utmc-section-heading' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'url',
            ),



            'style'               => array(
                'label'           => esc_html__( 'Section Heading Style', 'utmc-section-heading' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'standard'      => esc_html__( 'Standard', 'utmc-section-heading' ),
                    'box'        => esc_html__( 'Box', 'utmc-section-heading' ),
                ),
                'default'         => 'standard',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),

        );
    }


    //Module Rendering in php
    public function render( $attrs, $content = null, $render_slug ) {
        $style = $this->props['style'];
        $button_url     = $this->props['button_url'];
        $button_text    = $this->_esc_attr( 'button_text', 'limited' );
        $heading_text   = $this->props['heading'];
        
        // Increment counter for unique ID
        self::$section_counter++;
        $heading_id = 'section-heading-' . self::$section_counter;
        
        // Create section wrapper with aria-labelledby
        $wrapper = sprintf(
            '<section class="utm-section_heading utm-section_heading--%1$s" role="region" aria-labelledby="%2$s">',
            esc_attr($style),
            esc_attr($heading_id)
        );
        
        // Use semantic header element
        $contentwrapper = '<header class="utm-section_heading__content">';
        
        // Add ID to heading for aria-labelledby reference
        $heading = sprintf(
            '<h2 id="%1$s" class="utm-section_heading__headline">%2$s</h2>',
            esc_attr($heading_id),
            esc_html($heading_text)
        );

        // Use p tag for link container
        $buttonwrapper = '<p class="utm-section_heading__link">';
        if ( $button_url && $button_text ) {
            $buttrender = sprintf(
                '<a href="%1$s" class="utm-btn utm-btn--link utm-btn--link-arrow">%2$s<span class="utm-btn--arrow" aria-hidden="true"></span></a></p>',
                esc_url($button_url),
                esc_html($button_text)
            );
        } else {
            $buttrender = '</p>';
        }
        $wrapperend = '</header></section>';

        $module = $wrapper . $contentwrapper . $heading . $buttonwrapper . $buttrender . $wrapperend;

        return $module;
    }

}

new UTMC_SectionHeading;
