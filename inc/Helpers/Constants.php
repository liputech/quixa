<?php

namespace RT\Quixa\Helpers;

class Constants {

	const QUIXA_VERSION = '1.0.0';

	public static function get_version() {
		return WP_DEBUG ? time() : self::QUIXA_VERSION;
	}
}

