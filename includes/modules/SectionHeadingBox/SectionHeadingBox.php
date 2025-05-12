<?php

class UTMC_SectionHeadingBox extends ET_Builder_Module {

	public $slug       = 'utmc_section_heading_box';
	public $vb_support = 'on';

	protected $module_credits = array(
//        'module_uri' => 'https://www.simplea.com/divi/custom/section_heading',
        'author'     => 'Simple[A]',
        'author_uri' => '',
	);

    private static $section_counter = 0;

	public function init() {
		$this->name = esc_html__( 'UTM - Section Heading Box', 'utmc-section-heading-box' );
	}

    //Module's Necessary Fields
	public function get_fields() {
		return array(
            'heading'     => array(
                'label'           => esc_html__( 'Section Heading Box Headline', 'utmc-section-heading-box' ),
                'type'            => 'maxInput',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your Section Heading here.', 'utmc-section-heading-box' ),
                'toggle_slug'     => 'main_content',
            ),
		);
	}

    //Module Rendering in php
    public function render( $attrs, $content = null, $render_slug ) {
        // Increment counter for unique ID
        self::$section_counter++;
        $heading_id = 'section-heading-box-' . self::$section_counter;

        $wrapper = sprintf('<section class="utm-section_heading_box" role="region" aria-labelledby="%s">', esc_attr($heading_id));
        $contentwrapper = '<div class="utm-section_heading_box__container">';
        $heading =  sprintf('<header class="utm-section_heading_box__container__heading"><h4 id="%s">%s</h4></header>', 
            esc_attr($heading_id),
            esc_html($this->props['heading'])
        );

        $star = '<div class="utm-section_heading_box__container__starDiv" aria-hidden="true">
        <svg
          class="star--svg utm-section_heading_box__container__starDiv__svg"
          viewBox="0 0 49 48"
          role="presentation"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g transform="translate(-1 -1)" fill="#BE5827" fill-rule="evenodd">
            <path
              d="M49.396 24.723c-.004.422-.011.84-.023 1.256-.355 12.5-4.436 22.332-24.175 22.332S1.378 38.479 1.024 25.979A61.26 61.26 0 0 1 1 24.723c.004-.422.01-.84.023-1.255.354-12.501 4.435-22.332 24.174-22.332s23.82 9.83 24.175 22.332c.012.415.02.833.023 1.255"
              fill="#333f48"
            ></path>
          </g>
          <g transform="translate(-1 -1)" fill="white" fill-rule="evenodd">
            <path
              d="m25.5 11.138-2.991 9.68h-9.681l7.832 5.983-2.992 9.682L25.5 30.5l7.832 5.983L30.34 26.8l7.832-5.983h-9.68z"
              fill="white"
            ></path>
          </g>
        </svg>
      </div>';
      

        $wrapperend = '</div></div></section>';

        $module = $wrapper . $contentwrapper . $heading . $star . $wrapperend;

        return $module;
    }
}

new UTMC_SectionHeadingBox;
