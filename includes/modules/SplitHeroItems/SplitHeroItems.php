<?php
/**
 * Items module / module item (module which appears inside parent module) with FULL builder support
 * This module appears on Visual Builder and requires react component to be provided
 * Due to full builder support, all advanced options (except button options) are added by default
 *
 * @since 1.0.0
 */
class utmc_split_hero_item extends ET_Builder_Module {
		// Module slug (also used as shortcode tag)
	public $slug                     = 'utmc_split_hero_item';

	// Module item has to use `child` as its type property
	public $type                     = 'child';

	// Module item's attribute that will be used for module item label on modal
//	public $child_title_var          = 'title';
    public $child_title_var          = 'link_text';

	// If the attribute defined on $this->child_title_var is empty, this attribute will be used instead
	public $child_title_fallback_var = 'title';
	
	public $child_toggle_counter = 0;
	

	// Full Visual Builder support
	public $vb_support = 'on';


	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 *
	 * @todo Remove $this->advanced_options['background'] once https://github.com/elegantthemes/Divi/issues/6913 has been addressed
	 */
	function init() {

		// Module name
		$this->name             = esc_html__( 'Content and Image Feature link item', 'utmc-split-hero' );

		// Default label for module item. Basically if $this->child_title_var and $this->child_title_fallback_var
		// attributes are empty, this default text will be used instead as item label
		$this->advanced_setting_title_text = esc_html__( 'Menu item', 'utmc-split-hero' );

		// Module item's modal title
		$this->settings_text = esc_html__( 'Menu Item Settings', 'utmc-split-hero' );

		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Content', 'utmc-split-hero' ),
				),
			),
		);
	}

	/**
	 * Module's specific fields
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function get_fields() {
		return array(
			'link_text' => array(
				'label'           => esc_html__( 'Link Text', 'utmc-split-hero' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button text, or leave blank for no button.', 'utmc-split-hero' ),
				'toggle_slug'     => 'main_content',
			),
			'link_url' => array(
				'label'           => esc_html__( 'Link URL', 'utmc-split-hero' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input URL for your link.', 'utmc-split-hero' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	/**
	 * Module's advanced fields configuration
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function get_advanced_fields_config() {
		$advanced_fields = array(
			'background' => false,
			'button' => false,
			'text' => false,
			'link_options' => false,
			'margin_padding' => false,
			'borders' => false,
			'box_shadow' => false,
			'filters' => false,
			'fonts' => false,
			'sizing' => false,
			'transform' => false,
			'link_options' => false,
		);
		return $advanced_fields;
	}

	/**
	 * Render module output
	 *
	 * @since 1.0.0
	 *
	 * @param array  $attrs       List of unprocessed attributes
	 * @param string $content     Content being processed
	 * @param string $render_slug Slug of module that is used for rendering output
	 *
	 * @return string module's rendered output
	 */
	
	public function render_link() {
        $button_url = !empty( $this->props['link_url'] ) ? $this->props['link_url'] : '';
        $button_text = !empty( $this->props['link_text'] ) ? $this->props['link_text'] : '';
		if(empty($button_text||$button_url)) return;
        return sprintf(
            '<a href="%1$s" class="utm-btn--link utm-btn--link-arrow"> 
				%2$s<span class="utm-btn--arrow"></span>
			</a>',
            $button_url,
			$button_text
        );
    }

    public function render( $attrs, $content, $render_slug ) {
                    
        return sprintf('	
				<div class="utm-split_hero__links">%1$s</div>	 
			',
            $this->render_link()
        );
    }
}
new utmc_split_hero_item();
