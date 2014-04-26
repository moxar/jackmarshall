<?php

function cross($path = null) {
	if($path == null) {
		// '' -> 'host.tld'
		echo host();
		return;
	}

	$chunks = explode(':', $path, 2);
	if(count($chunks) == 2) {
		if(empty($chunks[0])) {
			// ':/path' -> 'host.tld/path'
			echo host().'/'.ltrim($chunks[1], '/');
			return;
		}
		// 'domain:/path' -> 'domain.host.tld/path'
		echo $chunks[0].'.'.host().'/'.ltrim($chunks[1], '/');
		return;
	}

	if($chunks[0][0] == '/') {
		// '/path' -> 'domain.host.tld/path'
		echo sub().'.'.host().'/'.ltrim($chunks[0], '/');
		return;
	}

	// 'domain' -> 'domain.host.tld'
	echo $chunks[0].'.'.host();
	return;
}

function host() {
	static $host = null;
	if($host == null) {
		$chunks = explode('.', Request::server('HTTP_HOST'));
		$number = count($chunks);
		$host = $chunks[$number-2].'.'.$chunks[$number-1];
	}
	return $host;
}

function sub() {
	static $domain = null;
	if($domain == null) {
		$chunks = explode('.', Request::server('HTTP_HOST'));
		if(count($chunks) == 3) {
			$domain = $chunks[0];
		} else {
			$domain = 'www';
		}
	}
	return $domain;
}

?>