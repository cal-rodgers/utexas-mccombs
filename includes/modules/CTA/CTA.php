<?php

class UTMC_CTA extends ET_Builder_Module {

    public $slug       = 'utmc_cta';
    public $vb_support = 'on';
    public $child_slug = 'utmc_cta_child';

    protected $module_credits = array(
        'author_uri' => '',
    );

    public function init() {
        $this->name = esc_html__('UT McCombs - CTA', 'utmc-cta');
    }

    public function get_fields() {
        return array(
            'heading' => array(
                'label'           => esc_html__('CTA Heading', 'utmc-cta'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Card Heading here.', 'utmc-cta'),
                'toggle_slug'     => 'main_content',
            ),
            'textarea' => array(
                'label'           => esc_html__('CTA Body', 'utmc-cta'),
                'type'            => 'textarea',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter CTA text here', 'utmc-cta'),
                'toggle_slug'     => 'main_content',
            ),
            'style' => array(
                'label'           => esc_html__('Background Style', 'utmc-cta'),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'charcoal' => esc_html__('Charcoal', 'utmc-cta'),
                    'orange'   => esc_html__('Orange', 'utmc-cta'),
                    'white'    => esc_html__('White', 'utmc-cta'),
                    'blue'     => esc_html__('Blue', 'utmc-cta'),
                ),
                'default'         => 'orange',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),
            'variant' => array(
                'label'           => esc_html__('Variant', 'utmc-cta'),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'benton'  => esc_html__('Benton', 'utmc-cta'),
                    'eighteen' => esc_html__('1883', 'utmc-cta'),
                ),
                'default'         => 'benton',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),
            'ctaimage' => array(
                'label'              => esc_html__('CTA Image/Icon', 'utmc-cta'),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_html__('Upload an image', 'utmc-cta'),
                'choose_text'        => esc_html__('Choose an Image', 'utmc-cta'),
                'update_text'        => esc_html__('Set As Image', 'utmc-cta'),
                'description'        => esc_html__('Upload an image to display above CTA.', 'utmc-cta'),
                'toggle_slug'        => 'image',
                'dynamic_content'    => 'image',
                'mobile_options'     => true,
                'hover'              => 'tabs',
            ),
            'alt' => array(
                'label'           => esc_html__('Image Alt Text', 'utmc-cta'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Define the HTML ALT text for your image here.', 'utmc-cta'),
                'toggle_slug'     => 'image',
                'dynamic_content' => 'text',
            ),
        );
    }

    public function render($attrs, $content = null, $render_slug) {
        $button    = $this->props['content'];
        $image     = $this->props['ctaimage'];
        $style     = $this->props['style'];
        $variant   = $this->props['variant'];
        $heading   = $this->props['heading'];
        $textarea  = $this->props['textarea'];

        $ctaimage = $image ? sprintf('<div class="utm-cta__image"><img src="%1$s" width="50" height="50" alt="%2$s"></div>', esc_url($image), esc_attr($this->props['alt'])) : '';

        $wrapper = sprintf('<div class="utm-cta__outer utm-cta--%1$s utm-cta--%2$s">', esc_attr($style), esc_attr($variant));
        $heading = sprintf('<div class="utm-cta__wrapper"><div class="utm-cta__headline">%1$s</div>', esc_html($heading));
        $content = sprintf('<div class="utm-cta__body">%1$s</div>', wp_kses_post($textarea));
        $buttonwrapper = sprintf('<div class="utm-cta__link__container">%1$s</div>', wp_kses_post($button));
        $wrapperend = '</div></div>';

        $module = $wrapper . $ctaimage . $heading . $content . $buttonwrapper . $wrapperend;

        return $module;
    }
}

new UTMC_CTA;
