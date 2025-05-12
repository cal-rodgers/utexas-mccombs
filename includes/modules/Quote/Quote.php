<?php

class UTMC_Quote extends ET_Builder_Module {

	public $slug       = 'utmc_quote';
	public $vb_support = 'on';

	protected $module_credits = array(
//        'module_uri' => 'https://www.simplea.com/divi/custom/quote',
        'author'     => 'Simple[A]',
        'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'UT McCombs - Quote', 'utmc-quote' );
	}

    //Module's Necessary Fields
	public function get_fields() {
		return array(

            'kicker'     => array(
                'label'           => esc_html__( 'Quote Kicker', 'utmc-quote' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input Quote Kicker text here.', 'utmc-quote' ),
                'toggle_slug'     => 'main_content',
            ),

            'textarea' => array(
                'label'           => esc_html__( 'Quote Body', 'utmc-quote' ),
                'type'            => 'textarea',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter Quote text here', 'utmc-quote' ),
                'toggle_slug'     => 'main_content',
            ),


            'author'     => array(
                'label'           => esc_html__( 'Quote Author', 'utmc-quote' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter Quote Author text here.', 'utmc-quote' ),
                'toggle_slug'     => 'main_content',
            ),

            'button_text'      => array(
                'label'           => et_builder_i18n( 'Quote Link Text' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter button text.', 'utmc-quote' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
                'mobile_options'  => true,
                'hover'           => 'tabs',
            ),

            'button_url'       => array(
                'label'           => esc_html__( 'Quote Link URL', 'utmc-quote' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter destination URL for your button.', 'utmc-quote' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'url',
            ),



            'quoteimage'   => array(
                'label'              => et_builder_i18n( 'Quote Image' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => et_builder_i18n( 'Upload an image' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'utmc-quote' ),
                'update_text'        => esc_attr__( 'Set As Image', 'utmc-quote' ),
                'depends_show_if'    => 'off',
                'description'        => esc_html__( 'Upload an image for Quote.', 'utmc-quote' ),
                'toggle_slug'        => 'image',
                'dynamic_content'    => 'image',
                'mobile_options'     => true,
                'hover'              => 'tabs',
            ),

            'alt'          => array(
                'label'           => esc_html__( 'Image Alt Text', 'utmc-quote' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Provide HTML ALT text for your image here.', 'utmc-quote' ),
                'depends_show_if' => 'off',
                'toggle_slug'     => 'image',
                'dynamic_content' => 'text',
            ),


            'orientation'               => array(
                'label'           => esc_html__( 'Quote Orientation', 'utmc-quote' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'left'      => esc_html__( 'Left', 'utmc-quote' ),
                    'right'        => esc_html__( 'Right', 'utmc-quote' ),
                ),
                'default'         => 'right',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),

		);
	}


    //Module Rendering in php
    public function render( $attrs, $content = null, $render_slug ) {
        $orientation = $this->props['orientation'];
        $kicker =  $this->props['kicker'];
        $textarea =  $this->props['textarea'] ;
        $author =  $this->props['author'] ;
        $button_url = $this->props['button_url'];
        $button_text = $this->_esc_attr( 'button_text', 'limited' );
        $quoteimage = $this->props['quoteimage'];

        //check for author content - add em dash character (&#8212;) if not null
        if ( $author ) {
            $author = sprintf('%1$s', $this->props['author']);
        } else {
            $author = sprintf('');
        }

        //check for button content if not null
        if ( $button_url&&$button_text ) {
            $button_render = sprintf('<div class="utm-quote__link">
                    <a href=%1$s target="_self" class="utm-btn utm-btn--link utm-btn--link-arrow">%2$s<span class="utm-btn--arrow"></span></a>
                </div> </div> ', $this->props['button_url'], $button_text );
        } else {
            $button_render = sprintf('</div>');
        }

        if ( $quoteimage ) {
            $image = sprintf(' <div class="utm-quote__image__wrapper"><div class="utm-quote__image">
                <img src=%1$s alt="%2$s"></img>
            </div></div>', $this->props['quoteimage'], $this->props['alt'] );
        } else {
            $image = sprintf('');
        }

        $all = sprintf(        '<div class="utm-quote utm-quote__container utm-quote__container--%1$s">
            <div class="utm-quote__content">
                <div class="utm-quote__kicker">%2$s</div>                 
                <div class="utm-quote__quote">%3$s</div>
                <div class="utm-quote__author">%4$s</div>', $orientation , $kicker, $textarea, $author );

        $module = $all . $button_render . $image;

        return $module;

    }

}

new UTMC_Quote;
