<?php
/**
 * Items module / module item (module which appears inside parent module) with FULL builder support
 * This module appears on Visual Builder and requires react component to be provided
 *
 * @since 1.0.0
 */
class jump_menu_item extends ET_Builder_Module {
    public $slug = 'jump_menu_item';
    public $type = 'child';
    public $child_title_var = 'link_text';
    public $child_title_fallback_var = 'title';
    public $child_toggle_counter = 0;
    public $vb_support = 'on';

    /**
     * Module properties initialization
     *
     * @since 1.0.0
     */
    function init() {
        $this->name = esc_html__('Quicklinks item', 'utmc-jump-menu');
        $this->advanced_setting_title_text = esc_html__('Menu item', 'utmc-jump-menu');
        $this->settings_text = esc_html__('Menu Item Settings', 'utmc-jump-menu');
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'main_content' => esc_html__('Content', 'utmc-jump-menu'),
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
                'label' => esc_html__('Link Text', 'utmc-jump-menu'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input your desired button text, or leave blank for no button.', 'utmc-jump-menu'),
                'toggle_slug' => 'main_content',
            ),
            'link_url' => array(
                'label' => esc_html__('Link URL', 'utmc-jump-menu'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input URL for your link.', 'utmc-jump-menu'),
                'toggle_slug' => 'main_content',
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
        return array(
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
        );
    }

    /**
     * Render link HTML
     *
     * @since 1.0.0
     *
     * @return string
     */
	public function render_link() {
		$button_url = !empty($this->props['link_url']) ? $this->props['link_url'] : '';
		$button_text = !empty($this->props['link_text']) ? $this->props['link_text'] : '';
	
		if (empty($button_text) || empty($button_url)) {
			return '';
		}
	
		return sprintf(
			'<a href="%s" class="utm-jumpmenu__link">
				<span>%s</span>
			</a>',
			esc_url($button_url),
			esc_html($button_text)
		);
	}
	

	

    /**
     * Render module output
     *
     * @since 1.0.0
     *
     * @param array $attrs List of unprocessed attributes
     * @param string $content Content being processed
     * @param string $render_slug Slug of module used for rendering output
     *
     * @return string Module's rendered output
     */
	public function render($attrs, $content, $render_slug) {
		return sprintf(
			'<li class="utm-jumpmenu__buttons">
				%s
			</li>',
			$this->render_link()
		);
	}
}

new jump_menu_item();
