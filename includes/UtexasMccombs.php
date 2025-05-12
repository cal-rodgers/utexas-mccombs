<?php

class UTMC_UtexasMccombs extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'utmc-utexas-mccombs';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'utexas-mccombs';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '0.0.3';

	/**
	 * UTMC_UtexasMccombs constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'utexas-mccombs', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		parent::__construct( $name, $args );
	}
}

new UTMC_UtexasMccombs;
