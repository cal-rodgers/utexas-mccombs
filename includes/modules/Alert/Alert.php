<?php

class UTMC_Alert extends ET_Builder_Module {

	public $slug       = 'utmc_alert';
	public $vb_support = 'on';

	protected $module_credits = array(
//        'module_uri' => 'https://www.simplea.com/divi/custom/alert',
        'author'     => 'Simple[A]',
        'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'UT McCombs - Alert', 'utmc-alert' );
	}

    //Module's Necessary Fields
	public function get_fields() {
		return array(

            'message'     => array(
                'label'           => esc_html__( 'Alert Message', 'utmc-alert' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Alert Message here.', 'utmc-alert' ),
                'toggle_slug'     => 'main_content',
            ),

            'linklabel'     => array(
                'label'           => esc_html__( 'Alert Link Label', 'utmc-alert' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Alert Link Label here.', 'utmc-alert' ),
                'toggle_slug'     => 'main_content',
            ),

            'linkurl'     => array(
                'label'           => esc_html__( 'Alert Link URL', 'utmc-alert' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Alert Link URL.', 'utmc-alert' ),
                'toggle_slug'     => 'main_content',
            ),

            'variant'               => array(
                'label'           => esc_html__( 'Variant', 'utmc-alert' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'call_out'      => esc_html__( 'Call Out', 'utmc-alert' ),
                    'emergency'        => esc_html__( 'Emergency', 'utmc-alert' ),
                ),
                'default'         => 'call_out',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),

		);
	}

    //Module Rendering in php
    public function render( $attrs, $content = null, $render_slug ) {
        $link_url     = $this->props['linkurl'];
        $link_text    = $this->_esc_attr( 'linklabel', 'limited' );
        if ( $link_url&&$link_text ) {

                $linkrender = sprintf( '<div class="utm-alert__link">
                            <a href=%1$s target="_self" class="utm-alert__link__link">| %2$s >></a>
                        </div>', $link_url, $link_text  );
            } else {
                $linkrender = sprintf('');
            }

        $alert = sprintf('<div class="utm-alert utm-alert__wrapper utm-alert--%2$s">
                    <div class="utm-alert__message">%1$s</div>
                        %3$s
                </div>', $this->props['message'] , $this->props['variant'], $linkrender );


        $module = $alert;

        return $module;

    }

}

new UTMC_Alert;
