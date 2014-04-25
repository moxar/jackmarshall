<?php

class Helper {
	static public function host() {
		$chunks = explode('.', Request::server('HTTP_HOST'));
		$count = count($chunks);
		return $chunks[$count-2].'.'.$chunks[$count-1];
	}
}

?>