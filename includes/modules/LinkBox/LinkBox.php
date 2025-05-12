<?php
class UTMC_LinkBox extends ET_Builder_Module {

    public $slug       = 'utmc_linkbox';
    public $vb_support = 'on';

    // Module item's slug
    public $child_slug = 'utmc_linkbox_item';

    protected $module_credits = array(
        'author'     => 'Simple[A]',
        'author_uri' => '',
    );

    private static $section_counter = 0;

    public function init() {
        $this->name = esc_html__( 'UT McCombs - Link Box', 'utmc-linkbox' );
    }

    //Module's Necessary Fields
    public function get_fields() {
        return array(
            'heading'     => array(
                'label'           => esc_html__( 'Link Box Heading', 'utmc-linkbox' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input Link Box heading here.', 'utmc-linkbox' ),
                'toggle_slug'     => 'main_content',
            ),
        );
    }

    //Module Rendering in php
    public function render( $attrs, $content = null, $render_slug ) {
        // Increment counter for unique ID
        self::$section_counter++;
        $heading_id = sprintf('utmc-link-box-%d-heading', self::$section_counter);
        
        $headingblock = '';
        
        if ( $this->props['heading'] ) {
            $headingblock = sprintf(
                '<header class="utm-linkbox__heading-box">
                    <h2 id="%2$s" class="utm-linkbox__heading-box__heading">%1$s</h2>
                    <span class="utm-linkbox__border-line" aria-hidden="true"></span>
                    <span class="utm-linkbox__box" aria-hidden="true"></span>
                </header>',
                esc_html($this->props['heading']),
                esc_attr($heading_id)
            );
        }

        // Convert child items to list items if they aren't already
        $content_with_li = preg_replace('/<div class="utm-linkbox-item([^>]*)>(.*?)<\/div>/s', '<li class="utm-linkbox-item$1>$2</li>', $this->props['content']);
        
        $linkboxlinks = sprintf(
            '<ul class="utm-linkbox__flex" role="list">%1$s</ul>',
            $content_with_li
        );

        $linkbox = sprintf(
            '<section class="utm-linkbox utm-linkbox__container" role="region"%3$s>
                %1$s
                %2$s
            </section>',
            $headingblock,
            $linkboxlinks,
            $this->props['heading'] ? sprintf(' aria-labelledby="%s"', esc_attr($heading_id)) : ''
        );

        return $linkbox;
    }
}

new UTMC_LinkBox;