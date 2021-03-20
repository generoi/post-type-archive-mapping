<?php
/**
 * Register the Settings tab and any sub-tabs.
 *
 * @package user-profile-picture
 */

namespace PTAM\Includes\Admin\Tabs;

use PTAM\Includes\Functions as Functions;
use PTAM\Includes\Admin\Options as Options;

/**
 * Output the settings tab and content.
 */
class Support extends Tabs {

	/**
	 * Tab to run actions against.
	 *
	 * @var $tab Settings tab.
	 */
	private $tab = 'support';

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_filter( 'ptam_admin_tabs', array( $this, 'add_tab' ), 1, 1 );
		add_filter( 'ptam_admin_sub_tabs', array( $this, 'add_sub_tab' ), 1, 3 );
		add_action( 'ptam_output_' . $this->$tab, array( $this, 'output_settings' ), 1, 3 );
	}

	/**
	 * Add the settings tab and callback actions.
	 *
	 * @param array $tabs Array of tabs.
	 *
	 * @return array of tabs.
	 */
	public function add_tab( $tabs ) {
		$tabs[] = array(
			'get'    => $this->$tab,
			'action' => 'ptam_output_' . $this->$tab,
			'url'    => Functions::get_settings_url( $this->$tab ),
			'label'  => _x( 'Support', 'Tab label as support', 'post-type-archive-mapping' ),
			'icon'   => 'home-heart',
		);
		return $tabs;
	}

	/**
	 * Add the settings main tab and callback actions.
	 *
	 * @param array  $tabs        Array of tabs.
	 * @param string $current_tab The current tab selected.
	 * @param string $sub_tab     The current sub-tab selected.
	 *
	 * @return array of tabs.
	 */
	public function add_sub_tab( $tabs, $current_tab, $sub_tab ) {
		if ( ( ! empty( $current_tab ) || ! empty( $sub_tab ) ) && $this->$tab !== $current_tab ) {
			return $tabs;
		}
		return $tabs;
	}

	/**
	 * Begin settings routing for the various outputs.
	 *
	 * @param string $tab     Current tab.
	 * @param string $sub_tab Current sub tab.
	 */
	public function output_settings( $tab, $sub_tab = '' ) {
		if ( $this->$tab === $tab ) {
			if ( empty( $sub_tab ) || $this->$tab === $sub_tab ) {
				echo 'hello world';
			}
		}
	}
}
