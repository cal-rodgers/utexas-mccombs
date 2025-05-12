<?php

class UTMC_Hero extends ET_Builder_Module {

	public $slug       = 'utmc_hero';
	public $vb_support = 'on';

	protected $module_credits = array(
//        'module_uri' => 'https://www.simplea.com/divi/custom/hero',
        'author'     => 'Simple[A]',
        'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'UT McCombs - Hero', 'utmc-hero' );
	}

    //Module's Necessary Fields
	public function get_fields() {
		return array(

            'heading'     => array(
                'label'           => esc_html__( 'Hero Heading', 'utmc-hero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your Hero Heading here.', 'utmc-hero' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
            ),

            'textarea' => array(
                'label'           => esc_html__( 'Hero Body', 'utmc-hero' ),
                'type'            => 'textarea',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter Hero text here', 'utmc-hero' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
            ),

            'kicker'     => array(
                'label'           => esc_html__( 'Hero Kicker', 'utmc-hero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input Hero Kicker text here.', 'utmc-hero' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
            ),

            'button_text'      => array(
                'label'           => et_builder_i18n( 'Hero Link Text' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter button text.', 'utmc-hero' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
                'mobile_options'  => true,
                'hover'           => 'tabs',
            ),

            'button_url'       => array(
                'label'           => esc_html__( 'Hero Link URL', 'utmc-hero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter destination URL for your button.', 'utmc-hero' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'url',
            ),



            'heroimage'   => array(
                'label'              => et_builder_i18n( 'Hero Image' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => et_builder_i18n( 'Upload an image' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'utmc-hero' ),
                'update_text'        => esc_attr__( 'Set As Image', 'utmc-hero' ),
                'depends_show_if'    => 'off',
                'description'        => esc_html__( 'Upload an image for Hero.', 'utmc-hero' ),
                'toggle_slug'        => 'image',
                'dynamic_content'    => 'image',
                'mobile_options'     => true,
                'hover'              => 'tabs',
            ),

            'alt'          => array(
                'label'           => esc_html__( 'Image Alt Text', 'utmc-hero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Provide HTML ALT text for your image here.', 'utmc-hero' ),
                'depends_show_if' => 'off',
                'toggle_slug'     => 'image',
                'dynamic_content' => 'text',
            ),

            'orientation'               => array(
                'label'           => esc_html__( 'Hero Orientation', 'utmc-hero' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'left'      => esc_html__( 'Left', 'utmc-hero' ),
                    'right'        => esc_html__( 'Right', 'utmc-hero' ),
                ),
                'default'         => 'left',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),
            'kickerorientation'               => array(
                'label'           => esc_html__( 'Kicker Orientation', 'utmc-hero' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'left'      => esc_html__( 'Left', 'utmc-hero' ),
                    'right'        => esc_html__( 'Right', 'utmc-hero' ),
                ),
                'default'         => 'left',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),
            'style'               => array(
                'label'           => esc_html__( 'Background Style', 'utmc-cta' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'charcoal'      => esc_html__( 'Charcoal', 'utmc-cta' ),
                    'orange'        => esc_html__( 'Orange', 'utmc-cta' ),
                    'white'         => esc_html__( 'White', 'utmc-cta' ),
                    'blue'         => esc_html__( 'Blue', 'utmc-cta' ),
                    'shade'         => esc_html__( 'Shade', 'utmc-cta' ),
                ),
                'default'         => 'orange',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),
		);
	}


    //Module Rendering in php
    public function render( $attrs, $content = null, $render_slug ) {
        $orientation = $this->props['orientation'];
        $kickerorientation = $this->props['kickerorientation'];
        $kicker =  $this->props['kicker'];
        $heading =  $this->props['heading'];
        $content =  $this->props['textarea'];
        $button_url = $this->props['button_url'];
        $button_text = $this->_esc_attr( 'button_text', 'limited' );
        $heroimage = $this->props['heroimage'];
        $style = $this->props['style'];

        if ( $this->props['kicker'] ) {
            $kickerblock = sprintf('        
            
            <div class="utm-hero__kicker__container utm-hero__kicker__container--%2$s">
            <div class="utm-hero__kicker__wrapper">
              
              <div class="utm-hero__kicker__icon">
                <img src="/wp-content/themes/divi-child/assets/images/starbox.svg">
              </div>
              
              <div class="utm-hero__kicker">
                <div class="utm-hero__kicker__text utm-hero__kicker__text--dark">
                  <div class="utm-hero__kicker__text--%2$s">%1$s</div>
                </div>
              </div>
              
            </div> 

        </div>', $this->props['kicker'], $this->props['kickerorientation']);
        } else {
            $kickerblock = sprintf('');
        }


        if ( $button_url&&$button_text ) {
            $buttrender = sprintf('<div class="utm-hero__link">
                        <a href=%1$s target="_self" class="utm-btn">%2$s</a>
                    </div>', $button_url, $button_text);

        } else {
            $buttrender = sprintf('');
        }

        $wrapperstart =sprintf( '<div class="utm-hero__container utm-hero__container--%3$s utm-hero__kicker__orientation--%2$s utm-hero__wrapper--%1$s">',  $orientation ,$kickerorientation, $style);



$all = sprintf(        '

            <div class="utm-hero__content-half">
                <div class="utm-hero__content">
                    <div class="utm-hero__headline">%1$s</div>
                    <div class="utm-hero__body">%2$s</div>
                    %3$s
                </div>
            </div>
            <div class="utm-hero__image-half">
               <img src=%4$s alt="%5$s"></img></div>
        </div>', $heading, $content, $buttrender, $heroimage, $this->props['alt']);

        $wrapperend =  '</div>';

        $module = $wrapperstart . $kickerblock .$all . $wrapperend; ;

        return $module;

    }

}

new UTMC_Hero;
