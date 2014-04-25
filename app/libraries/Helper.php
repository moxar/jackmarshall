<?php

class Helper {
	static function host()
	{
		$chunks = explode('.', Request::server('HTTP_HOST'));
		$count = count($chunks);
		return $chunks[$count-2].'.'.$chunks[$count-1];
	}

	static function root()
	{
		return 'http://'.Helper::host();
	}

	static function glink($path)
	{
		$path = trim($path, '/');
		return 'http://'.Helper::host().'/'.$path;
	}

	static function dlink($domain)
	{
		return 'http://'.$domain.'.'.Helper::host();
	}

	static function llink($path)
	{
		$path = trim($path, '/');
		return Request::root().'/'.$path;
	}
}

?>