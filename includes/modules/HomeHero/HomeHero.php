<?php

class UTMC_HomeHero extends ET_Builder_Module {

	public $slug       = 'utmc_homehero';
	public $vb_support = 'on';

	protected $module_credits = array(
//        'module_uri' => 'https://www.simplea.com/divi/custom/homehero',
        'author'     => 'Simple[A]',
        'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'UT McCombs - HomeHero', 'utmc-homehero' );
	}

    //Module's Necessary Fields
	public function get_fields() {
		return array(

            'headingone'     => array(
                'label'           => esc_html__( 'Home Hero Heading - Line 1', 'utmc-homehero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your Home Hero Heading here.', 'utmc-homehero' ),
                'toggle_slug'     => 'main_content',
            ),

            'headingtwo'     => array(
                'label'           => esc_html__( 'Home Hero Heading - Line 2', 'utmc-homehero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your Home Hero Heading Line 2 here.', 'utmc-homehero' ),
                'toggle_slug'     => 'main_content',
            ),



            'homeheroimage'   => array(
                'label'              => et_builder_i18n( 'HomeHero Image' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => et_builder_i18n( 'Upload an image' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'utmc-homehero' ),
                'update_text'        => esc_attr__( 'Set As Image', 'utmc-homehero' ),
                'depends_show_if'    => 'off',
                'description'        => esc_html__( 'Upload an image for HomeHero.', 'utmc-homehero' ),
                'toggle_slug'        => 'image',
                'dynamic_content'    => 'image',
                'mobile_options'     => true,
                'hover'              => 'tabs',
            ),

            'alt'          => array(
                'label'           => esc_html__( 'Image Alt Text', 'utmc-homehero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Provide HTML ALT text for your image here.', 'utmc-homehero' ),
                'depends_show_if' => 'off',
                'toggle_slug'     => 'image',
                'dynamic_content' => 'text',
            ),

		);
	}


    //Module Rendering in php
    public function render( $attrs, $content = null, $render_slug ) {

        $headingone =  $this->props['headingone'];
        $headingtwo =  $this->props['headingtwo'];
        $herohomeimage = $this->props['homeheroimage'];
//        $style = $this->props['style'];


$all = sprintf(        '

    <div class="utm-homehero-section">
      <div class="utm-homehero-section__container">
        <img
          src=%3$s
          class="utm-homehero-section__container__heroImg"
          alt="%4$s"
        />
        <div class="utm-homehero-section__container__heroContent">
          <h1 class="utm-homehero-section__container__heroContent__heroHeading">
            %1$s
            <br />
            <span>%2$s</span>
          </h1>
        </div>
      </div>
    </div>
', $headingone, $headingtwo, $herohomeimage, $this->props['alt']);

        $wrapperend =  '</div>';

        $module = $all ; ;

        return $module;

    }

}

new UTMC_HomeHero;
