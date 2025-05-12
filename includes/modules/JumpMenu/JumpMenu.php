<?php
/**
 * Parent module (module which has module item / child module) with FULL builder support
 * This module appears on Visual Builder and requires react component to be provided
 *
 * @since 1.0.0
 */
class jump_menu extends ET_Builder_Module {
    public $slug = 'jump_menu';
    public $vb_support = 'on';
    public $child_slug = 'jump_menu_item';
    private static $counter = 0;

    /**
     * Module properties initialization
     *
     * @since 1.0.0
     */
    function init() {
        $this->name = esc_html__('UT McCombs - Quicklinks', 'utmc-jump-menu');
        $this->icon_path = plugin_dir_path(__FILE__) . 'icon.svg';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'main_content' => et_builder_i18n('Kicker'),
                ),
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
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% .utm-jumpmenu__wrapper',
                    ),
                ),
            ),
            'borders' => array(
                'default' => array(
                    'css' => array(
                        'main' => array(
                            'border_styles' => "%%order_class%% .utm-jumpmenu__wrapper",
                        ),
                    ),
                    'defaults' => array(
                        'border_radii' => 'on|0px|0px|0px|0px',
                    ),
                ),
            ),
            'fonts' => array(
                'jm_kicker' => array(
                    'label' => et_builder_i18n('Kicker'),
                    'css' => array(
                        'main' => "%%order_class%% .utm-jumpmenu__wrapper .utm-jumpmenu__kicker",
                        'important' => 'plugin_only',
                    ),
                    'font_size' => array(
                        'default' => '16px',
                    ),
                ),
                'jm_link' => array(
                    'label' => et_builder_i18n('Link'),
                    'css' => array(
                        'main' => "%%order_class%% .utm-jumpmenu__wrapper .utm-jumpmenu__buttons a",
                        'important' => 'all',
                    ),
                    'font_size' => array(
                        'default' => '16px',
                    ),
                ),
            ),
            'margin_padding' => array(
                'css' => array(),
            ),
            'button' => false,
            'text' => false,
            'filters' => false,
            'link_options' => false,
            'scroll_effects' => array(
                'grid_support' => 'yes',
            ),
        );
    }

    /**
     * Module's fields configuration
     *
     * @since 1.0.0
     *
     * @return array
     */
    function get_fields() {
        return array(
            'jm_kicker' => array(
                'label' => esc_html__('Kicker Text', 'utmc-jump-menu'),
                'type' => 'text',
                'toggle_slug' => 'main_content',
                'dynamic_content' => 'text',
            ),
        );
    }

    /**
     * Render kicker text
     *
     * @return string
     */
    public function render_kicker() {
        $kicker = $this->props['jm_kicker'];
        if (empty($kicker)) {
            return '';
        }
        return sprintf(
            '<div class="utm-jumpmenu__kicker" role="complementary" aria-label="%2$s">%1$s</div>',
            esc_html($kicker),
            esc_attr__('Quick Links Section Kicker', 'utmc-jump-menu')
        );
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
	function render($attrs, $content = null, $render_slug) {
		self::$counter++;
		$module_id = $this->module_id() ?: sprintf('jump-menu-%d', self::$counter);
		$heading_id = $module_id . '-heading';
	
		return sprintf(
			'<nav class="utm-jumpmenu__wrapper" aria-labelledby="%s">
				<h2 id="%s" class="sr-only">%s</h2>
				%s
				<ul class="utm-jumpmenu__links">
					%s
				</ul>
			</nav>',
			esc_attr($heading_id),
			esc_attr($heading_id),
			esc_html__('Quick Links', 'utmc-jump-menu'), // The hidden heading text
			$this->render_kicker(), // optional visible kicker
			$this->props['content']
		);
	}

    /**
     * Text shown when adding new child item
     *
     * @return string
     */
    public function add_new_child_text() {
        return esc_html__('Add new Quicklinks Item', 'et_builder');
    }
}

new jump_menu();
