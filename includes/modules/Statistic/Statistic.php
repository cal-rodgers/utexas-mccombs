<?php

class UTMC_Statistic extends ET_Builder_Module {

	public $slug       = 'utmc_statistic';
	public $vb_support = 'on';

	protected $module_credits = array(
//        'module_uri' => 'https://www.simplea.com/divi/custom/statistic',
		'author'     => 'Simple[A]',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'UT McCombs - Statistic', 'utmc-statistic' );
	}

    //Module's Necessary Fields
	public function get_fields() {
		return array(

            'figure'     => array(
                'label'           => esc_html__( 'Statistic Figure', 'utmc-statistic' ),
                'type'            => 'maxInput',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter Statistic figure here.', 'utmc-statistic' ),
                'toggle_slug'     => 'main_content',
            ),
            'heading'     => array(
                'label'           => esc_html__( 'Statistic Heading', 'utmc-statistic' ),
                'type'            => 'maxInput',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your desired heading here.', 'utmc-statistic' ),
                'toggle_slug'     => 'main_content',
            ),

            'textarea' => array(
                'label'           => esc_html__( 'Statistic Body', 'utmc-statistic' ),
                'type'            => 'maxArea',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter Statistic text here', 'utmc-statistic' ),
                'toggle_slug'     => 'main_content',
            ),

            'source'     => array(
                'label'           => esc_html__( 'Statistic Source', 'utmc-statistic' ),
                'type'            => 'maxInput',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter Statistic source here.', 'utmc-statistic' ),
                'toggle_slug'     => 'main_content',
            ),
            'statimage'   => array(
                'label'              => et_builder_i18n( 'Statistic Image/Icon' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => et_builder_i18n( 'Upload an image' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'utmc-statistic' ),
                'update_text'        => esc_attr__( 'Set As Image', 'utmc-statistic' ),
                'depends_show_if'    => 'off',
                'description'        => esc_html__( 'Upload an image to display above statistic.', 'utmc-statistic' ),
                'toggle_slug'        => 'image',
                'dynamic_content'    => 'image',
                'mobile_options'     => true,
                'hover'              => 'tabs',
            ),
            'alt'          => array(
                'label'           => esc_html__( 'Image Alt Text', 'utmc-statistic' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'utmc-statistic' ),
                'depends_show_if' => 'off',
                'toggle_slug'     => 'image',
                'dynamic_content' => 'text',
            ),
		);
	}


    //Module Rendering in php
    public function render( $attrs, $content = null, $render_slug ) {
        $alt = $this->_esc_attr( 'alt' );
        $image = $this->props['statimage'];
        if ( $image ) {
            $statimage = sprintf('<div class="utm-statistic__image"><img src=%1$s width="50" height="50"></img></div>', $this->props['statimage']);
        } else {
            $statimage = sprintf('');
        }
        $figure =  sprintf( '<div class="utm-statistic__outer"><div class="utm-statistic__wrapper"><div class="utm-statistic__figure">%1$s</div>', $this->props['figure'] );
        $heading =  sprintf( '<div class="utm-statistic__heading">%1$s</div>', $this->props['heading'] );
//        $content =  sprintf( '<div class="utm-statistic__content">%1$s</div></div></div>', $this->props['content'] );
        $content =  sprintf( '<div class="utm-statistic__content">%1$s</div></div></div>', $this->props['textarea'] );
        $source =  sprintf( '<div class="utm-statistic__source">%1$s</div>', $this->props['source'] );
        $module = $statimage. $figure. $heading. $content. $source;

        return $module;

    }

}

new UTMC_Statistic;
