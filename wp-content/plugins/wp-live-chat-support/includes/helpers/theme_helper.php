<?php

class TCXThemeHelper {

	public static function get_theme( $theme_name ) {
		$result = null;
		switch ( $theme_name ) {
			case 'custom':
				$result = self::get_custom_theme();
				break;
			default:
				$result = self::get_default_theme();
				break;
		}

		return $result;
	}

	private static function get_default_theme() {
		$result               = new TCXTheme();
		$wplc_settings        = TCXSettings::getSettings();
		$result->agent_color  = '#eeeeee';
		$result->client_color = '#d4d4d4';
		$result->base_color   = '#373737';
		$result->button_color = '#0596d4';

		return $result;
	}

	private static function get_custom_theme() {
		$result               = new TCXTheme();
		$wplc_settings        = TCXSettings::getSettings();
		$result->agent_color  = $wplc_settings->wplc_settings_agent_color;
		$result->client_color = $wplc_settings->wplc_settings_client_color;
		$result->base_color   = $wplc_settings->wplc_settings_base_color;
		$result->button_color = $wplc_settings->wplc_settings_button_color;

		return $result;
	}
}




