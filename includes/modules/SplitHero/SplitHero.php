<?php

class UTMC_SplitHero extends ET_Builder_Module {

	public $slug       = 'utmc_split_hero';
	public $vb_support = 'on';

    // Module item's slug
    public $child_slug = 'utmc_split_hero_item';

	protected $module_credits = array(
//        'module_uri' => 'https://www.simplea.com/divi/custom/split_hero',
        'author'     => 'Simple[A]',
        'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'UT McCombs - Content and Image Feature', 'utmc-split-hero' );
//        $this->help_videos = array(
//            array(
//                'id'   => 'XW7HR86lp8U',
//                'name' => esc_html__( 'An introduction to the Split Hero module', 'utmc-split-hero' ),
//            ),
//        );
	}

    //Module's Necessary Fields
	public function get_fields() {
		return array(

            'heading'     => array(
                'label'           => esc_html__( 'Heading', 'utmc-split-hero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your desired heading here.', 'utmc-split-hero' ),
                'toggle_slug'     => 'main_content',
            ),

            'textarea' => array(
                'label'           => esc_html__( 'Body', 'utmc-split-hero' ),
                'type'            => 'textarea',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter body text here', 'utmc-split-hero' ),
                'toggle_slug'     => 'main_content',
            ),

            'kicker'     => array(
                'label'           => esc_html__( 'Kicker', 'utmc-split-hero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter Kicker text here.', 'utmc-split-hero' ),
                'toggle_slug'     => 'main_content',
            ),

            'orientation'                      => array(
                'label'           => esc_html__( 'Orientation', 'utmc-split-hero' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'left'         => esc_html__( 'Left', 'utmc-split-hero' ),
                    'right'             => esc_html__( 'Right', 'utmc-split-hero' ),
                ),
                'default'         => 'left',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),
            'splitimage'   => array(
                'label'              => et_builder_i18n( 'Image' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => et_builder_i18n( 'Upload an image' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'utmc-split-hero' ),
                'update_text'        => esc_attr__( 'Set As Image', 'utmc-split-hero' ),
                'depends_show_if'    => 'off',
                'description'        => esc_html__( 'Upload an image for Content and Image Feature.', 'utmc-split-hero' ),
                'toggle_slug'        => 'image',
                'dynamic_content'    => 'image',
                'mobile_options'     => true,
                'hover'              => 'tabs',
            ),

            'button_url'       => array(
                'label'           => esc_html__( 'Button Link URL', 'utmc-split-hero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input the destination URL for your button.', 'utmc-split-hero' ),
                'toggle_slug'     => 'link',
                'dynamic_content' => 'url',
            ),


            'alt'          => array(
                'label'           => esc_html__( 'Image Alt Text', 'utmc-split-hero' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'utmc-split-hero' ),
                'depends_show_if' => 'off',
                'toggle_slug'     => 'image',
                'dynamic_content' => 'text',
            ),

		);
	}

    //Module Rendering in php
    public function render( $attrs, $content = null, $render_slug ) {
        //check orientation - change


        $splitimage = sprintf('<img class="utm-split_hero__image--%2$s__img" src=%1$s alt="%3$s"></img>', $this->props['splitimage'], $this->props['orientation'], $this->props['alt']);


        if ( $this->props['kicker'] ) {
            $kickerblock = sprintf('        
            
            <div class="utm-split_hero__kicker__container utm-split_hero__kicker__container--%2$s">
                
                <div class="utm-split_hero__kicker__icon">
                    <img src="/wp-content/themes/divi-child/assets/images/starbox.svg" class="utm-split_hero__icon" alt="starbox"></img>
                </div>
                  <div class="utm-split_hero__kicker">
                  <div class="utm-split_hero__kicker__text">
                  <div class="utm-split_hero__kicker__text--%2$s">%1$s</div>
                  </div>
                </div>
            </div>', $this->props['kicker'], $this->props['orientation']);
        } else {
            $kickerblock = sprintf('');
        }

        $splitherolinks =  sprintf( '<div class="utm-split_hero__links">%1$s</div>', $this->props['content']);


        $wrapperstart =sprintf( '<div class="utm-split_hero__outer--%1$s utm-split_hero__container">',  $this->props['orientation']);

        $splithero =  sprintf( '

           
      <div class="utm-split_hero__content">
        <div class="utm-split_hero__heading">%2$s</div>
        <div class="utm-split_hero__body">%3$s</div>
        <div class="utm-split_hero__links">
            %6$s
        </div>
      </div>
      <div class="utm-split_hero__image--%1$s">

        %7$s

      </div>',  $this->props['orientation'] ,$this->props['heading'] ,$this->props['textarea'] , $this->props['splitimage'] , $this->props['kicker'], $splitherolinks, $splitimage );



        $wrapperend =  '</div>';
        $module = $wrapperstart .  $splithero . $kickerblock . $wrapperend;
        return $module;
    }

}

new UTMC_SplitHero;
