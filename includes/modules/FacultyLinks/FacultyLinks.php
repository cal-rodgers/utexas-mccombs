<?php

class UTMC_FacultyLinks extends ET_Builder_Module {

	public $slug       = 'utmc_facultylinks';
	public $vb_support = 'on';

	protected $module_credits = array(
        'author'     => 'Simple[A]',
        'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'UT McCombs - Faculty Links', 'utmc-facultylinks' );
	}

    //Module's Necessary Fields
	public function get_fields() {
		return array(


            'facultyemail'     => array(
                'label'           => esc_html__( 'Faculty Email', 'utmc-facultylinks' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Faculty Email Label here.', 'utmc-facultylinks' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'url',
            ),

            'facultyphone'     => array(
                'label'           => esc_html__( 'Faculty Phone', 'utmc-facultylinks' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Faculty Phone.', 'utmc-facultylinks' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
            ),
            'facultyvita'     => array(
                'label'           => esc_html__( 'Faculty Vita', 'utmc-facultylinks' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Faculty Vita.', 'utmc-facultylinks' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
            ),
            'facultywebsite'     => array(
                'label'           => esc_html__( 'Faculty Website', 'utmc-facultylinks' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Faculty Website.', 'utmc-facultylinks' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'url',
            ),
            'facultyscholar'     => array(
                'label'           => esc_html__( 'Faculty Scholar', 'utmc-facultylinks' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Faculty Scholar.', 'utmc-facultylinks' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'url',
            ),

		);
	}

    //Module Rendering in php
    public function render( $attrs, $content = null, $render_slug ) {

        if ( $this->props['facultyemail'] ) {
            $facultyemail =  sprintf( '<div class="utm-faculty__profile__icons utm-faculty__btn utm-faculty__icon--email"><a href="mailto:%1$s"><i class="fa fa-envelope"></i></a></div>', $this->props['facultyemail']  );
        } else {
            $facultyemail = sprintf('');
        }
        if ( $this->props['facultyphone'] ) {
            $facultyphone =  sprintf( '<div class="utm-faculty__profile__icons utm-faculty__btn utm-faculty__phone"><a href="tel:+1%1$s"><i class="fa fa-phone fa-flip-horizontal"></i></a></div>', $this->props['facultyphone']  );
        } else {
            $facultyphone = sprintf('');
        }
        if ( $this->props['facultyvita'] ) {
            $facultyvita =  sprintf( '<div><div class="utm-faculty__button utm-faculty__vita"><a href="%1$s"><button class="utm-faculty__profile__links">Download Vita</button></a></div></div>', $this->props['facultyvita']  );
        } else {
            $facultyvita = sprintf('');
        }
        if ( $this->props['facultywebsite'] ) {
            $facultywebsite =  sprintf( '<div><div class="utm-faculty__button utm-faculty__website"><a href="%1$s"><button class="utm-faculty__profile__links">Website</button></a></div></div>', $this->props['facultywebsite']  );

        } else {
            $facultywebsite = sprintf('');
        }
        if ( $this->props['facultyscholar'] ) {
            $facultyscholar =  sprintf( '<div class="utm-faculty__button utm-faculty__scholar"><a href="%1$s"><button class="utm-faculty__profile__links">Google Scholar</button></a></div>', $this->props['facultyscholar']  );
        } else {
            $facultyscholar = sprintf('');
        }

        $facultyall =  sprintf( '<div class="utm-faculty__profile--icons--container">
                                        %1$s
                                        %2$s
                                        </div>
                                       <div class="utm-faculty__profile--links--container">
                                        %3$s
                                        %4$s
                                        %5$s
                                        </div>
                                        ', $facultyemail, $facultyphone, $facultyvita, $facultywebsite, $facultyscholar);


        $module = $facultyall;

        return $module;

    }

}

new UTMC_FacultyLinks;
